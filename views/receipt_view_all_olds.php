<?php $this->load->view('header');?>
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
     	<?php /*
	  $reciptno = $_GET['reciptno'];
        $unitno = $_GET['unitno'];
        $edate = $_GET['edate'];
        $sdate = $_GET['sdate'];
        $year = $_GET['year'];
        $bank = $_GET['bank'];
        $checkno = $_GET['checkno'];
        $fromd = $_GET['fromd'];
        $cancle = $_GET['cancle'];
        $return = $_GET['return'];
        $issueby = $_GET['issueby'];
        $paymentmode = $_GET['paymentmode'];
        $subtype = $_GET['subtype'];
        $category = $_GET['category'];
        $subcategory = $_GET['subcategory'];
        
       
 $snewDate = date("d-m-Y", strtotime($sdate));

 $enewDate = date("d-m-Y", strtotime($edate));



if(empty($reciptno)){ $recipte="" ; } else {  $recipte="and payment.receiptno="."'$reciptno'" ;}
if(empty($unitno)){ $unit="" ; } else { $unit="and payment.unit_no="."'$unitno'" ;}
if(empty($sdate)){ $date="" ; } else {  $date="and payment.paydate BETWEEN " . "'$snewDate'" .  " and " ."'$enewDate'";}
if(empty($year)){ $years="" ; } else { $years="and payment.year=".$year ;}
if(empty($bank)){ $banks="" ; } else { $banks="and payment_detail.bankcheck=".$bank ;}
if(empty($checkno)){ $checknos="" ; } else { $checknos="and payment_detail.checkno=".$checkno ;}
if(empty($fromd)){ $froms="" ; } else { $froms="and payment_detail.checkdate =".$fromd ;}
if(empty($cancle)){ $cancles="" ; } else { $cancles="and payment.status=".$cancle ;}
if(empty($return)){ $returns="" ; } else { $returns="and payment.status=".$return ;}
if(empty($issueby)){ $issue="" ; } else { $issue="and payment_detail.issueby=".$issueby ;}
if(empty($paymentmode)){ $pay="" ; } else { $pay="and payment.paymode=".$paymentmode ;}
if(empty($subtype)){ $subtypes="" ; } else { $subtypes="and payment_detail.subtype=".$subtype ;}
if(empty($category)){ $categorys="" ; } else { $categorys="and payment_detail.categorys=".$category ;}
if(empty($subcategory)){ $subcategorys="" ; } else { $subcategorys="and payment_detail.subcategorys=".$subcategory ;}
*/
?>      
            <!-- /.box-header -->
            <form method="POST">
              <div class="box-body" style="padding-top: 5px;">
              
            
              <div class="col-md-12  tp-rw">
              <div class="col-md-4" style="padding:0px"><h4 class="recv">Reciepts</h4></div>
              <div class="col-md-5"></div>
              <div class="col-md-3"  style="    margin-top: 4px;">
              <button class="btn btn-primary" style="">New Recipt</button>
              <button class="btn btn-primary">e-Payment</button>
              </div>
              </div>
              
               <div class="col-md-12">
                      
                   <div class="col-md-1 fnt-txthdng" style="padding: 0px;">Property</div>
                   <div class="col-md-2">
                       <select class="form-control" id="" name="name" class="inp txt-fld" style="width: 168%;margin-bottom: 6%;" onChange="cat1(this.value);">
						<option value="">All</option>
                            <?php 
                                                foreach ($properties as $key=>$val) { 
                                                    $selected = isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] == $val['property_id'] ? 'selected="selected" ' : '';  
                                                    echo "<option value='".$val['property_id']."' ".$selected.">".$val['property_name']."</option>";
                                                } ?>   
                        </select>
                   </div>
                   <div class="col-md-1"></div>
                   <div class="col-md-1 fnt-txthdng">Unit No</div>
                   <div class="col-md-2" id="hidee">
                       
                       <select name="unitnosd" class="form-control"  style="width: 106%;">
                           <option  value="">Select</option>
                           <?php
                      $pro = $_SESSION['bms_default_property'];
                       $querybv = $this->db->query("SELECT unit_no FROM  bms_property_units where property_id = '$pro'");
                      
                  ?>
                <?php   foreach ($querybv->result() as $rowbv){ ?>
                       
                       <option  value="<?php echo $rowbv->unit_no; ?>"><?php echo  $rowbv->unit_no; ?></option>
                           
                          <?php }?>
                          
                          
                       
                        </select>
                       
                       </div>
                        <div class="col-md-2" id ="sho"></div>
                    <div class="col-md-2"></div>
                  
					 
                  </div>
              
             <div class="col-md-12">
               <div class="fillter">
                <div class="row" style="margin-top: 10px;">
                  <div class="col-md-12">
                   <div class="col-md-1 fnt-txthdng" style="padding: 0px;">Reciept no</div>
                   <div class="col-md-2"><input  type="text" name="reciptno" class="inp txt-fld" id="search_txt" /></div>
                   <div class="col-md-1"></div>
                   <div class="col-md-1 fnt-txthdng"></div>
                   <div class="col-md-2"><input type="hidden" name="unitnos"  class="inp  txt-fld" id="uni" /></div>
                    <div class="col-md-2"></div>
                     <div class="col-md-3">
                         <input type="submit" value="Find" name="search" class="btn btn-primary list_filter" style="">
                         
                           <input type="submit" value="Show All" name="search" class="btn btn-primary list_filter" style="">
                   
            <!--  <a href="<?php echo base_url('index.php/receipt/show_all/');?>" class="btn btn-primary">Show All</a>-->
              <a href="<?php echo base_url('index.php/receipt/receipt_view');?>" class="btn btn-primary">Clear</a>
                     </div>
                  </div>
                </div>
                
                
                <div class="row" style="margin-top: 10px;">
                  <div class="col-md-12">
                   <div class="col-md-1 fnt-txthdng" style="padding: 0px;">Date Range</div>
                   <div class="col-md-2"><input type="text" name="sdate"   class="inp  txt-fld datepicker"/></div>
                   <div class="col-md-1 fnt-txthdng" style="text-align: center;">To</div>
                   <div class="col-md-2"><input type="text" name="edate"  class="inp  txt-fld datepicker" /></div>
                     <div class="col-md-1"></div>
                   <div class="col-md-1 fnt-txthdng" style="text-align: center;">Fin Year</div>
                   <div class="col-md-2"><select class="sel slct-bx" name="year">
                   <option value="">Select</option><option value="2018">2018</option>
                   </select></div>
                  </div>
                </div>
                
                <div class="row" style="margin-top: 10px;">
                  <div class="col-md-12">
                   <div class="col-md-1 fnt-txthdng" style="padding: 0px;">Bank</div>
                   <div class="col-md-2"><input type="text" name="bank"  class="inp  txt-fld"/></div>
                     <div class="col-md-1"></div>
                   <div class="col-md-1  fnt-txthdng" style="text-align: center;">Chq no.</div>
                   <div class="col-md-2"><input type="text" name="checkno"  class="inp  txt-fld" /></div>
                   <div class="col-md-1 fnt-txthdng" style="text-align: center;">From</div>
                   <div class="col-md-2"><input type="text" name="fromd"  class="inp txt-fld"/></div>
                  </div>
                </div>
                
                <div class="row" style="margin-top: 10px;">
                  <div class="col-md-12">
                   <div class="col-md-1 fnt-txthdng" style="padding: 0px;">Cancelled</div>
                   <div class="col-md-2" style="padding-right: 0px;">
				   <select  class="sel  slct-bx" name="cancel"><option  value="">Select</option>
				   <option value="0">No</option>
				   <option  value="1">Yes</option>
				   </select></div>
                     <div class="col-md-1"></div>
                   <div class="col-md-1  fnt-txthdng" style="text-align: center;">Returened</div>
                   <div class="col-md-2" style="padding-right: 0px;"><select class="sel slct-bx" name="return"><option  value="">Select</option>
                   <option  value="0">No</option>
                   <option  value="1">Yes</option></select></div>
                   <div class="col-md-1  fnt-txthdng" style="text-align: center;padding: 0;">Issued By</div>
                   <div class="col-md-2" style="padding-right: 0px;"><select class="sel slct-bx" name="issueby"><option  value="">Select</option></select></div>
                  </div>
                </div>
                
                <div class="row" style="margin-top: 10px;">
                  <div class="col-md-12">
                   <div class="col-md-1  fnt-txthdng" style="padding: 0px;">Pymt Mode</div>
                   <div class="col-md-2" style="padding-right: 0px;">
				   <select class="sel slct-bx" name="pymentmode">
				   <option  value="">Select</option>
				   <option  value="cash">Cash</option>
				   <option  value="cheque">Cheque</option>
				   <option  value="card">Card</option>
				   <option  value="online">Online</option>
				   <option value="creditbal">CreditBal</option>
			       <option value="other">Others</option>
				   <option value="renodep">RenoDep</option>
				   <option value="epayment">Epayment</option>
				   </select></div>
                   <div class="col-md-1"></div>
                   <div class="col-md-1  fnt-txthdng">Sub-Type</div>
                   <div class="col-md-2" style="padding-right: 0px;">
				   <select class="sel  slct-bx" name="subtype">
				   <option value="">Select</option>
				   <option value="cmdcasg">CDM cash</option>
				   <option value="cmdcheque">CDM cheque</option>
				   <option value="internetbanking">Internat Banking</option>
				   <option value="atm">ATM</option>
				   </select></div>
                  </div>
                </div>
                
                <div class="row" style="margin-top: 10px;">
                  <div class="col-md-12">
                   <div class="col-md-1  fnt-txthdng" style="padding: 0px;">Category</div>
                   <div class="col-md-2" style="padding-right: 0px;"><select class="sel  slct-bx" name="category" onChange="cat(this.value);">
				   <option  value="">Select</option>
				   <option value="Access Cart">Access Cart</option>
				   <option value="admin charges">admin charges</option>
				   <option value="Deposit">Deposit</option>
				   <option value="Fines">Fines</option>
				   <option value="Insurance">Insurance</option>
				   <option value="Legal Fees">Legal Fees</option>
				   <option value="Maintenance Fee">Maintenance Fee</option>
				   <option value="Quit Rent">Quit Rent</option>
				   <option value="Rental">Rental</option>
				   <option value="Sinking Fund">Sinking Fund</option>
				   <option value="Utilities">Utilities</option>  
				   
				   </select></div>
                   
                  
                   <div class="col-md-2" style="padding-right: 0px;">
				   <div id="hid">
				   <select class="sel  slct-bx"><option>Select</option>
				   </select>
				   </div>
				   <div id="showdiv"></div>
				    <a href="<?php echo base_url('index.php/receipt/baill_exl');?>" class="btn btn-primary" style="margin-left: 111%;margin-top: -41%;">Export</a>
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
        $reciptno = $_POST['reciptno'];
          $name = $_POST['name'];
         $unitnosd = $_POST['unitnosd'];
        $edate = $_POST['edate'];
        $sdate = $_POST['sdate'];
        $year = $_POST['year'];
        $bank = $_POST['bank'];
        $checkno = $_POST['checkno'];
        $fromd = $_POST['fromd'];
        $cancle = $_POST['cancle'];
        $return = $_POST['return'];
        $issueby = $_POST['issueby'];
        $paymentmode = $_POST['paymentmode'];
        $subtype = $_POST['subtype'];
        $category = $_POST['category'];
        $subcategory = $_POST['subcategory'];
        
        
        if(empty($name)){ $names="" ; } else {  $names="and payment.receiptno="."'$reciptno'" ;}
        
        if(empty($unitnosd)){ $unitnosds="" ; } else {  $unitnosds="and payment_detail.unit_no="."'$unitnosd'" ;}
        
        
 $snewDate = date("d-m-Y", strtotime($sdate));
 $enewDate = date("d-m-Y", strtotime($edate));
 if(empty($name)){ $names="" ; } else {  $names="and payment.property_id="."'$name'" ;}
 
if(empty($reciptno)){ $recipte="" ; } else {  $recipte="and payment.receiptno="."'$reciptno'" ;}
if(empty($unitno)){ $unit="" ; } else { $unit="and payment.unit_no="."'$unitno'" ;}
if(empty($sdate)){ $date="" ; } else {  $date="and payment.paydate BETWEEN " . "'$snewDate'" .  " and " ."'$enewDate'";}
if(empty($year)){ $years="" ; } else { $years="and payment.year="."'$year'" ;}
if(empty($bank)){ $banks="" ; } else { $banks="and payment_detail.bankcheck="."'$bank'" ;}
if(empty($checkno)){ $checknos="" ; } else { $checknos="and payment_detail.checkno="."'$checkno'" ;}
if(empty($fromd)){ $froms="" ; } else { $froms="and payment_detail.checkdate =".$fromd ;}
if(empty($cancle)){ $cancles="" ; } else { $cancles="and payment.status=".$cancle ;}
if(empty($return)){ $returns="" ; } else { $returns="and payment.status=".$return ;}
if(empty($issueby)){ $issue="" ; } else { $issue="and payment_detail.issueby="."'$issueby'" ;}
if(empty($paymentmode)){ $pay="" ; } else { $pay="and payment.paymode="."'$paymentmode'" ;}
if(empty($subtype)){ $subtypes="" ; } else { $subtypes="and payment_detail.subtype="."'$subtype'" ;}
if(empty($category)){ $categorys="" ; } else { $categorys="and payment_detail.categorys="."'$category'" ;}
if(empty($subcategory)){ $subcategorys="" ; } else { $subcategorys="and payment_detail.subcategorys="."'$subcategory'" ;}  

?>
<table id="example2" align="center" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;width: 96%;">
                <thead>
				
                <tr style="background-color: #cccccc6b;">
                  <th class="hidden-xs cntr">Receipt No</th>   
                  <th  class="cntr">Date</th>               
                  <th class="cntr">Unit No</th>
                  <th class="cntr">Received Form</th>
				  <th  class="cntr">Payment Mode</th>
				  <th class="cntr">Cancelled</th>
				  <th class="cntr">Returened</th>
				  <th class="cntr">Amount(RM)</th>
				   <th class="cntr">Action</th>
                </tr>
                </thead>
                <tbody>
                		
                    
                    
 <?php 

  //echo "SELECT * FROM  payment join payment_detail on payment.receiptno = payment_detail.receiptno where payment.selstatus='0' $recipte $unit $date $years $banks $checknos $froms $cancles $returns $issue $pay  $categorys $subcategorys $unitnosds $names group by payment.receiptno";
 $quer= $this->db->query("SELECT * FROM  payment join payment_detail on payment.receiptno = payment_detail.receiptno where payment.selstatus='0' $recipte $unit $date $years $banks $checknos $froms $cancles $returns $issue $pay  $categorys $subcategorys $unitnosds $names group by payment.receiptno");
   $codd = $quer->num_rows();
   if($codd > 0){
  foreach ($quer->result() as $rowe)
  { ?>
                        <tr>
                           
                            <td  class="cntr"><a href="<?php echo base_url();?>index.php/receipt/receipt_id/<?php echo $rowe->receiptno; ?>"><?php echo $rowe->receiptno;?></a></td>
                            <td  class="cntr"><?php echo $rowe->paydate;?></td>
							<td class="cntr"><?php echo $unitno = $rowe->unit_no;?></td>
							<td class="cntr"><?php    $querydp = $this->db->query("SELECT * FROM  bms_property_units where unit_no='$unitno'  LIMIT 1");
  foreach ($querydp->result() as $rowpp)
  { echo $ownner = $rowpp->owner_name; }?></td>
							<td class="cntr"><?php echo $rowe->paymode;?></td>
							<td class="cntr">-</td>
							<td class="cntr">-</td>
							<td class="cntr" ><?php echo $rowe->totalamount;?></td>
							<td><a href="javascript:;" onclick="printDiv1('<?php echo base_url();?>index.php/receipt/print1/<?php echo $rowe->receiptno; ?>')" class="btn btn-primary" title="Print">Print</i></a>
							<a role="button" class="btn btn-primary" data-toggle="modal" data-target="#myModals<?php echo $rr = $rowe->receiptno; ?>" >Email</a></td>
							 
                            
          


                            
                        </tr> 
                         <div class="modal fade" id="myModals<?php echo $rr = $rowe->receiptno; ?>">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 75%; left: 12%;">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #337ab7;">
          <h4 class="modal-title" style="color: #fff;">Email Receipt </h4>
          <button type="button" style="color:#fff;margin-top: -23px;" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
		
		
        <div class="modal-body">
		
        
		   <form action="<?php echo base_url('index.php/receipt/recieptspdf/'.$rowe->receiptno);?>" name="" id="" method="post">
          <input type="hidden" value="" name="book_id">
          <div class="form-body">
        
       
         <div class="row">
            <div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="background-color: #e8e5e4;padding: 8px 10px; text-align:right;">Receipt No</label>
              <div class="col-md-8" style="color:red;">
              <?php echo $rowe->receiptno; ?>
              </div>
              </div>
            </div>
            </div>
            
            
            
               <div class="row">
            <div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="background-color: #e8e5e4;padding: 8px 10px; text-align:right;">Receipt Date</label>
              <div class="col-md-8" style="color:red;">
              <?php echo $rowe->paydate;?>
              </div>
              </div>
            </div>
            </div>
            
            
               <div class="row">
            <div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="background-color: #e8e5e4;padding: 8px 10px; text-align:right;">Unit No</label>
              <div class="col-md-8" style="color:red;">
               <?php echo $rowe->unit_no;?>
              </div>
              </div>
            </div>
            </div><hr>
            
            
               <div class="row">
            <div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="padding: 8px 10px; text-align:right;">Send To*</label>
              <div class="col-md-8" style="color:red;">
              <input type="" value="<?php echo $ownner;?>" name="send" class="form-control">
              </div>
              </div>
            </div>
            </div>
            
             <div class="row">
            <div class="form-group">
                <div class="col-md-12">
             
              <div class="col-md-8" style="color: #c7c4c4;margin-left: 33%;">
             User Commas(.)to separate email addresses
              </div>
              </div>
            </div>
            </div>
            <?php $querydp = $this->db->query("SELECT * FROM  bms_property_units where unit_no='$unitno' LIMIT 1");
  foreach ($querydp->result() as $rowp)
  {  $email = $rowp->email_addr; } ?>
            <div class="row">
            <div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="padding: 8px 10px; text-align:right;">Email Address*</label>
              <div class="col-md-8" style="color:red;">
              <input type="" value="<?php echo $email;?>" name="send" class="form-control">
              </div>
              </div>
            </div>
            </div>
           
            
            
            
         			
		
           
  </div>
		
		
		
        
        <!-- Modal footer -->
        <div class="modal-footer" style="text-align: center;">
		  <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Yes" >
          <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
</div>



<?php } } else { ?><center><h3>No data found.</h3></center><?php }?>	
                </tbody>                
              </table>
<?php   } ?>
                    
                    
                    
                    
             <?php
			  if(empty($_POST['search'])){ 
			   if(!empty($views)) { 
			   ?><table id="example2" align="center" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;width: 96%;">
                <thead>
				
                <tr style="background-color: #cccccc6b;">
                  <th class="hidden-xs cntr">Receipt No</th>   
                  <th  class="cntr">Date</th>               
                  <th class="cntr">Unit No</th>
                  <th class="cntr">Received Form</th>
				  <th  class="cntr">Payment Mode</th>
				  <th class="cntr">Cancelled</th>
				  <th class="cntr">Returened</th>
				  <th class="cntr">Amount(RM)</th>
				   <th class="cntr">Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
                 foreach ($views as $key=>$val) { ?>				
                        <tr>
                           
                            <td  class="cntr"><a href="<?php echo base_url();?>index.php/receipt/receipt_id/<?php echo $val->receiptno; ?>"><?php echo $val->receiptno;?></a></td>
                            <td  class="cntr"><?php echo $val->paydate;?></td>
							<td class="cntr"><?php echo $unitno = $val->unit_no;?></td>
							<td class="cntr"><?php $querydp = $this->db->query("SELECT * FROM  bms_property_units where unit_no='$unitno' LIMIT 1");
  foreach ($querydp->result() as $rowpp)
  { echo $ownner = $rowpp->owner_name; } ?></td>
							<td class="cntr"><?php echo $val->paymode;?></td>
							<td class="cntr">-</td>
							<td class="cntr">-</td>
							<td class="cntr" ><?php echo $val->totalamount;?></td>
							<td><a href="javascript:;" onclick="printDiv1('<?php echo base_url();?>index.php/receipt/print1/<?php echo $val->receiptno; ?>')" class="btn btn-primary" title="Print">Print</i></a>
							<a role="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rr = $val->receiptno; ?>" >Email</a></td>
							 
                            
                            
                        </tr>
                        
                <div class="modal fade" id="myModal<?php echo $rr = $val->receiptno; ?>">
   
    <div class="modal-dialog">
      <div class="modal-content" style="width: 75%; left: 12%;">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #337ab7;">
          <h4 class="modal-title" style="color: #fff;">Email Receipt </h4>
          <button type="button" style="color:#fff;margin-top: -23px;" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
		
		
        <div class="modal-body">
		
        
		 
          <input type="hidden" value="" name="book_id">
          <div class="form-body">
        
        <form action="<?php echo base_url('index.php/receipt/recieptspdf/'.$val->receiptno);?>" name="" id="" method="post">
         <div class="row">
            <div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="background-color: #e8e5e4;padding: 8px 10px; text-align:right;">Receipt No</label>
              <div class="col-md-8" style="color:red;">
              <?php echo $val->receiptno; ?>
              </div>
              </div>
            </div>
            </div>
            
            
            
               <div class="row">
            <div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="background-color: #e8e5e4;padding: 8px 10px; text-align:right;">Receipt Date</label>
              <div class="col-md-8" style="color:red;">
              <?php echo $val->paydate;?>
              </div>
              </div>
            </div>
            </div>
            
            
               <div class="row">
            <div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="background-color: #e8e5e4;padding: 8px 10px; text-align:right;">Unit No</label>
              <div class="col-md-8" style="color:red;">
               <?php echo $val->unit_no;?>
              </div>
              </div>
            </div>
            </div><hr>
            
            
               <div class="row">
            <div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="padding: 8px 10px; text-align:right;">Send To*</label>
              <div class="col-md-8" style="color:red;">
              <input type="" value="<?php echo $ownner;?>" name="send" class="form-control">
              </div>
              </div>
            </div>
            </div>
            
             <div class="row">
            <div class="form-group">
                <div class="col-md-12">
             
              <div class="col-md-8" style="color: #c7c4c4;margin-left: 33%;">
             User Commas(.)to separate email addresses
              </div>
              </div>
            </div>
            </div>
            <?php $querydp = $this->db->query("SELECT * FROM  bms_property_units where unit_no='$unitno' LIMIT 1");
  foreach ($querydp->result() as $rowp)
  {  $email = $rowp->email_addr; } ?>
            <div class="row">
            <div class="form-group">
                <div class="col-md-12">
              <label class="control-label col-md-4" style="padding: 8px 10px; text-align:right;">Email Address*</label>
              <div class="col-md-8" style="color:red;">
              <input type="" value="<?php echo $email;?>" name="send" class="form-control">
              </div>
              </div>
            </div>
            </div>
           
            
            
            
         			
		
           
  </div>
		
		
		
        
        <!-- Modal footer -->
        <div class="modal-footer" style="text-align: center;">
		 <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Yes" >
          <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  

  
</div>        
                        
                        <?php }?>
                         </tbody>                
              </table>
              
              
              
              
               <div id="pagination" style="float: right;">
                       <ul class="tsc_pagination">
                        
                        <!-- Show pagination links -->
                        <?php foreach ($links as $link) {
                            echo "<li>". $link."</li>";
                         } ?>
                </div>
              <?php  } }?>    
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
		
    
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

</script>
<script>
function printDiv1(url) {    
    window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=600,height=450,directories=no,location=no');
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