<?php
 error_reporting(0);
           $emailuser = $_SESSION['bms']['email'];
           $genid = $_SESSION['bms']['genid']; 
               
   $query1 = $this->db->query("SELECT * FROM  url_idvalidation where user_email ='$emailuser' ORDER BY url_id DESC LIMIT 1");
  foreach ($query1->result() as $row1)
  {
    $generate = $row1->gen_id; 
  }   
  if($generate!=$genid)
  {
      ?><script>alert("Unauthorize user."); window.location.assign('<?php echo base_url();?>Bms_index/logout');</script><?php 
  }
  $this->load->view('header');?>
<?php $this->load->view('sidebar'); //echo "<pre>";print_r($properties); ?>
  
  
 <head>
<style>
.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th
{
    border: unset!important;
    //background-color: red;	
}
</style>

</head> 
  
  
  
  
  
  
  
  
  
  
  
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
        <div class="row">
                    
                    
                    <div class="col-md-4 col-xs-6">                        
                          <input type="text" id="search_txt" value="<?php echo isset($_GET['search_txt']) && trim($_GET['search_txt']) != '' ? trim($_GET['search_txt']) : '';?>" class="form-control" placeholder="Enter text to search">
                    </div>
                    
                    <div class="col-md-1 col-xs-2">
                        <a href="javascript:;" role="button" class="btn btn-primary list_filter"><i class="fa fa-search"></i></a>
                    </div>
                    <?php if($_SESSION['bms']['user_type'] == 'staff') { ?>
                    <div class="col-md-3 col-xs-4">
                        <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/opening/add_openingimm');?>">Add Opening Balance</a>
                    </div>
                    <?php } ?>                    
                    
                </div>
                
                
              </div>
              <!-- /.box-body -->
                
			  

              <div class="box-body">
              <table id="example2" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;">
                <thead>
                <tr style="background-color: #c5c1c1;">
                  <th class="hidden-xs">S No</th>   
                  <th>date</th>               
                  <th>account_name</th>
                  <th>account_type</th>
				  <th>account_group	</th>
				  <th>debit</th>
				  <th>credit</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $offset = 0;
                    //$task_status = $this->config->item('task_db_status');
                    if(!empty($common_docs)) {
                        $prop_doc_download_desi_id = $this->config->item('prop_doc_download_desi_id');
                        //$task_status = $this->config->item('task_db_status');
                        foreach ($common_docs as $key=>$val) {            
						?>
						
                        <tr>
                            <td class="hidden-xs"><?php echo ($offset+$key+1);?></td>
                            <td><?php echo $val['date'];?></td>
                            <td><?php echo $val['account_name'];?></td>
							<td><?php echo $val['account_type'];?></td>
							<td><?php echo $val['account_group'];?></td>
							<td><?php echo $val['debit'];?></td>
							<td><?php echo $val['credit'];?></td>
                            
                            
                        </tr>
                       
                <?php }
                
                    } else { ?>
                        <tr>
                            <td class="text-center" colspan="4">No Record Found</td>                            
                        </tr>                    
                     <?php } ?>  
 					
                </tbody>                
              </table>
			  
			   <div class="row" style="padding-left: 74%;">
                    <div class="col-md-12 col-xs-12">
                        <label>Total</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php
							$conn = mysqli_connect('localhost','vitmates_tpbms','FdXVRSlm)c-7','vitmates_transpacc_bms');
							$result = mysqli_query($conn,"SELECT sum(debit) FROM bms_property_openingbalance");
							while ($rows = mysqli_fetch_assoc($result)) 
							echo $rows['sum(debit)'];
						   						
							?>
                            
                        <label>&nbsp;</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php
							$conn = mysqli_connect('localhost','vitmates_tpbms','FdXVRSlm)c-7','vitmates_transpacc_bms');
							$result1 = mysqli_query($conn,"SELECT sum(credit) FROM bms_property_openingbalance");
							while ($rows1 = mysqli_fetch_assoc($result1)) 
							echo $rows1['sum(credit)'];
						   						
							?>
							
							
                    </div>
					
                      
                            
                      
                    
					                                                                
                    
                </div>
			  
			  
			  
			  
			
         
		 
		 
          <div class="row ciov" style="margin: 0px !important;padding: 10px 0; border-top: 1px solid #DCDCDC;border-bottom: 1px solid #DCDCDC;background-color: #F0F0F0;">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding: 0px;">
                    
                    
                    Show: &nbsp;<select id="records_per_page">
                            <option value="10" selected="selected">10 per page</option>
                            <option value="25">25 per page</option>
                            <option value="50">50 per page</option>
                            <option value="100">100 per page</option>
                        </select>
                    
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
  <!-- bootstrap datepicker -->
  
<?php $this->load->view('footer');?>
<script src="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> 
<!-- overlay loader for ajax call -->
<script src="<?php echo base_url();?>assets/js/loadingoverlay.js"></script>  
<script>

$(document).ready(function () {
    
    $('#property_id').focus();
    $('.msg_notification').fadeOut(5000);
    
    $('.list_filter').click(function () {
        var search_txt = $('#search_txt').val().replace(/^\s+|\s+$/g,"");
        window.location.href="<?php echo base_url('index.php/opening/opening_view_list');?>?search_txt="+search_txt;
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