<?php $this->load->view('header');
    $this->load->view('sidebar'); //echo "<pre>";print_r($properties); ?>
  
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
            <form role="form" id="add_doc" action="<?php echo base_url('index.php/bms_document_center/add_doc_submit');?>" method="post" enctype="multipart/form-data">
              <div class="box-body" style="padding-top: 15px;">
              
              <?php if(isset($_SESSION['error_msg']) && trim( $_SESSION['error_msg'] ) != '') {
            //if($_GET['login_err'] == 'invalid')
            echo '<div class="alert alert-danger msg_notification"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>';
            echo '</strong>'.$_SESSION['error_msg'].'</div>'; 
            unset($_SESSION['error_msg']);
        }
        
        ?>
                  <div class="row">
                    
                    
                    <div class="col-md-12" style="padding: 0;">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                              <label for="property_id">Document Name *</label>
                              <input type="text" class="form-control" name="doc[doc_name]" placeholder="Enter Document Name" value="<?php echo isset($_POST['doc']['doc_name']) && trim($_POST['doc']['doc_name']) != '' ? trim($_POST['doc']['doc_name']) : '';?>" maxlength="100">
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                              <label for="property_id">Document Description </label>
                              <input type="text" class="form-control" name="doc[doc_description]" placeholder="Enter Document Description " value="<?php echo isset($_POST['doc']['doc_name']) && trim($_POST['doc']['doc_description']) != '' ? trim($_POST['doc']['doc_description']) : '';?>" maxlength="250">
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-12" style="padding: 0;">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                              <label for="">Document *</label>
                              <div style="position:relative;">
                            		<label class="btn-bs-file btn btn-primary">
                                    Choose File...
                            			
                            			<!--input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="document" size="40"  onchange='$("#upload-file-info").html($(this).val());'-->
                                        <input type="file" id="attach_file" name="document" size="40" onchange='$("#upload-file-info").html($(this).val());$("#attach_file-error").css("display","none");' />
                            		</label>
                            		&nbsp;
                            		<span class='label label-info' id="upload-file-info"></span>
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
                    <button type="submit" class="btn btn-primary">Submit</button> &ensp;
                    <button type="Reset" class="btn btn-default reset_btn">Reset</button> &ensp;&ensp;
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
  
  
<?php $this->load->view('footer');?>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- overlay loader for ajax call -->
<script src="<?php echo base_url();?>assets/js/loadingoverlay.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>

<script>

$(document).ready(function () {
    
    $('#property_id').focus();
    $('.msg_notification').fadeOut(5000);
    
    /** Form validation */
    
    $( "#add_doc" ).validate({
				rules: {
					"doc[doc_name]": "required",
                    "document":"required"                    
				},
				messages: {				
					"doc[doc_name]": "Please enter Document Name",
                    "document":"Please choose file"
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else 	if ( element.prop( "type" ) === "file" ) {
					    error.insertAfter( element.parent( "label" ).parent( "div" ) );
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


</script>