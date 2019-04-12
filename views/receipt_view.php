
<?php



error_reporting(0);
/*
           $emailuser = $_SESSION['bms']['email'];
                $genid = $_SESSION['bms']['genid']; 
               
   $query1 = $this->db->query("SELECT * FROM  url_idvalidation where user_email ='$emailuser' ORDER BY url_id DESC LIMIT 1");
  foreach ($query1->result() as $row1)
  {
    $generate = $row1->gen_id; 
  }   
  if($generate!=$genid)
  {
      ?><script>alert("Unauthorize user."); window.location.assign('<?php echo base_url();?>Bms_index/logout');</script><?php 
  }*/
  
  
$this->load->view('header');?>
<?php $this->load->view('sidebar');
 $unitno = $this->uri->segment('3');
//echo "<pre>";print_r($properties); 

 $pro = $_SESSION['bms_default_property'];
 
 if($unitno)
 {
   unset($_SESSION["bms_default_property"]);  
  //  session_destroy();
 }
 
 //get user server detail
   $sys=  php_uname('s');
  ($ee = $_SERVER['HTTP_USER_AGENT']);
 $ip = $_SERVER['REMOTE_ADDR'];
  $ipaddrss =  $ip; 
 $hostname =  gethostbyaddr($ip);
 
  
 
?>


<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   
 
 
 
 <link href="<?php echo base_url();?>assets/css/magic-check.css" rel="stylesheet">

 
 

 
 
 
 
 
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
    
    <style>
     .custom {
    border: 1px solid #111;
  background: transparent;
  width: 180px;
  padding: 5px;
  border: 1px solid #ccc;
  height: 34px;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
} 

    </style>

    <!-- Main content -->
    <section class="content container-fluid cust-container-fluid">
        
           <?php if(isset($_SESSION['flash_msg']) && trim( $_SESSION['flash_msg'] ) != '') {
                    //if($_GET['login_err'] == 'invalid')
                    echo '<div class="alert alert-success msg_notification"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>';
                    echo '</strong>'.$_SESSION['flash_msg'].'</div>';
                    unset($_SESSION['flash_msg']);
                }
                
                
           
  
                
            ?>
            
            

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
                
                 // "SELECT * FROM `bms_property_units` WHERE unit_id = '$unitno'";
                $qunew = $this->db->query("SELECT * FROM `bms_property_units` WHERE unit_id = '$unitno'");
  foreach ($qunew->result() as $ttte)
  {
          $proid  = $ttte->property_id;
  }
  
   $qunewp = $this->db->query("SELECT * FROM `bms_property` WHERE property_id = '$proid'");
  foreach ($qunewp->result() as $tttep)
  {
           $proidp  = $tttep->property_name;
         // echo $proidp;exit;
  }
  
  
    $qunewpu = $this->db->query("SELECT * FROM `bms_property_units` WHERE unit_id = '$unitno'");
  foreach ($qunewpu->result() as $tttepu)
  {
        $unitnos = $proidpu  = $tttepu->unit_no;
        $block_ids = $proidpu  = $tttepu->block_id;
  }
  
 // echo "SELECT * FROM `bms_property_block` WHERE property_id = '$block_ids'";
  $querydpbi = $this->db->query("SELECT * FROM `bms_property_block` WHERE block_id = '$block_ids'");
  foreach ($querydpbi->result() as $blli)
  {   $blid = $blli->block_id;
     $blname = $blli->block_name;
  }
       
  

            ?>
			


<script>
 function GetItemValue(q) { 
  var pvalued = $("#unit").val() ;
  
 document.getElementById("mytext").value = pvalued;



 
   var e = document.getElementById(q);
   var selValue = e.options[e.selectedIndex].text ;
   alert("Selected Value: "+selValue);
 }
</script>

<body onload="bodyOnLoad();">
			
			<div class="row">
                    <div class="col-md-3 col-xs-6">
                        <td class="box-title"><b style="font-size: 159%;">Receipt</b></td>
                        

                    </div>
                                     
                    
                       <div class="col-md-3 col-xs-4" style="padding-left: 64%;">
                       <td><a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/receipt/receipt_view');?>">Back To List</a></td>
                    </div>
                                        
                    
                </div>
					
			<hr>
			
					<div style="color:red;">
			<td >(*) indicates required fields.</td>
</div>	&nbsp;
		
		
		
		
		
		
		
		
		<div class="col-md-12 col-xs-12 no-padding">
                            <div class="col-md-12 col-sm-12 col-xs-12 right-box" style="border: 1px solid #999;border-radius: 2px;">
                                
								
								
								
					<div class="row" style="background-color: #d2cece; height: 50px;" >
                    <div class="col-md-3 col-xs-6" >
                        <h3>New Receipt </h3>
						
						 
                    </div>
                                      
                    
                </div>
				&nbsp;
		<form name="bms_frm" id="bms_frm" method="post" action="<?php echo base_url('index.php/receipt/receipt_add');?>">
		    
		    
		    	<input type="hidden" name="units" id="units" value="<?php echo $unitno;?>" class="form-control">
			


	<div class="row">
                    <div class="col-md-1 col-xs-3">
                       <td>Property</td>
                    </div>
                    
                    <div class="col-md-3 col-xs-5">
                        
                      
                        <!--<select class="form-control"  name="property" onChange="prod(this.value);">-->
                            <select class="form-control"  name="property" onChange="getblo(this.value);">
                        
                      
                            <option value="">Select Property</option>
                            <?php 
                                foreach ($properties as $key=>$val) { 
                                    $selected = isset($property_id) && trim($property_id) != '' && trim($property_id) == $val['property_id'] ? 'selected="selected" ' : '';  
                                    echo "<option value='".$val['property_id']."' ".$selected." data-value='".$val['total_units']."'>".$val['property_name']."</option>";
                                } ?>  
                                               
                        </select>
                    </div>
                    
                    
                    <!--block id-->
                    
                        <div class="col-md-1 col-xs-3">
                       <td>Block</td>
                    </div>
                    
                    <div class="col-md-3 col-xs-5">
                    
                          <?php //echo "SELECT * FROM `bms_property_block` WHERE property_id = '$proid' AND block_id!='$blid'"; ?>
                        <div id="showblock"></div>
                          <div id="hideblock">
                            <select class="form-control" name="block_ido" onChange="blo(this.value);">
                                
                                <?php if($blid){?> 
                              <option  value="<?php echo $blid ;?>"><?php echo $blname ;?></option>
                              
                               <?php $querydpb = $this->db->query("SELECT * FROM `bms_property_block` WHERE property_id = '$proid' AND block_id!='$blid'");
  foreach ($querydpb->result() as $bll)
  { ?>
  
  <option value="<?php echo $bll->block_id;?>"><?php echo $bll->block_name;?></option>
  <?php }?>
  
  
                              <?php }
                              elseif($pro){?> 
                              <option value="">Select</option>
                                <?php $querydpb = $this->db->query("SELECT * FROM `bms_property_block` WHERE property_id = '$pro'");
  foreach ($querydpb->result() as $bll)
  { ?>
  
  <option value="<?php echo $bll->block_id;?>"><?php echo $bll->block_name;?></option>
  <?php }?>
                                
                                <?php }
                                else{?>third<?php 
                         $querydpb = $this->db->query("SELECT * FROM `bms_property_block` WHERE property_id = '$proid' AND block_id!='$blid'");
  foreach ($querydpb->result() as $bll)
  { ?>
                                   <option value="<?php echo $bll->block_id;?>"><?php echo $bll->block_name;?></option>
                                    <?php } }?>
                                  </select>
                                  </div>
                    </div>
                    
                    
                    
                    <!--unit no section-->
					 <div class="col-md-1 col-xs-3">

                         <td>Unit no</td>
                    </div>
					 <div class="col-md-3 col-xs-5" style="">
					     
					    
					     <div id="showus"></div>
					     <div id="hidu">
<?php if($unitno){ ?>
  <select class="form-control" id="unit" name="unitd" onChange="go(this.value);">
      
                          <option value="<?php echo $unitno ; ?>"><?php echo $unitnos ; ?></option> 
                          
                          
                         <?php  //echo "SELECT * FROM `bms_property_units` WHERE property_id = '$proid'";
                         $querydp = $this->db->query("SELECT * FROM `bms_property_units` WHERE property_id = '$proid' AND unit_id!='$unitno' AND block_id = '$blid'");
  foreach ($querydp->result() as $rowpp)
  { ?>
                           <option value="<?php echo $rowpp->unit_id ; ?>"><?php echo $rowpp->unit_no ; ?></option> <?php }?>
				
                        </select>
                        <?php }
                        else {?>
                        
                        
                        <?php
                      $pro = $_SESSION['bms_default_property'];
                       $querybv = $this->db->query("SELECT * FROM  bms_property_units where property_id = '$pro'");
                      
                  ?>  
                      <!--<select class="form-control" id="unit" name="unitd" onChange="go(this.value);">-->
                       <select class="form-control" id="unit" name="unitd">
                      <option  value="">Select</option>
                <?php   foreach ($querybv->result() as $rowbv){ ?>
                      
                       <option  value="<?php echo $rowbv->unit_id; ?>"><?php echo  $rowbv->unit_no; ?></option>
                           
                          <?php }?>
                          </select>
                          
                          
                          
                        
                        
                        <?php }?>
                        
                        
                        
                        
                      
                          
                          
                          
                          
                          
                        </div>
                        
                        
                        
                    </div>
					
                    
                   
                                        
                    
                </div>
                
                
    
    <input type="hidden" name="loginname"  value="<?php echo isset($_SESSION['bms']['full_name']) ? $_SESSION['bms']['full_name'] : $_SESSION['bms']['first_name'];?>">
    
    
		

				  	&nbsp;
				<div class="row">
                    <div class="col-md-1 col-xs-3">
                       <td>From</td>
                    </div>
                    
                    <div class="col-md-3 col-xs-5">
                        <?php  
                        //echo "SELECT * FROM  bms_property_units where unit_no='$unitnos'";
                        $querydp = $this->db->query("SELECT * FROM  bms_property_units where unit_no='$unitnos'");
  foreach ($querydp->result() as $rowpp)
  { $ownner = $rowpp->owner_name; }?>
                        
                       
                    <input type="text" name="owner" id="owner" value="<?php echo $ownner; ?>"  class="form-control">
                    
						
					
                    </div>
                    
                    <div class="col-md-1 col-xs-3">

                         <td>Date</td>
                    </div><?php $dates = date("d-m-Y");?>
					 <div class="col-md-3 col-xs-5">
  <input type="hidden" name="unit" id="dat" value="<?php echo $unitno ;?>" class="form-control">
                        <input type="text" name="dat" id="dat" value="<?php echo $dates;?>" class="form-control datepicker">
                    </div>
                    
                    
                    <div class="col-md-1 col-xs-3">
                       <td>Bank</td>
                    </div>
					 <div class="col-md-3 col-xs-5">
       
  
   <select class="form-control" name="yourbank">
       <option value="0">Select</option> 
 <?php   $querydpb = $this->db->query("SELECT * FROM `bms_bank_details`");
  foreach ($querydpb->result() as $rowppb)
  { ?>
        <option value="<?php echo $ciphertext_base64 = $rowppb->bank_name ; ?>"><?php echo $ciphertext_base64 = $rowppb->bank_name ; ?></option> <?php }?>
 </select>
                      
                        
                        
                        
                    </div>
				                      
                    
                </div>	
                    
                
				
				 <hr>
                 <div class="row">
                    <div class="col-md-2 col-xs-4">
                       <p><b>Payment mode *</b></p>
                    </div>

                    <div class="col-md-2 col-xs-5 " style="font-size: 11px; color: #948b8b;">
                        	<input  class="magic-radio" type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="yes" value="cash" style="margin: 4px 4px 0 !important;" required checked/> 
                        	
                        <label for="yes"> CASH </label>
                        
                       
                    </div>
					<div class="col-md-2 col-xs-5" for="chkYes"  style="font-size: 11px;color: #948b8b;">
                      
						<input  class="magic-radio" type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck" value="cheque" required/> 
						 <label for="yesCheck">	Cheque</label>
					  </div>
					 <div class="col-md-2 col-xs-5" for="chk"  style="font-size: 11px;color: #948b8b;">
                       
						<input  class="magic-radio"    type="radio" onclick="javascript:yesnoCheck();" name="yesno" value="card" id="noCheck" required/>
						<label for="noCheck">CARD</label>
			
						
						
						
						
						
					
						
                    </div>
					<div class="col-md-2 col-xs-5" style="font-size: 11px;color: #948b8b;">
                        <input   class="magic-radio" type="radio" value="online" onclick="javascript:yesnoCheck();" name="yesno" id="no" required/> 
                        <label for="no">	ONLINE/CDM</label>
                       </div>
					<div class="col-md-2 col-xs-5"  style="font-size: 11px;color:#948b8b;    float: right;">
					    
					    
					<input  class="magic-radio" type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="condos" value="contrareno" style="margin: 4px 4px 0 !important;" required/> 
                        	
                        <label for="condos">  CONTRA DEPOSIT   </label>
              
              </div>
					
                    
                   
                                        
                    
                </div>
                
                
   
                
                
                
                
                
                
                
                
                
                
				<hr>
			<!--	<div id="hidetwo" style="display:none">-->
<div id="red" style="display:none">
				<div class="row">
                    <div class="col-md-3 col-xs-6">
                       <td>Bank</td>
                    </div>
                    
                    <div class="col-md-2 col-xs-5">
                        
                        <input type="text" name="onlinebanknames" id="dates" value="" class="form-control">
                    </div>
					 <div class="col-md-2 col-xs-5" style="padding-left:27%;">

                         <td>Txn No</td>
                    </div>
					 <div class="col-md-3 col-xs-12" style="padding-left: 7%;float: right;">

                        <input type="text" name="transactionno" id="dates" value="" class="form-control">
                    </div>
					
                    
                   
                                        
                    
                </div>

				  	&nbsp;
				<div class="row">
                    <div class="col-md-3 col-xs-6">
                       <td>Type</td>
                    </div>
                    
                    <div class="col-md-2 col-xs-5">
                        <select class="form-control" id="" name="onlinetype">
						<option value="">Select</option>
						<option value="CDM Cash">CDM Cash</option>
						<option value="CDM Cheque">CDM Cheque</option>
						<option value="Internet Banking">Internet Banking</option>
						<option value="ATM">ATM</option>
                           
                        </select>
                    </div>
					 <div class="col-md-2 col-xs-5" style="padding-left:27%;">

                         <td>Date</td>
                    </div>
					 <div class="col-md-3 col-xs-12" style="padding-left: 7%;float: right;">

                        <input type="date" name="checkdate" id="dates" value="" class="form-control">
                    </div>
                    
                    
                    
					
                    
                   
                                        
                    
                </div>
				</div>
				
				<div id="ifYes" style="display:none">

				<div class="row">
                    <div class="col-md-3 col-xs-6">
                       <td>Bank</td>
                    </div>
                    
                    <div class="col-md-2 col-xs-5">
                        
                        <input type="text" name="bankcheck" id="dates" value="" class="form-control">
                    </div>
					 <div class="col-md-2 col-xs-5" style="padding-left:27%;">

                         <td>Cheque No</td>
                    </div>
					 <div class="col-md-3 col-xs-12" style="padding-left: 7%;float: right;">

                        <input type="text" name="checkno" id="dates" value="" class="form-control">
                    </div>
					
                    
                   
                                        
                    
                </div>

				  	&nbsp;
				<div class="row">
                    <div class="col-md-2 col-xs-5" style="padding-left:69%;">
                       <td>Date</td>
                    </div>
                    
                    <div class="col-md-3 col-xs-12" style="padding-left: 7%;float: right;">
                        
                        <input type="date" name="checkdate" id="invoiceDate" value="" placeholder="Date" class="form-control">
						
                    </div>
				                      
                    
                </div>	
				</div>
				
				
				
				<div id="ifNo" style="display:none">
<div class="row">
                    <div class="col-md-2 col-xs-5">
                       <td>Bank</td>
                    </div>
                   
                    <div class="col-md-3 col-xs-5">
                        
                        <input type="text" name="bankcard" id="dates" value="" class="form-control">
                    </div>
                    
                     <div class="col-md-1 col-xs-3"></div>
                     
					 <div class="col-md-2 col-xs-5">

                         <td>Txn No.</td>
                    </div>
					 <div class="col-md-3 col-xs-5">

                        <input type="text" name="carttx" id="dates" value="" class="form-control">
                    </div>
					
                    
                   
                                        
                    
                </div>

				  	&nbsp;
				<div class="row">
				    
				       <div class="col-md-2 col-xs-5">
                       <td>Card Holder Name</td>
                    </div>
                    
                    <div class="col-md-3 col-xs-5">
                        
                        <input type="text" name="cartholder"   class="form-control">
                    </div>
                    
                     <div class="col-md-1 col-xs-5"></div>
                    
                    <div class="col-md-2 col-xs-5">
                       <td>Card Type</td>
                    </div>
                    
                    <div class="col-md-3 col-xs-5">
                       <select class="form-control" id="" name="catytype">
						<option value="">Select</option>
						<option value="VISA">VISA</option>
						<option value="Master">Master</option>
						<option value="Amex">Amex</option>
                           
                        </select>
                    </div>
				                      
                    
                </div>	
				</div>
				
				
				<!--contra reno depo-->
				
				
				<div id="coontra" style="display:none">
				<div class="row">
                    <div class="col-md-3 col-xs-6">
                       <td>Previous Reciept No.</td>
                    </div>
                    
                    <div class="col-md-2 col-xs-5">
                        
                       <select class="form-control" name="contrano">
                      <option  value="">Select</option>
                      
                <?php   $queruu = $this->db->query("SELECT * FROM  payment where unit_no='$unitno'");
  foreach ($queruu->result() as $rowuu)
  { ?>
                      
                       <option  value="<?php echo $rowuu->receiptno; ?>"><?php echo  $rowuu->receiptno; ?></option>
                           
                          <?php }?>
                          </select>
                          
                          
                          
                    </div>
			  </div>
				</div>
				
				
				
				
				
				<div class="row">
                    <div class="col-md-3 col-xs-4">
                       <h3><b>Line Items</b></h3>
					   <td>(All Currencies are in RM)</td>
                    </div>
                           
                                        
                    
                </div>
				&nbsp;
				
			 <div class="box-body" style="width: 90%;">
              
			 
			  
			 <?php
			// echo "SELECT * FROM  payment_detail where unit_no='$unitno' and status = '0'";
			 
			 $queryd = $this->db->query("SELECT * FROM  bms_property_credit where unit_no='$unitno' and status = '0'");
  foreach ($queryd->result() as $rowp)
  {?>
  
                 <div class="controler">
         <div class="col-md-12">
             <div class="row">
			  <table class="table table-bordered" style="width: 95%; margin-left: 10px; border: 2px solid #fff;"> 
                 <div class="col-md-3">
				 
                    <td style="width: 198px !important; border: 2px solid #fff;"> <select type="text" name="" class="form-control" >
                         
                         
                             <option value="<?php echo $rowp->category_subcat;?>"><?php echo $rowp->category_subcat;?></option>
                         
                     </select></td>
                 </div>
                 <div class="col-md-2">
				 
                     <td style="width: 150px !important; border: 2px solid #fff;">  <select class="form-control"  style="width: 150px !important;">
                         <option value="<?php echo $rowp->subcategory;?>"><?php echo $rowp->subcategory;?></option>
                     </select></td>
                 </div>
                  <div class="col-md-3">
				
                    <td style="border: 2px solid #fff;"><input type="text"  value="<?php echo $rowp->category_subcat;?>/<?php echo $rowp->subcategory;?>" class="form-control"></td>
                    
                 </div>

                 <div class="col-md-2">
				 
                    <td><input type="text"  class="form-control" value="<?php echo $rowp->amount;?>" readonly="readonly"></td>
                    
                 </div>

                 <div class="col-md-2">
				   
                 </div>
				 </table>
			 <button type="button" onclick="deletes('<?php echo $rowp->id;?>');$(this).parent().remove()" class="btn btn-primary add-more" style="float: right;margin-top: -64px;padding: 6px 9px;"><i class="glyphicon glyphicon-minus"></i></button>
            
             </div>
             


         </div>

     </div>
  <?php }?>
            </div>
            
            
            <!--default open-->
            
            
            <div class="controler">
         <div class="col-md-12" >
             <div class="row" >
			  <table class="table table-bordered" style="width: 96%; border: 2px solid #fff;"> 
                 <div class="col-md-3">
				 
                    <td style="border: 2px solid #fff;"><label>Category</label> <select type="text" name="cat[]" class="form-control" id="fname" onChange="cat(this.value,'mysub');" onblur="createUserName();">
                          <option>Select</option>
                          <?php  
                          
                         
						  $query = $this->db->query("SELECT * FROM main_category");
foreach ($query->result() as $rowd)
{ ?>
                             <option value="<?php echo $rowd->name;?>"><?php echo $rowd->name;?></option>
                         <?php }?>
                     </select></td>
                 </div>
                 <div class="col-md-2">
				 
                     <td style="width: 150px !important;border: 2px solid #fff;"> <label>Subcategory</label> <select class="form-control" name="catsub[]" id="mysub" onblur="createUserName();" style="width: 150px !important;"></select></td>
                 </div>
                  <div class="col-md-3">
				  <input type="hidden" name="units" id="units" value="<?php echo $unitno;?>" class="form-control">
                    <td style="border: 2px solid #fff;"><label>Description</label><input type="text"  id="des" value="" class="form-control"></td>
                    
                 </div>

                 <div class="col-md-2">
				 
                    <td style="border: 2px solid #fff;"><label>Amount</label><input type="text" name="amount[]" id="cnew" class="form-control" onblur="tota(this.value)"></td>
                    
                 </div>

                 <div class="col-md-2">
				  
                    <input type="hidden" id="cval" value="1">
                  
                 </div>
				 </table>
				 <!-- <button type="button" onclick="giveme()" class="btn btn-primary add-more" style="float: right;margin-top: -64px;padding: 6px 9px;"><i class="glyphicon glyphicon-plus"></i></button>-->
             </div>
             <div id="newr"></div>


         </div>

     </div>
     
     
     
     
     
            <!--end default open-->
				
				
				
				<div  style="margin-top: -14;">
    
    
        

      	<div class="input-group control-group after-add-more" style="width: 87%;
    margin-left: 20px;">
		
  
               <div class="controler">
         <div class="col-md-12" >
            
             <div id="newr"></div>


         </div>

     </div>
					
                 
				 
            
				<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script>
    function refresh_div() {
        // var str = $("#units").val() ;
      	// alert("al");
        jQuery.ajax({
            url:"https://www.tpaccbms.com/index.php/Receipt/selcount/<?php echo $unitno; ?>",
            type:'POST',
            success:function(results) {
             jQuery(".resultt").html(results);
            }
        });
      //  alert("https://www.tpaccbms.com/index.php/Receipt/selcount/$unitno)
    }
    t = setInterval(refresh_div,100);
</script>
   
			
		
       
		
			  
				&nbsp;
				
				<div class="row" >
				<div class="col-md-7 col-xs-6"></div>
				<div class="col-md-5 col-xs-6">
				
				<div class="row" >
				
	
				 
                  
					<div class="col-md-4 col-xs-12">
                       <label>Total*</label>
					   </div>
					   <div class="col-md-8 col-xs-12" >
					     
					  
					   <p class="resultt" style=" border: 1px solid #d0c4c4; padding: 5px 5px;margin: 0 0 0px;    width: 99%;
    margin-left: -40px; margin-bottom: 3px;"></p>
					   </div>
                 
				</div>
				
				<div class="row">
					
                 
					  <div class="col-md-4 col-xs-6">
                       <label>Round</label>
					   </div>
					   <div class="col-md-8 col-xs-6">
					   <p  style=" border: 1px solid #d0c4c4; padding: 5px 5px; background: #1f1d1d0d;margin: 0 0 0px;     width: 99%;
    margin-left: -40px; margin-bottom: 3px;">0</p>
					   </div>
                  
					</div>
					
					<div class="row">
				
					<div class="col-md-4 col-xs-6">
                       <label>Net Total*</label>
					   
					   <input type="hidden" name="sum1" id="s1um" readonly />
					   </div>
					   <div class="col-md-8 col-xs-6">
					   <p class="resultt" style=" border: 1px solid #d0c4c4; padding: 5px 5px;margin: 0 0 0px;    width: 99%;
    margin-left: -40px;   "></p>
						</div>
                    </div>

					</div>  
                </div>                     
                    
              
			
			<div class="row"  style="margin-top: 30px;">
					<div class="col-md-8 col-xs-4">
				 <div class="row">
				<div class="col-md-3 col-xs-4">
                     
                    
                      <button type="button" name="add" id="add" class="btn btn-primary" onclick="giveme()" style="">Add Item</button>  
                       
					   
					   
                    </div>
					<div class="col-md-3 col-xs-4" style=" margin-left: -47px;">
                       
				<td><a role="Reset" class="btn btn-primary" style="margin-left: -1px;" onclick="location.href = '<?php echo base_url();?>index.php/Receipt/receipt_list_view/';">Clear All Lines</a></td>
                    </div>
				<div class="col-md-3 col-xs-4" style="padding-left: 0%;">
                       
					<td> <a  style="margin-left: ;"   href="<?php echo base_url();?>index.php/Receipt/refcon/<?php echo $unitno;?>" role="button" class="btn btn-primary" >Get Outstanding Bills</a></td>
                    </div>
				<div class="col-md-3 col-xs-4" style="padding-left: 5%;">
                       
					<td> <a  style="margin-left: ;"   role="button" class="btn btn-primary" href="<?php echo base_url('index.php/payment');?>">View Payments</a></td>
                    </div>
			 </div>	
			 
		</div>	 
			<div class="col-md-4 col-xs-4"></div>
			
			
			</div>
				<hr>
				&nbsp;
				
				
				 <div class="row">
                    <div class="col-md-2 col-xs-6">
                       <h3><b>Notes</b></h3>
					  
                    </div>
					 <div class="col-md-10 col-xs-12" >
                       <textarea rows="4" name="note" class="form-control" cols="50"></textarea>
                    </div>
                   
                    
                </div>
				&nbsp;
				<div class="row">
                 <div class="col-md-2 col-xs-6"></div>
                 	 <div class="col-md-10 col-xs-12" >
                    <div class="col-md-6">
                        <input type="submit" name="submit" id="" value="Done"  class="btn btn-primary" style="float: right;">
					  
                    </div>
					 <div class="col-md-6">
                     <input type="button" name="" id="" value="Reset" class="btn btn-primary" onclick="location.href = '<?php echo base_url();?>index.php/Receipt/receipt_list_view/';">
                    </div>
                    
                  </div>		
					
                 
                    
                </div>
				&nbsp;
				
			</div>	
		</div>		
	</form> 			
			  
	    
                                
                        
          <div class="col-md-12 col-xs-12 no-padding">
                            <div class="col-md-12 col-sm-12 col-xs-12 right-box" >
                                <div class="box-header" style="padding-left:0px ;">
								
								 
								 				 
								 
								  
								  </div>
								  
                                </div>
                                
                               
                                       
              		
                      
              <!-- /.box-body -->
              
             
          
          <?php /*<div class="row ciov" style="margin: 0px !important;padding: 10px 0; border-top: 1px solid #DCDCDC;border-bottom: 1px solid #DCDCDC;background-color: #F0F0F0;">
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
                
            </div> */ ?> 
            
         </div>
          <!-- /.box -->     

    </section>
    <!-- /.content -->
  </div>
  
  </body>
  <!-- /.content-wrapper -->
  <!-- bootstrap datepicker -->

<?php $this->load->view('footer');?>
<script src="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> 
<!-- overlay loader for ajax call -->
<script src="<?php echo base_url();?>assets/js/loadingoverlay.js"></script> 
  

  
  

  
  
  
  
  
  <script>
  
$(function() {
	
    $("#amount, #num2").on("keydown keyup", sum);
	function sum() {
		

	$("#sum").val(Number($("#amount").val()) + Number($("#num2").val()));
	//$("#subt").val(Number($("#num1").val()) - Number($("#num2").val()));
	}
});
  
  </script>
<script type="text/javascript">

    $(document).ready(function() {

	//here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
      $(".add-more").click(function(){ 
          var html = $(".copy-fields").html();
          $(".after-add-more").after(html);
      });
//here it will remove the current value of the remove button which has been pressed
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>

<script>
function createUserName(){
             
            var txtFnameValue = $('#fname').val();
			
			var txtLnameValue =  $('#mysub').val();
            var result = txtFnameValue+'/'+ txtLnameValue;
            var reult1=result.toLowerCase();
            $('#des').val(reult1);
			
			//alert(hello);
                    }  

</script>



<script type="text/javascript">
 window.onload = function() {
    document.getElementById('ifYes').style.display = 'none';
    document.getElementById('ifNo').style.display = 'none';
	document.getElementById('red').style.display = 'none';
}
function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.display = 'block';
        document.getElementById('ifNo').style.display = 'none';
		 document.getElementById('red').style.display = 'none';
		 document.getElementById('yes').style.display = 'none';
        
    } 
    else if(document.getElementById('noCheck').checked) { 
        document.getElementById('ifNo').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
		 document.getElementById('red').style.display = 'none';
		 document.getElementById('yes').style.display = 'none';
       
   }
   else if(document.getElementById('no').checked) {
        document.getElementById('red').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
		 document.getElementById('ifNo').style.display = 'none';
		 document.getElementById('yes').style.display = 'none';
       
		
   }
    else if(document.getElementById('yes').checked) { 
       // document.getElementById('yes').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
		 document.getElementById('ifNo').style.display = 'none';
		  document.getElementById('red').style.display = 'none';
       
		
   }
   
     else if(document.getElementById('condos').checked) { 
        document.getElementById('coontra').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
		 document.getElementById('ifNo').style.display = 'none';
		  document.getElementById('red').style.display = 'none';
       
		
   }
}

</script>

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
<script src="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- overlay loader for ajax call -->
<script src="<?php echo base_url();?>assets/js/loadingoverlay.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>

<script>

$(document).ready(function () {
    
    // right side box hight adjustments    
    if($('.cust-container-fluid').width() > 715) {
        $('.right-box').height($('.left-box').height());
    }
    
    if($('#unit_id').val() != '') {        
        loadBlock ('<?php echo isset($unit_info['block_id']) && $unit_info['block_id'] != '' ? $unit_info['block_id'] : '';?>');
    }
    
    /** Form validation */   
    $( "#bms_frm" ).validate({
		rules: {
			//"unitd": "required",
            "dat": "required",
            "owner": "required",
            "Cash": "required",
            "cat": "required",
            "des": "required",
            "gender": "required",
            "unit[race]": "required",
            "unit[religion]": "required",
            "unit[gender]": "required",
            "unit[nationality]": "required",
            "unit[contact_1]": "required",			
            "unit[email_addr]":{
					   required: true,
					   email: true/*,
                       remote: {
                        url: "<?php echo base_url('index.php/bms_unit_setup/check_email');?>",
                        type: "post",
                        data: { email_addr: function() { return $( "#email_addr" ).val(); },unit_id: function() { return $( "#unit_id" ).val(); } }
                      }*/
					},
            "unit[password]":"required",
            "unit[address_1]": "required",
            "unit[city]": "required",	
            "unit[postcode]": "required",	
            "unit[state]": "required",	
            "unit[country]": "required"
            
		},
		messages: {
			"unitd": "Please select Unit No",
            "dat": "Please select date",
            "owner": "Please select unit no",
            "Cash": "Please select payment mode",
            "cat": "Please select category",
            "des": "Please enter description",
            "unit[dob]": "Please enter amount",
            "unit[race]": "Please enter amount",
            "unit[religion]": "Please select Religion",
            "unit[gender]": "Please select Gender",
            "unit[nationality]": "Please select Nationality ",
            "unit[contact_1]": "Please enter Contact No 1",			
            "unit[email_addr]":{
					   required:"Please enter Email Address",
                       email: "Please enter valid Email Address"/*,
                       remote:"Email Address exists already!"*/
					   },
            "unit[password]":"Please enter Password",
            "unit[address_1]": "Please enter Address 1",
            "unit[city]": "Please enter City",	
            "unit[postcode]": "Please enter Post Code",	
            "unit[state]": "Please enter State ",	
            "unit[country]": "Please select Country"
            
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
    
    // On property name change
    $('#property_id').change(function () {
        loadBlock ('');
    });  
   
             
});

function loadBlock (block_id) {
    $.ajax({
            type:"post",
            async: true,
            url: '<?php echo base_url('index.php/bms_task/get_blocks');?>',
            data: {'property_id':$('#property_id').val()},
            datatype:"json", // others: xml, json; default is html

            beforeSend:function (){ $("#content_area").LoadingOverlay("show");  }, //
            success: function(data) {  
                /*if(typeof(data.error_msg) != "undefined" &&  data.error_msg == 'invalid access') {
                    window.location.href= '<?php echo base_url();?>';
                    return false;
                }*/
                var str = '<option value="">Select</option>'; 
                if(data.length > 0) {                    
                    $.each(data,function (i, item) {
                        var selected = block_id != '' && block_id == item.block_id ? 'selected="selected"' : '';
                        str += '<option value="'+item.block_id+'" '+selected+'>'+item.block_name+'</option>';
                    });
                }
                $('#block_id').html(str);               
                $("#content_area").LoadingOverlay("hide", true);
                
            },
            error: function (e) {
                $("#content_area").LoadingOverlay("hide", true);              
                console.log(e); //alert("Something went wrong. Unable to retrive data!");
            }
        });
}

$(function () {
//Date picker
    $('#datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        'minDate': new Date()
    });
    
});
</script>


<script type="text/javascript">
<!--
function go(unit_id){
	 var pvaluee = $("#user_id").val() ;
	//alert(unit_id);
location='https://www.tpaccbms.com/index.php/Receipt/refcon/'+unit_id;
document.bms_frm.unit.
options[document.bms_frm.unit.selectedIndex].value
}
//-->
</script>
<script>
	 function checkAvailability(unit_id)
 {	 var pvalue = $("#user_id").val() ;
// alert(unit_id);


  if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("show").innerHTML = xmlhttp.responseText;
            }
        };
  xmlhttp.open("GET","<?php echo base_url(); ?>ajax/check_availability.php?$unit_id="+unit_id+"&$user_id="+pvalue,true);
 // alert("<?php echo base_url(); ?>ajax/check_availability.php?$unit_id="+unit_id+"&$user_id="+pvalue);
	 xmlhttp.send(); 
	   document.getElementById("hid").style.display = "none";
	// window.location.href ="<?php //echo base_url(); ?>index.php/Add_admin/selectd";
}
</script>

	   
	<script>

      function giveme()
      {
        var  id = $('#cval').val() ;

        var  rdiv = "mysub"+id ;
        var  rdivs = "mysubs"+id ;
        
      // alert(rdivs);
         var row = '';
             row += '<div class="row" style="margin-top: -17px;" >' ;
			  row += '<table class="table table-bordered" style="width: 96%;border: 2px solid #fff; ">' ;
             row += '    <div class="col-md-3">';
             
             row += '     <td style="border: 2px solid #fff;"><select type="text" name="cat[]" class="form-control" onChange="cat(this.value,'  +"'"+''+rdiv+''+"'"+'); createUserNames(this.value);">';
             row += '             <option>Select</option>';
                         <?php $query = $this->db->query("SELECT * FROM main_category");
							foreach ($query->result() as $rowd)
							{  ?>
             row += '                <option value="<?php echo $rowd->name;?>"><?php echo $rowd->name;?></option>';
                          <?php } ?>
             row += '        </select></td>';
             row += '    </div>';
             row += '    <div class="col-md-3">';
			 
             row += '         <td style="width: 150px !important; border: 2px solid #fff;"><select class="form-control"  name="catsub[]" id="'+rdiv+'" style="width: 150px !important;" onChange="getdes(this.value,'  +"'"+''+rdivs+''+"'"+');"></select></td>';
             row += '    </div>';
              row += '    <div class="col-md-3">';
			   
             row += '         <td style="border: 2px solid #fff; width: 292px;"><select class="custom"   id="'+rdivs+'" style="width: 100%;"></select></td>';
             row += '    </div>';
              row += '    <div class="col-md-2">';
			  
             row += '<td style="border: 2px solid #fff;"><input type="text" id="amo" name="amount[]"  class="form-control" onblur="tota(this.value,'  +"'"+''+rdiv+''+"'"+')"></td>';
             row += '    </div>';
            
            
             
			  row += '</table>';
			   row += ' <button type="button" onclick="deletesnew('  +"'"+''+rdiv+''+"'"+');$(this).parent().remove()" class="btn btn-danger btn-Remove" style="float: right;margin-top: -64px;"><i class="fa fa-close"></button>';
             row += '</div>';
			 

             $('#newr').append(row);
  //$('#cval').val() ;
   //$('#cvalss').val(praseInt($('#cval').val())+praseInt(1)) ;
       // $('#cvalss').val(praseInt(id)+praseInt(1)) ;

          document.getElementById("cval").value = id+1;
		 // document.getElementById("cvalss").value = id+1;
           // alert($('#cval').val());
		  //alert($('#cvalss').val());
	 
      }
</script>


<script>
function myFunction() {
    document.getElementById("myTable").deleteRow(0);
}
</script>
 <script> 

    function cat(str,rid) {
     // var txtFnameValue = $("#str").val() ;
   var txtFnameValue = str ;
 //  alert(txtFnameValue);
  var result = txtFnameValue;
         //   var result = txtFnameValue+'/'+ txtLnameValue;
            var reult1=result.toLowerCase();
            $('#dess').val(reult1);
			
			
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById(rid).innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","https://www.tpaccbms.com/ajax/select.php?$q="+str,true);
//	alert("<?php echo base_url(); ?>ajax/select.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hid").style.display = "none";
    }

</script>
<script>
	$(document).ready(function(){

		//iterate through each textboxes and add keyup
		//handler to trigger sum event
		$(".txt").each(function() {

			$(this).keyup(function(){
				calculateSum();
			});
		});

	});

	function calculateSum() {

		var sum = 0;
		//iterate through each textboxes and add the values
		$(".txt").each(function() {

			//add only if the value is number
			if(!isNaN(this.value) && this.value.length!=0) {
				sum += parseFloat(this.value);
			}

		});
		//.toFixed() method will roundoff the final sum to 2 decimal places
		$("#sum").html(sum.toFixed(2));
	}
</script>
<script> 

    function outsten(str) {
     
  // alert(str);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showwww").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/out.php?$q="+str,true);  
    //alert("<?php echo base_url();?>ajax/out.php?$q="+str); 
    xmlhttp.send();
    document.getElementById("hidddd").style.display = "none";
    }

    </script>
	
	<script> 

    function del(str){
     var pvalue = $("#amo").val() ;
   alert(pvalue);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("showwww").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/delet.php?$q="+str,true);  
   // alert("<?php echo base_url();?>ajax/delet.php?$q="+str); 
    xmlhttp.send();
    //document.getElementById("hidddd").style.display = "none";
    }

    </script>
  	<script> 

    function delll(str){
     var pvalue = $("#amo").val() ;
   alert(pvalue);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("showwww").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/delet.php?$q="+str,true);  
   // alert("<?php echo base_url();?>ajax/delet.php?$q="+str); 
    xmlhttp.send();
    //document.getElementById("hidddd").style.display = "none";
    }

    </script>
    
    
	
	
	




    	<script> 

    function tota(str,rid){
   //  alert(rid);
      var pvalue = $("#units").val() ;
     //  var pvalues = $("#cval").val() ;
     
 // alert(str+pvalue);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("ted").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>index.php/Receipt/tota/?$q="+str+"&$unit_no="+pvalue+"&$mainid="+rid,true);  
   //alert("<?php echo base_url();?>index.php/Receipt/tota/?$q="+str+"&$unit_no="+pvalue+"&$mainid="+rid); 
    xmlhttp.send();
    //document.getElementById("hidddd").style.display = "none";
    }

    </script>	
    
    



<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
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
	<script> 

    function deletes(str){ 
 //  alert(str+pvalue);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     //document.getElementById("ted").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/status.php/?$q="+str,true);  
   //alert("<?php echo base_url();?>ajax/status.php?$q="+str); 
    xmlhttp.send();
    //document.getElementById("hidddd").style.display = "none";
    }

    </script>
    
    <script> 

    function deletesnew(str){ 
    var pvalue = $("#units").val() ;
	 var pvalues = $("#amo").val() ;
	// alert(pvalues);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     //document.getElementById("ted").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/deleteamount.php/?$q="+str+"&$unit_no="+pvalue,true);  
   //alert("<?php echo base_url();?>ajax/deleteamount.php?$q="+str+"&$unit_no="+pvalue); 
    xmlhttp.send();
    //document.getElementById("hidddd").style.display = "none";
    }

    </script>	
    
    
    
    
    <script> 

    function prod(str) {
     
   //alert("gettt");
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showus1").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/getunits.php?$q="+str,true);
   // alert("<?php echo base_url();?>ajax/getunits.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hidu1").style.display = "none";
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

    function getdes(str,rid) {
     // var txtFnameValue = $("#str").val() ;
   var txtFnameValue = str ;
 //  alert(txtFnameValue);
  var result = txtFnameValue;
         //   var result = txtFnameValue+'/'+ txtLnameValue;
            var reult1=result.toLowerCase();
            $('#dess').val(reult1);
			
			
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById(rid).innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","https://www.tpaccbms.com/ajax/selectmain.php?$q="+str,true);
//	alert("<?php echo base_url(); ?>ajax/selectmain.php?$q="+str);
    xmlhttp.send();
    document.getElementById("rdivs").style.display = "none";
    }

</script>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   <?php $querydpg = $this->db->query("SELECT * FROM  cal_amount ");
  $foud = $querydpg->num_rows(); 
 
 if($foud > 0){ ?> 
  <script>
      $(document).ready(function()
{
   window.location.assign("<?php echo base_url();?>Receipt/deleteamo");
   // executes when HTML-Document is loaded and DOM is ready
  // alert("(document).ready was called - document is ready!");
   
});

  </script>
  <?php }?>


    
    
