
<!DOCTYPE html>
<html lang="en">
  <head>

    <?php $this->view('layout/meta') ?>
	  <?php $this->view('layout/css') ?> 
    <!-- <link  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link  href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
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
                <!-- .card -->
                <div class="card card-fluid"> 
                  <!-- <div class="card-header"> </div> -->
                   
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h3 class="mr-auto p-3"><?php echo $page_title; ?></h3>
                      <div class="btn-group" role="group">
                        <div id="buttons"></div>   
                      </div>
                    </div>
                  </div>
                  <div class="card-body"> 
                  <form class="mb-15">
											<div class="form-group row">
												<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
													<label>Barangay </label>
													<select required="" class="form-control datatable-input" data-col-index="2">
														<option value="">Select</option>
													</select>
												</div>   
											</div>  
											<div class="row mt-8">
												<div class="col-lg-12">
													<button class="btn btn-primary btn-primary--icon" id="kt_search">
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
											</div>
										</form>

                    <hr>  
                    <table id="record-table" class="table table-striped " width="100%"> 
                      <thead> 
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Barangay</th>
                          <th>Purok</th>
                          <th>Precinct</th>
                          <th>Category</th>
                          <th>Remarks</th>
                          <th>Reason</th>
                          <!-- <th>Action</th>  -->
                        </tr>
                      </thead><!-- /thead -->
                    </table><!-- /.table -->
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
              </div><!-- /.page-section -->
            </div><!-- /.page-inner -->
          </div><!-- /.page -->
        </div><!-- /.wrapper -->
      </main><!-- /.app-main -->
    </div><!-- /.app -->
    <!-- BEGIN BASE JS -->
    
	<?php $this->view('layout/js') ?> 
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
  <script>
    $(document).ready(function() {
      // $('#record-table').DataTable();
      var table = $('#record-table').DataTable({
        "scrollY": 450,
        "scrollX": true,
        deferRender: true,
        ajax: {
          url: '<?php echo base_url(); ?>record/get_all_record',
          type: 'POST',
        },
        columns: [{
          data: 'id',
          render: function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        }, {
          data: 'name'
        }, {
          data: 'barangay'
        }, {
          data: 'purok'
        }, {
          data: 'precinct'
        }, {
          data: 'category'
        }, {
          data: 'remarks'
        }, {
          data: 'reason'
        }, ],
        initComplete: function() {
          var counter = 0;
          this.api().columns().every(function() {
            var column = this;
            console.info([counter, column.header().textContent])
            switch(column.header().textContent) {
              case 'Barangay':
                column.data().unique().sort().each(function(d, j) {
                  $('.datatable-input[data-col-index="' + counter + '"]').append('<option value="' + d + '">' + d + '</option>');
                });
                break;
            }
            counter++
          });
        },
      });
      var buttons = new $.fn.dataTable.Buttons(table, {
        buttons: [{
          extend: 'excel',
          text: '<i class="fas fa-file-excel"></i>',
        }, {
          extend: 'print',
          text: '<i class="fas fa-print"></i>',
          autoPrint: false,
        }, {
          extend: 'colvis',
          collectionLayout: 'fixed columns',
          collectionTitle: 'Column visibility control'
        }],
      }).container().appendTo($('#buttons'));
      $('.dt-button').removeClass("dt-button");
      $('.dt-buttons>   button').addClass("btn btn-primary");
      $('#kt_search').on('click', function(e) {
        e.preventDefault();
        var params = {};
        $('.datatable-input').each(function() {
          var i = $(this).data('col-index');
          if(params[i]) {
            params[i] += '|' + $(this).val();
          } else {
            params[i] = $(this).val();
          }
        });
        $.each(params, function(i, val) {
          // apply search params to datatable
          table.column(i).search(val ? val : '', true, true);
        });
        table.table().draw();
      });
      $('#kt_reset').on('click', function(e) {
        e.preventDefault();
        $('.datatable-input').each(function() {
          $(this).val('');
          table.column($(this).data('col-index')).search('', false, false);
        });
        table.table().draw();
      });
    });
    </script>
  </body>
</html>