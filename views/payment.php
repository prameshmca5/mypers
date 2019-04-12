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
		
  
  
  
  body {
    font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
    font-weight: 400;
  /*  overflow-x: hidden;*/
  /*  overflow-y: auto;*/
   /* overflow-y: hidden !important;*/
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
              <div class="col-md-4" style="padding:0px"><h4 class="recv">Payments</h4></div>
              <div class="col-md-5"></div>
              <div class="col-md-3"  style="    margin-top: 4px;">
             
            
              </div>
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
                       <option  value="">Select</option>
                           <?php
                      $pro = $_SESSION['bms_default_property'];
                       $querybv = $this->db->query("SELECT unit_id,unit_no FROM  bms_property_units where property_id = '$pro'");
                      
                  ?>
                <?php   foreach ($querybv->result() as $rowbv){ ?>
                       
                       <option  value="<?php echo $rowbv->unit_id; ?>"><?php echo  $rowbv->unit_no; ?></option>
                           
                          <?php }?>
                        </select>
                       
                       </div>
                        <div class="col-md-2" id ="sho"></div>
                    <div class="col-md-2"></div>
                  
					 
                  </div>
              
             <div class="col-md-12">
               <div class="fillter">
              
               <div class="row">
                 <div class="col-md-5">
                 <div class="col-md-2" style="padding: 0px;">Payment #</div>
                   <div class="col-md-2"><input  type="text" name="payment" class="inp txt-fld" id="search_txt" /></div>
                 </div>
                 <div class="col-md-7">
                 
                  <div class="col-md-1" style="padding: 0px;">Cheque No</div>
                  
                  <input  type="text" name="cheque" class="inp txt-fld" id="search_txt" style="width: 30%; margin-left: 10px;"/>
               
             
            
              <a href="<?php echo base_url('index.php/Payment');?>" class="btn btn-primary" style="float: right;    margin-right: 5px;">Clear</a>
               
                <input type="submit" value="Show All" name="search" class="btn btn-primary list_filter" style="float: right;    margin-right: 5px;">
               <input type="submit" value="Find" name="search" class="btn btn-primary list_filter" style="float: right;    margin-right: 5px;">
                 </div>
               </div>
               <br />
               
               <div class="row">
                 <div class="col-md-5">
                 <div class="col-md-2" style="padding: 0px;">Pay From A/C </div>
                   <div class="col-md-2"><select class="sel slct-bx" name="payfrom" style="width: 250px;">
                   <option value="">Select</option>
                   <option value="Bank Current Account">Bank Current Account</option>
                   <option value="Bank SF Current Account">Bank SF Current Account</option>
                   <option value="Cash On Hand">Cash On Hand</option>
                   <option value="Fixed Deposit">Fixed Deposit</option>
                   <option value="Petty Cash">Petty Cash</option>
                   </select>
                   </div>
                 </div>
                 <div class="col-md-7">
                 
                  <div class="col-md-1" style="padding: 0px;">Payment Mode</div>
                  
                 <select class="sel slct-bx" name="paymode" style="width: 200px;margin-left: 10px;">
                   <option value="">Select</option>
                   <option value="cash">Cash</option>
                   <option value="cheque">Cheque</option>
                   <option value="online">Online</option>
                   </select>
               
             
            
                 </div>
               </div>
               <br>
               
               <div class="row">
                 <div class="col-md-5">
                 <div class="col-md-2" style="padding: 0px;">Invoice No. </div>
                   <div class="col-md-2">
                    <input type="text" name="invoiceno" class="inp txt-fld">
                   </div>
                   
                   
                   
                 </div>
                 <div class="col-md-5">
                 <div class="col-md-1" style="padding: 0px;">Payee</div>
                   <div class="col-md-2"><input  type="text" name="payee" class="inp txt-fld" style="margin-left: 10px;" /></div>
                 </div>
               </div>
               <br>
              
               
               
               <div class="row">
                 <div class="col-md-1">Date Range</div>
                <div class="col-md-4">
                  <input type="text" name="sdate" class="inp txt-fld datepicker" style="margin-right: 10px; width:37%;" />
                  To
                   <input type="text" name="edate" class="inp txt-fld datepicker" style="margin-left: 10px; width:37%;" />
                </div>
                
                <div class="col-md-6"> 
                <div class="col-md-1" style="padding: 0;">Fin Year</div>
                <div class="col-md-4">
                <select name="year" class="sel slct-bx">
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
                
                <div class="col-md-6">
                
                 <div class="col-md-1" style="padding: 0;">Cancelled</div>
                <div class="col-md-2">
              <select name="cancelled" class="sel slct-bx" style="width: 120px;">
                 <option value="">Select</option>
                 
                  <option value="no">No</option>
                   <option value="yes">Yes</option>
                
                
                 
                </select>
                </div> 
                <div class="col-md-1" style="padding: 0;  margin-left: 122px;">Returned</div>
                <div class="col-md-4">
                <select name="returned" class="sel slct-bx" style="width: 120px;">
                 <option value="">Select</option>
                 <option value="no">No</option>
                   <option value="yes">Yes</option>
                
                
                 
                </select>
                </div>
                </div>
               </div>
               
               
               <div class="row" style="margin-top:15px;">
                 <div class="col-md-1">Category</div>
                <div class="col-md-3">
                  <select name="category" class="sel slct-bx" onChange="yol(this.value);"  style="margin-right: 10px;">
                 <option value="">Select</option>
                 <?php   $querydpp = $this->db->query("SELECT * FROM  expenseitem_category");
  foreach ($querydpp->result() as $rowd)
  { ?> <option value="<?php echo $rowd->excat_id;?>"><?php echo $rowd->excat_name;?></option><?php }?>
              </select>
              </div>
              <div class="col-md-4">
              <div id="subshow"></div>
              <div id="subhid">
                  <select name="subcategorys" class="sel slct-bx"  style="margin-right: 10px; width:37%;">
                 <option value="">Subcategory</option>
                </select>
                </div>
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
        $invoiceno = $_POST['invoiceno'];
        $cheque = $_POST['cheque'];
		$payfrom = $_POST['payfrom'];
		$paymode = $_POST['paymode'];
		$payee = $_POST['payee'];
        $edate = $_POST['edate'];
        $sdate = $_POST['sdate'];
        $year = $_POST['year'];
        $amountone = $_POST['amountone'];
         $amounttwo = $_POST['amounttwo'];
        $returned = $_POST['returned'];
		$cancelled = $_POST['cancelled'];
		$category = $_POST['category'];
		$subcategory = $_POST['subcat'];
		
 $snewDate = date("Y-m-d", strtotime($sdate));
 $enewDate = date("Y-m-d", strtotime($edate));
 if(empty($pro)){ $pr="" ; } else {  $pr="and property_id="."'$pro'" ;}
 if(empty($unit)){ $un="" ; } else {  $un="and unit_id="."'$unit'" ;}
if(empty($invoiceno)){ $invoice="" ; } else {  $invoice="and selfinvoice_id="."'$invoiceno'" ;}
if(empty($cheque)){ $ven="" ; } else { $ven="and chequeno="."'$cheque'" ;}
if(empty($sdate)){ $date="" ; } else {  $date="and paydate BETWEEN " . "'$snewDate'" .  " and " ."'$enewDate'";}
if(empty($year)){ $years="" ; } else { $years="and payyear=".$year ;}

if(empty($category)){ $categorys="" ; } else { $categorys="and category="."'$category'" ;}
if(empty($subcategory)){ $subcategorys="" ; } else { $subcategorys="and subcategory=".$subcategory ;}
if(empty($payee)){ $payees="" ; } else { $payees="and vender_name like "."'$payee%'" ;}
if(empty($paymode)){ $paymodes="" ; } else { $paymodes="and paymode="."'$paymode'" ;}
if(empty($payfrom)){ $payfroms="" ; } else { $paymentby="and payfroms="."'$payfrom'" ;}
if(empty($cancelled)){ $cancelleds="" ; } else { $cancelleds="and cancelled="."'$cancelled'" ;}
if(empty($returned)){ $returneds="" ; } else { $returneds="and returned="."'$returned'" ;}

if(!empty($amountone)){
	if($amountone=='1')
	{ 
		 $amountos="and paidamount <"."'$amounttwo'" ;}
	elseif($amountone=='2'){
		 $amountos="and paidamount > "."'$amounttwo'" ;
		}
		else {
			 $amounto="and paidamount = "."'$amounttwo'" ;
			}
	 } else { $amounto="" ;
	 
	 }

if(empty($statuss)){ $status="" ; } else { $status="and status =".$statuss ;}
		?>
        
        <table id="example2" align="center" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;width: 96%;">
                <thead>
				
                <tr style="background-color: #cccccc6b;">
                 <th class="hidden-xs cntr">No.</th>
                  <th class="hidden-xs cntr">Date</th> 
                  <th  class="cntr">Payee</th>    
                  <th class="cntr">Amount(RM)</th>
                   <th class="cntr">Cheque/Ref No</th>
                  <th class="cntr">Canclled</th>
                   <th class="cntr">Returned</th>
                </tr>
                </thead>
                <tbody>
            <?php   $i = 1; 
//echo "SELECT * FROM  payment_voucher where selfinvoice_id > '0' $pr $un $invoice $ven $date $amountos  $years $categorys $subcategorys $returneds $cancelleds $payees $payfroms $paymodes";
 $quer= $this->db->query("SELECT * FROM  payment_voucher where selfinvoice_id > '0' $pr $un $invoice $ven $date $amountos $years $categorys $subcategorys $returneds $cancelleds $payees $payfroms $paymodes");
   $codd = $quer->num_rows();
   if($codd > 0){
  foreach ($quer->result() as $rowe)
  { ?>
                         
                    <tr>
                    <td  class="cntr"><?php echo $i;?></td>
                          <td  class="cntr"><?php echo $rowe->paydate;?></td>
							<td class="cntr"><?php echo $vname = $rowe->vender_name;
							if(empty($vname)){$ven = $rowe->vender_id ;
							$querydp = $this->db->query("SELECT * FROM  bms_property_vendors where ven_id='$ven'");
  foreach ($querydp->result() as $rowpp)
  { echo $ownner = $rowpp->ven_name; }}
  
   ?></td>
							
							<td class="cntr"><?php echo $rowe->paidamount;?></td>
							<td class="cntr" ><?php echo $rowe->chequeno;?></td>
							<td class="cntr" ><?php echo $rowe->cancelled;?></td>
                            <td class="cntr" ><?php echo $rowe->returned;?></td>
							 
                            
                            
                        </tr>    
                        			
<?php $i++;?>


<?php }
   } else {?><center><h3>No data found.</h3></center> <?php }?>
                </tbody>
                </table>
                
				<?php  } ?>
                        
                        
                   
                        
			
			
			
			  <?php 
			 // $shows = $_GET['show'];
			  if(empty($_POST['search'])){
			  if(!empty($views)) {?>
		       <table id="example2" align="center" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;width: 96%;">
                <thead>
				
                <tr style="background-color: #cccccc6b;">
                 <th class="hidden-xs cntr">No.</th>
                  <th class="hidden-xs cntr">Date</th> 
                  <th  class="cntr">Payee</th>    
                  <th class="cntr">Amount(RM)</th>
                   <th class="cntr">Cheque/Ref No</th>
                  <th class="cntr">Canclled</th>
                   <th class="cntr">Returned</th>
                </tr>
                </thead>
                <tbody>
                		 <?php 
                  $i=1;
                      foreach ($views as $key=>$val) { ?>				
                        <tr>
                    <td  class="cntr"><?php echo $i;?></td>
                          <td  class="cntr"><?php echo $val->paydate;?></td>
							<td class="cntr"><?php echo $vname = $val->vender_name;
							if(empty($vname)){$ven = $val->vender_id ;
							$querydp = $this->db->query("SELECT * FROM  bms_property_vendors where ven_id='$ven'");
  foreach ($querydp->result() as $rowpp)
  { echo $ownner = $rowpp->ven_name; }}
  
   ?></td>
							
							<td class="cntr"><?php echo $val->paidamount;?></td>
							<td class="cntr" ><?php echo $val->chequeno;?></td>
							<td class="cntr" ><?php echo $val->cancelled;?></td>
                            <td class="cntr" ><?php echo $val->returned;?></td>
							 
                            
                            
                        </tr><?php $i++;?>
                        <?php }  ?> 
                   </tbody>                
              </table>
              
               <div id="pagination" style="float: right;">
                       <ul class="tsc_pagination">
                        
                        <!-- Show pagination links -->
                        <?php foreach ($links as $link) {
                            echo "<li>". $link."</li>";
                         } ?>
                </div> 
              
              
              <?php } }
			  else {?><center><h3></h3></center> <?php }?>
	
                
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
    function yol(str) {
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("subshow").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url(); ?>ajax/expancesubcategory.php?$q="+str,true);
    xmlhttp.send();
    document.getElementById("subhid").style.display = "none";
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