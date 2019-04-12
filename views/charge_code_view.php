
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
<?php $this->load->view('sidebar'); //echo "<pre>";print_r($properties); ?>
  
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
  
		 
<!--	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->

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
                        <h3><b>Charge Code</b></h3>
                    </div>
                      <div class="row"  style="margin-top: 15px;">               
                    <div style="padding-left: 83%;">
                      
                    <div class="col-md-1 col-xs-6" style="margin-left: -55%;" >
                      <a role="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Add Charge Code</a>
                    </div> 
                   		<div class="col-md-1 col-xs-6" style="padding-left: 28%;" >
                      <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Bms_bills/bills_view_list');?>">Back to Bills</a>
                    </div>
					
                    </div></div>
                </div>
				&nbsp;	
				 <form method="POST">
                   <div class="col-md-12" style="margin-bottom: 1%;">
                    
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
                   <div class="col-md-12 col-xs-12 no-padding">
            <div class="col-md-12 col-sm-12 col-xs-12 right-box" style="border: 1px solid #99999973;border-radius: 5px;background-color: #cccccc52;">
                                
								
						
								
								<div class="row"   >
								<div class="row"  style="    padding: 30px;">
								
						<div  class="col-md-5">		
								
								 
                   
					
					
                      <div class="col-md-5 col-xs-6">
                      
						 <div class="col-md-5 col-xs-12">  
				
                         <input type="text" name="search_txt" id="search_txt" value="" class="txt-fld1 wdt-inpt" style="width: 852%;" placeholder="Enter text to search Charge Name">
                    </div>
						
						
						
                    </div>
					
					</div>
					<div  class="col-md-6">
					 
					
                    <div class="col-md-4 col-xs-6">
                      
						
						
                    </div>
                        <div class="col-md-4 col-xs-6">
					  
					  
					   <input type="submit" value="Find" name="search" class="btn btn-primary " style="margin-left:143%">
					  </div>
					
                                
                    				
                       <div class="col-md-1 col-xs-2">
                       <!-- <a href="javascript:;" role="button" class="btn btn-primary list_filter"><i class="fa fa-search"></i></a>-->
					
						  <input type="submit" value="Show All" name="search" class="btn btn-primary" style="margin-left: 905%;">
                    </div>
                        <div class="col-md-1 col-xs-2">
                       <!-- <a href="javascript:;" role="button" class="btn btn-primary list_filter"><i class="fa fa-search"></i></a>-->
						<a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Bms_bills/charge_code');?>" style="margin-left: 1421%;">Clear</a>
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
          <h4 class="modal-title" style="color: #fff;">Add Chage Code</h4>
          <button type="button" style="color:#fff;margin-top: -23px;" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
		
		<hr/>
        <div class="modal-body">
		
          <form action="<?php echo base_url('index.php/Bms_bills/add_charge_code');?>" role="form" id="newModalForm" method="post" class="form-horizontal">
		 
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
              <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Property</label>
              <div class="col-md-9" style="color:red;">
               <select class="form-control" id="" name="name" class="inp txt-fld" style="width: 99%;" onChange="getblo1(this.value);">
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
              <div class="col-md-9">
               
                       <div id="hidebloc">
                       <select name="redat" class="form-control" id="search_txt" style="width: 99%;" onChange="blo1(this.value);">
                            <option  value="">Select</option>
                       
                        </select>
                       </div>
                       
                        
              </div>
              <div class="col-md-9" id ="showbloc"></div>
            </div>
            
            
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Unit No</label>
              <div class="col-md-9" >
               
                       <div id="hidue">
                       <select name="redat" class="form-control" id="search_txt" style="width: 99%;">
                            <option  value="">Select</option>
                       
                
                        </select>
                       </div>
                       
                        
              </div>
              <div class="col-md-9" id ="showuse"></div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Charge Code</label>
              <div class="col-md-9" style="color:red;">
               <input type="text" name="name1" class="form-control" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Charge Description</label>
              <div class="col-md-9">
			  <input type="text" name="code" class="form-control" placeholder="">
               
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Calculation Method</label>
              <div class="col-md-9">
                 <select name="Method" class="form-control" style="width: 99%;">
                       
                        
               
                       
                       <option  value="By Area Width">By Area Width</option>
                           
                         
                        </select> 
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Charge By</label>
              <div class="col-md-9">
			  <input type="text" name="by" class="form-control" placeholder=""><p>par area menasurment </p>
               
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Rate</label>
              <div class="col-md-9">
			  <input type="text" name="Rate" class="form-control" placeholder="">
               
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Reporting UOM</label>
              <div class="col-md-9">
			  <input type="text" name="UOM" class="form-control" placeholder="">
               
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Accounts No</label>
              <div class="col-md-9">
			  <input type="text" name="Accounts" class="form-control" placeholder="">
               
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Status</label>
              <div class="col-md-9">
               <select name="sta" class="form-control" style="width: 99%;">
                       <option  value="">Select</option>
                        
               
                       
                       <option  value="Active">Active</option>
                       <option  value="Deactive">Deactive</option>    
                         
                        </select>
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
    if(isset($_POST['search']))
    {
        //echo "fdf";exit;
        $pron = $_POST['name'];
       //echo $pron;exit;
        $unit = $_POST['unitnosd'];
        $tex = $_POST['search_txt'];
        
      //  echo $tex;exit;
       
      //  $vendor = $_POST['vendor'];
      //  $edate = $_POST['edate'];
       // $sdate = $_POST['sdate'];
     //   $year = $_POST['year'];
      //  $amountone = $_POST['amountone'];
      //  $amounttwo = $_POST['amounttwo'];
      //   $statuss = $_POST['status'];
		
	//	 $snewDate = date("d-m-Y", strtotime($sdate));
// $enewDate = date("d-m-Y", strtotime($edate));
if(empty($pron)){ $pr="" ; } else {  $pr="and property_id="."'$pron'" ;}
if(empty($unit)){ $un="" ; } else {  $un="and unit_no="."'$unit'" ;}
if(empty($tex)){ $tx="" ; } else {  $tx="and charge_name="."'$tex'" ;}

//if(empty($invoiceno)){ $invoice="" ; } else {  $invoice="and invoice_no="."'$invoiceno'" ;}

//if(empty($vendor)){ $ven="" ; } else { $ven="and vender_name like"."'%$vendor%'" ;}
//if(empty($sdate)){ $date="" ; } else {  $date="and dates BETWEEN " . "'$snewDate'" .  " and " ."'$enewDate'";}
//if(empty($year)){ $years="" ; } else { $years="and fineyear=".$year ;}


//if(empty($statuss)){ $status="" ; } else { $status="and status =".$statuss ;}
     ?> 
     
      <table id="example2" align="center" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;width: 96%;">
                <thead>
	    <tr style="background-color: #cccccc6b;">
                   <th class="hidden-xs">C/N No</th>   
                             
                  <th>Charge Code</th>
				 <th>Description</th>
				 <th>Description</th>
				 <th>Calculation Method</th>
				 <th>Status</th>
                </tr>
				 
                </tr>
                </thead>
                <tbody>
	 <?php 
 "SELECT * FROM  charge_code where status = '0' $pr $un $tx ";
 $quer= $this->db->query("SELECT * FROM  charge_code where status = '0' $pr $un $tx ");
   $codd = $quer->num_rows();
   if($codd > 0){
       $i=1;
  foreach ($quer->result() as $rowe)
  { ?>
 <tr>
                            <td class="hidden-xs"><?php echo $i++;?></td>
                            <td><?php echo $rowe->charge_code;?></td>
                            <td><?php echo $rowe->charge_description;?></td>
                            <td><?php echo $rowe->calculation_method;?></td>
                            <td><?php echo $rowe->statu;?></td>
						 <td> 
                       <!--<a href="#" data-toggle="modal" data-target="#myModal1<?php echo $rowe->id;?>" title="Edit"><i class="fa fa-edit"></i></a>-->
                       <a href="#" data-toggle="modal" data-target="#myModal1<?php echo $rowe->id;?>" class="btn btn-primary btn-Edit"><i class="fa fa-edit"></i></a>
                           &nbsp;&nbsp;
<a href="<?php echo base_url();?>index.php/Bms_bills/delete_chargecode/<?php echo $rowe->id;?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-Remove"><i class="fa fa-trash"></i></a>                           
<!-- <a href="<?php echo base_url();?>index.php/Bms_bills/delete_chargecode/<?php echo $rowe->id;?>" onclick="return confirm('Are you sure you want to delete this item?');" title="delete"><i class="fa fa-trash"></i></a> -->
                             
                            </td>
                            
                            
                        </tr>
                        
                        
                        <div class="modal fade" id="myModal1<?php echo $rowe->id;?>">
                            
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #337ab7;">
          <h4 class="modal-title" style="color: #fff;">Update Chage Code</h4>
          <button type="button" style="color:#fff;margin-top: -23px;" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
		
		<hr/>
        <div class="modal-body">
		
          <form action="<?php echo base_url('index.php/Bms_bills/updatecharge/'.$rowe->id);?>"  method="post" class="form-horizontal">
		
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Charge Code</label>
              <div class="col-md-9" style="color:red;">
               <input type="text" name="code" class="form-control"  placeholder="" value ="<?php echo $rowe->charge_code; ?>">
              </div>
            </div>
            &nbsp;
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">charge_description</label>
              <div class="col-md-9">
			  <input type="text" name="des" class="form-control"  placeholder="" value ="<?php echo $rowe->charge_description; ?>">
               
              </div>
            </div>
             &nbsp;
             <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">calculation_method</label>
              <div class="col-md-9">
                   <select name="met" class="form-control"  placeholder="" value ="<?php echo $rowe->calculation_method; ?>" style="width: 99%;">
                       
                        
               
                       
                       <option  value="By Area Width">By Area Width</option>
                           
                         
                        </select> 
                  
			
               
              </div>
            </div>
             &nbsp;
             <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">charge_by</label>
              <div class="col-md-9">
                  
                  
                  
			  <input type="text" name="by" class="form-control"  placeholder="" value ="<?php echo $rowe->charge_by; ?>">
               
              </div>
            </div>
             &nbsp;
             <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">rate</label>
              <div class="col-md-9">
			  <input type="text" name="rat" class="form-control"  placeholder="" value ="<?php echo $rowe->rate; ?>">
               
              </div>
            </div>
             &nbsp;
             <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">reporting_uOM</label>
              <div class="col-md-9">
			  <input type="text" name="uom" class="form-control"  placeholder="" value ="<?php echo $rowe->reporting_uOM; ?>">
               
              </div>
            </div>
             &nbsp;
             <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">account</label>
              <div class="col-md-9">
			  <input type="text" name="acc" class="form-control"  placeholder="" value ="<?php echo $rowe->account; ?>">
               
              </div>
            </div>
             &nbsp;
             <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Status</label>
              <div class="col-md-9">
                  
                   <select name="sta" class="form-control"  placeholder="" value ="<?php echo $rowe->statu; ?>" style="width: 99%;">
                       <option  value="">Select</option>
                        
               
                       
                       <option  value="Active">Active</option>
                       <option  value="Deactive">Deactive</option>    
                         
                        </select>
			 
               
              </div>
            </div>
		
			
            
            
              
              	
            
				
				
			    
					  
					  

			  
             				
		 
        
        </div>
		
		
		&nbsp;
        
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
                        
                        
 <?php } $i++; }
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
                  <th>Charge Name</th>               
                  <th>Charge Code</th>
				 <th>Action</th>
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
                            <td><?php echo $val->charge_name;?></td>
                            <td><?php echo $val->charge_code;?></td>
						 <td> 
                       <!--<a href="#" data-toggle="modal" data-target="#myModal1<?php echo $val->id;?>" title="Edit"><i class="fa fa-edit"></i></a>-->
                       <a href="#" data-toggle="modal" data-target="#myModal1<?php echo $val->id;?>" class="btn btn-primary btn-Edit"><i class="fa fa-edit"></i></a>
                           &nbsp;&nbsp;
<a href="<?php echo base_url();?>index.php/Bms_bills/delete_chargecode/<?php echo $val->id;?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-Remove"><i class="fa fa-trash"></i></a>                           
<!-- <a href="<?php echo base_url();?>index.php/Bms_bills/delete_chargecode/<?php echo $val->id;?>" onclick="return confirm('Are you sure you want to delete this item?');" title="delete"><i class="fa fa-trash"></i></a> -->
                             
                            </td>
                            
                            
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>


<script>
$(function() {

  $("#newModalForm").validate({
    rules: {
      "name": "required",
      "code": "required"
    },
    messages: {
      "name": "Please Enter Your Charge Name",
      "code": "Please Enter Your Charge code"
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
     
   alert("gettt");
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
Success!
    }

    </script>
