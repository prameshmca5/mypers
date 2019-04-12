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
      ?><script>//alert("Unauthorize user."); window.location.assign('<?php echo base_url();?>Bms_index/logout');</script><?php 
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
        
         <a role="button" class="btn btn-primary"  href="<?php echo base_url();?>index.php/Expances" style="float:right;">Invoice List</a>
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
				   <div class="col-md-4 col-xs-12">                        
                          <input type="text" id="search_txt" value="<?php echo isset($_GET['search_txt']) && trim($_GET['search_txt']) != '' ? trim($_GET['search_txt']) : '';?>" class="form-control" placeholder="Enter text to search">
                    </div>
					 <div style="padding-left: 68%;">
                      
					   <a role="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"  href="">Add Vendors</a>
					   <a href="javascript:;" role="button" class="btn btn-primary list_filter" onclick="find(this.value);">Find</a>
					    <a role="button" class="btn btn-primary" onclick="outsten();">Show All</a>
						 <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Vandors/vendors_list_view');?>">Clear</a>
                    </div>
					
					
                </div>
                
                
              </div>
              <!-- /.box-body -->
              <div id="editshow"></div>
              
              <div id="show"></div>
              <div id="showw"></div>
              
              
 
<form role="form" id="bms_frm" action="<?php echo base_url('index.php/Vandors/add_vendorser');?>" method="post" enctype="multipart/form-data">
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #337ab7;">
          <h4 class="modal-title" style="color: #fff;">Add Vendors</h4>
          <button type="button" style="color:#fff;margin-top: -23px;" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
		<h3 class="modal-title" style="padding-left: 40%;">Add Vendors</h3>
		<hr/>
        <div class="modal-body">
		
          <form action="#" id="form" class="form-horizontal">
		 
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Name</label>
              <div class="col-md-9" style="color:red;">
               <input type="text" name="name" class="form-control" value="" placeholder="Vendors Name">
              </div>
            </div>
			&nbsp;
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Email</label>
              <div class="col-md-9">
                <input type="text" name="email" class="form-control" value="" placeholder="Email Address" >
              </div>
            </div>
			&nbsp;
			<div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Address</label>
              <div class="col-md-9">
                 <input type="text" name="address" class="form-control" value="" placeholder="Vendors Address" >
              </div>
            </div>
			&nbsp;
			<div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Work</label>
              <div class="col-md-9">
                 <input type="text" name="Work" class="form-control" value="" placeholder="Vendors Work">
              </div>
            </div>
			&nbsp;
           		<div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Category</label>
              <div class="col-md-9">
                <input type="text" name="category" class="form-control" value="" placeholder="Vendors Category" >
              </div>
            </div>
			&nbsp;
			<div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Phone Number</label>
              <div class="col-md-9">
                 <input type="text" name="num" class="form-control" value="" placeholder="Vendors number" >
              </div>
            </div>
            &nbsp;
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Vendors Balance</label>
              <div class="col-md-9">
                 <input type="text" name="Balance" class="form-control" value="" placeholder="Vendors number" >
              </div>
            </div>
            
            
              
              	
            
				
				
			    
					  
					  

			  
             				
		  </table>
        </form>
        </div>
		&nbsp;
		
		
        
        <!-- Modal footer -->
        <div class="modal-footer" style="text-align: center;">
		
          <input  type="submit" name="submit" class="btn btn-primary" value="Save">
		   <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        </div>
        <form>
      </div>
    </div>
  </div>
  
</div>



 
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

<script type="text/javascript">
    $(document).ready(function(){
        $("button").click(function(){

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('ajax/script.php');?>',
                success: function(data) {
                   // alert(data);
                    $("p").text(data);

                }
            });
   });
});
</script>
<script>

$(document).ready(function () {
    
    $('#property_id').focus();
    $('.msg_notification').fadeOut(5000);
    
    $('.list_filter').click(function () {
        var search_txt = $('#search_txt').val().replace(/^\s+|\s+$/g,"");
       // window.location.href="<?php echo base_url('index.php/Vandors/vendors_list_view');?>?search_txt="+search_txt;
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

    function outsten(str) {
     
  // alert(str);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("show").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/vandors_view.php?$q="+str,true);  
   // alert("<?php echo base_url();?>ajax/vandors_view.php?$q="+str); 
    xmlhttp.send();
    document.getElementById("showw").style.display = "none";
    }

    </script>
<script> 

    function find(str) {
      var search_txt = $('#search_txt').val().replace(/^\s+|\s+$/g,"");
  //alert(search_txt);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showw").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/vanders_find.php?$q="+search_txt,true);  
    //alert("<?php echo base_url();?>ajax/vanders_find.php?$q="+search_txt); 
    xmlhttp.send();
   // document.getElementById("hid").style.display = "none";
    }

    </script>  
    <script> 

    function edit(str) {
     
 // alert(str);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("editshow").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/edit_vandors.php?$q="+str,true);  
  //  alert("<?php echo base_url();?>ajax/edit_vandors.php?$q="+str); 
    xmlhttp.send();
    document.getElementById("show").style.display = "none";
    }

    </script>
    <script> 

    function update(q) {
      //  alert(q);
         //var q = $('#ven_name').val();
         var ven_name = $('#ven_name').val();
        // alert(ven_name);
         var ven_email = $('#ven_email').val();
         var ven_addr = $('#ven_addr').val();
         var ven_work = $('#ven_work').val();
         var ven_cat = $('#ven_cat').val();
         var ven_num = $('#ven_num').val();
     
 // alert(str);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      //document.getElementById("editshow").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/ven_update.php?$q="+q+"&$ven_name="+ven_name+"&$ven_email="+ven_email+"&$ven_addr="+ven_addr+"&$ven_work="+ven_work+"&$ven_cat="+ven_cat,true);  
   // alert("<?php echo base_url();?>ajax/ven_update.php?$q="+q+"&$ven_name="+ven_name+"&$ven_email="+ven_email+"&$ven_addr="+ven_addr+"&$ven_work="+ven_work+"&$ven_cat="+ven_cat); 
    xmlhttp.send();
    
    window.location="<?php echo base_url();?>index.php/Vandors/vendors_list_view";
   // document.getElementById("show").style.display = "none";
    }

    </script>  
    <script> 

    function vendel(str) {
    {
        
        if(confirm('Sure To Remove This Record ?'))
	{
	
	
        
        
 // alert(str);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("show").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/ven_delte.php?$q="+str,true);  
  //  alert("<?php echo base_url();?>ajax/ven_delte.php?$q="+str); 
    xmlhttp.send();
   // document.getElementById("hid").style.display = "none";
    }
}
}
    </script> 
   