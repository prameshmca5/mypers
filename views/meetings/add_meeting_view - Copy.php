<?php $this->load->view('header');?>
<?php $this->load->view('sidebar');?>
  
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Bootstrap time Picker -->
<link rel="stylesheet" href="<?php echo base_url();?>plugins/timepicker/bootstrap-timepicker.min.css">  
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
    <?php if(isset($_SESSION['flash_msg']) && trim( $_SESSION['flash_msg'] ) != '') {
                    //if($_GET['login_err'] == 'invalid')
                    echo '<div class="alert alert-success msg_notification"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>';
                    echo '</strong>'.$_SESSION['flash_msg'].'</div>';
                    unset($_SESSION['flash_msg']);
                }
                
            ?>
        <form role="form" id="bms_frm" action="<?php echo base_url('index.php/bms_unit_setup/add_unit_submit');?>" method="post" enctype="multipart/form-data">
      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        
        <div class="row">
        
            <div class="col-md-12 col-xs-12">
                <div class="box box-primary">
                
                    <!--div class="box-header with-border" style="padding-left:15px ;">
                      <h3 class="box-title"><b>Meeting Details</b></h3>
                    </div-->
                    
                    <div class="box-body">
                    <div class="col-md-12 col-sm-6 col-xs-12 no-padding">
                        <div class="col-md-6 col-sm-12 col-xs-12 ">
                            
                            <div class="form-group">
                              <label >Property Name *</label>
                                <select class="form-control" id="property_id" name="meetings[property_id]">
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
                                <input type="hidden" id="meeting_id" name="meeting_id" value="<?php echo 0;?>"/>
                            </div>
                           
                        </div>  
                        
                        <div class="col-md-6 col-sm-12 col-xs-12 ">
                            
                            <div class="form-group">
                              <label >Meeting Description *</label>
                                <input type="text" name="meetings[meeting_descrip]" class="form-control" value="<?php echo isset($asset_info['meeting_descrip']) && $asset_info['meeting_descrip'] != '' ? $asset_info['meeting_descrip'] : '';?>" placeholder="Enter Meeting Description" maxlength="250">                                
                            </div>
                           
                        </div>                           
                    </div>
                    
                    <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                        
                        <div class="col-md-6 col-sm-12 col-xs-12 ">
                            
                            <div class="form-group">
                              <label >Venue *</label>
                                <input type="text" name="meetings[meeting_venue]" class="form-control" value="<?php echo isset($asset_info['venue']) && $asset_info['venue'] != '' ? $asset_info['venue'] : '';?>" placeholder="Enter Venue" maxlength="200">
                            </div>
                           
                        </div> 
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                            
                            <div class="form-group">
                              <label >Date *</label>
                                
                              <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input class="form-control pull-right datepicker" name="meetings[meeting_date]" value="<?php echo isset($agm_main['agm_date']) && $agm_main['agm_date'] != '' && $agm_main['agm_date'] != '0000-00-00' && $agm_main['agm_date'] != '1970-01-01' ? date('d-m-Y', strtotime($agm_main['agm_date'])) : '';?>" type="text">
                                    </div>                                
                            </div>
                           
                        </div> 
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                            
                           
                            
                            <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                      <label>Time *</label>
                                      <div class="input-group">
                                        <input type="text" name="meetings[meeting_time]" value="<?php echo isset($val['execute_time']) && $val['execute_time'] != '' ? date('h:i A', strtotime($val['execute_time'])) : '';?>" class="form-control timepicker">
                    
                                        <div class="input-group-addon">
                                          <i class="fa fa-clock-o"></i>
                                        </div>
                                      </div><!-- /.input group -->
                                      
                                    </div><!-- /.form group -->
                                </div>
                           
                        </div>                           
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 no-padding">
                        <div class="col-md-6 col-sm-12 col-xs-12 ">
                            
                            <div class="form-group">
                              <label >Agendas to be discussed *</label>
                              <textarea rows="5" class="form-control" name="meetings[agenda_to_discuss]" placeholder="Enter Agendas to be discussed"></textarea>
                                
                            </div>
                           
                        </div>  
                        
                        <div class="col-md-6 col-sm-12 col-xs-12 minor_task_div" style="display: none;">
                            
                            <div class="form-group">
                              <label >Agendas to be discussed from Minor Task</label>
                            	<div class="checkbox">
                            		<label>
                            			<input name="building_staff[]" value="1273" class="prop_chk" type="checkbox">
                            			NAGARAJAN PERUMAL - SENIOR SOFTWARE ENGINEER
                            		</label>
                            	</div>
                                
                            </div>
                           
                        </div>                           
                    </div>
                    
                    <!--div class="col-md-12 col-sm-12 col-xs-12 no-padding"></div-->
                    
                    <div class="col-md-12 col-sm-12 col-xs-12 no-padding extenal_attende_div" style="border: 2px solid #f4f4f4;border-radius: 5px;">
                        <div class="box-header with-border" style="padding-left:15px ;">
                          <h3 class="box-title"><b>Meeting Attendes</b></h3>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 staff_div" style="padding-bottom:15px;border-right: 2px solid #f4f4f4;">
                            <label class="with-border">Building Staffs</label>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12 jmb_mc_div" style="padding-bottom:15px;border-left: 2px solid #f4f4f4;left: -2px;">
                            <label class="with-border">JMB / MC Members</label>
                        </div>
                        
                        
                        <div class="col-md-12 col-sm-12 col-xs-12" style="border-top: 2px solid #f4f4f4;">
                            <label class="with-border">External(s)</label><br />
                        </div>   
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-3 col-sm-6 col-xs-12 " style="padding-left: 0;">                            
                                <div class="form-group">                                  
                                    <input type="text" name="meetings_attend_oth[name]" class="form-control" value="" placeholder="Enter Company/Person Name" maxlength="150">
                                </div>                               
                            </div> 
                            <div class="col-md-3 col-sm-6 col-xs-12 " style="padding-left: 0;">                            
                                <div class="form-group">                                  
                                    <input type="text" name="meetings_attend_oth[email_addr]" class="form-control" value="" placeholder="Enter Email Address" maxlength="150">
                                </div>                               
                            </div> 
                            <div class="col-md-3 col-sm-6 col-xs-12 " style="padding-left: 0;">                            
                                <div class="form-group">                                  
                                    <input type="text" name="meetings_attend_oth[contact_no]" class="form-control" value="" placeholder="Enter Contact No." maxlength="50">
                                </div>                               
                            </div> 
                            <div class="col-md-3 col-sm-6 col-xs-12 " style="padding-left: 0;">                            
                                 <div class="input-group">                           
                                    <input type="text" name="meetings_attend_oth[person_name]" class="form-control" value="" placeholder="Enter Contact Person Name" maxlength="150">
                                    <span class="input-group-btn" style="left: 15px;">
                                        <button class="btn btn-success btn-add-other" type="button">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </span>  
                                   </div>    
                            </div> 
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-md-12 meeting_chk_list_div_<?php echo $agm_cnt =0;?>" style="margin: 10px 0 15px 0; padding: 5px;border: 1px solid #999;border-radius: 5px;">
                        
                      
                        <div class="row add_reminder_bottom" style="padding-top: 15px;">
                            <div class="col-md-12 col-xs-12">
                            
                                <div class="col-md-6 col-xs-6">
                                    <div class="form-group">
                                        <label >Meeting Checklist</label>
                                        <input type="text" name="agm[agm_descrip][<?php echo $agm_cnt;?>]" class="form-control" value="<?php echo !empty($val['agm_descrip']) ? $val['agm_descrip'] : '';?>" placeholder="Enter Meeting Checklist" maxlength="250">
                                        <input type="hidden" name="agm[agm_checklist_id][<?php echo $agm_cnt;?>]" value="<?php echo !empty($val['agm_checklist_id']) ? $val['agm_checklist_id'] : '';?>"/>                                                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Role Responsibility</label>                            
                                            <select class="form-control role_resposibility" name="agm[agm_responsibility][<?php echo $agm_cnt;?>]" >                              
                                            <option value="">Select</option>
                                            <?php 
                                                foreach ($designations as $key2=>$val2) {                                        
                                                    $selected = !empty($val['agm_responsibility']) && $val['agm_responsibility'] == $val2['desi_id'] ? 'selected="selected" ' : '';
                                                    echo "<option value='".$val2['desi_id']."' ".$selected.">".$val2['desi_name']."</option>";
                                                } ?> 
                                              </select>
                                          </div>
                                    </div> 
                                </div>                         
                                
                                
                                <?php 
                                
                                if(!empty($chk_list_reminder[$key])) {
                                
                                    foreach ($chk_list_reminder[$key] as $key4=>$val4) { ?>
                                    
                                        <div class="col-md-12 col-xs-12 reminder_div_<?php echo $agm_cnt;?>_<?php echo $key4;?>">
                                        <div class="col-md-5 col-xs-5">
                                            <div class="form-group">
                                                <label >Reminder</label>
                                                <select name="agm_reminder[<?php echo $agm_cnt;?>][remind_before][<?php echo $key4;?>]" class="form-control">
                                                    <option value="">Select</option>   
                                                    <?php                                                
                                                        
                                                        foreach ($agm_remin as $key3=>$val3) { 
                                                            $selected = !empty($val4['remind_before']) && $val4['remind_before'] == $key3 ? 'selected="selected" ' : '';  
                                                            echo "<option value='".$key3."' ".$selected.">".$val3."</option>";
                                                        }
                                                    ?>                             
                                                </select>
                                                <input type="hidden" name="agm_reminder[<?php echo $agm_cnt;?>][agm_checklist_reminder_id][<?php echo $key4;?>]" value="<?php echo !empty($val4['agm_checklist_reminder_id']) ? $val4['agm_checklist_reminder_id'] : '';?>"/> 
                                                <input type="hidden" name="agm_reminder[<?php echo $agm_cnt;?>][agm_checklist_id][<?php echo $key4;?>]" value="<?php echo !empty($val4['agm_checklist_id']) ? $val4['agm_checklist_id'] : '';?>"/>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6 col-xs-12">
                                            <div class="col-md-12 col-xs-12 no-padding">
                                                <div class="col-md-6 col-xs-6 no-padding">
                                                    <label>Reminder Email</label>
                                                </div>
                                                <div class="col-md-2 col-xs-3 no-padding">                                            
                                                      <div class="checkbox" style="margin: 0;font-weight:bold;">
                                                        <label style="font-weight:bold;">
                                                            <input name="agm_reminder[<?php echo $agm_cnt;?>][email_staff][<?php echo $key4;?>]" value="1" type="checkbox" <?php echo !empty($val4['email_staff']) && $val4['email_staff'] == 1 ? 'checked="checked" ' : '';?> > Staff 
                                                        </label>
                                                      </div>
                                                </div>
                                                <div class="col-md-2 col-xs-3 no-padding">                                            
                                                      <div class="checkbox" style="margin: 0;">
                                                        <label style="font-weight:bold;"><input name="agm_reminder[<?php echo $agm_cnt;?>][email_jmb][<?php echo $key4;?>]" value="1" type="checkbox" <?php echo !empty($val4['email_jmb']) && $val4['email_jmb'] == 1 ? 'checked="checked" ' : '';?> > JMB / MC </label>
                                                      </div> 
                                                </div>
                                                <div class="col-md-2 col-xs-3 no-padding">                                            
                                                      <div class="checkbox" style="margin: 0;">
                                                        <label style="font-weight:bold;"><input name="agm_reminder[<?php echo $agm_cnt;?>][email_external][<?php echo $key4;?>]" value="1" type="checkbox" <?php echo !empty($val4['email_external']) && $val4['email_external'] == 1 ? 'checked="checked" ' : '';?> > External </label>
                                                      </div> 
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xs-12 no-padding">
                                                <div class="form-group">                                      
                                                  <textarea name="agm_reminder[<?php echo $agm_cnt;?>][email_content][<?php echo $key4;?>]" class="form-control" rows="3" placeholder="Enter Reminder Email"><?php echo !empty($val4['email_content']) ? $val4['email_content'] : '';?></textarea>
                                                </div>
                                            </div>                                    
                                        </div>
                                        <?php if($key4 == 0) { ?>
                                            <div class="col-md-1 col-xs-1" style="padding-top: 50px;" >
                                                <a href="javascript:;" class="btn btn-success btn-circle add_reminder_btn" data-parent="<?php echo $agm_cnt;?>" data-value="<?php echo count($chk_list_reminder[$key])-1;?>" ><i class="fa fa-plus"></i></a>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-md-1 col-xs-1" style="padding-top: 50px;" >
                                                <a href="javascript:;" class="btn btn-danger btn-circle del_reminder_btn" data-parent="<?php echo $agm_cnt;?>" data-value="<?php echo $key4;?>" ><i class="fa fa-minus"></i></a>
                                            </div>
                                            
                                        <?php } ?>
                                    </div>
                                        
                                   <?php  }
                                        
                                } else { ?>
                                
                                <div class="col-md-12 col-xs-12 reminder_div_<?php echo $agm_cnt;?>_0">
                                    <div class="col-md-5 col-xs-5">
                                        <div class="form-group">
                                            <label >Reminder</label>
                                            <select name="agm_reminder[<?php echo $agm_cnt;?>][remind_before][0]" class="form-control">
                                                <option value="">Select</option>   
                                                <?php                                                
                                                    
                                                    foreach ($meeting_remin as $key3=>$val3) { 
                                                        echo "<option value='".$key3."'>".$val3."</option>";
                                                    }
                                                ?>                             
                                            </select> 
                                            
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6 col-xs-12">
                                        <div class="col-md-12 col-xs-12 no-padding">
                                            <div class="col-md-3 col-xs-6 no-padding">
                                                <label>Reminder Email</label>
                                            </div>
                                            <div class="col-md-3 col-xs-2 no-padding text-right">                                            
                                                  <div class="checkbox" style="margin: 0;font-weight:bold;">
                                                    <label style="font-weight:bold;"><input name="agm_reminder[<?php echo $agm_cnt;?>][email_staff][0]" value="1" type="checkbox"  > Staff </label>
                                                  </div>
                                            </div>
                                            <div class="col-md-3 col-xs-2 no-padding text-right">                                            
                                                  <div class="checkbox" style="margin: 0;">
                                                    <label style="font-weight:bold;"><input name="agm_reminder[<?php echo $agm_cnt;?>][email_jmb][0]" value="1" type="checkbox"  > JMB / MC </label>
                                                  </div> 
                                            </div>
                                            <div class="col-md-3 col-xs-2 no-padding text-right">                                            
                                                  <div class="checkbox" style="margin: 0;">
                                                    <label style="font-weight:bold;"><input name="agm_reminder[<?php echo $agm_cnt;?>][email_external][0]" value="1" type="checkbox" > External </label>
                                                  </div> 
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xs-12 no-padding">
                                            <div class="form-group">                                      
                                              <textarea name="agm_reminder[<?php echo $agm_cnt;?>][email_content][0]" class="form-control" rows="3" placeholder="Enter Reminder Email"></textarea>
                                            </div>
                                        </div>                                    
                                    </div>
                                    
                                    <div class="col-md-1 col-xs-1" style="padding-top: 50px;" >
                                        <a href="javascript:;" class="btn btn-success btn-circle add_reminder_btn" data-parent="<?php echo $agm_cnt;?>" data-value="0" ><i class="fa fa-plus"></i></a>
                                    </div>
                                
                                </div>                        
                                  
                                 <?php } ?> 
                                
                                                        
                                              
                        
                        </div> <!-- /.row -->
                        
                        <!--div class="col-md-12 text-right"><button type="button" class="btn btn-danger del_agm_btn" value="0" data-value="<?php echo $agm_cnt;?>" aria-invalid="false">Delete AGM Checklist</button></div-->
                        
                        
                    </div> <!-- /.col-md-12 -->
                    
                    
                    <div class="col-md-12 add_agm_before_div" style="padding-right:0">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-success add_agm_btn" id="add_agm_btn" value="0" data-value="<?php echo $agm_cnt;?>" aria-invalid="false">Add Meeting Checklist</button>
                    </div>
               
                </div>
                    
                             
                    <div class="col-md-12 no-padding text-right">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button> &ensp;&ensp;
                            <button type="Reset" class="btn btn-default reset_btn" >Reset</button> &ensp;&ensp;                        
                        </div>
                    </div>                               
                    
                    </div><!-- /.box-body -->   
                 
                 </div><!-- /.box-primary -->  
                  
            
            </div>
            
        </div><!-- /.row --> 
        
        </form>  
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
<?php $this->load->view('footer');?>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url();?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- overlay loader for ajax call -->
<script src="<?php echo base_url();?>assets/js/loadingoverlay.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>

<script>
var meeting_remin = $.parseJSON('<?php echo json_encode($meeting_remin)?>');
var designations = $.parseJSON('<?php echo !empty($designations) ? json_encode($designations) : json_encode(array());?>');

$(document).ready(function () { 
    
    $('.msg_notification').fadeOut(5000);
    
    /** Form validation */   
    $( "#bms_frm" ).validate({
		rules: {
			"meetings[property_id]": "required",
            "meetings[meeting_descrip]": "required",
            "meetings[meeting_venue]": "required",
            "meetings[meeting_date]": "required",
            "meetings[meeting_time]": "required",
            "meetings[agenda_to_discuss]": "required"            
		},
		messages: {
			"meetings[property_id]": "Please select Property Name",
            "meetings[meeting_descrip]": "Please enter Meeting Description ",
            "meetings[meeting_venue]": "Please enter Venue",
            "meetings[meeting_date]": "Please select Date",
            "meetings[meeting_time]": "Please select Time",
            "meetings[agenda_to_discuss]": "Please enter Agendas to be discussed"            
		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );

			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else if ( element.hasClass( "datepicker" ) ) {
				error.insertAfter( element.parent( "div" ) );
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
        if($('#property_id').val() != '') {
            loadAttendes ('');
        }
        
    });
    
    $('.btn-add-other').click(function () {
        addExtenalAttende ();    
    });
        
    $('.btn-remov-other').bind('click',function (){
       $(this).parents('div.more_extenal_attende').remove(); 
    });
             
});

function loadAttendes () {
    
    $.ajax({
            type:"post",
            async: true,
            url: '<?php echo base_url('index.php/bms_meetings/attendes_list');?>',
            data: {'property_id':$('#property_id').val()},
            datatype:"json", // others: xml, json; default is html

            beforeSend:function (){ $("#content_area").LoadingOverlay("show");  }, //
            success: function(data) {  
                console.log(data);
                var sstr = '';
                var jstr = '';
                var mt_str = '';
                var desi_str = '';
                if(data.staff.length > 0) { 
                    sstr = '<label class="with-border">Building Staffs</label>';
                    $.each(data.staff,function (i, item) {
                        //var selected = block_id != '' && block_id == item.block_id ? 'selected="selected"' : '';
                        //str += '<option value="'+item.block_id+'" >'+item.block_name+'</option>';
                        sstr += '<div class="form-group">';
                        sstr += '<div class="checkbox">';
                        sstr += '<label><input name="building_staff[]" value="'+item.staff_id+'" type="checkbox" class="prop_chk"> '+item.first_name+' '+item.last_name+' - '+item.desi_name+'  </label>';
                        sstr += '</div>';
                        sstr += '</div>';
                        
                    });
                }
                if(data.jmb.length > 0) {  
                    jstr = '<label class="with-border">JMB / MC Members</label>';
                    $.each(data.jmb,function (i, item) {
                        //var selected = block_id != '' && block_id == item.block_id ? 'selected="selected"' : '';
                        //str += '<option value="'+item.block_id+'" >'+item.block_name+'</option>';
                        jstr += '<div class="form-group">';
                        jstr += '<div class="checkbox">';
                        jstr += '<label><input name="jmb_member[]" value="'+item.member_id+'" type="checkbox" class="prop_chk"> '+item.first_name+ ' - '+item.jmb_desi_name+'  </label>';
                        jstr += '</div>';
                        jstr += '</div>';
                        
                    });
                }
                if(data.minot_task.length > 0) {  
                    mt_str = '<label >Agendas to be discussed from Minor Task</label>';
                    $.each(data.minot_task,function (i, item) {
                        //var selected = block_id != '' && block_id == item.block_id ? 'selected="selected"' : '';
                        //str += '<option value="'+item.block_id+'" >'+item.block_name+'</option>';
                        mt_str += '<div class="form-group">';
                        mt_str += '<div class="checkbox">';
                        mt_str += '<label><input name="minor_task[]" value="'+item.task_id+'" type="checkbox" class="prop_chk"> '+item.task_name+ ' </label>';
                        mt_str += '</div>';
                        mt_str += '</div>';
                        
                    });
                    $('.minor_task_div').css('display','block');
                } else {
                    $('.minor_task_div').css('display','none');
                }
                desi_str = '<option value="">Select</option>';
                designations = data.designations;
                if(designations.length > 0) { 
                    
                    $.each(data.designations,function (i, item) {
                        desi_str += '<option value="'+item.desi_id+'">'+item.desi_name+'</option>';
                    });
                } 
                
                //role_resposibility
                
                $('.staff_div').html(sstr);
                $('.jmb_mc_div').html(jstr);
                $('.minor_task_div').html(mt_str);
                $('.role_resposibility').html(desi_str);
                $("#content_area").LoadingOverlay("hide", true);
                
            },
            error: function (e) {
                $("#content_area").LoadingOverlay("hide", true);              
                console.log(e); //alert("Something went wrong. Unable to retrive data!");
            }
        });
}

function addExtenalAttende () {
    var str  = '<div class="col-md-12 col-sm-12 col-xs-12 more_extenal_attende">';
    str += '<div class="col-md-3 col-sm-6 col-xs-12 " style="padding-left: 0;">';
    str += '<div class="form-group">';
    str += '<input type="text" name="meetings_attend_oth[name]" class="form-control" value="" placeholder="Enter Company/Person Name" maxlength="150">';
    str += '</div>';
    str += '</div>';
    str += '<div class="col-md-3 col-sm-6 col-xs-12 " style="padding-left: 0;">';
    str += '<div class="form-group">';
    str += '<input type="text" name="meetings_attend_oth[email_addr]" class="form-control" value="" placeholder="Enter Email Address" maxlength="150">';
    str += '</div>';
    str += '</div>';
    str += '<div class="col-md-3 col-sm-6 col-xs-12 " style="padding-left: 0;">';
    str += '<div class="form-group">';
    str += '<input type="text" name="meetings_attend_oth[contact_no]" class="form-control" value="" placeholder="Enter Contact No." maxlength="50">';
    str += '</div>';
    str += '</div>';
    str += '<div class="col-md-3 col-sm-6 col-xs-12 " style="padding-left: 0;">';
    str += '<div class="input-group">';
    str += '<input type="text" name="meetings_attend_oth[person_name]" class="form-control" value="" placeholder="Enter Contact Person Name" maxlength="150">';
    str += '<span class="input-group-btn" style="left: 15px;">';
    str += '<button class="btn btn-danger btn-remov-other" type="button">';
    str += '<span class="glyphicon glyphicon-minus"></span>';
    str += '</button>';
    str += '</span>';
    str += '</div>';
    str += '</div>';
    str += '</div>';
    
    $('.extenal_attende_div').append(str);
    $('.btn-remov-other').unbind('click');
    $('.btn-remov-other').bind('click',function (){
       $(this).parents('div.more_extenal_attende').remove(); 
    }); 
    //more_extenal_attende
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
    
});
</script>