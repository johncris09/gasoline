
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->view('layout/meta') ?>
	  <?php $this->view('layout/css') ?> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style>
      .table-figures {
        border-collapse: collapse;
      }

      /* And this to your table's `td` elements. */
      .table-figures td {
        padding: 0; 
        margin: 0;
      }

      #office-usage-table > tbody> tr, #office-usage-table > tfoot> tr {
        line-height: 6px;
      }

      #office-usage-table tbody td, #office-usage-table thead th, #office-usage-table tbody  th,  #office-usage-table tfoot  th{
			  border: 1px solid black;
		  }

      #office-usage-table  caption{
        caption-side:top !important;
        padding-top:.1rem !important;
        padding-bottom:.1rem !important
      }


            
    </style>
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
              <div class="page-section">
                <div class="row">    
                  <div class="col-xl-3 col-lg-6">
                      <div class="card l-bg-cherry">
                          <div class="card-statistic-3 p-4">
                              <div class="card-icon card-icon-large"><i class="fa fa-exclamation-circle"></i></div>
                              <div class="mb-4">
                                  <h5 class="card-title mb-0">Pending</h5>
                              </div>
                              <div class="row align-items-center mb-2 d-flex">
                                  <div class="col-8">
                                      <h2 class="d-flex align-items-center mb-0">
                                          <?php echo $pending; ?>
                                      </h2>
                                  </div> 
                              </div> 
                          </div>
                      </div> 
                  </div>
                  <div class="col-xl-3 col-lg-6">
                      <div class="card l-bg-blue-dark">
                          <div class="card-statistic-3 p-4">
                              <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                              <div class="mb-4">
                                  <h5 class="card-title mb-0">Approved</h5>
                              </div>
                              <div class="row align-items-center mb-2 d-flex">
                                  <div class="col-8">
                                      <h2 class="d-flex align-items-center mb-0">
                                          <?php echo $approved; ?>
                                      </h2>
                                  </div> 
                              </div> 
                          </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-6 col-lg-6">
                    <div class="card card-fluid pb-3 office-usage"> 
                      <div class="card-header"> 
                        <div class="d-flex justify-content-between"> 
                          <div class="p-2">
                            Top Offices' Gasoline Usage
                          </div> 
                          <div class="p-2"><button class="btn btn-primary no-print" id="print-office-usage"> <i class="fa fa-print"></i> </button></div>
                        </div>
                      </div>
                      <div class="card-body ">
                        <div class="no-print">
                          <form  id="office-usage-form"  class="mb-4">
                            <div class="form-group row justify-content-center">
                              <div class="col-10 col-sm-10  col-md-10  col-lg-10 col-xl-10">
                                <label><strong>Filter by Date</strong></label>
                                <div class="input-daterange input-group" id="date-range">
                                  <input type="text" class="form-control datatable-input"
                                    name="from" autocomplete="off" placeholder="From" required=""  />
                                  <div class="input-group-append">
                                    <span class="input-group-text">
                                      <i class="la la-ellipsis-h"></i>
                                    </span>
                                  </div>
                                  <input type="text" class="form-control datatable-input"
                                    name="to" autocomplete="off"  placeholder="To"  required=""  /> 
                                </div>
                              </div> 
                            </div> 
                            <div class="form-group row justify-content-center"> 
                                <button type="submit" class="btn btn-primary btn-primary--icon" id="kt_search">
                                  <span>
                                    <i class="la la-search"></i>
                                    <span>Search</span>
                                  </span>
                                </button>&#160;&#160; 
                                <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                                  <span>
                                    <i class="la la-close"></i>
                                    <span>Reset</span>
                                  </span>
                                </button> 
                            </div> 
                          </form>  
                          <hr>
                        </div>
                        <table class="table table-bordered caption-top"" id="office-usage-table">
                          <caption class="text-center">asdfasd asdfasdf</caption>
                          <thead>
                            <tr> 
                              <th class="text-center">Office <i class="fa fa-sort no-print"></i></th>
                              <th class="text-center">Amount <i class="fa fa-sort no-print"></i></th>
                            </tr>
                          </thead>
                          
									        <!-- <th class="text-right"> <strong><?php echo number_format($total, 2, '.', ',') ?></strong> </th> -->
                          <tbody>
                            <?php 
                              $count = $total = 0;
                              foreach($office_usage as $row){
                            ?>
                                <tr> 
                                  <td><?php echo $row['office']; ?></td>
                                  <td class="text-right"> <strong> <?php echo $row['amount'] ?></strong></td>
                                  <!-- <td class="text-right"><?php echo number_format($row['amount'], 2, '.', ',') ?></td> -->
                                </tr>
                            <?php
                                $total+=$row['amount'];
                              }
                            ?>  
                            <tfoot>
                              <tr> 
                                <th>Total</th>
                                <th class="text-right" style="color: red"> <strong>&#8369; <span class="total"><?php echo number_format($total, 2, '.', ',') ?></span> </strong> </th>
                              </tr>
                            </tfoot> 
                            
                          </tbody>
                        </table>
                      </div>
                    </div>  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <!-- BEGIN BASE JS -->
    
	<?php $this->view('layout/js') ?>  
  <script src="https://uselooper.com/assets/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery.print/jQuery.print.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
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