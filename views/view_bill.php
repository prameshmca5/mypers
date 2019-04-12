<?php
ob_start();
 error_reporting(0);
      /*     $emailuser = $_SESSION['bms']['email'];
           $genid = $_SESSION['bms']['genid']; 
               
   $query1 = $this->db->query("SELECT * FROM  url_idvalidation where user_email ='$emailuser' ORDER BY url_id DESC LIMIT 1");
  foreach ($query1->result() as $row1)
  {
    $generate = $row1->gen_id; 
  }   
  if($generate!=$genid)
  {
      ?><script>alert("Unauthorize user."); window.location.assign('<?php echo base_url();?>Bms_index/logout');</script><?php 
  }*/
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
  
<?php
  $name = $_GET['name'];
$block_id = $_GET['block_id'];
$unit_id = $_GET['unitd'];
?>
  
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
     $pro = $_SESSION['bms_default_property'];
     if($name){ $newu = $name; }
     else { $newu = $pro ; }


  // "SELECT * FROM `bms_property` WHERE property_id = '$newu'";
   $qunewp = $this->db->query("SELECT * FROM `bms_property` WHERE property_id = '$newu'");
  foreach ($qunewp->result() as $tttep)
  {
           $proidp  = $tttep->property_name;
  }
  
 
    $qunewpu = $this->db->query("SELECT * FROM `bms_property_units` WHERE unit_id = '$unit_id'");
  foreach ($qunewpu->result() as $tttepu)
  {
        $unitnos = $proidpu  = $tttepu->unit_no;
        $block_ids = $proidpu  = $tttepu->block_id;
  }
 
    $querydpbi = $this->db->query("SELECT * FROM `bms_property_block` WHERE block_id = '$block_id'");
  foreach ($querydpbi->result() as $blli)
  {   $blid = $blli->block_id;
     $blname = $blli->block_name;
  }
       
  
?>  

         
            
            
            <!-- /.box-header -->
            <form method="GET">
              <div class="box-body" style="padding-top: 5px;">
              
            
              <div class="col-md-12  tp-rw">
              <div class="col-md-4" style="padding:0px"><h4 class="recv">View Bill</h4></div>
              <div class="col-md-6"></div>
              <div class="col-md-2"  style="    margin-top: 4px;">
              <button type="button" class="btn btn-primary" style="float: right !important;" onclick="location.href = '<?php echo base_url();?>index.php/Receipt/add_bill/';">New Bill</button>
             
              </div>
              </div>
              
               <div class="col-md-12">
                      
                   <div class="col-md-1 fnt-txthdng" style="padding: 0px;">Property</div>
                   <div class="col-md-2">
                       <select class="form-control"  name="name" class="inp txt-fld" style="width: 168%;margin-bottom: 6%;" onChange="getblo(this.value);">
						<option value="<?php echo $newu ;?>"><?php echo $proidp ; ?></option>
                            <?php  foreach ($properties as $key=>$val) {  ?>
                            	<option value="<?php echo $val['property_id'] ; ?>"><?php echo $val['property_name'] ; ?></option>
                            <?php }?>
                        </select>
                   </div>
                   <div class="col-md-1"></div>
                   <div class="col-md-1 fnt-txthdng">Block</div>
                   <div class="col-md-2" >
                      <div  id ="hideblock"> 
                   
                        <select class="form-control" name="block_id" onChange="blo(this.value);">
                             <option value="">Select</option>
                                <?php $querydpb = $this->db->query("SELECT * FROM `bms_property_block` WHERE property_id = '$newu'");
  foreach ($querydpb->result() as $bll)
  { ?>
  
  <option value="<?php echo $bll->block_id;?>"><?php echo $bll->block_name;?></option>
  <?php }?>
                                
                               
                               
                                  </select>
                       </div>
                       <div  id ="showblock"></div>
                       </div>
                        
                   
                   <div class="col-md-1 fnt-txthdng">Unit</div>
                   <div class="col-md-2" id="hidu">
                       
                       
                              
  <select class="form-control" id="unit" name="unitd" >
      
                          <option value="">Select Block First</option> 
   </select>
                     
                       </div>
                        <div class="col-md-2" id ="showus"></div>
                    <div class="col-md-2">
                        <input type="submit" value="Find" name="search" class="btn btn-primary list_filter" style="">
                    </div>
                  
					 
					 
                  </div>
              
             <div class="col-md-12">
               
             </div>
			
                                
                        </div>
                        </form>
                        
                        
                        
                        
    <?php
    if($_GET['name'])
    {
        
     
 
 
 if(empty($name)){ $names="" ; } else {  $names="and property_id="."'$name'" ;}
 if(empty($block_id)){ $blo="" ; } else {  $blo="and block_id="."'$block_id'" ;}

if(empty($unit_id)){ $unit="" ; } else { $unit="and unit_no="."'$unit_id'" ;}

?>
<table id="example2" align="center" class="table table-bordered table-hover" style="border: 1px solid #999;border-radius: 2px;width: 96%;">
                <thead>
				
                <tr style="background-color: #cccccc6b;">
                  <th class="hidden-xs cntr">Receipt no</th>
                   <th class="hidden-xs cntr">Note</th>
                  <th  class="cntr">Date</th>               
                 
				  <th class="cntr">Amount(RM)</th>
				   <th class="cntr">Action</th>
                </tr>
                </thead>
                <tbody>
                		
                    
                  
 <?php 

//echo "SELECT * FROM  bms_property_credit  where external_bill_status='1' $names $recipte $blo $unit group by receipt_no order by id desc";
 $quer= $this->db->query("SELECT * FROM  bms_property_credit  where external_bill_status='1' $names $recipte $blo $unit group by receipt_no  order by id desc");
   $codd = $quer->num_rows();
   if($codd > 0){
  foreach ($quer->result() as $rowe)
  { ?>
                        <tr>
                           
                            <td  class="cntr"><?php echo $rec = $rowe->receipt_no;?></td>
                            <td  class="cntr"><?php echo $rowe->note;?></td>

							<td class="cntr"><?php echo $rowe->dates;?></td>
							<td class="cntr" ><?php	
							 $sqlssd = $this->db->query("SELECT sum(amount) FROM bms_property_credit where receipt_no='$rec' "); 
      foreach($sqlssd->result_array() as $rowp)  { 
      echo $amount = $rowp['sum(amount)'];
      } ?></td>
							<td>
							    
							  
					<center>		
<a href="<?php echo base_url();?>index.php/receipt/edit_bill/<?php echo $rowe->id;?>"  class="btn btn-primary btn-Edit"><i class="fa fa-eye"></i></a>
&nbsp;&nbsp;
<a href="<?php echo base_url();?>index.php/receipt/delete_bill/<?php echo $rowe->id;?>" onclick="return confirm('Are you sure you want to delete this reciepts?');" class="btn btn-danger btn-Remove"><i class="fa fa-trash"></i></a> </td>
			</center>			
						</td>
				    </tr> 
				    
				    
				    
				    <!--edit-->
				    
				   
				    
 
  
<div id="myModal<?php echo $rowe->id;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width: 800px; left: -75px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <form method="POST" action="<?php echo base_url();?>index.php/Receipt/updatebill">
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
            <div class="col-md-3"> <input type="hidden" id="cval" value="1">
				  <select  name="category" class="form-control" onChange="cat(this.value,'  +"'"+''+rdiv+''+"'"+');">
				     <option value="<?php echo $rowe->category_subcat;?>"><?php echo $rowe->category_subcat;?></option>
 <?php   $query = $this->db->query("SELECT * FROM main_category");
foreach ($query->result() as $rowd){ ?>
                             <option value="<?php echo $rowd->name;?>"><?php echo $rowd->name;?></option>
                         <?php }?>
                   </select>
             </div>
             
              <div class="col-md-3">
                  <div id="showsub"></div>
                   <div id="hidesub">
			<select class="form-control"  name="catsub[]" id="'+rdiv+'" style="width: 150px !important;" onChange="getdes(this.value,'  +"'"+''+rdivs+''+"'"+');"></select>
                     </div>
             </div>
             
             
             
             
               <div class="col-md-3">
                    <div id="showdes"></div>
                   <div id="hidedes">
				 <input type="text" name="des"  value="<?php echo $rowe->category_subcat;?>/<?php echo $rowe->subcategory;?>" class="form-control" value="<?php echo $rowe->category_subcat;?>/<?php echo $rowe->subcategory;?>">
				</div>
             </div>
             
               <div class="col-md-3">
                   
				 <input type="text" name="amount"  class="form-control" value="<?php echo $rowe->amount;?>" >
				 <input type="hidden" name="mid" class="form-control" value="<?php echo $rowe->id;?>" >
				
             </div>
             </div>
             
         </div>
      </div>
      <div class="modal-footer">
          
          <input type="submit" value="Update" name="submit" class="btn btn-success">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
  
  
				    <!--edit-->
				    
				      
    
   
                        



<?php } } else { ?><center><h3>No data found.</h3></center><?php }?>	
                </tbody>                
              </table>
<?php   } ?>
                    
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
    xmlhttp.open("GET","<?php echo base_url();?>ajax/get_viewblock.php?$q="+str,true);
   // alert("<?php echo base_url();?>ajax/get_recblock.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hideblock").style.display = "none";
    }
    </script>
    
    
    
    
   <script> 
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
    xmlhttp.open("GET","<?php echo base_url();?>ajax/get_viewunit.php?$q="+str,true);
    //alert("<?php echo base_url();?>ajax/get_viewunit.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hidu").style.display = "none";
    }

    </script>
    
    <script> 

    function cat(str,rid) {
    
    alert();
    var  id = $('#cval').val() ;
        var  rdiv = "mysub"+id ;
        var  rdivs = "mysubs"+id ;
        alert(rdivs);
        
			
			
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById(rid).innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","https://www.tpaccbms.com/ajax/select.php?$q="+str,true);
//	alert("<?php echo base_url(); ?>ajax/select.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hid").style.display = "none";
     document.getElementById("cval").value = id+1;
    }

</script>

<script>

      function giveme()
      {
        var  id = $('#cval').val() ;

        var  rdiv = "mysub"+id ;
        var  rdivs = "mysubs"+id ;
        
       alert(rdivs);
         var row = '';
             row += '<div class="row" style="margin-top: -17px;" >' ;
			  row += '<table class="table table-bordered" style="width: 96%;border: 2px solid #fff; ">' ;
             row += '    <div class="col-md-3">';
             
             row += '     <td style="border: 2px solid #fff;"><select type="text" name="cat[]" class="form-control" onChange="cat(this.value,'  +"'"+''+rdiv+''+"'"+'); createUserNames(this.value);">';
             row += '             <option>Select</option>';
                         <?php $query = $this->db->query("SELECT * FROM main_category");
							foreach ($query->result() as $rowd)
							{  ?>
             row += '                <option value="<?php echo $rowd->name;?>"><?php echo $rowd->name;?></option>';
                          <?php } ?>
             row += '        </select></td>';
             row += '    </div>';
             row += '    <div class="col-md-3">';
			 
             row += '         <td style="width: 150px !important; border: 2px solid #fff;"><select class="form-control"  name="catsub[]" id="'+rdiv+'" style="width: 150px !important;" onChange="getdes(this.value,'  +"'"+''+rdivs+''+"'"+');"></select></td>';
             row += '    </div>';
              row += '    <div class="col-md-3">';
			   
             row += '         <td style="border: 2px solid #fff; width: 292px;"><select class="custom"   id="'+rdivs+'" style="width: 100%;"></select></td>';
             row += '    </div>';
              row += '    <div class="col-md-2">';
			  
             row += '<td style="border: 2px solid #fff;"><input type="text" id="amo" name="amount[]"  class="form-control" onblur="tota(this.value,'  +"'"+''+rdiv+''+"'"+')"></td>';
             row += '    </div>';
            
            
             
			  row += '</table>';
			   row += ' <button type="button" onclick="deletesnew('  +"'"+''+rdiv+''+"'"+');$(this).parent().remove()" class="btn btn-danger btn-Remove" style="float: right;margin-top: -64px;"><i class="fa fa-close"></button>';
             row += '</div>';
			 

             $('#newr').append(row);
  //$('#cval').val() ;
   //$('#cvalss').val(praseInt($('#cval').val())+praseInt(1)) ;
       // $('#cvalss').val(praseInt(id)+praseInt(1)) ;

          document.getElementById("cval").value = id+1;
		 // document.getElementById("cvalss").value = id+1;
           // alert($('#cval').val());
		  //alert($('#cvalss').val());
	 
      }
</script>
   