
<?php 
           $emailuser = $_SESSION['bms']['email'];
                $genid = $_SESSION['bms']['genid']; 
               
   $query1 = $this->db->query("SELECT * FROM  url_idvalidation where user_email ='$emailuser' ORDER BY url_id DESC LIMIT 1");
  foreach ($query1->result() as $row1)
  {
    $generate = $row1->gen_id; 
  }   
  if($generate!=$genid)
  {
      ?><script>//alert("Unauthorize user."); window.location.assign('<?php echo base_url();?>Bms_index/logout');</script><?php 
  }
  $this->load->view('header');
?>
<?php $this->load->view('sidebar'); //echo "<pre>";print_r($properties); ?>
 
 <head>
<style>
.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th
{
    border: unset!important;
    //background-color: red;	
}
</style>

</head> 
  
  
  
  
  
  
  
  
  
  
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
     
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		 <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
		  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
		  
		  
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
		  
		<style>
		
		
		#pagination{
    margin: 40 40 0;
}
.input_text {
    display: inline;
    margin: 100px;
}
.input_name {
    display: inline;
    margin: 65px;
}
.input_email {
    display: inline;
    margin-left: 73px;
}
.input_num {
    display: inline;
    margin: 36px;
}
.input_country {
    display: inline;
    margin: 53px;
}
ul.tsc_pagination li a 
{ 
    border:solid 1px; 
    border-radius:3px; 
    -moz-border-radius:3px;
    -webkit-border-radius:3px;
    padding:6px 9px 6px 9px;
}
ul.tsc_pagination li 
{
    padding-bottom:1px;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{ 
    color:#FFFFFF; 
    box-shadow:0px 1px #EDEDED;
    -moz-box-shadow:0px 1px #EDEDED;
    -webkit-box-shadow:0px 1px #EDEDED; 
}
ul.tsc_pagination 
{ 
    margin:4px 0;
    padding:0px; 
    height:100%;
    overflow:hidden; 
    font:12px 'Tahoma';
    list-style-type:none; 
}
ul.tsc_pagination li 
{ 
    float:left;
    margin:0px;
    padding:0px; 
    margin-left:5px;
}
ul.tsc_pagination li a 
{ 
    color:black; 
    display:table-cell; 
    text-decoration:none;
    padding:7px 10px 7px 10px; 
}
ul.tsc_pagination li a img 
{
    border:none;
}
ul.tsc_pagination li a
{ 
    color:#0A7EC5;
    border-color:#8DC5E6; 
    background:#F8FCFF; 
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{ 
    text-shadow:0px 1px #388DBE;
    border-color:#3390CA; 
    background:#58B0E7; 
    background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
    background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #3c8dbc), color-stop(0.02, #3c8dbc), color-stop(1, #58B0E7));
}
		
		
		 .recv1
            {
				font-size: 25px;
				font-weight: 600;

            }		 
		  
		  .content12 {
    min-height: 250px;
    padding: 15px;
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
	
	}
	
	.box1.box-primary1 {
    border-top-color: #3c8dbc;
}
	
.box1 {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
}
	.btn-primary1 {
    background-color: #3c8dbc;
    border-color: #367fa9;
	color:#fff;
	    margin-top: 10px;
    float: right;
	 padding: 6px;
    border-radius: 5px;
	
	
}
	.rwpdn
	{
	    padding: 15px;
	}
	
	.wrng-txt
	{
	    font-size: 14px;
		color: red;
		margin-top: -20px;
	}
	.new-prches
	{
	    background-color: #ccc;
	  
		 margin-top: -20px;
	}
	
	
	.nwprch
	{
	    margin-top: 11px;
		
		}
		
		.bdrs-pd
		{
		    padding: 40px;
           margin-top: -20px;
		}
		
		.all-bdrs
		{
		border: 1px solid #7d7c7c;
		}
		.txt-fld1
		{
		    padding: 6px;
		    border-radius: 4px;
		}
		.topmgn{
		
		      border: 1px solid #ccc; 
		padding: 30px;
		}
		.wdt-inpt
		{
		width: 60%;
		}
		
		.byfrm
		{
		font-weight: 600;
		
		}
		.wdt-inpt1
		{
		
		width: 30%;
		}
		.wdt-inpt2
		{
		    width: 46%;
		
		}
		
		.frmscnd-rwpdn
		{
		
		    margin-top: 20px;
		
		
		}
		.tpmgnad
		{
		    margin-top: 12px;
		}
		.slect-fld
		{
		
	        padding: 6px;
			border-radius: 4px;
			width: 60%;
		}
		.txt-rd
		{
		border-radius: 4px;
		    border: 2px solid #b1abab;
		}
		
		.newrwfm-2
		{
		
		    margin-top: 60px;
    
		
		}
		.lnitm
		{
		  padding: 32px;
         color: #ada8a8;
		
		}
		.wdsrt
		{
		width: 80px;
		}
		.wdsrt1 {
    width: 100px;
}
	
	.sbbxs
	{
		margin-top: 20px;

	}
		.slect-fld1 {
    padding: 6px;
    border-radius: 4px;
    width: 100%;
}


.btmrwpdn
{
    padding: 40px;

}

.scnrw-clr
{
    border: 1px solid #9a9393;
    padding: 30px;
    background: #cccccc63;

}

.btn-primary2 {
    background-color: #3c8dbc;
    border-color: #367fa9;
    color: #fff;
    margin-top: 10px;
   
    padding: 6px;
    border-radius: 5px;
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
          <div class="box box-primary">
            <!--div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div-->
            <!-- /.box-header -->
              <div class="box-body" style="padding-top: 15px;">
              
              <?php if(isset($_SESSION['flash_msg']) && trim( $_SESSION['flash_msg'] ) != '') {
                    //if($_GET['login_err'] == 'invalid')
                    echo '<div class="alert alert-success msg_notification"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>';
                    echo '</strong>'.$_SESSION['flash_msg'].'</div>';
                    unset($_SESSION['flash_msg']);
                }
            ?>
			<div class="col-md-12 col-xs-12" style="border: 1px solid #999;border-radius: 2px;background-color: #f1f0f0;">
			&nbsp;
        <div class="row">
                                     
                    <div class="col-md-12 col-xs-12">
					 <label><b>Bill Collection</b></label>
					 <div style="float: right;">
                        <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/bms_bills/bills_view_list');?>">Back To Bills</a>
						
						</div>
                    </div>
					&nbsp;
                   
                     <div class="col-md-12">
                    <form action="" method="post">  
                   <div class="col-md-1 fnt-txthdng" style="padding: 0px;">Property</div>
                   <div class="col-md-2">
                      <select class="form-control" id="" name="name" class="inp txt-fld" style="width: 168%;margin-bottom: 6%;" onChange="getblo(this.value);">
						 <option value="">Select Property</option>
                            <?php 
                                foreach ($properties as $key=>$val) { 
                                    $selected = isset($property_id) && trim($property_id) != '' && trim($property_id) == $val['property_id'] ? 'selected="selected" ' : '';  
                                    echo "<option value='".$val['property_id']."' ".$selected." data-value='".$val['total_units']."'>".$val['property_name']."</option>";
                                } ?> 
								 
                        </select>

                   </div>
                  
                   <div class="col-md-1"></div>
                   <div class="col-md-1 fnt-txthdng">Block</div>
                  
                   <div class="col-md-2" >
                       <div id="hideblock"> 
                       <select name="unitnosd" class="form-control" id="search_txt" style="width: 106%;" onChange="blo(this.value);">
                            <option  value="">Select</option>
                       
                        </select>
                       
                       
                        
                        </div>
                        <div class="col-md-2" id ="showblock" style="width: 106%;"></div>
                       </div>
                       
                  
                  
                  
                  
                   <div class="col-md-1 fnt-txthdng">Unit No</div>
                   <div class="col-md-2" id="hidu">
                       
                       <select name="unitnosd" class="form-control" id="search_txt" style="width: 106%;" >
                            <option  value="">Select</option>
                       
                        </select>
                       
                       </div>
                        <div class="col-md-2" id ="showus"></div>
                
					 
                  </div>                                
                    
                </div>
			<div class="row">
                   
					 <div class="col-md-3 col-xs-6" >
                       <td><a role="button" class="btn btn-primary " href="<?php echo base_url('index.php/Bms_bills/download/');?>">Dowonload</a></td>
					
                    </div>
					 <div class="col-md-6 col-xs-6" style="margin-top: -2%;margin-left: 84%;" >
                       <td><input type="submit" value="Show All" name="search" class="btn btn-primary"></td>
					   <td><a role="button" class="btn btn-primary " style="" href="<?php echo base_url('index.php/bms_bills/collections_view_list');?>">clear</a></td>
                    </div>
					
                  </form>
					                    
                                        
                    
                </div>
                &nbsp;
  <?php
    if(isset($_POST['search']))
    {
        //echo "fdf";exit;
        $pron = $_POST['name'];
        $unit = $_POST['unitnosd'];
       // echo $unit;exit;
      //  $invoiceno = $_POST['invoiceno'];
      //  $vendor = $_POST['vendor'];
      //  $edate = $_POST['edate'];
       // $sdate = $_POST['sdate'];
       // $year = $_POST['year'];
       // $amountone = $_POST['amountone'];
       // $amounttwo = $_POST['amounttwo'];
       //  $statuss = $_POST['status'];
		
	//	 $snewDate = date("d-m-Y", strtotime($sdate));
// $enewDate = date("d-m-Y", strtotime($edate));
if(empty($pron)){ $pr="" ; } else {  $pr="and property_id="."'$pron'" ;}
if(empty($unit)){ $un="" ; } else {  $un="and unit_no="."'$unit'" ;}
//if(empty($invoiceno)){ $invoice="" ; } else {  $invoice="and invoice_no="."'$invoiceno'" ;}

//if(empty($vendor)){ $ven="" ; } else { $ven="and vender_name like"."'%$vendor%'" ;}
//if(empty($sdate)){ $date="" ; } else {  $date="and dates BETWEEN " . "'$snewDate'" .  " and " ."'$enewDate'";}
//if(empty($year)){ $years="" ; } else { $years="and fineyear=".$year ;}


//if(empty($statuss)){ $status="" ; } else { $status="and status =".$statuss ;}
     ?> 
     
      <table id="example2" align="center" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;width: 96%;">
                <thead>
	    <tr style="background-color: #c5c1c1;">
                  <th class="hidden-xs">S No</th>   
                  <th>Statement Date</th>               
                  <th>Description</th>
                  <th>Category</th>
				  <th>Period	</th>
				  <th>Total Billed</th>
				  <th>Total Paid</th>
				  <th>Total C/N</th>
				  <th>% payment</th>
                </tr>
                </thead>
                <tbody>
	 <?php 
	 
 "SELECT * FROM  bms_property_credit where statu = '0' $pr $un";	 
$quer= $this->db->query("SELECT * FROM  bms_property_credit where statu = '0' $pr $un");
 //$quer= $this->db->query("SELECT * FROM  bms_property_credit where tenant = '0' $pro $un");
   $codd = $quer->num_rows();
   if($codd > 0){
       $i=1;
  foreach ($quer->result() as $rowe)
  { ?>
 <tr>
                            <td class="hidden-xs"><?php echo $i++;?></td>
                            <td><?php echo $rowe->tan_date; ?></td>
                            <td><?php echo $rowe->description;?></td>
							<td><?php echo $rowe->category_subcat;?></td>
							<td>jul 2018</td>
							<td><?php echo $rowe->amount;?></td>
							<td>273,453.45</td>
							<td>0.00</td>
							<td>40</td>
							
                            
                            
                        </tr>
 <?php } $i++; }
 else {?><h3><center>No Record Found</center></h3><?php }
 ?>
 </tbody>
 </table> 
      <?php } ?>  
                &nbsp;
 <div class="box-body">
   <?php if(!empty($common_docs)) {?>
              <table id="example2" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;">
                <thead>
                <tr style="background-color: #c5c1c1;">
                  <th class="hidden-xs">S No</th>   
                  <th>Statement Date</th>               
                  <th>Description</th>
                  <th>Category</th>
				  <th>Period	</th>
				  <th>Total Billed</th>
				  <th>Total Paid</th>
				  <th>Total C/N</th>
				  <th>% payment</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $offset = 0;
                    //$task_status = $this->config->item('task_db_status');
                    if(!empty($common_docs)) {
                        $prop_doc_download_desi_id = $this->config->item('prop_doc_download_desi_id');
                        //$task_status = $this->config->item('task_db_status');
                        foreach ($common_docs as $key=>$val) {            
						?>
						
                        <tr>
                            <td class="hidden-xs"><?php echo ($offset+$key+1);?></td>
                            <td><?php echo $val->tan_date; ?></td>
                            <td><?php echo $val->description;?></td>
							<td><?php echo $val->category_subcat;?></td>
							<td>jul 2018</td>
							<td><?php echo $val->amount;?></td>
							<td>273,453.45</td>
							<td>0.00</td>
							<td>40</td>
							
                            
                            
                        </tr>
                       
                <?php }
                
                    } else { ?>
                        <tr>
                            <td class="text-center" colspan="4">No Record Found</td>                            
                        </tr>                    
                     <?php } ?>  
 					
                </tbody>                
              </table>
			  
			  
			  
			  
			  
			  
			
         
		 
		 
          <!--div class="row ciov" style="margin: 0px !important;padding: 10px 0; border-top: 1px solid #DCDCDC;border-bottom: 1px solid #DCDCDC;background-color: #F0F0F0;">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding: 0px;">
                    
                    
                    Show: &nbsp;<select id="records_per_page">
                            <option value="10" selected="selected">10 per page</option>
                            <option value="25">25 per page</option>
                            <option value="50">50 per page</option>
                            <option value="100">100 per page</option>
                        </select>
                    
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right"  style="padding: 0px;">
                    
                    <div class="paging_right_div" style="padding-right: 5px;">
                        <span class="previous_link"></span> 
                        <span>Page <input class="publi_paging" size="2" pattern="[0-9]*" value="1" type="text"> of <span class="tot_pag_span small_loader"></span></span>
                        <span class="next_link"><a href="javascript:;" > <span class="glyphicon glyphicon-triangle-right" style="color: green;"></span></a></span> <input id="tot_pages" value="" type="hidden">                                           
                    </div>
                </div>
                
            </div--> 
            
         </div>
				
				
				
              </div>
              <!-- /.box-body -->
			  
			  
                </div>
			  

              <div class="box-body">
             
			   
			   
			  
			  
			  
			  
			
         
		 
		 
          <!--div class="row ciov" style="margin: 0px !important;padding: 10px 0; border-top: 1px solid #DCDCDC;border-bottom: 1px solid #DCDCDC;background-color: #F0F0F0;">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding: 0px;">
                    
                    
                    Show: &nbsp;<select id="records_per_page">
                            <option value="10" selected="selected">10 per page</option>
                            <option value="25">25 per page</option>
                            <option value="50">50 per page</option>
                            <option value="100">100 per page</option>
                        </select>
                    
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right"  style="padding: 0px;">
                    
                    <div class="paging_right_div" style="padding-right: 5px;">
                        <span class="previous_link"></span> 
                        <span>Page <input class="publi_paging" size="2" pattern="[0-9]*" value="1" type="text"> of <span class="tot_pag_span small_loader"></span></span>
                        <span class="next_link"><a href="javascript:;" > <span class="glyphicon glyphicon-triangle-right" style="color: green;"></span></a></span> <input id="tot_pages" value="" type="hidden">                                           
                    </div>
                </div>
                
            </div--> 
            <div id="pagination" style="float: right;">
                       <ul class="tsc_pagination">
                        
                        <!-- Show pagination links -->
                        <?php foreach ($links as $link) {
                            echo "<li>". $link."</li>";
                         } ?>
                </div> 
         
		 </div>
   <?php }?>
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
        window.location.href="<?php echo base_url('index.php/opening/opening_view_list');?>?search_txt="+search_txt;
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
<script> 

    function getblo(str) {
     
   //alert("gettt");
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showblock").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/get_recblock.php?$q="+str,true);
   // alert("<?php echo base_url();?>ajax/get_recblock.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hideblock").style.display = "none";
    }
    </script>
    <script> 

    function getblo1(str) {
     
   //alert("gettt");
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showbloc").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/crdit_selete_block.php?$q="+str,true);
   // alert("<?php echo base_url();?>ajax/get_recblock.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hidebloc").style.display = "none";
    }
    </script>
      <script> 

    function blo(str) {
     
  // alert("gettt");
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showus").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/get_recunit.php?$q="+str,true);
  //  alert("<?php echo base_url();?>ajax/getunits.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hidu").style.display = "none";
    }

    </script>
     <script> 

    function blo1(str) {
     
   //alert("gettt");
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showuse").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/cridit_unit.php?$q="+str,true);
  //  alert("<?php echo base_url();?>ajax/getunits.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hidue").style.display = "none";
    }

    </script>
