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
            <!-- form start -->
            <form role="form" id="bms_frm" action="<?php echo base_url('index.php/bms_property/add_property_submit');?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                  <div class="row">
                    <div class="col-md-12" style="padding: 0;">
                        
                        <div class="col-md-6 col-xs-12 no-padding">
                            <div class="box-header with-border" style="padding-left:15px ;">
                              <h3 class="box-title"><b>Property Information</b></h3>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                      <label>Property Name *&ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; 
                                           <div class="pull-right"><input type="radio" name="property[property_status]" value="1" <?php echo (isset($property_info['property_status']) && $property_info['property_status'] != '0') || !isset($property_info['property_status']) ? 'checked="checked"' : ''; ?> > &ensp; Active &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; 
                                            <input type="radio" name="property[property_status]" value="0" <?php echo isset($property_info['property_status']) && $property_info['property_status'] == '0' ? 'checked="checked"' : ''; ?> > &ensp; Inactive
                                           </div> 
                                      </label>
                                      <input type="text" id="property_name" name="property[property_name]" class="form-control" value="<?php echo !empty($property_info['property_name']) ? $property_info['property_name'] : '';?>" placeholder="Enter Property Name" maxlength="100">
                                      <input type="hidden" name="property_id" value="<?php echo $property_id;?>" />
                                    </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                  <label>Property Type *</label>
                                  <select name="property[property_type]" class="form-control">
                                    <option value="">Select</option>
                                    <?php                                     
                                        foreach ($property_type as $key=>$val) {
                                            $selected = !empty($property_info['property_type']) && $property_info['property_type'] == $val['type_id'] ? 'selected="selected" ' : '';
                                            echo "<option value='".$val['type_id']."'  ".$selected.">".$val['type_name']."</option>";
                                        }
                                    ?>                                
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                  <label>Property Abbreviation *</label>
                                  <input type="text" id="property_abbrev" name="property[property_abbrev]" class="form-control" value="<?php echo !empty($property_info['property_abbrev']) ? $property_info['property_abbrev'] : '';?>" placeholder="Enter Property Abbreviation" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12 no-padding" > 
                                <div class="col-md-6 col-xs-6" >                            
                                    <div class="form-group">
                                      <label>Property Under *</label><br />
                                        <select name="property[property_under]" class="form-control">
                                            <option value="">Select</option>
                                            <?php 
                                                $property_under = $this->config->item('property_under');
                                                
                                                foreach ($property_under as $key=>$val) {
                                                    $selected = isset($property_info['property_under']) && $property_info['property_under'] == $key ? 'selected="selected" ' : '';
                                                    echo "<option value='".$key."' ".$selected.">".$val."</option>";
                                                }
                                            ?>
                                        
                                      </select>
                                    </div>                            
                                </div>
                                
                                <div class="col-md-6 col-xs-6">                            
                                    <div class="form-group">
                                      <label>Total Units *</label>
                                      <input type="text" id="total_units" name="property[total_units]" class="form-control" value="<?php echo !empty($property_info['total_units']) ? $property_info['total_units'] : '';?>" placeholder="Enter Total Units" maxlength="20">
                                    </div>                            
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12" >                            
                                <div class="form-group">
                                  <label>JMB / MC / Developer Name</label>
                                  <input type="text" id="jmb_mc_name" name="property[jmb_mc_name]" class="form-control" value="<?php echo !empty($property_info['jmb_mc_name']) ? $property_info['jmb_mc_name'] : '';?>" placeholder="Enter JMB / MC / Developer Name" maxlength="100">
                                </div>                            
                            </div>
                            
                            
                            <div style="clear: both;height:1px"></div>
                     
                                <div class="box-header with-border" style="padding-left:15px ;">
                                  <h3 class="box-title"><b>Contact Information</b></h3>
                                </div>
                            
                            
                            <div class="col-md-12" style="padding: 0;">
                                <div class="col-md-12 col-xs-12">                            
                                    <div class="form-group">
                                      <label>Address Line 1</label>
                                      <input type="text" id="address_1" name="property[address_1]" class="form-control" value="<?php echo !empty($property_info['address_1']) ? $property_info['address_1'] : '';?>" placeholder="Enter Address Line 1" maxlength="255">
                                    </div>                            
                                </div>
                                <div class="col-md-12 col-xs-12">                            
                                    <div class="form-group">
                                      <label>Address Line 2</label>
                                      <input type="text" id="address_2" name="property[address_2]" class="form-control" value="<?php echo !empty($property_info['address_2']) ? $property_info['address_2'] : '';?>" placeholder="Enter Address Line 2" maxlength="150">
                                    </div>                            
                                </div>
                            </div>
                            
                            <div class="col-md-12" style="padding: 0;">
                                <div class="col-md-6 col-xs-12">                         
                                    <div class="form-group">
                                      <label>City</label>
                                      <input type="text" id="city" name="property[city]" class="form-control" value="<?php echo !empty($property_info['city']) ? $property_info['city'] : '';?>" placeholder="Enter City" maxlength="150">
                                    </div>                            
                                </div>    
                                <div class="col-md-6 col-xs-12">                            
                                    <div class="form-group">
                                      <label>Post Code</label>
                                      <input type="text" id="pin_code" name="property[pin_code]" class="form-control" value="<?php echo !empty($property_info['pin_code']) ? $property_info['pin_code'] : '';?>" placeholder="Enter Pincode" maxlength="25" _style="background-color:#D2F6FF ;">
                                    </div>                            
                                </div>
                            </div>
                            <div class="col-md-12" style="padding: 0;">
                                <div class="col-md-6 col-xs-6">                            
                                   <div class="form-group">
                                      <label>State</label>
                                      <select name="property[state_id]" class="form-control">
                                        <option value="">Select</option>
                                        <?php                                     
                                            foreach ($property_state as $key=>$val) {
                                                $selected = !empty($property_info['state_id']) && $property_info['state_id'] == $val['state_id'] ? 'selected="selected" ' : '';
                                                echo "<option value='".$val['state_id']."'  ".$selected.">".$val['state_name']."</option>";
                                            }
                                        ?>                                
                                      </select>
                                    </div>                        
                                </div>
                                <div class="col-md-6 col-xs-6">                            
                                   <div class="form-group">
                                      <label>Country</label>
                                      <select name="property[country_id]" class="form-control">
                                        <option value="">Select</option>
                                        <?php                                     
                                            foreach ($countries_mas as $key=>$val) {
                                                $selected = !empty($property_info['country_id']) && $property_info['country_id'] == $val['country_id'] ? 'selected="selected" ' : '';
                                                echo "<option value='".$val['country_id']."'  ".$selected.">".$val['country_name']."</option>";
                                            }
                                        ?>                                
                                      </select>
                                    </div>                        
                                </div>
                            </div>
                            
                            
                            <div class="col-md-6 col-xs-6">                            
                                <div class="form-group">
                                  <label>Fax</label>
                                  <input type="text" id="fax" name="property[fax]" class="form-control" value="<?php echo !empty($property_info['fax']) ? $property_info['fax'] : '';?>" placeholder="Enter Fax" maxlength="50">
                                </div>                            
                            </div>
                            
                            
                            
                            <div class="col-md-6 col-xs-6">                            
                                <div class="form-group">
                                  <label>Phone No1</label>
                                  <input type="text" id="phone_no" name="property[phone_no]" class="form-control" value="<?php echo !empty($property_info['phone_no']) ? $property_info['phone_no'] : '';?>" placeholder="Enter Phone No" maxlength="50">
                                </div>                            
                            </div>
                            
                            <div class="col-md-6 col-xs-6">                            
                                <div class="form-group">
                                  <label>Phone No 2</label>
                                  <input type="text" id="phone_no2" name="property[phone_no2]" class="form-control" value="<?php echo !empty($property_info['phone_no2']) ? $property_info['phone_no2'] : '';?>" placeholder="Enter Phone No 2" maxlength="50">
                                </div>                            
                            </div>
                    
                            <div class="col-md-6 col-xs-6">                            
                                <div class="form-group">
                                  <label>Email Address</label>
                                  <input type="text" id="email_addr" name="property[email_addr]" class="form-control" value="<?php echo !empty($property_info['email_addr']) ? $property_info['email_addr'] : '';?>" placeholder="Enter Email Address" maxlength="100">
                                </div>                            
                            </div>
                            
                            
                            <div class="col-md-12 col-xs-12 no-padding block_div"> 
                            
                                <div class="col-md-6 col-xs-12 block_div_inner"> 
                                    <label>Block / Street Name</label> 
                                    <div class="input-group">
                                      <input class="form-control" name="blocks[block_name][]" value="<?php echo !empty($blocks[0]['block_name']) ? $blocks[0]['block_name'] : '';?>" type="text" placeholder="Enter Block / Street Name" maxlength="100" />
                                      <input type="hidden" name="blocks[block_id][]" value="<?php echo !empty($blocks[0]['block_id']) ? $blocks[0]['block_id'] : '';?>" />
                                    	<span class="input-group-btn">
                                            <button class="btn btn-success btn-add-block" type="button">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <?php if(!empty($blocks) && count($blocks) > 1) {
                                    for ($k=1;$k < count($blocks); $k++) { ?>
                                    
                                        <div class="col-md-6 col-xs-12 block_div_inner" style="margin-top: <?php echo $k == 1 ? 25 : 15;?>px"> 
                                    
                                    <div class="input-group">
                                      <input class="form-control" name="blocks[block_name][]" value="<?php echo !empty($blocks[$k]['block_name']) ? $blocks[$k]['block_name'] : '';?>" type="text" placeholder="Enter Block / Street Name" maxlength="100" />
                                      <input type="hidden" name="blocks[block_id][]" value="<?php echo !empty($blocks[$k]['block_id']) ? $blocks[$k]['block_id'] : '';?>" />
                                    	<span class="input-group-btn">
                                            <button class="btn btn-danger btn-remove-block" type="button">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                        
                                   <?php  }
                                } ?>
                            
                            </div>
                                
                            <div class="col-md-12" style="padding: 0;margin-top:15px">  
                                <div class="col-md-6 col-xs-12 no-padding">                      
                                    
                                    
                                    
            						<div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                          <label for="">Property Logo</label>
                                          <div style="position:relative;">
                                        		<label class="btn-bs-file btn btn-primary">
                                                Choose Logo...
                                        			
                                        			<!--input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="document" size="40"  onchange='$("#upload-file-info").html($(this).val());'-->
                                                    <input type="file" id="attach_file" name="prop_logo" size="40" onchange='$("#upload-file-info").html($(this).val());' />
                                        		</label>
                                        		&nbsp;
                                        		<span class='label label-info' id="upload-file-info"></span>
                                    	  </div>
                                        </div>
                                        <input type="hidden" name="property_logo_old" value="<?php echo !empty($property_info['logo']) ? $property_info['logo'] : '';?>" />
                                        <?php if(!empty($property_info['logo'])) { 
                                            $property_logo_upload = $this->config->item('property_logo_upload');
                                            
                                            ?>
                                            <div class="form-group">
                                          <label>Current Logo:</label><br />
                                            <img src="<?php echo '../../../'.$property_logo_upload['upload_path'].$property_info['logo'];?>" width="150" />
                                        </div>
                                        <?php } ?>
                                    </div>
            					
                                </div>
                                
                            </div>
                        
                        </div>
                        
                        <div class="col-md-6 col-xs-12 no-padding">
                            <div class="box-header with-border" style="padding-left:15px ;">
                              <h3 class="box-title"><b>Accounts Information</b></h3>
                            </div>
                            
                            <div class="col-md-6 col-xs-6"> 
                                <div class="form-group">
                                  <label>Financial Year Start Month</label><br />      
                                    <select name="property[finance_year_start_month]" class="form-control">
                                        <option value="">Select</option>
                                        <?php 
                                            $finance_year_start_month = $this->config->item('finance_year_start_month');
                                            
                                            foreach ($finance_year_start_month as $key=>$val) {
                                                $selected = isset($property_info['finance_year_start_month']) && $property_info['finance_year_start_month'] == $key ? 'selected="selected" ' : '';
                                                echo "<option value='".$key."' ".$selected.">".$val."</option>";
                                            }
                                        ?>
                                        
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">                            
                                <div class="form-group">
                                  <label>e-Billing start from</label>
                                  
                                  <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input class="form-control pull-right datepicker" name="property[e_billing_start_date]" value="<?php echo isset($property_info['e_billing_start_date']) && $property_info['e_billing_start_date'] != '' && $property_info['e_billing_start_date'] != '0000-00-00' && $property_info['e_billing_start_date'] != '1970-01-01' ? date('d-m-Y', strtotime($property_info['e_billing_start_date'])) : '';?>" type="text">                                  
                                    </div>
                                </div>                            
                            </div>
                            
                            <div class="col-md-12 col-xs-12">                            
                                <div class="form-group col-md-2 col-xs-3 no-padding" style="margin: 25px 0;">
                                  <label>Tax Type</label>
                                </div>
                                <div class="col-md-6 col-xs-9 no-padding" style="margin: 25px 0;">
                                  <select id="tax_type" name="property[tax_type]" class="form-control">
                                        <option value="">Select</option>
                                        <?php 
                                            $tax_type = $this->config->item('tax_type');
                                            
                                            foreach ($tax_type as $key=>$val) {
                                                $selected = isset($property_info['tax_type']) && $property_info['tax_type'] == $key ? 'selected="selected" ' : '';
                                                echo "<option value='".$key."' ".$selected.">".$val."</option>";
                                            }
                                        ?>
                                    
                                  </select>
                                  <!--label class="radio-inline">
                                      <input type="radio" name="property[tax_type]" value="1" <?php echo isset($property_info['tax_type']) && $property_info['tax_type'] == 1 ? 'checked="checked"' : '';?>><b>GST</b> &ensp; 
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="property[tax_type]" value="2" <?php echo isset($property_info['tax_type']) && $property_info['tax_type'] == 2 ? 'checked="checked"' : '';?>><b>SST</b>  &ensp; 
                                    </label-->
                                    
                                </div>                            
                            </div>
                            
                            <div class="col-md-6 col-xs-6"> 
                                <div class="form-group">
                                  <label>Tax %</label><br />      
                                    <input type="text" name="property[tax_percentage]" id="tax_percentage" class="form-control inline" value="<?php echo !empty($property_info['tax_percentage']) && $property_info['tax_percentage'] != '0.00' ? $property_info['tax_percentage'] : '';?>" placeholder="Enter Tax %" maxlength="13">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">                            
                                <div class="form-group">
                                  <label>Tax Start From</label>
                                  
                                  <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input class="form-control pull-right datepicker" id="tax_effect_from" name="property[tax_effect_from]" value="<?php echo isset($property_info['tax_effect_from']) && $property_info['tax_effect_from'] != '' && $property_info['tax_effect_from'] != '0000-00-00' && $property_info['tax_effect_from'] != '1970-01-01' ? date('d-m-Y', strtotime($property_info['tax_effect_from'])) : '';?>" type="text">                                  
                                    </div>
                                </div>                            
                            </div>
                            
                            <div class="col-md-6 col-xs-6">                            
                               <div class="form-group">
                                  <label>Billing Cycle </label>
                                    
                                        <select name="property[billing_cycle]" class="form-control">
                                        <option value="">Select</option>
                                        <?php 
                                            $billing_cycle = $this->config->item('billing_cycle');
                                            
                                            foreach ($billing_cycle as $key=>$val) {
                                                $selected = isset($property_info['billing_cycle']) && $property_info['billing_cycle'] == $key ? 'selected="selected" ' : '';
                                                echo "<option value='".$key."' ".$selected.">".$val."</option>";
                                            }
                                        ?>                                    
                                      </select>
                                                                   
                                </div>                        
                            </div>
                            
                            <div class="col-md-6 col-xs-6">                            
                               <div class="form-group">
                                  <label>Sinking Fund %
                                  &ensp;
                                  <?php if(in_array(2,$property_chang_hist_arr)) {
                                    echo "<a href='javascript:;' class='property_charg_cls' data-title='Sinking Fund %' data-property='".$property_id."' data-cat='2' title='View Change History'><i class='fa fa-history'></i></a>";
                                  } ?></label>
                                    
                                        <input type="text" name="property[sinking_fund]" id="sinking_fund" class="form-control inline" value="<?php echo !empty($property_info['sinking_fund']) && $property_info['sinking_fund'] != '0.00' ? $property_info['sinking_fund'] : '';?>" placeholder="Enter Sinking Fund %" maxlength="13">
                                    
                                    <input type="hidden" name="prop_hidd[sinking_fund]" value="<?php echo isset($property_info['sinking_fund']) ? $property_info['sinking_fund'] : ''; ?>" />
                                </div>                        
                            </div>
                            
                            <div class="col-md-12 col-xs-12">                            
                                <div class="form-group" style="margin: 10px 0;">
                                  <label>Caculation based on *</label> &ensp;
                                  <?php if(in_array(1,$property_chang_hist_arr)) {
                                    echo "<a href='javascript:;' class='property_charg_cls' data-title='Caculation based on' data-property='".$property_id."' data-cat='1' title='View Change History' ><i class='fa fa-history'></i></a>";
                                  } ?>
                                  &ensp; 
                                  <label class="radio-inline">
                                      <input type="radio" name="property[calcul_base]" value="1" <?php echo isset($property_info['calcul_base']) && $property_info['calcul_base'] == 1 ? 'checked="checked"' : '';?>><b>Sq. Foot</b> &ensp; 
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="property[calcul_base]" value="2" <?php echo isset($property_info['calcul_base']) && $property_info['calcul_base'] == 2 ? 'checked="checked"' : '';?>><b>Share Unit</b>  &ensp; 
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="property[calcul_base]" value="3" <?php echo isset($property_info['calcul_base']) && $property_info['calcul_base'] == 3 ? 'checked="checked"' : '';?>><b>Fixed</b> &ensp; 
                                    </label>
                                    <input type="hidden" name="prop_hidd[calcul_base]" value="<?php echo isset($property_info['calcul_base']) ? $property_info['calcul_base'] : ''; ?>" />
                                </div>                            
                            </div>
                            
                            <div class="col-md-6 col-xs-6">                            
                                <div class="form-group">
                                  <label>Total Sq. Foot</label>
                                  <input type="text" id="tot_sq_feet" name="property[tot_sq_feet]" class="form-control" value="<?php echo !empty($property_info['tot_sq_feet']) ? $property_info['tot_sq_feet'] : '';?>" placeholder="Enter Total Sq. Foot" maxlength="13">
                                </div>                            
                            </div>
                            <div class="col-md-6 col-xs-6">                            
                               <div class="form-group">
                                  <label>Value Per Sq. Foot</label>
                                  
                                  &ensp;
                                  <?php if(in_array(3,$property_chang_hist_arr)) {
                                    echo "<a href='javascript:;'  class='property_charg_cls' data-title='Value Per Sq. Foot' data-property='".$property_id."' data-cat='3' title='View Change History'><i class='fa fa-history'></i></a>";
                                  } ?>
                                  
                                    <input type="text" id="per_sq_feet" name="property[per_sq_feet]" class="form-control" value="<?php echo !empty($property_info['per_sq_feet']) && $property_info['per_sq_feet'] != '0.00' ? $property_info['per_sq_feet'] : '';?>" placeholder="Enter Per Sq. Foot" maxlength="13">
                                    <input type="hidden" name="prop_hidd[per_sq_feet]" value="<?php echo isset($property_info['per_sq_feet']) ? $property_info['per_sq_feet'] : ''; ?>" />
                                </div>                        
                            </div>
                            <div class="col-md-6 col-xs-6">                            
                                <div class="form-group">
                                  <label>Total Share Unit</label>
                                  <input type="text" id="tot_share_unit" name="property[tot_share_unit]" class="form-control" value="<?php echo !empty($property_info['tot_share_unit']) ? $property_info['tot_share_unit'] : '';?>" placeholder="Enter Total Share Unit" maxlength="13">
                                </div>                            
                            </div>
                            <div class="col-md-6 col-xs-6">                            
                                <div class="form-group">
                                  <label>Value Per Share Unit</label>
                                  
                                  &ensp;
                                  <?php if(in_array(4,$property_chang_hist_arr)) {
                                    echo "<a href='javascript:;' class='property_charg_cls' data-title='Value Per Share Unit' data-property='".$property_id."' data-cat='4' title='View Change History'><i class='fa fa-history'></i></a>";
                                  } ?>
                                  
                                  <input type="text" id="per_share_unit" name="property[per_share_unit]" class="form-control" value="<?php echo !empty($property_info['per_share_unit']) && $property_info['per_share_unit'] != '0.00' ? $property_info['per_share_unit'] : '';?>" placeholder="Enter Per Share Unit" maxlength="13">
                                  <input type="hidden" name="prop_hidd[per_share_unit]" value="<?php echo isset($property_info['per_share_unit']) ? $property_info['per_share_unit'] : ''; ?>" />
                                </div>                            
                            </div>
                            
                            
                            <div class="col-md-6 col-xs-6">                            
                                <div class="form-group">
                                  <label>Insurance Premium (RM)</label>
                                  
                                  &ensp;
                                  <?php if(in_array(1,$property_prem_quit_hist_arr)) {
                                    echo "<a href='javascript:;' class='property_prem_quit_cls' data-title='Insurance Premium' data-property='".$property_id."' data-cat='1' title='View Change History'><i class='fa fa-history'></i></a>";
                                  } ?>
                                  
                                  <input type="text" id="insurance_prem" name="property[insurance_prem]" class="form-control" value="<?php echo !empty($property_info['insurance_prem']) && $property_info['insurance_prem'] != '0.00' ? $property_info['insurance_prem'] : '';?>" placeholder="Enter Insurance Premium (RM)" maxlength="25">
                                  <input type="hidden" name="prop_hidd[insurance_prem]" value="<?php echo isset($property_info['insurance_prem']) ? $property_info['insurance_prem'] : ''; ?>" />
                                </div>                            
                            </div>
                            
                            <div class="col-md-6 col-xs-6">                                    
                                <div class="form-group">
                                    <label >Premium Start Date</label>
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input class="form-control pull-right datepicker" name="property[insur_prem_date]" value="<?php echo isset($property_info['insur_prem_date']) && $property_info['insur_prem_date'] != '' && $property_info['insur_prem_date'] != '0000-00-00' && $property_info['insur_prem_date'] != '1970-01-01' ? date('d-m-Y', strtotime($property_info['insur_prem_date'])) : '';?>" type="text">
                                      <input type="hidden" name="prop_hidd[insur_prem_date]" value="<?php echo isset($property_info['insur_prem_date']) ? $property_info['insur_prem_date'] : ''; ?>" />
                                    </div>    
                        
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-xs-6">                            
                                <div class="form-group">
                                  <label>Quit Rent (RM)</label>
                                  
                                  &ensp;
                                  <?php if(in_array(2,$property_prem_quit_hist_arr)) {
                                    echo "<a href='javascript:;' class='property_prem_quit_cls' data-title='Quit Rent' data-property='".$property_id."' data-cat='2' title='View Change History' ><i class='fa fa-history'></i></a>";
                                  } ?>
                                  
                                  <input type="text" id="quit_rent" name="property[quit_rent]" class="form-control" value="<?php echo !empty($property_info['quit_rent']) && $property_info['quit_rent'] != '0.00' ? $property_info['quit_rent'] : '';?>" placeholder="Enter Quit Rent (RM)" maxlength="25">
                                  <input type="hidden" name="prop_hidd[quit_rent]" value="<?php echo isset($property_info['quit_rent']) ? $property_info['quit_rent'] : ''; ?>" />
                                </div>                            
                            </div>
                            <div class="col-md-6 col-xs-6">                                    
                                <div class="form-group">
                                    <label >Quit Rent Paid on</label>
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input class="form-control pull-right datepicker" name="property[quit_rent_paid_on]" value="<?php echo isset($property_info['quit_rent_paid_on']) && $property_info['quit_rent_paid_on'] != '' && $property_info['quit_rent_paid_on'] != '0000-00-00' && $property_info['quit_rent_paid_on'] != '1970-01-01' ? date('d-m-Y', strtotime($property_info['quit_rent_paid_on'])) : '';?>" type="text">
                                      <input type="hidden" name="prop_hidd[quit_rent_paid_on]" value="<?php echo isset($property_info['quit_rent_paid_on']) ? $property_info['quit_rent_paid_on'] : ''; ?>" />
                                    </div>    
                        
                                </div>
                            </div> 
                            <div class="col-md-6 col-xs-6">                            
                                <div class="form-group">
                                  <label>Monthly Billing (RM)</label>
                                  
                                  &ensp;
                                  <?php if(in_array(5,$property_chang_hist_arr)) {
                                    echo "<a href='javascript:;' class='property_charg_cls' data-title='Monthly Billing' data-property='".$property_id."' data-cat='5' title='View Change History'><i class='fa fa-history'></i></a>";
                                  } ?>
                                  
                                  <input type="text" id="monthly_billing" name="property[monthly_billing]" class="form-control" value="<?php echo !empty($property_info['monthly_billing']) ? $property_info['monthly_billing'] : '';?>" placeholder="Enter Monthly Billing" maxlength="13">
                                  <input type="hidden" name="prop_hidd[monthly_billing]" value="<?php echo isset($property_info['monthly_billing']) ? $property_info['monthly_billing'] : ''; ?>" />
                                </div>                            
                            </div>
                            
                            <div class="col-md-12" >                                
                                  <label>Rounding</label>
                                
                            </div>
                            
                            <div class="col-md-12" > 
                                <div class="col-md-12" style="padding:15px 0;border: 1px solid #000;font-weight: bold;"> 
                                    <div class="col-md-4">Maintenance Fee</div> <div class="col-md-8"><input type="checkbox" name="property[mf_rounding]" value="1" <?php echo isset($property_info['mf_rounding']) && $property_info['mf_rounding'] == '1' ? 'checked="checked"' : ''; ?>  ></div>   
                                    <div class="col-md-4">Sinking Fund</div> <div class="col-md-8"><input type="checkbox" name="property[sf_rounding]" value="1" <?php echo isset($property_info['sf_rounding']) && $property_info['sf_rounding'] == '1' ? 'checked="checked"' : ''; ?>  ></div>
                                    <div class="col-md-4">Late Payment Interest</div> <div class="col-md-8"><input type="checkbox" name="property[lpi_rounding]" value="1" <?php echo isset($property_info['lpi_rounding']) && $property_info['lpi_rounding'] == '1' ? 'checked="checked"' : ''; ?> ></div>
                                </div>
                            </div>
                            
                            <div class="col-md-12" style="padding: 0;margin-top:15px;">  
                                <div class="box-header with-border" style="padding-left:15px ;">
                                  <h3 class="box-title"><b>Late Payment Interest</b></h3>
                                </div>
                                <div class="col-md-6 col-xs-12">                            
                                    <div class="form-group">
                                      <label>Late Payment Charge % pa&ensp; <input type="checkbox" name="property[late_payment]" id="late_payment" value="1" <?php echo isset($property_info['late_payment']) && $property_info['late_payment'] == '1' ? 'checked="checked"' : ''; ?> > </label>                             
                                      <input type="text" id="late_pay_percent" name="property[late_pay_percent]" class="form-control" value="<?php echo !empty($property_info['late_pay_percent']) ? $property_info['late_pay_percent'] : '';?>" placeholder="Enter Late Payment Charge %" maxlength="13">                              
                                    </div>                            
                                </div>
                                <div class="col-md-6 col-xs-12">                            
                                    <div class="form-group">
                                      <label>Late Payment Grace Period (Days)</label>                              
                                      <input type="text" id="late_pay_grace" name="property[late_pay_grace]" class="form-control" value="<?php echo !empty($property_info['late_pay_grace']) ? $property_info['late_pay_grace'] : '';?>" placeholder="Enter Late Payment Grace Period (Days)" maxlength="13">                              
                                    </div>                            
                                </div>                                   
                            </div>
                            
                            
                            <div class="col-md-12" style="padding: 0;margin-top:5px;">  
                                <div class="box-header with-border" style="padding-left:15px ;">
                                  <h3 class="box-title"><b>Utility Settings</b></h3>
                                </div>
                                <div class="col-md-6 col-xs-12">                            
                                    <div class="form-group">
                                      <label>Electricity Min. Charge&ensp; <input type="checkbox" id="electricity" name="property[electricity]" value="1" <?php echo isset($property_info['electricity']) && $property_info['electricity'] == '1' ? 'checked="checked"' : ''; ?> > </label>                             
                                      <input type="text" id="electricity_min_charg" name="property[electricity_min_charg]" class="form-control" value="<?php echo !empty($property_info['electricity_min_charg']) ? $property_info['electricity_min_charg'] : '';?>" placeholder="Enter Electricity Min. Charge" maxlength="13">                              
                                    </div>                            
                                </div>
                                <div class="col-md-6 col-xs-12">                            
                                    <div class="form-group">
                                      <label>Charge per KWH</label>                              
                                      <input type="text" id="electricity_charge_per_unit" name="property[electricity_charge_per_unit]" class="form-control" value="<?php echo !empty($property_info['electricity_charge_per_unit']) ? $property_info['electricity_charge_per_unit'] : '';?>" placeholder="Enter Charge per KWH" maxlength="13">                              
                                    </div>                            
                                </div>
                           </div>  
                           <div class="col-md-12" style="padding: 0;">     
                                <div class="col-md-6 col-xs-12">                            
                                    <div class="form-group">
                                      <label>Water Min. Charge&ensp; <input type="checkbox" id="water" name="property[water]" value="1" <?php echo isset($property_info['water']) && $property_info['water'] == '1' ? 'checked="checked"' : ''; ?> > </label>                             
                                      <input type="text" id="water_min_charg" name="property[water_min_charg]" class="form-control" value="<?php echo !empty($property_info['water_min_charg']) ? $property_info['water_min_charg'] : '';?>" placeholder="Enter Water Min. Charge" maxlength="13">                              
                                    </div>                            
                                </div>
                                <div class="col-md-6 col-xs-12">                            
                                    <div class="form-group">
                                      <label>Charge per m<sup>3</sup></label>                              
                                      <input type="text" id="water_charge_per_unit" name="property[water_charge_per_unit]" class="form-control" value="<?php echo !empty($property_info['water_charge_per_unit']) ? $property_info['water_charge_per_unit'] : '';?>" placeholder="" maxlength="13">                              
                                    </div>                            
                                </div>
                                                                   
                            </div>
                            
                            
                            
                        </div>
                    </div> 
              
                  
                    
                    
                    
                
                <div class="col-md-12" >
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <p class="help-block"> * Required Fields.</p>
                        </div>
                    </div>
              </div>
              
              <!-- /.box-body -->
              <div class="row" style="text-align: right;margin:0 -10px;"> 
                <div class="col-md-12">
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary submit_btn" name="action" value="save_only">Submit</button> &ensp;
                    <!--button type="submit" class="btn btn-primary submit_btn" name="action" value="save_print">Submit & Print</button> &ensp;-->
                    <button type="Reset" class="btn btn-default reset_btn" >Reset</button> &ensp;&ensp;
                  </div>
                </div>
              </div>
              
              
            </form>
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  
<!-- Modal2 -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" _style="width:750px;">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change History</h4>
      </div>
      <div class="modal-body modal-body2" style="padding-bottom: 0px;">
        
        <div class="xol-xs-12 msg">
            
        </div>
        <div style="clear: both;height:1px"></div>
        <div class="xol-xs-12" style="padding-top: 15px;">
            
        </div>
        
        
      </div>
      <div style="clear: both;height:10px"></div>
      <div class="modal-footer" style="padding-top: 5px !important;">        
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> 
  
  
<?php $this->load->view('footer');?>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!--script src="<?php echo base_url();?>assets/js/jquery.number.js"></script-->
<!-- overlay loader for ajax call -->
<script src="<?php echo base_url();?>assets/js/loadingoverlay.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>


<script>
$(document).ready(function () {
    
    //$('input[type="text"]').css('background-color','#FFEBD2');
    //$('input[type="text"]').css('box-shadow','-3px -3px 3px #ddd')
    
   $('#tot_sq_feet, #per_sq_feet, #tot_share_unit, #per_share_unit, #sinking_fund').keyup(function(){
        check_monthly_billing();
    });
    
    $('input[name="property[calcul_base]"]').change(function (){
        check_disabled();
    });
    
    $('#tax_type').change(function (){
        check_tax_fields ();
    });
    
    $('#late_payment').click(function (){
        check_late_payment_fields ();
    });
    
    $('#electricity').change(function (){
        check_electricity_fields ();
    });
    
    $('#water').change(function (){
        check_water_fields ();
    });
    
    $('.property_charg_cls').bind("click",function () {
        $('.modal-title').html('History of '+$(this).attr('data-title'));
        $('.modal-body2').load('<?php echo base_url('index.php/bms_property/getPropertyChargHistDetails/');?>'+$(this).attr('data-property')+'/'+$(this).attr('data-cat'),function(result){
    	    $('#myModal2').modal({show:true});
    	});
    });
    
    $('.property_prem_quit_cls').bind("click",function () {
        $('.modal-title').html('History of '+$(this).attr('data-title'));
        $('.modal-body2').load('<?php echo base_url('index.php/bms_property/getPropertyPremQuitHistDetails/');?>'+$(this).attr('data-property')+'/'+$(this).attr('data-cat'),function(result){
    	    $('#myModal2').modal({show:true});
    	});
    });
    
    $('.btn-remove-block').bind('click',function (){
       //$('#'+$(this).attr('data-value')).remove(); 
       $(this).parents('div.block_div_inner').remove();
    });
    
    $('.btn-add-block').click(function () {
        var bstr = '<div class="col-md-6 col-xs-12 block_div_inner" style="margin-top:'+($('.block_div_inner').length > 1 ? 15 : 25)+'px;"> <div class="input-group">'; 
        bstr += '<input class="form-control" name="blocks[block_name][]" type="text" placeholder="Enter Block / Street Name" maxlength="100" />';
        bstr += '<input type="hidden" name="blocks[block_id][]" value="" />' 
        bstr += '<span class="input-group-btn">'; 
        bstr += '<button class="btn btn-danger btn-remove-block" type="button">'; 
        bstr += '<span class="glyphicon glyphicon-minus"></span>'; 
        bstr += '</button>'; 
        bstr += '</span>'; 
        bstr += '</div></div>';
        $('.block_div').append(bstr);
        $('.btn-remove-block').unbind('click');
        $('.btn-remove-block').bind('click',function (){
           //$('#'+$(this).attr('data-value')).remove(); 
           $(this).parents('div.block_div_inner').remove();
        });
        
    });
    
    
    //$('#tot_sq_feet, #per_sq_feet, #tot_share_unit, #per_share_unit').number( true, 2 ); 
    
    /** Form validation */
    
    $( "#bms_frm" ).validate({
		rules: {
			"property[property_name]": "required",
			"property[property_type]": "required",
            "property[property_abbrev]": "required",
            "property[total_units]":"required",
            "property[property_under]":"required",
            "property[calcul_base]":"required"/*,
            "property[sinking_fund]":"required"*/
		},
		messages: {
			"property[property_name]": "Please enter Property Name",
			"property[property_type]": "Please select Property Type",
            "property[property_abbrev]": "Please enter Property Abbreviation",
            "property[total_units]":"Please enter Total Units",
            "property[property_under]":"Please select Property Under",
            "property[calcul_base]":"Please select Caculation based on"/*,
            "property[sinking_fund]":"Please enter Sinking Fund %"*/
		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );

			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else if ( element.prop( "type" ) === "radio" ) {
				error.insertAfter( element.parent( "label" ).parent('div') );
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
    
    $('.reset_btn').click(function () {
        //console.log('reset clicked');
        $('input[type=file]').val('');
        $('#upload-file-info').html('');        
    });
             
});

function check_disabled () {
    if($('input[name="property[calcul_base]"]:checked').val() == 1) {
        $('#tot_sq_feet').removeAttr('disabled');
        $('#per_sq_feet').removeAttr('disabled');
        $('#tot_share_unit').attr('disabled','disabled').val('');
        $('#per_share_unit').attr('disabled','disabled').val('');
    } else if($('input[name="property[calcul_base]"]:checked').val() == 2) {
        $('#tot_share_unit').removeAttr('disabled');
        $('#per_share_unit').removeAttr('disabled');
        $('#tot_sq_feet').attr('disabled','disabled').val('');
        $('#per_sq_feet').attr('disabled','disabled').val('');
    } else {
        $('#monthly_billing').removeAttr('readonly');
        $('#tot_share_unit').removeAttr('disabled');
        $('#per_share_unit').removeAttr('disabled');
        $('#tot_sq_feet').removeAttr('disabled');
        $('#per_sq_feet').removeAttr('disabled');
    }
} 

function check_tax_fields () {
    if($('#tax_type').val() == 1 || $('#tax_type').val() == 2 ) {
        $('#tax_percentage').removeAttr('disabled');
        $('#tax_effect_from').removeAttr('disabled');
    }  else {
        $('#tax_percentage').val('');
        $('#tax_effect_from').val('');
        $('#tax_percentage').attr('disabled','disabled');
        $('#tax_effect_from').attr('disabled','disabled');
    }
}

function check_late_payment_fields () {
    if($('#late_payment').is(":checked") ) {
        $('#late_pay_percent').removeAttr('disabled');
        $('#late_pay_grace').removeAttr('disabled');
    }  else {
        $('#late_pay_percent').val('');
        $('#late_pay_grace').val('');
        $('#late_pay_percent').attr('disabled','disabled');
        $('#late_pay_grace').attr('disabled','disabled');
    }
}

function check_electricity_fields () {
    if($('#electricity').is(":checked") ) {
        $('#electricity_min_charg').removeAttr('disabled');
        $('#electricity_charge_per_unit').removeAttr('disabled');
    }  else {
        $('#electricity_min_charg').val('');
        $('#electricity_charge_per_unit').val('');
        $('#electricity_min_charg').attr('disabled','disabled');
        $('#electricity_charge_per_unit').attr('disabled','disabled');
    }
}

function check_water_fields () {
    if($('#water').is(":checked") ) {
        $('#water_min_charg').removeAttr('disabled');
        $('#water_charge_per_unit').removeAttr('disabled');
    }  else {
        $('#water_min_charg').val('');
        $('#water_charge_per_unit').val('');
        $('#water_min_charg').attr('disabled','disabled');
        $('#water_charge_per_unit').attr('disabled','disabled');
    }
}

function check_monthly_billing () {
    //monthly_billing #tot_sq_feet, #per_sq_feet, #tot_share_unit, #per_share_unit
    //console.log($('input[name="property[calcul_base]"]:checked').val());
    if($('input[name="property[calcul_base]"]:checked').val() == 1 || $('input[name="property[calcul_base]"]:checked').val() == 2) {
        $('#sinking_fund').val($('#sinking_fund').val().replace(/^\s+|\s+$/g,""));
        if($('#sinking_fund').val() == '') {
            alert('Please enter Sinking Fund %'); $('#sinking_fund').focus(); return false;
        }
        
        $('#tot_sq_feet').val($('#tot_sq_feet').val().replace(/^\s+|\s+$/g,""));
        $('#per_sq_feet').val($('#per_sq_feet').val().replace(/^\s+|\s+$/g,""));
        $('#tot_share_unit').val($('#tot_share_unit').val().replace(/^\s+|\s+$/g,""));
        $('#per_share_unit').val($('#per_share_unit').val().replace(/^\s+|\s+$/g,""));
        if($('#tot_sq_feet').val() != '' && $('#per_sq_feet').val() != '' && $('#per_sq_feet').val() != 0) {
            var mon_bill = eval($('#tot_sq_feet').val())*eval($('#per_sq_feet').val());
            mon_bill = mon_bill + (mon_bill*eval($('#sinking_fund').val())/100);
            $('#monthly_billing').val(mon_bill.toFixed(2) );
            $('#monthly_billing').attr('readonly','true');
            $('#tot_share_unit').attr('disabled','disabled');
            $('#per_share_unit').attr('disabled','disabled');
        } else if($('#tot_share_unit').val() != '' && $('#per_share_unit').val() != '' && $('#per_share_unit').val() != 0) {
            var mon_bill = eval($('#tot_share_unit').val())*eval($('#per_share_unit').val());
            mon_bill = mon_bill + (mon_bill*eval($('#sinking_fund').val())/100);
            $('#monthly_billing').val(mon_bill.toFixed(2));
            $('#monthly_billing').attr('readonly','true');
            $('#tot_sq_feet').attr('disabled','disabled');
            $('#per_sq_feet').attr('disabled','disabled');
            //console.log('else if');
        } else { //
            $('#monthly_billing').attr('readonly','true');
            if($('input[name="property[calcul_base]"]:checked').val() == 1) {
                $('#tot_sq_feet').removeAttr('disabled');
                $('#per_sq_feet').removeAttr('disabled');
                $('#tot_share_unit').attr('disabled','disabled');
                $('#per_share_unit').attr('disabled','disabled');
                
            } else if($('input[name="property[calcul_base]"]:checked').val() == 2) {
                $('#tot_share_unit').removeAttr('disabled');
                $('#per_share_unit').removeAttr('disabled');
                $('#tot_sq_feet').attr('disabled','disabled');
                $('#per_sq_feet').attr('disabled','disabled');
            }
            
            
        } 
    } else { //$('input[name="property[calcul_base]"]:checked').val() == 1
            $('#monthly_billing').removeAttr('readonly');
            $('#tot_share_unit').removeAttr('disabled');
            $('#per_share_unit').removeAttr('disabled');
            $('#tot_sq_feet').removeAttr('disabled');
            $('#per_sq_feet').removeAttr('disabled');
        }
    
    
    //console.log('monthly billing '+$('#monthly_billing').val()+' tot_sq_feet- '+$('#tot_sq_feet').val()+' per_sq_feet- '+$('#per_sq_feet').val()+' tot_share_unit- '+$('#tot_share_unit').val()+' per_share_unit- '+$('#per_share_unit').val() );
}

check_disabled();
check_monthly_billing ();
check_tax_fields ();
check_late_payment_fields ();
check_electricity_fields ();
check_water_fields ();

$(function () {
//Date picker
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        'minDate': new Date()
    });
    
});
</script>