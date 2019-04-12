<?php $this->load->view('header');?>
<?php $this->load->view('sidebar');?>
  
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="content_area">
    <!-- Content Header (Page header) -->
    <section class="content-header" >
      <h1>
        <?php echo isset($page_header) && $page_header != '' ? $page_header : ''; ?>
        <!--small>Optional description</small-->
      </h1>
      <!--ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/bms_dashboard/index');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Submenu</li>
      </ol-->
    </section>

    <!-- Main content -->
    <section class="content container-fluid cust-container-fluid">
        <form role="form" id="bms_frm" action="<?php echo base_url('index.php/bms_unit_setup/add_unit_submit');?>" method="post" enctype="multipart/form-data">
      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        
        <div class="row">
        
            <div class="col-md-6 col-xs-12">
                <div class="box box-primary">
                
                    <div class="box-header with-border" style="padding-left:15px ;">
                      <h3 class="box-title"><b>Unit Details</b></h3>
                    </div>
                    
                    <div class="box-body">
                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                                    
                                    <div class="form-group">
                                      <label >Property Name *</label>
                                        <select class="form-control" id="property_id" name="unit[property_id]">
                                            <option value="">Select Property</option>
                                            <?php 
                                                foreach ($properties as $key=>$val) { 
                                                    $selected = isset($unit_info['property_id']) && $unit_info['property_id'] == $val['property_id'] ? 'selected="selected" ' : '';
                                                    $selected .= ' data-calc-base="'.(!empty($val['calcul_base']) ? $val['calcul_base'] : '').'"';
                                                    $selected .= ' data-sinking-fund="'.(isset($val['sinking_fund']) && $val['sinking_fund'] != '' ? $val['sinking_fund'] : '').'"';
                                                    $selected .= ' data-tot-sq-feet="'.(isset($val['tot_sq_feet']) && $val['tot_sq_feet'] != '' ? $val['tot_sq_feet']: '').'"';
                                                    $selected .= ' data-per-sq-feet="'.(isset($val['per_sq_feet']) && $val['per_sq_feet'] != '' ? $val['per_sq_feet']: '').'"';
                                                    $selected .= ' data-tot-share-unit="'.(isset($val['tot_share_unit']) && $val['tot_share_unit'] != '' ? $val['tot_share_unit'] : '').'"';
                                                    $selected .= ' data-per-share-unit="'.(isset($val['per_share_unit']) && $val['per_share_unit'] != '' ? $val['per_share_unit'] : '').'"';
                                                    $selected .= ' data-insurance-prem="'.(isset($val['insurance_prem']) && $val['insurance_prem'] != '' ? $val['insurance_prem'] : '').'"';
                                                    $selected .= ' data-quit-rent="'.(isset($val['quit_rent']) && $val['quit_rent'] != '' ? $val['quit_rent'] : '').'"';
                                                    
                                                    echo "<option value='".$val['property_id']."' ".$selected.">".$val['property_name']."</option>";
                                                } ?> 
                                        </select>
                                        <input type="hidden" id="unit_id" name="unit_id" value="<?php echo $unit_id;?>"/>
                                    </div>
                                   
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                                    <div class="col-md-6 col-sm-6 col-xs-6">                                    
                                        <div class="form-group">
                                            <label >Unit No *</label>
                                          <input type="text" name="unit[unit_no]" class="form-control" value="<?php echo isset($unit_info['unit_no']) && $unit_info['unit_no'] != '' ? $unit_info['unit_no'] : '';?>" placeholder="Ex: A-01-01" maxlength="10">                                              <!-- /.input group -->
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <label >Unit Status *</label>                                          
                                            <select name="unit[unit_status]" class="form-control">
                                            <option value="">Select</option>   
                                            <?php 
                                                $unit_status = $this->config->item('unit_status');
                                                foreach ($unit_status as $key=>$val) { 
                                                    $selected = isset($unit_info['unit_status']) && trim($unit_info['unit_status']) == $val ? 'selected="selected" ' : '';  
                                                    echo "<option value='".$val."' ".$selected.">".$val."</option>";
                                                } ?> 
                                                                           
                                          </select>  
                                
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <label >Block/Street *</label>
                                          <select class="form-control" name="unit[block_id]"  id="block_id">
                                    <option value="">Select</option>                                
                                  </select>
                                
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <label >Floor</label>
                                          <input type="text" name="unit[floor_no]" class="form-control" value="<?php echo isset($unit_info['floor_no']) && $unit_info['floor_no'] != '' ? $unit_info['floor_no'] : '';?>" placeholder="Enter Floor" maxlength="20"> 
                                
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <label >Square Feet</label>
                                            <input type="text" name="unit[square_feet]" id="square_feet" class="form-control" value="<?php echo isset($unit_info['square_feet']) && $unit_info['square_feet'] != '' ? $unit_info['square_feet'] : '';?>" placeholder="Enter Square Feet" maxlength="10">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <label >Share Unit</label>
                                          <input type="text" name="unit[share_unit]" id="share_unit" class="form-control" value="<?php echo isset($unit_info['share_unit']) && $unit_info['share_unit'] != '' ? $unit_info['share_unit'] : '';?>" placeholder="Enter Share Unit" maxlength="20">
                                
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <label >Service Charge</label>
                                            <input type="text" name="unit[service_charge]" class="form-control" value="<?php echo isset($unit_info['service_charge']) && $unit_info['service_charge'] != '' ? $unit_info['service_charge'] : '';?>" placeholder="Enter Service Charge" maxlength="13">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <label >Sinking Fund</label>
                                          <input type="text" name="unit[sinking_fund]" class="form-control" value="<?php echo isset($unit_info['sinking_fund']) && $unit_info['sinking_fund'] != '' ? $unit_info['sinking_fund'] : '';?>" placeholder="Enter Sinking Fund" maxlength="13">
                                
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <label >Insurance Premium</label>
                                            <input type="text" name="unit[insurance_prem]" class="form-control" value="<?php echo isset($unit_info['insurance_prem']) && $unit_info['insurance_prem'] != '' ? $unit_info['insurance_prem'] : '';?>" placeholder="Enter Insurance Premium" maxlength="13">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <label >Quit Rent</label>
                                          <input type="text" name="unit[quit_rent]" class="form-control" value="<?php echo isset($unit_info['quit_rent']) && $unit_info['quit_rent'] != '' ? $unit_info['quit_rent'] : '';?>" placeholder="Enter Quit Rent" maxlength="13">
                                
                                        </div>
                                    </div>
                                </div>
                    
                    </div><!-- /.box-body -->   
                 
                 </div><!-- /.box-primary -->  
                 
                 <div class="box box-warning">
                 
                     <div class="box-header">
                        <h3 class="box-title"><b>Mailing Address</b></h3>
                     </div>
                     
                     <div class="box-body">
                        <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                                <div class="col-md-6 col-sm-6 col-xs-6 ">                                    
                                    <div class="form-group">
                                        <label >Address 1 *</label>
                                        <input type="text" name="unit[address_1]" class="form-control" value="<?php echo isset($unit_info['address_1']) && $unit_info['address_1'] != '' ? $unit_info['address_1'] : '';?>" placeholder="Enter Address 1" maxlength="100">  
                            
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 ">                                    
                                    <div class="form-group">
                                        <label >Address 2</label>
                                        <input type="text" name="unit[address_2]" class="form-control" value="<?php echo isset($unit_info['address_2']) && $unit_info['address_2'] != '' ? $unit_info['address_2'] : '';?>" placeholder="Enter Address 2" maxlength="100">  
                            
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                                <div class="col-md-3 col-sm-3 col-xs-3 ">                                    
                                    <div class="form-group">
                                        <label >City *</label>
                                        <input type="text" name="unit[city]" class="form-control" value="<?php echo isset($unit_info['city']) && $unit_info['city'] != '' ? $unit_info['city'] : '';?>" placeholder="Enter City" maxlength="100">  
                            
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 ">                                    
                                    <div class="form-group">
                                        <label >Post Code *</label>
                                        <input type="text" name="unit[postcode]" class="form-control" value="<?php echo isset($unit_info['postcode']) && $unit_info['postcode'] != '' ? $unit_info['postcode'] : '';?>" placeholder="Enter Post Code" maxlength="20">  
                                    </div>
                                </div>
                                
                                <div class="col-md-3 col-sm-3 col-xs-3 ">                                    
                                    <div class="form-group">
                                        <label >State *</label>
                                        <input type="text" name="unit[state]" class="form-control" value="<?php echo isset($unit_info['state']) && $unit_info['state'] != '' ? $unit_info['state'] : '';?>" placeholder="Enter State" maxlength="100">  
                            
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 ">                                    
                                    <div class="form-group">
                                        <label >Country *</label>
                                        <select name="unit[country]" class="form-control">
                                            <option value="">Select</option>   
                                            <?php 
                                                $countries = $this->config->item('countries');
                                                foreach ($countries as $key=>$val) { 
                                                    $selected = isset($unit_info['country']) && trim($unit_info['country']) == $val ? 'selected="selected" ' : '';  
                                                    echo "<option value='".$val."' ".$selected.">".$val."</option>";
                                                } ?> 
                                                                           
                                        </select>   
                                    </div>
                                </div>
                            </div>
                     
                     </div><!-- /.box-body -->   
                 </div><!-- /.box-warning -->  
            
            </div>
            
            <div class="col-md-6 col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title"><b>Onwer Details</b></h3>
                    </div>
                    <div class="box-body">
                    <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                                    <div class="form-group">
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="unit[is_defaulter]" value="1" <?php echo isset($unit_info['is_defaulter']) && $unit_info['is_defaulter'] == '1' ? 'checked="checked"' : ''; ?> ><p class="text-danger">Defaulter Resident</p></label>
                                      </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 no-padding" style="padding-top: 10px !important;">
                                    <div class="form-group">
                                      <label for="">Owner/Tenant Name *</label>
                                      <input type="text" name="unit[owner_name]" class="form-control" value="<?php echo isset($unit_info['owner_name']) && $unit_info['owner_name'] != '' ? $unit_info['owner_name'] : '';?>" placeholder="Enter Owner/Tenant Name" maxlength="100">
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 no-padding"  style="padding-top: 10px !important;">
                                    <div class="col-md-6 col-sm-6 col-xs-6 no-padding">                                    
                                        <div class="form-group">
                                            <label >Identity No *</label>
                                            <input type="text" name="unit[ic_passport_no]" class="form-control" value="<?php echo isset($unit_info['ic_passport_no']) && $unit_info['ic_passport_no'] != '' ? $unit_info['ic_passport_no'] : '';?>" placeholder="Enter Identity No" maxlength="20">  
                                
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6" style="padding-right: 0px;">
                                        <div class="form-group">
                                            <label>Date Of Birth *</label>                            
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                              <input class="form-control pull-right" name="unit[dob]" class="form-control" value="<?php echo isset($unit_info['dob']) && $unit_info['dob'] != '' ? date('d-m-Y',strtotime($unit_info['dob'])) : '';?>" id="datepicker" type="text" />
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 no-padding"  style="padding-top: 10px !important;">
                                    <div class="col-md-6 col-sm-6 col-xs-6 no-padding">                                    
                                        <div class="form-group">
                                            <label >Race *</label>
                                            <select name="unit[race]" class="form-control">
                                            <option value="">Select</option>   
                                            <?php 
                                                $race = $this->config->item('race');
                                                foreach ($race as $key=>$val) { 
                                                    $selected = isset($unit_info['race']) && trim($unit_info['race']) == $val ? 'selected="selected" ' : '';  
                                                    echo "<option value='".$val."' ".$selected.">".$val."</option>";
                                                } ?> 
                                            </select>  
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6" style="padding-right: 0px;">
                                        <div class="form-group">
                                            <label>Religion *</label>                            
                                            <select name="unit[religion]" class="form-control">
                                            <option value="">Select</option>   
                                            <?php 
                                                $religion = $this->config->item('religion');
                                                foreach ($religion as $key=>$val) { 
                                                    $selected = isset($unit_info['religion']) && trim($unit_info['religion']) == $val ? 'selected="selected" ' : '';  
                                                    echo "<option value='".$val."' ".$selected.">".$val."</option>";
                                                } ?> 
                                                                           
                                          </select>  
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-padding"  style="padding-top: 10px !important;">
                                    <div class="col-md-6 col-sm-6 col-xs-6 no-padding">                                    
                                        <div class="form-group">
                                            <label >Gender *</label>
                                            <select name="unit[gender]" class="form-control">
                                            <option value="">Select</option>   
                                            <?php 
                                                $gender = $this->config->item('gender');
                                                foreach ($gender as $key=>$val) { 
                                                    $selected = isset($unit_info['gender']) && trim($unit_info['gender']) == $val ? 'selected="selected" ' : '';  
                                                    echo "<option value='".$val."' ".$selected.">".$val."</option>";
                                                } ?> 
                                                                           
                                          </select>  
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6" style="padding-right: 0px;">
                                        <div class="form-group">
                                            <label>Nationality *</label>                            
                                            <select name="unit[nationality]" class="form-control">
                                            <option value="">Select</option>   
                                            <?php 
                                                $countries = $this->config->item('countries');
                                                foreach ($countries as $key=>$val) { 
                                                    $selected = isset($unit_info['nationality']) && trim($unit_info['nationality']) == $val ? 'selected="selected" ' : '';  
                                                    echo "<option value='".$val."' ".$selected.">".$val."</option>";
                                                } ?> 
                                                                           
                                            </select>  
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-padding"  style="padding-top: 10px !important;">
                                    <div class="col-md-6 col-sm-6 col-xs-6 no-padding">                                    
                                        <div class="form-group">
                                            <label >Contact No 1 *</label>
                                            <input type="text" name="unit[contact_1]" class="form-control" value="<?php echo isset($unit_info['contact_1']) && $unit_info['contact_1'] != '' ? $unit_info['contact_1'] : '';?>" placeholder="Contact No 1" maxlength="15">  
                                
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6" style="padding-right: 0px;">
                                        <div class="form-group">
                                        <label >Contact No 2</label>
                                            <input type="text" name="unit[contact_2]" class="form-control" value="<?php echo isset($unit_info['contact_2']) && $unit_info['contact_2'] != '' ? $unit_info['contact_2'] : '';?>" placeholder="Contact No 2" maxlength="15">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-padding"  style="padding-top: 10px !important;">
                                    <div class="col-md-6 col-sm-6 col-xs-6 no-padding">                                    
                                        <div class="form-group">
                                            <label >Email(Login) *</label>
                                            <input type="email" id="email_addr" name="unit[email_addr]" class="form-control" value="<?php echo isset($unit_info['email_addr']) && $unit_info['email_addr'] != '' ? $unit_info['email_addr'] : '';?>" placeholder="Enter Email(Login)" maxlength="100">  
                                
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6" style="padding-right: 0px;">
                                        <div class="form-group">
                                            <label>Password *</label>                            
                                            <input type="password" name="unit[password]" class="form-control" value="<?php echo isset($unit_info['password']) && $unit_info['password'] != '' ? $unit_info['password'] : '';?>" placeholder="Enter Password" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                    </div>
                    
                    
                </div><!-- /.box-info -->  
            </div>
            
            <div class="col-md-6 col-xs-12">
                
                <div class="box box-success">
                    <div class="col-md-12 no-padding text-right">
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button> &ensp;&ensp;
                        <button type="Reset" class="btn btn-default reset_btn" >Reset</button> &ensp;&ensp;
                        <!--button type="button" class="btn btn-success" onclick="window.history.go(-1); return false;">Back</button>&ensp;&ensp;&ensp;-->
                      </div>
                    </div>
                </div><!-- /.box-success -->
                
            </div>
            
            <!--div class="col-md-6 col-xs-12">               
                    
                <div class="col-md-12 no-padding text-right">
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button> &ensp;&ensp;
                    <button type="Reset" class="btn btn-default reset_btn" >Reset</button> &ensp;&ensp;                            
                  </div>
                </div>
            </div-->
        
        </div><!-- /.row -->   
        <!-- general form elements -->
          <!--div class="box box-success">
            
            
              
              
              <div class="row" style="text-align: right;"> 
                <div class="col-md-12">
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button> &ensp;&ensp;
                    <button type="Reset" class="btn btn-default reset_btn" >Reset</button> &ensp;&ensp;
                    
                  </div>
                </div>
              </div>
            
            </div--> <!-- /.box -->
        </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
<?php $this->load->view('footer');?>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- overlay loader for ajax call -->
<script src="<?php echo base_url();?>assets/js/loadingoverlay.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>

<script>

$(document).ready(function () {
    
    // right side box hight adjustments    
    /*if($('.cust-container-fluid').width() > 715) {
        $('.right-box').height($('.left-box').height());
    }*/
    
    $('#square_feet, #share_unit').keyup(function(){
        calculateCharges();
    });
    
    
    if($('#unit_id').val() != '') {  
        setChargesFields();
        loadBlock ('<?php echo isset($unit_info['block_id']) && $unit_info['block_id'] != '' ? $unit_info['block_id'] : '';?>');
    }
    
    /** Form validation */   
    $( "#bms_frm" ).validate({
		rules: {
			"unit[property_id]": "required",
            "unit[unit_no]": "required",
            "unit[unit_status]": "required",
            "unit[block_id]": "required",
            "unit[owner_name]": "required",
            "unit[ic_passport_no]": "required",
            "unit[dob]": "required",
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
			"unit[property_id]": "Please select Property Name",
            "unit[unit_no]": "Please enter Unit No",
            "unit[unit_status]": "Please select Unit Status",
            "unit[block_id]": "Please select Block/Street",
            "unit[owner_name]": "Please enter Owner/Tenant Name",
            "unit[ic_passport_no]": "Please enter Identity No",
            "unit[dob]": "Please select Date Of Birth",
            "unit[race]": "Please select Race",
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
        setChargesFields();
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

function setChargesFields () {
    if($('#property_id').val() != '') {
        //console.log($('#property_id').find('option:selected').data('calc-base'));
        if($('#property_id').find('option:selected').data('calc-base') == 1 || $('#property_id').find('option:selected').data('calc-base') == 2) {
            $('input[name="unit[service_charge]"').attr('readonly','true');
            $('input[name="unit[sinking_fund]"').attr('readonly','true');
            $('input[name="unit[insurance_prem]"').attr('readonly','true');
            $('input[name="unit[quit_rent]"').attr('readonly','true');
            if($('#property_id').find('option:selected').data('calc-base') == 1) {                
                $('#square_feet').removeAttr('disabled');
                $('#share_unit').val('');
                $('#share_unit').attr('disabled','disabled');
            } else if($('#property_id').find('option:selected').data('calc-base') == 2) {
                $('#share_unit').removeAttr('disabled');
                $('#square_feet').val('');
                $('#square_feet').attr('disabled','disabled');
            } else {
                $('#square_feet').removeAttr('disabled');
                $('#share_unit').removeAttr('disabled');
            }
            calculateCharges ();            
        } else {
            $('#square_feet').removeAttr('disabled');
            $('#share_unit').removeAttr('disabled');
            $('input[name="unit[service_charge]"').removeAttr('readonly');
            $('input[name="unit[sinking_fund]"').removeAttr('readonly');
            $('input[name="unit[insurance_prem]"').removeAttr('readonly');
            $('input[name="unit[quit_rent]"').removeAttr('readonly');
        }
    }
}

function calculateCharges () {
    if($('#property_id').find('option:selected').data('calc-base') == 1 && $('#property_id').find('option:selected').data('per-sq-feet') != '' && $('#square_feet').val() != '') {
        var sc = eval($('#property_id').find('option:selected').data('per-sq-feet'))*eval($('#square_feet').val());
        $('input[name="unit[service_charge]"').val(sc.toFixed(2));
        if($('input[name="unit[service_charge]"').val() != '' && eval($('input[name="unit[service_charge]"').val()) > 0 && $('#property_id').find('option:selected').data('sinking-fund') != '') {
            var sinking_fund = (eval($('input[name="unit[service_charge]"').val())*eval($('#property_id').find('option:selected').data('sinking-fund')))/100;
            $('input[name="unit[sinking_fund]"').val(sinking_fund.toFixed(2));             
        }
        if($('#property_id').find('option:selected').data('insurance-prem') != '' && $('#property_id').find('option:selected').data('tot-sq-feet') != '') {
            var insurance_prem = (eval($('#property_id').find('option:selected').data('insurance-prem'))/eval($('#property_id').find('option:selected').data('tot-sq-feet')))*eval($('#square_feet').val());
            $('input[name="unit[insurance_prem]"').val(insurance_prem.toFixed(2));
        }
        if($('#property_id').find('option:selected').data('quit-rent') != '' && $('#property_id').find('option:selected').data('tot-sq-feet') != '') {
            var quit_rent = (eval($('#property_id').find('option:selected').data('quit-rent'))/eval($('#property_id').find('option:selected').data('tot-sq-feet')))*eval($('#square_feet').val());
            $('input[name="unit[quit_rent]"').val(quit_rent.toFixed(2));
        }        
                
    } else if($('#property_id').find('option:selected').data('calc-base') == 2 && $('#property_id').find('option:selected').data('per-share-unit') != '' && $('#share_unit').val() != '') {
        
        var sc = eval($('#property_id').find('option:selected').data('per-share-unit'))*eval($('#share_unit').val());
        $('input[name="unit[service_charge]"').val(sc.toFixed(2));
        if($('input[name="unit[service_charge]"').val() != '' && eval($('input[name="unit[service_charge]"').val()) > 0 && $('#property_id').find('option:selected').data('sinking-fund') != '') {
            var sinking_fund = (eval($('input[name="unit[service_charge]"').val())*eval($('#property_id').find('option:selected').data('sinking-fund')))/100;
            $('input[name="unit[sinking_fund]"').val(sinking_fund.toFixed(2));            
        }
        if($('#property_id').find('option:selected').data('insurance-prem') != '' && $('#property_id').find('option:selected').data('tot-share-unit') != '') {
            //console.log((eval($('#property_id').find('option:selected').data('insurance-prem'))/eval($('#property_id').find('option:selected').data('tot-share-unit')))*eval($('#share_unit').val()));
            var insurance_prem = (eval($('#property_id').find('option:selected').data('insurance-prem'))/eval($('#property_id').find('option:selected').data('tot-share-unit')))*eval($('#share_unit').val());
            $('input[name="unit[insurance_prem]"').val(insurance_prem.toFixed(2));
        }   
        if($('#property_id').find('option:selected').data('quit-rent') != '' && $('#property_id').find('option:selected').data('tot-share-unit') != '') {
            var quit_rent = (eval($('#property_id').find('option:selected').data('quit-rent'))/eval($('#property_id').find('option:selected').data('tot-share-unit')))*eval($('#share_unit').val());
            $('input[name="unit[quit_rent]"').val(quit_rent.toFixed(2));
        } 
        
    }
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