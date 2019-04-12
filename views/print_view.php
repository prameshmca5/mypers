<?php
 error_reporting(0);
     /*      $emailuser = $_SESSION['bms']['email'];
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
				 // print_r($view);exit;
    foreach($view as $dat){
		$unit_id = $dat->payment_id;
		//print_r($unit_id);exit;
       $unitno =  $dat->unit_no;
      $totalamount =  $dat->totalamount;
       $paymode =  $dat->paymode;
       $paydate =  $dat->paydate;
         $cradte =  $dat->crdate;
        
    }
       
      
 $qunewpu = $this->db->query("SELECT * FROM `bms_property_units` WHERE unit_id = '$unitno'");
  foreach ($qunewpu->result() as $tttepu)
  {
        $unitnos = $proidpu  = $tttepu->unit_no;
        $ownner = $tttepu->owner_name; 
  }
  
  
  
  
  
    
     foreach($views as $row){
         
          $checkbank = $row->bankcheck;
         $checkno = $row->checkno;
         $checkdate = $row->checkdate;
         $bankcard = $row->bankcard;
         $transactionno = $row->transactionno;
         $catytype = $row->catytype;
         $onlinebankname = $row->onlinebankname;
         $onlinetype = $row->onlinetype;
         $carttransactionno = $row->carttransactionno;
         $onlinedate = $row->onlinedate;
          $indate = $row->indate;
            $property_id = $row->property_id;
              $block_id = $row->block_id;
               $cartholder_name = $row->cartholder_name;
     }
     
     
   
      $qunep = $this->db->query("SELECT * FROM `bms_property` WHERE property_id = '$property_id'");
  foreach ($qunep->result() as $tttp)
  {
         $property_name = $tttp->property_name;
  }
  
  
  $qunu = $this->db->query("SELECT * FROM `bms_property_block` WHERE block_id = '$block_id'");
  foreach ($qunu->result() as $qunus)
  {  $block_name =  $qunus->block_name; }
     
    ?>
			
		
		
				<hr style="margin-top: 0px;">
			
                <?php
                if(isset($_POST['ser']))
                {
                    $search = $_POST['search'];
                    if($search){?><script>window.location.assign("<?php echo base_url();?>receipt/receipt_id/<?php echo $search;?>"); </script>
                    <?php }
                }
                ?>
				&nbsp;
			
			
		<div class="col-md-12 col-xs-12 no-padding" id="printable">
                            <div class="col-md-12 col-sm-12 col-xs-12 right-box" style="border: 1px solid #999;border-radius: 2px;">
                                
								
					 <?php          
                       // foreach ($common_docs as $key=>$val) { ?>			
							
					<div class="row printable" id="printable" style="background-color: #d2cece; height: 50px;">
                    <div class="row">
                    <div class="col-md-12">
                        <h3>&nbsp;&nbsp;&nbsp;Receipt No.<?php echo $receiptno;?></h3>
						
						 
                    </div>
                    </div>
                                      
                    
                </div>
				&nbsp;
				
				
				<div class="row">
				    
				      <div class="col-md-4 col-xs-4">
                        <label>Property Name</label>
                       <input type="text" name="" class="form-control" value="<?php echo $property_name ;?>">
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <label>Block Name</label>
						
                            
                       <input type="text" name="" class="form-control" value="<?php echo $block_name;?>">
                    </div>
                    
                    
               
                    <div class="col-md-4 col-xs-4">
                        <label>Unit No</label>
                       <input type="text" name="" class="form-control" value="<?php echo $unitnos ;?>">
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <label>Receipt Date</label>
					     
                       <input type="text" name="" class="form-control" value="<?php echo $paydate;?>">
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <label>From</label>
						
                            
                       <input type="text" name="" class="form-control" value="<?php echo $ownner ;?>">
                    </div>
                                                                                               
                    
                </div>
                
                <!--payment mode-->
                     <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <label>Payment Mode</label>
						
                            
                       <input type="text" name="paymode" class="form-control" value="<?php echo $paymode;?>">
                    </div>
                                                                                               
                    
                
               
                 </div>
                
                           <?php if($paymode=='cheque'){?>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <label>Bank</label>
						
                            
                       <input type="text" name="" class="form-control" value="<?php echo $checkbank;?>">
                    </div>
                                                                                               
                    
               
                    <div class="col-md-4 col-xs-4">
                        <label>Cheque No</label>
						
                            
                       <input type="text" name="" class="form-control" value="<?php echo $checkno;?>">
                    </div>
					<div class="col-md-4 col-xs-4">
                        <label>Date</label>
						
                            
                       <input type="text" name="" class="form-control" value="<?php echo $checkdate;?>">
                    </div>
                                                                                               
                    
                </div>
                 <!-- <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <label>Account</label>
						
                            
                    <input type="text" name="" class="form-control" value="">
                    </div>
                                                                                               
                    
                </div>-->	
				<?php }?>
                
                
                           <?php if($paymode=='card'){?>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <label>Bank</label>
						
                            
                       <input type="text" name="" class="form-control" value="<?php echo $bankcard ;?>">
                    </div>
                    
                    <div class="col-md-4 col-xs-4">
                        <label>Card Holder Name</label>
						
                            
                       <input type="text" name="" class="form-control" value="<?php echo $cartholder_name ;?>">
                    </div>
                                                                                               
                    
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <label>Txt No</label>
						
                            
                       <input type="text" name="" class="form-control" value="<?php echo $carttransactionno ;?>">
                    </div>
					<div class="col-md-4 col-xs-4">
                        <label>Date</label>
						
                            
                       <input type="text" name="" class="form-control" value="<?php echo $indate ;?>">
                    </div>
                                                                                               
                    
                </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <label>Cart</label>
						
                            
                    <input type="text" name="" class="form-control" value="<?php echo $catytype ; ?>">
                    </div>
                                                                                               
                    
                </div>
                	<?php }?>
                
                
                           <?php if($paymode==online){?>
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <label>Bank</label>
						
                            
                       <input type="text" name="" class="form-control" value="<?php echo $onlinebankname;?>">
                    </div>
                                                                                               
                    
                </div>
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <label>Txt No</label>
						
                            
                       <input type="text" name="" class="form-control" value="<?php echo $transactionno;?>">
                    </div>
					<div class="col-md-3 col-xs-6">
                        <label>Date</label>
						
                            
                       <input type="text" name="" class="form-control" value="<?php echo $indate;?>">
                    </div>
                                                                                               
                    
                </div>
                  <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <label>Type</label>
						
                            
                    <input type="text" name="" class="form-control" value="<?php echo $onlinetype;?>">
                    </div>
                                                                                               
                    
                </div>	
				
				<?php }?>
                
                
                 <?php if($paymode==contrareno){?>
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <label>Contra Reno Deposit</label>
						
                            
                       <input type="text" name="" class="form-control" value="Contra Reno Deposit">
                    </div>
                                                                                               
                    
                </div>
               
               	<?php }?>
					  
                
				&nbsp;
				<h2>Line Items</h2>
				 <label>(All Currencies are in RM)</label>
				<table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th >No</th>   
                  <th>Description</th>               
                  <th>Category</th>
                  <th>Period</th>
				  <th>Amount</th>
				 
                </tr>
                </thead>
                <tbody>
                <?php    $i = 1;       
                        
    foreach($views as $row){?>		
                        <tr>
                            <td ><?php echo $i ;?></td>
                            <td><?php echo $row->categorys;?> <?php echo $row->subcategorys;?></td>
                            <td><?php echo $row->categorys;?></td>
							<td><?php echo $row->payperiod;?></td>
							<td><?php echo $row->payamount;?>  <?php $note =  $row->notes;?></td>
                            
                            
                        </tr><?php $i++ ;?><?php }?>
                          
                          
                           <thead>
                <tr>
                  <th ></th>   
                  <th></th>               
                  <th></th>
                  <th>Total</th>
				  <th><?php echo $totalamount ;?></th>
				 
                </tr>
                </thead>                
                              
                </tbody>   
						                              				
              </table>  
			 
			  <!--<div class="row">
			      
			      <div class="col-md-8"></div>
                    <div class="col-md-2" style="text-align: center;">
                        <label>Total</label>
						
                            
                      
                    </div>
					<div class="col-md-2" >
                        <label style="margin-left: 15px;"><b><?php echo $totalamount ;?></b></label>
						
                            
                      
                    </div>
                                                                                               
                    
                </div>-->	
				 <?php// } ?> 
				&nbsp; 
				
				<div class="row" style="background: #f3f0f00d;  border: 1px solid #0c0c0c12;  margin-bottom: 20px; padding: 19px 20px;">
                 <div class="col-md-6 col-xs-6">
				 <h4>Notes:</h4>
				 <p><?php echo $note ; ?></p>
				 
				 </div>
				  <div class="col-md-6 col-xs-6">
				   <h4>Issued by :</h4>
				   <p><?php echo isset($_SESSION['bms']['full_name']) ? $_SESSION['bms']['full_name'] : $_SESSION['bms']['first_name'];?> on 
				   <?php  $cradte;
			
				 echo $valid_date = date( 'd/m/Y g:i A', strtotime($cradte));
				   ?> </p> 
				      </div>
				      </div>
				
				<div class="row">
                 <div class="col-md-2 col-xs-6"></div>
                 	 <div class="col-md-10 col-xs-12">
                    <div class="col-md-6" style="margin-left: -10%;">
                        
                         <a role="button" class="btn btn-primary " style="float: right;" href="<?php echo base_url('index.php/receipt/download/'.$receiptno);?>">Download</a>
					  
                    </div>
					 <div class="col-md-6">
                  
                      <a role="button" class="btn btn-primary" style=" margin-left: -22px;" data-toggle="modal" data-target="#myModals" >Email</a>
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
            
            
              <form action="<?php echo base_url('index.php/receipt/sendpdf/'.$receiptno);?>" name="" id="" method="post">
               <div class="row">
            <div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="padding: 8px 10px; text-align:right;">Send Email</label>
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