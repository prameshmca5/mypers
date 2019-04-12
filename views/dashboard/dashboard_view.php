<?php $this->load->view('header');?>
<?php $this->load->view('sidebar');?>
  
<style>

.info_div > label { margin-bottom: 0px; }
#minorTaskTabs > li {background-color: #9A9A9A; margin:0 3px; border-top-left-radius: 10px;border-top-right-radius: 10px;  }
#minorTaskTabs > li:first-child { margin-left:0px;  }
#minorTaskTabs > li.active > a, #minorTaskTabs > li:hover > a {    background-color: #656565 !important;    }
#minorTaskTabs > li > a { color:#FFF; border: none; }

.tab-content { background-color: #C9C9CA;padding:10px; border-bottom-left-radius: 10px;border-bottom-right-radius: 10px; border-top-right-radius: 10px;}
.tab-content > div { background-color: #FFF;padding:5px;}

.collec_row > div {  padding:0 5px; margin:10px 0; border-right: 0px solid #ADB2B5; }
.border-none { border-right:none !important; }

.payment_type_color { color:#FFF; background-color: #3F48CC  !important; padding: 5px; border-radius: 10px; }
.payment_type_color_oth { color:#FFF; background-color: #3F48CC  !important; padding: 10px; border-radius: 10px; }
.payment_mode_color { color:#FFF; background-color: #00A2E8 !important; padding: 5px; border-radius: 10px; }
.payment_mode_color_oth { color:#FFF; background-color: #00A2E8 !important; padding: 10px; border-radius: 10px; }
.payment_tot_color { color:#FFF; background-color: #dd4b39 !important; padding: 10px; border-radius: 10px; }

.payment_end_color { color:#FFF; background-color: #F39C12 !important; padding: 10px; border-radius: 10px; }
 
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--section class="content-header">
      <h1>
        <?php echo isset($page_header) && $page_header != '' ? $page_header : ''; ?>
        
      </h1>
      
    </section-->

    <!-- Main content -->
    <section class="content container-fluid cust-container-fluid">
        <?php if($property_id) { ?>
        <div class="row">
                  
            <div class="col-md-4 col-xs-6">
                <select class="form-control" id="property_id" name="property_id">
                    <?php if($_SESSION['bms']['user_type'] == 'staff') { ?>
                    <option value="">Select Property</option>
                    <?php } ?>
                    <?php 
                        foreach ($properties as $key=>$val) { 
                            $selected = isset($property_id) && trim($property_id) != '' && trim($property_id) == $val['property_id'] ? 'selected="selected" ' : '';  
                            echo "<option value='".$val['property_id']."' ".$selected." data-value='".$val['total_units']."'>".$val['property_name']."</option>";
                        } ?> 
                </select>
            </div>
        </div>
        
        <div class="row" style="margin-top: 15px;">    
            <div class="col-md-12 col-xs-12">
               <div class="col-md-12 no-padding text-center" style="background-color: #C3C3C3;border-top-left-radius:7px;border-top-right-radius:7px;">
                    <b>Notice Board</b>
                </div>
                
                <div class="col-md-12" style="min-height:50px;padding:10px;background-color: #FFF;border:5px solid #C3C3C3;border-bottom-left-radius:7px;border-bottom-right-radius:7px;">
                 <?php 
                    if($_SESSION['bms']['user_type'] == 'staff') {  
                        echo !empty($notice_board['message']) ? $notice_board['message'] : ''; 
                    } else if($_SESSION['bms']['user_type'] == 'jmb') { 
                        if(!empty ($notice_board)) {
                            foreach ($notice_board as $key=>$val) {  
                                echo "<h4 style='font-weight:bold;'>". $val['notice_title'] . ' [ '. date('d-m-Y',strtotime($val['start_date'])) . ' - ' . date('d-m-Y',strtotime($val['end_date'])). ' ]</h4>';
                                echo !empty($val['message']) ? nl2br($val['message']) ."<br />" : '';
                            }
                        } else {
                        echo 'No Notice!';
                       }  
                    } else {
                        echo 'No Notice!';
                   } ?>
               </div>
            </div>
            
        </div>
        
        <div class="row" style="margin-top: 15px;">
            
            <div class="col-md-12" >
                <div class="col-md-6 col-xs-12 " style="padding: 0;"  >
                    <div class="col-md-12 col-sm-12 col-xs-12 no-padding left-box" style="border: 1px solid #999;border-radius: 10px;">
                        <div class="col-md-12">  
                        <?php if(!empty($property_info['jmb_mc_name']) || !empty($property_info['address_1'])) { ?>
                            <div style="padding:10px 0px;line-height: 12px;line-height: 1.3;">
                                <?php if(!empty($property_info['jmb_mc_name'])) { ?>
                                <label><?php echo $property_info['jmb_mc_name'];?> </label> <br />
                                <?php } ?>
                                <?php if(!empty($property_info['address_1'])) { ?>
                                <?php echo $property_info['address_1'];?>  <br />
                                <?php } ?>
                                <?php if(!empty($property_info['address_2'])) { ?>
                                <?php echo $property_info['address_2'];?>  <br />
                                <?php } ?>
                                <?php if(!empty($property_info['pin_code'])) { ?>
                                <?php echo $property_info['pin_code'];?>, 
                                <?php } ?>
                                <?php if(!empty($property_info['city'])) { ?>
                                <?php echo $property_info['city'];?>, 
                                <?php } ?>
                                <?php if(!empty($property_info['state_name'])) { ?>
                                <?php echo $property_info['state_name'];?>
                                <?php } ?>
                            </div>  
                            <?php } ?>
                            <div class="info_div" style="padding:10px 0px;">
                                <label>Phone : </label> <?php echo !empty($property_info['phone_no']) ? $property_info['phone_no'] : '-'; ?><br />
                                <label>Fax : </label> <?php echo !empty($property_info['fax']) ? $property_info['fax'] : '-'; ?><br />
                                <label>Email : </label> <?php echo !empty($property_info['email_addr']) ? $property_info['email_addr'] : '-'; ?>
                            </div>
                        </div>
                        <div class="col-md-12"  style="padding:10px 15px;">    
                            <?php foreach ($staff_info as $sKey => $sVal) {
                                echo "<div><label>".$sVal['first_name'].(!empty($sVal['last_name']) ? ' '.$sVal['last_name'] : '')." </label> - ".$sVal['desi_name'].(!empty($sVal['mobile_no']) ? ' ('.$sVal['mobile_no'] .')': '').'</div>';
                            } ?>
                        </div>
                    </div>
                    
                    
                </div>
                <?php if($_SESSION['bms']['user_type'] == 'staff') { ?>
                <div class="col-md-6 col-xs-12" style="padding-left: 10px !important;padding-right: 0;" >
                    <div class="col-md-12 col-sm-12 col-xs-12  right-box1" style="border: 1px solid #999;border-radius: 10px;">
                        <div><h5 style="font-weight: bold;"><span style="border-bottom: 1px solid #333;"> Staff Of the Month(<?php echo date('F', strtotime(date('F') . " last month")). ' - '.$awarded_year ; ?>) </span></h5></div>
                        
                        <?php 
                          $staff_award_cat = $this->config->item('staff_award_category'); 
                          foreach ($staff_award_cat as $aKey=>$aVal) { ?>      
                            <div class="col-md-12 col-xs-12 no-padding">
                                <div class="form-group" style="margin-bottom: 15px;">
                                  <label style="margin-bottom: 0px;"><?php echo $aVal;?> : </label>
                                    <?php if(!empty($awarded_staff)) {
                                        $staff_found = false;
                                        foreach ($awarded_staff as $awardKey=>$awardVal) {
                                            if($awardVal['awarded_cat'] == $aKey) {
                                                $staff_found = true;
                                                echo "<br />".$awardVal['first_name'].($awardVal['last_name'] ? ' '.$awardVal['last_name'] : '').'<br />['.$awardVal['desi_name'].' @ '.$awardVal['property_name'].']';
                                            }
                                        }
                                        if(!$staff_found) {
                                            echo ' - ';
                                        }
                                    } else {
                                        echo ' - ';
                                    } ?>
                                    
                                </div>
                            </div>
                            <?php } ?>
                            <?php if(!empty($awarded_staff)) { ?>
                        <div class="col-md-12 text-right"><a href="javascript:;" class="open_model_btn" style="color: #0C4E91;text-decoration: underline;">View all short listed names</a></div>
                        <?php } ?>
                    </div>      
                </div>
                <?php } ?>
                
            </div>
            
        
        </div>
        
        <div style="clear: both;"></div>
        <div class="row" style="padding-top: 15px !important;"> 
            <div class="col-md-12" >
                
                    <div class="col-md-12" style="border: 1px solid #999;border-radius: 10px;">
                        <div class="col-md-3">
                        <div style="color: #0C4E91;padding: 10px 5px;">Minor Task</div>
                        
                        <div style="padding:10px 0 10px 15px;">Open Task: &ensp; &nbsp;<a href="<?php echo base_url('index.php/bms_task/task_list').'?property_id='.$property_id.'&task_status=O';?>"><?php echo $open_task_count;?></a></div>
                        
                        <div style="padding:10px 0 10px 15px;">Closed Task: &nbsp;<a href="<?php echo base_url('index.php/bms_task/task_list').'?property_id='.$property_id.'&task_status=C';?>"><?php echo $closed_task_count;?></a></div>
                        <div style="padding:10px 0 10px 15px;">Total Task: &ensp; &nbsp;<a href="<?php echo base_url('index.php/bms_task/task_list').'?property_id='.$property_id.'&task_status=al';?>"><?php echo ($open_task_count+$closed_task_count);?></a></div>
                        
                        </div>
                        
                        <div class="col-md-9 no-padding">
                        
                            <div style="padding: 10px 5px;">
                            
                                <div id="tabs">
                                    <ul class="nav nav-tabs" id="minorTaskTabs">
                                        <li class="active"><a href="#tab_1" data-url="<?php echo base_url('index.php/bms_dashboard/minor_task_chart/daily/'.$property_id); ?>">Daily</a></li>
                                        <li><a href="#tab_2" data-url="<?php echo base_url('index.php/bms_dashboard/minor_task_chart/monthly/'.$property_id); ?>">Monthly</a></li>
                                        <li><a href="#tab_3" data-url="<?php echo base_url('index.php/bms_dashboard/minor_task_chart/yearly/'.$property_id); ?>">Yearly</a></li>
                                        
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab_1" class="tab-pane active"></div>
                                        <div id="tab_2" class="tab-pane active"></div>
                                        <div id="tab_3" class="tab-pane active"></div>
                                    </div>
                                </div>
                            
                            </div>
                            
                            
                            
                        
                        </div>
                    </div> 
                   
            </div>      
        
        
        </div>      
                
       <div style="clear: both;"></div>
      <?php //if($_SESSION['bms']['user_type'] == 'jmb' || ($_SESSION['bms']['user_type'] == 'staff' && in_array($_SESSION['bms']['designation_id'],$this->config->item('prop_doc_download_desi_id')))) { ?>
       <div class="row" style="padding: 15px 15px !important;">
       
        <div class="col-md-12 no-padding" style="border: 1px solid #999;border-radius: 10px;">
        
            <div class="box-header" style="padding-bottom: 0px;">
              <h3 class="box-title" style="font-weight: bold;">Today's Collections</h3>
            </div>
              <div class="box-body" >
              <div class="col-md-12 no-padding" style="border-radius: 10px;">
              <div class="col-md-12" style="padding: 5px 15px;">
                  <div class="col-md-4 text-center " style="font-weight:600;"><span class="payment_type_color">Payment Type</span></div>
                  <div class="col-md-7 text-center " style="font-weight:600;"><span class="payment_mode_color">Payment Mode</span></div>
                  <div class="col-md-1 text-center">&nbsp;</div>
              </div>
              <div class="col-md-6 no-padding collec_row">
              
              <div class="col-sm-3 col-xs-6">
                  <div class="description-block payment_type_color_oth border-right">
                    
                    <h5 class="description-header">RM <?php echo !empty($today_collec['sc_sf_collec']) ? number_format($today_collec['sc_sf_collec'],2) : '0';?></h5>
                    <span class="description-text ">SC/SF</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block payment_type_color_oth border-right">
                    
                    <h5 class="description-header">RM <?php echo !empty($today_collec['oth_char_collec']) ? number_format($today_collec['oth_char_collec'],2) : '0';?></h5>
                    <span class="description-text ">Other Charges</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block payment_type_color_oth border-right">
                    
                    <h5 class="description-header">RM <?php echo !empty($today_collec['deposit_collec']) ? number_format($today_collec['deposit_collec'],2) : '0';?></h5>
                    <span class="description-text ">Deposit </span>
                  </div>
                  <!-- /.description-block -->
                </div>
                
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block payment_mode_color_oth border-right">
                    
                    <h5 class="description-header">RM <?php echo !empty($today_collec['cheq_collec']) ? number_format($today_collec['cheq_collec'],2) : '0';?></h5>
                    <span class="description-text ">Cheque</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                
              </div>
              
              <div class="col-md-6 no-padding collec_row">
              
              <div class="col-sm-3 col-xs-6">
                  <div class="description-block payment_mode_color_oth border-right">
                    
                    <h5 class="description-header">RM <?php echo !empty($today_collec['cash_collec']) ? number_format($today_collec['cash_collec'],2) : '0';?></h5>
                    <span class="description-text ">Cash</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                
                <div class="col-sm-3 col-xs-6 ">
                  <div class="description-block payment_mode_color_oth border-right">
                    
                    <h5 class="description-header">RM <?php echo !empty($today_collec['ibg_collec']) ? number_format($today_collec['ibg_collec'],2) : '0';?></h5>
                    <span class="description-text payment_mode_color">IBG</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block payment_mode_color_oth border-right">
                    
                    <h5 class="description-header">RM <?php echo !empty($today_collec['cre_card_collec']) ? number_format($today_collec['cre_card_collec'],2) : '0';?></h5>
                    <span class="description-text">Credit Card</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                
                <div class="col-sm-3 col-xs-6 border-none">
                  <div class="description-block payment_tot_color border-right">
                    
                    <h5 class="description-header">RM <?php echo !empty($today_collec['total_collec']) ? number_format($today_collec['total_collec'],2) : '0';?></h5>
                    <span class="description-text">Total </span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              
              
              </div>  
        
              </div> <!-- /.box-body -->
       
       
            <div class="box-header" style="padding-bottom: 0px;">
              <h3 class="box-title" style="font-weight: bold;">Till Date Collections</h3>
            </div>
              <div class="box-body" >
                <div class="col-md-12 no-padding" style="border-radius: 10px;">
                
                    <div class="col-md-12" style="padding: 5px 15px;">
                      <div class="col-md-4 text-center " style="font-weight:600;"><span class="payment_type_color">Payment Type</span></div>
                      <div class="col-md-7 text-center " style="font-weight:600;"><span class="payment_mode_color">Payment Mode</span></div>
                      <div class="col-md-1 text-center">&nbsp;</div>
                  </div>
                  
                  <div class="col-md-6 no-padding collec_row">
                  
                  <div class="col-sm-3 col-xs-6">
                      <div class="description-block payment_type_color_oth border-right">
                        
                        <h5 class="description-header">RM <?php echo !empty($till_collec['sc_sf_collec']) ? number_format($till_collec['sc_sf_collec'],2) : '0';?></h5>
                        <span class="description-text ">SC/SF</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block payment_type_color_oth border-right">                        
                        <h5 class="description-header">RM <?php echo !empty($till_collec['oth_char_collec']) ? number_format($till_collec['oth_char_collec'],2) : '0';?></h5>
                        <span class="description-text ">Other Charges</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block payment_type_color_oth border-right">
                        
                        <h5 class="description-header">RM <?php echo !empty($till_collec['deposit_collec']) ? number_format($till_collec['deposit_collec'],2) : '0';?></h5>
                        <span class="description-text ">Deposit </span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block payment_mode_color_oth border-right">
                        
                        <h5 class="description-header">RM <?php echo !empty($till_collec['cheq_collec']) ? number_format($till_collec['cheq_collec'],2) : '0';?></h5>
                        <span class="description-text ">Cheque</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    
                  </div>
              
              <div class="col-md-6 no-padding collec_row">
              
              <div class="col-sm-3 col-xs-6">
                  <div class="description-block payment_mode_color_oth border-right">
                    
                    <h5 class="description-header">RM <?php echo !empty($till_collec['cash_collec']) ? number_format($till_collec['cash_collec'],2) : '0';?></h5>
                    <span class="description-text ">Cash</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block payment_mode_color_oth border-right">
                    
                    <h5 class="description-header">RM <?php echo !empty($till_collec['ibg_collec']) ? number_format($till_collec['ibg_collec'],2) : '0';?></h5>
                    <span class="description-text ">IBG</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block payment_mode_color_oth border-right">
                    
                    <h5 class="description-header">RM <?php echo !empty($till_collec['cre_card_collec']) ? number_format($till_collec['cre_card_collec'],2) : '0';?></h5>
                    <span class="description-text">Credit Card</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                
                <div class="col-sm-3 col-xs-6 border-none">
                  <div class="description-block payment_tot_color border-right">
                    
                    <h5 class="description-header">RM <?php echo !empty($till_collec['total_collec']) ? number_format($till_collec['total_collec'],2) : '0';?></h5>
                    <span class="description-text">Total </span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              
              </div>
        
              </div> <!-- /.box-body -->
              
              <div class="col-md-12 no-padding" style="padding-bottom: 15px !important;" >
                  <div class="col-md-12 no-padding" >
                  
                    <div class="col-sm-2 col-xs-4">
                      <div class="description-block payment_end_color border-right">
                        
                        <h5 class="description-header">RM <?php echo !empty($property_info['monthly_billing']) ? number_format($property_info['monthly_billing'],2) : '0';?></h5>
                        <span class="description-text">MONTHLY BILLING</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    
                    <div class="col-sm-3 col-xs-4">
                      <div class="description-block payment_end_color border-right">
                        
                        <h5 class="description-header">RM <?php echo !empty($till_collec['sc_sf_collec']) ? number_format($till_collec['sc_sf_collec'],2) : '0';?>
                      <?php if(!empty($property_info['monthly_billing']) && $property_info['monthly_billing'] > 0 && !empty($till_collec['sc_sf_collec']) && $till_collec['sc_sf_collec'] > 0) {
                            echo ' ('. round((($till_collec['sc_sf_collec'] * 100) / $property_info['monthly_billing']),2).'%)';
                      } ?></h5>
                        <span class="description-text">COLLECTED</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                  
                  </div>
               </div>   
              
              <!--div class="col-md-12 no-padding" >
                  <div class="col-md-12 no-padding" >
                      <div class="col-md-2 no-padding">
                      <div style="font-weight:600;padding: 10px 15px 5px 15px;">MONTHLY BILLING: </div>
                      </div>
                      <div class="col-md-2 no-padding">
                      <div style="color: #0C4E91;padding: 10px 15px 5px 15px;">RM <?php echo !empty($property_info['monthly_billing']) ? number_format($property_info['monthly_billing'],2) : '0';?>
                      </div>
                      </div>
                  </div>
                  <div class="col-md-12 no-padding" >
                      <div class="col-md-2 no-padding">
                      <div style="font-weight:600;padding: 5px 15px 15px 15px;">COLLECTED: </div>
                      </div>
                      <div class="col-md-2 no-padding">
                      <div style="color: #0C4E91;padding: 10px 15px 5px 15px;">
                      RM <?php echo !empty($till_collec['sc_sf_collec']) ? number_format($till_collec['sc_sf_collec'],2) : '0';?>
                      <?php if(!empty($property_info['monthly_billing']) && $property_info['monthly_billing'] > 0 && !empty($till_collec['sc_sf_collec']) && $till_collec['sc_sf_collec'] > 0) {
                            echo ' ('. round((($till_collec['sc_sf_collec'] * 100) / $property_info['monthly_billing']),2).'%)';
                      } ?>
                      </div>
                      </div>
                      
                   </div>
                </div-->
        
       </div>
       
      <?php //} 
      
      }  ?>

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
        <h4 class="modal-title">Short Listed Names</h4>
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
<script>
$(document).ready(function (){
    
    $('#tabs').on('click','.tablink,#minorTaskTabs a',function (e) {
        //console.log(this);
        e.preventDefault();
        var url = $(this).attr("data-url");
    
        if (typeof url !== "undefined") {
            var pane = $(this), href = this.hash;
            
            if($(href).html() == '') {
               // ajax load from data-url
                $(href).load(url,function(result){      
                    pane.tab('show');
                }); 
            } else {
                $(this).tab('show');
            }            
        } else {
            $(this).tab('show');
        }
    });
    
    $('#minorTaskTabs').tab();
    $('a[href="#tab_1"]').trigger('click');
    
    if($('.cust-container-fluid').width() > 715 ) {
        //console.log($('.left-box').height()+' = '+)
        if($('.left-box').height() < (eval($('.right-box1').height()))) {
            $('.left-box').height(eval($('.right-box1').height()));  
        } else {
            $('.right-box1').height(eval($('.left-box').height()));  
        }              
    } else { 
        $('.right-box1').parent('div').css('padding','10px 0 0 0');        
    }
    
    $('.open_model_btn').bind("click",function () {
        $('.modal-content').css('width','750px');
        $('.modal-body2').load('<?php echo base_url('index.php/bms_dashboard/short_listed_names/'.$awarded_year.'/'.$awarded_month);?>',function(result){
    	    $('#myModal2').modal({show:true});           
    	});
        
    });        
    
    $('#property_id').change(function () {
        if($('#property_id').val() != '') {
            window.location.href="<?php echo base_url('index.php/bms_dashboard/index');?>?property_id="+$('#property_id').val();
            return false;
        }           
    });
    
});
</script>
<script src="<?php echo base_url();?>assets/js/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/js/highcharts/modules/data.js"></script>
<script src="<?php echo base_url();?>assets/js/highcharts/modules/exporting.js"></script>