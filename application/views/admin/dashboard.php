
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->view('layout/meta') ?>
	  <?php $this->view('layout/css') ?> 
    <style>
      .table-figures {
        border-collapse: collapse;
      }

      /* And this to your table's `td` elements. */
      .table-figures td {
        padding: 0; 
        margin: 0;
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
      
      <!-- .app-main -->
      <main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
              <!-- .page-title-bar -->
              <header class="page-title-bar">
                <!-- page title stuff goes here -->
                <h1 class="page-title"> <?php echo $page_title; ?> </h1>
              </header><!-- /.page-title-bar -->
              <!-- .page-section -->
              <div class="page-section">
                <!-- grid row -->
                <div class="row"> 
                  <!-- grid column -->
                  <div class="col-lg-12">
                    <!-- .card -->
                    <div class="card card-fluid"> 
                      <div class="card-header">
                        <div class="d-flex flex-column flex-md-row">
                          <p class="lead">
                            <span class="font-weight-bold">Population every Barangay</span>
                          </p>
                          <!-- <div class="ml-auto">
                            <button id="print-population-barangay" class="btn btn-outline-primary"><i class="fa fa-print"></i></button> 
                          </div> -->
                        </div>
                      </div>
                      <div class="card-body"> 
                        <canvas id="myChart" width="100%" height="400"></canvas>    
                      </div>
                    </div><!-- /.card -->
                  </div><!-- /grid column -->
                  <div class="col-lg-5 print-table-figures">
                    <!-- .card -->
                    <div class="card card-fluid"> 
                      <div class="card-header">
                        <div class="d-flex flex-column flex-md-row">
                          <p class="lead">
                            <span class="font-weight-bold">Population every Barangay</span>
                          </p>
                          <div class="ml-auto">
                            <button id="print-population-barangay-list" class="btn btn-outline-primary no-print"><i class="fa fa-print"></i></button> 
                          </div>
                        </div>
                      </div>
                      <div class="card-body"> 
                          <table class="table table-striped table-figures" style="font-size: 14px;" > 
                          </table> 
                    </div><!-- /.card -->
                  </div><!-- /grid column -->
                </div><!-- /grid row -->
              </div><!-- /.page-section -->
            </div><!-- /.page-inner -->
          </div><!-- /.page -->
        </div><!-- /.wrapper -->
      </main><!-- /.app-main -->
    </div><!-- /.app -->
    <!-- BEGIN BASE JS -->
    
	<?php $this->view('layout/js') ?>  
  <script src="https://uselooper.com/assets/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery.print/jQuery.print.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets/javascript/chartjs-line-demo.js"></script> -->
  <script>
    const ctx = document.getElementById('myChart').getContext('2d');

    function handleHover(evt, item, legend) {
      legend.chart.data.datasets[0].backgroundColor.forEach((color, index, colors) => {
        colors[index] = index === item.index || color.length === 9 ? color : color + '4D';
      });
      legend.chart.update();
    }
    var table = "";
    $.ajax({
      url: '<?php echo base_url(); ?>dashboard/barangay_population_chart',
      method: 'post',
      dataType: "json",
      success: function(data) {
        // console.info(data) 

        $('table.table-figures').html(data.table)

        // chart
        const myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: data.label,
            datasets: [{
              label: '# of Population',
              data: data.data,
              backgroundColor: data.backgroundColor,
              borderColor: data.borderColor,
              borderWidth: 1,
            }]
          },
          options: {
            plugins: {
              legend: {
                onHover: function handleHover(evt, item, legend) {
                  legend.chart.data.datasets[0].backgroundColor.forEach((color, index, colors) => {
                    colors[index] = index === item.index || color.length === 9 ? color : color + '4D';
                  });
                  legend.chart.update();
                },
                onLeave: function handleLeave(evt, item, legend) {
                  legend.chart.data.datasets[0].backgroundColor.forEach((color, index, colors) => {
                    colors[index] = color.length === 9 ? color.slice(0, -2) : color;
                  });
                  legend.chart.update();
                }
              },
              title: {
                display: true,
                text: 'Voters in Every Barangay'
              }
            },
            scales: {
              y: {
                stacked: true
              }
            }
          }
        });
      },
      error: function(xhr, status, error) {
        // error here...   
        console.info(xhr.responseText);
      }
    });

    $('#print-population-barangay-list').click(function(){
      $('div.print-table-figures').print()
      
      // $("#table.table-figures").printArea({ mode: 'popup', popClose: true });
    })
    </script>
  </body>
</html>