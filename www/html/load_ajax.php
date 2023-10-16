<?php

include("lib/config.php");
include("lib/function.php");

/* Begin GET ALL Customer INFO */
if(isset($_POST['customer_info']))
{
   $result='';
      $search_customer = $con->query("SELECT * FROM `customer` WHERE `customer_id`='$_POST[customer_info]'");
      while($fetch_customer = $search_customer->fetch_array(MYSQLI_BOTH))
         {
            $result.='
            <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">'.$fetch_customer['customer_name'].'</span><br>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">Phone: '.$fetch_customer['customer_mobile_number'].'</span><br>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">Email: '.$fetch_customer['customer_email'].'</span>
            </h3>
            <h3 class="card-title align-items-start flex-column">
                <br><br>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">Address: '.$fetch_customer['customer_address'].'</span><br>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">GST IN: '.$fetch_customer['customer_gst'].'</span>
            </h3>
        </div>
            ';
         }
         
         echo $result;
}
/* END GET ALL Customer INFO */

/* Begin GET ALL party INFO */
if(isset($_POST['party_info']))
{
   $result='';
      $search_party = $con->query("SELECT * FROM `party` WHERE `party_id`='$_POST[party_info]'");
      while($fetch_party = $search_party->fetch_array(MYSQLI_BOTH))
         {
            $result.='
               <div class="card-header border-0 py-5">
                  <h3 class="card-title align-items-start flex-column">
                     <span class="card-label font-weight-bolder text-dark">'.$fetch_party['party_name'].'</span><br>
                     <span class="text-muted mt-3 font-weight-bold font-size-sm">Phone: '.$fetch_party['party_phone_no'].'</span><br>
                     <span class="text-muted mt-3 font-weight-bold font-size-sm">Email: '.$fetch_party['party_email_id'].'</span>
                  </h3>
                  <h3 class="card-title align-items-start flex-column">
                     <a href="javascript:;" class="btn btn-primary">
                        <i class="ki ki-plus"  onclick="payment_to_party('.$fetch_party['party_id'].')"></i>Payment Adjustment
                     </a><br>
                     <span class="text-muted mt-3 font-weight-bold font-size-sm">Address: '.$fetch_party['party_address'].'</span><br>
                     <span class="text-muted mt-3 font-weight-bold font-size-sm">GST IN: '.$fetch_party['partyr_gst_in_number'].'</span>
                  </h3>
               </div>
               ';
         }
         
         echo $result;
}
/* END GET ALL party INFO */

/* Begin GET ALL invoice INFO */
if(isset($_POST['invoice_info']))
{
   $result='';
      $search_invoice = $con->query("SELECT sum(total_bill_amount) AS total_billing_amount, sum(total_received_amount) AS total_received_amount FROM `total_sales`");
      while($fetch_invoice = $search_invoice->fetch_array(MYSQLI_BOTH))
         {
            $result.='
            <div class="card-header border-0 py-5">
               <h3 class="card-title align-items-start flex-column">
                  <span class="card-label font-weight-bolder text-dark">'.$fetch_invoice['total_billing_amount'].' - '.($fetch_invoice['total_billing_amount'] - $fetch_invoice['total_received_amount']).' = '.$fetch_invoice['total_received_amount'].'</span><br>
               </h3>
            </div>
            ';
         }
         
         echo $result;
}
/* END GET ALL invoice INFO */

/* BEGIN CUSTOMER DETAILS TABLE */

if((isset($_POST['customer_details_table'])))
{
   $search_customer_bill_details = $con->query("SELECT * FROM `billing` WHERE customer_id = '$_POST[customer_details_table_id]'");

   $output='';
   while($fetch_customer_bill_details = $search_customer_bill_details->fetch_array(MYSQLI_BOTH))
   {
      $output.='
                  <tr>
                  <td>'.$fetch_customer_bill_details['billing_bill_number'].'</td>
                  <td>'.$fetch_customer_bill_details['billing_bill_type'].'</td>
                  <td>'.$fetch_customer_bill_details['billing_date'].'</td>
                  <td>'.$fetch_customer_bill_details['billing_bill_amount'].'</td>
                  <td>'.round((float)$fetch_customer_bill_details['billing_bill_amount'] - (float)$fetch_customer_bill_details['billing_paid_amount'], 2).'</td>
                  <td>
                     <div class="dropdown dropdown-inline mr-2">
      
                        <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                              <i class="flaticon-more">
                              </i>
                        </a>
                        <!--begin::Dropdown Menu-->
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                              <!--begin::Navigation-->
                              <ul class="navi flex-column navi-hover py-2">
                                 <li class="navi-item" onclick="viewIndividualInvoice('."'".$fetch_customer_bill_details['billing_bill_number']."'".')">
                                    <div class="navi-link" >
                                       <span class="navi-icon"><i class="flaticon-edit"></i></span>
                                       <span class="navi-text">View</span>
                                    </div>
                                 </li>
                                 <li class="navi-item" onclick="deleteIndividualInvoice('."'".$fetch_customer_bill_details['billing_bill_id']."'".')">
                                    <div class="navi-link">
                                          <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                          <span class="navi-text">Delete</span>
                                    </div>
                                 </li>
                              </ul>
                              <!--end::Navigation-->
                        </div>
                        <!--end::Dropdown Menu-->
                     </div>
                  </td>
                  </tr>
               ';
   }
   echo $output;
}

/* END CUSTOMER DETAILS TABLE */

/* BEGIN PARTY DETAILS TABLE */

if((isset($_POST['party_details_table'])))
{
   $search_party_order_details = $con->query("SELECT * FROM `orders` WHERE orders_party_id = '$_POST[party_details_table_id]'");

   $output='';
   while($fetch_party_order_details = $search_party_order_details->fetch_array(MYSQLI_BOTH))
   {
      $output.='
                  <tr>
                  <td>'.$fetch_party_order_details['orders_order_number'].'</td>
                  <td>'.$fetch_party_order_details['orders_order_date'].'</td>
                  <td>
                     <div class="dropdown dropdown-inline mr-2">
      
                        <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                              <i class="flaticon-more">
                              </i>
                        </a>
                        <!--begin::Dropdown Menu-->
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                              <!--begin::Navigation-->
                              <ul class="navi flex-column navi-hover py-2">
                                 <li class="navi-item" onclick="viewIndividualOrder('."'".$fetch_party_order_details['orders_order_number']."'".')">
                                    <div class="navi-link" >
                                       <span class="navi-icon"><i class="flaticon-edit"></i></span>
                                       <span class="navi-text">View</span>
                                    </div>
                                 </li>
                                 <li class="navi-item" onclick="deleteIndividualOrder('."'".$fetch_party_order_details['orders_order_number']."'".')">
                                    <div class="navi-link">
                                          <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                          <span class="navi-text">Delete</span>
                                    </div>
                                 </li>
                              </ul>
                              <!--end::Navigation-->
                        </div>
                        <!--end::Dropdown Menu-->
                     </div>
                  </td>
                  </tr>
               ';
   }
   echo $output;
}


/* END CUSTOMER DETAILS TABLE */

/* BEGIN invoice DETAILS TABLE */

if((isset($_POST['invoice_details_table'])))
{
   $search_invoice_date_details = $con->query("SELECT * FROM `billing` WHERE billing_date = '$_POST[invoice_details_table_date]'");

   $output='';
   while($fetch_invoice_date_details = $search_invoice_date_details->fetch_array(MYSQLI_BOTH))
   {
      $search_customer_name = $con->query("SELECT * FROM `customer` WHERE customer_id = '$fetch_invoice_date_details[customer_id]'");
      $fetch_customer_name = $search_customer_name->fetch_array(MYSQLI_BOTH)['customer_name'];

      $output.='
                  <tr>
                  <td>'.$fetch_invoice_date_details['billing_bill_number'].'</td>
                  <td>'.$fetch_customer_name.'</td>
                  <td>'.$fetch_invoice_date_details['billing_payment_mode'].'</td>
                  <td>'.$fetch_invoice_date_details['billing_bill_amount'].'</td>
                  <td>'.($fetch_invoice_date_details['billing_bill_amount'] - $fetch_invoice_date_details['billing_paid_amount']).'</td>
                  <td>
                  <div class="dropdown dropdown-inline mr-2">
   
                     <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                           <i class="flaticon-more">
                           </i>
                     </a>
                  
                     <!--begin::Dropdown Menu-->
                     <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                           <!--begin::Navigation-->
                           <ul class="navi flex-column navi-hover py-2">
                              <li class="navi-item" onclick="viewIndividualInvoice('."'".$fetch_invoice_date_details['billing_bill_id']."'".')">
                                 <div class="navi-link" >
                                    <span class="navi-icon"><i class="flaticon-edit"></i></span>
                                    <span class="navi-text">View</span>
                                 </div>
                              </li>
                              <li class="navi-item" onclick="deleteIndividualInvoice('."'".$fetch_invoice_date_details['billing_bill_id']."'".')">
                                 <div class="navi-link">
                                       <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                       <span class="navi-text">Delete</span>
                                 </div>
                              </li>
                           </ul>
                           <!--end::Navigation-->
                     </div>
                     <!--end::Dropdown Menu-->
                  </div>
                  </td>
                  </tr>
               ';
   }
   echo $output;
}

/* END invoice DETAILS TABLE */

/* Begin ALL Customer */
if(isset($_POST['all_customer']))
{
   $output='';
   if($search_all_customer = $con->query("SELECT * FROM `customer`"))
   {
      $search_all_customer_count  = $search_all_customer->num_rows;
      if($search_all_customer_count>0)
      {
         while($fetch_all_customer = $search_all_customer->fetch_array(MYSQLI_BOTH))
         {
         $output.='
         <tr onclick="infoCustomer('.$fetch_all_customer['customer_id'].')" id="row_'.$fetch_all_customer['customer_id'].'">
         <td>'.$fetch_all_customer['customer_name'].'</td>
         <td>'.round((float)$fetch_all_customer['customer_total_bill_amount']-(float)$fetch_all_customer['customer_total_paid_amount'],2).'</td>
         <td>
                                             <div class="dropdown dropdown-inline mr-2">

                                             <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                                                   <i class="flaticon-more">
                                                   </i>
                                             </a>
                                             
                                          
                                             <!--begin::Dropdown Menu-->
                                             <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                   <!--begin::Navigation-->
                                                   <ul class="navi flex-column navi-hover py-2">
                                                      
                                                      <li class="navi-item" onclick="editCustomer('.$fetch_all_customer['customer_id'].')">
                                                         <div class="navi-link" >
                                                               <span class="navi-icon"><i class="flaticon-edit"></i></span>
                                                               <span class="navi-text">Edit</span>
                                                         </div>
                                                      </li>
                                                      <li class="navi-item" onclick="deleteCustomer('.$fetch_all_customer['customer_id'].')">
                                                         <div class="navi-link">
                                                               <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                                               <span class="navi-text">Delete</span>
                                                         </div>
                                                      </li>
                                                   </ul>
                                                   <!--end::Navigation-->
                                             </div>
                                             <!--end::Dropdown Menu-->
                                          </div>
                                             </td>
                                          </tr>
         ';
         }
      }
      else 
      {
         $output.='
            <tr><td colspan="3">No Customer To Show</td></tr>
         ';
      }
      echo $output;
   }
   
      
}
/* End ALL Customer */

/* Begin ALL party */
if(isset($_POST['all_party']))
{
   $output='';
   if($search_all_party = $con->query("SELECT * FROM `party`"))
   {
      $search_all_party_count  = $search_all_party->num_rows;
      if($search_all_party_count>0)
      {
         while($fetch_all_party = $search_all_party->fetch_array(MYSQLI_BOTH))
         {
         $output.='
         <tr onclick="infoParty('.$fetch_all_party['party_id'].')" id="row_'.$fetch_all_party['party_id'].'">
         <td>'.$fetch_all_party['party_name'].'</td>
         <td>'.round((float)$fetch_all_party['party_total_bill_amount']-(float)$fetch_all_party['party_total_paid_amount'], 2).'</td>
         <td>
            <div class="dropdown dropdown-inline mr-2">

               <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                     <i class="flaticon-more">
                     </i>
               </a>
            
               <!--begin::Dropdown Menu-->
               <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                  <!--begin::Navigation-->
                  <ul class="navi flex-column navi-hover py-2">
                     
                     <li class="navi-item" onclick="editParty('.$fetch_all_party['party_id'].')">
                        <div class="navi-link" >
                              <span class="navi-icon"><i class="flaticon-edit"></i></span>
                              <span class="navi-text">Edit</span>
                        </div>
                     </li>
                     <li class="navi-item" onclick="deleteParty('.$fetch_all_party['party_id'].')">
                        <div class="navi-link">
                              <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                              <span class="navi-text">Delete</span>
                        </div>
                     </li>
                  </ul>
                  <!--end::Navigation-->
               </div>
               <!--end::Dropdown Menu-->
            </div>
         </td>
         </tr>
         ';
         }
      }
      else 
      {
         $output.='
            <tr><td colspan="3">No Party To Show</td></tr>
         ';
      }
      echo $output;
   }
   
      
}
/* End ALL party */

/* Begin ALL invoice */
if(isset($_POST['all_invoice']))
{
   $output='';
   if($search_all_invoice = $con->query("SELECT billing_date, count(*) AS total_bills FROM `billing` GROUP BY billing_date"))
   {
      $search_all_invoice_count  = $search_all_invoice->num_rows;
      if($search_all_invoice_count>0)
      {

         while($fetch_all_invoice = $search_all_invoice->fetch_array(MYSQLI_BOTH))
         {
            $temp_date = explode("-", $fetch_all_invoice['billing_date']);
            $year = $temp_date[0];
            $month = $temp_date[1];
            $day = $temp_date[2];
            $billing_date = "'".$year.",".$month.",".$day."'";

            $output.='
            <tr onclick="infoInvoice('.$billing_date.')" id="row_'.$fetch_all_invoice['billing_date'].'">
            <td>'.$fetch_all_invoice['billing_date'].'</td>
            <td>'.$fetch_all_invoice['total_bills'].'</td>
            <td>
               <div class="dropdown dropdown-inline mr-2">

                  <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                        <i class="flaticon-more">
                        </i>
                  </a>
               
                  <!--begin::Dropdown Menu-->
                  <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                           <li class="navi-item" onclick="deleteInvoice('.$billing_date.')">
                              <div class="navi-link">
                                    <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                    <span class="navi-text">Delete</span>
                              </div>
                           </li>
                        </ul>
                        <!--end::Navigation-->
                  </div>
                  <!--end::Dropdown Menu-->
               </div>
            </td>
            </tr>
            ';
         }
      }
      else 
      {
         $output.='
            <tr><td colspan="3">No Invoice To Show</td></tr>
         ';
      }
      echo $output;
   }
   
      
}
/* End ALL invoice */

/* BEGIN DELETE  Customer */
if(isset($_POST['delete_customer_id']))
{
   $customer = array('customer_id' => $_POST['delete_customer_id']);

   $delete_customer_query=dalData("customer", $customer);
   $con->query($delete_customer_query);
}
/* END DELETE  Customer */

/* BEGIN DELETE  party */
if(isset($_POST['delete_party_id']))
{
   $party = array('party_id' => $_POST['delete_party_id']);

   $delete_party_query=dalData("party", $party);
   $con->query($delete_party_query);
}
/* END DELETE party */

/* BEGIN DELETE  invoice */
if(isset($_POST['delete_invoice_date']))
{

   $invoice = array('billing_date' => $_POST['delete_invoice_date']);

   $delete_invoice_query=dalData("billing", $invoice);
   $con->query($delete_invoice_query);
}
/* END DELETE invoice */

/* Begin Add Customer */
if((isset($_POST['customer_name'])) && (isset($_POST['customer_mobile_number'])) && (isset($_POST['customer_address'])) && (isset($_POST['customer_creation_date']))) 
{
   $status="";
   $date = $_POST['customer_creation_date'];
   $result=explode('/',$date);
   $year  = $result[2];
   $month = $result[0];
   $day   = $result[1];
   $new = $year.'-'.$month.'-'.$day;

   if($_POST['customer_id']!='')
   {
      $customer = array(
                  'customer_name'              => $_POST['customer_name'],
                  'customer_email'             => $_POST['customer_email'],
                  'customer_address'           => $_POST['customer_address'],
                  'customer_gst'               => $_POST['customer_gst'],
                  'customer_total_paid_amount' => $_POST['customer_total_paid_amount'],
                  'customer_updation_date'     => $new
               );
         
               $update_customer_query = updateData(array("customer_id" => $_POST['customer_id']),$customer,"customer");
         
               $con->query($update_customer_query); 
               echo json_encode($customer);
   }
   else 
   {
      if($search_customer= $con->query("SELECT * FROM `customer` WHERE `customer_mobile_number`='$_POST[customer_mobile_number]'"))
      {
         $search_number_of_rows=$search_customer->num_rows;
         if($search_number_of_rows>0)
         {
               $status="error";
               $array = array('status' => $status, 'last_id' => $con->insert_id);
               echo json_encode($array);
         } 
         else 
         {
            $customer = array(
               'customer_mobile_number'     => $_POST['customer_mobile_number'],
               'customer_name'              => $_POST['customer_name'],
               'customer_email'             => $_POST['customer_email'],
               'customer_address'           => $_POST['customer_address'],
               'customer_gst'               => $_POST['customer_gst'],
               'customer_total_paid_amount' => $_POST['customer_total_paid_amount'],
               'customer_creation_date'     => $new
            );
            $add_customer_query=setData ("customer", $customer);
            $con->query($add_customer_query);
            $status="success";
            $array = array('status' => $status, 'last_id' => $con->insert_id, 'query' => $add_customer_query);   
            echo json_encode($array);
         }
      }
   }
}
/* End Add Customer */

/* Begin Add party */
if((isset($_POST['party_name'])) && (isset($_POST['party_mobile_number'])) && (isset($_POST['party_address'])) && (isset($_POST['party_creation_date']))) 
{
   $status="";
   $date = $_POST['party_creation_date'];
   $result=explode('/',$date);
   $year  = $result[2];
   $month = $result[0];
   $day   = $result[1];
   $new = $year.'-'.$month.'-'.$day;

   if($_POST['party_id']!='')
   {
      $party = array(
                  'party_name'               => $_POST['party_name'],
                  'party_email_id'           => $_POST['party_email'],
                  'party_gst_type'           => $_POST['party_gst_type'],
                  'party_gst_in_number'      => $_POST['party_gst_value'],
                  'party_state_name'         => $_POST['party_state'],
                  'party_total_paid_amount'  => $_POST['party_total_paid_amount'],
                  'party_address'            => $_POST['party_address'],
                  'party_last_updation_date' => $new
               );
         
               $update_party_query = updateData(array("party_id" => $_POST['party_id']),$party,"party");
         
               $con->query($update_party_query); 
               echo json_encode($party);
   }
   else 
   {
      if($search_party= $con->query("SELECT * FROM `party` WHERE `party_phone_no`='$_POST[party_mobile_number]'"))
      {
         $search_number_of_rows=$search_party->num_rows;
         if($search_number_of_rows>0)
         {
               $status="error";
               $array = array('status' => $status, 'last_id' => $con->insert_id);
               echo json_encode($array);
         } 
         else 
         {
            $party = array(
               'party_phone_no'           => $_POST['party_mobile_number'],
               'party_name'               => $_POST['party_name'],
               'party_email_id'           => $_POST['party_email'],
               'party_gst_type'           => $_POST['party_gst_type'],
               'party_gst_in_number'      => $_POST['party_gst_value'],
               'party_state_name'         => $_POST['party_state'],
               'party_total_paid_amount'  => $_POST['party_total_paid_amount'],
               'party_address'            => $_POST['party_address'],
               'party_last_updation_date' => $new
               );
            $add_party_query=setData ("party", $party);
            $con->query($add_party_query);
            $status="success";
            $array = array('status' => $status, 'last_id' => $con->insert_id, 'query' => $add_party_query);   
            echo json_encode($array);
         }
      }
   }
}
/* End Add party */

/* Begin edit customer */
if((isset($_POST['edit_customer_id'])))
{
   $status="";
   if($edit_customer= $con->query("SELECT * FROM `customer` WHERE `customer_id`='$_POST[edit_customer_id]'"))
   {
      $edit_customer_details = $edit_customer->fetch_array(MYSQLI_BOTH);
      $status="success";
      $openning_balance_status = (($edit_customer_details['customer_total_bill_amount'] - $edit_customer_details['customer_total_paid_amount']) > 0) ? 'RECEIVE' : 'PAY';

      $edit_customer_details_array = array(
         'customer_id'             => $edit_customer_details['customer_id'],
         'customer_mobile_number'  => $edit_customer_details['customer_mobile_number'],
         'customer_name'           => $edit_customer_details['customer_name'],
         'customer_email'          => $edit_customer_details['customer_email'],
         'customer_address'        => $edit_customer_details['customer_address'],
         'customer_gst'            => $edit_customer_details['customer_gst'],
         'customer_total_balance'  => abs(round((float)$edit_customer_details['customer_total_bill_amount']-(float)$edit_customer_details['customer_total_paid_amount'],2)),
         'customer_balance_status' => $openning_balance_status,
         'customer_creation_date'  => $edit_customer_details['customer_creation_date'],
         'status'                  => $status
      );

      echo json_encode($edit_customer_details_array);

   }
}
/* End edit customer */

/* Begin edit party */
if((isset($_POST['edit_party_id'])))
{
   $status="";
   if($edit_party= $con->query("SELECT * FROM `party` WHERE `party_id`='$_POST[edit_party_id]'"))
   {
      $edit_party_details = $edit_party->fetch_array(MYSQLI_BOTH);
      $status="success";
      $openning_balance_status = (($edit_party_details['party_total_bill_amount'] - $edit_party_details['party_total_paid_amount']) > 0) ? 'PAY' : 'RECEIVE';

      $edit_party_details_array = array(
         'party_id'            => $edit_party_details['party_id'],
         'party_phone_number'  => $edit_party_details['party_phone_no'],
         'party_name'          => $edit_party_details['party_name'],
         'party_email'         => $edit_party_details['party_email_id'],
         'party_gst_type'      => $edit_party_details['party_gst_type'],
         'party_gst_value'     => $edit_party_details['party_gst_in_number'],
         'party_state'         => $edit_party_details['party_state_name'],
         'party_address'       => $edit_party_details['party_address'],
         'party_total_balance' => abs(round((float)$edit_party_details['party_total_bill_amount']-(float)$edit_party_details['party_total_paid_amount'],2)),
         'party_creation_date' => $edit_party_details['party_creation_date'],
         'status'              => $status
      );

      echo json_encode($edit_party_details_array);
   }
}
/* End edit party */

/* BEGIN GET MIN  customer */
if ((isset($_POST['min_customer_id'])))
{
   $search_min_customer_id = $con->query("SELECT MIN(customer_id) AS MIN_ID FROM `customer`");
   $min_customer_id_value = $search_min_customer_id->fetch_array(MYSQLI_BOTH)['MIN_ID'];
   echo $min_customer_id_value;
}
/* END GET MIN  customer */
/* BEGIN GET MIN party */
if ((isset($_POST['min_party_id'])))
{
   $search_min_party_id = $con->query("SELECT MIN(party_id) AS MIN_ID FROM `party`");
   $min_party_id_value = $search_min_party_id->fetch_array(MYSQLI_BOTH)['MIN_ID'];
   echo $min_party_id_value;
}
/* END GET MIN  party */
if ((isset($_POST['min_unit_id'])))
{
   $search_min_unit_id = $con->query("SELECT MIN(unit_id) AS MIN_UNIT_ID FROM `unit`");
   $min_unit_id_value = $search_min_unit_id->fetch_array(MYSQLI_BOTH)['MIN_UNIT_ID'];
   echo $min_unit_id_value;
}

if ((isset($_POST['min_category_id'])))
{
   $search_min_category_id = $con->query("SELECT MIN(category_id) AS MIN_CATEGORY_ID FROM `category`");
   $min_category_id_value = $search_min_category_id->fetch_array(MYSQLI_BOTH)['MIN_CATEGORY_ID'];
   echo $min_category_id_value;
}

if ((isset($_POST['min_item_id'])))
{
   $search_min_item_id = $con->query("SELECT MIN(stock_pid) AS MIN_ITEM_ID FROM `stock`");
   $min_item_id_value = $search_min_item_id->fetch_array(MYSQLI_BOTH)['MIN_ITEM_ID'];
   echo $min_item_id_value;
}

/* BEGIN GET MIN  invoice */
if ((isset($_POST['min_invoice_date'])))
{
   $search_min_invoice_date = $con->query("SELECT MIN(billing_date) AS MIN_DATE FROM `billing`");
   $min_invoice_date_value = $search_min_invoice_date->fetch_array(MYSQLI_BOTH)['MIN_DATE'];

   $min_invoice_date_exploded = explode('-',$min_invoice_date_value);
   $min_invoice_date_imploded = implode(',',$min_invoice_date_exploded);
   echo $min_invoice_date_imploded;
}
/* END GET MIN invoice */

/* Begin Add Category */
if((isset($_POST['category_name'])))
{
   date_default_timezone_set("Asia/Kolkata");
   $category_creation_timestamp = date('Y-m-d H:i:s');

   if($_POST['category_id']!='')
   {
      $category = array(
         'category_name' => $_POST['category_name'],
         'category_last_updation_timestamp' => $category_creation_timestamp
      );
         
               $update_category_query = updateData(array("category_id" => $_POST['category_id']),$category,"category");
               $con->query($update_category_query); 
               $status="OK";
               $array = array('status' => $status);
               echo json_encode($array);
   }
   else
   {
      if($search_category= $con->query("SELECT * FROM `category` WHERE `category_name`='$_POST[category_name]'"))
      {
         $search_number_of_rows=$search_category->num_rows;
         if($search_number_of_rows==1)
         {
            $status="FAILED";
            $array = array('status' => $status);
            echo json_encode($array);
         }
         else
         {
            $category = array(
               'category_name' => $_POST['category_name'],
               'category_creation_timestamp' => $category_creation_timestamp
            );
            $add_category_query=setData("category", $category);
            $con->query($add_category_query);
            $status="OK";
            $array = array('status' => $status);
            echo json_encode($array);
         }
      }
   }
}
/* End Add Category */

if(isset($_POST['delete_unit_id']))
{

   $unit = array('unit_id' => $_POST['delete_unit_id']);

   $delete_unit_query=dalData("unit", $unit);
   $con->query($delete_unit_query);
}

if(isset($_POST['delete_category_id']))
{

   $category = array('category_id' => $_POST['delete_category_id']);

   $delete_category_query=dalData("category", $category);
   $con->query($delete_category_query);
}

if(isset($_POST['delete_item_id']))
{
   $search_item_category = $con->query("SELECT `category_id` FROM `stock` WHERE stock_pid = '$_POST[delete_item_id]'");
   $fetch_item_category = $search_item_category->fetch_array(MYSQLI_BOTH)['category_id'];

   $item = array('stock_pid' => $_POST['delete_item_id']);

   $delete_item_query=dalData("stock", $item);
   $con->query($delete_item_query);

   echo $fetch_item_category;
}

/* Begin add unit*/

if((isset($_POST['unit_full_name'])) && (isset($_POST['unit_short_name'])))
{
   $status='';
   date_default_timezone_set("Asia/Kolkata");
   $unit_creation_timestamp = date('Y-m-d H:i:s');

   if($_POST['unit_id']!='')
   {
      $unit = array(
         'unit_full_name'  => $_POST['unit_full_name'],
         'unit_short_name' => $_POST['unit_short_name']
      );

      $update_unit_query = updateData(array("unit_id" => $_POST['unit_id']),$unit,"unit");

      $con->query($update_unit_query); 

      $status="OK";
      $array = array('status' => $status);
      echo json_encode($array);
   }
   else
   {
      if(($search_unit_fullname=$con->query("SELECT * FROM `unit` WHERE `unit_full_name`='$_POST[unit_full_name]'")) && ($search_unit_shortname=$con->query("SELECT * FROM `unit` WHERE `unit_short_name`='$_POST[unit_short_name]'"))  )
      {
         $search_number_of_fullname_rows =$search_unit_fullname->num_rows;
         $search_number_of_shortname_rows=$search_unit_shortname->num_rows;
         if($search_number_of_fullname_rows==1 && $search_number_of_shortname_rows==1)
            {
               $status="FAILED_BOTH";
               $array = array('status' => $status);
               echo json_encode($array);
            }
         elseif($search_number_of_fullname_rows==1)
            {
               $status="FAILED_FULLNAME";
               $array = array('status' => $status);
               echo json_encode($array);
            }
         elseif($search_number_of_shortname_rows==1)
            {
               $status="FAILED_SHORTNAME";
               $array = array('status' => $status);
               echo json_encode($array);
            }
         else
         {
            $unit = array(
               'unit_full_name'          => $_POST['unit_full_name'],
               'unit_short_name'         => $_POST['unit_short_name'],
               'unit_creation_timestamp' => $unit_creation_timestamp
            );
            $add_unit_query=setData("unit", $unit);
            $con->query($add_unit_query);
            $status="OK";
            $array = array('status' => $status);   
            echo json_encode($array);
         }
      }
   }
}

/* End add unit*/

if(isset($_POST['unit_info']))
{
   $result='';
      $search_unit = $con->query("SELECT * FROM `unit` WHERE `unit_id`='$_POST[unit_info]'");
      while($fetch_unit = $search_unit->fetch_array(MYSQLI_BOTH))
         {
            $result.='
            <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">'.$fetch_unit['unit_full_name'].'</span><br>
                        
                    </h3>
                    <h3 class="card-title align-items-start flex-column">
                        <a href="javascript:;" class="btn btn-primary" onclick="call_conversion()">
                            <i class="fa fa-cog icon-lg"></i>
                            <span>Add Conversion</span>
                        </a>
                    </h3>
                </div>
            ';
         }
         
         echo $result;
}

if(isset($_POST['category_info']))
{
   $result='';
      $search_category = $con->query("SELECT * FROM `category` WHERE `category_id`='$_POST[category_info]'");
      while($fetch_category = $search_category->fetch_array(MYSQLI_BOTH))
         {
            $result.='
            <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">'.$fetch_category['category_name'].'</span><br>
                        
                    </h3>
                    <h3 class="card-title align-items-start flex-column">
                        <a href="javascript:;" class="btn btn-primary" onclick="callModal(\'editUnit\')">
                            <i class="fa fa-cog icon-lg"></i>
                            <span>Add Conversion</span>
                        </a>
                    </h3>
                </div>
            ';
         }
         
         echo $result;
}

if(isset($_POST['item_info']))
{
   $result='';
      $search_item = $con->query("SELECT s.stock_pid AS stock_pid, s.stock_pname AS stock_pname, s.stock_sell_price AS stock_sell_price, s.stock_purchase_price AS stock_purchase_price, s.stock_total_quantity AS stock_total_quantity, c.conversion_rate AS conversion_rate FROM `stock` s, `conversion` c WHERE s.conversion_id = c.conversion_id AND s.stock_pid='$_POST[item_info]'");

      while($fetch_item = $search_item->fetch_array(MYSQLI_BOTH))
         {
            $stock_price = round(((float)$fetch_item['stock_purchase_price']/(float)$fetch_item['conversion_rate'])*(float)$fetch_item['stock_total_quantity'],2);

            $result.='
            <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">'.$fetch_item['stock_pname'].'</span><br>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">Sale Price: <i class="la la-rupee icon-md text-success">'.$fetch_item['stock_sell_price'].'</i></span><br>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">Purchase Price: <i class="la la-rupee icon-md text-success">'.$fetch_item['stock_purchase_price'].'</i></span></span>
                        
                    </h3>
                    <h3 class="card-title align-items-start flex-column">
                        <button class="btn btn-primary" onclick="adjust_item('.$fetch_item['stock_pid'].');"><i class="fa fa-cog icon-lg"></i><span>Adjust Item</span>
                        </button>
                        <br>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">Stock Value: <i class="la la-rupee icon-md text-success">'.$stock_price.'</i></span>
                    </h3>
                </div>
            ';
         }
         
         echo $result;
}

/* Begin edit unit */

if((isset($_POST['edit_unit_id'])))
{
   $status="";
   if($edit_unit= $con->query("SELECT * FROM `unit` WHERE `unit_id`='$_POST[edit_unit_id]'"))
   {
      $edit_unit_details = $edit_unit->fetch_array(MYSQLI_BOTH);
      $status="OK";
      $edit_unit_details_array = array(
         'unit_id'         => $edit_unit_details['unit_id'],
         'unit_full_name'  => $edit_unit_details['unit_full_name'],
         'unit_short_name' => $edit_unit_details['unit_short_name'],
         'status'          => $status
      );
      echo json_encode($edit_unit_details_array);
   }
}

/* End edit unit */

/* Begin edit category */

if((isset($_POST['edit_category_id'])))
{
   $status="";
   if($edit_category= $con->query("SELECT * FROM `category` WHERE `category_id`='$_POST[edit_category_id]'"))
   {
      $edit_category_details = $edit_category->fetch_array(MYSQLI_BOTH);
      $status="OK";
      $edit_category_details_array = array(
         'category_id'   => $edit_category_details['category_id'],
         'category_name' => $edit_category_details['category_name'],
         'status'        => $status
      );
      echo json_encode($edit_category_details_array);
   }
}

/* End edit unit */


/* Begin edit item */

if((isset($_POST['edit_item_id'])))
{
   $status="";
   if($edit_item= $con->query("SELECT * FROM `stock` WHERE `stock_pid`='$_POST[edit_item_id]'"))
   {
      $search_conversion_rate = $con->query("SELECT c.conversion_rate AS conversion_rate FROM `stock` s INNER JOIN `conversion` c ON s.conversion_id = c.conversion_id WHERE `stock_pid`='$_POST[edit_item_id]'");
      $fetch_conversion_rate = $search_conversion_rate->fetch_array(MYSQLI_BOTH);
      $edit_item_details = $edit_item->fetch_array(MYSQLI_BOTH);
      $units = $edit_item_details['stock_total_quantity'] / $fetch_conversion_rate['conversion_rate'];
      $date  = $edit_item_details['stock_creation_date'];
      $result=explode('-',$date);
      $year  = $result[0];
      $month = $result[1];
      $day   = $result[2];
      $new = $month.'/'.$day.'/'.$year;
      $status="OK";
      $edit_item_details_array = array(
         'stock_pid'            => $edit_item_details['stock_pid'],
         'stock_pname'          => $edit_item_details['stock_pname'],
         'stock_hsn_sac'        => $edit_item_details['stock_hsn_sac'],
         'conversion_id'        => $edit_item_details['conversion_id'],
         'category_id'          => $edit_item_details['category_id'],
         'stock_item_code'      => $edit_item_details['stock_item_code'],
         'stock_creation_date'  => $new,
         'stock_tax_rate'       => $edit_item_details['stock_tax_rate'],
         'stock_sell_price'     => $edit_item_details['stock_sell_price'],
         'stock_stax_status'    => $edit_item_details['stock_stax_status'],
         'stock_purchase_price' => $edit_item_details['stock_purchase_price'],
         'stock_ptax_status'    => $edit_item_details['stock_ptax_status'],
         'stock_min_stock'      => $edit_item_details['stock_min_stock'],
         'stock_total_quantity' => $units,
         'status'               => $status
      );
      echo json_encode($edit_item_details_array);
   }
}

/* End edit item */

/* Begin ALL unit */
if(isset($_POST['all_unit']))
{
   $output='';
   if($search_all_unit = $con->query("SELECT * FROM `unit`"))
   {
      $search_all_unit_count  = $search_all_unit->num_rows;
      if($search_all_unit_count>0)
      {
         while($fetch_all_unit = $search_all_unit->fetch_array(MYSQLI_BOTH))
         {
         $output.='
         <tr onclick="infoUnit('.$fetch_all_unit['unit_id'].')" id="row_'.$fetch_all_unit['unit_id'].'">
         <td>'.$fetch_all_unit['unit_full_name'].'</td>
         <td>'.$fetch_all_unit['unit_short_name'].'</td>
         <td>
                                             <div class="dropdown dropdown-inline mr-2">

                                             <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                                                 <i class="flaticon-more">
                                                 </i>
                                             </a>
                                             
                                         
                                             <!--begin::Dropdown Menu-->
                                             <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                 <!--begin::Navigation-->
                                                 <ul class="navi flex-column navi-hover py-2">
                                                    
                                                     <li class="navi-item" onclick="editThisUnit('.$fetch_all_unit['unit_id'].')">
                                                         <div class="navi-link" >
                                                             <span class="navi-icon"><i class="flaticon-edit"></i></span>
                                                             <span class="navi-text">Edit</span>
                                                         </div>
                                                     </li>
                                                     <li class="navi-item" onclick="deleteThisUnit('.$fetch_all_unit['unit_id'].')">
                                                         <div class="navi-link">
                                                             <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                                             <span class="navi-text">Delete</span>
                                                         </div>
                                                     </li>
                                                 </ul>
                                                 <!--end::Navigation-->
                                             </div>
                                             <!--end::Dropdown Menu-->
                                         </div>
                                             </td>
                                         </tr>
         ';
         }
      }
      else 
      {
         $output.='
            <tr><td colspan="3">No Unit To Show</td></tr>
         ';
      }
      echo $output;
   }
   
     
}
/* End ALL unit */

/* Begin ALL category */
if(isset($_POST['all_category']))
{
   $output='';
   if($search_all_category = $con->query("SELECT * FROM `category`"))
   {
      $search_all_category_count  = $search_all_category->num_rows;
      if($search_all_category_count>0)
      {
         while($fetch_all_category = $search_all_category->fetch_array(MYSQLI_BOTH))
         {
         $output.='
         <tr onclick="infoCategory('.$fetch_all_category['category_id'].')" id="row_'.$fetch_all_category['category_id'].'">
         <td>'.$fetch_all_category['category_name'].'</td>
         <td>
                                             <div class="dropdown dropdown-inline mr-2">

                                             <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                                                 <i class="flaticon-more">
                                                 </i>
                                             </a>
                                             
                                         
                                             <!--begin::Dropdown Menu-->
                                             <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                 <!--begin::Navigation-->
                                                 <ul class="navi flex-column navi-hover py-2">
                                                    
                                                     <li class="navi-item" onclick="editCategory('.$fetch_all_category['category_id'].')">
                                                         <div class="navi-link" >
                                                             <span class="navi-icon"><i class="flaticon-edit"></i></span>
                                                             <span class="navi-text">Edit</span>
                                                         </div>
                                                     </li>
                                                     <li class="navi-item" onclick="deleteCategory('.$fetch_all_category['category_id'].')">
                                                         <div class="navi-link">
                                                             <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                                             <span class="navi-text">Delete</span>
                                                         </div>
                                                     </li>
                                                 </ul>
                                                 <!--end::Navigation-->
                                             </div>
                                             <!--end::Dropdown Menu-->
                                         </div>
                                             </td>
                                         </tr>
         ';
         }
      }
      else 
      {
         $output.='
            <tr><td colspan="3">No Category To Show</td></tr>
         ';
      }
      echo $output;
   }
   
     
}
/* End ALL category */

/* Begin ALL item */
if(isset($_POST['all_item']))
{
   $output='';
   if($search_all_item = $con->query("SELECT * FROM `stock`"))
   {
      $search_all_item_count  = $search_all_item->num_rows;
      if($search_all_item_count>0)
      {
         while($fetch_all_item = $search_all_item->fetch_array(MYSQLI_BOTH))
         {
            $search_conversion=$con->query("SELECT c.conversion_rate as conversion_rate, u1.unit_short_name AS base_unit_name, u2.unit_short_name AS secondary_unit_name FROM stock s, conversion c, unit u1, unit u2 WHERE s.conversion_id = c.conversion_id AND c.base_unit_id = u1.unit_id AND c.secondary_unit_id = u2.unit_id AND s.stock_pid = '$fetch_all_item[stock_pid]'");
            $fetch_conversion=$search_conversion->fetch_array(MYSQLI_BOTH);
            $fetch_conversion_rate=$fetch_conversion['conversion_rate'];
            $quantity_in_base_unit = (float)$fetch_all_item['stock_total_quantity']/(float)$fetch_conversion_rate;
            $base_unit_name=$fetch_conversion['base_unit_name'];
            $quantity_in_sec_unit = $fetch_all_item['stock_total_quantity']%$fetch_conversion_rate;
            $secondary_unit_name=$fetch_conversion['secondary_unit_name'];
            
            $output.='
            <tr onclick="infoItem('.$fetch_all_item['stock_pid'].')" id="row_'.$fetch_all_item['stock_pid'].'">
            <td>'.$fetch_all_item['stock_pname'].'</td>
            <td>'.(int)$quantity_in_base_unit.' '.$base_unit_name.', '.$quantity_in_sec_unit.' '.$secondary_unit_name.'</td>
            <td>
                                                <div class="dropdown dropdown-inline mr-2">

                                                <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                                                   <i class="flaticon-more">
                                                   </i>
                                                </a>
                                                
                                          
                                                <!--begin::Dropdown Menu-->
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                   <!--begin::Navigation-->
                                                   <ul class="navi flex-column navi-hover py-2">
                                                      
                                                      <li class="navi-item" onclick="editItem('.$fetch_all_item['stock_pid'].')">
                                                            <div class="navi-link" >
                                                               <span class="navi-icon"><i class="flaticon-edit"></i></span>
                                                               <span class="navi-text">Edit</span>
                                                            </div>
                                                      </li>
                                                      <li class="navi-item" onclick="deleteItem('.$fetch_all_item['stock_pid'].')">
                                                            <div class="navi-link">
                                                               <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                                               <span class="navi-text">Delete</span>
                                                            </div>
                                                      </li>
                                                   </ul>
                                                   <!--end::Navigation-->
                                                </div>
                                                <!--end::Dropdown Menu-->
                                          </div>
                                                </td>
                                          </tr>
            ';
         }
      }
      else 
      {
         $output.='
            <tr><td colspan="3">No Unit To Show</td></tr>
         ';
      }
      echo $output;
   }
   
     
}
/* End ALL item */

/* begin unit details table */

if((isset($_POST['unit_details_table'])))
{
   $output='';
   if($search_all_conversion = $con->query("SELECT * FROM `conversion` WHERE base_unit_id = '$_POST[unit_details_table_id]'"))
   {
      $search_all_conversion_count  = $search_all_conversion->num_rows;
      if($search_all_conversion_count>0)
      {
         $search_base_unit=$con->query("SELECT * FROM `unit` WHERE unit_id = '$_POST[unit_details_table_id]'");
         $fetch_base_unit=$search_base_unit->fetch_array(MYSQLI_BOTH);
         $base_unit_name=$fetch_base_unit['unit_full_name'];

         $count=1;
         while($fetch_all_conversion = $search_all_conversion->fetch_array(MYSQLI_BOTH))
         {
         $search_secondary_unit=$con->query("SELECT * FROM `unit` WHERE unit_id = '$fetch_all_conversion[secondary_unit_id]'");
         $fetch_secondary_unit=$search_secondary_unit->fetch_array(MYSQLI_BOTH);
         $secondary_unit_name=$fetch_secondary_unit['unit_full_name'];

         $conversion_rate=$fetch_all_conversion['conversion_rate'];

            $output.='
               <tr >
               <td>'.$count.'</td>
               <td> 1 '.$base_unit_name.' = '.$conversion_rate.' '.$secondary_unit_name.'</td>
               </tr>
            ';
         $count++;
         }
      }
      else 
      {
         $output.='
         <tr><td colspan="3">No Conversion To Show</td></tr>
         ';
      }
      echo $output;
   }
}

/* end unit details table */

/* begin category details table */

if((isset($_POST['category_details_table'])))
{
   $output='';
   if($search_all_item = $con->query("SELECT * FROM `stock` WHERE category_id = '$_POST[category_details_table_id]'"))
   {
      $search_all_item_count  = $search_all_item->num_rows;
      if($search_all_item_count>0)
      {
         $count=1;
         while($fetch_all_item = $search_all_item->fetch_array(MYSQLI_BOTH))
         {
            $search_conversion = $con->query("SELECT c.conversion_rate AS conversion_rate, u1.unit_short_name AS base_unit_name, u2.unit_short_name AS secondary_unit_name FROM `conversion` c, `unit` u1, `unit` u2 WHERE c.base_unit_id = u1.unit_id AND c.secondary_unit_id = u2.unit_id AND c.conversion_id = '$fetch_all_item[conversion_id]'");
            $fetch_conversion = $search_conversion->fetch_array(MYSQLI_BOTH);

            $conversion_rate = $fetch_conversion['conversion_rate'];
            $base_unit_name = $fetch_conversion['base_unit_name'];
            $secondary_unit_name = $fetch_conversion['secondary_unit_name'];
            $quantity_in_base_unit = (int)($fetch_all_item['stock_total_quantity'] / $conversion_rate);
            $quantity_in_secondary_unit = $fetch_all_item['stock_total_quantity'] % $conversion_rate;
            

            $output.='
               <tr >
               <td>'.$count.'</td>
               <td>'.$fetch_all_item['stock_pname'].'</td>
               <td>'.$quantity_in_base_unit.' '.$base_unit_name.','.$quantity_in_secondary_unit.' '.$secondary_unit_name.'</td>
               <td>
                  <div class="dropdown dropdown-inline mr-2">

                     <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                           <i class="flaticon-more">
                           </i>
                     </a>
                     
                  
                     <!--begin::Dropdown Menu-->
                     <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                           <!--begin::Navigation-->
                           <ul class="navi flex-column navi-hover py-2">
                              
                              <li class="navi-item" onclick="editItem('.$fetch_all_item['stock_pid'].')">
                                 <div class="navi-link" >
                                       <span class="navi-icon"><i class="flaticon-edit"></i></span>
                                       <span class="navi-text">Edit</span>
                                 </div>
                              </li>
                              <li class="navi-item" onclick="deleteItem('.$fetch_all_item['stock_pid'].')">
                                 <div class="navi-link">
                                       <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                       <span class="navi-text">Delete</span>
                                 </div>
                              </li>
                           </ul>
                           <!--end::Navigation-->
                     </div>
                     <!--end::Dropdown Menu-->
                  </div>
               </td>
               </tr>
            ';
         $count++;
         }
      }
      else 
      {
         $output.='
         <tr><td colspan="3">No item To Show</td></tr>
         ';
      }
      echo $output;
   }
}

/* end category details table */

/* BEGIN ITEM DETAILS TABLE */

if((isset($_POST['item_details_table'])))
{
   $search_item_adjustment_details = $con->query("SELECT * FROM `adjustment` WHERE stock_pid = '$_POST[item_details_table_id]'");

   $output='';

   while($fetch_item_adjustment_details = $search_item_adjustment_details->fetch_array(MYSQLI_BOTH))
   {
      $output.='
                  <tr >
                  <td>'.$fetch_item_adjustment_details['adjustment_type'].'</td>
                  <td>'.$fetch_item_adjustment_details['adjustment_quantity'].'</td>
                  <td>'.$fetch_item_adjustment_details['adjustment_purchase_rate'].'</td>
                  <td>'.$fetch_item_adjustment_details['adjustment_description'].'</td>
                  <td>
                  <div class="dropdown dropdown-inline mr-2">
   
                     <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                           <i class="flaticon-more">
                           </i>
                     </a>
                  
                     <!--begin::Dropdown Menu-->
                     <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                           <!--begin::Navigation-->
                           <ul class="navi flex-column navi-hover py-2">
                              <li class="navi-item" onclick="deleteIndividualAdjustment('.$fetch_item_adjustment_details['adjustment_id'].')">
                                 <div class="navi-link">
                                       <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                       <span class="navi-text">Delete</span>
                                 </div>
                              </li>
                           </ul>
                           <!--end::Navigation-->
                     </div>
                     <!--end::Dropdown Menu-->
                  </div>
                  </td>
                  
                  </tr>
               ';
   }
   echo $output;
}

/* end item details table */

/* Begin Add Item */

if((isset($_POST['stock_pname'])) && (isset($_POST['stock_hsn_sac'])) && (isset($_POST['conversion_id'])) && (isset($_POST['stock_item_code'])) && (isset($_POST['stock_tax_rate'])) && (isset($_POST['stock_creation_date'])) && (isset($_POST['stock_sell_price'])) && (isset($_POST['stock_stax_status'])) && (isset($_POST['stock_purchase_price'])) && (isset($_POST['stock_ptax_status'])) && (isset($_POST['stock_min_stock'])) && (isset($_POST['stock_total_quantity']))) 
{
   $date  = $_POST['stock_creation_date'];
   $result=explode('/',$date);
   $year  = $result[2];
   $month = $result[0];
   $day   = $result[1];
   $new = $year.'-'.$month.'-'.$day;

   $search_conversion_rate = $con->query("SELECT * FROM `conversion` WHERE conversion_id = '$_POST[conversion_id]'");
   $fetch_conversion_rate = $search_conversion_rate->fetch_array(MYSQLI_BOTH);
   $stock_quantity = (float)$_POST['stock_total_quantity'] * (float)$fetch_conversion_rate['conversion_rate'];

   if($_POST['stock_pid']!='')
   {
      $item = array(
         'stock_pname'          => $_POST['stock_pname'],
         'stock_hsn_sac'        => $_POST['stock_hsn_sac'],
         'conversion_id'        => $_POST['conversion_id'],
         'category_id'          => $_POST['category_id'],
         'stock_print_in_bill'  => $_POST['stock_print_in_bill'],
         'stock_item_code'      => $_POST['stock_item_code'],
         'stock_tax_rate'       => $_POST['stock_tax_rate'],
         'stock_creation_date'  => $new,
         'stock_sell_price'     => $_POST['stock_sell_price'],
         'stock_stax_status'    => $_POST['stock_stax_status'],
         'stock_purchase_price' => $_POST['stock_purchase_price'],
         'stock_ptax_status'    => $_POST['stock_ptax_status'],
         'stock_min_stock'      => $_POST['stock_min_stock'],
         'stock_total_quantity' => $stock_quantity
      );
      $update_item_query = updateData(array("stock_pid" => $_POST['stock_pid']),$item,"stock");
      $con->query($update_item_query); 
      $status="OK";
      $array = array('status' => $status, 'query' => $update_item_query);
      echo json_encode($array);
   }
   else{
      $item = array(
         'stock_pname'          => $_POST['stock_pname'],
         'stock_hsn_sac'        => $_POST['stock_hsn_sac'],
         'conversion_id'        => $_POST['conversion_id'],
         'category_id'          => $_POST['category_id'],
         'stock_print_in_bill'  => $_POST['stock_print_in_bill'],
         'stock_item_code'      => $_POST['stock_item_code'],
         'stock_tax_rate'       => $_POST['stock_tax_rate'],
         'stock_creation_date'  => $new,
         'stock_sell_price'     => $_POST['stock_sell_price'],
         'stock_stax_status'    => $_POST['stock_stax_status'],
         'stock_purchase_price' => $_POST['stock_purchase_price'],
         'stock_ptax_status'    => $_POST['stock_ptax_status'],
         'stock_min_stock'      => $_POST['stock_min_stock'],
         'stock_total_quantity' => $stock_quantity
      );
      $add_item_query = setData("stock", $item);
      $con->query($add_item_query);
      $status="OK";
      $array = array('status' => $status, 'query' => $add_item_query);
      echo json_encode($array);
   }
}

/* End Add Item */

/* Begin Add Conversion */

if((isset($_POST['base_unit_id'])) && (isset($_POST['conversion_rate'])) && (isset($_POST['secondary_unit_id']))) 
{
   $status='';
   $last_index='';
   $base_unit_name='';
   $secondary_unit_name='';
   $conversion_rate='';

   if ($_POST['base_unit_id'] == "")
      $status = "NO_BASE_UNIT";
   else if ($_POST['secondary_unit_id'] == "")
      $status = "NO_SECONDARY_UNIT";
   else if ($_POST['base_unit_id'] == $_POST['secondary_unit_id'])
      $status = "SAME_UNIT";
   else if ($_POST['conversion_rate'] == 0)
      $status = "ZERO_CONVERSION_RATE";
   else
      {
         $conversion = array(
            'base_unit_id'      => $_POST['base_unit_id'],
            'conversion_rate'   => $_POST['conversion_rate'],
            'secondary_unit_id' => $_POST['secondary_unit_id']
         );
         $add_conversion_query=setData ("conversion", $conversion);
         $con->query($add_conversion_query);
         $status="OK";
         $last_id=$con->insert_id;

         $base_unit_name=$con->query("SELECT * FROM `unit` WHERE `unit_id`='$_POST[base_unit_id]'")->fetch_array(MYSQLI_BOTH)['unit_full_name'];
         $secondary_unit_name=$con->query("SELECT * FROM `unit` WHERE `unit_id`='$_POST[secondary_unit_id]'")->fetch_array(MYSQLI_BOTH)['unit_full_name'];
      }
   echo json_encode(array('status' => $status, 'last_id' => $last_id, 'base_unit' => $base_unit_name, 'secondary_unit' => $secondary_unit_name, 'conversion_rate' => $_POST['conversion_rate']));
}

/* End Add Conversion */

if(isset($_POST['customer_query']))
{
   $output='';
   $search = $_POST['customer_query'];
   if($search_customer = $con->query("SELECT * FROM `customer` WHERE customer_name LIKE '%$search%'"))
   {
      $search_customer_count  = $search_customer->num_rows;
      if($search_customer_count>0)
      {
         while($fetch_search_customer = $search_customer->fetch_array(MYSQLI_BOTH))
         {
            $output.='
            <tr onclick="infoCustomer('.$fetch_search_customer['customer_id'].')">
            <td>'.$fetch_search_customer['customer_name'].'</td>
            <td>'.round((float)$fetch_search_customer['customer_total_bill_amount']-(float)$fetch_search_customer['customer_total_paid_amount'],2).'</td>
            <td>
               <div class="dropdown dropdown-inline mr-2">

               <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                     <i class="flaticon-more">
                     </i>
               </a>
               
            
               <!--begin::Dropdown Menu-->
               <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                     <!--begin::Navigation-->
                     <ul class="navi flex-column navi-hover py-2">
                        
                        <li class="navi-item" onclick="editCustomer('.$fetch_search_customer['customer_id'].')">
                           <div class="navi-link" >
                                 <span class="navi-icon"><i class="flaticon-edit"></i></span>
                                 <span class="navi-text">Edit</span>
                           </div>
                        </li>
                        <li class="navi-item" onclick="deleteCustomer('.$fetch_search_customer['customer_id'].')">
                           <div class="navi-link">
                                 <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                 <span class="navi-text">Delete</span>
                           </div>
                        </li>
                     </ul>
                     <!--end::Navigation-->
               </div>
               <!--end::Dropdown Menu-->
            </div>
               </td>
            </tr>
            ';
         }
      }
      else {
         $output.='
            <tr><td colspan="3">No Customer To Show</td></tr>
         ';
      }
      echo $output;
   }
}

if(isset($_POST['right_customer_query']))
{
   $output='';
   $search = $_POST['right_customer_query'];

   if($search_customer = $con->query("SELECT * FROM `billing` WHERE customer_id = '$_POST[right_customer_id]' AND (billing_bill_number LIKE '%$search%' OR billing_bill_type LIKE '%$search%' OR billing_bill_amount LIKE '%$search%' OR (billing_bill_amount-billing_paid_amount) LIKE '%$search%')"))
   {
      $search_customer_count  = $search_customer->num_rows;
      if($search_customer_count>0)
      {
         while($fetch_search_customer = $search_customer->fetch_array(MYSQLI_BOTH))
         {
            $output.='
            <tr>
            <td>'.$fetch_search_customer['billing_bill_number'].'</td>
            <td>'.$fetch_search_customer['billing_bill_type'].'</td>
            <td>'.$fetch_search_customer['billing_date'].'</td>
            <td>'.$fetch_search_customer['billing_bill_amount'].'</td>
            <td>'.round((float)$fetch_search_customer['billing_bill_amount'] - (float)$fetch_search_customer['billing_paid_amount'], 2).'</td>
            <td>
               <div class="dropdown dropdown-inline mr-2">

                  <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                        <i class="flaticon-more">
                        </i>
                  </a>
                  <!--begin::Dropdown Menu-->
                  <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                           <li class="navi-item" onclick="viewIndividualInvoice('."'".$fetch_search_customer['billing_bill_number']."'".')">
                              <div class="navi-link" >
                                 <span class="navi-icon"><i class="flaticon-edit"></i></span>
                                 <span class="navi-text">View</span>
                              </div>
                           </li>
                           <li class="navi-item" onclick="deleteIndividualInvoice('."'".$fetch_search_customer['billing_bill_id']."'".')">
                              <div class="navi-link">
                                    <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                    <span class="navi-text">Delete</span>
                              </div>
                           </li>
                        </ul>
                        <!--end::Navigation-->
                  </div>
                  <!--end::Dropdown Menu-->
               </div>
            </td>
            </tr>
         ';
         }
      }
      else {
         $output.='
            <tr><td colspan="3">No Invoice To Show</td></tr>
         ';
      }
      echo $output;
   }
}

if(isset($_POST['party_query']))
{
   $output='';
   $search = $_POST['party_query'];
   if($search_party = $con->query("SELECT * FROM `party` WHERE party_name LIKE '%$search%'"))
   {
      $search_party_count  = $search_party->num_rows;
      if($search_party_count>0)
      {
         while($fetch_search_party = $search_party->fetch_array(MYSQLI_BOTH))
         {
            $output.='
            <tr onclick="infoParty('.$fetch_search_party['party_id'].')">
            <td>'.$fetch_search_party['party_name'].'</td>
            <td>'.round((float)$fetch_search_party['party_total_bill_amount']-(float)$fetch_search_party['party_total_paid_amount'],2).'</td>
            <td>
               <div class="dropdown dropdown-inline mr-2">

               <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                     <i class="flaticon-more">
                     </i>
               </a>
               
            
               <!--begin::Dropdown Menu-->
               <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                     <!--begin::Navigation-->
                     <ul class="navi flex-column navi-hover py-2">
                        
                        <li class="navi-item" onclick="editParty('.$fetch_search_party['party_id'].')">
                           <div class="navi-link" >
                                 <span class="navi-icon"><i class="flaticon-edit"></i></span>
                                 <span class="navi-text">Edit</span>
                           </div>
                        </li>
                        <li class="navi-item" onclick="deleteParty('.$fetch_search_party['party_id'].')">
                           <div class="navi-link">
                                 <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                 <span class="navi-text">Delete</span>
                           </div>
                        </li>
                     </ul>
                     <!--end::Navigation-->
               </div>
               <!--end::Dropdown Menu-->
            </div>
               </td>
            </tr>
            ';
         }
      }
      else {
         $output.='
            <tr><td colspan="3">No Party To Show</td></tr>
         ';
      }
      echo $output;
   }
}

if(isset($_POST['right_party_query']))
{
   $output='';
   $search = $_POST['right_party_query'];
   if($search_party = $con->query("SELECT * FROM `orders` WHERE orders_party_id = '$_POST[right_party_id]' AND (orders_order_number LIKE '%$search%' OR orders_order_date LIKE '%$search%')"))
   {
      $search_party_count = $search_party->num_rows;
      if($search_party_count>0)
      {
         while($fetch_search_party = $search_party->fetch_array(MYSQLI_BOTH))
         {
            $output.='
                  <tr>
                  <td>'.$fetch_search_party['orders_order_number'].'</td>
                  <td>'.$fetch_search_party['orders_order_date'].'</td>
                  <td>
                     <div class="dropdown dropdown-inline mr-2">
      
                        <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                              <i class="flaticon-more">
                              </i>
                        </a>
                        <!--begin::Dropdown Menu-->
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                              <!--begin::Navigation-->
                              <ul class="navi flex-column navi-hover py-2">
                                 <li class="navi-item" onclick="viewIndividualOrder('."'".$fetch_search_party['orders_order_number']."'".')">
                                    <div class="navi-link" >
                                       <span class="navi-icon"><i class="flaticon-edit"></i></span>
                                       <span class="navi-text">View</span>
                                    </div>
                                 </li>
                                 <li class="navi-item" onclick="deleteIndividualOrder('."'".$fetch_search_party['orders_order_number']."'".')">
                                    <div class="navi-link">
                                          <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                          <span class="navi-text">Delete</span>
                                    </div>
                                 </li>
                              </ul>
                              <!--end::Navigation-->
                        </div>
                        <!--end::Dropdown Menu-->
                     </div>
                  </td>
                  </tr>
               ';
         }
      }
      else {
         $output.='
            <tr><td colspan="3">No Party To Show</td></tr>
         ';
      }
      echo $output;
   }
}

if(isset($_POST['unit_query']))
{
   $output='';
   $search = $_POST['unit_query'];
   if($search_unit = $con->query("SELECT * FROM `unit` WHERE unit_full_name LIKE '%$search%' OR unit_short_name LIKE '%$search%'"))
   {
      $search_unit_count  = $search_unit->num_rows;
      if($search_unit_count>0)
      {
         while($fetch_search_unit = $search_unit->fetch_array(MYSQLI_BOTH))
         {
            $output.='
            <tr onclick="infoUnit('.$fetch_search_unit['unit_id'].')">
            <td>'.$fetch_search_unit['unit_full_name'].'</td>
            <td>'.$fetch_search_unit['unit_short_name'].'</td>
            <td>
                                                <div class="dropdown dropdown-inline mr-2">

                                                <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                                                    <i class="flaticon-more">
                                                    </i>
                                                </a>
                                                
                                            
                                                <!--begin::Dropdown Menu-->
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <!--begin::Navigation-->
                                                    <ul class="navi flex-column navi-hover py-2">
                                                       
                                                        <li class="navi-item" onclick="editThisUnit('.$fetch_search_unit['unit_id'].')">
                                                            <div class="navi-link" >
                                                                <span class="navi-icon"><i class="flaticon-edit"></i></span>
                                                                <span class="navi-text">Edit</span>
                                                            </div>
                                                        </li>
                                                        <li class="navi-item" onclick="deleteThisUnit('.$fetch_search_unit['unit_id'].')">
                                                            <div class="navi-link">
                                                                <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                                                <span class="navi-text">Delete</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <!--end::Navigation-->
                                                </div>
                                                <!--end::Dropdown Menu-->
                                            </div>
                                                </td>
                                            </tr>
            ';
         }
      }
      else {
         $output.='
            <tr><td colspan="3">No Customer To Show</td></tr>
         ';
      }
      echo $output;
   }
}

if(isset($_POST['right_unit_query']))
{
   $output='';
   $search = $_POST['right_unit_query'];
   if($search_unit = $con->query("SELECT u1.unit_full_name AS base_unit_name, u2.unit_full_name AS secondary_unit_name, c.conversion_rate AS conversion_rate FROM `conversion` c, `unit` u1, `unit` u2 WHERE c.base_unit_id = u1.unit_id AND c.secondary_unit_id = u2.unit_id AND c.base_unit_id = '$_POST[right_unit_id]' AND (u1.unit_full_name LIKE '%$search%' OR u1.unit_short_name LIKE '%$search%' OR u2.unit_full_name LIKE '%$search%' OR u2.unit_short_name LIKE '%$search%' OR c.conversion_rate LIKE '%$search%')"))
   {
      $search_unit_count  = $search_unit->num_rows;
      if($search_unit_count>0)
      {
         $count = 0;
         while($fetch_search_unit = $search_unit->fetch_array(MYSQLI_BOTH))
         {
            $base_unit_name=$fetch_search_unit['base_unit_name'];
            $secondary_unit_name=$fetch_search_unit['secondary_unit_name'];
            $conversion_rate=$fetch_search_unit['conversion_rate'];
            $output.='
               <tr >
               <td>'.$count.'</td>
               <td> 1 '.$base_unit_name.' = '.$conversion_rate.' '.$secondary_unit_name.'</td>
               </tr>
            ';
            $count++;
         }
      }
      else {
         $output.='
            <tr><td colspan="3">No Conversion To Show</td></tr>
         ';
      }
      echo $output;
   }
}

if(isset($_POST['category_query']))
{
   $output='';
   $search = $_POST['category_query'];
   if($search_category = $con->query("SELECT * FROM `category` WHERE category_name LIKE '%$search%'"))
   {
      $search_category_count  = $search_category->num_rows;
      if($search_category_count>0)
      {
         while($fetch_search_category = $search_category->fetch_array(MYSQLI_BOTH))
         {
            $output.='
            <tr onclick="infoCategory('.$fetch_search_category['category_id'].')">
            <td>'.$fetch_search_category['category_name'].'</td>
            <td>
                                                <div class="dropdown dropdown-inline mr-2">

                                                <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                                                    <i class="flaticon-more">
                                                    </i>
                                                </a>
                                                
                                            
                                                <!--begin::Dropdown Menu-->
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <!--begin::Navigation-->
                                                    <ul class="navi flex-column navi-hover py-2">
                                                       
                                                        <li class="navi-item" onclick="editCategory('.$fetch_search_category['category_id'].')">
                                                            <div class="navi-link" >
                                                                <span class="navi-icon"><i class="flaticon-edit"></i></span>
                                                                <span class="navi-text">Edit</span>
                                                            </div>
                                                        </li>
                                                        <li class="navi-item" onclick="deleteCategory('.$fetch_search_category['category_id'].')">
                                                            <div class="navi-link">
                                                                <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                                                <span class="navi-text">Delete</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <!--end::Navigation-->
                                                </div>
                                                <!--end::Dropdown Menu-->
                                            </div>
                                                </td>
                                            </tr>
            ';
         }
      }
      else {
         $output.='
            <tr><td colspan="3">No Category To Show</td></tr>
         ';
      }
      echo $output;
   }
}

if(isset($_POST['right_category_query']))
{
   $output='';
   $search = $_POST['right_category_query'];
   if($search_category = $con->query("SELECT * FROM `stock` WHERE category_id = '$_POST[right_category_id]' AND stock_pname LIKE '%$search%'"))
   {
      $search_category_count  = $search_category->num_rows;
      if($search_category_count>0)
      {
         $count=0;
         while($fetch_search_category = $search_category->fetch_array(MYSQLI_BOTH))
         {
            $search_conversion = $con->query("SELECT c.conversion_rate AS conversion_rate, u1.unit_short_name AS base_unit_name, u2.unit_short_name AS secondary_unit_name FROM `conversion` c, `unit` u1, `unit` u2 WHERE c.base_unit_id = u1.unit_id AND c.secondary_unit_id = u2.unit_id AND c.conversion_id = '$fetch_search_category[conversion_id]'");
            $fetch_conversion = $search_conversion->fetch_array(MYSQLI_BOTH);

            $conversion_rate = $fetch_conversion['conversion_rate'];
            $base_unit_name = $fetch_conversion['base_unit_name'];
            $secondary_unit_name = $fetch_conversion['secondary_unit_name'];
            $quantity_in_base_unit = (int)($fetch_search_category['stock_total_quantity'] / $conversion_rate);
            $quantity_in_secondary_unit = $fetch_search_category['stock_total_quantity'] % $conversion_rate;
            

            $output.='
               <tr >
               <td>'.$count.'</td>
               <td>'.$fetch_search_category['stock_pname'].'</td>
               <td>'.$quantity_in_base_unit.' '.$base_unit_name.','.$quantity_in_secondary_unit.' '.$secondary_unit_name.'</td>
               <td>
                  <div class="dropdown dropdown-inline mr-2">

                     <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                           <i class="flaticon-more">
                           </i>
                     </a>
                     
                  
                     <!--begin::Dropdown Menu-->
                     <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                           <!--begin::Navigation-->
                           <ul class="navi flex-column navi-hover py-2">
                              
                              <li class="navi-item" onclick="editItem('.$fetch_search_category['stock_pid'].')">
                                 <div class="navi-link" >
                                       <span class="navi-icon"><i class="flaticon-edit"></i></span>
                                       <span class="navi-text">Edit</span>
                                 </div>
                              </li>
                              <li class="navi-item" onclick="deleteItem('.$fetch_search_category['stock_pid'].')">
                                 <div class="navi-link">
                                       <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                       <span class="navi-text">Delete</span>
                                 </div>
                              </li>
                           </ul>
                           <!--end::Navigation-->
                     </div>
                     <!--end::Dropdown Menu-->
                  </div>
               </td>
               </tr>
            ';

            $count++;
         }
      }
      else {
         $output.='
            <tr><td colspan="3">No Item To Show</td></tr>
         ';
      }
      echo $output;
   }
}

if(isset($_POST['item_query']))
{
   $output='';
   $search = $_POST['item_query'];
   if($search_item = $con->query("SELECT * FROM `stock` WHERE stock_pname LIKE '%$search%'"))
   {
      $search_item_count  = $search_item->num_rows;
      if($search_item_count>0)
      {
         while($fetch_search_item = $search_item->fetch_array(MYSQLI_BOTH))
         {
            $output.='
            <tr onclick="infoItem('.$fetch_search_item['stock_pid'].')">
            <td>'.$fetch_search_item['stock_pname'].'</td>
            <td>'.$fetch_search_item['stock_total_quantity'].'</td>
            <td>
               <div class="dropdown dropdown-inline mr-2">

               <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                     <i class="flaticon-more">
                     </i>
               </a>
               
            
               <!--begin::Dropdown Menu-->
               <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                     <!--begin::Navigation-->
                     <ul class="navi flex-column navi-hover py-2">
                        
                        <li class="navi-item" onclick="editItem('.$fetch_search_item['stock_pid'].')">
                           <div class="navi-link" >
                                 <span class="navi-icon"><i class="flaticon-edit"></i></span>
                                 <span class="navi-text">Edit</span>
                           </div>
                        </li>
                        <li class="navi-item" onclick="deleteItem('.$fetch_search_item['stock_pid'].')">
                           <div class="navi-link">
                                 <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                 <span class="navi-text">Delete</span>
                           </div>
                        </li>
                     </ul>
                     <!--end::Navigation-->
               </div>
               <!--end::Dropdown Menu-->
            </div>
               </td>
            </tr>
            ';
         }
      }
      else {
         $output.='
            <tr><td colspan="3">No Item To Show</td></tr>
         ';
      }
      echo $output;
   }
}

if(isset($_POST['right_item_query']))
{
   $output='';
   $search = $_POST['right_item_query'];
   if($search_item = $con->query("SELECT * FROM `adjustment` WHERE stock_pid = '$_POST[right_item_search_id]' AND (adjustment_type LIKE '%$search%' OR adjustment_quantity LIKE '%$search%' OR adjustment_purchase_rate LIKE '%$search%' OR adjustment_description LIKE '%$search%')"))
   {
      $search_item_count  = $search_item->num_rows;
      if($search_item_count>0)
      {
         while($fetch_search_item = $search_item->fetch_array(MYSQLI_BOTH))
         {
            $output.='
                  <tr >
                  <td>'.$fetch_search_item['adjustment_type'].'</td>
                  <td>'.$fetch_search_item['adjustment_quantity'].'</td>
                  <td>'.$fetch_search_item['adjustment_purchase_rate'].'</td>
                  <td>'.$fetch_search_item['adjustment_description'].'</td>
                  <td>
                  <div class="dropdown dropdown-inline mr-2">
   
                     <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                           <i class="flaticon-more">
                           </i>
                     </a>
                  
                     <!--begin::Dropdown Menu-->
                     <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                           <!--begin::Navigation-->
                           <ul class="navi flex-column navi-hover py-2">
                              <li class="navi-item" onclick="deleteIndividualAdjustment('.$fetch_search_item['adjustment_id'].')">
                                 <div class="navi-link">
                                       <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                       <span class="navi-text">Delete</span>
                                 </div>
                              </li>
                           </ul>
                           <!--end::Navigation-->
                     </div>
                     <!--end::Dropdown Menu-->
                  </div>
                  </td>
                  
                  </tr>
               ';
         }
      }
      else {
         $output.='
            <tr><td colspan="3">No Adjustment To Show</td></tr>
         ';
      }
      echo $output;
   }
}

if(isset($_POST['invoice_query']))
{
   $output='';
   $search = $_POST['invoice_query'];
   if($search_invoice = $con->query("SELECT billing_date, count(*) AS total_bills FROM `billing` GROUP BY billing_date HAVING billing_date LIKE '%$search%'"))
   {
      $search_invoice_count  = $search_invoice->num_rows;
      if($search_invoice_count>0)
      {
         while($fetch_search_invoice = $search_invoice->fetch_array(MYSQLI_BOTH))
         {
            $output.='
            <tr onclick="infoInvoice('.$fetch_search_invoice['billing_date'].')">
            <td>'.$fetch_search_invoice['billing_date'].'</td>
            <td>'.$fetch_search_invoice['total_bills'].'</td>
            <td>
               <div class="dropdown dropdown-inline mr-2">

               <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                     <i class="flaticon-more">
                     </i>
               </a>
               
               <!--begin::Dropdown Menu-->
               <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                     <!--begin::Navigation-->
                     <ul class="navi flex-column navi-hover py-2">
                        <li class="navi-item" onclick="deleteInvoice('.$fetch_search_invoice['billing_date'].')">
                           <div class="navi-link">
                                 <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                 <span class="navi-text">Delete</span>
                           </div>
                        </li>
                     </ul>
                     <!--end::Navigation-->
               </div>
               <!--end::Dropdown Menu-->
            </div>
               </td>
            </tr>
            ';
         }
      }
      else {
         $output.='
            <tr><td colspan="3">No Invoice To Show</td></tr>
         ';
      }
      echo $output;
   }
}

if(isset($_POST['right_invoice_query']))
{
   $output='';
   $search = $_POST['right_invoice_query'];
   if($search_invoice = $con->query("SELECT b.billing_bill_number AS billing_bill_number,b.billing_payment_mode AS billing_payment_mode,b.billing_bill_amount AS billing_bill_amount,b.billing_paid_amount AS billing_paid_amount,b.billing_bill_id AS billing_bill_id, c.customer_id AS customer_id FROM `billing` b INNER JOIN `customer` c ON b.customer_id = c.customer_id WHERE b.billing_date = '$_POST[right_invoice_date]' AND (b.billing_bill_number LIKE '%$search%' OR c.customer_name LIKE '%$search%' OR b.billing_payment_mode	LIKE '%$search%' OR b.billing_bill_amount LIKE '%$search%' OR (b.billing_bill_amount - b.billing_paid_amount) LIKE '%$search%')"))
   {
      $search_invoice_count  = $search_invoice->num_rows;
      if($search_invoice_count>0)
      {
         while($fetch_search_invoice = $search_invoice->fetch_array(MYSQLI_BOTH))
         {
            $search_customer_name = $con->query("SELECT * FROM `customer` WHERE customer_id = '$fetch_search_invoice[customer_id]'");
            $fetch_customer_name = $search_customer_name->fetch_array(MYSQLI_BOTH)['customer_name'];

            $output.='
                        <tr>
                        <td>'.$fetch_search_invoice['billing_bill_number'].'</td>
                        <td>'.$fetch_customer_name.'</td>
                        <td>'.$fetch_search_invoice['billing_payment_mode'].'</td>
                        <td>'.$fetch_search_invoice['billing_bill_amount'].'</td>
                        <td>'.($fetch_search_invoice['billing_bill_amount'] - $fetch_search_invoice['billing_paid_amount']).'</td>
                        <td>
                        <div class="dropdown dropdown-inline mr-2">
         
                           <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                                 <i class="flaticon-more">
                                 </i>
                           </a>
                        
                           <!--begin::Dropdown Menu-->
                           <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                 <!--begin::Navigation-->
                                 <ul class="navi flex-column navi-hover py-2">
                                    <li class="navi-item" onclick="viewIndividualInvoice('."'".$fetch_search_invoice['billing_bill_id']."'".')">
                                       <div class="navi-link" >
                                          <span class="navi-icon"><i class="flaticon-edit"></i></span>
                                          <span class="navi-text">View</span>
                                       </div>
                                    </li>
                                    <li class="navi-item" onclick="deleteIndividualInvoice('."'".$fetch_search_invoice['billing_bill_id']."'".')">
                                       <div class="navi-link">
                                             <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                             <span class="navi-text">Delete</span>
                                       </div>
                                    </li>
                                 </ul>
                                 <!--end::Navigation-->
                           </div>
                           <!--end::Dropdown Menu-->
                        </div>
                        </td>
                        </tr>
                     ';
         }
      }
      else {
         $output.='
            <tr><td colspan="3">No Invoice To Show</td></tr>
         ';
      }
      echo $output;
   }
}

if((isset($_POST['bill_items'])))
{
   $output='';
   if($bill_search_item= $con->query("SELECT * FROM `stock`"))
   {
      while($bill_fetch_item = $bill_search_item->fetch_array(MYSQLI_BOTH))
      {
         $output.='<option value='.$bill_fetch_item['stock_pid'].'>'.$bill_fetch_item['stock_pname'].'</option>';
      }
   }
   echo $output;
}

if((isset($_POST['order_items'])))
{
   $output='';
   if($order_search_item= $con->query("SELECT * FROM `stock`"))
   {
      while($order_fetch_item = $order_search_item->fetch_array(MYSQLI_BOTH))
      {
         $output.='<option value='.$order_fetch_item['stock_pid'].'>'.$order_fetch_item['stock_pname'].'</option>';
      }
   }
   echo $output;
}

if((isset($_POST['item_fields_for_bill'])) && (isset($_POST['item_id'])))
{
   if($bill_search_item_fields = $con->query("SELECT * FROM `stock` WHERE stock_pid = '$_POST[item_id]'"))
   {
      $bill_fetch_item_fields = $bill_search_item_fields->fetch_array(MYSQLI_BOTH);

      $sell_price = '';
      if($bill_fetch_item_fields['stock_stax_status']=="With Tax")
      {
         $sell_price_with_tax = $bill_fetch_item_fields['stock_sell_price'];
         $sell_price_tax_rate = end(explode(" ",$bill_fetch_item_fields['stock_tax_rate']));
         $sell_price = ($sell_price_with_tax*100)/($sell_price_tax_rate+100);
      }
      else
      {
         $sell_price = $bill_fetch_item_fields['stock_sell_price'];
      }
      
      $output_fields = array(
         'item_id'       => $bill_fetch_item_fields['stock_pid'],
         'item_hsn_sac'  => $bill_fetch_item_fields['stock_hsn_sac'],
         'item_code'     => $bill_fetch_item_fields['stock_item_code'],
         'item_price'    => $sell_price,
         'item_tax_rate' => $bill_fetch_item_fields['stock_tax_rate']
      );

      echo json_encode($output_fields);
   }
}

if((isset($_POST['item_fields_for_order'])) && (isset($_POST['order_item_id'])))
{
   if($order_search_item_fields = $con->query("SELECT * FROM `stock` WHERE stock_pid = '$_POST[order_item_id]'"))
   {
      $order_fetch_item_fields = $order_search_item_fields->fetch_array(MYSQLI_BOTH);
      
      $output_fields = array(
         'item_id'       => $order_fetch_item_fields['stock_pid'],
         'item_hsn_sac'  => $order_fetch_item_fields['stock_hsn_sac']
      );

      echo json_encode($output_fields);
   }
}

if((isset($_POST['unit_selection_for_bill'])) && (isset($_POST['unit_selection_item_id'])))
{
    
    $result = ($bill_search_item_base_unit = $con->query
      ("select u.unit_full_name as unit_name, c.conversion_rate as conversion_rate
        from   stock s
        inner  join conversion c
        on     s.conversion_id = c.conversion_id
        inner  join unit u
        on     c.base_unit_id = u.unit_id
        where  s.stock_pid = '$_POST[unit_selection_item_id]'")) && 
      ($bill_search_item_secondary_unit = $con->query
      ("select u.unit_full_name as unit_name, c.conversion_rate as conversion_rate
        from   stock s
        inner  join conversion c
        on     s.conversion_id = c.conversion_id
        inner  join unit u
        on     c.secondary_unit_id = u.unit_id
        where  s.stock_pid = '$_POST[unit_selection_item_id]'"));
        
    //echo 'abc'.$result.'def';
    
   if($result)
   {
      $output_units = '';

      $bill_fetch_item_units = $bill_search_item_base_unit->fetch_array(MYSQLI_BOTH);
      $output_units .= '<option value="base" selected>'.$bill_fetch_item_units['unit_name'].'</option>';

      $bill_fetch_item_units = $bill_search_item_secondary_unit->fetch_array(MYSQLI_BOTH);
      $output_units .= '<option value="secondary">'.$bill_fetch_item_units['unit_name'].'</option>';

      $output_units .= '*'.$bill_fetch_item_units['conversion_rate'];

      echo $output_units;
   }
}

if((isset($_POST['unit_selection_for_order'])) && (isset($_POST['order_unit_selection_item_id'])))
{
   if(($order_search_item_base_unit = $con->query
      ("select u.unit_full_name as unit_name, c.conversion_rate as conversion_rate
        from   stock s
        inner  join conversion c
        on     s.conversion_id = c.conversion_id
        inner  join unit u
        on     c.secondary_unit_id = u.unit_id
        where  s.stock_pid = '$_POST[order_unit_selection_item_id]'")))
   {
      $output_unit = '';

      $order_fetch_item_units = $order_search_item_base_unit->fetch_array(MYSQLI_BOTH);
      $output_unit .= $order_fetch_item_units['unit_name'];

      echo $output_unit;
   }
}

if((isset($_POST['bill_each_item_id'])) && (isset($_POST['bill_each_item_quantity'])) && (isset($_POST['bill_each_item_unit_type'])) && (isset($_POST['bill_each_conversion_rate'])) && (isset($_POST['bill_date'])))
{
   $item_id = $_POST['bill_each_item_id'];
   $quantity = $_POST['bill_each_item_quantity'];
   if ($_POST['bill_each_item_unit_type'] == 'base')
      $quantity *= $_POST['bill_each_conversion_rate'];
   
   if($_POST['bill_type']=='sell')
      $con->query("UPDATE `stock` SET stock_total_quantity = stock_total_quantity - '$quantity', stock_total_dispatch = stock_total_dispatch + '$quantity'  WHERE stock_pid = '$item_id'");
   else
      $con->query("UPDATE `stock` SET stock_total_quantity = stock_total_quantity + '$quantity', stock_total_dispatch = stock_total_dispatch - '$quantity'  WHERE stock_pid = '$item_id'");

   $date = $_POST['bill_date'];
   $result=explode('/',$date);
   $year  = $result[2];
   $month = $result[0];
   $day   = $result[1];
   $new = $year.'-'.$month.'-'.$day;

   $item_adjustment_on_bill='';

   if($_POST['bill_type']=='sell')
   {
      $item_adjustment_on_bill = array(
         'stock_pid'                => $_POST['bill_each_item_id'],
         'adjustment_type'          => 'REDUCE',
         'adjustment_quantity'      => $_POST['bill_each_item_quantity'],
         'adjustment_purchase_rate' => '',
         'adjustment_description'   => 'SOLD',
         'adjustment_creation_date' => $new
      );
   }
   else
   {
      $item_adjustment_on_bill = array(
         'stock_pid'                => $_POST['bill_each_item_id'],
         'adjustment_type'          => 'ADD',
         'adjustment_quantity'      => $_POST['bill_each_item_quantity'],
         'adjustment_purchase_rate' => '',
         'adjustment_description'   => 'RETURNED',
         'adjustment_creation_date' => $new
      );
   }

   $item_adjustment_on_bill_query = setData("adjustment", $item_adjustment_on_bill);
   $con->query($item_adjustment_on_bill_query);
}

if((isset($_POST['bill_customer_phone_number'])))
{
   $search_customer_phone_number = $con->query("SELECT * FROM `customer` WHERE customer_mobile_number = '$_POST[bill_customer_phone_number]'");
   $search_customer_count  = $search_customer_phone_number->num_rows;

   if ($search_customer_count > 0)
   {
      $status = 'success';
      $fetch_customer = $search_customer_phone_number->fetch_array(MYSQLI_BOTH);
      $result = array(
         'customer_name'         => $fetch_customer['customer_name'],
         'customer_phone_number' => $fetch_customer['customer_mobile_number'],
         'customer_id'           => $fetch_customer['customer_id'],
         'status'                => $status
      );
      echo json_encode($result);
   }
   else
   {
      $status = 'failed';
      $result = array(
         'status' => $status
      );
      echo json_encode($result);
   }
}

if((isset($_POST['order_party_phone_number'])))
{
   $search_party_phone_number = $con->query("SELECT * FROM `party` WHERE party_phone_no = '$_POST[order_party_phone_number]'");
   $search_party_count  = $search_party_phone_number->num_rows;

   if ($search_party_count > 0)
   {
      $status = 'success';
      $fetch_party = $search_party_phone_number->fetch_array(MYSQLI_BOTH);
      $result = array(
         'party_name'         => $fetch_party['party_name'],
         'party_phone_number' => $fetch_party['party_phone_no'],
         'party_id'           => $fetch_party['party_id'],
         'status'             => $status
      );
      echo json_encode($result);
   }
   else
   {
      $status = 'failed';
      $result = array(
         'status' => $status
      );
      echo json_encode($result);
   }
}

if((isset($_POST['adjust_item_modal_item_id'])))
{
   $search_item_name = $con->query("SELECT * FROM `stock` WHERE stock_pid = '$_POST[adjust_item_modal_item_id]'");
   $fetch_item_name = $search_item_name->fetch_array(MYSQLI_BOTH)['stock_pname'];
   echo $fetch_item_name;
}

if((isset($_POST['adjust_item_id'])))
{
   $date = $_POST['adjust_item_date'];
   $result=explode('/',$date);
   $year  = $result[2];
   $month = $result[0];
   $day   = $result[1];
   $new = $year.'-'.$month.'-'.$day;

   $search_conversion_rate = $con->query(
      "select c.conversion_rate as conversion_rate
       from   stock s
       inner  join conversion c
       on     s.conversion_id = c.conversion_id
       where  s.stock_pid = '$_POST[adjust_item_id]'");
   $fetch_conversion_rate = $search_conversion_rate->fetch_array(MYSQLI_BOTH)['conversion_rate'];
   $total_quantity = $_POST['adjust_item_quantity'] * $fetch_conversion_rate;

   $adjustment = array(
      'stock_pid'                => $_POST['adjust_item_id'],
      'adjustment_type'          => $_POST['adjust_item_type'],
      'adjustment_quantity'      => $total_quantity,
      'adjustment_purchase_rate' => $_POST['adjust_item_purchase_price'],
      'adjustment_description'   => $_POST['adjust_item_details'],
      'adjustment_creation_date' => $new
   );
   $add_adjustment_query = setData("adjustment", $adjustment);
   $con->query($add_adjustment_query);

   $stock_modification_query='';
   if ($_POST['adjust_item_type'] == 'ADD')
   {
      $stock_modification_query = "UPDATE `stock` SET stock_total_quantity = stock_total_quantity + '$total_quantity', stock_purchase_price = '$_POST[adjust_item_purchase_price]' WHERE stock_pid = '$_POST[adjust_item_id]'";
   }
   else
   {
      $stock_modification_query = "UPDATE `stock` SET stock_total_quantity = stock_total_quantity - '$total_quantity' WHERE stock_pid = '$_POST[adjust_item_id]'";
   }
   $con->query($stock_modification_query);

   $status="success";
   $array = array('status' => $status);
   echo json_encode($array);
}

if((isset($_POST['radios_base_unit_id'])) && (isset($_POST['radios_secondary_unit_id'])))
{
   $search_conversions = $con->query("SELECT * FROM `conversion` WHERE base_unit_id = '$_POST[radios_base_unit_id]' AND secondary_unit_id = '$_POST[radios_secondary_unit_id]'");

   $output='';
   $count=0;
   while($fetch_conversions = $search_conversions->fetch_array(MYSQLI_BOTH))
   {
      $count++;
      $output.=
               '<div class="col-lg-4 col-xxl-4">
                  <div class="form-group row">
                     <div class="col-lg-12 col-md-12 col-sm-12" style="height: calc(1.5em + 1.3rem + 2px); padding: 0.65rem 1rem;">
                        <label class="radio">
                        <input type="radio" name="radios1" id="c'.$count.'" value="'.$fetch_conversions['conversion_id'].'"/>
                              <span></span>
                                 <div style="margin-left:5px;" name="unit-b" class="h6"></div>
                        </label>
                     </div>
                  </div>
               </div>

               <div class="col-lg-1 col-xxl-1">
                     <div class="form-group row">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="height: calc(1.5em + 1.3rem + 2px); padding: 0.65rem 1rem;">
                           <label class="h2">=</label>
                        </div>
                     </div>
               </div>

               <div class="col-lg-1 col-xxl-1">
                     <div class="form-group row">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="height: calc(1.5em + 1.3rem + 2px); padding: 0.65rem 1rem;">
                           <label class="h6">'.$fetch_conversions['conversion_rate'].'</label>
                        </div>
                     </div>
               </div>

               <div class="col-lg-4 col-xxl-4">
                     <div class="form-group">
                        <div class="form-group row">
                           <div class="col-lg-12 col-md-12 col-sm-12" style="height: calc(1.5em + 1.3rem + 2px); padding: 0.65rem 1rem;">
                                 <div name="unit-s" class="h6"></div>
                           </div>
                        </div>
                     </div>
               </div>';
   }

   echo $output.'@'.$count;
}

if((isset($_POST['invoice_number'])))
{
   $date = $_POST['invoice_date'];
   $result=explode('/',$date);
   $year  = $result[2];
   $month = $result[0];
   $day   = $result[1];
   $new = $year.'-'.$month.'-'.$day;

   $bill_type=$_POST['bill_type'];
   $bill_type_name='';
   if     ($bill_type=='sell')    $bill_type_name='SALE';
   else if($bill_type=='payment') $bill_type_name='PAYMENT';
   else if($bill_type=='return')  $bill_type_name='RETURN';
   

   $bill = array(
      'billing_bill_number'  => $_POST['invoice_number'],
      'customer_id'          => $_POST['invoice_customer_id'],
      'billing_bill_type'    => $bill_type_name,
      'billing_date'         => $new,
      'billing_bill_amount'  => $_POST['invoice_total_amount'],
      'billing_paid_amount'  => $_POST['invoice_paid_amount'],
      'billing_payment_mode' => $_POST['invoice_payment_mode'],
      'billing_bill_string'  => $_POST['invoice_id_string']);

   $add_invoice_query = setData("billing", $bill);
   $con->query($add_invoice_query);

   $customer_adjustment_query='';
   if($bill_type=='sell')
      $customer_adjustment_query = "UPDATE `customer` SET customer_total_bill_amount = customer_total_bill_amount + '$_POST[invoice_total_amount]', customer_total_paid_amount = customer_total_paid_amount + '$_POST[invoice_paid_amount]' WHERE customer_id = '$_POST[invoice_customer_id]'";
   else if($bill_type=='payment')
      $customer_adjustment_query = "UPDATE `customer` SET customer_total_paid_amount = customer_total_paid_amount + '$_POST[invoice_paid_amount]' WHERE customer_id = '$_POST[invoice_customer_id]'";
   else if($bill_type=='return')
      $customer_adjustment_query = "UPDATE `customer` SET customer_total_bill_amount = customer_total_bill_amount - '$_POST[invoice_total_amount]', customer_total_paid_amount = customer_total_paid_amount - '$_POST[invoice_paid_amount]' WHERE customer_id = '$_POST[invoice_customer_id]'";

   $con->query($customer_adjustment_query);

   if($bill_type=='sell')
      $total_sales_adjustment_query = "UPDATE `total_sales` SET total_bill_amount = total_bill_amount + '$_POST[invoice_total_amount]', total_received_amount = total_received_amount + '$_POST[invoice_paid_amount]', last_bill_number = '$_POST[invoice_number]'";
   else if($bill_type=='payment')
      $total_sales_adjustment_query = "UPDATE `total_sales` SET total_received_amount = total_received_amount + '$_POST[invoice_paid_amount]', last_payment_or_return_number = '$_POST[invoice_number]'";
   else if($bill_type=='return')
      $total_sales_adjustment_query = "UPDATE `total_sales` SET total_bill_amount = total_bill_amount - '$_POST[invoice_total_amount]', total_received_amount = total_received_amount - '$_POST[invoice_paid_amount]', last_payment_or_return_number = '$_POST[invoice_number]'";

   $con->query($total_sales_adjustment_query);
}

if((isset($_POST['order_number'])))
{
   $date = $_POST['order_date'];
   $result=explode('/',$date);
   $year  = $result[2];
   $month = $result[0];
   $day   = $result[1];
   $new = $year.'-'.$month.'-'.$day;

   $order = array(
      'orders_order_number' => $_POST['order_number'],
      'orders_party_id'     => $_POST['order_party_id'],
      'orders_order_date'   => $new,
      'orders_order_string' => $_POST['order_id_string']);

   $add_order_query = setData("orders", $order);
   $con->query($add_order_query);  

   $total_sales_adjustment_query = "UPDATE `total_sales` SET last_order_number = '$_POST[order_number]'";
   $con->query($total_sales_adjustment_query);
}

if((isset($_POST['get_invoice_number'])) && (isset($_POST['get_invoice_type'])))
{
   $max_billing_vumber = "";

   if($_POST['get_invoice_type']=='sell')
   {
      $search_max_billing_vumber=$con->query("SELECT max(last_bill_number) AS MAX_BILLING_NUMBER FROM `total_sales`");
      $fetch_max_billing_vumber=$search_max_billing_vumber->fetch_array(MYSQLI_BOTH)['MAX_BILLING_NUMBER'];
      $max_billing_vumber = (int)$fetch_max_billing_vumber + 1;
   }
   else
   {
      $search_max_billing_vumber=$con->query("SELECT max(last_payment_or_return_number) AS MAX_BILLING_NUMBER FROM `total_sales`");
      $fetch_max_billing_vumber=$search_max_billing_vumber->fetch_array(MYSQLI_BOTH)['MAX_BILLING_NUMBER'];
      $alpha_part=substr($fetch_max_billing_vumber,0,3);
      $number_part=(int)substr($fetch_max_billing_vumber,3);
      $max_billing_vumber = $alpha_part.sprintf("%04d", $number_part+1);
   }

   echo $max_billing_vumber;
}

if((isset($_POST['get_order_number'])))
{
   $max_order_vumber = "ORD0001";

   $check_empty_orders_table=$con->query("SELECT * FROM `orders`");
   if($check_empty_orders_table->num_rows > 0)
   {
      $search_max_order_vumber=$con->query("SELECT max(last_order_number) AS MAX_ORDER_NUMBER FROM `total_sales`");
      $fetch_max_order_vumber=$search_max_order_vumber->fetch_array(MYSQLI_BOTH)['MAX_ORDER_NUMBER'];
      $alpha_part=substr($fetch_max_order_vumber,0,3);
      $number_part=(int)substr($fetch_max_order_vumber,3);
      $max_order_vumber=$alpha_part.sprintf("%04d", $number_part+1);
   }

   echo $max_order_vumber;
}

if((isset($_POST['delete_individual_invoice_id'])))
{
   $search_bill = $con->query("SELECT * FROM `billing` WHERE billing_bill_id = '$_POST[delete_individual_invoice_id]'");
   $fetch_bill = $search_bill->fetch_array(MYSQLI_BOTH);

   $fetch_bill_date = $fetch_bill['billing_date'];
   $fetch_bill_customer = $fetch_bill['customer_id'];

   $con->query("DELETE FROM `billing` WHERE billing_bill_id = '$_POST[delete_individual_invoice_id]'");

   $temp_date_exploded = explode('-',$fetch_bill_date);
   $temp_date_imploded = implode(',',$temp_date_exploded);
   
   echo json_encode(array('billing_date' => $temp_date_imploded, 'billing_customer_id' => $fetch_bill_customer));
}

if((isset($_POST['delete_individual_order_number'])))
{
   $search_order_party = $con->query("SELECT `orders_party_id` FROM `orders` WHERE orders_order_number = '$_POST[delete_individual_order_number]'");
   $fetch_order_party = $search_order_party->fetch_array(MYSQLI_BOTH)['orders_party_id'];

   $con->query("DELETE FROM `orders` WHERE orders_order_number = '$_POST[delete_individual_order_number]'");

   echo $fetch_order_party;
}

if((isset($_POST['delete_individual_adjustment_id'])))
{
   $search_item_id = $con->query("SELECT `stock_pid` FROM `adjustment` WHERE adjustment_id = '$_POST[delete_individual_adjustment_id]'");
   $fetch_item_id = $search_item_id->fetch_array(MYSQLI_BOTH)['stock_pid'];

   $con->query("DELETE FROM `adjustment` WHERE adjustment_id = '$_POST[delete_individual_adjustment_id]'");

   echo $fetch_item_id;
}

if((isset($_POST['party_billing_amount'])) && (isset($_POST['party_paid_amount'])) && (isset($_POST['party_id'])))
{
   $con->query("UPDATE `party` SET party_total_bill_amount = party_total_bill_amount + '$_POST[party_billing_amount]', party_total_paid_amount = party_total_paid_amount + '$_POST[party_paid_amount]' WHERE party_id = '$_POST[party_id]'");
}

if((isset($_POST['print_detect_invoice_type_id'])))
{
   $invoice_type = $con->query("SELECT * FROM `billing` WHERE billing_bill_number = '$_POST[print_detect_invoice_type_id]'")->fetch_array(MYSQLI_BOTH)['billing_bill_type'];
   echo $invoice_type;
}

if((isset($_POST['expense_description'])) && (isset($_POST['expense_date'])) && (isset($_POST['expense_amont'])))
{
   $date = $_POST['expense_date'];
   $result=explode('/',$date);
   $year  = $result[2];
   $month = $result[0];
   $day   = $result[1];
   $new = $year.'-'.$month.'-'.$day;

   $expense = array(
      'expense_date'        => $new,
      'expense_description' => $_POST['expense_description'],
      'expense_amount'      => $_POST['expense_amont']);

   $add_expense_query = setData("expense", $expense);
   $con->query($add_expense_query);
}

if((isset($_POST['get_expense_details'])))
{
   $search_expense_details = $con->query("SELECT * FROM `expense`");
   $output='';
   $count=1;
   while($fetch_expense_details=$search_expense_details->fetch_array(MYSQLI_BOTH))
   {
      $output.='
         <tr>
         <td>'.$count.'</td>
         <td>'.$fetch_expense_details['expense_description'].'</td>
         <td>'.$fetch_expense_details['expense_date'].'</td>
         <td>'.$fetch_expense_details['expense_amount'].'</td>
         <td>
            <div class="dropdown dropdown-inline mr-2">

               <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" data-toggle="dropdown">
                     <i class="flaticon-more">
                     </i>
               </a>
            
               <!--begin::Dropdown Menu-->
               <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                     <!--begin::Navigation-->
                     <ul class="navi flex-column navi-hover py-2">
                        <li class="navi-item" onclick="deleteExpense('.$fetch_expense_details['expense_id'].')">
                           <div class="navi-link">
                                 <span class="navi-icon"><i class="flaticon-delete-1"></i></span>
                                 <span class="navi-text">Delete</span>
                           </div>
                        </li>
                     </ul>
                     <!--end::Navigation-->
               </div>
               <!--end::Dropdown Menu-->

            </div>
         </td>
         </tr>';
   $count++;
   }
echo $output;
}

/* BEGIN DELETE  expense */
if(isset($_POST['delete_expense_id']))
{
   $expense = array('expense_id' => $_POST['delete_expense_id']);

   $delete_expense_query=dalData("expense", $expense);
   $con->query($delete_expense_query);
}
/* END DELETE  expense */

if((isset($_POST['conversion_modal_unit_list'])))
{
   $output="<option value='' disabled selected>NONE</option>";
   if($search_unit= $con->query("SELECT * FROM `unit`"))
   {
      while($fetch_unit = $search_unit->fetch_array(MYSQLI_BOTH))
      {
      $output.="<option value='$fetch_unit[unit_id]'>".$fetch_unit['unit_full_name']." (".$fetch_unit['unit_short_name'].") </option>";
      }
   }
   echo $output;
}

if((isset($_POST['show_units_in_modal'])))
{
   $fetch_units=$con->query("SELECT u1.unit_full_name AS base_unit_name, u2.unit_full_name AS secondary_unit_name, c.conversion_rate AS conversion_rate FROM `conversion` c, `unit` u1, `unit` u2 WHERE c.conversion_id = '$_POST[show_units_conversion_id]' AND c.base_unit_id = u1.unit_id AND c.secondary_unit_id = u2.unit_id")->fetch_array(MYSQLI_BOTH);

   echo json_encode(array('base_unit' => $fetch_units['base_unit_name'], 'secondary_unit' => $fetch_units['secondary_unit_name'], 'conversion_rate' => $fetch_units['conversion_rate']));
}

?>