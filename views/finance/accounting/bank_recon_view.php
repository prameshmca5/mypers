<?php $this->load->view('header');?>
<?php $this->load->view('sidebar'); //echo "<pre>";print_r($properties); ?>
  
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 
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
                    <div class="col-md-12 no-padding">
                        <div class="col-md-3 col-xs-6">
                            <div class="form-group">
                                <label>Property </label>
                                <select class="form-control" id="property_id" name="property_id">
                                    <option value="">Select Property</option>
                                    <?php 
                                        foreach ($properties as $key=>$val) { 
                                            $selected = isset($property_id) && trim($property_id) != '' && trim($property_id) == $val['property_id'] ? 'selected="selected" ' : '';  
                                            echo "<option value='".$val['property_id']."' ".$selected." data-value='".$val['total_units']."'>".$val['property_name']."</option>";
                                        } ?> 
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-xs-6" style="">
                            <div class="form-group">
                                    <label>Bank</label>
                              <select name="status" class="form-control" >
                                                              
                              </select>
                          </div>
                        </div>
                        
                        <div class="col-md-2 col-xs-6" style="">
                            <div class="form-group">
                                    <label>Status</label>
                              <select name="status" class="form-control" id="status">
                                <option value="all" <?php echo !empty($_GET['status']) && $_GET['status'] == 'all' ? 'selected="selected"' :  ''; ?>>All</option> 
                                <option value="1" <?php echo !empty($_GET['status']) && $_GET['status'] == 1 ? 'selected="selected"' :  ''; ?> >Marked</option>
                                <option value="0" <?php echo empty($_GET['status']) ? 'selected="selected"' :  ''; ?>>Unmarked</option>
                                                                   
                              </select>
                          </div>
                        </div>
                    
                        <div class="col-md-2 col-xs-4">
                            <div class="form-group">
                                <label>From </label>
                
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input class="form-control pull-right datepicker" name="from_date" id="from_date" type="text"  value="<?php echo !empty($_GET['from']) ? $_GET['from'] : '01-'. date('m-Y');?>" />
                                </div>
                                <!-- /.input group -->
                              </div>
                        </div>
                    
                        <div class="col-md-2 col-xs-4">
                            <div class="form-group">
                                <label>To </label>
                
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input class="form-control pull-right datepicker" name="to_date" id="to_date" type="text"  value="<?php echo !empty($_GET['to']) ? $_GET['to'] : date('d-m-Y');?>" />
                                </div>
                                <!-- /.input group -->
                              </div>
                        </div>
                    
                        <!--div class="col-md-2 col-xs-4">
                            <div class="form-group">
                                <label>To </label>
                
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input class="form-control pull-right datepicker" name="to_date" id="to_date" type="text"  value="<?php echo !empty($_GET['to']) ? $_GET['to'] : date('d-m-Y');?>" />
                                </div>
                                <!- - /.input group - ->
                              </div>
                        </div-->
                        <div class="col-md-1 col-xs-12" style="margin-top: 25px;">
                            <input class="btn btn-primary view_btn" value="View" type="button">
                        </div>
                
                </div>
                
                <div class="col-md-12 no-padding">
                    <div class="col-md-3 col-xs-4">
                        <label>Bank Statement Closing</label>
                        <input type="text" id="" value="" class="form-control"  />
                    </div>
                    <div class="col-md-3 col-xs-4">
                        <label>System Calculate Closing</label>
                        <input type="text" id="" value="" class="form-control"  />
                    </div>
                    <div class="col-md-3 col-xs-4">
                        <label>Out of Balance</label>
                        <input type="text" id="" value="" class="form-control"  />
                    </div>
                
                </div>  
                             
                    
                </div>
                
              </div>
              <!-- /.box-body -->
              
              
              <div class="box-body">
              <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th class="hidden-xs">S No</th>
                  
                  <th>Ref No 1</th>     
                  <th>Date</th>                                  
                  <th>Pay Mode</th>
                  <th>Ref No 2</th>                                 
                  <th>Debit</th>
                  <th>Credit</th>
                  <th>Mark</th>
                </tr>
                </thead>
                <tbody id="content_tbody">
                               
                </tbody>                
              </table>
            </div>
          
          <div class="row ciov" style="margin: 0px !important;padding: 10px 0; border-top: 1px solid #DCDCDC;border-bottom: 1px solid #DCDCDC;background-color: #F0F0F0;">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding: 0px;">
                    
                    
                    Show: &nbsp;<select id="records_per_page">
                            <option value="25" <?php echo isset($per_page) &&  $per_page == 25 ? 'selected="selected"' : '';?>>25 per page</option>                            
                            <option value="50" <?php echo isset($per_page) &&  $per_page == 50 ? 'selected="selected"' : '';?>>50 per page</option>
                            <option value="100" <?php echo isset($per_page) &&  $per_page == 100 ? 'selected="selected"' : '';?>>100 per page</option>
                        </select>
                        
                        
                    
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right"  style="padding: 0px;">
                    
                    <div class="paging_right_div" style="padding-right: 5px;">
                    <!--span style="display: inline-block; padding-left: 15px; font-size: 14px;color:#000;" > Grant Total: </span> 
                    <span style="display: inline-block; padding-left: 5px; font-size: 14px;color:#000;font-weight:bold" class="showing_stat" > - </span--> 
                    &ensp; &ensp;&ensp; &ensp;
                        <span class="previous_link"></span> 
                        <span>Page <input class="publi_paging" size="2" pattern="[0-9]*" value="1" type="text"> of <span class="tot_pag_span small_loader"></span></span>
                        <span class="next_link"><a href="javascript:;" > <span class="glyphicon glyphicon-triangle-right" style="color: green;"></span></a></span> <input id="tot_pages" value="" type="hidden">                                           
                    </div>
                </div>
                
            </div>
          
            
         </div>
          <!-- /.box -->     

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  
<?php $this->load->view('footer');?>
  <!-- loadingoverlay JS -->
  <script src="<?php echo base_url();?>assets/js/loadingoverlay.js"></script>
  <!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> 

<script>
var payment_mode = $.parseJSON('<?php echo json_encode($this->config->item('payment_mode'));?>');
$(document).ready(function () {    
    $('.msg_notification').fadeOut(5000);   
    
    $('.view_btn').click(function () {
        window.location.href='<?php echo base_url('index.php/bms_fin_accounting/bank_recon');?>?property_id='+$("#property_id").val()+'&status='+$("#status").val()+'&from='+$("#from_date").val()+'&to='+$("#to_date").val();
        return false;  
    });
    
    loadBankRecon ('<?php echo $offset;?>','<?php echo $per_page;?>',false);    
    
    
    // On property name change
    /*$('#property_id').change(function () {
        
        loadBank ();
    });*/ 
});

function loadBankRecon (offset,rows,flag) {
    if($('#property_id').val() != '' && $('#from_date').val() != '' && $('#to_date').val() != '') {
        $.ajax({
            type:"post",
            async: true,
            url: '<?php echo base_url('index.php/bms_fin_accounting/get_bank_recon');?>',
            data: {'offset':offset,'rows':rows,'property_id':$('#property_id').val(),'status':$('#status').val(),'from':$("#from_date").val(),'to':$("#to_date").val()},
            datatype:"json", // others: xml, json; default is html
            beforeSend:function (){ $("#content_tbody").LoadingOverlay("show");  },
            success: function(data) {  
               $("#content_tbody").LoadingOverlay("hide", true);
                var str = ''; var showing_to = 0;
                var numFound = data.numFound.num_rows;
                //console.log(data.numFound); id,ref_no_1,doc_date,doc_time,pay_mod,ref_no_2,debit,credit,acc_type
                if(numFound > 0) {     
                    var last_id = '';
                    $.each(data.records,function (i, item) { 
                        showing_to = (eval(offset)+eval(i)+1);
                        str += '<tr>';
                        str += '<td class="hidden-xs">'+showing_to+'</td>';
                        str += '<td>'+item.ref_no_1+'</td>';
                        str += '<td>'+(item.doc_date != '' ? formatDate(item.doc_date) : '')+'</td>';
                        str += '<td>'+(item.pay_mod !== null ? payment_mode[item.pay_mod] : '')+'</td>';
                        str += '<td>'+(item.ref_no_2 !== null ? item.ref_no_2 : '')+'</td>';                    
                        str += '<td>'+item.debit+'</td>';  
                        str += '<td>'+item.credit+'</td>';
                                          
                        str += '<td style="text-align: center;">';
                        str += '<div class="checkbox" style="margin:0px;"><label><input class="mark_cls" value="'+item.bank_recon+'" data-id="'+item.id+'" data-acc-type="'+item.acc_type+'" '+(item.bank_recon == 1 ? "checked='checked'" : '')+' type="checkbox"></label></div>';    
                        str += '</td>';
                        str += '</tr>';
                    });
                    
                    var page = (eval(offset) / eval(rows)) + 1;
                    jQuery('.publi_paging').val(page);
                    var total_pages = Math.ceil(numFound / rows);
                    total_pages = total_pages == 0 ? 1 : total_pages;
                    jQuery('#tot_pages').val(total_pages);
                    jQuery('.tot_pag_span').html(total_pages.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    jQuery('#tot_rec_span').html('<span id="tot_rec">'+numFound.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+ '</span> RESULTS'); //x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                    
                    var previous_link = ""; 
                    var next_link = "";
                    if(offset > 0 ){
                        previous_link = "<a href='javascript:;' onclick='loadContent("+(eval(offset)-eval(rows))+","+rows+",true);'><span class='glyphicon glyphicon-triangle-left' style='color: green;'></span></a> ";
                    } 
                    
                    if(eval(numFound) > (eval(offset)+eval(rows))){
                        if((eval(offset)+eval(rows)) < numFound){
                            next_link = "<a href='javascript:;' onclick='loadContent("+(eval(offset)+eval(rows))+","+rows+",true);'> <span class='glyphicon glyphicon-triangle-right' style='color: green;'></span></a>";
                        } else {
                           // do nothing      
                        }                    
                    }
                    jQuery('.previous_link').html(previous_link);
                    jQuery('.next_link').html(next_link);
                    
                    
                    
                    $("#content_tbody").html(str);
                    
                    $('.mark_cls').unbind('click');
            
                    $('.mark_cls').bind("click", function () {
                        $(this).val($(this).is(":checked") ? '1' : '0');
                        mark_item ($(this).attr('data-id'),$(this).attr('data-acc-type'),$(this).val());    
                    });
                    
                } else {
                    str = '<tr><td class="hidden-xs text-center" colspan="10">No Record Found</td>';
                    str += '<td class="visible-xs text-center" colspan="4">No Record Found</td></tr>';
                    $("#content_tbody").html(str);
                    jQuery('.tot_pag_span').html('1');
                    jQuery('.next_link').html('');
                }
                
                
                // This is to update the url
                if(flag) {
                    if (typeof (history.pushState) != "undefined") {
                        var update_url = '<?php echo base_url('index.php/bms_fin_accounting/bank_recon');?>/'+offset+'/'+rows+'?property_id='+$('#property_id').val()+'&status='+$("#status").val()+'&from='+$("#from_date").val()+'&to='+$("#to_date").val();
                        var obj = { Title: '<?php echo isset($browser_title) && $browser_title != '' ? $browser_title : 'Transpacc | BMS' ;?>', Url: update_url };
                        history.pushState(obj, obj.Title, obj.Url);
                    } else {
                        console.log("Browser does not support HTML5.");
                    }
                }                
                
            },
            error: function (e) {    
                $("#content_tbody").LoadingOverlay("hide", true);
                console.log(e); //alert("Something went wrong. Unable to retrive data!");
            }
        });
    } else {
        
    }
}

function mark_item (id,type,val) {
    //console.log(id +' - '+type +' - '+val);
    $.ajax({
        type:"post",
        async: true,
        url: '<?php echo base_url('index.php/bms_fin_accounting/set_bank_recon');?>',
        data: {'id':id,'type':type,'val':val},
        datatype:"json", // others: xml, json; default is html
        beforeSend:function (){ $("#content_tbody").LoadingOverlay("show");  },
        success: function(data) {  
            $("#content_tbody").LoadingOverlay("hide", true);            
        },
        error: function (e) {    
            $("#content_tbody").LoadingOverlay("hide", true);
            console.log(e); //alert("Something went wrong. Unable to retrive data!");
        }
    });    
                
}


$(function () {    
    //Date picker
    $('.datepicker').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });
});


function printDiv(url) {    
    window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=800,height=600,directories=no,location=no');
}

function formatDate(date) {  
   var date_arr = date.split('-');
   return  date_arr[2] + "-" + date_arr[1] + "-" + date_arr[0] ;
}
</script>