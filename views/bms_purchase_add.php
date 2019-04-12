<?php $this->load->view('header');
$mainid = rand(10000000,99000000);

//$mainid = "457255";
 $url = "https://www.tpaccbms.com/";
 
 ?>
<?php $this->load->view('sidebar'); //echo "<pre>";print_r($properties); ?>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		  
	<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<input type="hidden" id="genid" value="<?php echo $mainid ; ?>">
 <script> 

    function selcats(str,mid){ 
        alert(str);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("findsubcatnew").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/ajax_subcategory.php/?$q="+str+"&$unit_no="+mid+"&$qsd="+mid,true);  
 //  alert("<?php echo base_url();?>ajax/ajax_subcategory.php/?$q="+str+"&$qsd="+mid); 
    xmlhttp.send();
    document.getElementById("hidesubcatnew").style.display = "none";
    }

    </script>
    
    <script> 

    function selcatsnew(str,mid){ 
            var genid = $("#genid").val() ;
            var cvals = $("#cval").val() ;
         
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("findsubcatnew").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/ajax_subcategorynew.php/?$q="+str+"&$unit_no="+mid+"&$qsd="+genid+"&$noid="+cvals,true);  
   //alert("<?php echo base_url();?>ajax/ajax_subcategorynew.php/?$q="+str+"&$qsd="+genid+"&$noid="+cvals); 
    xmlhttp.send();
    document.getElementById("hidesubcatnew").style.display = "none";
    }

    </script>
    
    
<input type="hidden" name="genid" id="genid" value="<?php echo $mainid ; ?>">
 <script> 
    function deleterow(str,mid,myd){ 
           var genid = $("#genid").val() ;
     if (window.XMLHttpRequest) {
     xmlhttp = new XMLHttpRequest()
    } else {
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("shownewnews").innerHTML = xmlhttp.responseText;
     }
    };
     xmlhttp.open("GET","<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$delid="+mid+"&$tag="+myd+"&$qid="+genid,true);  
 //  alert("<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$delid="+mid+"&$tag="+myd+"&$qid="+genid); 
    xmlhttp.send();
     document.getElementById("hidenew").style.display = "none";
    }
    </script>


   	<script> 
    function mysubnewsdata(sub,dd,randd,gidd){ 
          
         // alert(sub+dd+randd+gidd);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("ne").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo $url;?>/ajax/updateparchesorder.php/?$subcat="+sub+"&$cat="+dd+"&$mainid="+randd+"&$ggid="+gidd,true);  
  //alert("<?php echo $url;?>/ajax/updateparchesorder.php/?$subcat="+sub+"&$cat="+dd+"&$mainid="+randd+"&$ggid="+gidd); 
    xmlhttp.send();
    }
    </script>
    
    
     <script> 

    function onlycat(str,mid){ 
    var cvals = $("#cval").val() ;
         
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("te").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/insert_purche.php/?$maincat="+str+"&$cr="+mid+"&$num="+cvals,true);  
  // alert("<?php echo base_url();?>ajax/insert_purche.php/?$maincat="+str+"&$cr="+mid+"&$num="+cvals); 
    xmlhttp.send();
   // document.getElementById("hidesubcatnew").style.display = "none";
    }

    </script>
   
   		  
		<style>
		
		.btn-danger {
    color: #fff;
    background-color: #d9534f;
    border-color: #d43f3a;
    margin-left: 281%;
    margin-top: -92%;
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
    padding: 25px;

}

.scnrw-clr
{
    border: 1px solid #9a9393;
    padding: 30px;
    background: #cccccc63;
    margin-top: 1%;
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
      
        <?php if(isset($_SESSION['flash_msg']) && trim( $_SESSION['flash_msg'] ) != '') {
                    //if($_GET['login_err'] == 'invalid')
                    echo '<div class="alert alert-success msg_notification"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>';
                    echo '</strong>'.$_SESSION['flash_msg'].'</div>';
                    unset($_SESSION['flash_msg']);
                }
            ?>
      
    </section>

	</head>
	<body>
	    
	   
		<section class="content12">
            <div class="container-fluid" style="background: #fff;">
			   <div class="box1 box-primary1">
				<div class="row rwpdn">
					<div class="col-md-9">
						
						<h4 class="recv1">Purchase Order</h4>
					</div>
					<div class="col-md-3">
						<button class="btn-primary1">Back to list</button>
					</div>
				
				</div>
			
				</div>
					<div class="row rwpdn">
					<div class="col-md-9">
						
						<p  class="wrng-txt">( * ) Indicates required  fileds</p>
					</div>
					<div class="col-md-3">
					
					</div>
				
				</div>
				
			    <div class="row  bdrs-pd">
					<div class="row new-prches  all-bdrs" style="">
						<div class="col-md-9">
							<h2 class="nwprch">New Purchase Order</h2>
							
						</div>
						<div class="col-md-3">
						
						</div>
					
					</div>
					<form action="<?php echo base_url('index.php/Bms_purchase_order/data_add');?>" method="post">
					<input type="hidden" name="genid" value="<?php echo $mainid ; ?>">
						<div class="col-md-12" style="margin-top: 2%; margin-bottom: 2%;">
                      
                   <div class="col-md-1 fnt-txthdng byfrm" style="padding: 0px;">Property</div>
                   <div class="col-md-2">
                      <select class="form-control"  name="name" id="property_id" class="inp txt-fld" style="width: 168%;margin-bottom: 6%; margin-left: 9%;" onChange="vene(this.value);">
						 <option value="">Select Property</option>
                            <?php 
                                foreach ($properties as $key=>$val) { 
                                    $selected = isset($property_id) && trim($property_id) != '' && trim($property_id) == $val['property_id'] ? 'selected="selected" ' : '';  
                                    echo "<option value='".$val['property_id']."' ".$selected." data-value='".$val['total_units']."'>".$val['property_name']."</option>";
                                } ?> 
                        </select>

                   </div>
                   
                  <!--<div class="col-md-4"></div>
                   <div class="col-md-1 fnt-txthdng byfrm" style="margin-left: 1.5%;">Unit No</div>
                   <div class="col-md-2" id="hidee" style="margin-left: 2%;">
                       
                       <select name="unitnosd" class="form-control"  style="width: 106%;" onChange="ven(this.value);">
                       <option value="">Select</option>
                       
                       <?php
                      // $pro = $_SESSION['bms_default_property'];
                       //$querybv = $this->db->query("SELECT * FROM  bms_property_units where property_id = '$pro'");
                      
                  ?>
                <?php  // foreach ($querybv->result() as $rowbv){ ?>
                      
                       <option  value="<?php //echo $rowbv->unit_id; ?>"><?php// echo  $rowbv->unit_no; ?></option>
                           
                          <?php// }?>
                       </select>
                       
                       
                       
                          
                          
                          
                       
                       </div>
                        <div class="col-md-2" id ="sho"></div>
                        
                        
                        
                       
                          
                          
                          
                          
                    <div class="col-md-2"></div>-->
					 
                     </div>
       
                  
                  
                  
			
					<div class="row  topmgn">
					 
							<div class="row">
								<div class="col-md-7">
								    
								    	<div class="col-md-2">
									   <p class="byfrm">Vender</p>
									</div>
									 <div class="col-md-10" style="margin-bottom: 22px;">
				    <div id="showven"></div>
                              <div id="hideven">
				   <select class="txt-fld1 wdt-inpt" name="vender_i">
                     <option value="">Select</option>
                     
                     
                      <?php
                       $pro = $_SESSION['bms_default_property'];
                       $querybv = $this->db->query("SELECT * FROM  bms_service_provider where property_id = '$pro'");
                      
                  ?>
                <?php   foreach ($querybv->result() as $rowbv){ ?>
                      
                       <option  value="<?php echo $rowbv->service_provider_id; ?>"><?php echo  $rowbv->provider_name; ?></option>
                           
                          <?php }?>
                   </select>
                   </div> <script> 

    function vene(str) {
    // alert(str);
   
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showven").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url(); ?>payment/vendeee?$q="+str,true);
//	alert("<?php echo base_url(); ?>payment/vendeee?$q="+str);
    xmlhttp.send();
    document.getElementById("hideven").style.display = "none";
    }

</script>


									</div>
									<br>
									
									<!--<div class="col-md-2">
									   <p class="byfrm">Buy From</p>
									</div>
									 <div class="col-md-10">
									   <input type="text" name="buy" class=" txt-fld1 wdt-inpt" required>
									</div>-->
								</div>
								 <div class="col-md-5">
								   <div class="col-md-3">
									  <p class="byfrm">Date</p>
									</div>
									 <div class="col-md-9">
									 
									 <input type="text" name="sdate" class="txt-fld1 datepicker" style=" " required>
									</div>
								</div>
							</div>
							<!--<div class="row  frmscnd-rwpdn">
								<div class="col-md-7">
									<div class="col-md-2">
									   <p class="byfrm">Reg No.</p>
									</div>
									 <div class="col-md-10">
									   <input type="text" name="rarg" class=" txt-fld1 wdt-inpt1" id="search_txt" required>
									</div>
								</div>
								 <div class="col-md-5">
								   <div class="col-md-3">
									  <p class="byfrm">Delivery Date</p>
									</div>
									 <div class="col-md-9">
									 
									 <input type="text" name="ddate" class=" txt-fld1  wdt-inpt2 datepicker" id="search_txt" required>
									</div>
								</div>
							</div>-->
 <script> 

    function provider(str) {
   //  alert(str);
   
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showp").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url(); ?>ajax/provider_data.php?$q="+str,true);
//	alert("<?php echo base_url(); ?>ajax/provider_data.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hidp").style.display = "none";
    }

</script>							
							
							<div id="hidp">
							<div class="row  frmscnd-rwpdn">
								<div class="col-md-7">
									<div class="col-md-2">
									   <p class="byfrm">Address</p>
									</div>
									 <div class="col-md-10">
									   <input type="text" name="addressone" class=" txt-fld1 wdt-inpt" id="search_txt" >
									</div>
									<div class="col-md-2">
								
									</div>
									 <div class="col-md-10">
									   <input type="text" name="addresstwo" class=" txt-fld1 wdt-inpt tpmgnad" id="search_txt">
									</div>
									<div class="col-md-2">
								
									</div>
									 <div class="col-md-10">
									   <input type="text" name="addressthree" class=" txt-fld1 wdt-inpt tpmgnad" id="search_txt">
									</div>
									
									
								</div>
								 <div class="col-md-5">
								   
								</div>
							</div>
							<div class="row  frmscnd-rwpdn">
								<div class="col-md-12">
									<div class="col-md-1"></div>
									<div class="col-md-10">
										<div class="col-md-3">
										     <p>Post Code</p>
											<input type="text" name="code" class=" txt-fld1" id="search_txt" >
										</div>
										<div class="col-md-3">
										    <p>Town/City </p>
										    <input type="text" name="city" class=" txt-fld1" id="search_txt" >
										
										</div>
										<div class="col-md-3">
										    <p>State/Province</p>
										    <input type="text" name="state" class=" txt-fld1" id="search_txt">
										
										</div>
										<div class="col-md-3">
										    <p>Country</p>
										    <select class="sel slct-bx  slect-fld" name="country">
												<option value="">Select</option>   
                                            <?php 
                                                $countries = $this->config->item('countries');
                                                foreach ($countries as $key=>$val) { 
                                                    $selected = isset($service_provider['country']) && trim($service_provider['country']) == $key ? 'selected="selected" ' : '';  
                                                    echo "<option value='".$key."' ".$selected.">".$val."</option>";
                                                } ?> 
											</select>
										</div>
										
									 <input type="hidden" id="tb" name="tb" />
									</div>
								
								</div>
								 
							</div>
							
								<div class="row  frmscnd-rwpdn">
								<div class="col-md-12">
									<div class="col-md-1">
									 <p class="byfrm">Contact</p>
									</div>
									<div class="col-md-10">
										<div class="col-md-3">
										     <p>Phone #1</p>
											<input type="text" name="phoneone" class=" txt-fld1" id="search_txt" >
										</div>
										<div class="col-md-3">
										    <p>Phone #2 </p>
										    <input type="text" name="phonetwo" class=" txt-fld1" id="search_txt" >
										
										</div>
										<div class="col-md-3">
										    <p>Fax</p>
										    <input type="text" name="fax" class=" txt-fld1" id="search_txt" >
										
										</div>
										<div class="col-md-3">
										    <p>Email</p>
										      <input type="text" name="email" class=" txt-fld1" id="search_txt" >
										</div>
										
									 
									</div>
								
								</div>
								 
							</div>
						    <div class="row  frmscnd-rwpdn">
								<div class="col-md-12">
									<div class="col-md-1">
									 <p class="byfrm">Reason</p>
									</div>
									<div class="col-md-10">
										<div class="col-md-10">
										    
										   <textarea class="txt-rd" rows="4" name="reson" cols="108" style="width: 124%;" ></textarea>       

                                              
										</div>
										
										
										<div class="col-md-2">
										   
										</div>
										
									 
									</div>
								
								</div>
								 
							</div>
						</div>
						<div id="showp"></div>
								
							
							 <div class="row  frmscnd-rwpdn">
								<div class="col-md-12">
									<div class="col-md-1">
									 <p class="byfrm">Total</p>
									</div>
									<div class="col-md-10">
										<div class="col-md-3">
										<p class="resultt" style="height:30px; background:#fff; border:1px solid #1b1a1a6b;padding: 6px; border-radius: 4px;"></p>
										<input type="hidden" class=" txt-fld1" name="invoice_subtotal" id="TOTALall" placeholder="Subtotal"  ondrop="return false;" onpaste="return false;"> 
											
										</div>
										<div class="col-md-3">
										   
										
										</div>
										<div class="col-md-3">
										   
										
										</div>
										<div class="col-md-3">
										  
										</div>
										
									 
									</div>
								
								</div>
								 
							</div>
							
						
							
							 <div class="row">
								 <h2  style="color: #afa8a8;">Line Item</h2>
								</div>
							
							
							<div id="shownewnewsdivs"></div>
							 <div id="shownewnews"></div>
							
							<div class="row  btmrwpdn" id="hidenew">
                            
                           <!-- <div class="row  frmscnd-rwpdn">
								<div class="col-md-12">
									<div class="col-md-1">
									 <p class="byfrm">Total</p>
									</div>
									<div class="col-md-10">
										<div class="col-md-3">
									
										<input type="number" class=" txt-fld1" name="invoice_subtotal" id="TOTALall" placeholder="Subtotal"  ondrop="return false;" onpaste="return false;"> 
											
										</div>
										<div class="col-md-3">
										   
										
										</div>
										<div class="col-md-3">
										   
										
										</div>
										<div class="col-md-3">
										  
										</div>
										
									 
									</div>
								
								</div>
								 
							</div>-->
                            
                            
							   
								
                             
								<div class="row  scnrw-clr" >
								<div class="col-md-6">
									
									 <div class="col-md-12">
									 
									 <p class="byfrm">Desctiption</p>
									  <textarea class="txt-rd" rows="5" id="des" name="des" cols="" style="width: 100%;"> </textarea>

                                              
									</div>
									<div class="col-md-12">
										<div class="col-md-4">
									
									<p class="byfrm">For Equipment</p>
									 <select class="form-control" id="cat"  name="catsub1" style="width: 150px !important;" >
												<option value="">-Optional-</option>
												
													 <?php
						 $quera = $this->db->query("SELECT * FROM  bms_property_assets");
  foreach ($quera->result() as $rowpa)
  {?> <option value="<?php echo $rowpa->asset_name;?><?php echo $rowpa->asset_location;?>"><?php echo $rowpa->asset_name ; ?>-<?php echo $rowpa->asset_location;?></option>
                          <?php } ?>
                          
                          
												
											</select>
									</div>
									<div class="col-md-8"></div>
									</div>
									</div>
								
								 <div class="col-md-6">
								    <div class="row">
								   <div class="col-md-3">
									  <p class="byfrm">Qty</p>
									  <input type="text" id="quantity" onKeyUp="multiply()"  class="form-control changesNo quy" autocomplete="off" ondrop="return false;" onpaste="return false;">
									</div>
									 <div class="col-md-3">
									  <p class="byfrm">UOM</p>
									  <input type="text" id="uom" name="um"  class=" txt-fld1 wdsrt price" id="search_txt">
									</div>
									 <div class="col-md-3">
									  <p class="byfrm">U/Price</p>
									  <input type="text" name="price" id="price"  class="form-control changesNo pri" onblur="tota(this.value,<?php echo $mainid;?>); multiply()" autocomplete="off"  ondrop="return false;" onpaste="return false;">
									</div>
									 <div class="col-md-3">
									  <p class="byfrm">Price</p>
									   <input type="text" id="TOTAL" name="tot" class="form-control totalLinePrice" autocomplete="off"  ondrop="return false;" onpaste="return false;">
									
									</div>
									 </div>
									 
									 
									     <div class="row  sbbxs">
								   <div class="col-md-3">
									  <p class="byfrm">Discount</p>
									  <input type="text" id="diss" name="discount" onblur="deletesnew(this.value,<?php echo $mainid;?>); multiply();" class=" txt-fld1 wdsrt1" id="tax">
									</div>
									 <div class="col-md-3">
									 
									</div>
									 <div class="col-md-3">
									  
									</div>
								
									 <div class="col-md-3">
									  <p class="byfrm">Net Amount</p>
									  	<!--  <p  class="resultt" style="border: 1px solid #21202026; height:30px; background: #fff;"></p>-->
									  	  
									  	  
									  	  <input type="text" id="resultdis" style="width: 88px; border-radius: 5px;  height: 30px;">
									</div>
									 </div>
								
									 
									 	     <div class="row  sbbxs">
								   <div class="col-md-4">
									  <p class="byfrm">Category</p>
										<select class="sel slct-bx  slect-fld1" id="cat" name="paymode" onChange="selcatsnew(this.value,<?php echo $mainid;?>);">
										    <option value="">Select</option>
											  <?php 
                                                foreach ($categery as $key=>$val) 
                                                      { 
                                                   
                                                    echo "<option  value='".$val['charge_code_group_name']."' style='color: black;font-size: 117%;'>".$val['charge_code_group_name']." </option>";
                                                   // echo '<pre>';
                                                   // print_r($sub);exit;
                                                   // echo '<pre>';
                                                         foreach($sub as $key=>$va)
                                                        {
                                                            if ($va['charge_code_group_id'] == $val['charge_code_group_id'])
                                                              //  echo $va['charge_code_category_name']; // and any info
                                                           echo "<option value='".$va['charge_code_category_id']."'>".$va['charge_code_category_name']."</option>";
                                                        }   
                                                                                                
                                                    
                                                    
                                                } ?>   
											</select>
									</div>
									
									
									 <div class="col-md-4">
									 <p class="byfrm">Subcategory</p>
									 
									 <div id="findsubcatnew"></div>
									 <div id="hidesubcatnew">
			 <select class="form-control" name="catsubn" style="width: 150px !important;">
                       <option value="<?php echo $row['subcategory'];?>"><?php echo $row['subcategory']; ?></option> 
                                      </select>
                                      </div>
                                      
                                      
									  
									</div>
									 <div class="col-md-4">
									  
									</div>
									
									 </div>
									
								</div>
								 <div class="col-md-2">
				  
                    <input type="hidden" id="cval" value="11">
                    <input type="hidden" id="sdd" value="101">
                  
                 </div>
								</div>
							
								 <div id="newr"></div>
								 
								
								 
								 
							</div>
							 
			<script type="text/javascript">
 function multiply()
{ 
    a = Number(document.getElementById('quantity').value);
    b = Number(document.getElementById('price').value);
     d = Number(document.getElementById('diss').value);
    c = a * b;


    document.getElementById('TOTAL').value = c;
     document.getElementById('TOTALall').value = c;
     
     var main = $('#TOTALall').val();
    

var dec = (d/100).toFixed(2); //its convert 10 into 0.10
var mult = main*dec; // gives the value for subtract from main value
var discont = main-d;
$('#resultdis').val(discont);  


}
</script>	

	<script type="text/javascript">
 function multiplys()
{ 
    a = Number(document.getElementById('quantitys').value);
    b = Number(document.getElementById('price').value);
     d = Number(document.getElementById('dissx').value); 
    c = a * b;

    document.getElementById('TOTALs').value = c;
    
     var main = $('#TOTALs').val();
    
    var dec = (d/100).toFixed(2); //its convert 10 into 0.10
var mult = main*dec; // gives the value for subtract from main value
var disconts = main-d;
$('#resultnew').val(disconts); 

   
}
</script>


							
							 
							
							 
							  </form>
				            <div class="row">
							    <div class="row">
								 <div class="col-md-2">
								
								 <h4  style="">Notes/Terms</h4>
								</div>
									 <div class="col-md-10">
									 <div class="row">
									   <textarea class="txt-rd" rows="5" name="term" cols="" style="width: 90%;"></textarea>
									  </div> 
									   <div class="row">
									    <div class="col-md-4"></div>
									   <div class="col-md-4">
									  <!--<button type="button" onclick="newshow(<?php echo $mainid;?>);">new add</button>-->
									    <!-- <button type="button" class="btn-primary2" id="addmore" class="btn btn-success addmore" onclick="giveme(); newshow('<?php echo $mainid;?>');"  style="padding-left: 15px;padding-right: 15px;">Add Item</button>-->
									     
									     
									     <button type="button" class="btn-primary2" id="addmore" class="btn btn-success addmore" onclick="newshow('<?php echo $mainid;?>');"  style="padding-left: 15px;padding-right: 15px;">Add Item</button>
									     
									     
									    <button class="btn-primary2" style="padding-left: 25px;padding-right: 25px;">Done</button>
									   </div>
									   <div class="col-md-4"></div>
									   </div>
									 </div>
							</div>
							
					
						
					</div>
				</div>
				
            </div>

		</section>

		  


	</body>
	
    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- bootstrap datepicker -->
  
<?php $this->load->view('footer');?>
<script src="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> 
<!-- overlay loader for ajax call -->
<script src="<?php echo base_url();?>assets/js/loadingoverlay.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>
<link rel='stylesheet' type='text/css' href='css/style.css' />
	

 <script> 

    function deletesnew(str){ 
	//alert('fdfrd');
    var pvalue = $("#units").val();
	 var pvalues = $("#amo").val();
	// alert(pvalues);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById(rid).innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/deleteamount.php/?$q="+str+"&$unit_no="+pvalue,true);  
   //alert("<?php echo base_url();?>ajax/deleteamount.php?$q="+str+"&$unit_no="+pvalue); 
    xmlhttp.send();
    //document.getElementById("hidddd").style.display = "none";
    }

    </script>	
	
	
 <script> 

 function catss(str,rid) {
 
 //alert();
     // var txtFnameValue = $("#str").val();
//	alert(str,rid);
   var txtFnameValue = str ;
 //  alert(txtFnameValue);
  var result = txtFnameValue;
         //   var result = txtFnameValue+'/'+ txtLnameValue;
            var reult1=result.toLowerCase();
            $('#dess').val(reult1);
			
			
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
    xmlhttp.open("GET","<?php echo base_url(); ?>ajax/select.php?$q="+str,true);
	//alert("<?php echo base_url(); ?>ajax/select.php?$q="+str);
    xmlhttp.send();
   // document.getElementById("hid").style.display = "none";
    }

</script>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

<script type="text/javascript">

   
//here it will remove the current value of the remove button which has been pressed
      $("body").on("click",".remove",function(){ 
	  //alert('fgf');
          $(this).parents(".control-group").remove();
      });

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

<!--add price-->



    
    

	<script> 

    function tota(str,rid,dis){
    // alert();
      var pvalue = $("#quantity").val() ;
      var pvalues = $("#discount").val() ;
      
       var cat = $("#cat").val();
	 var des = $("#des").val();
	  var pay = $("#pay").val();
	 var umo = $("#uom").val();
	 var umos = $("#cval").val();
	  var mysub = $("#mysub").val();
	  
//alert(cat);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("ted").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/insert_purche.php?$price="+str+"&$quanti="+pvalue+"&$mainid="+rid+"&$dis="+dis+"&$des="+des+"&$cat="+cat+"&$pay="+pay+"&$umo="+umo+"&$umos="+umos,true);  
  //alert("<?php echo base_url();?>ajax/insert_purche.php?$price="+str+"&$quanti="+pvalue+"&$mainid="+rid+"&$dis="+dis+"&$des="+des+"&$cat="+cat+"&$pay="+pay+"&$umo="+umo+"&$umos="+umos); 
    xmlhttp.send();
    //document.getElementById("hidddd").style.display = "none";
    }

    </script>	
    
    
    
    
      <script> 

    function deletesnew(str,dds){ 
    var pvalue = $("#units").val() ;
	 var pvalues = $("#amo").val() ;
	  var umos = $("#cval").val();
	// alert(pvalues);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     //document.getElementById("ted").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/insert_purche.php/?$q="+str+"&$mainid="+dds+"&$umos="+umos,true);  
   //alert("<?php echo base_url();?>ajax/insert_purche.php/?$q="+str+"&$mainid="+dds+"&$umos="+umos); 
    xmlhttp.send();
    //document.getElementById("hidddd").style.display = "none";
    }

    </script>	
  <script>

      function giveme()
      {
        var  id = $('#cval').val();

        var  rdiv = "mysub"+id;
       //alert(rdiv);
          // row += '<div class="">'; 
          row += '<input class="case" type="checkbox"/>';		  
         var row = '<div class="row  scnrw-clr input-group control-group after-add-more">';
		 	
		 row += '  <tr class="item-row">';
		 
             row += '<div class="row" style="margin-top: -17px;" >' ;
			 
			  row += '<div class="col-md-6">';
									 
			 row += '<p class="byfrm">Desctiption</p>';
			 row += '<textarea class="txt-rd" rows="5" name="des[]" cols="" style="width: 100%;" onblur="onedivs(this.value,<?php echo $mainid;?>,<?php echo 2001;?>);"> </textarea><input type="hidden1" id="rdiv" value="1">';

             
			     
			row += '<div class="col-md-12">';
			row += '<div class="col-md-4">';
			row += '<p class="byfrm">For Equipment</p>';
			row += '<td style="width: 150px !important; border: 2px solid #fff;"><select class="form-control"  name="catsub1[]" style="width: 150px !important;" onblur="createUserNamesn();">';
		
			row += '<option value="Cash">-Optional-</option>';
		
			row += '</select></td>';
			row += '</div>';
			
			row += '</div>';
			row += '</div>';
			row += '<div class="col-md-6">';
			row += '<div class="row">';
			row += '<div class="col-md-3">';
			row += '<p class="byfrm">Qty</p>';
			row += ' <input type="text" id="quantity"  class="form-control changesNo quy" autocomplete="off" ondrop="return false;" onpaste="return false;">';
			
			row += '</div>';
			row += '<div class="col-md-3">';
			row += '<p class="byfrm">UOM</p>';
			row += '<input type="text" name="um[]"  class=" txt-fld1 wdsrt price" id="search_txt">';
	
			row += '</div>';
			row += '<div class="col-md-3">';
			row += '<p class="byfrm">U/Price</p>';
			row += '<input type="text" name="price"  class="form-control changesNo pri" onblur="tota(this.value,<?php echo $mainid;?>);" autocomplete="off"  ondrop="return false;" onpaste="return false;">';
			
			row += '</div>';
			row += '<div class="col-md-3">';
			row += '<p class="byfrm">Price</p>';
			row += '<input type="text" name="data[][total]" id="total_" class="form-control totalLinePrice" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">';
						
			row += '</div>';
			row += '</div>';
			row += '<div class="row  sbbxs">';
			row += '<div class="col-md-3">';
			row += '<p class="byfrm">Discount</p>';
			row += ' <input type="text" name="discount" onblur="deletesnew(this.value,<?php echo $mainid;?>);" class=" txt-fld1 wdsrt1" id="tax">';
			row += '</div>';  
			row += '<div class="col-md-3">';
			row += '</div>';
			row += '<div class="col-md-3">';
			row += '</div>';
			row += '<div class="col-md-3">';
			row += ' <p class="byfrm">Net Amount</p><span class="resultt"></span>';
			row += '<input type="text" name="net"  class="txt-fld1 wdsrt1 totalAftertax" autocomplete="off"  ondrop="return false;" onpaste="return false;">';
		  
									  
			row += '</div>';
			row += '</div>';
			row += '<div class="row  sbbxs" style="margin-left: 0%;">';
			row += '<div class="col-md-4">';
			row += '<p class="byfrm">Category</p>';
			row += '<select type="text" name="cat[]" class="form-control"  >';
			 row += '             <option>Select</option>';
                        
			row += '</select>';
			row += '</div>';									
			row += '<div class="col-md-4">';
			row += '<p class="byfrm">Subcategory</p>';
		
			row += '<select class="form-control"  name="catsub[]" id="'+rdiv+'" ></select>';
			
			row += '</div>';
			row += '</div>';
			row += '<div class="col-md-4" style="margin-top: 6%;">';
            row += '<button  class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>';			
			row += '</div>';
			row += '<div class="col-md-2">';
			row += '<input type="hidden1" id="cval" value="1">';
            row += '</div>';
			row += '</div>';
			
			row += '</div>';	 
            row += '</div>';
                
             
		
			
			  row += '</tr>';
			
			   
            row += '</div>';
			//row += '</div>';
			
  //  document.getElementById("hidddd").style.display = "none";
    
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
  	<script> 

    function mysub(str,rid,dis){
    
      var pvalue = $("#quantity").val() ;
      var pvalues = $("#discount").val() ;
      
       var cat = $("#cat").val();
	 var des = $("#des").val();
	  var pay = $("#pay").val();
	 var umo = $("#uom").val();
	 var umos = $("#cval").val();
	  var price = $("#price").val();
	   var q = $("#diss").val();
	    
     
 
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("ted").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/insert_purche.php?$price="+price+"&$quanti="+pvalue+"&$mainid="+rid+"&$dis="+q+"&$des="+des+"&$cat="+cat+"&$pay="+pay+"&$umo="+umo+"&$umos="+umos,true);  
  alert("<?php echo base_url();?>ajax/insert_purche.php?$price="+price+"&$quanti="+pvalue+"&$mainid="+rid+"&$dis="+q+"&$des="+des+"&$cat="+cat+"&$pay="+pay+"&$umo="+umo+"&$umos="+umos); 
    xmlhttp.send();
    //document.getElementById("hidddd").style.display = "none";
    }

    </script>
    
    
    	 <script> 

    function newshow111(str,dds){ 
    var pvalue = $("#units").val() ;
	 var pvalues = $("#amo").val() ;
	  var umos = $("#cval").val();
	// alert(pvalues);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("shownewnews").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>ajax/insert_purche.php/?$q="+str+"&$mainid="+dds+"&$umos="+umos,true);  
//   alert("<?php echo base_url();?>ajax/insert_purche.php/?$q="+str+"&$mainid="+dds+"&$umos="+umos); 
    xmlhttp.send();
    document.getElementById("hidenew").style.display = "none";
    }

    </script>	
      
       <script> 

    function newshow(str) {
    
 
    
    
    var tb = $("#tb").val() ;
    var sdd = $("#sdd").val() ;
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("shownewnews").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url(); ?>ajax/select_purches.php?$qid="+str+"&$crid="+tb+"&$sdd="+sdd,true);
//	alert("<?php echo base_url(); ?>ajax/select_purches.php?$qid="+str+"&$crid="+tb+"&$sdd="+sdd);
    xmlhttp.send();
    document.getElementById("hidenew").style.display = "none";
    
     var rnd = Math.floor(Math.random() * 1000000000);
        document.getElementById('tb').value = rnd;
  
    }

</script>

<!--ajax page code-->


	<script> 
    function onediv(str,mid,myd){ 
          var mainid = $("#mainid").val() ;
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById(rid).innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid,true);  
  // alert("<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid); 
    xmlhttp.send();
    }
    </script>
    <!--2-->
    
    <script> 
    function twodiv(str,mid,myd){ 
     var mainid = $("#mainid").val() ;
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById(rid).innerHTML = xmlhttp.responseText;
     }
    };
   xmlhttp.open("GET","<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid,true);  
  // alert("<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid);
    xmlhttp.send();
    }
    </script>
    <!--3-->
    <script> 
    function threediv(str,mid,myd){
     var mainid = $("#mainid").val() ;
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("shownewnews").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid,true);  
  // alert("<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid);
    xmlhttp.send();
    
     document.getElementById("hidenew").style.display = "none";
     // document.getElementById("shownewnews").style.display = "none";
    
    }
    </script>
    <!--4-->
    <script> 
    function fourdiv(str,mid,myd){ 
     var mainid = $("#mainid").val() ;
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById(rid).innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid,true);  
  // alert("<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid);
    xmlhttp.send();
    }
    </script><!--5-->
    
    <script> 
    function fivediv(str,mid,myd){  
    var mainid = $("#mainid").val() ;
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("shownewnews").innerHTML = xmlhttp.responseText;
     }
    };
     xmlhttp.open("GET","<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid,true);  
  // alert("<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid);
    xmlhttp.send();
    
     document.getElementById("hidenew").style.display = "none";
     
     
    }
    </script>
    <!--6-->
    <script> 
    function sixdiv(str,mid,myd){ 
     var mainid = $("#mainid").val() ;
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("shownewnews").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid,true);  
  // alert("<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid);
    xmlhttp.send();
     document.getElementById("hidenew").style.display = "none";
    }
    </script>
    
    <!--7-->
    <script> 
    function sevendiv(str,mid,myd){ 
     var mainid = $("#mainid").val() ;
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById("shownewnews").innerHTML = xmlhttp.responseText;
     }
    };
     xmlhttp.open("GET","<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid,true);  
 //  alert("<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid);
    xmlhttp.send();
     document.getElementById("hidenew").style.display = "none";
    }
    </script>
    
    
        <!--new insert data-->
    
    <script> 
    function onedivs(str,mid,myd){ 
          var mainid = $("#mainid").val() ;
          var tb = $("#tb").val() ;
          
          
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById(rid).innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid+"&$crid="+tb,true);  
 //  alert("<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid+"&$crid="+tb); 
    xmlhttp.send();
    }
    </script>
    <!--2-->
    
    <script> 
    function twodivs(str,mid,myd){  
     var mainid = $("#mainid").val() ;
          var tb = $("#tb").val() ;
          
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById(rid).innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid+"&$crid="+tb,true);  
  // alert("<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid+"&$crid="+tb); 
    xmlhttp.send();
    }
    </script>
    <!--3-->
    <script> 
    function threedivs(str,mid,myd){  
    var mainid = $("#mainid").val() ;
          var tb = $("#tb").val() ;
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById(rid).innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid+"&$crid="+tb,true);  
 //  alert("<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid+"&$crid="+tb); 
    xmlhttp.send();
    }
    </script>
    <!--4-->
    <script> 
    function fourdivs(str,mid,myd){ 
     var mainid = $("#mainid").val() ;
          var tb = $("#tb").val() ;
          
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById(rid).innerHTML = xmlhttp.responseText;
     }
    };
     xmlhttp.open("GET","<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid+"&$crid="+tb,true);  
  // alert("<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid+"&$crid="+tb); 
    xmlhttp.send();
    }
    </script><!--5-->
    
    <script> 
    function fivedivs(str,mid,myd){ 
    
     var mainid = $("#mainid").val() ;
          var tb = $("#tb").val() ;
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById(rid).innerHTML = xmlhttp.responseText;
     }
    };
      xmlhttp.open("GET","<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid+"&$crid="+tb,true);  
   //alert("<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid+"&$crid="+tb); 
    xmlhttp.send();
    }
    </script>
    <!--6-->
    <script> 
    function sixdivs(str,mid,myd){
     var mainid = $("#mainid").val() ;
          var tb = $("#tb").val() ;
          
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById(rid).innerHTML = xmlhttp.responseText;
     }
    };
     xmlhttp.open("GET","<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid+"&$crid="+tb,true);  
   //alert("<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid+"&$crid="+tb); 
    xmlhttp.send();
    }
    </script>
    
    <!--7-->
    <script> 
    function sevendivs(str,mid,myd){ 
     var mainid = $("#mainid").val() ;
          var tb = $("#tb").val() ;
          
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById(rid).innerHTML = xmlhttp.responseText;
     }
    };
      xmlhttp.open("GET","<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid+"&$crid="+tb,true);  
   //alert("<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid+"&$crid="+tb); 
    xmlhttp.send();
    }
    </script>
    
      <!--7-->
    <script> 
    function eightdivs(str,mid,myd){ 
    
     var mainid = $("#mainid").val() ;
          var tb = $("#tb").val() ;
           var catname = $("#catname").val() ;

     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest()
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById(rid).innerHTML = xmlhttp.responseText;
     }
    };
     xmlhttp.open("GET","<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid+"&$crid="+tb+"&$categoryname="+catname,true);  
  // alert("<?php echo $url;?>/ajax/select_purches.php/?$q="+str+"&$unit_no="+mid+"&$ran="+myd+"&$mainid="+mainid+"&$crid="+tb+"&$categoryname="+catname); 
    xmlhttp.send();
    }
    </script>
    <!--subcategory category select-->
    
						
			
			
 <script> 

    function catfind(str) {
    
// alert(str)
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
    }
 document.getElementById("cval").value = id+1;
</script>	


<script>
    function refresh_div() {
        // var str = $("#units").val() ;
      	// alert("al");
        jQuery.ajax({
            url:"https://www.tpaccbms.com/index.php/Bms_purchase_order/selcounttotalp/<?php echo $mainid; ?>",
            type:'POST',
            success:function(results) {
             jQuery(".resultt").html(results);
            }
        });
        
      //  alert("https://www.tpaccbms.com/index.php/Receipt/selcount/$unitno)
    }
    t = setInterval(refresh_div,100);
</script>


   


 <script>
 

    function ven(str) {
    // alert(str);
   
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showven").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url(); ?>payment/vendernew?$q="+str,true);
	//alert("<?php echo base_url(); ?>payment/vendernew?$q="+str);
    xmlhttp.send();
    document.getElementById("hideven").style.display = "none";
    }

</script>

<script>
    
     if($sd = $sd) {        
        loadUnit ('<?php echo isset($jmb_mc['unit_id']) && $jmb_mc['unit_id'] != '' ? $jmb_mc['unit_id'] : '';?>');
    }
    
    
    function loadUnit (unit_id) {
    $.ajax({ alert(unit_id);
            type:"post",
            async: true,
            url: '<?php echo base_url('index.php/bms_jmb_mc/get_unit');?>',
            data: {'property_id':$('#property_id').val()},
            datatype:"json", // others: xml, json; default is html

            beforeSend:function (){ $("#content_area").LoadingOverlay("show");  }, //
            success: function(data) {  
                /*if(typeof(data.error_msg) != "undefined" &&  data.error_msg == 'invalid access') {
                    window.location.href= '<?php echo base_url();?>';
                    return false;
                }*/
                var str = '<option value="">Select</option>'; 
                if(data.length > 0) {                    
                    $.each(data,function (i, item) {
                        var selected = unit_id != '' && unit_id == item.unit_id ? 'selected="selected"' : '';
                        str += '<option value="'+item.unit_id+'" '+selected+' data-owner="'+item.owner_name+'" data-status="'+item.unit_status+'" data-contact="'+item.contact_1+'" data-email="'+item.email_addr+'" data-defaulter="'+item.is_defaulter +'">'+item.unit_no+'</option>';
                    });
                }
                $('#unit_id').html(str);   
                if(unit_id == '') unset_resident_info(); // unset the resident onfo if loaded already             
                $("#content_area").LoadingOverlay("hide", true);
            },
            error: function (e) {
                $("#content_area").LoadingOverlay("hide", true);              
                console.log(e); //alert("Something went wrong. Unable to retrive data!");
            }
        });
}

function unset_resident_info () {        
    $('#resident_name').val('');    //$('#resident_name_hid').val('');
    //$('#unit_status').val('');      //$('#unit_status_hid').val('');
    $('#contact_number').val('');   //$('#contact_number_hid').val('');
    $('#email_addr').val('');       //$('#email_addr_hid').val('');
    //$('#defaulter').attr('checked',false);
}
        
</script>
    
    
    

				