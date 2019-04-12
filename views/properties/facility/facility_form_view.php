<?php $this->load->view('header');?>
<?php $this->load->view('sidebar'); //echo "<pre>";print_r($properties); ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
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
            <?php if(isset($_SESSION['flash_msg']) && trim( $_SESSION['flash_msg'] ) != '') {
                    //if($_GET['login_err'] == 'invalid')
                    echo '<div class="alert alert-success msg_notification"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>';
                    echo '</strong>'.$_SESSION['flash_msg'].'</div>';
                    unset($_SESSION['flash_msg']);
                }
                
            ?>
              <div class="box-body">
                  <div class="row">



                    
                    <form role="form" id="bms_frm" action="<?php echo base_url('index.php/bms_property/set_facility');?>" method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" id="facility_id" name="facility_id" value="<?php echo $facility_id;?>"/>
                    
                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-6 col-sm-6 col-xs-12 no-padding">               
                        <div class="form-group">
                          <label >Property Name *</label>
                            <select class="form-control" id="property_id" name="facility[property_id]">
                                <option value="">Select Property</option>
                                <?php 
                                    foreach ($properties as $key=>$val) { 
                                        $selected = !empty($facility['property_id']) && $facility['property_id'] == $val['property_id'] ? 'selected="selected" ' : (!empty($_GET['property_id']) && $_GET['property_id'] == $val['property_id'] ? 'selected="selected" ' : '');  
                                        echo "<option value='".$val['property_id']."' ".$selected."' data-pname='".$val['property_name']."'>".$val['property_name']."</option>";
                                    } ?> 
                            </select>
                            
                        </div>
                        </div>
                       
                    </div>
                    
                    <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                        <div class="col-md-6 col-sm-6 col-xs-12"> 
                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding">                                
                                <div class="form-group">
                                    <label >Facility Name *</label>
                                  <input type="text" name="facility[facility_name]" class="form-control" value="<?php echo isset($facility['facility_name']) && $facility['facility_name'] != '' ? $facility['facility_name'] : '';?>" placeholder="Enter Facility Name" maxlength="200">
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0 0 15px 0;">      
                                <div class="form-group" style="margin: 10px 0 0 0;">
                                  <label >Deposit Required *</label> &ensp; &ensp;
                                  
                                    <label class="radio-inline"> 
                                      <input type="radio" name="facility[deposit_require]" value="1" <?php echo isset($facility['deposit_require']) && $facility['deposit_require'] == 1 ? 'checked="checked"' : '';?> >Yes &ensp; &ensp;
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="facility[deposit_require]" value="0" <?php echo isset($facility['deposit_require']) && $facility['deposit_require'] == 0 ? 'checked="checked"' : '';?> >No  &ensp; &ensp;
                                    </label>
                                  
                                </div>
                            </div>
                            
                            <div class="col-md-12 amt_div" style="padding:0;display: <?php echo isset($facility['deposit_require']) && $facility['deposit_require'] == 1 ? 'block' : 'none';?>;">
                        
                                <div class="col-md-6 col-xs-12 no-padding">                            
                                    <div class="form-group">
                                      <label>Amount</label>
                                      <input type="text" name="facility[amount]" class="form-control" value="<?php echo !empty($facility['amount']) ? $facility['amount'] : '';?>" placeholder="Enter Amount" maxlength="13">
                                    </div>                            
                                </div>
                                <div class="col-md-6 col-xs-12" style="padding-right: 0;">                            
                                    <div class="form-group">
                                      <label>Charge Code</label>
                                      <select class="form-control" name="facility[charge_code_id]" >                              
                                <option value="">Select</option>
                                <?php 
                                    foreach ($charge_codes as $key=>$val) {                                        
                                        $selected = !empty($facility['charge_code_id']) && $facility['charge_code_id'] == $val['charge_code_id'] ? 'selected="selected" ' : '';
                                        echo "<option value='".$val['charge_code_id']."' ".$selected.">".$val['charge_code']."</option>";
                                    } ?> 
                                </select>
                                    </div>                            
                                </div>
                        
                            </div> 
                            
                        </div>
                        <!-- right side column -->
                        <div class="col-md-6 col-sm-6 col-xs-12"> 
                        
                            
                        </div>
                    </div>
                                            
                    
                    
                    <div class="col-md-12" >
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <p class="help-block"> * Required Fields.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" style="text-align: right;"> 
                        <div class="col-md-6">
                          <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button> &ensp;&ensp;
                            <button type="Reset" class="btn btn-default reset_btn" >Reset</button> &ensp;&ensp;
                            <!--button type="button" class="btn btn-success" onclick="window.history.go(-1); return false;">Back</button>&ensp;&ensp;&ensp;-->
                          </div>
                        </div>
                    </div>
                    </form>
                    
                </div> <!-- /.row -->
                
            </div> <!-- /.box-body -->
            
         </div>
          <!-- /.box -->     

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  
<?php $this->load->view('footer');?>

<!-- overlay loader for ajax call -->
<script src="<?php echo base_url();?>assets/js/loadingoverlay.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>

<script>
$(document).ready(function (){
    
    $('input[name="facility[deposit_require]"]').change(function (){
        //amt_div
        $('.amt_div').css('display',($('input[name="facility[deposit_require]"]:checked').val() == 1 ? 'block' : 'none'));
    });
});


$( "#bms_frm" ).validate({
		rules: {
            "facility[property_id]": "required",     
			"facility[facility_name]": "required",            
            "facility[deposit_require]": "required"
            
		},
		messages: {
		    "facility[property_id]": "Please select Property Name",     
			"facility[facility_name]": "Please enter Facility Name",
            "facility[deposit_require]": "Please select Deposit Required"
		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );

			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else if ( element.prop( "type" ) === "radio" ) {
				error.insertAfter( element.parent( "label" ).parent('div') );
			} else if ( element.hasClass("datepicker") ) {
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
    
</script>