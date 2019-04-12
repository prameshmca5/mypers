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
            
            <?php
      $key = $records[0]->keytype;
     $key_size =   $records[0]->keysize;
     $iv_size = $records[0]->ivsize; 
     $iv = $records[0]->ivtype; 
     
  $ciphertext_base64 = $records[0]->bank_name; 
  $ciphertext_dec = base64_decode($ciphertext_base64);$iv_dec = substr($ciphertext_dec, 0, $iv_size);
  $ciphertext_dec = substr($ciphertext_dec, $iv_size); 
    $banknamenew = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
    
    
   $news =  preg_replace('/[^A-Za-z0-9]/', ' ', $banknamenew);
    
    
  
                            $accno = $records[0]->ifc_code;
                            $accno_dec = base64_decode($accno);$iv_dec = substr($accno_dec, 0, $iv_size);
  $accno_dec = substr($accno_dec, $iv_size);  
  $accnonew = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$accno_dec, MCRYPT_MODE_CBC, $iv_dec); 
   $accnonews =  preg_replace('/[^A-Za-z0-9]/', ' ', $accnonew);
  
							 $branchs = $records[0]->branch_address;
							   $branch_dec = base64_decode($branchs);$iv_dec = substr($branch_dec, 0, $iv_size);
  $branch_dec = substr($branch_dec, $iv_size);   $branchaddress = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$branch_dec, MCRYPT_MODE_CBC, $iv_dec);
 $badd =  preg_replace('/[^A-Za-z0-9]/', ' ', $branchaddress);
 
							 $nos = $records[0]->branch_number;
							 $no_dec = base64_decode($nos);$iv_dec = substr($no_dec, 0, $iv_size);
  $no_dec = substr($no_dec, $iv_size); 
  $no_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$no_dec, MCRYPT_MODE_CBC, $iv_dec);
  $bcontact =  preg_replace('/[^A-Za-z0-9]/', ' ', $no_dec);
  
  	 $accty = $records[0]->acctype;
							 $accty_dec = base64_decode($accty);$iv_dec = substr($accty_dec, 0, $iv_size);
   $accty_dec = substr($accty_dec, $iv_size);   
   $accty_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$accty_dec, MCRYPT_MODE_CBC, $iv_dec);
    $acctypen =  preg_replace('/[^A-Za-z0-9]/', ' ', $accty_dec);
  ?>
  
		
		
		
          
            </div>
			
			
			
			<div class="row">
                    <div class="col-md-3 col-xs-6">
                        <td class="box-title"><b>Edit</b></td>
                        

                    </div>
                                     
                    
                       <div class="col-md-3 col-xs-4" style="padding-left: 64%;">
                       <td><a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Bms_bank/bank_list_view');?>">Back To List</a></td>
                    </div>
                                        
                    
                </div>
					
		
			
				&nbsp;
		
		
		
		
		
		
		
		
		<div class="col-md-12 col-xs-12 no-padding">
                            <div class="col-md-12 col-sm-12 col-xs-12 right-box" style="border: 1px solid #999;border-radius: 2px;">
                                
								
								
								
					<div class="row" style="background-color: #d2cece; height: 50px;" >
                    
                    

                                      
                    
                </div>
				&nbsp;
		<form name="bms_frm" id="bms_frm" method="post" action="<?php echo base_url('index.php/Bms_bank/updatecbank');?>">
		    
		    
		     <div class="row">
                    <div class="col-md-2 col-xs-6">
                       <td>Property</td>
                    </div>
                    
           <?php $prid = $records[0]->property_id;
              $qunewp = $this->db->query("SELECT * FROM `bms_property` WHERE property_id = '$prid'");
  foreach ($qunewp->result() as $tttep)
  {
           $proidp  = $tttep->property_name;
  }
             ?>

                    <div class="col-md-3 col-xs-5">
                       <select class="form-control" name="property_id" class="inp txt-fld" style="width: 100%;margin-bottom: 6%;">
						<option value="<?php echo $records[0]->property_id;?>"><?php echo $proidp ;?></option>
                           <?php $qunewpp = $this->db->query("SELECT * FROM `bms_property` WHERE property_id!='$prid'");
  foreach ($qunewpp->result() as $tttepp)
  { ?>  <option value="<?php echo $tttepp->property_id;?>"><?php echo $tttepp->property_name;?></option>
      <?php   } ?>   
                        </select>
                    </div>
                    
                     <div class="col-md-2 col-xs-5">
                         <td>Bank Name</td>
                    </div>
					 <div class="col-md-3 col-xs-5" id="hidee" style="padding-left: 0;">
				
				  <input type="text" name="bankname" class="form-control" value="<?php echo $news ;?>" > 
				
				 
                    </div>
					  <div class="col-md-3 col-xs-5" id ="sho"  style="padding-left: 0;"></div>
				   </div>
		    
		    
		    
		    
		    
		    
		    
		    
		    <div class="row">
                    <div class="col-md-2 col-xs-6">
                       <td>Account Type</td>
                    </div>
                    
             

                    <div class="col-md-3 col-xs-5">
                             <input type="hidden"  name="mid" value="<?php echo $records[0]->id;?>" />
                             
                             
                <select class="form-control" id="" name="acctype" class="txt-fld1 wdt-inpt" style="width: 99%;">
						<option value="<?php echo $acctypen ; ?>"><?php echo $acctypen ;?></option>
						<option value="Maintenance Account">Maintenance Account</option>
						<option value="Sinking Fund Account">Sinking Fund Account</option>
						<option value="Fix Deposit Account">Fix Deposit Account</option>
						<option value="Other Account">Other Account</option>
                            
                        </select>
                        
                    </div>
                    
                     <div class="col-md-2 col-xs-5">
                         <td>Account No.</td>
                    </div>
					 <div class="col-md-3 col-xs-5" style="padding: 0;">
					   <input type="text" name="ifc" class="form-control" value="<?php echo $accnonews;?>"  >
                    </div>
					 
				   </div>
                   &nbsp;
	
	<div class="row">
                    <div class="col-md-2 col-xs-6">
                       <td>Branch Address</td>
                    </div>
                    
                    <div class="col-md-3 col-xs-5">
                        
                <input type="text" name="address" class="form-control" value="<?php echo $badd ?>"> 
                    </div>
					 <div class="col-md-2 col-xs-5">
                         <td>Branch Number</td>
                    </div>
					 <div class="col-md-3 col-xs-5" style="padding: 0;">
					   <input type="text" name="num" class="form-control" value="<?php echo $bcontact;?>"> 
                    </div>
				   </div>
          	&nbsp;
            
           
         
        
          	<div class="row">
          	<div class="col-md-4"></div>
          	<div class="col-md-2">
          	    <input type="submit" name="submit" value="Update" class="btn btn-primary" style="width: 100%;" >
          	</div>
          	</div><br><br>
				
				
				
						
			
    
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
	//alert("<?php echo base_url(); ?>payment/unit_select?$q="+str);
    xmlhttp.send();
    document.getElementById("hidee").style.display = "none";
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