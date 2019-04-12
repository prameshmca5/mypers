<?php
 error_reporting(0);
 $this->load->view('header');?>
<?php $this->load->view('sidebar');  
$receiptno = $this->uri->segment('3');
//echo "<pre>";print_r($properties); ?>
  
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
    
    
    
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.1.135/jspdf.min.js"></script>
<script type="text/javascript" src="http://cdn.uriit.ru/jsPDF/libs/adler32cs.js/adler32cs.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2014-11-29/FileSaver.min.js
"></script>
<script type="text/javascript" src="libs/Blob.js/BlobBuilder.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.addimage.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.standard_fonts_metrics.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.split_text_to_size.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.from_html.js"></script>
<script type="text/javascript" src="js/basic.js"></script>

<script>

$(function() {
  var doc = new jsPDF();
  var specialElementHandlers = {
    '#editor': function(element, renderer) {
      return true;
    }
  };
  $('#cmd').click(function() {
    doc.fromHTML($('#target').html(), 15, 15, {
      'width': 170,
      'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
  });
});
</script>



    
  

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
              
    	  <?php 

    foreach($view as $dat){
		$pv_id = $dat->pv_id;
       $unitid =  $dat->unit_id;
       $totalamount =  $dat->totalamount;
       $vender_id =  $dat->vender_id;
       $property_id =  $dat->property_id;
         $poid =  $dat->poid;
         $pv_no =  $dat->pv_no;
         $cancelled =  $dat->cancelled;
         $paydate =  $dat->paydate;
         $paymentby =  $dat->paymentby;
         $bankcharge =  $dat->bankcharge;
         $bankcharge =  $dat->bankcharge;
         $description =  $dat->description;
         $paidamount =  $dat->paidamount;
         $remark =  $dat->remark;
         $unappliedamount =  $dat->unappliedamount;
         $selfinvoice_id =  $dat->selfinvoice_id;
         $payyear =  $dat->payyear;
         $paymode =  $dat->paymode;
         $bpaydate =  $dat->bpaydate;
          $category =  $dat->category;
           $subcategory =  $dat->subcategory;
            $vender_name =  $dat->vender_name;
      $newan = number_format($unappliedamount, 2);
        
    }
       
      
 $qunewpu = $this->db->query("SELECT * FROM `bms_property_units` WHERE unit_id = '$unitid'");
  foreach ($qunewpu->result() as $tttepu)
  {
        $unitno = $proidpu  = $tttepu->unit_no;
        $ownner = $tttepu->owner_name; 
  }

 $qunep = $this->db->query("SELECT * FROM `bms_property` WHERE property_id = '$property_id'");
  foreach ($qunep->result() as $tttp)
  {
         $property_name = $tttp->property_name;
  }
  
  
   $qunepu = $this->db->query("SELECT * FROM `bms_service_provider` WHERE property_id = '$property_id'");
  foreach ($qunepu->result() as $tttpu)
  {
         $provider_name = $tttpu->provider_name;
  }
  
  
 
     
    ?>
			
		
		
				<hr style="margin-top: 0px;">
			
            
			
			
		<div class="col-md-12 col-xs-12 no-padding" id="printable">
        <div class="col-md-12 col-sm-12 col-xs-12 right-box" style="border: 1px solid #999;border-radius: 2px;">
                                
		
		<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title></title>

<style>
.all-page{
width:100%;
margin:0px auto;
}
table {
    width: 100%;
    background-color: transparent;
}
.table th {
    padding: 20px;
	color:#000;
	border-bottom:2px solid #41A695;
}
.table tr td {
    border: 1px solid #DDD;
	padding:10px;
}
.text-center{
	text-align:center;}

</style>

</head>

<body id="target">
  <div id="content">
<div class='all-page' style='font-family:Arial, Helvetica, sans-serif;'>
<table class='table table-bordered table-invoice' border='0' cellpadding='0' cellspacing='0' style='font-family:Arial, Helvetica, sans-serif; margin:30px 0px;'>
<tr>
<td width='50%' style='display:inline-block;width:40%; float:right;'><div style='float:right'>
<h5 style='margin:0px; padding:5px 0px;'>Purchase order - <?php echo $poid;?> </h5>
<h5 style='margin:0px; padding:5px 0px;'>Pay Date - <?php echo $bpaydate;?> </h5>



</div></td>
<td width='50%' style='display:inline-block;width:50%; float:left;'><div style='width:100%; float:left;'>
    
    <p style='padding-top:14px;    font-size: 18px;'>Po Id - <?php echo $pv_no ;?></p>
    
     <p style='padding-top:14px;    font-size: 18px;'>Property  - <?php echo $property_name ;?></p>
     
      <p style='padding-top:14px;    font-size: 18px;'>Unit - <?php echo $unitno ;?></p>
      
    
    </div></td>
</tr>
</table>

<table class='table table-bordered table-invoice' border='0' cellpadding='0' cellspacing='0' style='font-family:Arial, Helvetica, sans-serif; margin:0px 0px 30px;'>
<tr>
<td width='50%'><span style='float:left;'>
<h4 style='margin:0px; font-weight:normal; padding:5px 0px;'>Payment Details</h4>                    
                     <p style='margin:0px;padding:5px 0px; color:#7a7a7a; width:170px; font-size:14px;'>
                    
</span></td>

</tr>
</table>
<table class='table table-bordered table-invoice' border='0' cellpadding='0' cellspacing='0' style='font-family:Arial, Helvetica, sans-serif;border:0px solid #ddd; border-collapse:collapse; padding:10px;' width='100%'>
					

					
                        <tr>
                        <th style='padding: 10px;color: #000;;width: 250px;'>Vender</th>
                        <th style='padding: 10px;color: #000;;width: 350px;'><?php echo $provider_name;?></th>
                   
                        <th style='padding: 10px;color: #000;;width: 250px;'>Payment Mode</th>
                        <th style='padding: 10px;color: #000;width: 350px;' class='text-center'><?php echo $paymode;?></th>
                       
                        </tr>
                       <!--new--> 
                         <tr>
                        <th style='padding: 10px;color: #000;width: 250px;'>Pay To</th>
                        <th style='padding: 10px;color: #000;width: 350px;'><?php echo $vender_name;?></th>
                   
                        <th style='padding: 10px;color: #000;width: 250px;'>Date</th>
                        <th style='padding: 10px;color: #000;width: 350px;' class='text-center'><?php echo $paydate;?></th>
                       
                        </tr>
                        
                        
                     <!--new-->     
                        
                         <tr>
                        <th style='padding: 10px;color: #000;width: 250px;'>Bank Account</th>
                        <th style='padding: 10px;color: #000;width: 350px;'><?php echo $paymentby;?></th>
                   
                        <th style='padding: 10px;color: #000;width: 250px;'>Bank Charge</th>
                        <th style='padding: 10px;color: #000;width: 350px;' class='text-center'><?php echo $bankcharge;?></th>
                       
                        </tr>
                        
                        
                        
                          <!--new-->     
                        
                         <tr>
                        <th style='padding: 10px;color: #000;width: 250px;'>Cheque No.</th>
                        <th style='padding: 10px;color: #000;width: 350px;'><?php echo $chequeno;?></th>
                   
                        <th style='padding: 10px;color: #000;width: 250px;'>Description</th>
                        <th style='padding: 10px;color: #000;width: 350px;' class='text-center'><?php echo $description;?></th>
                       
                        </tr>
                        
                        
                        
                          <!--new-->     
                        
                         <tr>
                        <th style='padding: 10px;color: #000;width: 250px;'>Category</th>
                        <th style='padding: 10px;color: #000;width: 350px;'><?php echo $category;?></th>
                   
                        <th style='padding: 10px;color: #000;width: 250px;'>Subcategory</th>
                        <th style='padding: 10px;color: #000;width: 350px;' class='text-center'><?php echo $subcategory;?></th>
                       
                        </tr>
                        
                        
                          <!--new-->     
                        
                         <tr>
                        <th style='padding: 10px;color: #000;width: 250px;'>Paid Amount</th>
                        <th style='padding: 10px;color: #000;width: 350px;'><?php echo $paidamount;?></th>
                   
                        <th style='padding: 10px;color: #000;width: 250px;'>Balance</th>
                        <th style='padding: 10px;color: #000;width: 350px;' class='text-center'><?php echo $newan;?></th>
                       
                        </tr>
                       
                        
                        
                                           </tbody>
                </table>
               
            </div>
          </div>
  
      </body>
                
                
               
                
                
               
                
			
			
			
			
				<div class="row">
                 <div class="col-md-2 col-xs-6"></div>
                 	 <div class="col-md-10 col-xs-12">
                    <div class="col-md-6" style="margin-left: -10%;">
                        
                         <a role="button" class="btn btn-primary " style="float: right;" href="<?php echo base_url('index.php/Payment/download/'.$receiptno);?>">Download</a>
					  
                    </div>
					 <div class="col-md-6">
                  
                     <!-- <a role="button" class="btn btn-primary" style=" margin-left: -22px;" data-toggle="modal" data-target="#myModals" >Email</a>-->
                    </div>
                    
                  </div>		
					
                 
                    
                </div>
				
				
				
                    &nbsp;                                                       
                    
                </div>
				
                                    </div>
                                   
                                </div>
				 <?php 	$query = $this->db->query("SELECT email_addr FROM bms_property_units where unit_no='$unitno'");
				        //print_r($query);exit;
							foreach ($query->result() as $row)
							{
							  $qua = $row->email_addr;
							//print_r($qua);
						?>						
											
				<div class="modal fade" id="myModals<?php echo $rr = $rowe->receiptno; ?>">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 75%; left: 12%;">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #337ab7;">
          <h4 class="modal-title" style="color: #fff;">Send Email</h4>
          <button type="button" style="color:#fff;margin-top: -23px;" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
		
		
        <div class="modal-body">
		
        
		 
          <input type="hidden" value="" name="book_id">
          <div class="form-body">
                  
            
               <hr>
            
            
              <form action="<?php echo base_url('index.php/receipt/sendpdf/'.$selfinvoice_id);?>" name="" id="" method="post">
               <div class="row">
            <div class="form-group">
                <div class="col-md-12">
             
              <div class="col-md-8" style="color:red;">
              <input type="text" value="<?php echo $row->email_addr; ?>" name="send" class="form-control">
              </div>
              </div>
			   
            </div>
			
            </div>
            
           
            
           
            
            
            
         			
		
           
  </div>
		
		
		
        
        <!-- Modal footer -->
        <div class="modal-footer" style="text-align: center;">
		 <input type="submit" id="submit" name="submit" class="btn btn-primary" value="send" >
         
        </div>
         </form>
      </div>
    </div>
  </div>
  
</div>				
		 <?php }?>					
								
								
								
								
								
								
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 no-padding" style="padding-top: 10px !important;">
                                    <div class="col-md-12 col-sm-12 col-xs-12 no-padding">                                    
                                        
                                    </div>
                                    
                                </div>
								
                                
                               
                               
                               
                                                            
                                
                            </div>
                              
                        </div>
			
		
			&nbsp;
			
      
                
                
              </div>
              <!-- /.box-body -->
              
             
          
          
            
         </div>
          <!-- /.box -->     

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- bootstrap datepicker -->
  

<script src="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> 
<!-- overlay loader for ajax call -->
<script src="<?php echo base_url();?>assets/js/loadingoverlay.js"></script>  




<!-- overlay loader for ajax call -->

<script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>dist/js/adminlte.min.js"></script>
<script>
function myFunction() {
   var element = document.getElementById("myDIV");
   element.classList.toggle("mystyle");
}






</script>
<script>

$(document).ready(function () {
    
    $('#property_id').focus();
    $('.msg_notification').fadeOut(5000);
    
    $('.list_filter').click(function () {
        var search_txt = $('#search_txt').val().replace(/^\s+|\s+$/g,"");
           window.location.href="<?php echo base_url('index.php/receipt/receipt_id');?>?search_txt="+search_txt;
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
			"name": "required",
            "dates": "required",
            "condo": "required",
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
			"name": "Please select Unit No",
            "dates": "Please select date",
            "condo": "Please enter condo name",
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
<style>
.col-md-3 {
    width: 34%;
}
</style>


<script>

$(document).ready(function () {
    window.print();
});
</script>