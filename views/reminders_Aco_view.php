
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

.wdt-inpt {
    width: 60% !important;
}


</style>

</head> 
  
  
  
  
  
  
  
  
  
  
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
		  
		  
		<style>
		 .recv1
            {
				font-size: 25px;
				font-weight: 600;

            }		 
		  
		  .content12 {
    min-height: 250px;
    padding: 15px;
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
	
	}
	
	.box1.box-primary1 {
    border-top-color: #3c8dbc;
}
	
.box1 {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
}
	.btn-primary1 {
    background-color: #3c8dbc;
    border-color: #367fa9;
	color:#fff;
	    margin-top: 10px;
    float: right;
	 padding: 6px;
    border-radius: 5px;
	
	
}
	.rwpdn
	{
	    padding: 15px;
	}
	
	.wrng-txt
	{
	    font-size: 14px;
		color: red;
		margin-top: -20px;
	}
	.new-prches
	{
	    background-color: #ccc;
	  
		 margin-top: -20px;
	}
	
	
	.nwprch
	{
	    margin-top: 11px;
		
		}
		
		.bdrs-pd
		{
		    padding: 40px;
           margin-top: -20px;
		}
		
		.all-bdrs
		{
		border: 1px solid #7d7c7c;
		}
		.txt-fld1
		{
		    padding: 6px;
		    border-radius: 4px;
		}
		.topmgn{
		
		      border: 1px solid #ccc; 
		padding: 30px;
		}
		.wdt-inpt
		{
		width: 60%;
		}
		
		.byfrm
		{
		font-weight: 600;
		
		}
		.wdt-inpt1
		{
		
		width: 30%;
		}
		.wdt-inpt2
		{
		    width: 46%;
		
		}
		
		.frmscnd-rwpdn
		{
		
		    margin-top: 20px;
		
		
		}
		.tpmgnad
		{
		    margin-top: 12px;
		}
		.slect-fld
		{
		
	        padding: 6px;
			border-radius: 4px;
			width: 60%;
		}
		.txt-rd
		{
		border-radius: 4px;
		    border: 2px solid #b1abab;
		}
		
		.newrwfm-2
		{
		
		    margin-top: 60px;
    
		
		}
		.lnitm
		{
		  padding: 32px;
         color: #ada8a8;
		
		}
		.wdsrt
		{
		width: 80px;
		}
		.wdsrt1 {
    width: 100px;
}
	
	.sbbxs
	{
		margin-top: 20px;

	}
		.slect-fld1 {
    padding: 6px;
    border-radius: 4px;
    width: 100%;
}


.btmrwpdn
{
    padding: 40px;

}

.scnrw-clr
{
    border: 1px solid #9a9393;
    padding: 30px;
    background: #cccccc63;

}

.btn-primary2 {
    background-color: #3c8dbc;
    border-color: #367fa9;
    color: #fff;
    margin-top: 10px;
   
    padding: 6px;
    border-radius: 5px;
}
		</style>  
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
			<div class="col-md-12 col-xs-12" style="border: 1px solid #999;border-radius: 2px;background-color: #f1f0f0;">
			&nbsp;
        <div class="row">
                                     
                    <div class="col-md-12 col-xs-12">
					 <label><b>Bill Reminder</b></label>
					 <div style="float: right;">
					 
              <div class="box-body">
			  <!--<button type="button" class="btn btn-primary btn-lg" >Create New Set</button>-->
                        <a role="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"  href="">Create New Set</a>
						 <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/bms_bills/bills_view_list');?>">Back To Bills</a>
						
						</div>
                    </div>
					&nbsp;
                   
                      <div class="col-md-12">
                      
                   <div class="col-md-1 fnt-txthdng" style="padding: 0px;">Property</div>
                   <div class="col-md-2">
                      <select class="form-control" id="" name="name" class="inp txt-fld" style="width: 168%;margin-bottom: 6%;" onChange="getblo(this.value);">
					 <option value="">Select Property</option>
                            <?php 
                                foreach ($properties as $key=>$val) { 
                                    $selected = isset($property_id) && trim($property_id) != '' && trim($property_id) == $val['property_id'] ? 'selected="selected" ' : '';  
                                    echo "<option value='".$val['property_id']."' ".$selected." data-value='".$val['total_units']."'>".$val['property_name']."</option>";
                                } ?>   
                        </select>

                   </div>
                  
                  <div class="col-md-1"></div>
                   <div class="col-md-1 fnt-txthdng">Block</div>
                  
                   <div class="col-md-2" >
                       <div id="hideblock"> 
                       <select name="unitnosd" class="form-control" id="search_txt" style="width: 106%;" onChange="blo(this.value);">
                            <option  value="">Select</option>
                       
                        </select>
                       
                       
                        
                        </div>
                        <div class="col-md-2" id ="showblock" style="width: 106%;"></div>
                       </div>
                       
                  
                  
                  
                  
                   <div class="col-md-1 fnt-txthdng">Unit No</div>
                   <div class="col-md-2" id="hidu">
                       
                       <select name="unitnosd" class="form-control" id="search_txt" style="width: 106%;" >
                            <option  value="">Select</option>
                       
                        </select>
                       
                       </div>
                        <div class="col-md-2" id ="showus"></div>
                
					 
					 
                  </div>                               
                    
                </div>
			
   
                &nbsp;
 <div class="box-body">
          
		  
              <table id="example2" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;">
                <thead>
                <tr style="background-color: #c5c1c1;">
                  <th class="hidden-xs">S No</th>   
                  <th>Date</th>               
                  <th>Cutoff Date</th>
                  <th>Overdue Amount</th>
				  <th>Overdue Days</th>
				  <th>Created On</th>
				  <th>Action</th>
				 
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
                            <td><?php echo $val->reminder_date; ?></td>
                            <td><?php echo $val->cutoff_date;?></td>
							<td><?php echo $val->overdue_amount;?></td>
							<td><?php echo $val->overdue_days;?></td>
							<td><?php echo $val->created_on;?></td>
							<td><a type="button"  name="remove"  href="<?php echo base_url('index.php/Bms_bills/dowload_reminders/'.$val->id);?>"   class="btn btn-primary btn-Edit">Download</a>
                            <a type="button"  name="remove"  href="" data-toggle="modal" data-target="#myModal1<?php echo $val->id;?>" class="btn btn-primary">Email</a>
							<a type="button"  name="remove"  href="<?php echo base_url('index.php/Bms_bills/delete_reminders/'.$val->id);?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-primary">Delete</a></td>
							
							
                            
                            
                        </tr>
                       
                <?php }
                
                    } else { ?>
                        <tr>
                            <td class="text-center" colspan="4">No Record Found</td>                            
                        </tr>                    
                     <?php } ?>  
 					
                </tbody>                
              </table>
		 
			  
			  
			  
			  
			  
			
         
		 
		 
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
		       <h2>Customize paragraph #3</h2>
			   &nbsp;
				 <div   style="border: 1px solid #999;border-radius: 5px;width: 100%; padding-left: 2%;">
				 &nbsp;
				 <div class="row">
                    <div class="col-md-6 col-xs-6">
                       <td>The following notes will replace paragraph #3 in the reminder letter template.</td>
					  
                    </div>
					             				                    
                                        
                    
                </div>
				&nbsp;
				 <div class="row">
                    <div class="col-md-12 col-xs-12" style="color: red;">
                       <td>After adding/changing the notes, you need to CREATE a NEW reminder set to see the changes.</td>
					  
                    </div>
					             				                    
                                        
                    
                </div>
				
				
				
				&nbsp;
					
				
				
				 </div>
				
				&nbsp;
				<div>
				<form action="<?php echo base_url('index.php/Bms_bills/add_paragraph/');?>" role="form" id="newModalForm1" method="post">
		    <label>1.</label>
             
			 <textarea rows="4" cols="70" name="peregra" id="peregra">
			</textarea>
			 
			 <label><input type="submit" name="sub" id="sub" class="btn btn-primary" value="Add"></label>
		   </div>
              </div>
			</form>
              <!-- /.box-body -->
			  
			   
                </div>
		

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #337ab7;">
          <h4 class="modal-title" style="color: #fff;">New Reminder Set</h4>
          <button type="button" style="color:#fff;margin-top: -23px;" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
		<h3 class="modal-title" style="color: #ea7b7b;" >(*)indicates required fields. </h3>
		<hr/>
        <div class="modal-body" >
		
          <form action="<?php echo base_url('index.php/Bms_bills/add_reminders');?>" role="form" id="newModalForm" method="post" class="form-horizontal">
		 
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
              
              
              <!--add cat section-->
                 
                    
                      <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Property</label>
              <div class="col-md-9" >
                   <select class="form-control" id="" name="name" class="inp txt-fld" style="margin-bottom: 6%; width:60%;" onChange="catnew(this.value);">
						<option value="">All</option>
                            <?php 
                                                foreach ($properties as $key=>$val) { 
                                                    $selected = isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] == $val['property_id'] ? 'selected="selected" ' : '';  
                                                    echo "<option value='".$val['property_id']."' ".$selected.">".$val['property_name']."</option>";
                                                } ?>   
                        </select>
                        </div>
                        </div>
                        
                        
                        <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Unit No</label>
              <div class="col-md-9" >
                   
                   <div id="hideenew">
                   <select name="unitnosd"  class="form-control" id="search_txt" style="width:60%;" >
                       <option value="">Select</option>
                       <?php $pro = $_SESSION['bms_default_property'];
                       $querybv = $this->db->query("SELECT * FROM  bms_property_units where property_id = '$pro'"); ?>
                <?php   foreach ($querybv->result() as $rowbv){ ?>
                       <option  value="<?php echo $rowbv->unit_id; ?>"><?php echo  $rowbv->unit_no; ?></option>
                           
                          <?php }?>
                        </select>
                   
                   </div> <div id ="shonew"></div>
                        </div>
                        </div>
                        
                  
                  <!--category-->
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Reminder Date</label>
              <div class="col-md-9" >
               <input type="text" name="redat" class="txt-fld1 wdt-inpt datepicker" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Cutoff Date</label>
              <div class="col-md-9">
                <input type="text" name="cudat" class="txt-fld1 wdt-inpt datepicker" placeholder="">
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Overdue Amount</label>
              <div class="col-md-9">
                <input type="text" name="overam" class="txt-fld1 wdt-inpt" placeholder="Overdue Amount">
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Overdue Days</label>
              <div class="col-md-9">
                <input type="text" name="overday" class="txt-fld1 wdt-inpt" placeholder="Overdue Days">
              </div>
            </div>
           		
			
            
            
              
              	
            
				
				
			    
					  
					  

			  
             				
		  </table>
        
        </div>
		
		
		
        
        <!-- Modal footer -->
        <div class="modal-footer" style="text-align: center;">
		
          <input  type="submit" class="btn btn-primary" value="Save" >
		  </form>
		   <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
<?php foreach ($common_docs as $key=>$val) {  ?>
<div class="modal fade" id="myModal1<?php echo $val->id;?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #337ab7;">
          <h4 class="modal-title" style="color: #fff;">Email Send Reminder</h4>
          <button type="button" style="color:#fff;margin-top: -23px;" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
		
		<hr/>
        <div class="modal-body">
		
          <form action="<?php echo base_url('index.php/Bms_bills/reminders_send/'.$val->id);?>" id="form" method="post" class="form-horizontal">
		 
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Email Send</label>
              <div class="col-md-9" style="color:red;">
               <input type="text" name="redat" class="txt-fld1 wdt-inpt" placeholder="">
              </div>
            </div>
           
			
			            				
		  </table>
        
        </div>
		
		
		
        
        <!-- Modal footer -->
        <div class="modal-footer" style="text-align: center;">
		
          <input  type="submit" class="btn btn-primary" value="Save" >
		  </form>
		   <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
<?php }?>
 <style>
.form-horizontal .control-label {
    padding-top: 7px;
    margin-bottom: 0;
    text-align: right;
    background-color: #e8e5e4;
}
</style> 		

             
			   
			   
			  
			  
			  
			  
			
         
		 
		 
          <!--div class="row ciov" style="margin: 0px !important;padding: 10px 0; border-top: 1px solid #DCDCDC;border-bottom: 1px solid #DCDCDC;background-color: #F0F0F0;">
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
                
            </div--> 
            
         </div>
          <!--fgdfgdgdgdgd /.box --> 
	

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
  })
</script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<script>
$(function() {

  $("#newModalForm").validate({
    rules: {
      "redat": "required",
      "cudat": "required",
      "overam": "required",
      "overday": "required",
      "overam": "required"
     
    },
    messages: {
      "redat": "Please Enter Your Reminder Date",
      "cudat": "Please Enter Your Cutoff Date",
      "overam": "Please Enter Your Overdue Amount",
      "overday": "Please Enter Your Overdue Days"
      
      
      
    },
    errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );

			if ( element.prop( "type" ) === "checkbox") {
				error.insertAfter( element.parent( "label" ) );
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
});
</script>
<script>
$(function() {

  $("#newModalForm1").validate({
    rules: {
      "peregra": "required",
     
     
    },
    messages: {
      "peregra": "Please Enter Your Reminder Date",
     
      
      
    },
    errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );

			if ( element.prop( "type" ) === "checkbox") {
				error.insertAfter( element.parent( "label" ) );
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
});
</script>
 <script> 

    function cat1(str) {
    // alert(str);
   
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("sho").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url(); ?>ajax/unit_select.php?$q="+str,true);
//	alert("<?php echo base_url(); ?>ajax/unit_select.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hidee").style.display = "none";
    }

</script>


 <script> 

    function catnew(str) {
    // alert(str);
   
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("shonew").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url(); ?>ajax/unit_select.php?$q="+str,true);
//	alert("<?php echo base_url(); ?>ajax/unit_select.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hideenew").style.display = "none";
    }

</script>
<script> 

    function getblo(str) {
     
   //alert("gettt");
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showblock").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/get_recblock.php?$q="+str,true);
   // alert("<?php echo base_url();?>ajax/get_recblock.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hideblock").style.display = "none";
    }
    </script>
    <script> 

    function getblo1(str) {
     
   //alert("gettt");
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showbloc").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/crdit_selete_block.php?$q="+str,true);
   // alert("<?php echo base_url();?>ajax/get_recblock.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hidebloc").style.display = "none";
    }
    </script>
      <script> 

    function blo(str) {
     
  // alert("gettt");
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showus").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/get_recunit.php?$q="+str,true);
  //  alert("<?php echo base_url();?>ajax/getunits.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hidu").style.display = "none";
    }

    </script>
     <script> 

    function blo1(str) {
     
   //alert("gettt");
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showuse").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/cridit_unit.php?$q="+str,true);
  //  alert("<?php echo base_url();?>ajax/getunits.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hidue").style.display = "none";
    }

    </script>

 