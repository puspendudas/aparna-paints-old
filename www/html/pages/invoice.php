<?php
include("lib/config.php");
?>

<?php
    $invoice_number = $_GET['id'];

    $search_invoice_details = $con->query("SELECT b.billing_bill_number AS invoice_number, b.billing_date AS invoice_date, b.billing_bill_type AS invoice_type, b.billing_bill_amount AS invoice_total_amount, b.billing_paid_amount AS invoice_paid_amount, b.billing_payment_mode AS invoice_payment_mode, c.customer_name AS invoice_customer_name, c.customer_address AS invoice_customer_address, c.customer_mobile_number AS invoice_customer_mobile_number, c.customer_email AS invoice_customer_email, c.customer_gst AS invoice_customer_gst, b.billing_bill_string AS invoice_string FROM `billing` b, `customer` c WHERE b.customer_id = c.customer_id AND b.billing_bill_number = '$invoice_number'");
    $fetch_invoice_details = $search_invoice_details->fetch_array(MYSQLI_BOTH);

    $printing_page_invoice_type=$fetch_invoice_details['invoice_type'];

    $invoice_date = explode("-",$fetch_invoice_details['invoice_date']);
    $year = $invoice_date[0];
    $month = $invoice_date[1];
    $day = $invoice_date[2];
    $new_date = $day.'-'.$month.'-'.$year;
?>

<?php

function price_in_words($number)
{    
    $no = floor($number);
    $point = round($number - $no, 2) * 100;
    $hundred = null;
    $digits_1 = strlen($no);
    $i = 0;
    $str = array();
    $words = array('0' => '', '1' => 'One', '2' => 'Two',
  '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
  '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
  '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
  '13' => 'Thirteen', '14' => 'Fourteen',
  '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
  '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
  '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
  '60' => 'Sixty', '70' => 'Seventy',
  '80' => 'Eighty', '90' => 'Ninety');
    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($i < $digits_1) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += ($divider == 10) ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number] .
          " " . $digits[$counter] . $plural . " " . $hundred
          :
          $words[floor($number / 10) * 10]
          . " " . $words[$number % 10] . " "
          . $digits[$counter] . $plural . " " . $hundred;
        } else {
            $str[] = null;
        }
    }
    $str = array_reverse($str);
    $result = implode('', $str);
    $points = ($point) ?
  "." . $words[$point / 10] . " " .
        $words[$point = $point % 10] : '';


    return $result . "Rupees  " . " Only";
}

?>

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container ">
        <!-- begin::Card-->
        <div class="card card-custom overflow-hidden">
            <div class="card-body p-0">
                <!-- begin: Invoice-->

                <div id="printableArea">
                    <!-- begin: Invoice header-->
                    <div class="row justify-content-center py-8 px-8 px-md-0">
                        <div class="col-md-9">
                            <div class="d-flex justify-content-between flex-column flex-md-row">
                                <a href="#" class="mb-5">
                                    <img src="assets/media/logos/logo-ap-m.png" height="88px" width="88px" alt=""/>
                                </a>
                                <div class="d-flex flex-column align-items-md-end px-0">
                                    <!--begin::Logo-->
                                        <img src="assets/media/logos/logo-ap.png" height="70px" width="270px" alt=""/> 
                                    <!--end::Logo-->
                                    <span class=" d-flex flex-column align-items-md-end">
                                        <span>Phone: +91-6295113543 / +91-9064104264</span>
                                        <span>8no. Kalibari More, Ashoknagar,</span>
                                        <span>West Bengal, Pin - 743222</span>
                                    </span>
                                </div>
                            </div>
                            <div class="border-bottom w-100"><center><h2><b><?php if($printing_page_invoice_type=='SALE') echo "Tax Invoice"; else if($printing_page_invoice_type=='RETURN') echo "Return Invoice"; else echo "Payment Receipt"; ?></b></h2></center></div>
                            <div class="d-flex justify-content-between pt-6">
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2"><b>DATE : </b><?php echo $new_date ?></span>
                                    <span class="font-weight-bolder mb-2"><b>INVOICE NO : </b><?php echo $fetch_invoice_details['invoice_number'] ?></span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">CUSTOMER</span>
                                    <span>Name: <?php echo $fetch_invoice_details['invoice_customer_name'] ?></span>
                                    <span>Phone: <?php echo $fetch_invoice_details['invoice_customer_mobile_number'] ?></span>
                                    <span><?php if($fetch_invoice_details['invoice_customer_email']!=null) echo 'Email:'.$fetch_invoice_details['invoice_customer_email']; else echo ''; ?></span>
                                    <span>GST: <?php if($fetch_invoice_details['invoice_customer_gst']!=null) echo $fetch_invoice_details['invoice_customer_gst']; else echo 'NILL'; ?></span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">INVOICE TO.</span>
                                    <span>Address: <?php echo $fetch_invoice_details['invoice_customer_address'] ?></span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">GST: 19AMXPD8233F1ZO</span>
                                    <span class="font-weight-bolder mb-2">State: West Bengal-19</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: Invoice header-->

                    <!-- begin: Invoice body-->
                    <div class="row justify-content-center px-md-0">
                        <div class="col-md-11">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <?php
                                            if($printing_page_invoice_type=='SALE'||$printing_page_invoice_type=='RETURN')
                                            {
                                                echo "<tr class='bill_table'>
                                                <th class='pl-0 font-weight-boldest text-uppercase'>#</th>
                                                    <th class='pl-0 font-weight-boldest  text-uppercase'>Description</th>
                                                    <th class='text-right font-weight-boldest  text-uppercase'>HSN/SAC</th>
                                                    <th class='text-right font-weight-boldest  text-uppercase'>Quantity</th>
                                                    <th class='text-right font-weight-boldest  text-uppercase'>Unit</th>
                                                    <th class='text-right font-weight-boldest  text-uppercase'>Price</th>
                                                    <th class='text-right font-weight-boldest  text-uppercase'>Discount</th>
                                                    <th class='text-right font-weight-boldest  text-uppercase'>GST</th>
                                                    <th class='text-right pr-0 font-weight-boldest  text-uppercase'>Amount</th>
                                                </tr>";
                                            }
                                        ?>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if($printing_page_invoice_type=='SALE'||$printing_page_invoice_type=='RETURN')
                                            {
                                                $invoice_string = explode(";",$fetch_invoice_details['invoice_string']);
                                                $number_of_items = count($invoice_string) - 1;

                                                $rough_total_item_count = 0;
                                                $rough_total_price_per_unit = 0;
                                                $rough_total_price_per_n_unit = 0;
                                                $rough_total_discount_amount = 0;
                                                $rough_total_tax_amount = 0;
                                                $rough_total_invoice_amount = 0;
                                                
                                                for($counter = 0 ; $counter < $number_of_items ; $counter++)
                                                {
                                                    $item_details =  explode(",",$invoice_string[$counter]);

                                                    $search_item = $con->query("SELECT * FROM `stock` WHERE stock_pid = '$item_details[0]'")->fetch_array(MYSQLI_BOTH);
                                                    $item_print_in_bill = $search_item['stock_print_in_bill'];
                                                    $item_name='';
                                                    if($item_print_in_bill=='yes')
                                                        $item_name = $search_item['stock_pname'];
                                                    else
                                                        $item_name = $con->query("SELECT * FROM `category` WHERE category_id = '$search_item[category_id]'")->fetch_array(MYSQLI_BOTH)['category_name'];

                                                    if($item_details[1]!=null)
                                                        $item_name=$item_name.'('.$item_details[1].')';
                                                        
                                                    $item_hsn_sac = $search_item['stock_hsn_sac'];

                                                    $item_color_code = $item_details[1];

                                                    $item_quantity = $item_details[2];
                                                    $rough_total_item_count+=(int)$item_quantity;

                                                    $item_unit='';
                                                    $search_unit = $con->query("SELECT u1.unit_short_name AS base_unit_name, u2.unit_short_name AS secondary_unit_name  FROM `conversion` c, `unit` u1, `unit` u2 WHERE c.conversion_id = '$search_item[conversion_id]' AND c.base_unit_id = u1.unit_id AND c.secondary_unit_id = u2.unit_id")->fetch_array(MYSQLI_BOTH);
                                                    if($item_details[3]=="base")
                                                        $item_unit = $search_unit['base_unit_name'];
                                                    else
                                                        $item_unit = $search_unit['secondary_unit_name'];

                                                    $item_price = $item_details[4];
                                                    $rough_total_price_per_unit+=$item_price;

                                                    $item_price_per_n_unit = (float)$item_price * (int)$item_quantity;
                                                    $rough_total_price_per_n_unit+=$item_price_per_n_unit;

                                                    $item_discount_rate = $item_details[5];
                                                    $item_discount_amount = round($item_price_per_n_unit * ($item_discount_rate/100), 2);
                                                    $rough_total_discount_amount+=$item_discount_amount;

                                                    $item_tax_rate = 18;
                                                    $item_tax_amount = round($item_price_per_n_unit * ($item_tax_rate/100), 2);
                                                    $rough_total_tax_amount+=$item_tax_amount;

                                                    $item_total_amount = round($item_price_per_n_unit - $item_discount_amount + $item_tax_amount, 2);
                                                    $rough_total_invoice_amount+=$item_total_amount;
                                                    
                                                    echo 
                                                    '<tr class="font-weight-bold">
                                                        <td class="pt-7">'.($counter + 1).'</td>
                                                        <td class="pl-0 pt-7">'.$item_name.'</td>
                                                        <td class="text-right pt-7">'.$item_hsn_sac.'</td>
                                                        <td class="pr-0 pt-7 text-right">'.$item_quantity.'</td>
                                                        <td class="text-right pt-7">'.$item_unit.'</td>
                                                        <td class="text-right pt-7">'.$item_price.'</td>
                                                        <td class="text-right pt-7">'.$item_discount_amount.'('.$item_discount_rate.'%)'.'</td>
                                                        <td class="pr-0 pt-7 text-right">'.$item_tax_amount.'('.$item_tax_rate.'%)'.'</td>
                                                        <td class="pr-0 pt-7 text-right">'.$item_total_amount.'</td>
                                                    </tr>';
                                                }
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <?php
                                            if($printing_page_invoice_type=='SALE'||$printing_page_invoice_type=='RETURN')
                                            {
                                                echo
                                                "<tr class='bill_table'>
                                                    <th class='pl-0 pt-7 font-weight-boldest   text-uppercase'></th>
                                                    <th class='pt-7 font-weight-boldest  text-uppercase'>Total</th>
                                                    <th class='text-right pt-7 font-weight-boldest  text-uppercase'></th>
                                                    <th class='text-right pt-7 font-weight-boldest  text-uppercase'>".$rough_total_item_count."</th>
                                                    <th class='text-right pt-7 font-weight-boldest  text-uppercase'></th>
                                                    <th class='text-right pt-7 font-weight-boldest  text-uppercase'>".$rough_total_price_per_unit."</th>
                                                    <th class='text-right pt-7 font-weight-boldest  text-uppercase'>".$rough_total_discount_amount."</th>
                                                    <th class='text-right pt-7 pr-0 font-weight-boldest  text-uppercase'>".$rough_total_tax_amount."</th>
                                                    <td class='pt-7 pr-0 font-weight-boldest text-right'>".$rough_total_invoice_amount."</td>
                                                </tr>";
                                            }
                                        ?>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end: Invoice body-->

                    <!-- begin: Invoice footer-->
                    <div class="row justify-content-center py-8 px-8 px-md-0">
                        <div class="col-md-3">
                            <div class="d-flex flex-column px-0">
                                <!--begin::Logo-->
                                <h4 class="font-weight-boldest">Invoice Amount In Words</h4>
                                <!--end::Logo-->
                                <span class="d-flex flex-column">
                                    <span><?php if($printing_page_invoice_type=='PAYMENT') echo price_in_words(round($fetch_invoice_details['invoice_paid_amount'])); else echo price_in_words(round($rough_total_invoice_amount)); ?></span>
                                </span>
                            </div>
                            <br>
                            <div class="d-flex flex-column px-0">
                                <!--begin::Logo-->
                                <h4 class="font-weight-boldest">Terms And Conditions</h4>
                                <!--end::Logo-->
                                <span class=" d-flex flex-column ">
                                    <span>Thanks for doing business with us!</span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-3 border-bottom w-100">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody id="printing_page_footer">
                                        <?php
                                            if($printing_page_invoice_type=='SALE' || $printing_page_invoice_type=='RETURN')
                                            {
                                                echo
                                                "<tr >
                                                    <td>Sub Total</td>
                                                    <td class='text-right'>".$rough_total_price_per_n_unit."</td>
                                                </tr>
                                                <tr >
                                                    <td>Discount</td>
                                                    <td class='text-right'>".$rough_total_discount_amount."</td>
                                                </tr>
                                                <tr >
                                                    <td>SGST@9%</td>
                                                    <td class='text-right'>".round($rough_total_tax_amount/2, 2) ."</td>
                                                </tr>
                                                <tr >
                                                    <td>CGST@9%</td>
                                                    <td class='text-right'>".round($rough_total_tax_amount/2, 2) ."</td>
                                                </tr>";

                                                if (round($rough_total_invoice_amount, 0)>round($rough_total_invoice_amount, 2))
                                                {
                                                    echo
                                                    "<tr >
                                                    <td>Round Off</td>
                                                    <td class='text-right'>"."+".round(round($rough_total_invoice_amount, 0)-round($rough_total_invoice_amount, 2), 2)."</td>
                                                    </tr>";
                                                }
                                                else
                                                {
                                                    echo
                                                    "<tr >
                                                    <td>Round Off</td>
                                                    <td class='text-right'>".round(round($rough_total_invoice_amount, 0)-round($rough_total_invoice_amount, 2), 2)."</td>
                                                    </tr>";
                                                }

                                                echo
                                                "<tr >
                                                    <th class='font-weight-bolder'>Total</th>
                                                    <th class='text-right font-weight-bolder'>".round($rough_total_invoice_amount)."</th>
                                                </tr>";
                                            }
                                        ?>

                                        <tr>
                                            <td><?php echo $printing_page_invoice_type!='RETURN'? "Received" : "Returned" ?></td>
                                            <td class='text-right'><?php echo round($fetch_invoice_details['invoice_paid_amount'],2); ?></td>
                                        </tr>

                                        <?php
                                        if($printing_page_invoice_type=='SALE')
                                        {
                                            echo
                                            "<tr>
                                                <td>Balance</td>
                                                <td class='text-right'>".round((float)$fetch_invoice_details['invoice_total_amount']-(float)$fetch_invoice_details['invoice_paid_amount'],2)."</td>
                                            </tr>";
                                        }
                                        ?>

                                        <?php
                                        if($printing_page_invoice_type=='SALE' || $printing_page_invoice_type=='RETURN')
                                        {
                                            echo
                                            "<tr>
                                                <td>Payment Mode</td>
                                                <td class='text-right'>".$fetch_invoice_details['invoice_payment_mode']."</td>
                                            </tr>";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center py-8 px-8 px-md-0">
                        <div class="col-md-3"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-3">
                            <center>
                                <h5>For, Aparna Paints</h5><br><br><br><br>
                                <span>Authorized Signatory</span>
                            </center>
                        </div>
                        <input type="text" class="form-control no_view" id="printing_page_invoice_type" value=<?php echo $printing_page_invoice_type; ?> disabled/>
                    </div>
                    <!-- end: Invoice footer-->

                </div>

                <!-- end: Invoice-->

                <!-- begin: Invoice action-->
                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between">
                            <a href="?page="><button type="button" class="btn btn-light-primary font-weight-bold">Save</button></a>
                            <button type="button" class="btn btn-primary font-weight-bold" onclick="printDiv('printableArea')">Print Invoice</button>
                        </div>
                    </div>
                </div>
                <!-- end: Invoice action-->

                
            </div>
        </div>
        <!-- end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
















<script>

/* Start In Words */

function price_in_words(price) {
alert(price);

  var sglDigit = ["Zero", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"],
    dblDigit = ["Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"],
    tensPlace = ["", "Ten", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"],
    handle_tens = function(dgt, prevDgt) {
      return 0 == dgt ? "" : " " + (1 == dgt ? dblDigit[prevDgt] : tensPlace[dgt])
    },
    handle_utlc = function(dgt, nxtDgt, denom) {
      return (0 != dgt && 1 != nxtDgt ? " " + sglDigit[dgt] : "") + (0 != nxtDgt || dgt > 0 ? " " + denom : "")
    };

  var str = "",
    digitIdx = 0,
    digit = 0,
    nxtDigit = 0,
    words = [];
  if (price += "", isNaN(parseInt(price))) str = "";
  else if (parseInt(price) > 0 && price.length <= 10) {
    for (digitIdx = price.length - 1; digitIdx >= 0; digitIdx--) switch (digit = price[digitIdx] - 0, nxtDigit = digitIdx > 0 ? price[digitIdx - 1] - 0 : 0, price.length - digitIdx - 1) {
      case 0:
        words.push(handle_utlc(digit, nxtDigit, ""));
        break;
      case 1:
        words.push(handle_tens(digit, price[digitIdx + 1]));
        break;
      case 2:
        words.push(0 != digit ? " " + sglDigit[digit] + " Hundred" + (0 != price[digitIdx + 1] && 0 != price[digitIdx + 2] ? " and" : "") : "");
        break;
      case 3:
        words.push(handle_utlc(digit, nxtDigit, "Thousand"));
        break;
      case 4:
        words.push(handle_tens(digit, price[digitIdx + 1]));
        break;
      case 5:
        words.push(handle_utlc(digit, nxtDigit, "Lakh"));
        break;
      case 6:
        words.push(handle_tens(digit, price[digitIdx + 1]));
        break;
      case 7:
        words.push(handle_utlc(digit, nxtDigit, "Crore"));
        break;
      case 8:
        words.push(handle_tens(digit, price[digitIdx + 1]));
        break;
      case 9:
        words.push(0 != digit ? " " + sglDigit[digit] + " Hundred" + (0 != price[digitIdx + 1] || 0 != price[digitIdx + 2] ? " and" : " Crore") : "")
    }
    str = words.reverse().join("")
  } else str = "";

  str += 'Rupee Only';

  document.getElementById('words').innerHTML = str;
}

/* End In Words */
</script>