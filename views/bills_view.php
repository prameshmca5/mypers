
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
  $this->load->view('header');?>
<?php $this->load->view('sidebar'); //echo "<pre>";print_r($properties);
error_reporting(0);  ?>
 
 <head>
<style>
.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th
{
    border: unset!important;
    //background-color: red;	
}
</style>
<link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 
  
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		 
	
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
		
</head> 
  <?php  if(!empty($common_docs)) {
                        
                        foreach ($common_docs as $key=>$val) {            
					?>
	                            
                        	 
 <div class="modal fade" id="myModal<?php echo $val->id;?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #337ab7;">
          <h4 class="modal-title" style="color: #fff;">Bill Details</h4>
          <button type="button" style="color:#fff;margin-top: -23px;" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
		<h3 class="modal-title" style="padding-left: 36%;" >Bill Details</h3>
		<hr/>
        <div class="modal-body" >
		
          <form action="#" id="form" class="form-horizontal">
		 
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Bill Status</label>
              <div class="col-md-9" style="color:red;">
               <td >UNPAID</td>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Released</label>
              <div class="col-md-9">
               <td ></td>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Batch ID</label>
              <div class="col-md-9">
								
					<td></td>

              </div>
            </div>
			<hr/>			
			<div class="form-group">
              <label class="control-label col-md-3">Additional Billing</label>
              <div class="col-md-9">
								
					<td ></td>

              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-md-3">Billing to Tenant</label>
              <div class="col-md-9">
								
					<td></td>

              </div>
            </div>	
            <hr/>			
				<div class="form-group">
              <label class="control-label col-md-3">Unit No</label>
              <div class="col-md-9">
								
					<td ><?php echo $val->unit_no; ?></td>

              </div>
            </div>
              <div class="form-group">
              <label class="control-label col-md-3">Statement Date</label>
              <div class="col-md-9">
								
					<td ><?php echo $val->tan_date; ?> </td>

              </div>
            </div>
              <div class="form-group">
              <label class="control-label col-md-3">Due date</label>
              <div class="col-md-9">
								
					<td >15-oct-2018</td>

              </div>
            </div>	
             <div class="form-group">
              <label class="control-label col-md-3">Description</label>
              <div class="col-md-9">
								
					<td ><?php echo $val->description;?></td>

              </div>			
				</div>	
				&nbsp;
              <div class="form-group">
              <label class="control-label col-md-3">Category</label>
              <div class="col-md-9">
								
					<td ><?php echo $val->category_subcat;?> </td>

              </div>			
				</div>	
               <div class="form-group">
              <label class="control-label col-md-3">Period</label>
              <div class="col-md-9">
								
					<td >Oct 2018</td>

              </div>			
				</div>	
                <div class="form-group">
              <label class="control-label col-md-3">Bill Amount(RM)</label>
              <div class="col-md-9">
								
					<td ><?php echo $val->tan_amount; ?></td>

              </div>			
					  </div>
				<hr/>
              <label style="padding-left: 26%;color: #c7c7c7;"><b>Debit Note</b></label>
               <div class="form-group">
              <label class="control-label col-md-3">Debit Note(RM)</label>
              <div class="col-md-9">
								
					<td >0.00</td>

              </div>			
				</div>
              <hr/>
                 <label style="padding-left: 26%;color: #c7c7c7;"><b>Credit Note</b></label>
               <div class="form-group">
              <label class="control-label col-md-3">Credit Note(RM)</label>
              <div class="col-md-9">
								
					<td >0.00</td>

              </div>			
				</div>
				<hr/>
			  <label style="padding-left: 26%;color: #c7c7c7;"><b>Payment</b></label>	
             
			    <div class="form-group">
              <label class="control-label col-md-3">Total paid(RM)</label>
              <div class="col-md-9">
								
					<td ></td>

              </div>			
					  </div>
					   <div class="form-group">
              <label class="control-label col-md-3">Receipt No</label>
              <div class="col-md-9">
								
					<td></td>

              </div>			
					  </div>
					   <div class="form-group">
              <label class="control-label col-md-3">Balance Due</label>
              <div class="col-md-9">
								
					<td >1,765.67</td>

              </div>			
			</div>

			  
             				
		  </table>
        </form>
        </div>
		
		
		
        
        <!-- Modal footer -->
        <div class="modal-footer" style="text-align: center;">
		
          <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
 
  <?php }}?>
 <style>
.form-horizontal .control-label {
    padding-top: 7px;
    margin-bottom: 0;
    text-align: right;
    background-color: #e8e5e4;
}
</style> 
  
  
  
 
				
  
  <?php if(isset($_POST['search']))
  {
	   "jitu";exit;
  }
  
  if (isset($_POST["search"])) {
     "Yes, mail is set";    
}else{  
     "N0, mail is not set";
}
  ?>
  
  
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    
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
					 <label><b>Bills Items</b></label>
					 <div style="float: right;">
                        <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/bms_bills/statement_view_list');?>">SOA</a>
						<a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/bms_bills/collections_view_list');?>">Collections</a>
						<a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/bms_bills/reminders_view_list');?>">Reminders</a>
						<a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/bms_bills/notice_list_view');?>">NOD</a>
						</div>
                    </div>
					&nbsp;
                   
                                                     
                    
                </div>
		<div class="row">
                                     
                    <div class="col-md-12 col-xs-12">
					
					 <div style="float: right;">
                        <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Bms_bills/late_payment_list_view');?>">Late Interest</a>
						<a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Bms_bills/credit_list_view');?>">Credit Notes</a>
						<a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Bms_bills/debit_list_view');?>">Debtors</a>
						
						</div>
                    </div>
                   <hr/>
                                                     
                    
                </div>
                				
                  <div  align="center"  style="border: 1px solid #999;border-radius: 5px;width: 100%;">
				
				 <div class="col-md-12">
				
               <div class="fillter">
			   <form action="" method="post">
                <div class="row" style="margin-top: 10px;">
                  <div class="col-md-12">
                      
                   <div class="col-md-1 fnt-txthdng" style="padding: 0px;">Property</div>
                   <div class="col-md-2">
                       <select class="form-control" id="" name="name" class="txt-fld1 wdt-inpt" style="width: 106%;" onChange="cat1(this.value);">
					 <option value="">Select Property</option>
                            <?php 
                                foreach ($properties as $key=>$val) { 
                                    $selected = isset($property_id) && trim($property_id) != '' && trim($property_id) == $val['property_id'] ? 'selected="selected" ' : '';  
                                    echo "<option value='".$val['property_id']."' ".$selected." data-value='".$val['total_units']."'>".$val['property_name']."</option>";
                                } ?> 
								  
 
                        </select>
                   </div>
                   <div class="col-md-1"></div>
                   <div class="col-md-1 fnt-txthdng"></div>
                   <div class="col-md-2"></div>
                    <div class="col-md-2"></div>
                  
					 <div class="col-md-3">
                         <input type="submit" value="Find" name="search1" class="btn btn-primary" style="margin-left: -2%;">
                   
              <a href="<?php echo base_url('index.php/Bms_bills/allshow/');?>" class="btn btn-primary">Show All</a>
              <a href="<?php echo base_url('index.php/Bms_bills/bills_view_list/');?>" class="btn btn-primary">Clear</a>
                     </div>
                     
                     
                     
                  </div>
                  
                   <div class="col-md-12" style="margin-top: 1%;">
                      
                   <div class="col-md-1 fnt-txthdng" style="padding: 0px;">Unit No</div>
                   <div class="col-md-2" id="hidee">
                       
                       <select name="unitnosd" class=" txt-fld1 wdt-inpt" id="search_txt" style="width: 106%;">
                       <option value="">Select</option>
                        <?php
                      $pro = $_SESSION['bms_default_property'];
                       $querybv = $this->db->query("SELECT unit_no FROM  bms_property_units where property_id = '$pro'");
                      
                  ?>
                <?php   foreach ($querybv->result() as $rowbv){ ?>
                       <option  value="<?php echo $rowbv->unit_no; ?>"><?php echo  $rowbv->unit_no; ?></option>
                           
                          <?php }?>
                          
                          
                        </select>
                        
                   </div>
                   <div class="col-md-2" id ="sho"></div>
                   <div class="col-md-1"></div>
                   <div class="col-md-1 fnt-txthdng" >Description</div>
                   <div class="col-md-2"><input type="text" name="des" class=" txt-fld1 wdt-inpt" id="uni" style="width: 106%;"></div>
                    <div class="col-md-2"></div>
                  
					 
                  </div>
                </div>
                
                
                <div class="row" style="margin-top: 10px;">
                  <div class="col-md-12">
                   <div class="col-md-1 fnt-txthdng" style="padding: 0px;">Bills No</div>
                   <div class="col-md-2"><input type="text" name="billno" class="txt-fld1 wdt-inpt" style="width: 106%;"></div>
                   <div class="col-md-1 fnt-txthdng" style="margin-left: 8%;">Date</div>
                   <div class="col-md-2"><input type="text" name="dateone" class=" txt-fld1 wdt-inpt datepicker" style="width: 106%;"></div>
                     <div class="col-md-1"></div>
                   
                  </div>
                </div>
                
                <div class="row" style="margin-top: 10px;">
                  <div class="col-md-12">
                   <div class="col-md-1 fnt-txthdng" style="padding: 0px;">Status</div>
                   <div class="col-md-2">
                     <select class=" txt-fld1 wdt-inpt" name="status" style="width: 106%;"><option value="">Select</option>
                   <option value="2">Unpaid</option>
                   <option value="1">Paid</option></select> 
                   </div>
                       
                       
                     <div class="col-md-1"></div>
                   <div class="col-md-1  fnt-txthdng" style="text-align: center;">Batch</div>
                   <div class="col-md-2"><input type="text" name="batch" class=" txt-fld1 wdt-inpt" style="width: 106%;"></div>
                  
                  </div>
                </div>
                
                <div class="row" style="margin-top: 10px;">
                  <div class="col-md-12">
                   <div class="col-md-1 fnt-txthdng" style="padding: 0px;">Released</div>
                   <div class="col-md-2" style="padding-right: 0px;">
				   <select class=" txt-fld1 wdt-inpt" name="release" style="width: 106%;"><option value="">Select</option>
				   <option value="0">No</option>
				   <option value="1">Yes</option>
				   </select></div>
                     <div class="col-md-1"></div>
                   <div class="col-md-1  fnt-txthdng" style="text-align: center;">Bill to Tenant</div>
                   <div class="col-md-2" style="padding-right: 0px;margin-left: -1%;">
                       <select class=" txt-fld1 wdt-inpt" name="tenant" style="width: 106%;"><option value="">Select</option>
                   <option value="0">No</option>
                   <option value="1">Yes</option></select></div>
                  
                  </div>
                </div>
                
                <div class="row" style="margin-top: 10px;">
                  <div class="col-md-12">
                   <div class="col-md-1  fnt-txthdng" style="padding: 0px;">Period</div>
                   <div class="col-md-1  fnt-txthdng" style="padding: 0px;margin-right: 3%;">From</div>
                   <div class="col-md-1"></div>
                  
                   <div class="col-md-2" style="padding-right: 0px;margin-left: -14%;">
				   
				   <input type="text" name="sdate" class=" txt-fld1 wdt-inpt datepicker" id="uni" style="width: 106%;">
				   
				   </div>
				    <div class="col-md-1  fnt-txthdng" style="text-align: center;padding: 0;">To</div>
                   <div class="col-md-2" style="padding-right: 0px;">
				    <input type="text" name="edate" class=" txt-fld1 wdt-inpt datepicker" id="uni" style="width: 106%;">
				   </div>
                  </div>
                </div>
                
                <div class="row" style="margin-top: 10px;">
                  <div class="col-md-12">
                   <div class="col-md-1  fnt-txthdng" style="padding: 0px;">Category</div>
                   <div class="col-md-2" style="padding-right: 0px;"><select class=" txt-fld1 wdt-inpt" name="category" onChange="cat(this.value);" style="width: 106%;">
				   <option  value="">Select</option>
				   <option value="Access Cart">Access Cart</option>
				   <option value="admin charges">admin charges</option>
				   <option value="Deposit">Deposit</option>
				   <option value="Fines">Fines</option>
				   <option value="Insurance">Insurance</option>
				   <option value="Legal Fees">Legal Fees</option>
				   <option value="Maintenance Fee">Maintenance Fee</option>
				   <option value="Quit Rent">Quit Rent</option>
				   <option value="Rental">Rental</option>
				   <option value="Sinking Fund">Sinking Fund</option>
				   <option value="Utilities">Utilities</option>  
				   
				   </select></div>
                   
                  
                   <div class="col-md-2" style="padding-right: 0px;">
				   <div id="hid">
				   <select class=" txt-fld1 wdt-inpt" style="width: 106%;"><option>Select</option>
				   </select>
				   </div>
				   <div class=" txt-fld1 wdt-inpt" id="showdiv" style="width: 106%;"></div>
				   </div>
                  </div>
                </div>
                
               
                 
                
               </div>
			  
             </div>
				 &nbsp;

               
				</div>
				</form>
				 &nbsp;
				 
 <?php
    if(isset($_POST['search1']))
    {
        $name = $_POST['name'];
        $unitnosd = $_POST['unitnosd'];
        $vendor = $_POST['des'];
        $datene = $_POST['dateone'];
        $billno = $_POST['billno'];
        $batch = $_POST['batch'];
        $release = $_POST['release'];
        $tenant = $_POST['tenant'];
        $batch = $_POST['batch'];
	
        $edate = $_POST['edate'];
        $sdate = $_POST['sdate'];
        $year = $_POST['year'];
        $category = $_POST['category'];
        $subcategory = $_POST['subcategory'];
         $status = $_POST['status'];
		
		 $snewDate = date("d-m-Y", strtotime($sdate));
 $enewDate = date("d-m-Y", strtotime($edate));
 
if(empty($name)){ $names="" ; } else {  $names="and property_id="."'$name'" ;}
if(empty($unitnosd)){ $unitid="" ; } else {  $unitid="and unit_no="."'$unitnosd'" ;}
if(empty($des)){ $dess="" ; } else { $dess="and description like"."'%$vendor%'" ;}
if(empty($sdate)){ $dates="" ; } else {  $date="and dates BETWEEN " . "'$snewDate'" .  " and " ."'$enewDate'";}
if(empty($dateone)){ $dats="" ; } else { $dats="and tan_date=".$dateone ;}
if(empty($billno)){ $billnos="" ; } else { $billnos="and receipt_no =".$billno ;}
if(empty($release)){ $releases="" ; } else { $releases="and released =".$release ;}
if(empty($tenant)){ $tenants="" ; } else { $tenants="and tenant =".$tenants ;}
if(empty($batch)){ $batchs="" ; } else { $batchs="and batch =".$batch ;}
if(empty($subcategory)){ $categorys="" ; } else { $categorys="and subcategory =".$category ;}
//if(empty($status)){ $statuss="" ; } else { $statuss="and payed_status =".$status ;}

if($status==1){ $statuss="and payed_status =".$status ;}
if($status==2){ $statuss="and payed_status ="."'0'" ;}
     ?> 
     
      <table id="example2" align="center" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;width: 100%;">
                <thead>
	    <tr style="background-color: #c5c1c1;">
                  <th class="hidden-xs">S No</th>   
                  <th>Statement date</th>               
                  <th>Unit No</th>
                  <th>Description</th>
				  <th>Period</th>
				  <th>Total Amt(RM)</th>
				  <th>Bal Due(RM)</th>
				   <th>Bill Status</th>
				    <th>Action</th>
                </tr>
                </thead>
                <tbody>
	 <?php 
	
// "SELECT * FROM  bms_property_credit where id > '0' $names $unitid $dess $sdates $dats $billnos $releases $tenants $batchs $categorys $statuss";
 $quer= $this->db->query("SELECT * FROM  bms_property_credit where id > '0' $names $unitid $dess $sdates $dats $billnos $releases $tenants $batchs $categorys $statuss");
 $codd = $quer->num_rows();
   
   if($codd > 0){
 $i = 1;	  
  foreach ($quer->result() as $val)
  { ?>
  
  
  
  
  <tr>
                            <td class="hidden-xs"><?php echo $i++;?></td>
                            <td><?php echo $val->tan_date;?></td>
                            <td><?php $unitno = $val->unit_no;
                            
                              $qunewpu = $this->db->query("SELECT * FROM `bms_property_units` WHERE unit_id = '$unitno'");
  foreach ($qunewpu->result() as $tttepu)
  {
        echo $unitnos = $proidpu  = $tttepu->unit_no;
  }
  
  ?></td>
							<td><?php echo $val->description;?></td>
							<td><?php echo $val->period;?></td>
							<td><?php echo $val->amount;?></td>
							<td><?php //echo $val->account_type;?></td>
							<td style="color:red;"><?php $pay = $val->payed_status ;
							if($pay==1){
							echo "PAID"; } else { echo "UNPAID"; }?></td>
							<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $val->id;?>">Details</button></td>
							 
                            
                            
                        </tr>
                        
                        
                        
                        
                        
                        
                        
                        
 <?php }$i++; }
 else {?><h3><center>No Record Found</center></h3><?php }
 ?>
 </tbody>
 </table> 
      <?php } ?>
                        

	
	 
		 
				 <?php 
			  if(empty($_POST['search1'])){  
			?>
				<?php  if(!empty($common_docs)) {?>
				<table id="example2" align="center" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;width: 100%;">
                <thead>
                <tr style="background-color: #c5c1c1;">
                  <th class="hidden-xs">S No</th>   
                  <th>Statement date</th>               
                  <th>Unit No</th>
                  <th>Description</th>
				  <th>Period</th>
				  <th>Total Amt(RM)</th>
				  <th>Bal Due(RM)</th>
				   <th>Bill Status</th>
				    <th>Action</th>
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
                            <td><?php echo $val->tan_date;?></td>
                            <td><?php $unitno = $val->unit_no;
                             $qunewpu = $this->db->query("SELECT * FROM `bms_property_units` WHERE unit_id = '$unitno'");
  foreach ($qunewpu->result() as $tttepu)
  {
        echo $unitnos = $proidpu  = $tttepu->unit_no;
  }
  
  ?></td>
							<td><?php echo $val->description;?></td>
							<td><?php echo $val->period;?></td>
							<td><?php echo $val->amount;?></td>
							<td><?php //echo $val->account_type;?></td>
								<td style="color:red;"><?php $pay = $val->payed_status ;
							if($pay==1){
							echo "PAID"; } else { echo "UNPAID"; }?></td>
							<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $val->id;?>">Details</button></td>
							 
                            
                            
                        </tr>
                       
                <?php }
                
                    } else { ?>
                        <tr>
                            <td class="text-center" colspan="4">No Record Found</td>                            
                        </tr>                    
                     <?php } ?>  
 					
                </tbody>                
              </table>
			   <div id="pagination" style="float: right;">
                       <ul class="tsc_pagination">
                        
                        <!-- Show pagination links -->
                        <?php foreach ($links as $link) {
                            echo "<li>". $link."</li>";
                         } ?>
                </div> 
			 	<?php }?>
				
			
					
                 
              <!-- /.box-body -->
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
          
        
 


		</div>
			  <?php }?> 
                </div>
	<style>
.pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
    font-size: 22px;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>	

             
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
      //  window.location.href="<?php echo base_url('index.php/opening/opening_view_list');?>?search_txt="+search_txt;
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
    xmlhttp.open("GET","<?php echo base_url(); ?>ajax/reciptview_category.php?$q="+str,true);
//	alert("<?php echo base_url(); ?>ajax/reciptview_category.php?$q="+str);
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





  <?php  
  
  $quer= $this->db->query("SELECT * FROM  bms_property_credit where id > '0' $names $unitid $dess $sdates $dats $billnos $releases $tenants $batchs $categorys $statuss");
 $codd = $quer->num_rows();
   if($codd > 0){ foreach ($quer->result() as $val) {?>
                       	 
 <div class="modal fade" id="myModal<?php echo $val->id;?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #337ab7;">
          <h4 class="modal-title" style="color: #fff;">Bill Details</h4>
          <button type="button" style="color:#fff;margin-top: -23px;" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
		<h3 class="modal-title" style="padding-left: 36%;" >Bill Details</h3>
		<hr/>
        <div class="modal-body" >
		
          <form action="#" id="form" class="form-horizontal">
		 
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Bill Status</label>
              <div class="col-md-9" style="color:red;">
               <td >UNPAID</td>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Released</label>
              <div class="col-md-9">
               <td ></td>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Batch ID</label>
              <div class="col-md-9">
								
					<td></td>

              </div>
            </div>
			<hr/>			
			<div class="form-group">
              <label class="control-label col-md-3">Additional Billing</label>
              <div class="col-md-9">
								
					<td ></td>

              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-md-3">Billing to Tenant</label>
              <div class="col-md-9">
								
					<td></td>

              </div>
            </div>	
            <hr/>			
				<div class="form-group">
              <label class="control-label col-md-3">Unit No</label>
              <div class="col-md-9">
								
					<td ><?php echo $val->unit_no; ?></td>

              </div>
            </div>
              <div class="form-group">
              <label class="control-label col-md-3">Statement Date</label>
              <div class="col-md-9">
								
					<td ><?php echo $val->tan_date; ?> </td>

              </div>
            </div>
              <div class="form-group">
              <label class="control-label col-md-3">Due date</label>
              <div class="col-md-9">
								
					<td >15-oct-2018</td>

              </div>
            </div>	
             <div class="form-group">
              <label class="control-label col-md-3">Description</label>
              <div class="col-md-9">
								
					<td ><?php echo $val->description;?></td>

              </div>			
				</div>	
				&nbsp;
              <div class="form-group">
              <label class="control-label col-md-3">Category</label>
              <div class="col-md-9">
								
					<td ><?php echo $val->category_subcat;?> </td>

              </div>			
				</div>	
               <div class="form-group">
              <label class="control-label col-md-3">Period</label>
              <div class="col-md-9">
								
					<td >Oct 2018</td>

              </div>			
				</div>	
                <div class="form-group">
              <label class="control-label col-md-3">Bill Amount(RM)</label>
              <div class="col-md-9">
								
					<td ><?php echo $val->tan_amount; ?></td>

              </div>			
					  </div>
				<hr/>
              <label style="padding-left: 26%;color: #c7c7c7;"><b>Debit Note</b></label>
               <div class="form-group">
              <label class="control-label col-md-3">Debit Note(RM)</label>
              <div class="col-md-9">
								
					<td >0.00</td>

              </div>			
				</div>
              <hr/>
                 <label style="padding-left: 26%;color: #c7c7c7;"><b>Credit Note</b></label>
               <div class="form-group">
              <label class="control-label col-md-3">Credit Note(RM)</label>
              <div class="col-md-9">
								
					<td >0.00</td>

              </div>			
				</div>
				<hr/>
			  <label style="padding-left: 26%;color: #c7c7c7;"><b>Payment</b></label>	
             
			    <div class="form-group">
              <label class="control-label col-md-3">Total paid(RM)</label>
              <div class="col-md-9">
								
					<td ></td>

              </div>			
					  </div>
					   <div class="form-group">
              <label class="control-label col-md-3">Receipt No</label>
              <div class="col-md-9">
								
					<td></td>

              </div>			
					  </div>
					   <div class="form-group">
              <label class="control-label col-md-3">Balance Due</label>
              <div class="col-md-9">
								
					<td >1,765.67</td>

              </div>			
			</div>

			  
             				
		  </table>
        </form>
        </div>
		
		
		
        
        <!-- Modal footer -->
        <div class="modal-footer" style="text-align: center;">
		
          <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
 
  <?php }
  }?>
  
  
  
