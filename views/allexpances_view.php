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
     	<?php
	  $invoiceno = $_GET['invoiceno'];
        $vendor = $_GET['vendor'];
        $edate = $_GET['edate'];
        $sdate = $_GET['sdate'];
        $year = $_GET['year'];
        $amountone = $_GET['amountone'];
        $amounttwo = $_GET['amounttwo'];
        $statuss = $_GET['status'];
       
 $snewDate = date("d-m-Y", strtotime($sdate));
 $enewDate = date("d-m-Y", strtotime($edate));
if(empty($invoiceno)){ $invoice="" ; } else {  $invoice="and invoice_no="."'$invoiceno'" ;}
if(empty($vendor)){ $ven="" ; } else { $ven="and vendor_id="."'$vendor'" ;}
if(empty($sdate)){ $date="" ; } else {  $date="and dates BETWEEN " . "'$snewDate'" .  " and " ."'$enewDate'";}
if(empty($year)){ $years="" ; } else { $years="and fineyear=".$year ;}
if(!empty($amountone)){
	if($amountone=='1')
	{
		 $amounto="and amount <".$amounttwo ;}
	elseif($amountone=='2'){
		 $amounto="and amount > ".$amounttwo ;
		}
		else {
			 $amounto="and amount = ".$amounttwo ;
			}
	 } else { $amounto="" ;
	 
	 }

if(empty($statuss)){ $status="" ; } else { $status="and status =".$statuss ;}


?>      
            <!-- /.box-header -->
            <form method="POST">
              <div class="box-body" style="padding-top: 5px;">
              <div class="col-md-12  tp-rw">
              <div class="col-md-4" style="padding:0px"><h4 class="recv">Expences</h4></div>
              <div class="col-md-5"></div>
              <div class="col-md-3"  style="    margin-top: 4px;">
              <a href="<?php echo base_url(); ?>index.php/Expances" class="btn btn-primary" style="float:right;">
          Invoice List</a>
            
              </div>
              </div>
              <hr style="width:100%;" />
               <h3 style="    padding: 0px 15px;">Expance Item</h3>	
             <div class="col-md-12">
               <div class="fillter">
              
               <div class="row">
                 <div class="col-md-5">
                 <div class="col-md-2" style="padding: 0px;">Description</div>
                   <div class="col-md-2"><input  type="text" name="des" class="inp txt-fld" id="search_txt" /></div>
                 </div>
                 <div class="col-md-7">
                 
                  <div class="col-md-1" style="padding: 0px;">Vendor</div>
                  
                  <input  type="text" name="vendor" class="inp txt-fld" id="search_txt" style="width:45%;" />
               
             
            
              <a href="<?php echo base_url('index.php/Expances');?>" class="btn btn-primary" style="float: right;    margin-right: 5px;">Clear</a>
                <a href="<?php echo base_url('index.php/Expances/allshow');?>" class="btn btn-primary" style="float: right;    margin-right: 5px;">Show All</a>
               <input type="submit" value="Find" name="search" class="btn btn-primary list_filter" style="float: right;    margin-right: 5px;">
                 </div>
               </div>
               <br />
               
               <div class="row">
                 <div class="col-md-1">Date Range</div>
                <div class="col-md-4">
                  <input type="date" name="sdate" class="inp txt-fld" style="margin-right: 10px; width:37%;" />
                  To
                   <input type="date" name="edate" class="inp txt-fld" style="margin-left: 10px; width:37%;" />
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
                
                 <div class="col-md-1" style="padding: 0;">Inv #</div>
                <div class="col-md-2">
                <input type="text" name="invoiceno" class="inp txt-fld" >
                </div> 
                <div class="col-md-1" style="padding: 0;  margin-left: 122px;">Status</div>
                <div class="col-md-4">
                <select name="status" class="sel slct-bx">
                 <option value="">Select</option>
                  <option value="0">Unpaid</option>
                 <option value="1">Paid</option>
                  <option value="2">Partial</option>
                   <option value="3">Returned</option>
                    <option value="4">Overpaid</option>
                 
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
                  <select name="subcategory" class="sel slct-bx"  style="margin-right: 10px; width:37%;">
                 <option value="">Select</option>
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
        $invoiceno = $_POST['invoiceno'];
        $vendor = $_POST['vendor'];
        $edate = $_POST['edate'];
        $sdate = $_POST['sdate'];
        $year = $_POST['year'];
        $amountone = $_POST['amountone'];
        $amounttwo = $_POST['amounttwo'];
        $status = $_POST['status'];
		$des = $_POST['des'];
       
        
        
    if($invoiceno || $vendor || $edate || $sdate || $year || $amountone || $amounttwo || $status || $des || $category )
      { ?><script>
window.location.assign("<?php echo base_url(); ?>index.php/Expances/?invoiceno=<?php echo $invoiceno;?>&vendor=<?php echo $vendor;?>&sdate=<?php echo $sdate;?>&edate=<?php echo $edate;?>&year=<?php echo $year;?>&category=<?php echo $category;?>&subcat=<?php echo $subcat;?>&status=<?php echo $status;?>&des=<?php echo $des;?>&amountone=<?php echo $amountone;?>&amounttwo=<?php echo $amounttwo;?>");      
   </script> <?php }  
    }
    
    ?>
                        
                        
                   
                        
			
			
			
			  <?php if(!empty($view) || $invoiceno=="" || $invoiceno) {?>
		       <table id="example2" align="center" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;width: 96%;">
                <thead>
				
                <tr style="background-color: #cccccc6b;">
                 <th class="hidden-xs cntr">No.</th>
                  <th class="hidden-xs cntr">Date</th> 
                  <th  class="cntr">Description</th>    
                  <th class="cntr">Vendor</th>
                   <th class="cntr">Category</th>
                  <th class="cntr">Total(RM)</th>
                   <th class="cntr">Tax</th>
                    <th class="cntr">Invoice#</th>
				  <th  class="cntr">Status</th>
				 
                </tr>
                </thead>
                <tbody>
                		 <?php 
                   
                    if(!empty($view)) {
                      
                        foreach ($view as $key=>$val) { ?>				
                        <tr>
                          <td  class="cntr"><?php echo $val->dates;?></td>
							<td class="cntr"><?php echo $unitno = $val->invoice_no;  $ven = $val->vender_id;?></td>
							<td class="cntr"><?php 
							
							$querydp = $this->db->query("SELECT * FROM  bms_property_vendors where ven_id='$ven'");
  foreach ($querydp->result() as $rowpp)
  { echo  $ownner = $rowpp->ven_name; } ?></td>
							<td class="cntr"><?php echo $val->amount;?></td>
							<td class="cntr" ><?php echo $val->status;?></td>
							<td class="cntr" ><?php echo $val->dueon;?></td>
							 
                            
                            
                        </tr>
                        <?php }
                       
                
                    } 
                    elseif($invoiceno || $vendor || $sdate || $year || $amountone || $amounttwo || $status)
                    {?>
                    
                    
 <?php 

//echo "SELECT * FROM  expenses where mainstatus = '1' $invoice $ven $date $amounto $amountt $status";
 $quer= $this->db->query("SELECT * FROM  expenses where mainstatus = '1' $invoice $ven $date $amounto $amountt $status");
   $codd = $quer->num_rows();
   if($codd > 0){
  foreach ($quer->result() as $rowe)
  { ?>
                         
                    <tr>
                          <td  class="cntr"><?php echo $rowe->dates;?></td>
							<td class="cntr"><?php echo $unitno = $rowe->invoice_no; $ven = $rowe->vender_id;?></td>
							<td class="cntr"><?php $querydp = $this->db->query("SELECT * FROM  bms_property_vendors where ven_id='$ven'");
  foreach ($querydp->result() as $rowpp)
  { echo $ownner = $rowpp->ven_name; } ?></td>
							<td class="cntr"><?php echo $rowe->amount;?></td>
							<td class="cntr" ><?php echo $rowe->status;?></td>
							<td class="cntr" ><?php echo $rowe->dueon;?></td>
							 
                            
                            
                        </tr>    
                        			



<?php } }
                        else {?><h3><center>No Record Found</center></h3><?php }?>
                  <?php  }
                    
                    else { ?>
                        <tr>
                            <td class="text-center" colspan="10">No Record Found</td>                            
                        </tr>                    
                    <?php } ?> 
                						
                       
                		
                						
                       
                       
                  
 					
                </tbody>                
              </table><?php }?>
	
                
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

</script>