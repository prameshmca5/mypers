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
                  
                    <div class="col-md-4 col-xs-6">
                        <select class="form-control" id="property_id" name="property_id">
                            <option value="">Select Property</option>
                            <?php 
                                foreach ($properties as $key=>$val) { 
                                    $selected = isset($property_id) && trim($property_id) != '' && trim($property_id) == $val['property_id'] ? 'selected="selected" ' : '';  
                                    echo "<option value='".$val['property_id']."' ".$selected." data-value='".$val['total_units']."'>".$val['property_name']."</option>";
                                } ?> 
                        </select>
                    </div>
                    
                    <div class="col-md-4 col-xs-5">                        
                          <input type="text" id="search_txt" value="<?php echo isset($_GET['search_txt']) && trim($_GET['search_txt']) != '' ? trim($_GET['search_txt']) : '';?>" class="form-control" placeholder="Enter text to search ">
                    </div>
                    
                    
                    <div class="col-md-1 col-xs-1" >
                        <a href="javascript:;" role="button" class="btn btn-primary sear_filter"><i class="fa fa-search"></i></a>
                    </div>
                    
                    <div class="col-md-3 col-xs-12">
                        <input class="btn btn-primary add_btn" value="Add Service Provider" type="button">
                    </div>
                                        
                    
                </div>
                
              </div>
              <!-- /.box-body -->
              
              <div class="box-body">                    
    
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th class="hidden-xs">S No</th>
              <th>Name</th>
              <th>Service Category</th>
              <th>Contract Start Date</th>                  
              <th>Contract Due Date</th>              
              <th>Contact Person Name</th>
              <th>Contact Person Number</th>              
              <th>Action</th>
              
            </tr>
            </thead>
            <tbody id="content_tbody">
              <?php if (!empty($mainten_comp))    {
                $asset_warranty_remin = $this->config->item('asset_warranty_remin');
                foreach ($mainten_comp as $key=>$val) {
                    echo '<tr><td>'.($key+1).'</td>';
                    echo '<td>'.$val['supplier_name'].'</td>';
                    echo '<td>'.($val['warranty_start'] != '' ? date('d-m-Y',strtotime($val['warranty_start'])) : ' - ').'</td>';
                    echo '<td>'.($val['warranty_due'] != '' ? date('d-m-Y',strtotime($val['warranty_due'])) : ' - ').'</td>';
                    echo '<td>'.(!empty($val['remind_before'])  ? $asset_warranty_remin[$val['remind_before']]  : ' - ').'</td>';
                    echo '<td>'.$val['person_incharge'].'</td>';
                    echo '<td>'.$val['person_inc_mobile'].'</td>';
                }
              } else {
                echo '<tr><td class="text-center" colspan="9">No record found!</td></tr>';
              }?>        
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
                        
                        <!--span style="display: inline-block; padding-left: 15px; font-size: 12px;color:#000;font-weight:bold" class="showing_stat" > Showing 0 to 0 Of 0 Record(s) </span-->
                    
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right"  style="padding: 0px;">
                    
                    <div class="paging_right_div" style="padding-right: 5px;">
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
<script>

$(document).ready(function () {
    
    $('.msg_notification').fadeOut(5000);
    
    $('#property_id').change(function () {
        if($('#property_id').val() != '') {
            loadContent(0,jQuery('#records_per_page').val(),true);
        }           
    });
    
    $('.sear_filter').click(function () {
        loadContent(0,jQuery('#records_per_page').val(),true);   
    });
    
    $('.add_btn').click(function () {
        window.location.href='<?php echo base_url('index.php/bms_property/add_service_provider');?>?property_id='+$("#property_id").val();
        return false;  
    });
    
    
    
    jQuery('#records_per_page').change(function(e){
        loadContent(0,jQuery('#records_per_page').val(),true);
        return false; 
    });
    
    jQuery('.publi_paging').keypress(function( event ) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9\.]/g,''));
        if ( event.which == 13 ) {
            //alert(jQuery.isNumeric(jQuery(this).val()) + ' ' + eval(jQuery(this).val()) +'  '+ jQuery('#tot_pages').val());
            event.preventDefault();
            if(jQuery.isNumeric(jQuery(this).val())) {
                if(eval(jQuery(this).val()) > 0 && eval(jQuery(this).val()) <= jQuery('#tot_pages').val()) {
                    loadContent((jQuery(this).val()-1)*jQuery('#records_per_page').val(),jQuery('#records_per_page').val(),true);
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
    
    loadContent('<?php echo $offset;?>','<?php echo $per_page;?>',false);
    
});


function loadContent (offset,rows,flag) {
    //$('#search_txt').val($('#search_txt').val().replace(/^\s+|\s+$/g,""));
    var search_txt = $('#search_txt').val().replace(/^\s+|\s+$/g,"");
    $.ajax({
        type:"post",
        async: true,
        url: '<?php echo base_url('index.php/bms_property/get_service_provider');?>',
        data: {'offset':offset,'rows':rows,'property_id':$('#property_id').val(),'search_txt':search_txt},
        datatype:"json", // others: xml, json; default is html

        beforeSend:function (){ $("#content_tbody").LoadingOverlay("show");  }, //
        success: function(data) {  
            $("#content_tbody").LoadingOverlay("hide", true);
            var str = ''; var showing_to = 0;
            var numFound = data.numFound;
            //console.log(data.numFound);
            if(numFound > 0) {                    
                $.each(data.records,function (i, item) { 
                    showing_to = (eval(offset)+eval(i)+1);
                    str += '<tr>';
                    str += '<td class="hidden-xs">'+showing_to+'</td>';
                    str += '<td>'+item.provider_name+'</td>';                    
                    str += '<td>'+item.service_provider_cat_name+'</td>';
                    str += '<td>'+(item.contract_start_date == '00-00-0000' ? ' - ' : item.contract_start_date)+'</td>';
                    str += '<td>'+(item.contract_end_date == '00-00-0000' ? ' - ' : item.contract_end_date)+'</td>';
                    str += '<td>'+item.person_incharge+'</td>';
                    str += '<td>'+item.person_inc_mobile+'</td>';                                       
                    str += '<td style="text-align: center;"><a href="<?php echo base_url('index.php/bms_property/add_service_provider');?>/'+item.service_provider_id+'" title="Edit"><i class="fa fa-edit"></i></a></td>';
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
            } else {
                str = '<tr><td class="hidden-xs text-center" colspan="7">No Record Found</td>';
                str += '<td class="visible-xs text-center" colspan="4">No Record Found</td></tr>';
                $("#content_tbody").html(str);
                jQuery('.tot_pag_span').html('1');
                jQuery('.next_link').html('');
            }
            
            //$('.showing_stat').html('Showing '+(eval(offset)+(numFound > 0 ? 1 : 0))+' - '+showing_to+' Of '+numFound+' Record(s). Total Unit(s) : '+$('#property_id').find("option:selected").attr('data-value'));
            //$(this).attr('title',$('#property_id').find("option:selected").attr('data-value'));
            
            // This is to update the url
            if(flag) {
                if (typeof (history.pushState) != "undefined") {
                    var update_url = '<?php echo base_url('index.php/bms_property/service_provider_list');?>/'+offset+'/'+rows+'?property_id='+$('#property_id').val()+'&search_txt='+search_txt;
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
    
}

</script>