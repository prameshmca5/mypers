    <style>
            * { margin: 0; padding: 0; }
            body {
                font: 14px/1.4 Helvetica, Arial, sans-serif;
            }
            #page-wrap { width: 800px; margin: 0 auto; }

            textarea { border: 0; font: 14px Helvetica, Arial, sans-serif; overflow: hidden; resize: none; }
            table { border-collapse: collapse; }
            table td, table th { border: 1px solid black; padding: 5px; }
            tr.noBorder td {
                border: 0;
            }

            td.Border td {
                border: 1px;
            }

            #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; }

            #address { width: 250px; height: 150px; float: left; }
            #customer { overflow: hidden; }

            #logo { text-align: right; float: right; position: relative; margin-top: 25px; border: 1px solid #fff; max-width: 540px; overflow: hidden; }
            #customer-title { font-size: 20px; font-weight: bold; float: left; }

            #meta { margin-top: 1px; width: 100%; float: left; }
            #meta td { text-align: left;  }
            #meta td.meta-head { text-align: left; background: #6c757d; }
            #meta td textarea { width: 100%; height: 20px; text-align: right; }

            #signing { margin-top: 0px; width: 100%; float: left; }
            #signing td { text-align: center;  }
            #signing td.signing-head { text-align: center; background: #eee; }
            #signing td textarea { width: 100%; height: 20px; text-align: center; }

            #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
            #items th { background: #6c757d; }
            #items textarea { width: 80px; height: 50px; }
            #items tr.item-row td {  vertical-align: top; }
            #items td.description { width: 300px; }
            #items td.item-name { width: 175px; }
            #items td.description textarea, #items td.item-name textarea { width: 100%; }
            #items td.total-line { border-right: 0; text-align: right; }
            #items td.total-value { border-left: 0; padding: 10px; }
            #items td.total-value textarea { height: 20px; background: none; }
            #items td.balance { background: #6c757d; }
            #items td.blank { border: 0; }

            #terms { text-align: center; margin: 20px 0 0 0; }
            #terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
            #terms textarea { width: 100%; text-align: center;}



            .delete-wpr { position: relative; }
            .delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }

            /* Extra CSS for Print Button*/
            .button {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                overflow: hidden;
                margin-top: 20px;
                padding: 12px 12px;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                -webkit-transition: all 60ms ease-in-out;
                transition: all 60ms ease-in-out;
                text-align: center;
                white-space: nowrap;
                text-decoration: none !important;

                color: #fff;
                border: 0 none;
                border-radius: 4px;
                font-size: 14px;
                font-weight: 500;
                line-height: 1.3;
                -webkit-appearance: none;
                -moz-appearance: none;

                -webkit-box-pack: center;
                -webkit-justify-content: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -webkit-align-items: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 160px;
                -ms-flex: 0 0 160px;
                flex: 0 0 160px;
            }
            .button:hover {
                -webkit-transition: all 60ms ease;
                transition: all 60ms ease;
                opacity: .85;
            }
            .button:active {
                -webkit-transition: all 60ms ease;
                transition: all 60ms ease;
                opacity: .75;
            }
            .button:focus {
                outline: 1px dotted #959595;
                outline-offset: -4px;
            }

            .button.-regular {
                color: #202129;
                background-color: #edeeee;
            }
            .button.-regular:hover {
                color: #202129;
                background-color: #e1e2e2;
                opacity: 1;
            }
            .button.-regular:active {
                background-color: #d5d6d6;
                opacity: 1;
            }

            .button.-dark {
                color: #FFFFFF;
                background: #333030;
            }
            .button.-dark:focus {
                outline: 1px dotted white;
                outline-offset: -4px;
            }

            @media print
            {
                .no-print, .no-print *
                {
                    display: none !important;
                }
            }
            h4 {
                border-bottom: 1px solid black;
            }

        </style>

    <div id="page-wrap">
        <table width="100%">
            <tr>
                <td style="border: 0;  text-align: left" width="18%">
                    <b> <?php echo $pro_name;?></b>
                     </td>
                <td style="border: 0;  text-align: center" width="56%">
                    <b> PAYMENT VOUCHER </b>
                </td>
                <td style="border: 0;  text-align: center" width="15%">
                    </br><img src='https://barcode.tec-it.com/barcode.ashx?data=<?php echo $pv_item['pay_no']; ?>&code=MobileQRCode&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=72&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0&modulewidth=50' alt='<?php echo $pv_item['pay_no']; ?>'/>
                    <?php echo $pv_item['pay_no']; ?>
                </td>
                </tr>
        </table>
        <hr>
        </br>

    <div id="customer">
        <table id="meta">
            <tr>
                <td rowspan="5" style="border: 1px solid white; border-right: 1px solid black; text-align: left" width="62%">
                    <strong><?php echo "PAY TO" ?></strong> <br/>
                    <table>
                        <tr class="noBorder">
                            <td>
                            <b><?php echo ($provid_name!='')?$provid_name :$pv_item['pay_service_provider_name']; ?></b><br/> <br/> 	
                            <?php
                                if($pv_item['address']){
                            ?>
                                <?php echo $pv_item['address']; ?><br/>
                                <?php echo $pv_item['city']." | ".$pv_item['state'] ?> <br/>
                                <?php echo $pv_item['postcode']; ?> <br/>
                                <?php echo $pv_item['person_inc_email']; ?>
                            <?php } else {
                                    echo $pv_item['pay_service_provider_address'];
                                } ?>
                            </td>
                        </tr>
                    </table>

                </td>
                <td class="meta-head"><p style="color:white;">Bank</p></td>
                <td>
                    <?php echo ($pv_item['bank_name']!="")?$pv_item['bank_name']:'MAY BANK'; ?>
                </td>
            </tr>
            <tr>
                <td class="meta-head"><p style="color:white;">Pay Mod</p></td>
                <?php
                    $payment_mode = $this->config->item('payment_mode');
                    $bankdetails = $payment_mode[$pv_item['pay_mod']];
                ?>
                <td><?php echo $bankdetails;?></td>

            </tr>
            <?php 
                if($pv_item['pay_mod']==2){  ?>
                <tr>
                    <td class="meta-head"><p style="color:white;">Pay details</p></td>
                    <td><?php echo $pv_item['pay_chq_bank_name']." / ". $pv_item['pay_cheq_no'] ." / " .(date('d-m-Y', strtotime($pv_item['pay_cheq_date'])));?> </td> 
                </tr>
                <?php 

                }else if($pv_item['pay_mod']==4){
                    ?>
                <tr>
                    <td class="meta-head"><p style="color:white;">Pay details</p></td>
                    <td><?php echo $pv_item['pay_online_bank']." / ". $pv_item['pay_online_txn_no'] ." / " .(date('d-m-Y', strtotime($pv_item['pay_online_date'])));?> </td> 
                </tr>
                <?php 
                }
            ?>  
            <tr>
                <td class="meta-head"><p style="color:white;">Payment Date</p></td>
                <td><?php echo date('d-m-Y', strtotime($pv_item['pay_date']))?></td>
            </tr>
            <tr>
                <td class="meta-head"><p style="color:white;">Invoice No</p></td>
                <td><b>
                        <?php

                            if($pv_item['pay_inv_id']!=0){
                                foreach ($invnamedisp as $ivkey=>$ivval){
                                    echo $ivval['exp_inv_no']."<br/>";
                                }
                            }else {
                                echo "-";
                            }
                        ?>
                    </b></td>
            </tr>
        </table>
    </div>
        <!-- Display for direct payment receipt -->
        <?php
        if(empty($pv_item['pay_inv_id'])){
        ?>
    <table id="items">
        <tr>
            <th><p style="color:white;"><?php echo 'Description'; ?></p></th>
            <th align="right"><p style="color:white;"><?php echo 'Account Name'; ?></p></th>
            <th align="right"><p style="color:white;"><?php echo 'Qty';?></p></th>
            <th align="right"><p style="color:white;"><?php echo 'UOM'; ?></p></th>
            <th align="right"><p style="color:white;"><?php echo 'Unit Price'; ?></p></th>
            <th align="right"><p style="color:white;"><?php echo 'Amount'; ?></p></th>
            <th align="right"><p style="color:white;"><?php echo 'Discount Amt'; ?></p></th>
            <th align="right"><p style="color:white;"><?php echo 'Item Net Amount'; ?></p></th>

        </tr>
        <?php
        $subtot = 0;
        $disc = 0;
        if(count($expsubitem)>0) {
            foreach ($expsubitem as $key => $val) { ?>
                <tr class="item-row">
                    <td class="description"><?php echo $val['description']; ?></td>
                    <td align="right"><?php echo $val['charge_code_category_name']; ?></td>
                    <td align="right"><?php echo $val['qty']; ?></td>
                    <td align="right"> <?php echo $val['uom']; ?></td>
                    <td align="right"><span class="price"><?php echo $val['unit_price']; ?></span></td>
                    <td align="right"><span class="price"><?php echo $val['amount']; ?></span></td>
                    <td align="right"><span class="price"><?php echo $val['discount_amt']; ?></span></td>
                    <td align="right"><span class="price"><?php echo $val['net_amount']; ?></span></td>
                </tr>
                <?php
            }
            $subtot = $expsubitem[0]['subtotal'];
            $disc = $expsubitem[0]['discounts'];
            $net = $expsubitem[0]['nettotal'];
            $tax_per = $expsubitem[0]['tax_percent'];
            $tax = $expsubitem[0]['tax_amt'];
            $tota = $expsubitem[0]['total'];
            $paidamt = $expsubitem[0]['payment_paid_amount'];
            $balamt = $expsubitem[0]['payment_pending_amount'];
			$curtota = $pv_item['pay_total'];
            $textamt = "Invoice Amount (RM)";
            $dispcate = "withinvoice";
          }
        ?>
        <?php
        if(count($pv_sub_items)>0) {
            foreach ($pv_sub_items as $key => $val) { ?>
                <tr class="item-row">
                    <td class="description"><?php echo $val['pay_description']; ?></td>
                    <td align="right"><?php echo $val['charge_code_category_name']; ?></td>
                    <td align="right"><?php echo $val['pay_qty']; ?></td>
                    <td align="right"> <?php echo $val['pay_uom']; ?></td>
                    <td align="right"><span class="price"><?php echo $val['pay_unit_price']; ?></span></td>
                    <td align="right"><span class="price"><?php echo $val['pay_amount']; ?></span></td>
                    <td align="right"><span class="price"><?php echo $val['pay_discount_amt']; ?></span></td>
                    <td align="right"><span class="price"><?php echo $val['pay_net_amount']; ?></span></td>
                </tr>
                <?php
            }

            $subtot = $pv_item['pay_subtotal'];
            $disc = $pv_item['pay_discounts'];
            $net = $pv_item['pay_nettotal'];
            $tax_per = $pv_item['pay_tax_percent'];
            $tax = $pv_item['pay_tax_amt'];
            $tota = $pv_item['pay_total'];
            $textamt = "Paid Amount (RM)";
            $dispcate = "withoutinvoice";
        }
        ?>
        <tr>
            <td  align="right" class="blank"> </td>
            <td  align="right" class="blank"> </td>
            <td  align="right" class="blank"> </td>
            <td  align="right" class="blank"> </td>
            <td  align="right" class="blank"> </td>
            <td  align="right" colspan="2" class="total-line">Payment Sub Total </td>
            <td  align="right" class="total-value"><div id="total"> <?php echo $subtot;?> </div></td>
        </tr>
        <tr>
            <td  align="right" class="blank"> </td>
            <td  align="right" class="blank"> </td>
            <td  align="right" class="blank"> </td>
            <td  align="right" class="blank"> </td>
            <td  align="right" class="blank"> </td>
            <td  align="right" colspan="2" class="total-line">Discount Amt (-) </td>
            <td  align="right" class="total-value"><div id="total"> <?php echo $disc;?> </div></td>
        </tr>
        <tr>
            <td  align="right" class="blank"> </td>
            <td  align="right" class="blank"> </td>
            <td  align="right" class="blank"> </td>
            <td  align="right" class="blank"> </td>
            <td  align="right" class="blank"> </td>
            <td  align="right" colspan="2" class="total-line">Payment Net Amount </td>
            <td  align="right" class="total-value"><div id="total"> <?php echo $net;?> </div></td>
        </tr>

        <tr>
            <td  align="right" class="blank"> </td>
            <td  align="right" class="blank"> </td>
            <td  align="right" class="blank"> </td>
            <td  align="right" class="blank"> </td>
            <td  align="right" class="blank"> </td>
            <td  align="right" colspan="2" class="total-line">Tax(<?php echo $tax_per;?>%) (-) </td>
            <td  align="right" class="total-value"><div id="total"> <?php echo $tax;?> </div></td>
        </tr>

        <tr>
            <td class="blank"> </td>
            <td class="blank"> </td>
            <td class="blank"> </td>
            <td class="blank"> </td>
            <td class="blank"> </td>
            <td align="right" colspan="2" class="total-value balance"><p style=""> <?php echo $textamt;?></p></td>
            <td align="right" class="total-value balance"><div class="due"> <p style="color:white;"><b> <?php echo $tota;?></b></p></div></td>
        </tr>
        <?php
            if($dispcate=="withinvoice") {
        ?>
				<tr>
                    <td class="blank"> </td>
                    <td class="blank"> </td>
                    <td class="blank"> </td>
                    <td class="blank"> </td>
                    <td class="blank"> </td>
                    <td align="right" colspan="2" class="total-value balance"><p style=""> <?php echo "Paid Amount";?></p></td>
                    <td align="right" class="total-value balance"><div class="due"> <p style="color:white;"><b> <?php echo $curtota;?></b></p></div></td>
                </tr>
                <tr>
                    <td class="blank"> </td>
                    <td class="blank"> </td>
                    <td class="blank"> </td>
                    <td class="blank"> </td>
                    <td class="blank"> </td>
                    <td align="right" colspan="2" class="total-value balance"><p style=""> <?php echo "Total Paid Amount";?></p></td>
                    <td align="right" class="total-value balance"><div class="due"> <p style="color:white;"><b> <?php echo $paidamt;?></b></p></div></td>
                </tr>
                <tr>
                    <td class="blank"> </td>
                    <td class="blank"> </td>
                    <td class="blank"> </td>
                    <td class="blank"> </td>
                    <td class="blank"> </td>
                    <td align="right" colspan="2" class="total-value balance"><p style=""> <?php echo "Balance";?></p></td>
                    <td align="right" class="total-value balance"><div class="due"> <p style="color:white;"><b> <?php echo $balamt;?></b></p></div></td>
                </tr>
        <?php } ?>

    </table>
            <!-- END Display for direct payment receipt  -->
        <?php } else { ?>

            <!-- START DISPLAY FOR WITH PO AND INVOICE -->
            <table id="items">
                <tr>
                    
                    <th align="left"><p style="color:white;"><?php echo 'Payment No'; ?></p></th>
                    <th align="right"><p style="color:white;"><?php echo 'Payment Date';?></p></th>
                    <th align="right"><p style="color:white;"><?php echo 'Paid Amt'; ?></p></th>
                    
                </tr>
                <?php
               // foreach ($expsubitem as $key => $val) {
                   // $totamts +=$val['payment_paid_amount'];
                    ?>
                    <tr class="item-row">
                    <td class="right"><?php echo $pv_item['pay_no']; ?></td>
                    <td align="right"><?php echo date('d-m-Y', strtotime($pv_item['pay_date'])); ?></td>
                    <td align="right"><?php echo $pv_item['pay_total']; ?></td>
                    
                </tr>
                    <?php
               // }
                ?>
                <tr>
                    <td class="blank"> </td>   
                    <td align="right"  class="total-value balance"><p style=""> <?php echo "Total Paid Amount";?></p></td>
                    <td align="right" class="total-value balance"><div class="due"> <p style="color:white;"><b> <?php echo sprintf('%0.2f', $pv_item['pay_total']);?></b></p></div></td>
                </tr>
            </table>
            <!-- END DISPLAY FOR WITH PO AND INVOICE  -->
        <?php } ?>

        <!--    end related transactions -->
    <div id="terms">
        <h5><?php echo $lang['inv-shipping18'] ?></h5>
        <table id="related_transactions" style="width: 100%">
            <tr class="noBorder">
                <td>
                    <p align="justify"><b>Remarks:</b></p>
                    <p align="left"><?php echo $pv_item['remarks'];?></p>
                </td>
            </tr>
        </table>
        <br/><br/><br/>
        <table id="signing">
            <tr class="noBorder">
                <td align="center">
                    -----------------------------------------------------------
                </td>
                <td align="center">
                    -----------------------------------------------------------
                </td>
                <td align="center">
                    -----------------------------------------------------------
                </td>
            </tr>
            <tr class="noBorder">
                <td align="center">PREPARED BY</td>
                <td align="center">APPROVED BY </td>
                <td align="center">SIGNATURE </td>
            </tr>

        </table>
    </div>
    </div>
<script src="<?php echo base_url();?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>dist/js/adminlte.min.js"></script>
<script>
$(document).ready(function () {
    window.close();
});
</script>
