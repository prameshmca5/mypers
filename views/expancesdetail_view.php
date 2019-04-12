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
		 
  
  
  .fillter {
	      border: 1px solid #3c8dbc5c;
    padding: 10px 10px;
	}
.sel {
	width: 100%;
    border-radius: 4px;}
.inp {
	border-radius: 4px;}
	
	
	
.slct-bx
{
    padding: 6px;
    border-radius: 4px;	
	
}

.txt-fld
{
    padding: 6px;	
	

}


.fnt-txthdng
{
	
    font-size: 16px;	
	
}

.tp-rw
{
	
padding-top: 10px;
    padding-bottom: 10px;	
	
}
.recv{
	
    font-size: 25px;
    font-weight: 600;
}
.cntr
{
    text-align: center;
	
	
}
	

	
  </style>
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
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid cust-container-fluid">

    <div class="box box-primary">
       <!-- /.box-header -->
            <form method="POST">
              <div class="box-body" style="padding-top: 5px;">
              <div class="col-md-12  tp-rw">
              <div class="col-md-4" style="padding:0px"><h4 class="recv">Expenses Detail</h4></div>
              <div class="col-md-5"></div>
              <div class="col-md-3"  style="    margin-top: 4px;">
              <a href="<?php echo base_url(); ?>index.php/Expances/allexpances" class="btn btn-primary" style="float:right;">
          All Expenses</a>
            
              </div>
              </div>
              <hr style="width:100%;" />
               
               
               <?php
               
                $inv = $this->uri->segment('3');
   
   $queryd = $this->db->query("SELECT * FROM  expenses where invoice_no='$inv'");
  foreach ($queryd->result() as $rowd)
  {
    $property_id = $rowd->property_id;
    $block_id = $rowd->block_id;
    $po_num = $rowd->po_num;
    $totalamount = $rowd->amount;
    $notes = $rowd->notes;
    $status = $rowd->status;
    $vender_id = $rowd->vender_id;
     $dates = $rowd->dates;
  }
  
   $qunewp = $this->db->query("SELECT * FROM `bms_property` WHERE property_id = '$property_id'");
  foreach ($qunewp->result() as $tttep)
  {
           $proidp  = $tttep->property_name;
         // echo $proidp;exit;
  }
  
  
  
  $querydpbi = $this->db->query("SELECT * FROM `bms_property_block` WHERE block_id = '$block_id'");
  foreach ($querydpbi->result() as $blli)
  {   $blid = $blli->block_id;
      $blname = $blli->block_name;
  }
  
   $querydpbi = $this->db->query("SELECT * FROM `bms_property_block` WHERE block_id = '$block_id'");
  foreach ($querydpbi->result() as $blli)
  {   $blid = $blli->block_id;
      $blname = $blli->block_name;
  }
  
   $quer = $this->db->query("SELECT * FROM `bms_service_provider` WHERE service_provider_id = '$vender_id'");
  foreach ($quer->result() as $sser)
  {   $ven = $sser->provider_name;
     
  }
  
  ?>
  
 <p style=" padding: 0px 25px; font-size:18px;"> Property Name - <?php echo $proidp ;?> <span style="float:right;">Date -  <?php echo $dates ;?></span></p>
  
 <p style=" padding: 0px 25px; font-size:18px;"> Block Name - <?php echo $blname ;?>  <span style="float:right;">Status -  <?php if($status=='unpaid') { ?><span style="color:red;"> <?php
 echo $status ;?></span> <?php } else { ?><?php echo $status ;?><?php }  ;?></span> </p>  
  
 <p style=" padding: 0px 25px; font-size:18px;"> Vendor Name - <?php echo $ven ;?> </p>
 <br>
 <h3 style=" padding: 0px 25px; font-size:16px;">Item Detail</h3>
  <table id="example2" align="center" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;width: 96%;">
                <thead>
	    <tr style="background-color: #cccccc6b;">
                  <th class="hidden-xs cntr"> Item </th>   
                  <th  class="cntr">Des</th>               
                  <th class="cntr">Taxes</th>
                  <th class="cntr">Amount</th>
                </tr>
                </thead>
                <tbody>
	 <?php 
 
  foreach ($view as $rowe)
  { ?>
 <tr>
                            <td  class="cntr"><?php echo $rowe->item_name;?></td>
							<td class="cntr"><?php echo $rowe->description;?></td>
							<td class="cntr"><?php echo $rowe->taxes;?></td>
							<td class="cntr"><?php echo $rowe->amount;?></td>
							
                            
                        </tr>  
                        
 <?php }  ?>
 </tbody>
   </tfoot>
   <td  class="cntr"></td>
							<td class="cntr"></td>
							<td class="cntr">Total</td>
							<td class="cntr"><?php echo $totalamount;?></td>
   </tfoot>
 </table> 
     
                        
                        
                   
                        
			
			
			
		
	
                
              </div>
              
              
              <!-- /.box-body -->
      
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

    function cat(str) {
     
   
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
    xmlhttp.open("GET","<?php echo base_url(); ?>ajax/reciptview_category.php?$q="+str,true);
//	alert("<?php echo base_url(); ?>ajax/reciptview_category.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hid").style.display = "none";
    }
    
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