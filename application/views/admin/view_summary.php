
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->view('layout/meta') ?>
	  <?php $this->view('layout/css') ?>   
	  <style>
		  table { 
			  line-height: 3px;
		  }

		  .table-bordered tbody td, .table-bordered thead th, .table-bordered tbody  th{
			  border: 1px solid black;
		  }

		  @page {
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
	  
      
    <main class="app-main">
        <div class="wrapper">
          <div class="page">
            <div class="page-inner">
              <header class="page-title-bar">
                <h1 class="page-title"> <?php echo $page_title; ?> </h1>
              </header>
              
              <div class="page-section">  
                <div class="card card-fluid">
                  <div class="card-header"> 
					<div class="d-flex justify-content-between">
															
						<div class="  p-2">
							<h3><?php echo $page_title; ?> </h3>
						</div>
						<div class="pt-4 h4 text-primary"><?php echo date('F d, Y', strtotime($_GET['from']))  . ' - ' . date('F d, Y', strtotime($_GET['to'])) ?></div>
						<div class="p-2"><button id="print-summary" class="btn btn-primary "> <i class="fa fa-print"></i> </button></div>
					</div>
                  </div>
                  <div class="card-body">   
				  		
					  <div class="text-center mb-4"> 
						  <p>
							Republic of the Philippines<br>
							CITY GOVERNMENT OF OROQUIETA<br>
							<strong>SUMMARY OF PAYMENT OF GASOLINE</strong>
							</p>
						</div>
					  <table  class="table table-bordered">
						  <thead>
							  <tr class="text-center">
								  <th>DATE</th>
								  <th>O.R. NO.</th>
								  <th>DESCRIPTION</th>
								  <th>PLATE NO.</th>
								  <th></th>
								  <th>AMOUNT</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php 
								$total = 0;
								$i = 0;
								foreach($summary as $row){
							?>
									<tr>
										<td class="text-center"><?php echo date('m/ d/ Y', strtotime($row['date'])) ?></td>
										<td class="text-center"><?php echo $row['or_number']; ?></td>
										<td class="text-center"><?php echo  $row['gasoline_type']; ?></td> 
										<td class="text-center"><?php echo  $row['plate_number']; ?></td>  
										<td class="text-center"> <strong><?php echo ($i== 0) ? "&#8369;" :"" ?></strong> </td>
										<td class="text-right"><?php echo number_format($row['amount'], 2, '.', ',') ?></td>
									</tr>
							<?php
									$total += $row['amount'];
									$i++;
								}
							?>
								<tr>
									<th></th>
									<th></th>
									<th class="text-center" colspan="2">SUB TOTAL</th>
									<th class="text-center"> <strong>&#8369;</strong> </th>
									<th class="text-right"> <strong><?php echo number_format($total, 2, '.', ',') ?></strong> </th>
								</tr>
							  
						  </tbody>
					  </table> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    
	<?php $this->view('layout/js') ?>  
  <script src="<?php echo base_url() ?>assets/vendor/jquery.print/jQuery.print.min.js"></script> 
   
  <script> 
      $(document).ready(function() {

		$('#print-summary').on('click', function(){
			$('.card-body').print();
		}) 
        
      }); 
    </script>
  </body>
</html>