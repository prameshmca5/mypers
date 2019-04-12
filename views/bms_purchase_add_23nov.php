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
      ?><script>alert("Unauthorize user."); window.location.assign('<?php echo base_url();?>Bms_index/logout');</script><?php 
  }
  $this->load->view('header');?>
<?php $this->load->view('sidebar'); //echo "<pre>";print_r($properties); ?>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  
		 
		  
		  
		<style>
		
		.btn-danger {
    color: #fff;
    background-color: #d9534f;
    border-color: #d43f3a;
    margin-left: 281%;
    margin-top: -92%;
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
    margin-top: 1%;
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
      
    </section>

	</head>
	<body>
		<section class="content12">
            <div class="container-fluid">
			   <div class="box1 box-primary1">
				<div class="row rwpdn">
					<div class="col-md-9">
						
						<h4 class="recv1">Purchase Order</h4>
					</div>
					<div class="col-md-3">
					
						<a role="button" class="btn btn-primary1" href="<?php echo base_url(); ?>index.php/Bms_purchase_order/purchase_list_view">Back To List</a>
					</div>
				
				</div>
			
				</div>
					<div class="row rwpdn">
					<div class="col-md-9">
			
						<p  class="wrng-txt">( * ) Indicates required  fileds</p>
					</div>
					<div class="col-md-3">
					
					</div>
					
					 <?php if(isset($_SESSION['flash_msg']) && trim( $_SESSION['flash_msg'] ) != '') {
                    //if($_GET['login_err'] == 'invalid')
                    echo '<div class="alert alert-success msg_notification"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>';
                    echo '</strong>'.$_SESSION['flash_msg'].'</div>';
                    unset($_SESSION['flash_msg']);
                }
            ?>
					
						<!--<form action="<?php //echo base_url('index.php/Bms_purchase_order/data_add');?>" name="" id="" method="post">-->
						
				<!--<div class="col-md-12">
                      
                   <div class="col-md-1 fnt-txthdng" style="padding: 0px;">Property</div>
                   <div class="col-md-2">
                       <select class="form-control"  name="name" class="inp txt-fld" style="width: 168%;margin-bottom: 6%;" onChange="cat1(this.value);">
						<option value="">All</option>
                            <?php /*
                                                foreach ($properties as $key=>$val) { 
                                                    $selected = isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] == $val['property_id'] ? 'selected="selected" ' : '';  
                                                    echo "<option value='".$val['property_id']."' ".$selected.">".$val['property_name']."</option>";
                                                } */?>   
                        </select>

                   </div>
                   
                  <div class="col-md-1"></div>
                   <div class="col-md-1 fnt-txthdng">Unit No</div>
                   <div class="col-md-2" id="hidee">
                       
                       <select name="unitnosd" class="form-control"  style="width: 106%;">
                       <option value="">All</option>
                       
                       <?php /*
                      $pro = $_SESSION['bms_default_property'];
                       $querybv = $this->db->query("SELECT unit_no FROM  bms_property_units where property_id = '$pro'");
                      
                  ?>
                <?php   foreach ($querybv->result() as $rowbv){ ?>
                      
                       <option  value="<?php echo $rowbv->unit_no; ?>"><?php echo  $rowbv->unit_no; ?></option>
                           
                          <?php }*/?>
                       </select>
                       
                       
                       
                          
                          
                          
                       
                       </div>
                        <div class="col-md-2" id ="sho"></div>
                        
                        
                        
                       
                          
                          
                          
                          
                    <div class="col-md-2"></div>
					 
                  </div>-->
				</div>
				
			    <div class="row  bdrs-pd">
					<div class="row new-prches  all-bdrs" style="">
						<div class="col-md-9">
							<h2 class="nwprch">New Purchase Order</h2>
							
						</div>
						<div class="col-md-3">
						
						</div>
					
					</div>
			
			
			
			
			
			<form action="<?php echo base_url('index.php/Bms_purchase_order/data_add');?>" name="" id="" method="post">
			    
			    
			    
			    
			    <!--cat section-->
			    
			    
			    		<div class="col-md-12" style="    margin-top: 2%;    margin-bottom: 2%;">
                      
                   <div class="col-md-1 fnt-txthdng byfrm style="padding: 0px;">Property</div>
                   <div class="col-md-2">
                       <select class="form-control"  name="name" class="inp txt-fld" style="width: 168%;margin-bottom: 6%; margin-left: 9%;" onChange="cat1(this.value);">
						<option value="">All</option>
                            <?php 
                                                foreach ($properties as $key=>$val) { 
                                                    $selected = isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] == $val['property_id'] ? 'selected="selected" ' : '';  
                                                    echo "<option value='".$val['property_id']."' ".$selected.">".$val['property_name']."</option>";
                                                } ?>   
                        </select>

                   </div>
                   
                  <div class="col-md-4"></div>
                   <div class="col-md-1 fnt-txthdng byfrm" style="margin-left: 1.5%;">Unit No</div>
                   <div class="col-md-2" id="hidee" style="margin-left: 2%;">
                       
                       <select name="unitnosd" class="form-control"  style="width: 106%;">
                       <option value="">All</option>
                       
                       <?php
                      $pro = $_SESSION['bms_default_property'];
                       $querybv = $this->db->query("SELECT * FROM  bms_property_units where property_id = '$pro'");
                      
                  ?>
                <?php   foreach ($querybv->result() as $rowbv){ ?>
                      
                       <option  value="<?php echo $rowbv->unit_id; ?>"><?php echo  $rowbv->unit_no; ?></option>
                           
                          <?php }?>
                       </select>
                       
                       
                       
                          
                          
                          
                       
                       </div>
                        <div class="col-md-2" id ="sho"></div>
                        
                        
                        
                       
                          
                          
                          
                          
                    <div class="col-md-2"></div>
					 
                  </div>
			    
			    
			    <!--end cat section-->
			
			
					<div class="row  topmgn">
					 
							<div class="row">
								<div class="col-md-7">
									<div class="col-md-2">
									   <p class="byfrm">Buy From</p>
									</div>
									 <div class="col-md-10">
									   <input type="text" name="buy" class=" txt-fld1 wdt-inpt" >
									</div>
								</div>
								 <div class="col-md-5">
								   <div class="col-md-3">
									  <p class="byfrm">Date</p>
									</div>
									 <div class="col-md-9">
									 
									 <input type="text" name="sdate" class="txt-fld1 datepicker" id="" style=" ">
									</div>
								</div>
							</div>
							<div class="row  frmscnd-rwpdn">
								<div class="col-md-7">
									<div class="col-md-2">
									   <p class="byfrm">Reg No.</p>
									</div>
									 <div class="col-md-10">
									   <input type="text" name="rarg" class=" txt-fld1 wdt-inpt1" id="search_txt">
									</div>
								</div>
								 <div class="col-md-5">
								   <div class="col-md-3">
									  <p class="byfrm">Delivery Date</p>
									</div>
									 <div class="col-md-9">
									 
									 <input type="text" name="ddate" class=" txt-fld1  wdt-inpt2 datepicker" id="search_txt">
									</div>
								</div>
							</div>
							<div class="row  frmscnd-rwpdn">
								<div class="col-md-7">
									<div class="col-md-2">
									   <p class="byfrm">Address</p>
									</div>
									 <div class="col-md-10">
									   <input type="text" name="addressone" class=" txt-fld1 wdt-inpt" id="search_txt">
									</div>
									<div class="col-md-2">
								
									</div>
									 <div class="col-md-10">
									   <input type="text" name="addresstwo" class=" txt-fld1 wdt-inpt tpmgnad" id="search_txt">
									</div>
									<div class="col-md-2">
								
									</div>
									 <div class="col-md-10">
									   <input type="text" name="addressthree" class=" txt-fld1 wdt-inpt tpmgnad" id="search_txt">
									</div>
									
									
								</div>
								 <div class="col-md-5">
								   
								</div>
							</div>
							<div class="row  frmscnd-rwpdn">
								<div class="col-md-12">
									<div class="col-md-1"></div>
									<div class="col-md-10">
										<div class="col-md-3">
										     <p>Post Code</p>
											<input type="text" name="code" class=" txt-fld1" id="search_txt">
										</div>
										<div class="col-md-3">
										    <p>Town/City </p>
										    <input type="text" name="city" class=" txt-fld1" id="search_txt">
										
										</div>
										<div class="col-md-3">
										    <p>State/Province</p>
										    <input type="text" name="state" class=" txt-fld1" id="search_txt">
										
										</div>
										<div class="col-md-3">
										    <p>Country</p>
										    <select class="sel slct-bx  slect-fld" name="country">
												<option value="">Select</option>
												<option value="Cash">Cash</option>
												<option value="Cheque">Cheque</option>
												<option value="Online">Online</option>
											</select>
										</div>
										
									 
									</div>
								
								</div>
								 
							</div>
							
								<div class="row  frmscnd-rwpdn">
								<div class="col-md-12">
									<div class="col-md-1">
									 <p class="byfrm">Contact</p>
									</div>
									<div class="col-md-10">
										<div class="col-md-3">
										     <p>Phone #1</p>
											<input type="text" name="cono" class=" txt-fld1" id="search_txt">
										</div>
										<div class="col-md-3">
										    <p>Phone #2 </p>
										    <input type="text" name="cont" class=" txt-fld1" id="search_txt">
										
										</div>
										<div class="col-md-3">
										    <p>Fax</p>
										    <input type="text" name="fax" class=" txt-fld1" id="search_txt">
										
										</div>
										<div class="col-md-3">
										    <p>Email</p>
										      <input type="text" name="email" class=" txt-fld1" id="search_txt">
										</div>
										
									 
									</div>
								
								</div>
								 
							</div>
						    <div class="row  frmscnd-rwpdn">
								<div class="col-md-12">
									<div class="col-md-1">
									 <p class="byfrm">Reason</p>
									</div>
									<div class="col-md-10">
										<div class="col-md-10">
										     <textarea class="txt-rd" name="reson" rows="4" cols="108">

                                               </textarea>
										</div>
										
										
										<div class="col-md-2">
										   
										</div>
										
									 
									</div>
								
								</div>
								 
							</div>
						
								<div class="row  frmscnd-rwpdn">
								<div class="col-md-12">
									<div class="col-md-1">
									 <p class="byfrm">Total</p>
									</div>
									<div class="col-md-10">
										<div class="col-md-3">
										  
										 <input type="number" class=" txt-fld1" name="invoice_subtotal" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"> 
										</div>
										<div class="col-md-3">
										   
										
										</div>
										<div class="col-md-3">
										   
										
										</div>
										<div class="col-md-3">
										  
										</div>
										
									 
									</div>
								
								</div>
								 
							</div>
							<div class="row  btmrwpdn">
							    <div class="row">
								 <h2  style="color: #afa8a8;">Line Item</h2>
								</div>
								<div class="row  scnrw-clr" style="display:none;">
								<div class="col-md-6">
									
									 <div class="col-md-12">
									 
									 <p class="byfrm">Desctiption</p>
									  <textarea class="txt-rd" rows="5" cols="" style="width: 100%;"> </textarea>

                                              
									</div>
									<div class="col-md-12">
										<div class="col-md-4">
									
									<p class="byfrm">For Equipment</p>
									 <select class="sel slct-bx  slect-fld1" name="paymode">
												<option value="">Select</option>
												<option value="Cash">Cash</option>
												<option value="Cheque">Cheque</option>
												<option value="Online">Online</option>
											</select>
									</div>
									<div class="col-md-8"></div>
									</div>
									</div>
								
								 <div class="col-md-6">
								    <div class="row">
								   <div class="col-md-3">
									  <p class="byfrm">Qty</p>
									  <input type="text" name="payment" class=" txt-fld1 wdsrt" id="search_txt">
									</div>
									 <div class="col-md-3">
									  <p class="byfrm">UOM</p>
									  <input type="text" name="payment" class=" txt-fld1 wdsrt" id="search_txt">
									</div>
									 <div class="col-md-3">
									  <p class="byfrm">U/Price</p>
									  <input type="text" name="payment" class=" txt-fld1 wdsrt" id="search_txt">
									</div>
									 <div class="col-md-3">
									  <p class="byfrm">Price</p>
									   <input type="text" name="data[0][total]" id="total_11" class="form-control totalLinePrice txt-fld1 wdsrt" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
									
									</div>
									 </div>
									 
									 
									     <div class="row  sbbxs">
								   <div class="col-md-3">
									  <p class="byfrm">Discount</p>
									  <input type="text" name="payment" class=" txt-fld1 wdsrt1" id="search_txt">
									</div>
									 <div class="col-md-3">
									 
									</div>
									 <div class="col-md-3">
									  
									</div>
									 <div class="col-md-3">
									  <p class="byfrm">Net Amount</p>
									  <input type="text" name="payment" class=" txt-fld1 wdsrt1" id="search_txt">
									</div>
									 </div>
									 
									 	     <div class="row  sbbxs">
								   <div class="col-md-4">
									  <p class="byfrm">Category</p>
									 <select class="sel slct-bx  slect-fld1" name="paymode" onChange="cat(this.value,'mysub');">
												 <?php $query = $this->db->query("SELECT * FROM main_category");
							foreach ($query->result() as $rowd)
							{  ?>
                          <option value="<?php echo $rowd->name;?>"><?php echo $rowd->name;?></option>';
                          <?php } ?>
											</select>
									</div>
									
									
									 <div class="col-md-4">
									 <p class="byfrm">Subcategory</p>
									  <select class="form-control" name="catsub1[]" id="mysub" onblur="createUserName();" style="width: 150px !important;"></select>
									</div>
									 <div class="col-md-4">
									  
									</div>
									
									 </div>
									
								</div>
								 <div class="col-md-2">
				  
                    <input type="hidden" id="cval" value="1">
                  
                 </div>
								</div>
								 <div id="newr"></div>
								 
								 
								
								</div>
								 
							</div>
								 
								 
							</div>
							 
							
							
							 
							
							 
							 <!--</form>-->
				            <div class="row">
							    <div class="row">
								 <div class="col-md-2">
								
								 <h4  style="">Notes/Terms</h4>
								</div>
									 <div class="col-md-10">
									 <div class="row">
									   <textarea class="txt-rd" rows="5" cols="" style="width: 90%;"> </textarea>
									  </div> 
									   <div class="row">
									    <div class="col-md-4"></div>
									   <div class="col-md-4">
									  
									   <button type="button" class="btn-primary2" id="addmore" class="btn btn-success addmore" onclick="giveme()"  style="padding-left: 15px;padding-right: 15px;">Add Item</button>
									    <button class="btn-primary2" style="padding-left: 25px;padding-right: 25px;">Done</button>
									   </div>
									   <div class="col-md-4"></div>
									   </div>
									 </div>
							</div>
							
					
						
					</div>
				</div>
				
            </div>

		</section>

		  


	</body>
	
    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- bootstrap datepicker -->
  
<?php $this->load->view('footer');?>
<script src="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> 
<!-- overlay loader for ajax call -->
<script src="<?php echo base_url();?>assets/js/loadingoverlay.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>
<link rel='stylesheet' type='text/css' href='css/style.css' />

		<script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
		
		<script src="<?php echo base_url();?>assets/js/auto.js"></script>
<script>

      function giveme()
      {
        var  id = $('#cval').val();

        var  rdiv = "mysub"+id;
      //  alert(rdiv);
          // row += '<div class="">';        
         var row = '<div class="row  scnrw-clr input-group control-group after-add-more">';
		 	
		 row += '  <tr class="item-row">';
		 
             row += '<div class="row" style="margin-top: -17px;" >' ;
			 
			  row += '<div class="col-md-6">';
									 
			 row += '<p class="byfrm">Desctiption</p>';
			 row += '<textarea class="txt-rd" rows="5" name="des[]" cols="" style="width: 100%;"> </textarea>';

             
			     
			row += '<div class="col-md-12">';
			row += '<div class="col-md-4">';
			row += '<p class="byfrm">For Equipment</p>';
			row += '<td style="width: 150px !important; border: 2px solid #fff;"><select class="form-control"  name="catsub1[]" style="width: 150px !important;" onblur="createUserNamesn();">';
			
			row += '<option value="Cash">Cash</option>';
			row += '<option value="Cheque">Cheque</option>';
			row += '<option value="Online">Online</option>';
			row += '</select></td>';
			row += '</div>';
			
			row += '</div>';
			row += '</div>';
			row += '<div class="col-md-6">';
			row += '<div class="row">';
			row += '<div class="col-md-3">';
			row += '<p class="byfrm">Qty</p>';
			row += '<input type="text" name="quantity[]" id="quantity_'+i+'" class="form-control changesNo quy" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">';
			
			row += '</div>';
			row += '<div class="col-md-3">';
			row += '<p class="byfrm">UOM</p>';
			row += '<input type="text" name="um[]"  class=" txt-fld1 wdsrt price" id="search_txt">';
	
			row += '</div>';
			row += '<div class="col-md-3">';
			row += '<p class="byfrm">U/Price</p>';
			row += '<input type="text" name="price[]" id="price_'+i+'" class="form-control changesNo pri" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">';
			
			row += '</div>';
			row += '<div class="col-md-3">';
			row += '<p class="byfrm">Price</p>';
			row += '<input type="text" name="data['+i+'][total]" id="total_'+i+'" class="form-control totalLinePrice to" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">';
			
			
			
			
			
			
			
			
			row += '</div>';
			row += '</div>';
		row += '<div class="row  sbbxs">';
			row += '<div class="col-md-3">';
			row += '<p class="byfrm">Discount</p>';
			row += '<input type="text" name="payment" class=" txt-fld1 wdsrt1" id="tax">';
			row += '</div>';  
			row += '<div class="col-md-3">';
			row += '</div>';
			row += '<div class="col-md-3">';
			row += '</div>';
			row += '<div class="col-md-3">';
			row += '<p class="byfrm">Net Amount</p>';
			row += '<input type="text" name="data[total]" id="total_11'+i+'"  class="txt-fld1 wdsrt1" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">';
			row += '</div>';
			row += '</div>';
			row += '<div class="row  sbbxs" style="margin-left: 0%;">';
			row += '<div class="col-md-4">';
			row += '<p class="byfrm">Category</p>';
			row += '<select type="text" name="cat[]" class="form-control" onChange="cat(this.value,'  +"'"+''+rdiv+''+"'"+'); go(this.value);">; >';
			 row += '             <option>Select</option>';
                         <?php $query = $this->db->query("SELECT * FROM main_category");
							foreach ($query->result() as $rowd)
							{  ?>
             row += '                <option value="<?php echo $rowd->name;?>"><?php echo $rowd->name;?></option>';
                          <?php } ?>
						  
			row += '</select>';
			row += '</div>';									
			row += '<div class="col-md-4">';
			row += '<p class="byfrm">Subcategory</p>';
		
			row += '<select class="form-control"  name="catsub[]" id="'+rdiv+'" style="width: 150px !important;" onblur="createUserNamesn();"></select>';
			
			row += '</div>';
			row += '</div>';
			row += '<div class="col-md-4" style="margin-top: 6%;">';
            row += '<button  class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>';			
			row += '</div>';
			row += '<div class="col-md-2">';
			row += '<input type="hidden" id="cval" value="1">';
            row += '</div>';
			row += '</div>';
			
			row += '</div>';	 
            row += '</div>';
                
             
		
			
			  row += '</tr>';
			
			   
            row += '</div>';
			//row += '</div>';
			

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

    function deletesnew(str){ 
	//alert('fdfrd');
    var pvalue = $("#units").val();
	 var pvalues = $("#amo").val();
	// alert(pvalues);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById(rid).innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/deleteamount.php/?$q="+str+"&$unit_no="+pvalue,true);  
   //alert("<?php echo base_url();?>ajax/deleteamount.php?$q="+str+"&$unit_no="+pvalue); 
    xmlhttp.send();
    //document.getElementById("hidddd").style.display = "none";
    }

    </script>	
	
	
 <script> 

 function cat(str,rid) {
     // var txtFnameValue = $("#str").val();
	//alert(str);
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
    xmlhttp.open("GET","<?php echo base_url(); ?>ajax/select.php?$q="+str,true);
	//alert("<?php echo base_url(); ?>ajax/select.php?$q="+str);
    xmlhttp.send();
   // document.getElementById("hid").style.display = "none";
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
</script>

<script type="text/javascript">

   
//here it will remove the current value of the remove button which has been pressed
      $("body").on("click",".remove",function(){ 
	  //alert('fgf');
          $(this).parents(".control-group").remove();
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
