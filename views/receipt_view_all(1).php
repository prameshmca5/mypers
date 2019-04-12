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
              
              <?php if(isset($_SESSION['flash_msg']) && trim($_SESSION['flash_msg']) != '') {
                    //if($_GET['login_err'] == 'invalid')
                    echo '<div class="alert alert-success msg_notification"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>';
                    echo '</strong>'.$_SESSION['flash_msg'].'</div>';
                    unset($_SESSION['flash_msg']);
                }
            ?>
			
			
			
			
			
			
			
			<div class="row">
                    <div class="col-md-3 col-xs-6">
                        <td class="box-title"><b>Receipt</b></td>
                    </div>
                                     
                    <div style="padding-left: 80%;">
                       <div class="col-md-1 col-xs-6">
                      <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/receipt/receipt_view');?>">New Receipt</a>
                    </div>
                    
                   	<div class="col-md-1 col-xs-6" style="padding-left: 36%;" >
                      <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/receipt/receipt_view');?>">e-Payments</a>
                    </div>               
                    </div>
                </div>
				&nbsp;	
			
		<div class="col-md-12 col-xs-12 no-padding">
                            <div class="col-md-12 col-sm-12 col-xs-12 right-box" style="border: 1px solid #999;border-radius: 5px;background-color: #efefef;">
                                
								
								&nbsp;
								
					<div class="row">
                    <div class="col-md-3 col-xs-6">
                        <label>Receipt No</label>
						<input type="text" name="" class="form-control" value="">
                    </div>
                    
                    <div class="col-md-3 col-xs-6">
                        <label>Unit No</label>
						<input type="text" name="" class="form-control" value="" >
                    </div>
                    
                    
                    <div class="col-md-1 col-xs-1" style="padding-left: 32%;">
                         <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/receipt/receipt_view');?>">Find</a>
                    </div>
                    <div class="col-md-1 col-xs-1" style="padding-left: 4%;">
                         <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/receipt/receipt_view');?>">Show All</a>
                    </div>
					
                      <div class="col-md-1 col-xs-4" style="padding-left: 3%;">
                        <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/receipt/receipt_view');?>">Clear</a>
                    </div>
                                        
                    
                </div>
				
				&nbsp;
				<div class="row">
                    <div class="col-md-3 col-xs-6">
                        <label>Date Range</label>
						<input type="text" name="" class="form-control" value="">
                    </div>
                    
                    <div class="col-md-3 col-xs-6">
                        <label>To</label>
						<input type="text" name="" class="form-control" value="">
                    </div>
                    
                    <div class="col-md-3 col-xs-6">
                  <label>Fin,year</label>					
                          <select  id="doc_cat_id" class="form-control" name="doc_cat_id">
                            <option value="">All</option>
                            <option value="5">Accounts</option><option value="6">AGM/EGM</option><option value="2">Contract &amp; Agreement</option><option value="3">Correspondence letters</option><option value="13">Defaulters</option><option value="7">Legal matters</option><option value="4">Licenses &amp; certifications</option><option value="1">Minutes of the meeting</option><option value="12">Notice</option><option value="10">Others</option><option value="14">PO/Quotation/Invoice</option><option value="8">Property House Rules</option><option value="11">Reminders</option><option value="9">Reports</option> 
                        </select>
                    </div>
                   
                                        
                    
                </div>
				&nbsp;
				
				<div class="row">
                    <div class="col-md-3 col-xs-6">
                        <label>Bank</label>
						<input type="text" name="" class="form-control" value="">
                    </div>
                    
                    <div class="col-md-3 col-xs-6">
                        <label>Chq No</label>
						<input type="text" name="" class="form-control" value="">
                    </div>
                    
                    <div class="col-md-3 col-xs-6">
                  <label>From</label>					
                         <input type="text" name="" class="form-control" value="">
                    </div>
                   
                                        
                    
                </div>
				&nbsp;
				<div class="row">
                    <div class="col-md-3 col-xs-6">
                        <label>Cancelled</label>
						<select  id="doc_cat_id" class="form-control" name="doc_cat_id">
                            <option value="">All</option>
                            
                        </select>
                    </div>
                    
                    <div class="col-md-3 col-xs-6">
                        <label>Retument</label>
						<select  id="doc_cat_id" class="form-control" name="doc_cat_id">
                            <option value="">All</option>
                            
                        </select>
                    </div>
                    
                    <div class="col-md-3 col-xs-6">
                  <label>Issued By</label>					
                         <select  id="doc_cat_id" class="form-control"  name="doc_cat_id">
                            <option value="">All</option>
                             
                        </select>
                    </div>
                   
                                        
                    
                </div>
				&nbsp;
				<div class="row">
                    <div class="col-md-3 col-xs-6">
                        <label>Payment Mode</label>
						<select  id="doc_cat_id" class="form-control" name="doc_cat_id">
                            <option value="">All</option>
                            
                        </select>
                    </div>
                    
                    <div class="col-md-3 col-xs-6">
                        <label>Sub-Type</label>
						<select  id="doc_cat_id" class="form-control" name="doc_cat_id">
                            <option value="">All</option>
                            
                        </select>
                    </div>
                    
                   
                   
                                        
                    
                </div>
				&nbsp;
				<div class="row">
                    <div class="col-md-3 col-xs-6">
                        <label>Category</label>
						<select  id="doc_cat_id" class="form-control" name="doc_cat_id">
                            <option value="">All</option>
                           
                        </select>
                    </div>
                    
                    <div class="col-md-3 col-xs-6">
                        <label>&nbsp;</label>
						<select  id="doc_cat_id" class="form-control" name="doc_cat_id">
                            <option value="">Subcategory</option>
                            
                        </select>
                    </div>
                    
                   
                   
                                        
                    
                </div>
				
								
								
                                    </div>
                                   
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 no-padding" style="padding-top: 10px !important;">
                                    <div class="col-md-12 col-sm-12 col-xs-12 no-padding">                                    
                                        
                                    </div>
                                    
                                </div>
								
                                
                               
                               
                               
                                                            
                                
                            </div>
                             <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="hidden-xs">Receipt No</th>   
                  <th>Date</th>               
                  <th>Unit No</th>
                  <th>Received From</th>
				  <th>Payment Mode</th>
				  <th>Cancelled</th>
				  <th>Returned</th>
				  <th>Amount(RM)</th>
                </tr>
                </thead>
                <tbody>
                
                  
                        <tr>
                            <td class="text-center" colspan="4">No Record Found</td>                            
                        </tr>                    
                              
                </tbody>                
              </table>   
                        </div>
			
		
			&nbsp;
			
      
                
                
              </div>
              <!-- /.box-body -->
              
             
          
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
        window.location.href="<?php echo base_url('index.php/debit/debit_list_view');?>?search_txt="+search_txt;
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