<?php
include("lib/config.php");
include("lib/function.php");
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
                <a href="javascript:;" class="btn btn-circle btn-icon btn-warning">
                    <i class="flaticon-exclamation icon-lg"></i>
                </a><br>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">Address: '.$fetch_customer['customer_address'].'</span><br>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">GST IN: '.$fetch_customer['customer_gst'].'</span>
            </h3>
        </div>
            ';
         }
         echo $result;
}
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
            <tr onclick="infoCustomer('.$fetch_all_customer['customer_id'].')">
            <td>'.$fetch_all_customer['customer_name'].'</td>
            <td>'.$fetch_all_customer['customer_openning_balance'].'</td>
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



if(isset($_POST['delete_customer_id']))
{

   $customer = array('customer_id' => $_POST['delete_customer_id']);

   $delete_customer_query=dalData("customer", $customer);
   $con->query($delete_customer_query);
   
}



/* Begin Add Customer */
if((isset($_POST['customer_name'])) && (isset($_POST['customer_email'])) && (isset($_POST['customer_mobile_number'])) && (isset($_POST['customer_gst'])) && (isset($_POST['customer_address'])) && (isset($_POST['customer_openning_balance'])) && (isset($_POST['customer_balance_status'])) && (isset($_POST['customer_creation_date'])) && (isset($_POST['customer_id']))) 
{
   $date = $_POST['customer_creation_date'];
   $result=explode('/',$date);
   $year  = $result[2];
   $month = $result[0];
   $day   = $result[1];
   $new = $year.'-'.$month.'-'.$day;

   $status="";
   if($search_customer= $con->query("SELECT * FROM `customer` WHERE `customer_mobile_number`='$_POST[customer_mobile_number]'"))
   {
      $search_number_of_rows=$search_customer->num_rows;
      if($search_number_of_rows>0)
         {
            $status="error";
            $array = array('status' => $status);
            echo json_encode($array);
         } 
         else 
         {
            if($_POST['customer_id']!=''){

               $customer = array(
                  'customer_mobile_number'    => $_POST['customer_mobile_number'],
                  'customer_name'             => $_POST['customer_name'],
                  'customer_email'            => $_POST['customer_email'],
                  'customer_address'          => $_POST['customer_address'],
                  'customer_gst'              => $_POST['customer_gst'],
                  'customer_openning_balance' => $_POST['customer_openning_balance'],
                  'customer_balance_status'   => $_POST['customer_balance_status'],
                  'customer_creation_date'    => $new
               );
         
               $update_customer_query = updateData(array("customer_id" => $_POST['customer_id']),$customer,"customer");
         
               $con->query($update_customer_query); 
               echo json_encode($customer);
            }
            else{
               $customer = array(
                  'customer_mobile_number'    => $_POST['customer_mobile_number'],
                  'customer_name'             => $_POST['customer_name'],
                  'customer_email'            => $_POST['customer_email'],
                  'customer_address'          => $_POST['customer_address'],
                  'customer_gst'              => $_POST['customer_gst'],
                  'customer_openning_balance' => $_POST['customer_openning_balance'],
                  'customer_balance_status'   => $_POST['customer_balance_status'],
                  'customer_creation_date'    => $new
               );
               $add_customer_query=setData ("customer", $customer);
               $con->query($add_customer_query);
               $status="success";
               $array = array('status' => $status);   
               echo json_encode($array);
            }
         }
   }
}
/* End Add Customer */

/* Begin edit customer */

if((isset($_POST['edit_customer_id'])))
{
   $status="";
   if($edit_customer= $con->query("SELECT * FROM `customer` WHERE `customer_id`='$_POST[edit_customer_id]'"))
   {
      $edit_customer_details = $edit_customer->fetch_array(MYSQLI_BOTH);
      $status="success";
      $edit_customer_details_array = array(
         'customer_id'               => $edit_customer_details['customer_id'],
         'customer_mobile_number'    => $edit_customer_details['customer_mobile_number'],
         'customer_name'             => $edit_customer_details['customer_name'],
         'customer_email'            => $edit_customer_details['customer_email'],
         'customer_address'          => $edit_customer_details['customer_address'],
         'customer_gst'              => $edit_customer_details['customer_gst'],
         'customer_openning_balance' => $edit_customer_details['customer_openning_balance'],
         'customer_balance_status'   => $edit_customer_details['customer_balance_status'],
         'customer_creation_date'    => $edit_customer_details['customer_creation_date'],
         'status'                    => $status
      );

      echo json_encode($edit_customer_details_array);

   }
}

/* End edit customer */

/* Begin Add Category */
if((isset($_POST['category_name'])))
{
   date_default_timezone_set("Asia/Kolkata");
   $category_creation_timestamp = date('Y-m-d H:i:s');
   if($search_category= $con->query("SELECT * FROM `category` WHERE `category_name`='$_POST[category_name]'"))
   {
      $search_number_of_rows=$search_category->num_rows;
      if($search_number_of_rows==1)
         echo "FAILED";
      else{
         $category = array(
            'category_name' => $_POST['category_name'],
            'category_creation_timestamp' => $category_creation_timestamp
         );
         $add_category_query=setData("category", $category);
         $con->query($add_category_query);
         echo "OK";
      }
   }
}
/* End Add Category */

/* Begin add unit*/

if((isset($_POST['unit_full_name'])) && (isset($_POST['unit_short_name'])))
{
   date_default_timezone_set("Asia/Kolkata");
   $unit_creation_timestamp = date('Y-m-d H:i:s');
   if(($search_unit_fullname=$con->query("SELECT * FROM `unit` WHERE `unit_full_name`='$_POST[unit_full_name]'")) && ($search_unit_shortname=$con->query("SELECT * FROM `unit` WHERE `unit_short_name`='$_POST[unit_short_name]'"))  )
   {
      $search_number_of_fullname_rows =$search_unit_fullname->num_rows;
      $search_number_of_shortname_rows=$search_unit_shortname->num_rows;
      if($search_number_of_fullname_rows==1 && $search_number_of_shortname_rows==1)
         echo "FAILED_BOTH";
      elseif($search_number_of_fullname_rows==1)
         echo "FAILED_FULLNAME";
      elseif($search_number_of_shortname_rows==1)
         echo "FAILED_SHORTNAME";
      else{
         $unit = array(
            'unit_full_name'          => $_POST['unit_full_name'],
            'unit_short_name'         => $_POST['unit_short_name'],
            'unit_creation_timestamp' => $unit_creation_timestamp
         );
         $add_unit_query=setData("unit", $unit);
         $con->query($add_unit_query);
         echo "OK";
      }
   }
}

/* End add unit*/


/* Begin Add Item */

if((isset($_POST['stock_pname'])) && (isset($_POST['stock_hsn_sac'])) && (isset($_POST['conversion_id'])) && (isset($_POST['stock_item_code'])) && (isset($_POST['stock_tax_rate'])) && (isset($_POST['stock_creation_date'])) && (isset($_POST['stock_sell_price'])) && (isset($_POST['stock_stax_status'])) && (isset($_POST['stock_purchase_price'])) && (isset($_POST['stock_ptax_status'])) && (isset($_POST['stock_min_stock'])) && (isset($_POST['stock_openning_stock']))) 
{
   $date  = $_POST['stock_creation_date'];
   $result=explode('/',$date);
   $year  = $result[2];
   $month = $result[0];
   $day   = $result[1];
   $new = $year.'-'.$month.'-'.$day;
   $item = array(
      'stock_pname'          => $_POST['stock_pname'],
      'stock_hsn_sac'        => $_POST['stock_hsn_sac'],
      'conversion_id'        => $_POST['conversion_id'],
      'category_id'          => $_POST['category_id'],
      'stock_item_code'      => $_POST['stock_item_code'],
      'stock_tax_rate'       => $_POST['stock_tax_rate'],
      'stock_creation_date'  => $new,
      'stock_sell_price'     => $_POST['stock_sell_price'],
      'stock_stax_status'    => $_POST['stock_stax_status'],
      'stock_purchase_price' => $_POST['stock_purchase_price'],
      'stock_ptax_status'    => $_POST['stock_ptax_status'],
      'stock_min_stock'      => $_POST['stock_min_stock'],
      'stock_total_quantity' => $_POST['stock_openning_stock']
   );
   $add_item_query=setData ("stock", $item);
   $con->query($add_item_query);
   echo "OK";

}

/* End Add Item */


/* Begin Add Conversion */

if((isset($_POST['base_unit_id'])) && (isset($_POST['conversion_rate'])) && (isset($_POST['secondary_unit_id']))) 
{
   if ($_POST['base_unit_id'] == "")
      echo "NO_BASE_UNIT";
   else if ($_POST['secondary_unit_id'] == "")
      echo "NO_SECONDARY_UNIT";
   else if ($_POST['base_unit_id'] == $_POST['secondary_unit_id'])
      echo "SAME_UNIT";
   else if ($_POST['conversion_rate'] == 0)
      echo "ZERO_CONVERSION_RATE";
   else
      {
         $conversion = array(
            'base_unit_id'      => $_POST['base_unit_id'],
            'conversion_rate'   => $_POST['conversion_rate'],
            'secondary_unit_id' => $_POST['secondary_unit_id']
         );
         $add_conversion_query=setData ("conversion", $conversion);
         $con->query($add_conversion_query);
         echo "OK";
      }
}

/* End Add Conversion */
if(isset($_POST['query']))
{
   $output='';
   $search = $_POST['query'];
   if($search_customer = $con->query("SELECT * FROM `customer` WHERE customer_name LIKE '$search%'"))
   {
      $search_customer_count  = $search_customer->num_rows;
      if($search_customer_count>0)
      {
         while($fetch_search_customer = $search_customer->fetch_array(MYSQLI_BOTH))
         {
            $output.='
            <tr onclick="infoCustomer('.$fetch_search_customer['customer_id'].')">
            <td>'.$fetch_search_customer['customer_name'].'</td>
            <td>'.$fetch_search_customer['customer_openning_balance'].'</td>
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

?>