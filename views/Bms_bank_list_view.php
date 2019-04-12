
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php


           $emailuser = $_SESSION['bms']['email'];
                $genid = $_SESSION['bms']['genid']; 
                $prid = $_GET['default'];
               
   $query1 = $this->db->query("SELECT * FROM  url_idvalidation where user_email ='$emailuser' ORDER BY url_id DESC LIMIT 1");
  foreach ($query1->result() as $row1)
  {
    $generate = $row1->gen_id; 
  }   
  if($generate!=$genid)
  {
      ?><script>//alert("Unauthorize user."); window.location.assign('<?php echo base_url();?>Bms_index/logout');</script><?php 
  }
  $this->load->view('header');
  $pr_id = $_SESSION['bms_default_property'];
  
    $qunewp = $this->db->query("SELECT * FROM `bms_property` WHERE property_id = '$prid'");
  foreach ($qunewp->result() as $tttep)
  {
           $proidp  = $tttep->property_name;
         // echo $proidp;exit;
  }
  
  ?>
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
		  
    
</style>

<form action="<?php echo base_url('index.php/bms_bank/addnew');?>" role="form" id="newModalForm" method="post" enctype="multipart/form-data">
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #337ab7;">
          <h4 class="modal-title" style="color: #fff;">Add Bank</h4>
          <button type="button" style="color:#fff;margin-top: -23px;" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
		<h3 class="modal-title" style="padding-left: 40%;">Add Bank</h3>
		<hr/>
        <div class="modal-body">
		
        
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
              
              <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Property</label>
              <div class="col-md-9" style="color:red;">
                <select class="form-control" id="" name="name" class="txt-fld1 wdt-inpt" style="width: 99%;" onChange="cat2(this.value);">
					 <option value="">Select Property</option>
                            <?php 
                                foreach ($properties as $key=>$val) { 
                                    $selected = isset($property_id) && trim($property_id) != '' && trim($property_id) == $val['property_id'] ? 'selected="selected" ' : '';  
                                    echo "<option value='".$val['property_id']."' ".$selected." data-value='".$val['total_units']."'>".$val['property_name']."</option>";
                                } ?>   
                        </select>
              </div>
            </div>
          
           
            &nbsp;
            
              
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Bank Name</label>
              <div class="col-md-9" style="color:red;">
               <input type="text" name="bankname" class="form-control" value="" placeholder="Bank Name">
              </div>
            </div>
			&nbsp;
			
			  <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Account Type</label>
              <div class="col-md-9" style="color:red;">
                <select class="form-control" id="" name="acctype" class="txt-fld1 wdt-inpt" style="width: 99%;">
						<option value="">Select</option>
						<option value="Maintenance Account">Maintenance Account</option>
						<option value="Sinking Fund Account">Sinking Fund Account</option>
						<option value="Fix Deposit Account">Fix Deposit Account</option>
						<option value="Other Account">Other Account</option>
                            
                        </select>
              </div>
            </div>
            
             &nbsp;
             
             
            <div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Account No.</label>
              <div class="col-md-9">
                <input type="text" name="ifc" class="form-control" value="" placeholder="Account No." >
              </div>
            </div>
			&nbsp;
			<div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Branch Address</label>
              <div class="col-md-9">
                 <input type="text" name="address" class="form-control" value="" placeholder="Branch Address" >
              </div>
            </div>
			&nbsp;
			<div class="form-group">
              <label class="control-label col-md-3" style="background-color: #ffffff;">Branch Number</label>
              <div class="col-md-9">
                 <input type="text" name="num" class="form-control" value="" placeholder="Branch Number">
              </div>
            </div>
			&nbsp;
           		
		
 		  
             				
		  </table>
      
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
             <?php if(isset($_SESSION['flash_msg']) && trim( $_SESSION['flash_msg'] ) != '') {
                    //if($_GET['login_err'] == 'invalid')
                    echo '<div class="alert alert-success msg_notification"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>';
                    echo '</strong>'.$_SESSION['flash_msg'].'</div>';
                    unset($_SESSION['flash_msg']);
                }
            ?>
            &nbsp;
            <?php
            if(isset($_POST['search1']))
            {$name = $_POST['name'];?>
            <script> window.location.assign('<?php echo base_url();?>Bms_bank/bank_list_view/?default=<?php echo $name;?>'); </script><?php  } ?>
           
            	<div class="col-md-12">
                 	<form  method="GET">     
                   <div class="col-md-1 fnt-txthdng" style="padding: 0px;">Property</div>
                   <div class="col-md-3">
                      
                       <select class="form-control" id="" name="default" id="name" class="txt-fld1 wdt-inpt" style="width: 156%;">
                         
					 <option value="">Select Property</option>
                            <?php 
                                foreach ($properties as $key=>$val) { 
                                    $selected = isset($property_id) && trim($property_id) != '' && trim($property_id) == $val['property_id'] ? 'selected="selected" ' : '';  
                                    echo "<option value='".$val['property_id']."' ".$selected." data-value='".$val['total_units']."'>".$val['property_name']."</option>";
                                } ?> 
                           
                        </select>
                   </div>
                  
                  <div class="col-md-1"></div>
                 
                    <div class="col-md-2"></div>
					 
                  </div>
                  
              <div class="box-body" style="padding-top: 15px;">
              
             
       
                  <div class="row" style="margin-top: 4%;">  
                    <div class="col-md-1 fnt-txthdng" style="padding: 6px 21px;">Bank</div>
				   <div class="col-md-5 col-xs-12" style="    padding-left: 30px;">                        
                          <input type="text" name="search_txt" id="search_txt" value="<?php echo isset($_GET['search_txt']) && trim($_GET['search_txt']) != '' ? trim($_GET['search_txt']) : '';?>" class="form-control" placeholder="Enter text to search">
                    </div>
					 <div style="padding-left: 68%;">
                      
					   <a role="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Add Bank</a>
					  
					   <input type="submit" value="Find" name="search" class="btn btn-primary"> 
					   <!--<input type="submit" value="Show All" name="search" class="btn btn-primary" >-->
					    <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Bms_bank/bank_list_view/?default=all');?>">Show All</a>
						 <a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/Bms_bank/bank_list_view');?>">Clear</a>
                    </div>
				<!--	onclick="location.href = '<?php //echo base_url();?>index.php/Receipt/receipt_list_view/';"-->
					
                </div>
                </form>
                
              </div>
              <!-- /.box-body -->
            

    
 


 <?php
    if(isset($_POST['search']))
    {
        
         $prom = $_POST['name'];
        // echo $prom;exit;
         $unit = $_POST['unitnosd'];
       //  echo  $unit;exit;
        $tex = $_POST['search_txt'];
    
if(empty($tex)){ $pr="" ; } else {  echo $pr="and bank_name="."'$tex'" ;}
if(empty($prom)){ $pron="" ; } else { echo $pron="and property_id="."'$prom'" ;}
if(empty($unit)){ $uni="" ; } else {  echo $uni="and unit_id="."'$unit'" ;}
  ?> 
     
      <table id="example2" align="center" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;width: 96%;">
                <thead>
	    <tr style="background-color: #cccccc6b;">
                  <th class="hidden-xs">S No111111</th>   
                  <th>Bank Name</th>               
                  <th>Account No.</th>
                  <th>Branch Address</th>
				   <th>Branch Number</th>
				  
				
					  
					  <th>Action</th>
				 
                </tr>
                </thead>
                <tbody>
	 <?php 
 echo "SELECT * FROM  bms_bank_details where status = '0' $pr $pron $uni";
 $quer= $this->db->query("SELECT * FROM  bms_bank_details where status = '0' $pr $pron $uni");
   $codd = $quer->num_rows();
   if($codd > 0){
    $i=1;
  foreach ($quer->result() as $rowe)
  { ?>
  <tr>
      
                              
                    <!-- Modal -->
  <div class="modal fade" id="myModalLabel<?php echo $rowe->id;?>" role="dialog">
    <div class="modal-dialog">
    
    
  
  
                            <td class="hidden-xs"><?php echo $i++;?></td>
                            <td><?php echo $rowe->bank_name;?></td>
                            <td><?php echo $rowe->ifc_code;?></td>
							<td><?php echo $rowe->branch_address;?></td>
							<td><?php echo $rowe->branch_number;?></td>
							
						
						<td> <a href="#" data-toggle="modal" data-target="#myModals<?php echo $rowe->id;?>" class="btn btn-primary btn-Edit"><i class="fa fa-edit"></i></a>
						&nbsp;&nbsp;
						<a href="<?php echo base_url();?>index.php/Bms_bank/delete_bank/<?php echo $rowe->id;?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-Remove"><i class="fa fa-trash"></i></a> </td>
					    
                            
                        </tr>

                        
 <?php } $i++; }
 else {?><h3><center>No Record Found</center></h3><?php }
 ?>
 </tbody>
 </table> 
      <?php } ?>


<div class="box-body">
     <?php 
     $search_txt = $_GET['search_txt'];
     $default = $_GET['default'];
     
     if(empty($search_txt)){ $pr="" ; } else {   $pr="and bank_name="."'$search_txt'" ;}
     
     if($default==all){ $pron="" ; }
     elseif($default > 0) {  $pron="and property_id="."'$default'" ;}
     //else { $pron="0" ; 
//if(empty($default)){ $pron="" ; } else {  $pron="and property_id="."'$default'" ;}

      if($default || $search_txt){ 
     $quer= $this->db->query("SELECT * FROM  bms_bank_details where status = '0' $pr $pron $uni");}
   $codd = $quer->num_rows();
   if($codd > 0){
  ?>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="hidden-xs">S No</th>   
                  <th>Bank Name</th>               
                  <th>Account No.</th>
                  <th>Branch Address</th>
				   <th>Branch Number</th>
				  
					
					  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php 
                  $i=1;
		
  foreach ($quer->result() as $val)
  { 
     $key = $val->keytype;
     $key_size =   $val->keysize;
     $iv_size = $val->ivsize; 
     $iv = $val->ivtype; 
     
     ?>
     <tr>
                            <td class="hidden-xs"><?php echo $i++;?></td>
<td><?php  $ciphertext_base64 = $val->bank_name; $ciphertext_dec = base64_decode($ciphertext_base64);$iv_dec = substr($ciphertext_dec, 0, $iv_size);
  $ciphertext_dec = substr($ciphertext_dec, $iv_size); echo $plaintext_decs = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
  ?></td>
                            <td><?php $accno = $val->ifc_code;
                            $accno_dec = base64_decode($accno);$iv_dec = substr($accno_dec, 0, $iv_size);
  $accno_dec = substr($accno_dec, $iv_size); echo $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$accno_dec, MCRYPT_MODE_CBC, $iv_dec); ?></td>
  
  
							<td><?php  $branch = $val->branch_address;
							   $branch_dec = base64_decode($branch);$iv_dec = substr($branch_dec, 0, $iv_size);
  $branch_dec = substr($branch_dec, $iv_size); echo $branchname = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$branch_dec, MCRYPT_MODE_CBC, $iv_dec);
  ?></td>
							<td><?php $no = $val->branch_number;
							 $no = base64_decode($no);$iv_dec = substr($no, 0, $iv_size);
  $no = substr($no, $iv_size); echo $number = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$no, MCRYPT_MODE_CBC, $iv_dec);
  ?></td>
							
						
						<td><a href="<?php echo base_url();?>index.php/Bms_bank/edit_bank/<?php echo $val->id;?>"  class="btn btn-primary btn-Edit"><i class="fa fa-edit"></i></a>
						&nbsp;&nbsp;
						<a href="<?php echo base_url();?>index.php/Bms_bank/delete_bank/<?php echo $val->id;?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-Remove"><i class="fa fa-trash"></i></a> </td>
					    
                            
                        </tr>
                                
                     <?php } $i++;?>                     
                                  
                </tbody>                
              </table>
              
            
             
            </div>
             <div id="pagination" style="float: right;">
                       <ul class="tsc_pagination">
                        
                        <!-- Show pagination links -->
                        <?php foreach ($links as $link) {
                            echo "<li>". $link."</li>";
                         } ?>
                </div> 
 <?php }?>
 
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
       // window.location.href="<?php echo base_url('index.php/Bms_bank/bank_list_view');?>?search_txt="+search_txt;
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

    function findbank(str) {
      var search_txt = $('#search_txt').val().replace(/^\s+|\s+$/g,"");
 // alert(search_txt);
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
    xmlhttp.open("GET","<?php echo base_url();?>ajax/bank_find.php?$q="+search_txt,true);  
    //alert("<?php echo base_url();?>ajax/bank_find.php?$q="+search_txt); 
    xmlhttp.send();
   // document.getElementById("hid").style.display = "none";
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
    xmlhttp.open("GET","<?php echo base_url();?>ajax/bank_delet.php?$q="+str,true);  
  // alert("<?php echo base_url();?>ajax/bank_delet.php?$q="+str); 
    xmlhttp.send();
   // document.getElementById("hid").style.display = "none";
    }
}
}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<script>
$(function() {

  $("#newModalForm").validate({
    rules: {
      "name": "required",
      "address": "required",
      "num": "required",
   
    },
    messages: {
      "name": "Please Enter Your Bank Name",
      "address": "Please Enter Your Branch Address",
      "num": "Please Enter Your Branch Number",
     
      
      
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
