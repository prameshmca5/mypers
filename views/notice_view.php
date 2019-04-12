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
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		  
		  
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
			
			
			
			
			
			
			
			<div class="row">
                    <div class="col-md-3 col-xs-6">
                        <h3><b>Notice of Demand</b></h3>
                    </div>
                      <div class="row"  style="margin-top: 15px;">               
                    <div style="padding-left: 70%;">
                       
                    
                   		<div class="col-md-1 col-xs-6" style="padding-left: 60%;" >
                      <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Bms_bills/bills_view_list');?>">Back to Bills</a>
                    </div>               
                    </div></div>
                </div>
				&nbsp;	
			<div class="col-md-12" style="margin-bottom: 1%;">
                      
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
		<div class="col-md-12 col-xs-12 no-padding">
            <div class="col-md-12 col-sm-12 col-xs-12 right-box" style="border: 1px solid #99999973;border-radius: 5px;background-color: #cccccc52;">
                                
								
						
						<div class="row">
							<div class="row"  style="    padding: 30px;">
						

						
						<div  class="col-md-6">		
								
								 <div class="col-md-5 col-xs-6" style="margin-left: 7%;">
								  <label   style="font-size: 15px;">Cutoff Date</label>
								 </div>
                    <div class="col-md-6 col-xs-6">
                       
						<input type="text" name="" class=" txt-fld1 wdt-inpt" style="width: 83%;" value="">
						
					
                    </div>
					
					
                     
					
					</div>
					</div>
                </div>
						
								
							<div class="row"   style="border-bottom: 1px solid #fff;">
							<div class="row"  style="    padding: 30px;">
						

						
						<div  class="col-md-6">		
								
								 <div class="col-md-6 col-xs-6">
								  <label   style="font-size: 15px;">Amount more than RM</label>
								 </div>
                    <div class="col-md-5 col-xs-6">
                       
						<input type="text" name="" class=" txt-fld1 wdt-inpt" value="">
						
					
                    </div>
					
					
                     
					
					</div>
					<div  class="col-md-6">
					  <div class="col-md-5 col-xs-6">
					  
					    <label  style="font-size: 15px;    float: right;">Overdue More than</label>
					  </div>
					
                    <div class="col-md-5 col-xs-6">
                      
						
						<input type="text" name="" class=" txt-fld1 wdt-inpt" value="">
						
                    </div>
                                       
                    				
                      <div class="col-md-2 col-xs-2" style="">
                       <label  style="font-size: 15px;float: right;">Days</label>
                    </div>
                                        
                    </div></div>
					 <label  style="font-size: 15px;margin-left: 4%;">(Grace Period: 14 Days)</label>
                </div>
				
			
				<label  style="font-size: 19px;">To be printed on the form</label>
				<div class="row">
							<div class="row"  style="    ">
						

						
						<div  class="col-md-6">		
								
								 <div class="col-md-5 col-xs-6" style="margin-left: 7%;">
								  <label   style="font-size: 15px;">Date of NOD</label>
								 </div>
                    <div class="col-md-6 col-xs-6">
                       
						<input type="date" name="" class=" txt-fld1 wdt-inpt" style="width: 83%;" value="">
						
					
                    </div>
					
					
                     
					
					</div>
					
					</div>
                </div>
				&nbsp;
				<div class="row">
							<div class="row"  style="   ">
						

						
						<div  class="col-md-6">		
								
								 <div class="col-md-5 col-xs-6" style="margin-left: 7%;">
								  <label   style="font-size: 15px;">Authorized Person</label>
								 </div>
                    <div class="col-md-6 col-xs-6">
                       
						<input type="text" name="" class=" txt-fld1 wdt-inpt" style="width: 100%;" value="">
						
					
                    </div>
					
					
                     
					
					</div>
					
					</div>
                </div>
                  &nbsp;
                    <div class="row">
							<div class="row"  style="   ">
						

						
						<div  class="col-md-6">		
								
								 <div class="col-md-5 col-xs-6" style="margin-left: 7%;">
								  <label   style="font-size: 15px;">Designation</label>
								 </div>
                    <div class="col-md-6 col-xs-6" style="border-radius: 4px;">
                       
						<input type="text" name="" class=" txt-fld1 wdt-inpt" style="width: 100%;" value="">
						
					
                    </div>
					
					
                     
					
					</div>
					
					</div>
                </div>
				
                   &nbsp;   
				   
                  <div class="col-md-10 col-xs-12" style="margin-top: 2%;margin-bottom: 2%;margin-left: 10%;">
                    <div class="col-md-6">
                        <input type="submit" name="" id="" value="Download" class="btn btn-primary" style="float: right;">
					  
                    </div>
					 <div class="col-md-6">
                     <input type="submit" name="" id="" value="Clear" class="btn btn-primary" style=" margin-left: -22px;">
                    </div>
                    
                  </div>
			 
                
				&nbsp;
				
				
								
								
                                    </div>
                                   
        </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 no-padding" style="padding-top: 10px !important;">
                                    <div class="col-md-12 col-sm-12 col-xs-12 no-padding">                                    
                                        
                                    </div>
                                    
                                </div>
								
                                
                               
                               
                               
                                                            
                                
                            </div>
                              
                        </div>
			
		
			
      
                
                
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
<style>
.col-md-3 {
    width: 34%;
}
</style>
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