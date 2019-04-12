<?php      error_reporting(0);
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
   <style>
  .fillter {
	      border: 1px solid #3c8dbc5c;
    padding: 10px 10px;
	}
.sel {
	width: 100%;
    border-radius: 4px;}
.inp {
	border-radius: 4px;}
	
	
	
.slct-bx
{
    padding: 6px;
    border-radius: 4px;	
	
}

.txt-fld
{
    padding: 6px;	
	

}


.fnt-txthdng
{
	
    font-size: 16px;	
	
}

.tp-rw
{
	
padding-top: 10px;
    padding-bottom: 10px;	
	
}
.recv{
	
    font-size: 25px;
    font-weight: 600;
}
.cntr
{
    text-align: center;
	
	
}
	

	
  </style>
  

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
			<?php          
                      //  foreach ($common_docs as $key=>$val) { ?>    
					
				
			<?php 
			//print_r($vie->receiptno);exit;
			
			foreach($vie as $rowss){
              //echo $rowss->receiptno;exit;

			?>
			
		
			<div class="row">
                    <div class="col-md-3 col-xs-6">
                        <h3><b>Update Receipt: <?php echo $rowss->receiptno;?></b></h3>
                    </div>
					
					
                                 
                    <div style="padding-left: 70%;">
					 <div class="col-md-1 col-xs-6" style="padding-left: 26%;margin-top: 17px;">
                      <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/receipt/updatedata/'.$rowss->receiptno);?>">Back to Receipt</a>
                    </div>
					
                       <div class="col-md-1 col-xs-6" style="padding-left: 33%;margin-top: 17px;">
                      <a role="button" class="btn btn-primary">Back to List</a>
                    </div>
					
                    
                   		              
                    </div>
						<?php//  }?>
                </div>
				<hr style="margin-top: 0px;">
				
				<div class="row">
                   
					<div style="padding-left: 2%;color:red;">(*)Indicates required fields.</div>
					
                                                                                             
                    
                </div>
				
				
				
      
        <!-- Modal Header -->
        
        
        <!-- Modal body -->
		
		
         <div class="modal-body">
		
        
		 
          <input type="hidden" value="" name="book_id">
          <div class="form-body" >
        
        
        <form action="<?php echo base_url('index.php/receipt/updatedata/'.$rowss->receiptno);?>" name="" id="" method="post">
            <div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="padding: 8px 10px; text-align:right;">Payment Mode*</label>
              <div class="col-md-8" >
               <input type="" class="inp  txt-fld" value="<?php  echo $rowss->paymode; ?>" name="mod" class="form-control">
              </div>
              </div>
            </div>
          
            
            
            
               
            <div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="padding: 8px 10px; text-align:right;">Bank</label>
              <div class="col-md-8" style="color:red;">
               <input type="" class="inp  txt-fld" value="<?php // echo $rowss->date; ?>" name="send" class="form-control">
              </div>
              </div>
            </div>
           
            
            
               
            <div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="padding: 8px 10px; text-align:right;">Cheque No</label>
              <div class="col-md-8" style="color:red;">
               <input type="" class="inp  txt-fld" value="<?php // echo $rowss->date; ?>" name="send" class="form-control">
              </div>
              </div>
            </div>
            
			
            <div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="padding: 8px 10px; text-align:right;">Date</label>
              <div class="col-md-8" >
              <input type="" class="inp  txt-fld" value="<?php  echo $rowss->date; ?>" name="dat" class="form-control">
              </div>
              </div>
            </div>
			<div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="padding: 8px 10px; text-align:right;">Deposit into A/c</label>
              <div class="col-md-8" style="color:red;">
              <input type="" class="inp  txt-fld" value="<?php echo $ownner;?>" name="send" class="form-control">
              </div>
              </div>
            </div>
            
			
			
            <div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="padding: 8px 10px; text-align:right;">Notes</label>
              <div class="col-md-8">
             <textarea class="inp  txt-fld" rows="4" cols="50"></textarea>
              </div>
              </div>
            </div>
           
			<div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="padding: 8px 10px; text-align:right;">Payee Address</label>
              <div class="col-md-8">
             <textarea class="inp  txt-fld" rows="4" cols="50"></textarea>
              </div>
              </div>
            </div>
               
            
            
            
           
            
            
            
         			
		
           
  </div>
		
		
		
        
        <!-- Modal footer -->
        <div class="modal-footer" style="text-align: center;">
		 <input type="submit" class="btn btn-primary " name="submit" id="" value="Update">
         
        </div>
        
      </div>
   
		</form>		
               
               
			
			
		
								
											
								
								
								
								
								
								
								
								
                                
                                
								
                                
                               
                               
                               
                                                            
                           
              <!-- /.box-body -->
					  <?php }?>
             
         
       
  <!-- /.content-wrapper -->
  <!-- bootstrap datepicker -->
  
<?php $this->load->view('footer');?>
<script src="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> 
<!-- overlay loader for ajax call -->
<script src="<?php echo base_url();?>assets/js/loadingoverlay.js"></script>  

<script>
function myFunction() {
   var element = document.getElementById("myDIV");
   element.classList.toggle("mystyle");
}





function printDiv(url) { 

//var newTabUrl="http://localhost/new/ajax/jitu.php";
//alert(url);   
    /*var divToPrint = document.getElementById('printable');
    var popupWin = window.open('', '_blank', 'width=300,height=300');
    popupWin.document.open();
    popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
    popupWin.document.close();*/
 // let fruits = ["Apple", "Orange", "Plum"];  
window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=600,height=450,directories=no,location=no');

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
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>