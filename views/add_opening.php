
<?php
           $emailuser = $_SESSION['bms']['email'];
           $genid = $_SESSION['bms']['genid']; 
   $querysd = $this->db->query("SELECT * FROM  url_idvalidation where user_email ='$emailuser' ORDER BY url_id DESC LIMIT 1");
  foreach ($querysd->result() as $rowsd)
  {
    $generate = $rowsd->gen_id; 
  }   
  if($generate!=$genid)
  {
      ?><script>//alert("Unauthorize user."); window.location.assign('<?php echo base_url();?>Bms_index/logout');</script><?php 
  }
  $this->load->view('header');?>
<?php $this->load->view('sidebar'); //echo "<pre>";print_r($properties); ?>
  
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   	<link rel="stylesheet" href="<?php echo base_url();?>plugins/timepicker/bootstrap-timepicker.min.css">  
  
		 
	

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
		  
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
               <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <h3><b>Opening Balance</b></h3>
                    </div>
                      <div class="row"  style="margin-top: 15px;">               
                    <div style="padding-left: 83%;">
                      
                    <div class="col-md-1 col-xs-6" style="margin-left: -62%;" >
                      <a role="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Add Opening Balance</a>
                    </div> 
                   		<div class="col-md-1 col-xs-6" style="padding-left: 28%;">
                      <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Bms_bills/bills_view_list');?>">Back to Bills</a>
                    </div>
					
                    </div></div>
                </div>
                
                
                <div class="col-md-12">
                     <form action="" method="post">  
                   <div class="col-md-1 fnt-txthdng" style="padding: 0px;">Property</div>
                   <div class="col-md-2">
                       <select class="form-control" id="" name="name" class="txt-fld1 wdt-inpt" style="width: 176%;" onChange="getblo(this.value);">
					
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
				&nbsp;	
                   
                   <div class="col-md-12 col-xs-12 no-padding">
            <div class="col-md-12 col-sm-12 col-xs-12 right-box" style="border: 1px solid #99999973;border-radius: 5px;background-color: #cccccc52;">
                                
								
						
								
								<div class="row"   >
								<div class="row"  style="    padding: 30px;">
								
						<div  class="col-md-5">		
								
								 
                   
					
					
                      <div class="col-md-5 col-xs-6">
                      
						 <div class="col-md-5 col-xs-12">  
				
                         <input type="text" name="search_txt" id="search_txt" value="" class="txt-fld1 wdt-inpt" style="width: 852%;" placeholder="Enter text to search Account name">
                    </div>
						
						
						
                    </div>
					
					</div>
					<div  class="col-md-6">
					 
					
                    <div class="col-md-4 col-xs-6">
                      
						
						
                    </div>
                        <div class="col-md-4 col-xs-6">
					  <input type="submit" value="Find" name="search1" class="btn btn-primary" style="margin-left: 143%;">
					  
					  </div>
					
                                
                    				
                       <div class="col-md-1 col-xs-2">
                       <!-- <a href="javascript:;" role="button" class="btn btn-primary list_filter"><i class="fa fa-search"></i></a>-->
						
						<input type="submit" value="Show All" name="search1" class="btn btn-primary"  style="margin-left: 876%;">
                    </div>
                        <div class="col-md-1 col-xs-2">
                       <!-- <a href="javascript:;" role="button" class="btn btn-primary list_filter"><i class="fa fa-search"></i></a>-->
						<a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Bms_bills/view_opening');?>" style="margin-left: 1323%;">Clear</a>
                    </div>    
                     
                  						   
                    </div></div>
                </div>
				
				</form>
				
				
                   
                                        
                    
                
				
				
				
								
								
                                    </div>
                                   
        </div>
					
                    
              
               
                
              </div>
              <!-- /.box-body -->
            <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #337ab7;">
          <h4 class="modal-title" style="color: #fff;">Add Opening Balance</h4>
          <button type="button" style="color:#fff;margin-top: -23px;" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
		
		<hr/>
        <div class="modal-body">
		
          <form action="<?php echo base_url('index.php/Bms_bills/add_opening');?>"role="form" id="newModalForm" method="post" class="form-horizontal">
		 
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
             
              
             <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Property</label>
              <div class="col-md-9" style="color:red;">
                <select class="form-control" id="" name="name" class="txt-fld1 wdt-inpt" style="width: 99%;" onChange="getblo1(this.value);">
					
                           <option value="">Select Property</option>
                            <?php 
                                foreach ($properties as $key=>$val) { 
                                    $selected = isset($property_id) && trim($property_id) != '' && trim($property_id) == $val['property_id'] ? 'selected="selected" ' : '';  
                                    echo "<option value='".$val['property_id']."' ".$selected." data-value='".$val['total_units']."'>".$val['property_name']."</option>";
                                } ?>   
                        </select>
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Block</label>
              <div class="col-md-9" >
               
                       <div id="hidebloc">
                       <select name="block_id" class="form-control" id="search_txt" style="width: 99%;" onChange="blo1(this.value);">
                            <option  value="">Select</option>
                       
                        </select>
                       </div>
                       
                        
              </div>
              <div class="col-md-9" id ="showbloc"></div>
            </div>
              <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Unit No</label>
              <div class="col-md-9">
               
                       <div id="hidue">
                       <select name="unitd" class="form-control" id="search_txt" style="width: 99%;">
                            <option  value="">Select</option>
                       
                        </select>
                       </div>
                       
                        
              </div>
              <div class="col-md-9" id ="showuse"></div>
            </div>
              
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Date</label>
              <div class="col-md-9" >
               <input type="text" name="redat1" class="txt-fld1 wdt-inpt datepicker" id="datepicker" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Account Name</label>
              <div class="col-md-9">
			  <textarea rows="4" cols="56" name="cudat" id="cudat" class="txt-fld1 wdt-inpt" required>	</textarea>
               
              </div>
              
            </div>
             <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Account Type</label>
              <div class="col-md-9">
			 
                <input type="text" name="char" class="txt-fld1 wdt-inpt" placeholder="">
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Account Group</label>
              <div class="col-md-9">
                <input type="text" name="overam" class="txt-fld1 wdt-inpt" id="datepicker" placeholder="Overdue Amount">
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Debit</label>
              <div class="col-md-9">
                <input type="text" name="overday" class="txt-fld1 wdt-inpt" placeholder="">
              </div>
            </div>
           	<div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Credit</label>
              <div class="col-md-9">
                <input type="text" name="tex" class="txt-fld1 wdt-inpt" placeholder="">
              </div>
            </div>	
			
            
            
              
              	
            
				
				
			    
					  
					  

			  
             				
		  </table>
        
        </div>
		
		
		
        
        <!-- Modal footer -->
        <div class="modal-footer" style="text-align: center;">
		
          <input  type="submit" class="btn btn-primary" value="Save" >
		  </form>
		   <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>  
	
<?php
    if(isset($_POST['search1']))
    {
       // echo "fdf";exit;
        $prom = $_POST['name'];
        $block = $_POST['block_id'];
       // echo $block;exit;
         $unit = $_POST['unitnosd'];
        $invoiceno = $_POST['search_txt'];
	//	echo $invoiceno;exit;
      //  $vendor = $_POST['meter'];
		//echo $vendor;exit;
		 // $sdate = $_POST['sdate'];
        //  $edate = $_POST['edate'];
      
       // $year = $_POST['year'];
       // $amountone = $_POST['amountone'];
       // $amounttwo = $_POST['amounttwo'];
        // $statuss = $_POST['status'];
		
	//	 $snewDate = date("Y-m-d", strtotime($sdate));
// $enewDate = date("Y-m-d", strtotime($edate));
if(empty($prom)){ $pron="" ; } else {  $pron="and property_id="."'$prom'" ;}
if(empty($block)){ $blo="" ; } else {  $blo="and block_id="."'$block'" ;}
if(empty($unit)){ $un="" ; } else {  $un="and unit_no="."'$unit'" ;}
if(empty($invoiceno)){ $invoice="" ; } else {  $invoice="and account_name="."'$invoiceno'" ;}
//if(empty($vendor)){ $ven="" ; } else {  $ven="and meter_no="."'$vendor'" ;}
//if(empty($vendor)){ $ven="" ; } else { $ven="and description like"."'%$vendor%'" ;}
//if(empty($sdate)){ $date="" ; } else {  $date="and date BETWEEN " . "'$snewDate'" .  " and " ."'$enewDate'";}
//if(empty($year)){ $years="" ; } else { $years="and fineyear=".$year ;}


//if(empty($statuss)){ $status="" ; } else { $status="and status =".$statuss ;}
     ?> 
     
      <table id="example2" align="center" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;width: 100%;">
                <thead>
	         <tr>
                  <th class="hidden-xs">C/N No</th>   
                  <th>date</th>               
                  <th>account_name</th>
				  <th>account_type</th>
                  <th>account_group</th>
				  <th>debit</th>
				   <th>credit</th>
                </tr>
                </thead>
                <tbody>
	 <?php 
	
  "SELECT * FROM  bms_property_openingbalance where status = '0' $pron $blo $un $invoice";
 $quer= $this->db->query("SELECT * FROM  bms_property_openingbalance where status = '0' $pron $blo $un $invoice");
 $codd = $quer->num_rows();
   
   if($codd > 0){
 $i = 1;	  
  foreach ($quer->result() as $vals)
  { ?>
                    <tr>
                           <tr>
                            <td class="hidden-xs"><?php echo $i++;?></td>
                            <td><?php echo $vals->date;?></td>
                            <td><?php echo $vals->account_name;?></td>
							<td><?php echo $vals->account_type;?></td>
							<td><?php echo $vals->account_group;?></td>
							<td><?php echo $vals->debit;?></td>
								<td><?php echo $vals->credit;?></td>
                            
                            
                        </tr>
                            
                            
                        </tr>
 <?php }$i++; }
 else {?><h3><center>No Record Found</center></h3><?php }
 ?>
 </tbody>
 </table> 
  
      <?php } ?>	
			 
              <div class="box-body">
			  <div id="showdiv"></div>
		   <?php if(!empty($common_docs)) {?>
		  
		   
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="hidden-xs">C/N No</th>   
                  <th>date</th>               
                  <th>account_name</th>
				  <th>account_type</th>
                  <th>account_group</th>
				  <th>debit</th>
				   <th>credit</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $offset = 0;
                    //$task_status = $this->config->item('task_db_status');
                    if(!empty($common_docs)) {
                        //$prop_doc_download_desi_id = $this->config->item('prop_doc_download_desi_id');
                        //$task_status = $this->config->item('task_db_status');
                        foreach ($common_docs as $key=>$val) { ?>
                        <tr>
                            <td class="hidden-xs"><?php echo ($offset+$key+1);?></td>
                            <td><?php echo $val->date;?></td>
                            <td><?php echo $val->account_name;?></td>
							<td><?php echo $val->account_type;?></td>
							<td><?php echo $val->account_group;?></td>
							<td><?php echo $val->debit;?></td>
								<td><?php echo $val->credit;?></td>
                            
                            
                        </tr>
                    
                <?php }
                
                    } else { ?>
                        <tr>
                            <td class="text-center" colspan="4">No Record Found</td>                            
                        </tr>                    
                    <?php } ?>                
                </tbody>                
              </table>
			  
		  
            </div>
			
			
			
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
<script src="<?php echo base_url();?>plugins/timepicker/bootstrap-timepicker.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/loadingoverlay.js"></script>  
<script>

$(document).ready(function () {
    
    $('#property_id').focus();
    $('.msg_notification').fadeOut(5000);
    
    $('.list_filter').click(function () {
        var search_txt = $('#search_txt').val().replace(/^\s+|\s+$/g,"");
        window.location.href="<?php echo base_url('index.php/Bms_bills/credit_list_view');?>?search_txt="+search_txt;
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

    function cat(str) {
      var ven_text = $('#search_txt').val();
  // alert(ven_text);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showdiv").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url(); ?>ajax/find_credit.php?$q="+ven_text,true);
	//alert("<?php echo base_url(); ?>ajax/find_credit.php?$q="+ven_text);
    xmlhttp.send();
    document.getElementById("hid").style.display = "none";
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<script>
$(function() {

  $("#newModalForm").validate({
    rules: {
      "redat": "required",
      "cudat": "required",
      "char": "required",
      "overday": "required",
      "overam": "required",
      "tex": "required"
      
    },
    messages: {
      "redat": "Please Enter Your Date",
      "cudat": "Please Enter Your Description",
      "char": "Please Enter Your Charge Code",
      "overday": "Please Enter Your Tan Date",
      "overam": "Please Enter Your Amount",
       "tex": "Please Enter Your Tax_Amt"
     
      
      
    },
    errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );

			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else if ( element.prop( "id" ) === "datepicker" ) {
				error.insertAfter( element.parent( "div" ) );
			} else {
				error.insertAfter( element );
			}
		},
			highlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
		}
  });
});


$(function () {    
    //Date picker
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true
    });
    
    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    });
  })
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

    function cat2(str) {
  //   alert(str);
   
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showss").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url(); ?>ajax/bank_unit.php?$q="+str,true);
//	alert("<?php echo base_url(); ?>ajax/unit_select.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hiden").style.display = "none";
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
