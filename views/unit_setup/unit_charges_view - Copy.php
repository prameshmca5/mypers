
    <form role="form" id="bms_owner_frm" action="<?php echo base_url('index.php/bms_unit_setup/set_charges');?>" method="post" >
      
      <div class="col-md-12 col-xs-12 no-padding" style="">
                 
                    <div class="box-header with-border">
                      <h3 class="box-title"><b>Charges For Billing</b></h3>
                    </div>
                    <div class="box-body">
                    
                    <input type="hidden" id="unit_id" name="unit_id" value="<?php echo $unit_id;?>"/>
                    
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          
                          <th>Charge Name</th>               
                          <th>Amount</th>
                          <th>Charge Code</th>
                          <th>Pay By</th>
                          <th>Add / Remove</th>
                          
                        </tr>
                        </thead>
                        <tbody class="charges_tbody">
                        
                        <tr id="0">
                            <td>  
                                <select class="form-control" name="charges[charge_type_id][]" >                              
                                <option value="">Select</option>
                                <?php 
                                    foreach ($charge_types as $key=>$val) {                                        
                                        $selected = !empty($charges[0]['charge_type_id']) && $charges[0]['charge_type_id'] == $val['charge_type_id'] ? 'selected="selected" ' : '';
                                        echo "<option value='".$val['charge_type_id']."' ".$selected.">".$val['charge_type_name']."</option>";
                                    } ?> 
                                </select>
                                <input type="hidden" name="charges[charges_id][]" value="<?php echo !empty($charges[0]['charges_id']) ? $charges[0]['charges_id'] : '';?>" />
                            </td>
                            <td><input type="text" name="charges[amount][]" class="form-control" value="<?php echo isset($charges[0]['amount']) && $charges[0]['amount'] != '' ? $charges[0]['amount'] : '';?>" placeholder="Enter Amount" maxlength="100"></td>
                            <td>  
                                <select class="form-control" name="charges[charge_code_id][]" >                              
                                <option value="">Select</option>
                                <?php 
                                    foreach ($charge_codes as $key=>$val) {                                        
                                        $selected = !empty($charges[0]['charge_code_id']) && $charges[0]['charge_code_id'] == $val['charge_code_id'] ? 'selected="selected" ' : '';
                                        echo "<option value='".$val['charge_code_id']."' ".$selected.">".$val['charge_code']."</option>";
                                    } ?> 
                                </select>
                            </td>
                            <td>  
                                <select class="form-control" name="charges[pay_by][]" >                              
                                <option value="">Select</option>
                                <?php 
                                    foreach ($pay_by as $key=>$val) {                                        
                                        $selected = !empty($charges[0]['pay_by']) && $charges[0]['pay_by'] == $key ? 'selected="selected" ' : '';
                                        echo "<option value='".$key."' ".$selected.">".$val."</option>";
                                    } ?> 
                                </select>
                            </td>
                            
                            <td class="text-center"><a href="javascript:;" class="btn btn-success btn-circle add_charges_btn" data-value="<?php echo !empty($charges) ? count($charges)+1 : 1;?>" ><i class="fa fa-plus"></i></a></td>
                            
                        </tr>
                        
                        <?php if(!empty($charges) && count($charges) > 1) {
                            for ($i =1; $i < count($charges); $i++) { ?>
                                                                
                            <tr id="<?php echo $i;?>">
                            <td>  
                                <select class="form-control" name="charges[charge_type_id][]" >                              
                                <option value="">Select</option>
                                <?php 
                                    foreach ($charge_types as $key=>$val) {                                        
                                        $selected = !empty($charges[$i]['charge_type_id']) && $charges[$i]['charge_type_id'] == $val['charge_type_id'] ? 'selected="selected" ' : '';
                                        echo "<option value='".$val['charge_type_id']."' ".$selected.">".$val['charge_type_name']."</option>";
                                    } ?> 
                                </select>
                                <input type="hidden" name="charges[charges_id][]" value="<?php echo !empty($charges[$i]['charges_id']) ? $charges[$i]['charges_id'] : '';?>" />
                            </td>
                            <td><input type="text" name="charges[amount][]" class="form-control" value="<?php echo isset($charges[$i]['amount']) && $charges[$i]['amount'] != '' ? $charges[$i]['amount'] : '';?>" placeholder="Enter Amount" maxlength="100"></td>
                            <td>  
                                <select class="form-control" name="charges[charge_code_id][]" >                              
                                <option value="">Select</option>
                                <?php 
                                    foreach ($charge_codes as $key=>$val) {                                        
                                        $selected = !empty($charges[$i]['charge_code_id']) && $charges[$i]['charge_code_id'] == $val['charge_code_id'] ? 'selected="selected" ' : '';
                                        echo "<option value='".$val['charge_code_id']."' ".$selected.">".$val['charge_code']."</option>";
                                    } ?> 
                                </select>
                            </td>
                            <td>  
                                <select class="form-control" name="charges[pay_by][]" >                              
                                <option value="">Select</option>
                                <?php 
                                    foreach ($pay_by as $key=>$val) {                                        
                                        $selected = !empty($charges[$i]['pay_by']) && $charges[$i]['pay_by'] == $key ? 'selected="selected" ' : '';
                                        echo "<option value='".$key."' ".$selected.">".$val."</option>";
                                    } ?> 
                                </select>
                            </td>
                            
                            <td class="text-center"><a href="javascript:;" class="btn btn-danger btn-circle del_charges_btn" data-value="<?php echo $i;?>" ><i class="fa fa-minus"></i></a></td>
                            
                        </tr>
                        
                            
                            <?php
                            }
                            
                        }?>
                       </table>    
                       <div class="col-md-12 no-padding text-right">
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary owner_save_btn">Save</button> &ensp;&ensp;                        
                      </div>
                    </div>   
                               
                    </div>
                    
                    
                </div><!-- /.box-info -->  
             
            </form>

    
  <script>
  var charge_types = $.parseJSON('<?php echo json_encode($charge_types)?>');
  var charge_codes = $.parseJSON('<?php echo !empty($charge_codes) ? json_encode($charge_codes) : json_encode(array());?>');
  var pay_by = $.parseJSON('<?php echo !empty($pay_by) ? json_encode($pay_by) : json_encode(array());?>');
  $(document).ready(function (){
    
    $('.add_charges_btn').click(function () {        
        add_charges($(this).attr('data-value'));
        $(this).attr('data-value',eval($(this).attr('data-value'))+1);
    });
    
  
    
    $('.del_charges_btn').bind('click',function (){
       $('#'+$(this).attr('data-value')).remove(); 
    });
    
    function add_charges (row_id) {
        var str = '<tr id="'+row_id+'">';
        str += '<td>';
        str += '<select class="form-control" name="charges[charge_type_id][]">';
        str += '<option value="">Select</option>';
        $.each(charge_types,function (i, item) { 
            str += '<option value="'+item.charge_type_id+'">'+item.charge_type_name+'</option>';
        });
         
        str += '</select>';
        str += '<input type="hidden" name="charges[charges_id][]" value="" />';
        str += '</td>';
        str += '<td><input name="charges[amount][]" class="form-control" value="" placeholder="Enter Amount" maxlength="100" type="text"></td>';
        str += '<td>';
        str += '<select class="form-control" name="charges[charge_code_id][]">';
        str += '<option value="">Select</option>';
        $.each(charge_codes,function (i, item) { 
            str += '<option value="'+item.charge_code_id+'">'+item.charge_code+'</option>';
        }); 
        str += '</select>';
        str += '</td>';
        str += '<td>';
        str += '<select class="form-control" name="charges[pay_by][]">';
        str += '<option value="">Select</option>';
        $.each(pay_by,function (i, item) { 
            str += '<option value="'+i+'">'+item+'</option>';
        });  
        str += '</select>';
        str += '</td>';
    
        str += '<td class="text-center"><a href="javascript:;" class="btn btn-danger btn-circle del_charges_btn" data-value="'+row_id+'" ><i class="fa fa-minus"></i></a></td>';
    
        str += '</tr>';
        
        $('.charges_tbody').append(str);
        $('.del_charges_btn').unbind('click');
        $('.del_charges_btn').bind('click',function (){
           $('#'+$(this).attr('data-value')).remove(); 
        });
    }
    
  });
  
  
  </script>