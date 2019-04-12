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
		<section>
			<div class="container-fluid">
				<form method="post">
					<div class="row formbdr-box">
						<div class="col-md-12">
							<div class="col-md-7">
								<h4 class="heding-txtsz">Receipts & Payments</h4>
							</div>
						
							<div class="col-md-5  tpbtnmgns">
								<button class="btn btn-primary" style="">Trial Balance</button>
								
								<button class="btn btn-primary">P&L Statement</button>
								
								<button class="btn btn-primary">Balance Sheet </button>
							</div>
						</div>
						<div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;margin-left: 2%;">Property</label>
              <div class="col-md-9" style="color:red;">
               <select class="form-control" id="" name="name" class="txt-fld1 wdt-inpt" style="width: 34%;" onChange="cat1(this.value);">
						<option value="">All</option>
                            <?php 
                                                foreach ($properties as $key=>$val) { 
                                                    $selected = isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] == $val['property_id'] ? 'selected="selected" ' : '';  
                                                    echo "<option value='".$val['property_id']."' ".$selected.">".$val['property_name']."</option>";
                                                } ?>   
                        </select>
              </div>
            </div>
            <div class="form-group">
            <div class="col-md-1" style="margin-left: -49%;">Unit No</div>
                   <div class="col-md-2" id="hidee">
                       
                       <select name="reciptno" class="form-control" id="search_txt" style="width: 106%;margin-left: 239%;margin-top: -21%;">
                            <option  value="">Select</option>
                       <?php
                      $pro = $_SESSION['bms_default_property'];
                       $querybv = $this->db->query("SELECT unit_id,unit_no FROM  bms_property_units where property_id = '$pro'");
                      
                  ?>
                <?php   foreach ($querybv->result() as $rowbv){ ?>
                      
                       <option  value="<?php echo $rowbv->unit_id; ?>"><?php echo  $rowbv->unit_no; ?></option>
                           
                          <?php }?>
                        </select>
                       
                       </div>
                        <div class="col-md-2" id ="sho"></div>
            </div>
             
						<div class="row sbrow">
							<div class="col-md-12 pdn-sbrws">
							
							  <div class="row pddnrw">
									<div class="col-md-2 text-hdnwt">Monthly</div>
								
									<div class="col-md-2">
									    <select class="form-control" id="" name="yeer" class="slct-btnpd" style="width: 104%;">
											<option value="">2018</option>
										   	<option value="">2017</option>
											<option value="">2016</option>
										   	<option value="">2015</option>

										</select>
									</div>
                                    <div class="col-md-2">
									
									    <select class="form-control" id="" name="manth" class="slct-btnpd" style="">
											<option value="9">Sep</option>
                                           <option value="10">Oct</option>
										   <option value="11">Now</option>
										   <option value="12">Des</option>
										   
										</select>
									</div>
                                    

									
									<div class="col-md-6">
								
									
									<div class="col-md-2 text-hdnwt">Account</div>
									<div class="col-md-5">
										   <select class="form-control" id="" name="name" class="slct-btnpd" style="" >
												 <option value="">All consolidate A/C</option>
												 <option value="">Bank - Current Account</option>
												  <option value="">Bank - SF - Current Account</option>
												   <option value="">Cash On Hand</option>
												    <option value="">Fixed Deposit</option>
													<option value="">Petty Cash</option>
											
											</select>
									</div>
									<div class="col-md-5">
									 
									   <input type="submit" value="View Monthly" name="search1" class="btn btn-primary" >
									
									</div>
									
									
									
									
									
									
									
									</div>
							 </div>
								</form>
							   <div class="row sbrow77">
							<div class="col-md-12 ">
							
						        <p class="fntfmyli">Download 12- month column report</p>
							
							   <div class="row pddnrw">
									<div class="col-md-2 text-hdnwt">Financial Year</div>
									<div class="col-md-2">
										   <select class="form-control" id="" name="yeee" class="slct-btnpd" style="" >
												 <option value="2018">FY 2018</option>
												 <option value="2017">FY 2017</option>
												  <option value="2016">FY 2016</option>
												   <option value="2015">FY 2015</option>
												    <option value="2014">FY 2014</option>
										   </select>
									</div>
									<div class="col-md-1">
										  <p class=""><center>To</center></p>
										
									</div>
									<div class="col-md-2">
									
								
									<select class="form-control" id="" name="manth1" class="slct-btnpd" style="">
											<option value="9">Sep</option>
                                           <option value="10">Oct</option>
										   <option value="11">Now</option>
										   <option value="12">Des</option>
										   
										</select>
									</div>
										<div class="col-md-1"></div>
									<div class="col-md-2">
									 
								 <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Receipt_report/allmonth');?>">Download</a>	
									</div>
									
									<div class="col-md-2"></div>
							    </div>
							
						
						
								
								
							</div>
						</div>
								
						
						
						
								
								
							</div>
						</div>
					</div>
			
			</div>
				 
		  
		</section>
		
		
		<section class="mgnscn-tp1">  
			<div class="container-fluid">
				<form>
					
						<div class="row sbrow">
						    
						     <?php
    if(isset($_POST['search1']))
    {
       //echo "fdf";exit;
        $yee = $_POST['yeer'];
		//echo $invoiceno;exit;
        $man = $_POST['manth'];
       // echo $man;
        // $yeee = $_POST['yeee'];
        // $billn = $_POST['billno'];
        // $dates = $_POST['date'];
        // echo $dates;exit;
       //  $stats = $_POST['st'];
		//echo $vendor;exit;
       // $edate = $_POST['edate'];
       // $sdate = $_POST['sdate'];
       // $year = $_POST['year'];
       // $amountone = $_POST['amountone'];
       // $amounttwo = $_POST['amounttwo'];
        // $statuss = $_POST['status'];
		 $snew = date("d-m-Y", strtotime($dates));
		// $snewDate = date("d-m-Y", strtotime($sdate));
// $enewDate = date("d-m-Y", strtotime($edate));
if(empty($yee)){ $y="" ; } else {  $y="and year="."'$yee'" ;}
if(empty($man)){ $m="" ; } else {  $m ="and month="."'$man'" ;}
//if(empty($des)){ $dess="" ; } else {  $dess="and description="."'$des'" ;}
//if(empty($billn)){ $bi="" ; } else {  $bi="and bill_no="."'$billn'" ;}
//if(empty($dates)){ $dee="" ; } else {  $dee="and send_date="."'$dates'" ;}
//if(empty($stats)){ $stt="" ; } else {  $stt="and status="."'$stats'" ;}
//if(empty($vendor)){ $ven="" ; } else { $ven="and description like"."'%$vendor%'" ;}
//if(empty($sdate)){ $date="" ; } else {  $date="and dates BETWEEN " . "'$snewDate'" .  " and " ."'$enewDate'";}
//if(empty($year)){ $years="" ; } else { $years="and fineyear=".$year ;}


//if(empty($statuss)){ $status="" ; } else { $status="and status =".$statuss ;}
     ?> 
							<div id="printableArea" class="col-md-12 pdn-sbrws" style="background: #cccccc38;">
							
							    <div class="row pddnrw">
									<div class="row">
										<center>
											<div class="row">
										 <a role="button" class="btn btn-primary " style="padding-left: 25px;padding-right: 25px;" onclick="printDiv('printableArea')" >Print</a>
										
											
										
											 <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Receipt_report/report/'.$man);?>">Download</a>
											 <h2 class="scn-2mg">Badan Pengurusan Bersama Wangsa 118</h2> 
												<p class="">Pejabat Pengurusan,Suite 8-12,Wangsa 118,No.8,jalan Wangsa Delima,wangsa Maju,53300 Kuala Lumpur,
													Kuala  Lumpur ,Malaysia.
													</p>
													<p>Tel:03-41314188 Fax : Email:management:wangsa118@gmail.com</p> 
											</div>
											
										<div class="row" style="margin-top: 60px;">
											
											
											 <h2 class="scn-2mg">Receipts & Payments</h2> 
											
													<p>As at 30 sep 2018 </p> 
											</div>
											
										
										</center>
								    </div>
							
							
							
							
									<div class="alltblpd">
									
								
										
								
									
										
								
								
								   <div class="row sbrow1">
										<div class="col-md-4 col-sm-4 col-xs-4">
										<p><b>Balance b/f</b></p>
										
										
										</div>
										<div class="col-md-8 col-sm-8 col-xs-8">
                                            
										    
											 
											<div class="row">
												<div class="col-md-4 col-sm-4 col-xs-4">
												  
												</div>
												<div class="col-md-4 col-sm-4 col-xs-4">
												   <p style="border-top: 1px solid #cccc;border-top: 1px solid #cccc;border-bottom: 2px solid black;padding: 8px;">
												   
												   
												   
												   <span><b>00.0</b></span></p>
												</div>
												<div class="col-md-4 col-sm-4 col-xs-4"></div>
											 </div> 
											 
											
										</div>
										
									</div>	
										
										
									<div class="row sbrow1">
										<div class="col-md-4 col-sm-4 col-xs-4">
										<p class="mnhdng-1"><b>Receipts</b></p>
										<p><b>  Maintenance Charges</b></p>
										<p><b>  Sinking Fund</b></p>
										<p><b> Insurance</b></p>
										<p><b> Quit Rent</b></p>
										<p><b> Deposit - Renovation</b></p>
										<p><b> Rental - Car Park</b></p>
										
										
										
										</div>
										
										
										<div class="col-md-8 col-sm-4 col-xs-4">
                                            <div class="row">
												<div class="col-md-4 col-sm-4 col-xs-4">
												  <p></p><br>
												    <p></p><br>
												</div>
												
<?php	
//echo "SELECT * FROM  bms_property_credit where status = '0' $y $m";

	?>											<div class="col-md-4 col-sm-4 col-xs-4">
												  <p></p><br>
												    
												     <?php
												     $querydp = $this->db->query("SELECT amount FROM bms_property_credit where month='$man' and category_subcat ='MaintenanceFee'");
                                               //  $codd = $querydp->num_rows();
                                                
                                              foreach ($querydp->result() as $rowpp)
                                               
                                              { $ownner += $rowpp->amount; }?>
                                                     <p><?php if($ownner){ echo $ownner;}else{ echo "0";} ?></p>
                                                    
                                                     <?php
												     $qr = $this->db->query("SELECT amount FROM bms_property_credit where month='$man' and category_subcat ='Sinking Fund'");
												    // $c = $qr->num_rows();
												 //echo $c ;exit;
                                               
                                              foreach ($qr->result() as $r)
                                               
                                              {  $o += $r->amount; }?>
											         <p><?php if($o){ echo $o;}else{ echo "0";} ?></p>
											         
											          <?php
												     $qrm = $this->db->query("SELECT amount FROM bms_property_credit where month='$man' and category_subcat ='Insurance'");
												    // $c = $qr->num_rows();
												 //echo $c ;exit;
                                               
                                              foreach ($qrm->result() as $rm)
                                               
                                              { $on += $rm->amount; }?>
											         <p><?php if($on){ echo $on;}else{ echo "0";}?></p>
											         <?php
												     $qrmn = $this->db->query("SELECT amount FROM bms_property_credit where month='$man' and category_subcat ='Quit Rent'");
												    // $c = $qr->num_rows();
												 //echo $c ;exit;
                                               
                                              foreach ($qrmn->result() as $rmn)
                                               
                                              { $oo += $rmn->amount; }?>
											         <p><?php if($oo){ echo $oo;}else{ echo "0";}?></p>
											         <p>0</p>
											         <?php
												     $quu = $this->db->query("SELECT amount FROM bms_property_credit where month='$man' and subcategory = 'Car Park'");
												   
                                               
                                              foreach ($quu->result() as $yy)
                                               
                                              {   $md +=$yy->amount; }?>
                                              
											         <p><?php if($md){ echo $md;}else{ echo "0";}?></p>
											   <?php       $total = $ownner+$o+$on+$oo+$md; ?>
											       
												</div>
												<div class="col-md-4 col-sm-4 col-xs-4"></div>
											 </div> 
											 <div class="row">
												<div class="col-md-4 col-sm-4 col-xs-4">
												      <p><b>Total Receipts</b></p>
												</div>
												<div class="col-md-4 col-sm-4 col-xs-4">
												 
												
												      <p style="border-top: 1px solid #cccc;border-top: 1px solid #cccc;border-bottom: 2px solid black;padding: 8px;">
													  
													  
													  <span><b><?php echo  $total; ?></b></span></p>
												</div>
												<div class="col-md-4 col-sm-4 col-xs-4"></div>
											 </div>
											  <div class="row">
												<div class="col-md-4 col-sm-4 col-xs-4">
												      <p><b>Surplus/(Deficit)</b> </p>
												</div>
												<div class="col-md-4 col-sm-4 col-xs-4">
												 
												
												      <p style="border-top: 1px solid #cccc;border-top: 1px solid #cccc;border-bottom: 2px solid black;padding: 8px;">
													  
													  
													  <span><b><?php echo  $total; ?></b></span></p>
												</div>
												<div class="col-md-4 col-sm-4 col-xs-4"></div>
											 </div>
											 <div class="row">
												<div class="col-md-4 col-sm-4 col-xs-4">
												      <p><b>Balance c/f</b> </p>
												</div>
												<div class="col-md-4 col-sm-4 col-xs-4">
												 
												
												      <p style="border-top: 1px solid #cccc;border-top: 1px solid #cccc;border-bottom: 2px solid black;padding: 8px;">
													  
													  
													  <span><b>00.0</b></span></p>
												</div>
												<div class="col-md-4 col-sm-4 col-xs-4"></div>
											 </div>
										</div>
										
									</div>	
								    <div class="row sbrow1">
										<div class="col-md-6 col-sm-6 col-xs-6">
										     <p style="font-size: 16px;color: #676464;">(NOTE: Currencies are in MYR)</p>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6""></div>
                                    	
									</div>	
								</div>		
					
				                 </div>
			
							</div>
							
							
					
 </tbody>
 </table> 
      <?php } ?>	
							
							
							
						
						</div>
			</div>
		</div>
                
                
           
              <!-- /.box-body -->
              
             
          
           
            
        
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