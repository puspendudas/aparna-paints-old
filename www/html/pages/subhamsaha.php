<input id="g"type="text" onkeyup="price_in_words(value)"/>
<button >show</button>
<p id="s"></p>


<?php 
/**
 * Created by PhpStorm.
 * User: sakthikarthi
 * Date: 9/22/14
 * Time: 11:26 AM
 * Converting Currency Numbers to words currency format
 */
$number = 190908100.25;
 $no = floor($number);
 $point = round($number - $no, 2) * 100;
 $hundred = null;
 $digits_1 = strlen($no);
 $i = 0;
 $str = array();
 $words = array('0' => '', '1' => 'one', '2' => 'two',
  '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
  '7' => 'seven', '8' => 'eight', '9' => 'nine',
  '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
  '13' => 'thirteen', '14' => 'fourteen',
  '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
  '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
  '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
  '60' => 'sixty', '70' => 'seventy',
  '80' => 'eighty', '90' => 'ninety');
 $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
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
   } else $str[] = null;
}
$str = array_reverse($str);
$result = implode('', $str);
$points = ($point) ?
  "." . $words[$point / 10] . " " . 
        $words[$point = $point % 10] : '';
echo $result . "Rupees  " . $points . " Paise";

?>


<script>

    
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
    
    alert(str);
  }
</script>