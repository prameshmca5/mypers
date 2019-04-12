<?php
 error_reporting(0);
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
<?php $this->load->view('sidebar');
//$unitno = $this->uri->segment('3');
 
 if($unitno==""){
//	 $inn = $this->db->query("delete from expance_amount ");
 //$inns = $this->db->query("delete from temp_expance");
 }
 
 $unitnos = rand(10000,8900000);
  $unitno = "ve_".$unitnos;
  
 ?>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 2px;
}

.slider.round:before {
  border-radius: 50%;
  
  
}
  .sldbtnrnd
  {
      
      border-radius: 20px!important;
    
  }
  
  .lbls
  {
   font-weight: 600!important;   
      
      
  }

</style>

<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link href="<?php echo base_url();?>dist/css/datepicker.css" rel="stylesheet">   
 
 
 
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
                        <td class="box-title"><h3 style="margin-top: 0px;">Invoice Create</h3></td>
                        

                    </div>
                                     
                    
                       <div class="col-md-3 col-xs-4" style="padding-left: 64%;">
                       <td><a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Expances');?>">Back To List</a></td>
                    </div>
                                        
                    
                </div>
					
			<hr>
			
					<div style="color:red;">
		<td ></td>
</div>	&nbsp;
		
		
		
		
		
		
		
		<div class="col-md-12 col-xs-12 no-padding">
                            <div class="col-md-12 col-sm-12 col-xs-12 right-box" style="border: 1px solid #999;border-radius: 2px;">
                                
								
								
								
					<div class="row" style="background-color: #d2cece;padding-bottom: 10px;" >
                    <div class="col-md-2 col-xs-6" >
                        <h3>New Invoice </h3>
			
					<?php  $pro = $_SESSION['bms_default_property'];?>
                    </div>
                                      
                    
                </div>
				&nbsp;
		<form name="bms_frm" id="bms_frm" method="post" action="<?php echo base_url('index.php/Expances/invoice_add');?>">
		    
		
		<input type="hidden" name="loginname"  value="<?php echo isset($_SESSION['bms']['full_name']) ? $_SESSION['bms']['full_name'] : $_SESSION['bms']['first_name'];?>">
		
		    	<input type="hidden" name="units" id="units" value="<?php echo $unitno;?>" class="form-control">
			
     <div class="row">
                    <div class="col-md-2 col-xs-6">
                       Property
                    </div>
                    
                    <div class="col-md-3 col-xs-5">
                  <select class="form-control" id="" name="name1" class="inp txt-fld" style="width: 100%;" onChange="ven(this.value);">
						<option value="">Select Property</option>
                            <?php 
                                foreach ($properties as $key=>$val) { 
                                    $selected = isset($property_id) && trim($property_id) != '' && trim($property_id) == $val['property_id'] ? 'selected="selected" ' : '';  
                                    echo "<option value='".$val['property_id']."' ".$selected." data-value='".$val['total_units']."'>".$val['property_name']."</option>";
                                } ?> 
                        </select>

                    </div>
                     <div class="col-md-1 col-xs-6"></div>
					 <div class="col-md-2 col-xs-5">

                        Select Vendor
                    </div>
					 
					     <div class="col-md-3 col-xs-5">
                        
                          <div id="showven"></div>
                              <div id="hideven">
                   <select class="form-control" name="vender_id" onChange="porder(this.value);">
                       <option value="">Select</option>
                       
                      <?php  $querys = $this->db->query("SELECT * FROM  bms_service_provider where property_id ='$pro'");
  foreach ($querys->result() as $rows)
  {?>
                     <option value="<?php echo $rows->service_provider_id;?>"><?php echo $rows->provider_name;?></option>
                      <?php }?>                    
                        </select>
                    </div>
                    </div>
					 
					 
                       
					
                      <div class="col-md-1 col-xs-6"></div>
                   
                                        
                    
                </div>
&nbsp;
	<div class="row">
                   
                   
                    
                     
					 <div class="col-md-2 col-xs-5">

                         <td  class="lbls">Date</td>
                    </div>
					 <div class="col-md-3 col-xs-5">
					   
 
  <input type="text" class="form-control datepicker" name="selectdate" value="<?php echo date("Y-m-d");?>">
                     
				
                        </select>
                      
                        
                        
                    </div>
					
                      <div class="col-md-1 col-xs-6"></div>
                   
                                        
                    
                </div>
              &nbsp;  
               <div class="row">
                    <div class="col-md-2 col-xs-6">
                       <td  class="lbls">PO Number</td>
                    </div>
                   
                    <div class="col-md-3 col-xs-5">
                       
                          <div ></div>
                              <div>
                                  <div id="showorder"></div>
                                  <div id="hideorder"> 
                   <select class="form-control" name="po">
                     <option value="">Select</option>
                   
  <option value="">Select Vender First</option>
                                           
                        </select>
                        </div>
                    </div>
                    </div>
                      <div class="col-md-1 col-xs-6"></div>
					 <div class="col-md-2 col-xs-5">

                         <td  class="lbls">Invoice Number</td>
                    </div>
					 <div class="col-md-3 col-xs-5">
					<?php 
					
					 $q = $this->db->query("SELECT exp_id FROM  expenses");
                   
 foreach ($q->result() as $r)
  { $n = $r->exp_id;}
	$dbValue = "INV-".str_pad($n+1, 5, "0", STR_PAD_LEFT);				
	//echo $dbValue;exit;
  ?>
   
                       
 <input type="hidden" class="form-control"  name="invoicenew" value="<?php echo $dbValue; ?>">
  <input type="text" class="form-control"  name="Invoice" value="<?php echo $dbValue; ?>" required>
                     
				
                        </select>
                      
                        
                        
                    </div>
					
                      <div class="col-md-1 col-xs-6"></div>
					
                    
                   
                                        
                    
                </div>
                &nbsp;
          <div class="row">
                    <div class="col-md-2 col-xs-6">
                       <td  class="lbls"></td>
                    </div>
                   
                    <div class="col-md-3 col-xs-5">
                         
                          <div ></div>
                              <div>
                	<?php 
					
					 $q = $this->db->query("SELECT exp_id FROM  expenses");
                   
 foreach ($q->result() as $r)
  { $n = $r->exp_id;}
	$dbVal = "ID-".str_pad($n+1, 5, "0", STR_PAD_LEFT);				
	//echo $dbValue;exit;
  ?>                  
                                  
                  <input type="hidden" class="form-control" readonly name="id" value="<?php echo $dbVal; ?>">
                    </div>
                    </div>
                      
					
                    
                   
                                        
                    
                </div>   
                
              
				
				<div class="row">
                    <div class="col-md-3 col-xs-4">
                       <h3><b>Items</b></h3>
					   <td>(All Currencies are in RM)</td>
                    </div>
                           
                                        
                    
                </div>
				&nbsp;
				<div  style="margin-top: -14;">
    
    
        

      	<div class="input-group control-group after-add-more" style="width: 87%;
    margin-left: 20px;">
		
		
		<div id="showdetail"></div>
		
  	<div id="hidedetail">
               <div class="controler">
         <div class="col-md-12" >
             <div class="row">
			  <table class="table table-bordered"  style=" border: 2px solid #fff;"> 
                 <div class="col-md-2">
				 
				 
				 <td style="border: 2px solid #fff; width: 300px;"><label class="lbls">Description</label> 
                     <input class="form-control" name="des[]" id="mysub" onblur="createUserName();" style="padding: 6px; border-radius: 4px;  width: 302px;"></td>
    
    
                    
                 </div>
                 <div class="col-md-2">
				 
                    <td style="border: 2px solid #fff; width: 31.5%;"><label  class="lbls" >Category</label>
                     <select class="form-control" name="categorynew[]" style="padding: 6px;border-radius: 4px;">
                    <option value="">Selete</option>   
                  <?php  //echo "SELECT * FROM `bms_property_units` WHERE property_id = '$proid'";
                         $querydp = $this->db->query("SELECT excat_id,excat_name FROM `expenseitem_category`");
  foreach ($querydp->result() as $rowpp)
  { ?>
                           <option value="<?php echo $rowpp->excat_id ; ?>"><?php echo $rowpp->excat_name ; ?></option> <?php }?>
				
                        </select>
                        </td>
                 </div>
                 <div class="col-md-3">
				 
				 
				 
			
                        
                        
                     
                 </div>
               

                 <div class="col-md-2">
				 
                    <td style="border: 2px solid #fff;"> <label class="lbls">Amount</label>
                    <input class="form-control" name="amount[]" id="mysub" onblur="tota(this.value,<?php echo "1";?>)" style="    width: 245px;padding: 6px;
    border-radius: 4px;"></td>
                    
                 </div>

                 <div class="col-md-2">
				  <td></td>
                    <input type="hidden" id="cval" value="1">
                  
                 </div>
				 </table>
				
             </div>
             <div id="newr"></div>


         </div>

     </div>
					
                 
				 
            
				<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script>
    function refresh_div() {
        
      	
        jQuery.ajax({
            url:"<?php echo base_url();?>index.php/Expances/selcount/<?php echo $unitno; ?>",
            type:'POST',
            success:function(results) {
             jQuery(".resultt").html(results);
            }
        });
       
    }
    t = setInterval(refresh_div,100);
</script>
   
   
   <script>
    function refresh_divnew() {
        
      	
        jQuery.ajax({
            url:"<?php echo base_url();?>index.php/Expances/subtotal/<?php echo $unitno; ?>",
            type:'POST',
            success:function(resultsnew) {
             jQuery(".resultsubtotal").html(resultsnew);
            }
        });
       
    }
    t = setInterval(refresh_divnew,1000);
</script>


 <script>
    function refresh_divnews() {
        
      	
        jQuery.ajax({
            url:"<?php echo base_url();?>index.php/Expances/totalamos/<?php echo $unitno; ?>",
            type:'POST',
            success:function(resultsnews) {
             jQuery(".totalamount").html(resultsnews);
            }
        });
       
    }
    t = setInterval(refresh_divnews,1003);
</script>
   
			
		
       
		
			  
				&nbsp;
				
				<div class="row" >
				<div class="col-md-7 col-xs-6"></div>
				<div class="col-md-5 col-xs-6">
				
				<div class="row">
				    
				    	<div class="col-md-4 col-xs-12">
                       <label style=" margin-top: 10px; margin-left: -25px;">Sub Total</label>
					   </div>
					   <div class="col-md-8 col-xs-12" >
				<p class="resultsubtotal" style=" border: 1px solid #d0c4c4;margin: 0 0 0px;      margin-bottom: 5px;     width: 115%;
    margin-left: -62px; margin-bottom: 3px;padding: 6px;
    border-radius: 4px; ">0</p>
					   </div>
					   
					   
				
	            <div class="col-md-2 col-xs-12">
                       <label style="    margin-left: -41px; margin-top: 5px;">Discount(%) </label>
					   </div>
					   <div class="col-md-8 col-xs-12" >
			 <input type="text" class="form-control" name="discount" id="mysub" onblur="diss(this.value,<?php echo "1";?>)" style="    margin-bottom: 5px;    width: 262px;padding: 6px;
    border-radius: 4px;margin-left: 4px;">
					   </div></br></br>
				 &nbsp;
                  
					<div class="col-md-4 col-xs-12">
                       <label style=" margin-left: -38px; margin-top: 5px;">Net Amount</label>
					   </div>
					   <div class="col-md-8 col-xs-12" >
				<p class="resultt" style=" border: 1px solid #d0c4c4;margin: 0 0 0px;       width: 115%;
    margin-left: -62px; margin-bottom: 3px;padding: 6px;
    border-radius: 4px; ">0</p>
					   </div></br></br>
					   
					   &nbsp;
					      <div class="col-md-2 col-xs-12">
                       <label style="margin-left: -8px;   margin-top: 5px;">Tax(%) </label>
					   </div>
					   <div class="col-md-8 col-xs-12" >
			 <input type="text" class="form-control" name="taxes" id="mysubtax" onblur="taxx(this.value,<?php echo "1";?>)" style="     margin-bottom: 5px;    margin-bottom: 5px;   width: 265px;padding: 6px;
    border-radius: 4px;">
					   </div></br></br>
				 &nbsp;
				 
				 
				 	<div class="col-md-3 col-xs-12">
                       <label style=" margin-left: 0px; margin-top: 5px;">Total*</label>
					   </div>
					   <div class="col-md-8 col-xs-12" >
				<p class="totalamount" style=" border: 1px solid #d0c4c4;margin: 0 0 0px;  width: 115%; margin-left: -32px; margin-bottom: 3px;padding: 6px;border-radius: 4px; ">0</p>
					   </div></br></br>
				 
				 
                 
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
                       
				<td><a role="button" class="btn btn-primary" style="margin-left: 17px;" href="<?php echo base_url('index.php/Expances/add');?>">Clear All Lines</a></td>
                    </div>
				
				
			 </div>	
			 
		</div>	 
			<div class="col-md-4 col-xs-4"></div>
			
			
			</div>
			
			</div>
			
			<!--hide div whean select purches order-->
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
                        <input type="submit" name="" id="" value="Done"  class="btn btn-primary" style="float: right;">
					  
                    </div>
					 <div class="col-md-6">
                     <input type="submit" name="" id="" value="Reset" class="btn btn-primary"  style=" margin-left: -22px;">
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
            "owner": "Please enter condo name",
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
location='https://www.tpaccbms.com/index.php/Expances/add/'+unit_id;
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
        
       //alert(rdiv);
         var row = '';
             row += '<div class="row" style="margin-top: -17px;" >' ;
			  row += '<table class="table table-bordered" style="width: 96%;border: 2px solid #fff; ">' ;
             row += '<div class="col-md-3">';
             
             row += '<td style="border: 2px solid #fff; width: 37.3%"><input class="form-control"  name="des[]" style=" padding: 6px; border-radius: 4px;">';
             row += '</div>';
             
             
            row += '<div class="col-md-2" >';
				 
             row += '<td style="border: 2px solid #fff; width: 33%;"><label  class="lbls" ></label>';
             row +='<select class="form-control" name="categorynew[]" style="padding: 6px;border-radius: 4px;">';
        
        
         row += '<option>Select</option>';
          row += '<option value="Subscription fee">Subscription fee</option>';
           row += '<option value="Fixed Services-Management Fee">Fixed Services-Management Fee</option>';
            row += '<option value="Salary">Salary</option>';
             row += '<option value="Accounting Fee">Accounting Fee</option>';
                        
                          
                          
                    row += '</select>';
                     row += '</td>';
                 row += '</div>';
            
           
              row += '    <div class="col-md-2">';
			  
             row += '<td style="border: 2px solid #fff;width: 263px; "><input type="text" name="amount[]"  class="form-control" onblur="tota(this.value,'  +"'"+''+rdiv+''+"'"+')" style=" padding: 6px; border-radius: 4px; width: 101%;" ></td>';
             row += '    </div>';
            
            
             
			  row += '</table>';
			   row += ' <button type="button" onclick="deletesnew('  +"'"+''+rdiv+''+"'"+');$(this).parent().remove()" class="btn btn-danger btn-Remove" style="float: right;margin-top: -75px;"><i class="fa fa-close"></button>';
             row += '</div>';
			 

             $('#newr').append(row);
 

          document.getElementById("cval").value = id+1;
		
	 
      }
</script>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
<script>
// we used jQuery 'keyup' to trigger the computation as the user type
$('.price').keyup(function () {
 
    // initialize the sum (total price) to zero
    var sum = 0;
     
    // we use jQuery each() to loop through all the textbox with 'price' class
    // and compute the sum for each loop
    $('.price').each(function() {
        sum += Number($(this).val());
    });
     
    // set the computed value to 'totalPrice' textbox
    $('#totalPrice').val(sum);
     
});
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
     document.getElementById("newconn").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>index.php/Expances/tota/?$q="+str+"&$unit_no="+pvalue+"&$mainid="+rid,true);  
//alert("<?php echo base_url();?>index.php/Expances/tota/?$q="+str+"&$unit_no="+pvalue+"&$mainid="+rid);
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
//	 alert(pvalues);
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
    xmlhttp.open("GET","<?php echo base_url();?>ajax/deleteexpanceamount.php/?$q="+str+"&$unit_no="+pvalue,true);  
  // alert("<?php echo base_url();?>ajax/deleteexpanceamount.php?$q="+str+"&$unit_no="+pvalue); 
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
      document.getElementById("showus").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/getunits.php?$q="+str,true);
   // alert("<?php echo base_url();?>ajax/getunits.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hidu").style.display = "none";
    }

    </script>


<script>
    $(document).ready(function() {

    $.ajax({
        type: 'post',
        url: 'https://www.tpaccbms.com/ajax/deleteexpanceamo.php',
        data: $('#search_filters').serialize(),
        success: function (response) {
            $('#search_display').html(response);
           
        }
    });

});
    </script>
</script>
<script> 

    function cat1(str) {
     //alert(str);
   
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
  
  })
</script>
 <script> 

    function ven(str) {
    // alert(str);
   
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showven").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url(); ?>payment/venderss?$q="+str,true);
	//alert("<?php echo base_url(); ?>payment/venderss?$q="+str);
    xmlhttp.send();
    document.getElementById("hideven").style.display = "none";
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
    xmlhttp.open("GET","<?php echo base_url();?>ajax/get_block.php?$q="+str,true);
   // alert("<?php echo base_url();?>ajax/get_recblock.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hideblock").style.display = "none";
    }
    </script>
    	<script> 

    function diss(str,rid){
 
      var pvalue = $("#units").val() ;
    // var pvalues = $("#cval").val() ;
     
 //alert(str+pvalue);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("newconn").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>index.php/Expances/disss/?$q="+str+"&$unit_no="+pvalue+"&$mainid="+rid,true);  
//alert("<?php echo base_url();?>index.php/Expances/disss/?$q="+str+"&$unit_no="+pvalue+"&$mainid="+rid);
    xmlhttp.send();
    //document.getElementById("hidddd").style.display = "none";
    }

    </script>	
    
    
    	<script> 

    function porder(str){
 
     

     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("showorder").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>index.php/Payment/orders/?$q="+str,true);  
//alert("<?php echo base_url();?>index.php/Payment/orders/?$q="+str);
    xmlhttp.send();
    document.getElementById("hideorder").style.display = "none";
    }

    </script>
    
        	<script> 

    function taxx(str,rid){
 
      var pvalue = $("#units").val() ;
    // var pvalues = $("#cval").val() ;
     
 //alert(str+pvalue);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("newconn").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>index.php/Expances/taxadd/?$q="+str+"&$unit_no="+pvalue+"&$mainid="+rid,true);  
//alert("<?php echo base_url();?>index.php/Expances/taxadd/?$q="+str+"&$unit_no="+pvalue+"&$mainid="+rid);
    xmlhttp.send();
    //document.getElementById("hidddd").style.display = "none";
    }

    </script>
    
    	<script> 

    function pdetail(str){
 
     

     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("showdetail").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/orderdetail.php/?$q="+str,true);  
//alert("<?php echo base_url();?>ajax/orderdetail.php/?$q="+str);
    xmlhttp.send();
    document.getElementById("hidedetail").style.display = "none";
    }

    </script>
    
    
    <!--ajax page code-->
    
    <script> 

    function taxxnew(str,rid){
 
      var pvalue = $("#purid").val() ;
    // var pvalues = $("#cval").val() ;
     
 //alert(str+pvalue);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("showdetail").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/orderdetail.php?$q="+pvalue+"&$taxamo="+str+"&$mainid="+rid,true);  
//alert("<?php echo base_url();?>ajax/orderdetail.php?$q="+pvalue+"&$taxamo="+str+"&$mainid="+rid);
    xmlhttp.send();
   // document.getElementById("hidedetail").style.display = "none";
    }

    </script>
    
    	<script> 

    function dissnew(str,rid){
 
      var pvalue = $("#purid").val() ;
    // var pvalues = $("#cval").val() ;
     
 //alert(str+pvalue);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("showdetail").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/orderdetail.php?$q="+pvalue+"&$diss="+str+"&$mainid="+rid,true);  
//alert("<?php echo base_url();?>ajax/orderdetail.php?$q="+pvalue+"&$diss="+str+"&$mainid="+rid);
    xmlhttp.send();
   // document.getElementById("hidedetail").style.display = "none";
    }

    </script>
    
    