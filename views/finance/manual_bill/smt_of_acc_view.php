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
                        <div class="col-md-3 col-xs-6" style="">
                            <div class="form-group">
                                    <label>Unit </label>
                              <select name="receipt[unit_id]" class="form-control" id="unit_id">
                                <option value="">Select Unit</option> 
                                <?php 
                                if(!empty($units)) {
                                    foreach ($units as $key=>$val) {
                                        $selected = !empty($_GET['unit_id']) && $_GET['unit_id'] == $val['unit_id'] ?  'selected="selected" ' : '';
                                        echo "<option value='".$val['unit_id']."'
                                        data-owner='".$val['owner_name']."' ".$selected.">".$val['unit_no']."</option>";
                                    }
                                }
                                ?>                                   
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
                        <div class="col-md-2 col-xs-12" style="margin-top: 25px;">
                            <input class="btn btn-primary view_btn" value="View" type="button">
                        </div>
                
                </div>  
                             
                    
                </div>
                
              </div>
              <!-- /.box-body -->
              <?php $debit_tot = $credit_tot = $bal_tot = 0;?>
              <div class="box-body">
                <?php if(!empty($_GET['property_id']) && !empty($_GET['unit_id']) && !empty($_GET['from'])) { ?>
                <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Description</th>  
                  <th>Doc No</th>                  
                  <th style="text-align: right;">Debit(RM)</th>
                  <th style="text-align: right;">Credit(RM)</th>
                  <th style="text-align: right;">Balance(RM)</th>
                </tr>
                </thead>
                <tbody id="content_tbody">
                
                    <tr>
                        <td><?php echo $_GET['from'];?></td>
                        <td>Balance B/F</td>
                        <td>&nbsp;</td>
                        <td style="text-align: right;"></td>
                        <td style="text-align: right;"></td>
                        <td style="text-align: right;"><?php $bal_tot = ($bf_debit['amount']-$bf_credit['amount']); echo number_format($bal_tot,2) ?></td>
                    </tr>
                    <?php if(!empty($soa)) {
                        foreach ($soa as $key=>$val) {
                            echo "<tr>";
                            echo "<td>".date('d-m-Y',strtotime($val['doc_date']))."</td>";
                            echo "<td>".$val['descrip']."</td>"; 
                            echo "<td >".$val['doc_no']."</td>";  
                            
                            echo "<td style='text-align: right;'>";
                            if($val['item_type'] == 'RINV' || $val['item_type'] == 'DN' || ($val['item_type'] == 'OR' && empty($val['invoice_id']))) {
                                $debit_tot += $val['amount'];
                                $bal_tot += $val['amount'];
                                echo number_format($val['amount'],2);
                            } else {
                                echo "&nbsp;";
                            }
                            echo "</td>";
                            echo "<td style='text-align: right;'>";
                            if($val['item_type'] == 'OR' || $val['item_type'] == 'CN') {
                                $credit_tot += $val['amount'];
                                $bal_tot -= $val['amount'];
                                echo number_format($val['amount'],2);
                            } else {
                                echo "&nbsp;";
                            }
                            echo "</td>";
                             
                            echo "<td style='text-align: right;'>". (number_format($bal_tot,2)) ."</td>";
                            echo "</tr>";
                        }
                    }
                    
                    echo "<tr>";
                    echo "<td colspan='3' style='text-align:right'>Total &ensp; </td>";
                    echo "<td style='text-align: right;'><b>".number_format($debit_tot,2)."</b></td>";
                    echo "<td style='text-align: right;'><b>".number_format($credit_tot,2)."</b></td>";
                    echo "<td style='text-align: right;'>&ensp;</td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<td colspan='3' style='text-align:right'>Balance Due &ensp; </td>";
                    echo "<td style='text-align: right;'><b>".number_format($bal_tot,2)."</b></td>";
                    echo "<td style='text-align: right;'>&ensp;</td>";
                    echo "<td style='text-align: right;'>&ensp;</td>";
                    echo "</tr>";
                    
                    ?>
                </tbody>                
              </table>
              <?php } ?>
              
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

$(document).ready(function () {    
    $('.msg_notification').fadeOut(5000);   
    
    $('.view_btn').click(function () {
        window.location.href='<?php echo base_url('index.php/bms_fin_bills/soa');?>?property_id='+$("#property_id").val()+'&unit_id='+$("#unit_id").val()+'&from='+$("#from_date").val()+'&to='+$("#to_date").val();
        return false;  
    });
    
    // On property name change
    $('#property_id').change(function () {
        loadUnit ('');
    }); 
});

function loadUnit (unit_id) {
    $.ajax({
            type:"post",
            async: true,
            url: '<?php echo base_url('index.php/bms_jmb_mc/get_unit');?>',
            data: {'property_id':$('#property_id').val()},
            datatype:"json", // others: xml, json; default is html

            beforeSend:function (){ $("#content_area").LoadingOverlay("show");  }, //
            success: function(data) {  
                /*if(typeof(data.error_msg) != "undefined" &&  data.error_msg == 'invalid access') {
                    window.location.href= '<?php echo base_url();?>';
                    return false;
                }*/
                var str = '<option value="">Select Unit</option>'; 
                if(data.length > 0) {                    
                    $.each(data,function (i, item) {
                        var selected = unit_id != '' && unit_id == item.unit_id ? 'selected="selected"' : '';
                        str += '<option value="'+item.unit_id+'" '+selected+'>'+item.unit_no+'</option>';
                    });
                }
                $('#unit_id').html(str);   
                        
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