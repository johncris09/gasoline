
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->view('layout/meta') ?>
	  <?php $this->view('layout/css') ?> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
     
  </head>
  <body>
    <!-- .app -->
    <div class="app">
      <!--[if lt IE 10]>
      <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
      <![endif]-->
	  <?php $this->view('layout/header') ?> 
	  <?php $this->view('layout/aside') ?> 
    

      <main class="app-main">
        <div class="wrapper">
          <div class="page">
            <div class="page-inner">
              <header class="page-title-bar">
                <h1 class="page-title"> <?php echo $page_title; ?> </h1>
              </header> 
            </div>
          </div>
        </div>
      </main>
    </div>
    <!-- BEGIN BASE JS -->
    
	<?php $this->view('layout/js') ?>  
  <script src="https://uselooper.com/assets/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery.print/jQuery.print.min.js"></script> 
  <script src="<?php echo base_url() ?>assets/javascript/bootstrap-datepicker.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#print-office-usage').on('click', function() {
        $('.office-usage').print();
      })
      $('input[name="from"]').datepicker({
        onSelect: function() {
          request_table.draw();
        },
        changeMonth: true,
        changeYear: true
      });
      $('input[name="to"]').datepicker({
        onSelect: function() {
          request_table.draw();
        },
        changeMonth: true,
        changeYear: true
      });
      $('#date-range').datepicker({
        todayHighlight: true,
        templates: {
          leftArrow: '<i class="la la-angle-left"></i>',
          rightArrow: '<i class="la la-angle-right"></i>',
        },
        dateFormat: 'yyyy/mm/dd',
      });


      // Sort
      $('th').each(function(col) {
        $(this).hover(function() {
          $(this).addClass('focus');
        }, function() {
          $(this).removeClass('focus');
        });
        $(this).click(function() {
          if($(this).is('.asc')) {
            $(this).removeClass('asc');
            $(this).addClass('desc selected');
            sortOrder = -1;
          } else {
            $(this).addClass('asc selected');
            $(this).removeClass('desc');
            sortOrder = 1;
          }
          $(this).siblings().removeClass('asc selected');
          $(this).siblings().removeClass('desc selected');
          var arrData = $('table').find('tbody >tr:has(td)').get();
          arrData.sort(function(a, b) {
            var val1 = $(a).children('td').eq(col).text().toUpperCase();
            var val2 = $(b).children('td').eq(col).text().toUpperCase();
            if($.isNumeric(val1) && $.isNumeric(val2)) return sortOrder == 1 ? val1 - val2 : val2 - val1;
            else return(val1 < val2) ? -sortOrder : (val1 > val2) ? sortOrder : 0;
          });
          $.each(arrData, function(index, row) {
            $('tbody').append(row);
          });
        });
      });



      $('#office-usage-form').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
          url: "<?php echo base_url() ?>dashboard/get_office_usage_by_date",
          method: "POST",
          data: $("#office-usage-form").serialize(),
          dataType: "json",
          success: function(data) {  

            console.info(data)

            $('#office-usage-table tbody').html('')
 
            var table = "";
            $.each( data.office_usage, function( key, value ) { 
              table += '\
                <tr>\
                  <td>'+value.office+'</td>\
                  <td>'+value.amount+'</td>\
                </tr>'; 
              
            });
            $('#office-usage-table tbody').html(table)
            $('.total').text(data.total)
            $('caption').html(data.from + " - " + data.to)
             
          },
          error: function(xhr, status, error) {
            console.info(xhr.responseText);
          }
        });
      })
    });
    </script>
  </body>
</html>