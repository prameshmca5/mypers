
<?php $this->load->view('header');?>
<?php $this->load->view('sidebar'); //echo "<pre>";print_r($properties); ?>
  
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
  
		 
<!--	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
		  
		<style>
		
		#pagination{
    margin: 40 40 0;
}
.input_text {
    display: inline;
    margin: 100px;
}
.input_name {
    display: inline;
    margin: 65px;
}
.input_email {
    display: inline;
    margin-left: 73px;
}
.input_num {
    display: inline;
    margin: 36px;
}
.input_country {
    display: inline;
    margin: 53px;
}
ul.tsc_pagination li a 
{ 
    border:solid 1px; 
    border-radius:3px; 
    -moz-border-radius:3px;
    -webkit-border-radius:3px;
    padding:6px 9px 6px 9px;
}
ul.tsc_pagination li 
{
    padding-bottom:1px;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{ 
    color:#FFFFFF; 
    box-shadow:0px 1px #EDEDED;
    -moz-box-shadow:0px 1px #EDEDED;
    -webkit-box-shadow:0px 1px #EDEDED; 
}
ul.tsc_pagination 
{ 
    margin:4px 0;
    padding:0px; 
    height:100%;
    overflow:hidden; 
    font:12px 'Tahoma';
    list-style-type:none; 
}
ul.tsc_pagination li 
{ 
    float:left;
    margin:0px;
    padding:0px; 
    margin-left:5px;
}
ul.tsc_pagination li a 
{ 
    color:black; 
    display:table-cell; 
    text-decoration:none;
    padding:7px 10px 7px 10px; 
}
ul.tsc_pagination li a img 
{
    border:none;
}
ul.tsc_pagination li a
{ 
    color:#0A7EC5;
    border-color:#8DC5E6; 
    background:#F8FCFF; 
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{ 
    text-shadow:0px 1px #388DBE;
    border-color:#3390CA; 
    background:#58B0E7; 
    background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
    background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #3c8dbc), color-stop(0.02, #3c8dbc), color-stop(1, #58B0E7));
}
		
		
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
       <div style="clear: both;height: 0px;"></div>
              <div class="box-header" style="padding-bottom: 0px;">
              <h3 class="box-title" style="font-weight: bold;">Expences Subcategory</h3>
              
              <a href="<?php echo base_url();?>index.php/Expance_item_category" class="btn btn-primary" style="float:right; ">Manage Category</a>
   &nbsp;&nbsp;
 <a href="#" data-toggle="modal" data-target="#myModals" class="btn btn-primary" style="float:right;margin-right:5px;">Add Subcategory</a>
 
             
               
            </div>
			<d <div class="row">
            <div class="col-md-3"></div>
             <div class="col-md-6">
              
              <?php if(isset($_SESSION['flash_msg']) && trim( $_SESSION['flash_msg'] ) != '') {
                    //if($_GET['login_err'] == 'invalid')
                    echo '<div class="alert alert-success msg_notification"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>';
                    echo '</strong>'.$_SESSION['flash_msg'].'</div>';
                    unset($_SESSION['flash_msg']);
                }
            ?>
            </div>
             <div class="col-md-3"></div>
            </div>
            
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th >Sr.No.</th>
                   <th>Category Name</th>
                  <th>Subcategory Name</th>
                  
                  <th >Action</th>
                </tr>
                </thead>
                <tbody>
                
                <?php 
                   
                    if(!empty($sub)) { $i = 1;
                       foreach ($sub as $key=>$val) { ?>
                        <tr>
                            <td><?php echo $i;?></td>
                             <td><?php $su = $val->excat_id;
$query = $this->db->query("SELECT * FROM  expenseitem_category where 	excat_id='$su'");
  foreach ($query->result() as $row){ echo $mcat = $row->excat_name;}
  ?></td>
                            <td><?php echo $val->exsub_name;?></td>
                            
                       <td> 
                       <a href="#" data-toggle="modal" data-target="#myModal<?php echo $val->exsub_id;?>" title="Edit"><i class="fa fa-edit"></i></a>
                       
                           &nbsp;&nbsp;
 <a href="<?php echo base_url();?>index.php/Expance_item_category/subdelete/<?php echo $val->exsub_id;?>" onclick="return confirm('Are you sure you want to delete this Subcategory?');" title="delete"><i class="fa fa-trash"></i></a> 
                              
                            </td>
                        
                        </tr>
                    <?php $i++;?>
                    
                 
                    
    <div class="modal fade" id="myModal<?php echo $val->exsub_id;?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #337ab7;">
          <h4 class="modal-title" style="color: #fff;">Update Category</h4>
          <button type="button" style="color:#fff;margin-top: -23px;" class="close" data-dismiss="modal">&times;</button>
        </div>
        
       
        <div class="modal-body">
		
          <form method="POST" action="<?php echo base_url();?>index.php/Expance_item_category/updatesubcat">
		  <div class="form-body">
          
          <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Category Name</label>
              <div class="col-md-9" style="color:red;">
               <select name="cat" class="form-control">
               <option value="<?php echo $su;?>"><?php echo $mcat;?></option>
               <?php
			   $query = $this->db->query("SELECT * FROM  expenseitem_category");
  foreach ($query->result() as $row){?>
               <option value="<?php echo $row->excat_id;?>"><?php echo $row->excat_name;?></option><?php }?>
               </select>
                
              </div>
            </div>&nbsp;
            
            
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Subcategory Name</label>
              <div class="col-md-9" style="color:red;">
               <input type="text" name="name" class="form-control" value="<?php echo $val->exsub_name; ?>">
                <input type="hidden" name="subcat_id" class="form-control" value="<?php echo $val->exsub_id; ?>">
              </div>
            </div>
		   </div>
		&nbsp;
		  <!-- Modal footer -->
        <div class="modal-footer" style="text-align: center;">
		
          <input  type="submit" name="submit" class="btn btn-primary" value="Update">
		   <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  
      <?php }
                
                    } else { ?>
                        <tr>
                            <td class="hidden-xs text-center" colspan="7">No Record Found</td>
                            <td class="visible-xs text-center" colspan="4">No Record Found</td>
                        </tr>                    
                    <?php } ?> 
                </tbody>
               
              </table>
            </div>
			
			
			
    <div class="modal fade" id="myModals">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #337ab7;">
          <h4 class="modal-title" style="color: #fff;">Add Subcategory</h4>
          <button type="button" style="color:#fff;margin-top: -23px;" class="close" data-dismiss="modal">&times;</button>
        </div>
        
       
        <div class="modal-body">

          <form method="POST" action="<?php echo base_url();?>index.php/Expance_item_category/addsub" class="form-horizontal">
		  <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Category Name</label>
              <div class="col-md-9" style="color:red;">
               <select name="cat" class="form-control" required>
               <option>Select Category</option>
               <?php
			   $query = $this->db->query("SELECT * FROM  expenseitem_category");
  foreach ($query->result() as $row){?>
               <option value="<?php echo $row->excat_id;?>"><?php echo $row->excat_name;?></option><?php }?>
               </select>
                
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Subcategory Name</label>
              <div class="col-md-9" style="color:red;">
               <input type="text" name="name" class="form-control" placeholder="Enter Subcategory name" required>
                
              </div>
            </div>
		   </div>
		&nbsp;
		  <!-- Modal footer -->
        <div class="modal-footer" style="text-align: center;">
		
          <input  type="submit" name="submit" class="btn btn-primary" value="Save">
		   <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        </div>
        </form>
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
        window.location.href="<?php echo base_url('index.php/Bms_bills/credit_list_view');?>?search_txt="+search_txt;
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
<script> 

    function cat(str) {
      var ven_text = $('#search_txt').val();
  // alert(ven_text);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showdiv").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url(); ?>ajax/find_credit.php?$q="+ven_text,true);
	//alert("<?php echo base_url(); ?>ajax/find_credit.php?$q="+ven_text);
    xmlhttp.send();
    document.getElementById("hid").style.display = "none";
    }

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>


<script>
$(function() {

  $("#newModalForm").validate({
    rules: {
      "name": "required",
      "code": "required"
    },
    messages: {
      "name": "Please Enter Your Charge Name",
      "code": "Please Enter Your Charge code"
    },
    errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );

			if ( element.prop( "type" ) === "checkbox" ) {
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

    function cat2(str) {
  //   alert(str);
   
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showss").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url(); ?>ajax/bank_unit.php?$q="+str,true);
//	alert("<?php echo base_url(); ?>ajax/unit_select.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hiden").style.display = "none";
    }

</script>
