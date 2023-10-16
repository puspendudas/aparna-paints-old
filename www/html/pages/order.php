<?php
include("lib/config.php");
?>

<?php
    $order_number = $_GET['id'];

    $search_order_details = $con->query("SELECT r.orders_order_number AS order_number, r.orders_order_date AS order_date, p.party_name AS order_party_name, p.party_address AS order_party_address, p.party_phone_no AS order_party_mobile_number, p.party_email_id AS order_party_email, p.party_gst_in_number AS order_party_gst, p.party_state_name AS order_party_state, r.orders_order_string AS order_string FROM `orders` r, `party` p WHERE r.orders_party_id = p.party_id AND r.orders_order_number = '$order_number'");
    $fetch_order_details = $search_order_details->fetch_array(MYSQLI_BOTH);

    $order_date = explode("-",$fetch_order_details['order_date']);
    $year = $order_date[0];
    $month = $order_date[1];
    $day = $order_date[2];
    $new_date = $day.'-'.$month.'-'.$year;
?>

<?php
/*
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
*/
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
                                        <span>Phone: +91-9564867424 / +91-8240628122</span>
                                        <span>8no. Kalibari More, Ashoknagar,</span>
                                        <span>West Bengal, Pin - 743222</span>
                                    </span>
                                </div>
                            </div>
                            <div class="border-bottom w-100"><center><h2><b>Order Receipt</b></h2></center></div>
                            <div class="d-flex justify-content-between pt-6">
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2"><b>DATE : </b><?php echo $new_date ?></span>
                                    <span class="font-weight-bolder mb-2"><b>RECEIPT NO : </b><?php echo $fetch_order_details['order_number'] ?></span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">PARTY</span>
                                    <span>Name: <?php echo $fetch_order_details['order_party_name'] ?></span>
                                    <span> Phone: <?php echo $fetch_order_details['order_party_mobile_number'] ?></span>
                                    <span><?php if($fetch_order_details['order_party_email']!=null) echo 'Email:'.$fetch_order_details['order_party_email']; else echo ''; ?></span>
                                    <span>GST:<?php if ($fetch_order_details['order_party_gst']!=null) echo $fetch_order_details['order_party_gst'].'('.$fetch_order_details['order_party_state'].')'; else echo 'NILL';?></span>
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
                                        <tr class="bill_table">
                                        <th class="pl-0 font-weight-boldest text-uppercase">#</th>
                                            <th class="pl-0 font-weight-boldest  text-uppercase">Description</th>
                                            <th class="text-right font-weight-boldest  text-uppercase">HSN/SAC</th>
                                            <th class="text-right font-weight-boldest  text-uppercase">Quantity</th>
                                            <th class="text-right font-weight-boldest  text-uppercase">Unit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $order_string = explode(";",$fetch_order_details['order_string']);
                                            $number_of_items = count($order_string) - 1;
                                            
                                            $rough_total_item_count=0;
                                            for($counter = 0 ; $counter < $number_of_items ; $counter++)
                                            {
                                                $item_details =  explode(",",$order_string[$counter]);

                                                $search_item = $con->query("SELECT * FROM `stock` WHERE stock_pid = '$item_details[0]'")->fetch_array(MYSQLI_BOTH);
                                                $item_name = $search_item['stock_pname'];
                                                $item_hsn_sac = $search_item['stock_hsn_sac'];

                                                $item_quantity = $item_details[1];
                                                $rough_total_item_count+=$item_quantity;

                                                $search_unit = $con->query("SELECT u.unit_short_name AS unit_name FROM `stock` s, `conversion` c, `unit` u WHERE s.conversion_id = c.conversion_id AND c.secondary_unit_id = u.unit_id")->fetch_array(MYSQLI_BOTH);
                                                $item_unit = $search_unit['unit_name'];

                                                echo 
                                                '<tr class="font-weight-bold">
                                                    <td class="pt-7">'.($counter + 1).'</td>
                                                    <td class="pl-0 pt-7">'.$item_name.'</td>
                                                    <td class="text-right pt-7">'.$item_hsn_sac.'</td>
                                                    <td class="pr-0 pt-7 text-right">'.$item_quantity.'</td>
                                                    <td class="text-right pt-7">'.$item_unit.'</td>
                                                </tr>';
                                            }
                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr class="bill_table">
                                            <th class="pl-0 pt-7 font-weight-boldest   text-uppercase"></th>
                                            <th class="pt-7 font-weight-boldest  text-uppercase"></th>
                                            <th class="text-right pt-7 font-weight-boldest  text-uppercase">Total</th>
                                            <th class="text-right pt-7 font-weight-boldest  text-uppercase"><?php echo $rough_total_item_count ?></th>
                                            <th class="text-right pt-7 font-weight-boldest  text-uppercase"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end: Invoice body-->

                    <!-- begin: Invoice footer-->

                    <div class="row justify-content-center py-8 px-8 px-md-0">
                        <div class="col-md-3"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-3">
                            <center>
                                <h5>For, Aparna Paints</h5><br><br><br><br>
                                <span>Authorized Signatory</span>
                            </center>
                        </div>
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
  
  alert(str);

  document.getElementById('words').innerHTML = str;
}

/* End In Words */
</script>