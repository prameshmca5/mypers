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
$vender_id = $this->uri->segment('3');
//echo "<pre>";print_r($properties); 




 
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
              
      
			
		<div class="row">
           
             <div class="col-md-12">
              
              <?php if(isset($_SESSION['flash_msg']) && trim( $_SESSION['flash_msg'] ) != '') {
                    //if($_GET['login_err'] == 'invalid')
                    echo '<div class="alert alert-success msg_notification"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>';
                    echo '</strong>'.$_SESSION['flash_msg'].'</div>';
                    unset($_SESSION['flash_msg']);
                }
            ?>
            </div>
          
            </div>
			
			
			
			<div class="row">
                    <div class="col-md-3 col-xs-6">
                        <td class="box-title"><b>Payment Voucher</b></td>
                        

                    </div>
                                     
                    
                       <div class="col-md-3 col-xs-4" style="padding-left: 64%;">
                       <td><a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Payment');?>">Back To List</a></td>
                    </div>
                                        
                    
                </div>
					
		
			
				&nbsp;
		
		
		
		
		
		
		
		
		<div class="col-md-12 col-xs-12 no-padding">
                            <div class="col-md-12 col-sm-12 col-xs-12 right-box" style="border: 1px solid #999;border-radius: 2px;">
                                
								
								
								
					<div class="row" style="background-color: #d2cece; height: 50px;" >
                    
                    

                    <div class="col-md-6 col-xs-12" >
                        <h3>Vendor Payment Voucher </h3>
						
						 
                    </div>
                                      
                    
                </div>
				&nbsp;
		<form name="bms_frm" id="bms_frm" method="post" action="<?php echo base_url('index.php/Payment/payment_add');?>">
		    
		    
		     <div class="row">
                    <div class="col-md-2 col-xs-6">
                       <td>Property</td>
                    </div>
                    
             

                    <div class="col-md-3 col-xs-5">
                       <select class="form-control" id="" name="property_id" class="inp txt-fld" style="width: 100%;margin-bottom: 6%;" onChange="cat1(this.value);">
					 <option value="">Select Property</option>
                            <?php 
                                foreach ($properties as $key=>$val) { 
                                    $selected = isset($property_id) && trim($property_id) != '' && trim($property_id) == $val['property_id'] ? 'selected="selected" ' : '';  
                                    echo "<option value='".$val['property_id']."' ".$selected." data-value='".$val['total_units']."'>".$val['property_name']."</option>";
                                } ?> 
								   
                        </select>
                    </div>
                    
                     <div class="col-md-2 col-xs-5">
                         <td>Unit No</td>
                    </div>
					 <div class="col-md-3 col-xs-5" id="hidee" style="padding-left: 0;">
					  <select name="unit_ido" class="form-control" id="search_txt" style="width: 106%;" onChange="ven(this.value);">
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
					  <div class="col-md-3 col-xs-5" id ="sho"  style="padding-left: 0;"></div>
				   </div>
		    
		    
		    
		    
		    
		    
		    
		    
		    <div class="row" style="margin-top:15px;">
                    <div class="col-md-2 col-xs-6">
                       <td>Vendor</td>
                    </div>
                     <div class="col-md-3 col-xs-5">
                             <input type="hidden"  name="vender_id" value="<?php echo $vender_id ;?>" id="pvalue"/>
                             
                             <div id="showven"></div>
                              <div id="hideven">
                <select class="form-control" name="vender_i">
                   <option value="0">Select</option>
                    </select>
                        </div>
                    </div>
                    
                         <div class="col-md-2 col-xs-6">
                       <td>Purchase order </td>
                    </div>
                     <div class="col-md-3 col-xs-5" style="padding: 0px;">
                      <div id="showorder"></div>
                              <div id="hideorder">
                <select class="form-control" name="pu">
                   <option value="0">Select</option>
                    </select>
                        </div>
                    </div>
                    </div>
                    
                  <div class="row" style="margin-top:15px;"> 
                    
                         <div class="col-md-2 col-xs-6">
                       <td>Payment Mode</td>
                    </div>
                     <div class="col-md-3 col-xs-5">
                           
               <select class="form-control" name="paymodes" required>
                   <option value="0">Select</option>
                   <option value="Cash">Cash</option>
                    <option value="Cheque">Cheque</option>
                     <option value="Bank Transfer">Bank Transfer</option>

                    </select>
                        
                    </div>
                    
                    
                    
                     <div class="col-md-2 col-xs-5">
                         <td>Cancelled</td>
                    </div>
					 <div class="col-md-3 col-xs-5" style="padding: 0;">
					   <input type="checkbox" name="cancelled" id="myCheck"  onclick="myFunction()" value="yes" style="height:19px ; width:20px; margin-left: 15px;"> 
                    </div>
                    
                    <script>
function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("text");
    if (checkBox.checked == true){
        text.style.display = "block";
    } else {
       text.style.display = "none";
    }
}
</script>
					 
				   </div>
                   &nbsp;
                   
            
                   
                   &nbsp;
	
	<div class="row">
                    <div class="col-md-2 col-xs-6">
                       <td>Pay To</td>
                    </div>
                    
                    <div class="col-md-3 col-xs-5">
                        
                <input type="text" name="vender_name" class="form-control" > 
                    </div>
                    
                    
                 
                    
                    
                    
					 <div class="col-md-2 col-xs-5">
                         <td>Date</td>
                    </div>
					 <div class="col-md-3 col-xs-5" style="padding: 0;">
					   <input type="text" name="dates" class="form-control datepicker" > 
                    </div>
				   </div>
          	&nbsp;
            
            <div class="row">
                    <div class="col-md-2 col-xs-6">
                       <td>Bank Account</td>
                    </div>
                    
                    <div class="col-md-3 col-xs-5">
                        
                     
  
   <select class="form-control" name="paymentby">
                      <option value="0">Select</option>
                         <?php
                        $queryb = $this->db->query("SELECT * FROM  bms_bank_details");
  foreach ($queryb->result() as $rowb)
  { ?>
                       <option value="<?php echo $rowb->bank_name;?>"><?php echo $rowb->bank_name;?></option>  <?php }?>
                      </select> 
                      
                      
  
                      
             
                    </div>
					 <div class="col-md-2 col-xs-5">
                         <td>Bank Charge</td>
                    </div>
					 <div class="col-md-3 col-xs-5" style="padding: 0;">
					   <input type="text" name="bankcharge" class="form-control" > 
                    </div>
				   </div>
          	&nbsp;
            
            
            
           
			  
				
			<div class="row">
                    <div class="col-md-2 col-xs-6">
                       <td>Cheque No.</td>
                    </div>
                    
                    <div class="col-md-3 col-xs-5">
                <input type="text" name="chequeno" class="form-control" > 
                    </div>
					 <div class="col-md-2 col-xs-5">
                         <td>Description</td>
                    </div>
					 <div class="col-md-3 col-xs-5" style="padding: 0;">
					  <select class="form-control" name="description">
                      <option value="">Select</option>
                        <option value="Bank Current Account">Bank Current Account</option>
                   <option value="Bank SF Current Account">Bank SF Current Account</option>
                   <option value="Cash On Hand">Cash On Hand</option>
                   <option value="Fixed Deposit">Fixed Deposit</option>
                   <option value="Petty Cash">Petty Cash</option>
                      </select> 
                    </div>
				   </div>
          	&nbsp;
            	
                
                 <div class="row">
                    <div class="col-md-2 col-xs-6">
                       <td>Category</td>
                    </div>
                    
                    <div class="col-md-3 col-xs-5">
                        
                <select class="form-control" name="category" onChange="cat(this.value);">
                  <option value="">Select</option>
                           <?php   foreach ($cat as $cats){ ?> 
                            <option  value="<?php echo $cats->excat_id; ?>"><?php echo  $cats->excat_name; ?></option>
                          <?php }?>
                                               
                        </select>
                    </div>
					 <div class="col-md-2 col-xs-5">
                         <td>Subcategory</td>
                    </div>
					 <div class="col-md-3 col-xs-5" style="padding: 0;">
                     <div id="showsubd"></div>
                      <div id="hidsub">
					  <select class="form-control" >
                      <option value="">Select</option>
                      </select>
                     </div> 
                    </div>
				   </div>
                   
                   &nbsp;
			
				<div class="row">
                    <div class="col-md-5 col-xs-12" >
                        <div id="text" style="display:none">
                       <div class="col-md-2 col-xs-5" style="padding: 0;">
                         <td>Remarks</td>
                    </div>
                           
                         <div class="col-md-10"  style="padding: 0;">   
                          <textarea class="form-control" name="remark" rows="5"></textarea> 
                        </div>   
                       
                    </div>
                    </div>
                  
					 <div class="col-md-2 col-xs-5">
                         <td><span>Paid Amount</span></td><br><br>
                         <td><span>Local Amount</span></td><br><br>
                         <td><span>Balance</span></td>
                    </div>
					 <div class="col-md-3 col-xs-5" style="padding: 0;">
					    <input type="number"  id="num2" name="paidamount" class="form-control" onBlur="createUserName(this.value)">
					    
					  
					     
					    <div id="showdetail"></div>
					    <div id="hidedetail">
                         <input type="number" id="des" name="" class="form-control" style="margin-top:5px;" readonly></div>
                         <input type="number" id="subt" readonly  name="remainbalance" class="form-control" style="margin-top:5px;"> 
                    </div>
				   </div>
          	&nbsp;
          	<div class="row">
          	<div class="col-md-4"></div>
          	<div class="col-md-2">
          	    <input type="submit" name="submit" value="Save" class="btn btn-primary" style="width: 100%;" >
          	</div>
          	</div><br><br>
          	
          
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>	
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

$(function() {
    $("#num1, #num2").on("keydown keyup", sum);
	function sum() {
	$("#sum").val(Number($("#num1").val()) + Number($("#num2").val()));
	$("#subt").val(Number($("#num1").val()) - Number($("#num2").val()));
	
	//	$("#sum").html(sum.toFixed(2));
		
		
	}
});
</script>
          	
          	
          	
          	
          	
          	
          	
          	
          	
          	
				
				
				
						
			
    
    <hr />
    <?php if(!empty($view)){?>
    <table id="example2" align="center" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;width: 96%;">
                <thead>
                <th>Sr.no.</th>
                <th>Date</th>
                <th>Invoice no.</th>
                <th>Amount</th>
                <th>Outstanding</th>
                <th>Pay</th>
                
                </thead>
                <tbody>
                <?php $i=1; foreach($view as $row){?>
                  <tr>
                   <td><?php echo $i;?></td>
                   <td><?php echo $row->dates;?></td>
                   <td><?php echo $row->invoice_no;?></td>
                   <td><?php echo $row->amount;?></td>
                   <td><div id="dvPasshid"><?php echo $row->amount;?></div>
                   <div id="dvPassport" style="display: none">00</div> </td>
                   <td><label for="chkPassport">
    <input type="checkbox" id="chkPassport" name="pay[]" onclick="pay(this.value,<?php echo $row->exp_id;?>);" value="<?php echo $row->amount;?>" /> Pay</label></td>
                 </tr>
                 <?php $i++;?>
                 <?php }?>
                </tbody>
                
                </table>	
                </form> 
			  
	<?php }?>    
                                
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
       
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
				$("#dvPasshid").hide();
            } else {
                $("#dvPassport").hide();
				$("#dvPasshid").show();
            }
        });
    });
</script>

            
          
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
function createUserName(){
            
            var txtFnameValue = $('#fname').val();
			
			var txtLnameValue =  $('#mysub').val();
            var result = txtFnameValue;
            var reult1=result.toLowerCase();
            $('#des').val(reult1);
			
			
                    }  

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
</script>
   
	



 <script> 

    function cat(str,rid) {
   var txtFnameValue = str ;
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
      document.getElementById("showsubd").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/paymentcategory.php?$q="+str,true);
	
    xmlhttp.send();
    document.getElementById("hidsub").style.display = "none";
    }

</script>

 <script type="text/javascript">
<!--
function go(vender_id){
	 var pvaluee = $("#user_id").val() ;
	//alert(unit_id);
location='<?php echo base_url();?>index.php/Payment/add/'+vender_id;
document.bms_frm.unit.
options[document.bms_frm.unit.selectedIndex].value
}
//-->
</script>                  

<script> 

    function pay(str,dds){
 //alert(str+dds);
      var pvalue = $("#pvalue").val() ;
   
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
    xmlhttp.open("GET","<?php echo base_url();?>index.php/Payment/statusmanage/?$q="+str+"&$amount="+dds+"&$vender_id="+pvalue,true);  
//alert("<?php echo base_url();?>index.php/Payment/statusmanage/?$q="+str+"&$amount="+dds+"&$vender_id="+pvalue);
    xmlhttp.send();
    //document.getElementById("hidddd").style.display = "none";
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
    xmlhttp.open("GET","<?php echo base_url(); ?>payment/unit_select?$q="+str,true);
//	alert("<?php echo base_url(); ?>payment/unit_select?$q="+str);
    xmlhttp.send();
    document.getElementById("hidee").style.display = "none";
    }

</script>


 <script> 

    function catnew(str) {
   //  alert(str);
   
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showshort").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url(); ?>payment/short?$q="+str,true);
//	alert("<?php echo base_url(); ?>payment/short?$q="+str);
    xmlhttp.send();
    document.getElementById("hidshort").style.display = "none";
    }

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
    xmlhttp.open("GET","<?php echo base_url(); ?>payment/vender?$q="+str,true);
//	alert("<?php echo base_url(); ?>payment/vender?$q="+str);
    xmlhttp.send();
    document.getElementById("hideven").style.display = "none";
    }

</script>

 <script> 

    function porder(str) {
    // alert(str);
   
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
    xmlhttp.open("GET","<?php echo base_url(); ?>payment/orders?$q="+str,true);
//	alert("<?php echo base_url(); ?>payment/orders?$q="+str);
    xmlhttp.send();
    document.getElementById("hideorder").style.display = "none";
    }

</script>



 <script> 

    function pdetail(str) {
    // alert(str);
   
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
    xmlhttp.open("GET","<?php echo base_url(); ?>payment/ordersdetail?$q="+str,true);
//	alert("<?php echo base_url(); ?>payment/ordersdetail?$q="+str);
    xmlhttp.send();
    document.getElementById("hidedetail").style.display = "none";
    }

</script>


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