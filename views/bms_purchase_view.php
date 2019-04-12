<?php 
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
              <div class="col-md-4" style="padding:0px"><h4 class="recv">Purchase Orders</h4></div>
              
              
              
              
              <div class="col-md-5"></div>
              <div class="col-md-3"  style="    margin-top: 4px;">
              <a href="<?php echo base_url(); ?>index.php/Bms_purchase_order/purchase_add" class="btn btn-primary" style="float:right;">
         New PO</a>
            
              </div>
              
              <div class="col-md-12">
                      
                   <div class="col-md-1 fnt-txthdng" style="padding: 0px;">Property</div>
                   <div class="col-md-2">
                      <select class="form-control" id="" name="name" class="inp txt-fld" style="width: 168%;margin-bottom: 6%;" onChange="cat1(this.value);">
					 <option value="">Select Property</option>
                            <?php 
                                foreach ($properties as $key=>$val) { 
                                    $selected = isset($property_id) && trim($property_id) != '' && trim($property_id) == $val['property_id'] ? 'selected="selected" ' : '';  
                                    echo "<option value='".$val['property_id']."' ".$selected." data-value='".$val['total_units']."'>".$val['property_name']."</option>";
                                } ?>   
                        </select>

                   </div>
                  
                  <div class="col-md-1"></div>
                   <div class="col-md-1 fnt-txthdng">Unit No</div>
                   <div class="col-md-2" id="hidee">
                       
                       <select name="unitnosd" class="form-control" id="search_txt" style="width: 106%;">
                       <option value="">Select</option>
                       
                        <?php
                      $pro = $_SESSION['bms_default_property'];
                       $querybv = $this->db->query("SELECT * FROM  bms_property_units where property_id = '$pro'");
                      
                  ?>
                <?php   foreach ($querybv->result() as $rowbv){ ?>
                     
                       <option  value="<?php echo $rowbv->unit_id; ?>"><?php echo  $rowbv->unit_no; ?></option>
                           
                          <?php }?>
                          
                          
                        </select>
                       
                       </div>
                        <div class="col-md-2" id ="sho"></div>
                    <div class="col-md-2"></div>
					 
                  </div>
              
              </div>
              
             
             <div class="col-md-12">
               <div class="fillter">
              
               <div class="row">
                 <div class="col-md-5">
                 <div class="col-md-2" style="padding: 0px;">PO Num</div>
                   <div class="col-md-2"><input  type="text" name="pooder" class="inp txt-fld" id="search_txt"/></div>
                 </div>
                 <div class="col-md-7">
                 
                  <div class="col-md-1" style="padding: 0px;margin-right: 4%;">Vendor</div>
                  
                  <input  type="text" name="vendors" class="inp txt-fld" id="search_txt" style="width:45%;"/>
               
             
            
              <a href="<?php echo base_url('index.php/Bms_purchase_order/purchase_list_view');?>" class="btn btn-primary" style="float: right;    margin-right: 5px;">Clear</a>
              <!--<a href="<?php echo base_url('index.php/Bms_purchase_order/allshow/');?>" class="btn btn-primary" style="float: right;    margin-right: 5px;">Show All</a>-->
             <input type="submit" value="Show All" name="search" class="btn btn-primary" style="float: right;    margin-right: 5px;">   
               <input type="submit" value="Find" name="search" class="btn btn-primary" style="float: right;    margin-right: 5px;">
                 </div>
               </div>
               <br />
               <div class="row">
                 <div class="col-md-5">
                 <div class="col-md-2" style="padding: 0px;">Status</div>
                   <div class="col-md-2"><input  type="text" name="invoiceno" class="inp txt-fld" id="search_txt" /></div>
                 </div>
                 <div class="col-md-7">
                 
                  <div class="col-md-1" style="padding: 0px;margin-right: 4%;">Description</div>
                  
                  <input  type="text" name="vendor" class="inp txt-fld" id="search_txt" style="width:45%;" />
               
             
            
             
                 </div>
               </div>
			   <br />
               <div class="row">
                 <div class="col-md-2">Date Range</div>
                <div class="col-md-4" style="margin-left: -92px;">
                  <input type="text" name="sdate" class="inp txt-fld datepicker" style="margin-right: 10px; width:37%;" />
                  To
                   <input type="text" name="edate" class="inp txt-fld datepicker" style="margin-left: 10px; width:37%;" />
                </div>
                
                <div class="col-md-6"> 
                <div class="col-md-2" style="padding: 0;">Fin Year</div>
                <div class="col-md-4">
                <select name="year" class="sel slct-bx"  style="margin-left: -42px;">
                 <option value=""></option>
                 <option value="2018">2018</option>
                </select>
                </div>
                </div>
               </div>
               
               
               <br />
               
               
               <div class="row">
                 <div class="col-md-1">Amount</div>
                <div class="col-md-4">
                  <select name="amountone" class="sel slct-bx"  style="margin-right: 10px; width:37%;">
                 <option value=""></option>
                 <option value="1">Less Than</option>
                 <option value="2">More Than</option>
                 <option value="3">Equal</option>
               
                </select>
                  
                   <input type="text" name="amounttwo" class="inp txt-fld" style="margin-left: 10px; width:37%;" />
                </div>
                
                
               </div>
                
                
                
                
                
               
                
                
                
                
                
               </div>
             </div>
			
                                
                        </div>
                        </form>
                        
 <?php
    if(isset($_POST['search']))
    {
        $pro = $_POST['name'];
        $unit = $_POST['unitnosd'];
        $pooder = $_POST['pooder'];
       $vendor = $_POST['vendor'];
        $edate = $_POST['edate'];
        $sdate = $_POST['sdate'];
        $year = $_POST['year'];
        $amountone = $_POST['amountone'];
        $amounttwo = $_POST['amounttwo'];
         $statuss = $_POST['status'];
		
	 $snewDate = date("d-m-Y", strtotime($sdate));
 $enewDate = date("d-m-Y", strtotime($edate));
if(empty($pro)){ $pr="" ; } else {  $pr="and property_id="."'$pro'" ;}
if(empty($unit)){ $un="" ; } else {  $un="and unit_id="."'$unit'" ;}
if(empty($pooder)){ $pooders="" ; } else {  $pooders="and purchas_order="."'$pooder'" ;}

if(empty($vendor)){ $ven="" ; } else { $ven="and description like"."'%$vendor%'" ;}
if(empty($sdate)){ $date="" ; } else {  $date="and date BETWEEN " . "'$snewDate'" .  " and " ."'$enewDate'";}
if(empty($year)){ $years="" ; } else { $years="and year="."'$year'" ;}
if(empty($statuss)){ $status="" ; } else { $status="and status =".$statuss ;}

if(!empty($amountone)){
   
	if($amountone=='1')
	{
		 $amounto="and total <".$amounttwo ;}
	elseif($amountone=='2'){
		 $amounto="and total > ".$amounttwo ;
		}
		else {
			 $amounto="and total = ".$amounttwo ;
			} }
	 else { $amounto="";
	 
	 }


     ?> 
     
      <table id="example2" align="center" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;width: 96%;">
                <thead>
	     <tr style="background-color: #cccccc6b;">
                 <th class="hidden-xs cntr">PO #</th>   
                  <th  class="cntr">Date</th>               
                  <th class="cntr">Vendor</th>
				 <!-- <th  class="cntr">Status</th>-->
                  <th class="cntr">Total(RM)</th>
				 
                </tr>
                </thead>
                <tbody>
	 <?php 
 "SELECT * FROM  bms_purchase_orders where id > '0' $pr $un $invoice  $date $amounto $pooders $ven $years   $status";
 $quer= $this->db->query("SELECT * FROM  bms_purchase_orders where id > '0' $pr $un $pooders  $date $ven $amounto $years  $status");
   $codd = $quer->num_rows();
   if($codd > 0){
  foreach ($quer->result() as $rowe)
  { ?>
 <tr>
                          <td  class="cntr"><?php echo $rowe->purchas_order;?></td>
							<td class="cntr"><?php echo $rowe->date; ?></td>
							
							<td class="cntr"><?php //echo $rowe->property_id;?>NO</td>
						<!--	<td class="cntr" ><?php //$stt =  $rowe->status;
							if($stt==1)//{?><p style="color:green;">Paid</p><?php// } else// { ?><p style="color:red;">Unpaid</p><?php //}?></td>-->
							<td class="cntr" ><?php  echo $rowe->total; ?></td>
							 
                            
                            
                        </tr>
 <?php } }
 else {?><h3><center>No Record Found</center></h3><?php }
 ?>
 </tbody>
 </table> 
      <?php }
	  
	  elseif(!empty($view)) {?>
		       <table id="example2" align="center" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;width: 96%;">
                <thead>
				
                <tr style="background-color: #cccccc6b;">
                 <th class="hidden-xs cntr">PO #</th>   
                  <th  class="cntr">Date</th>               
                  <th class="cntr">Vendor</th>
				 <!-- <th  class="cntr">Status</th>-->
                  <th class="cntr">Total(RM)</th>
				 
                </tr>
                </thead>
                <tbody>
                		 <?php  foreach ($view as $key=>$val) { ?>				
                        <tr>
                          <td  class="cntr"><?php echo $val->purchas_order;?></td>
							<td class="cntr"><?php echo $val->date; ?></td>
							
							<td class="cntr"><?php //echo $val->amount;?>NO</td>
						<!--	<td class="cntr" ><?php $stt =  $val->status;
							if($stt==1){?><p style="color:green;">Paid</p><?php } else { ?><p style="color:red;">Unpaid</p><?php }?></td>
							<td class="cntr" ><?php echo $val->total; ?></td>
							 
                            
                            
                        </tr>
                       
                   <?php }   ?> 
                						
                       
                		
                						
                       
                       
                  
 					
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
                <?php  }?>
                
                  
   
			
			
			  <?php 
			 
			 /*  if(!empty($view) && empty($pro)) {?>
		       <table id="example2" align="center" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;width: 96%;">
                <thead>
				
                <tr style="background-color: #cccccc6b;">
                 <th class="hidden-xs cntr">PO #</th>   
                  <th  class="cntr">Date</th>               
                  <th class="cntr">Vendor</th>
				  <th  class="cntr">Status</th>
                  <th class="cntr">Total(RM)</th>
				 
                </tr>
                </thead>
                <tbody>
                		 <?php  foreach ($view as $key=>$val) { ?>				
                        <tr>
                          <td  class="cntr"><?php echo $val->bay_form;?></td>
							<td class="cntr"><?php echo $val->date; ?></td>
							
							<td class="cntr"><?php //echo $val->amount;?></td>
							<td class="cntr" ><?php echo $val->status;?></td>
							<td class="cntr" ><?php echo $val->subtotal;?></td>
							 
                            
                            
                        </tr>
                       
                   <?php }   ?> 
                						
                       
                		
                						
                       
                       
                  
 					
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
                <?php  }*/?>
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