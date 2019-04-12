<?php $this->load->view('header');?>
<?php $this->load->view('sidebar'); //echo "<pre>";print_r($properties); ?>
  
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		  
		  
	<style>
		    .formbdr-box
				{
				   padding: 10px;
				   border-top: 3px solid #3c8dbc;
			
				}
			.heding-txtsz
			   {
			    font-size: 25px;
                font-weight: 600;
			
			   }
			   .sbrow
			   {
			   
			    padding: 45px;
                margin-top: 10px;

			   }
			   
			   .pdn-sbrws
			     {
					border: 2px solid #cccccc5e;
					padding-top: 15px;
					padding-bottom: 15px;
			   
			     }
			   
			   .wrmg-txt
			   {
			       color: red;
				   padding: 5px;
				   font-weight: 500;
			   }
			   .nwbdy
			   {
			   overflow-x:hidden
			   }
			   
			   .pddnrw
			    {
			       padding-top: 10px;
                   padding-bottom: 10px;
                }
			   .pdng-bdr-bx
			   {
			     border-radius: 4px;
                  padding: 6px;
			   
			   }
			   .tpbtnmgns
			   {
			   
			     margin-top: 5px;
			   
			   }
			   .slct-btnpd
				   {
					   padding: 6px;
					   border-radius: 4px;
				   }
			   .text-hdnwt
			   {
			          font-size: 15px;
                      font-weight: 500;
			   
			   }
			   .mgnscn-tp1
			   {
			   
			      margin-top: -65px;
			   
			   }
			   
			   .scn-2mg
			   {
			     font-size: 27px;
                 font-weight: 700;
			   
			   }
			   
			   .scn-2sbtxt
			   {
			       font-size: 17px;
                   font-weight: 600;
			   
			   }
			   .tblpdngs
			   {
			   
			      
                  }
			   .sbrow1
			   {
			         padding: 45px;
                   padding-top: 0px;
			   
			   }
		     
			  .tbl-bdrss
			  {
			      border: 1px solid #c1bfbfcc;
			  
			  
			  }
			   
			   .tblhd-bgclr
			   {
			   background: #cccccc63;
                }
		
		     .tblhdcntr
			 {
			 
			 text-align:center;
			 
			 }
				.btmmg-dwnldbt
				{
				
				margin-bottom: 15px;
				
				}
		     
			 .rwhdscn-3
			 {
			 
			     padding-left: 35px;
			 }
			  .tbmnhdn
			  
			 {
			     font-size: 18px;
			     padding: 4px;
              font-weight: 600;
			 }
			 
			 
			 .mgtprwsss
			 {
			     margin-top: -50px;
				
			 }
			 .alltblpd
			 {
			     padding: 39px;
			 }
			 
			 .mnhdng-1
			 {
			 font-size: 19px;
			 }
			 
			 
			 .btm-tpbd {
				border-top: 1px solid #cccc;
				border-bottom: 1px solid #cccc;
				padding: 8px;
                 }
			 
			 
					@media screen and (max-width: 768px) {
				  .pdn-sbrws {
						border:unset!important;
						
						 background: unset!important;
				  }
				     
				     
                } 
			 
			 
			 
		</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="visible-xs">
        <?php echo isset($page_header) && $page_header != '' ? $page_header : ''; ?>        
      </h1>
      <h1 class="hidden-xs">
        <?php echo isset($page_header) && $page_header != '' ? $page_header : ''; ?>        
      </h1>
      <!--ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/bms_dashboard/index');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Submenu</li>
      </ol-->
    </section>

    <!-- Main content -->
    <section class="content container-fluid cust-container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        
        <!-- general form elements -->
        
            <!--div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div-->
            <!-- /.box-header -->
             
              
              <?php if(isset($_SESSION['flash_msg']) && trim( $_SESSION['flash_msg'] ) != '') {
                    //if($_GET['login_err'] == 'invalid')
                    echo '<div class="alert alert-success msg_notification"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>';
                    echo '</strong>'.$_SESSION['flash_msg'].'</div>';
                    unset($_SESSION['flash_msg']);
                }
            ?>
			
			
<?php
//echo date("m");
//echo date("Y");
 ?>
		<div class="box box-primary" style="border: 1px solid #c5bebe;">
		
                
           <div class="col-md-2">
									 
								<a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Receipt_report/Customer_list');?>">Cust Customer Listing 1</a>	
									</div>     
           
              <!-- /.box-body -->
               <div class="col-md-2">
									 
								<a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Receipt_report/b_Customer_list');?>">Cust Customer Listing 2</a>	
									</div>  
									
									
									<div class="col-md-2">
									 
								 <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Receipt_report/bank_report');?>">Bank Reconciliation Report</a>	
									</div> 
									&nbsp;
										<div class="col-md-2" style="margin-left: 2%;">
									 
								 <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Receipt_report/sumr');?>">sumary</a>	
									</div> 
             	&nbsp;
										<div class="col-md-2" style="margin-left: -9%;">
									 
								 <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Receipt_report/audit_trial');?>">Audit Trial Listing</a>	
									</div> 
									
										<div class="col-md-2" style="margin-left: -4%;">
									 
								 <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Receipt_report/profit_loss');?>">B-Profit & loss-12 month</a>	
									</div> 
             
										<div class="col-md-2" style="margin-left: 2%;margin-top: 2%;">
									 
								 <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Receipt_report/Cust06_Months_Aging');?>">B-Cust 06 Months Aging WITH DETAIL</a>	
									</div> 
             
          	<div class="col-md-2" style="margin-left: 9%;margin-top: 2%;">
									 
								 <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Receipt_report/Income');?>">Income & Ex</a>	
									</div> 
						<div class="col-md-2" style="margin-left: -6%;margin-top: 2%;">
									 
								 <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Receipt_report/cash');?>">CASH FLOW</a>	
									</div> 				
           
            
        
          <!-- /.box -->     

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- bootstrap datepicker -->
  
<?php $this->load->view('footer');?>
<script src="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> 
<!-- overlay loader for ajax call -->
<script src="<?php echo base_url();?>assets/js/loadingoverlay.js"></script>  
<script>

$(document).ready(function () {
    
    $('#property_id').focus();
    $('.msg_notification').fadeOut(5000);
    
    $('.list_filter').click(function () {
        var search_txt = $('#search_txt').val().replace(/^\s+|\s+$/g,"");
        window.location.href="<?php echo base_url('index.php/debit/debit_list_view');?>?search_txt="+search_txt;
        return false;        
    });
    
    jQuery('#records_per_page').change(function(e){
        loadOverSeeingTask(0,jQuery('#records_per_page').val());
        return false; 
    });
    
    jQuery('.publi_paging').keypress(function( event ) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9\.]/g,''));
        if ( event.which == 13 ) {
            //alert(jQuery.isNumeric(jQuery(this).val()) + ' ' + eval(jQuery(this).val()) +'  '+ jQuery('#tot_pages').val());
            event.preventDefault();
            if(jQuery.isNumeric(jQuery(this).val())) {
                if(eval(jQuery(this).val()) > 0 && eval(jQuery(this).val()) <= jQuery('#tot_pages').val()) {
                    loadOverSeeingTask((jQuery(this).val()-1)*jQuery('#records_per_page').val(),jQuery('#records_per_page').val());
                    return false;
                } else {
                    var max_limit = eval(jQuery('#tot_pages').val());
                    alert('Please enter the page number between 1 and '+max_limit);
                    jQuery(this).focus();
                    return false;
                }                
            } else {
                alert('Please enter a valid page number');
                jQuery(this).val('');jQuery(this).focus();
                return false;
            }              
        }
        
    });
    
});

</script>

<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
 <script> 

    function cat1(str) {
    // alert(str);
   
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("sho").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url(); ?>ajax/unit_select.php?$q="+str,true);
//	alert("<?php echo base_url(); ?>ajax/unit_select.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hidee").style.display = "none";
    }

</script>
<style>
.col-md-3 {
    
        width: 7%;
    margin-top: 1%;
}
</style>