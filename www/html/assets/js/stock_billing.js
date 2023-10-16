// TOASTER ALERT START
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  };
// TOASTER ALERT END

function roundToTwo(num)
{
  return +(Math.round(num * 100) / 100);
}
/*---------------------DOCUMENT READY TO ALL ACTIVITY START---------------*/

  var bill_item_count=0;
  var order_item_count=0;

  $(document).ready(function(){     

    $('#search_box').keyup(function(){
      var customer_search = $(this).val();
      if(customer_search!='')
      {
        $.ajax({
          url:'load_ajax.php',
          method:'POST',
          data:{customer_query:customer_search},
          success:function(response)
          {
            $("#display_customer").html(response);
          }
        });
      }
      else 
      {
        fetch_all_customer();  
      }
    });

    fetch_min_customer();

    $('#search_right_customer').keyup(function(){
      var right_customer_search = $(this).val();
      var right_customer_id = document.getElementById('customer_id_for_search_right_customer').value;
      if(right_customer_search!='')
      {
        $.ajax({
          url:'load_ajax.php',
          method:'POST',
          data:{right_customer_query:right_customer_search,right_customer_id:right_customer_id},
          success:function(response)
          {
            $("#customer_details_table").html(response);
          }
        });
      }
      else 
      {
        fetch_customer_details_table(right_customer_id);
      }
    });

    $('#party_search_box').keyup(function(){
      var party_search = $(this).val();
      if(party_search!='')
      {
        $.ajax({
          url:'load_ajax.php',
          method:'POST',
          data:{party_query:party_search},
          success:function(response)
          {
            $("#display_party").html(response);
          }
        });
      }
      else 
      {
        fetch_all_party();  
      }
    });

    fetch_min_party();

    $('#search_right_party').keyup(function(){
      var right_party_search = $(this).val();
      var right_party_id = document.getElementById('party_id_for_search_right_party').value;
      if(right_party_search!='')
      {
        $.ajax({
          url:'load_ajax.php',
          method:'POST',
          data:{right_party_query:right_party_search,right_party_id:right_party_id},
          success:function(response)
          {
            $("#party_details_table").html(response);
          }
        });
      }
      else 
      {
        fetch_party_details_table(right_party_id);  
      }
    });
    
    $('#category_search_box').keyup(function(){
      var category_search = $(this).val();
      if(category_search!='')
      {
          $.ajax({
            url:'load_ajax.php',
            method:'POST',
            data:{category_query:category_search},
            success:function(response)
            {
              $("#display_category").html(response);
            }
        });
      }
      else 
      {
        fetch_all_category();  
      }
    });

    fetch_min_category(); 

    $('#search_right_category').keyup(function(){
      var right_category_search = $(this).val();
      var right_category_id = document.getElementById('category_id_for_search_right_category').value;
      if(right_category_search!='')
      {
          $.ajax({
            url:'load_ajax.php',
            method:'POST',
            data:{right_category_query:right_category_search,right_category_id:right_category_id},
            success:function(response)
            {
              $("#category_details_table").html(response);
            }
        });
      }
      else 
      {
        fetch_category_details_table(right_category_id);  
      }
    });

    $('#unit_search_box').keyup(function(){
      var unit_search = $(this).val();
      if(unit_search!='')
      {
          $.ajax({
            url:'load_ajax.php',
            method:'POST',
            data:{unit_query:unit_search},
            success:function(response)
            {
              $("#display_unit").html(response);
            }
        });
      }
      else 
      {
        fetch_all_unit();  
      }
    });

    fetch_min_unit(); 

    $('#search_right_unit').keyup(function(){
      var right_unit_search = $(this).val();
      var right_unit_id = document.getElementById('unit_id_for_search_right_unit').value;
      if(right_unit_search!='')
      {
          $.ajax({
            url:'load_ajax.php',
            method:'POST',
            data:{right_unit_query:right_unit_search,right_unit_id:right_unit_id},
            success:function(response)
            {
              $("#unit_details_table").html(response);
            }
        });
      }
      else 
      {
        fetch_unit_details_table(right_unit_id);  
      }
    });

    $('#item_search_box').keyup(function(){
      var item_search = $(this).val();
      if(item_search!='')
      {
        $.ajax({
          url:'load_ajax.php',
          method:'POST',
          data:{item_query:item_search},
          success:function(response)
          {
            $("#display_item").html(response);
          }
        });
      }
      else 
      {
        fetch_all_item();  
      }
    });

    fetch_min_item(); 

    $('#search_right_item').keyup(function(){
      var right_item_search = $(this).val();
      var right_item_search_id = document.getElementById('item_id_for_search_right_item').value;        
      if(right_item_search!='')
      {
        $.ajax({
          url:'load_ajax.php',
          method:'POST',
          data:{right_item_query:right_item_search,right_item_search_id:right_item_search_id},
          success:function(response)
          {
            $("#item_details_table").html(response);
          }
        });
      }
      else 
      {
        fetch_item_details_table(right_item_search_id);
      }
    });

    $('#invoice_search_box').keyup(function(){
      var invoice_search = $(this).val();
      if(invoice_search!='')
      {
        $.ajax({
          url:'load_ajax.php',
          method:'POST',
          data:{invoice_query:invoice_search},
          success:function(response)
          {
            $("#display_invoice").html(response);
          }
        });
      }
      else 
    {
      fetch_all_invoice();  
    }
    });

    fetch_min_invoice();

    $('#search_right_invoice').keyup(function(){
      var right_invoice_search = $(this).val();

      var date = document.getElementById('invoice_date_for_search_right_invoice').value.split(",");
      var year = date[0];
      var month = date[1];
      var day = date[2];
      var right_invoice_date = year + '-' + month + '-' + day;

      if(right_invoice_search!='')
      {
        $.ajax({
          url:'load_ajax.php',
          method:'POST',
          data:{right_invoice_query:right_invoice_search,right_invoice_date:right_invoice_date},
          success:function(response)
          {
            $("#invoice_details_table").html(response);
          }
        });
      }
      else 
      {
        fetch_invoice_details_table(right_invoice_date);  
      }
    });

    function add_row_to_invoice(){
      bill_item_count++;
      var html='';
      html+='<tr id="bill_row_'+bill_item_count+'">';
      
      html+='<td><i class="fas fa-trash icon-md text-danger remove_row" id="'+bill_item_count+'" onclick=""></i> </td>';
  
      html+='<td colspan="4"> <div class="form-group row"> <div class="col-lg-12 col-md-12 col-sm-12"> <select class="form-control kt-selectpicker" onchange="bill_item_select(value, '+bill_item_count+')" id="bill_get_item_id_'+bill_item_count+'" data-size="7" data-live-search="true"> <option value="" selected>Select</option>';
  
      var bill_items = 'BILL ITEMS';
      $.ajax({
        type:"POST",
        url:"load_ajax.php",
        data:{bill_items:bill_items},
        success:function(data){
          html+=data;
  
          html+='</select> </div> </div> </td>';

          html+='<td><input type="text" class="form-control" id="bill_item_color_code_'+bill_item_count+'" placeholder=""/></td>';
  
          html+='<td><input type="text" class="form-control" id="bill_get_hsn_code_'+bill_item_count+'" placeholder=""/></td>';
  
          html+='<td><input type="text" class="form-control" id="bill_get_item_code_'+bill_item_count+'" placeholder=""/></td>';
  
          html+='<td><input type="text" class="form-control" onkeyup="bill_quantity_change(value, '+bill_item_count+')" id="bill_get_item_quantity_'+bill_item_count+'" placeholder=""/></td>';
  
          html+='<td> <div class="form-group row"> <div class="col-lg-12 col-md-12 col-sm-12"> <select class="form-control" id="bill_get_item_unit_'+bill_item_count+'" onchange="bill_unit_select(value, '+bill_item_count+')" data-live-search="true"> </select> </div> </div> </td>';
  
          html+='<td><input type="text" class="form-control" onkeyup="bill_price_change(value, '+bill_item_count+')" id="bill_get_item_price_'+bill_item_count+'" placeholder=""/></td>';
  
          html+='<td><input type="text" class="form-control" onkeyup="bill_discount_rate_change(value, '+bill_item_count+')" id="bill_get_discount_rate_'+bill_item_count+'" placeholder=""/></td>';
  
          html+='<td><input type="text" class="form-control" onkeyup="bill_discount_amount_change(value, '+bill_item_count+')"  id="bill_get_discount_amount_'+bill_item_count+'" placeholder=""/></td>';
  
          html+='<td> <div class="form-group row"> <div class="col-lg-12 col-md-12 col-sm-12"> <select class="form-control kt-selectpicker" onchange="bill_tax_rate_change(value, '+bill_item_count+')" id="bill_get_tax_rate_'+bill_item_count+'" data-size="3" data-live-search="true"> <option value="GST 18">GST@ 18%</option> <option value="IGST 18">IGST@ 18%</option> </select> </div> </div> </td>';
  
          html+='<td><input type="text" class="form-control" id="bill_get_tax_amount_'+bill_item_count+'" disabled placeholder=""/></td>';
  
          html+='<td><input type="text" class="form-control" onkeyup="bill_total_amount_change(value, '+bill_item_count+')" id="bill_get_total_amount_'+bill_item_count+'" placeholder=""/></td>';

          html+='<td class="no_view"><input type="hidden" class="form-control" id="bill_get_conversion_rate_'+bill_item_count+'" placeholder=""/></td>';

          html+='<td class="no_view"><input type="hidden" class="form-control" id="bill_get_price_for_primary_unit_'+bill_item_count+'" placeholder=""/></td>';
          
          html+='</tr>';

          $('#bill_new_product').append(html);
          $('#bill_get_item_id_'+bill_item_count).selectpicker('refresh');
        }
      });
        
    }
    
    add_row_to_invoice();

    function add_row_to_order(){

      order_item_count++;
      var html='';
      html+='<tr id="order_row_'+order_item_count+'">';
      
      html+='<td><i class="fas fa-trash icon-md text-danger remove_order_row" id="'+order_item_count+'" onclick=""></i> </td>';
  
      html+='<td colspan="1"> <div class="form-group row"> <div class="col-lg-12 col-md-12 col-sm-12"> <select class="form-control kt-selectpicker" onchange="order_item_select(value, '+order_item_count+')" id="order_get_item_id_'+order_item_count+'" data-size="7" data-live-search="true"> <option value="" selected>Select</option>';
  
      var order_items = 'ORDER ITEMS';
      $.ajax({
        type:"POST",
        url:"load_ajax.php",
        data:{order_items:order_items},
        success:function(data){
          
          html+=data;
  
          html+='</select> </div> </div> </td>';

          html+='<td><input type="text" disabled class="form-control" id="order_get_hsn_code_'+order_item_count+'" placeholder=""/></td>';
  
          html+='<td><input type="text" class="form-control" onkeyup="order_summation(value, '+order_item_count+')" id="order_get_item_quantity_'+order_item_count+'" placeholder=""/></td>';
  
          html+='<td><input type="text" disabled class="form-control" id="order_get_item_unit_'+order_item_count+'" placeholder=""/></td>';
          
          html+='</tr>';
          $('#order_new_product').append(html);
          $('#order_get_item_id_'+order_item_count).selectpicker('refresh');
        }
      });
        
    }
    
    add_row_to_order();
    
    $(document).on('click','.add_row',function(){
      add_row_to_invoice();
    });

    $(document).on('click','.remove_row',function(){
      var row_id=$(this).attr("id");
      $('#bill_row_'+row_id).remove();
      bill_summation();
    });

    $(document).on('click','.order_add_row',function(){
      add_row_to_order();
    });

    $(document).on('click','.remove_order_row',function(){
      var order_row_id=$(this).attr("id");
      $('#order_row_'+order_row_id).remove();
      order_summation();
    });

    function get_invoice_number()
    {
      var get_invoice_number="INVOICE NO";
      if(document.getElementById('receipt_type'))
      {
        var get_invoice_type = document.getElementById('receipt_type').value;
        $.ajax({
          url:'load_ajax.php',
          method:'POST',
          data:{get_invoice_number:get_invoice_number,get_invoice_type:get_invoice_type},
          success:function(data)
          {
            document.getElementById('bill_id').value = data;
          }
        });
      }
    }

    get_invoice_number();

    function get_order_number()
    {
      var get_order_number="ORDER NO";
      $.ajax({
        url:'load_ajax.php',
        method:'POST',
        data:{get_order_number:get_order_number},
        success:function(data)
        {
          var ord = data;
          document.getElementById('order_id').value = ord;
        }
      });
    }

    get_order_number();

    function detect_receipt_type()
    {
      if(document.getElementById('receipt_type'))
      {
        var receipt_type = document.getElementById('receipt_type').value;
        if(receipt_type == 'payment')
        {
          document.getElementById('invoice_page_top_switch').classList.add("no_view");
          document.getElementById('invoice_page_item_list').classList.add("no_view");
          document.getElementById('credit_received_label').classList.remove("no_view");
          document.getElementById('credit_received_amount').classList.remove("no_view");          
        }
        else if (receipt_type == 'return')
        {
          document.getElementById('invoice_page_top_switch').classList.add("no_view");
          document.getElementById('credit_received_label').classList.remove("no_view");
          document.getElementById('credit_received_label').innerHTML = 'Returned';
          document.getElementById('credit_received_amount').classList.remove("no_view");
        }
      }
    }

    detect_receipt_type();

    fetch_expense_details_table();
  });

/*---------------------DOCUMENT READY TO ALL ACTIVITY END---------------*/
      
/* Begin fetch min customer data */
function fetch_min_customer(){
  var min_customer_id='0';
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{min_customer_id:min_customer_id},
    success:function(data)
    {
      infoCustomer(data);
    }
  });
}
/* End fetch min customer data */

/* Begin Fetch All Customer data*/
function fetch_all_customer(){
  var all_customer = "ALL_CUSTOMER";
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{all_customer:all_customer},
    success:function(data)
    {
      $("#display_customer").html(data);
    }
  });
}
fetch_all_customer();  
/* End Fetch All Customer data */

/* START DELETE Customer data*/
function deleteCustomer(id)
{
  Swal.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: true
  }).then(function(result) {
      if (result.value) {
        $.ajax({
          type:"POST",
          url:"load_ajax.php",
          data:{delete_customer_id:id},
          success:function(data)
          {  
            Swal.fire(
              "Deleted!",
              "Your file has been deleted.",
              "success"
          )
          fetch_all_customer();
          fetch_min_customer();
          }
        });
      }else if (result.dismiss === "cancel") {
          Swal.fire(
              "Cancelled",
              "Your imaginary file is safe :)",
              "error"
          )
      }
    });
}
/* END DELETE Customer data*/

/* Begin edit customer */
function editCustomer(id){
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{edit_customer_id:id},
    success:function(data){
      var array = $.parseJSON(data);
      if(array.status == "success")
      {      
        $('.customer_name').val(array.customer_name);
        $('.customer_mobile_number').val(array.customer_mobile_number);
        $('.customer_mobile_number').prop('disabled', true);
        $('.customer_email').val(array.customer_email);
        $('.customer_gst').val(array.customer_gst);
        $('.customer_address').val(array.customer_address);
        $('.customer_openning_balance').val(Math.abs(array.customer_total_balance));
        if(parseFloat(array.customer_total_balance) < 0)
          $("#r1").prop("checked", true);
        else 
          $('#r2').prop("checked", true);
        $('.customer_creation_date').val(array['customer_creation_date']); 
        $('.customer_id').val(array.customer_id);
        $('#insert_customer').val("UDATE");           
      }            
    }  
  });

  $('#addCustomerDetailsModal').modal("show");	
}
/* End edit customer */

/* Begin Add Customer */
$("#add_customer").submit(function(others) 
{
  others.preventDefault();
  var customer_name             = document.getElementsByName('customer_name')[0].value.toUpperCase().trim();;
  var customer_email            = document.getElementsByName('customer_email')[0].value;
  var customer_mobile_number    = document.getElementsByName('customer_mobile_number')[0].value;
  var customer_gst              = document.getElementsByName('customer_gst')[0].value;
  var customer_address          = document.getElementsByName('customer_address')[0].value.toUpperCase().trim();;
  var customer_openning_balance = document.getElementsByName('customer_openning_balance')[0].value;
  var customer_total_paid_amount = 0;
  if (document.getElementById('r1').checked) {
    customer_total_paid_amount = parseFloat(Math.abs(customer_openning_balance))* (-1);
    }
  if (document.getElementById('r2').checked) {
    customer_total_paid_amount = parseFloat(Math.abs(customer_openning_balance));
    }
  var customer_creation_date = document.getElementsByName('customer_creation_date')[0].value;
  var customer_id = document.getElementsByName('customer_id')[0].value;

  if (customer_name=="") {$('.customer_name').focus(); toastr.warning("Customer name required");}
  else if(!checkModalMobileNumber(customer_mobile_number)) {$('.customer_mobile_number').focus(); toastr.warning("Customer phone number is invalid");}
  else if(customer_address=="") {$('.customer_address').focus(); toastr.warning("Customer address required");}
  else if(customer_creation_date=="") {$('.customer_creation_date').focus(); toastr.warning("Date selection required");}
  else{
    $.ajax({
      type:"POST",
      url:"load_ajax.php",
      data:{customer_name:customer_name,customer_email:customer_email,customer_mobile_number:customer_mobile_number,customer_gst:customer_gst,customer_address:customer_address,customer_total_paid_amount:customer_total_paid_amount,customer_creation_date:customer_creation_date,customer_id:customer_id},
      success:function(data){
        var array = $.parseJSON(data);
        if(array.status == "success")
        {
          $('#add_customer')[0].reset();
          $('#addCustomerDetailsModal').modal('hide');
          fetch_all_customer();

          /* BEGIN SECTION FOR BILLING PURPOSE */
          customer_phone_number_in_bill = document.getElementById('bill_customer_phone_number').value;
          if (customer_mobile_number == customer_phone_number_in_bill)
          {
            document.getElementById('bill_customer_name').value = customer_name;
            document.getElementById('bill_customer_id_input').value = array.last_id;
          }
          
          /* END SECTION FOR BILLING PURPOSE */

          toastr.success("Customer has been added !");
        }
        else if(array.status == "error")
        {
          $('#add_customer')[0].reset();
          toastr.warning("Phone number already exists !");
        }
        else
        {
          $('#add_customer')[0].reset();
          $('#addCustomerDetailsModal').modal('hide');
          fetch_all_customer();
          toastr.success("Customer has been Updated !");
        }

        fetch_min_customer();
      }
    });
  }
});
/* End Add Customer */

/* BEGIN INFO Customer */
function infoCustomer(id)
{
  document.getElementById('customer_id_for_search_right_customer').value=id;
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{customer_info:id},
    success:function(data){
      $("#info_customer").html(data); 
    }
  });
  fetch_customer_details_table(id)
}
/* END INFO Customer */

/* begin fetch customer details */
function fetch_customer_details_table(id)
{
  var customer_details_table = "CUSTOMER DETAILS";
    $.ajax({
      type:"POST",
      url:"load_ajax.php",
      data:{customer_details_table:customer_details_table, customer_details_table_id:id},
      success:function(data)
      {
        $("#customer_details_table").html(data);
      }
    });
}
/* end fetch customer details */


/* Begin fetch minimum category */
function fetch_min_category(){
  var min_category_id='0';
$.ajax({
  type:"POST",
  url:"load_ajax.php",
  data:{min_category_id:min_category_id},
  success:function(data)
  {
    infoCategory(data);
  }
});
}
/* End fetch minimum category */

/* Begin Fetch All Category data*/
function fetch_all_category()
{
  var all_category = "ALL_CATEGORY";
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{all_category:all_category},
    success:function(data)
    {
      $("#display_category").html(data);
    }
  });
}
fetch_all_category();  
/* End Fetch All category data*/

/* Begin delete category */
function deleteCategory(id)
{
    Swal.fire({
      title: "Are you sure?",
      text: "You wont be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel!",
      reverseButtons: true
  }).then(function(result) {
      if (result.value) {
        $.ajax({
          type:"POST",
          url:"load_ajax.php",
          data:{delete_category_id:id},
          success:function(data)
          {  
            Swal.fire(
              "Deleted!",
              "Your file has been deleted.",
              "success"
          )
          fetch_all_category();
          fetch_min_category();
          }
        });
      } else if (result.dismiss === "cancel") {
          Swal.fire(
              "Cancelled",
              "Your imaginary file is safe :)",
              "error"
          )
      }
  });
}
/* End delete category */

/* Begin edit category */
function editCategory(id){
  $.ajax({
  type:"POST",
  url:"load_ajax.php",
  data:{edit_category_id:id},
  success:function(data){
    var array = $.parseJSON(data);
    if(array.status == "OK")
    {
      $('.category_name').val(array.category_name);
      $('.this_category_id').val(array.category_id);
      $('#insert_category').val("UDATE");           
    }            
  }  
  });
  $('#addCategory').modal("show");	
}
/* End edit category */

/* Begin Add Category */
$("#add_category").submit(function(others) 
{
  others.preventDefault();
  var category_name = document.getElementsByName('category_name')[0].value.toUpperCase().trim();
  var category_id   = document.getElementsByName('this_category_id')[0].value;
  if(category_name)
  {
    $.ajax({
      type:"POST",
      url:"load_ajax.php",
      data:{category_name:category_name, category_id:category_id},
      success:function(data){
        var array = $.parseJSON(data);
        if(array.status=="OK")
        {
          $('#add_category')[0].reset();
          $('#addCategory').modal('hide');
          fetch_all_category();
          toastr.success("Category has been added !");
        }
        else if(array.status=="FAILED")
        {
          $('#add_category')[0].reset();
          toastr.warning("Category already exists !");
        }
      }
    });
  }
  else{
    toastr.error("Cannot insert blank category name !");
  }
  fetch_min_category();
});
/* End Add Category */

/* Begin info category */
function infoCategory(id)
{
  document.getElementById('category_id_for_search_right_category').value=id;
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{category_info:id},
    success:function(data){
      $("#info_category").html(data); 
    }
  });
  fetch_category_details_table(id);
}
/* End info category */

/* begin fetch category details */
function fetch_category_details_table(id)
{
  var category_details_table = "CATEGORY DETAILS";
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{category_details_table:category_details_table, category_details_table_id:id},
    success:function(data)
    {
      $("#category_details_table").html(data);
    }
  });
}
/* end fetch category details */

/* Begin fetch min unit */
function fetch_min_unit(){
  var min_unit_id='0';
$.ajax({
  type:"POST",
  url:"load_ajax.php",
  data:{min_unit_id:min_unit_id},
  success:function(data)
  {
    infoUnit(data);
  }
});
}
/* End fetch min unit */

/* Begin Fetch All Unit data*/
function fetch_all_unit()
{
var all_unit = "ALL_UNIT";
$.ajax({
type:"POST",
url:"load_ajax.php",
data:{all_unit:all_unit},
success:function(data)
{
  $("#display_unit").html(data);
}
});
}
fetch_all_unit();  
/* End Fetch All Unit data*/

/* Begin delete unit */
function deleteThisUnit(id)
{
    Swal.fire({
      title: "Are you sure?",
      text: "You wont be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel!",
      reverseButtons: true
  }).then(function(result) {
      if (result.value) {
        $.ajax({
          type:"POST",
          url:"load_ajax.php",
          data:{delete_unit_id:id},
          success:function(data)
          {  
            Swal.fire(
              "Deleted!",
              "Your file has been deleted.",
              "success"
          )
          fetch_all_unit();
          fetch_min_unit();
          }
        });
      } else if (result.dismiss === "cancel") {
          Swal.fire(
              "Cancelled",
              "Your imaginary file is safe :)",
              "error"
          )
      }
  });
}
/* End delete unit */

/* Begin edit unit */
function editThisUnit(id){
  $.ajax({
  type:"POST",
  url:"load_ajax.php",
  data:{edit_unit_id:id},
  success:function(data){
    var array = $.parseJSON(data);
    if(array.status == "OK")
    {
      $('.unit_full_name').val(array.unit_full_name);
      $('.unit_short_name').val(array.unit_short_name);
      $('.unit_id').val(array.unit_id);
      $('#insert_unit').val("UDATE");           
    }            
  }  
  });
  
  $('#addUnitModal').modal("show");	
}
/* End edit unit */

/* Begin Add Unit */
$("#add_unit").submit(function(others) 
{
  others.preventDefault();
  var unit_full_name  = document.getElementsByName('unit_full_name')[0].value.toUpperCase().trim();
  var unit_short_name = document.getElementsByName('unit_short_name')[0].value.toUpperCase().trim();
  var unit_id = document.getElementsByName('unit_id')[0].value;
  if(unit_full_name && unit_short_name)
  {
    $.ajax({
      type:"POST",
      url:"load_ajax.php",
      data:{unit_full_name:unit_full_name, unit_short_name:unit_short_name, unit_id:unit_id},
      success:function(data){
        var array = $.parseJSON(data);
        if(array.status=="OK")
        {
          $('#add_unit')[0].reset();
          $('#addUnitModal').modal('hide');
          fetch_all_unit();
          toastr.success("Unit has been added !");
        }
        else if(array.status=="FAILED_BOTH")
        {
          toastr.warning("Fullname and Shortname already exists !");
        }
        else if(array.status=="FAILED_FULLNAME")
        {
          toastr.warning("Fullname already exists !");
        }
        else if(array.status=="FAILED_SHORTNAME")
        {
          toastr.warning("Shortname already exists !");
        }
      }
    });
  }
  else if (!unit_full_name){
    toastr.error("Cannot insert blank unit name !");
  }
  else if (!unit_short_name){
    toastr.error("Cannot insert blank unit short name !");
  }

  fetch_min_unit();
});
/* End Add Unit */

/* Begin info unit */
function infoUnit(id)
{
  document.getElementById('unit_id_for_search_right_unit').value=id;
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{unit_info:id},
    success:function(data){
      $("#info_unit").html(data); 
    }
  });
  fetch_unit_details_table(id);
}
/* End info unit */

/* begin fetch unit details */
function fetch_unit_details_table(id)
{
  var unit_details_table = "UNIT DETAILS";
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{unit_details_table:unit_details_table, unit_details_table_id:id},
    success:function(data)
    {
      $("#unit_details_table").html(data);
    }
  });
}
/* end fetch unit details */

/* begin fetch min item */
function fetch_min_item(){
  var min_item_id='0';
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{min_item_id:min_item_id},
    success:function(data)
    {
      infoItem(data);
    }
  });
}
/* end fetch min item */

/* Begin Fetch All item data*/
function fetch_all_item()
{
  var all_item = "ALL_ITEM";
  $.ajax({
  type:"POST",
  url:"load_ajax.php",
  data:{all_item:all_item},
  success:function(data)
  {
    $("#display_item").html(data);
  }
  });
}
fetch_all_item();  
/* End Fetch All ITEM data*/

/* begin delete item */
function deleteItem(id)
{
  Swal.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: true
  }).then(function(result) {
    if (result.value) {
      $.ajax({
        type:"POST",
        url:"load_ajax.php",
        data:{delete_item_id:id},
        success:function(data)
        {  
          Swal.fire(
            "Deleted!",
            "Your file has been deleted.",
            "success"
        )
        fetch_all_item();
        fetch_min_item();
        fetch_category_details_table(data);
        }
      });
    } else if (result.dismiss === "cancel") {
        Swal.fire(
            "Cancelled",
            "Your imaginary file is safe :)",
            "error"
        )
    }
  });
}
/* end delete item */

/* Begin edit item */
function editItem(id){
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{edit_item_id:id},
    success:function(data){
      var array = $.parseJSON(data);
      if(array.status == "OK")
      {
        $('.stock_pid').val(array.stock_pid);
        $('.stock_pname').val(array.stock_pname);
        $('.stock_hsn_sac').val(array.stock_hsn_sac);
        $('.conversion_id_value').val(array.conversion_id);
        $('.stock_item_code').val(array.stock_item_code);
        $('.category_id').val(array.category_id);
        $('.category_id').selectpicker('refresh');
        $('.stock_tax_rate').val(array.stock_tax_rate);
        $('.stock_creation_date').val(array.stock_creation_date);
        $('.stock_sell_price').val(array.stock_sell_price);
        $('.stock_stax_status').val(array.stock_stax_status);
        $('.stock_purchase_price').val(array.stock_purchase_price);
        $('.stock_ptax_status').val(array.stock_ptax_status);
        $('.stock_min_stock').val(array.stock_min_stock);
        $('.openning_stock').val(array.stock_total_quantity);
        $('#insert_item').val("UDATE");  
        
        var show_units_in_modal='SHOW_UNITS';
        $.ajax({
          type:"POST",
          url:"load_ajax.php",
          data:{show_units_in_modal:show_units_in_modal, show_units_conversion_id:array.conversion_id},
          success:function(data)
          {
            array = $.parseJSON(data);
            var show_information = '1 '+array.base_unit+' = '+array.conversion_rate+' '+array.secondary_unit;
            document.getElementById('show_units_and_conversion_rate').innerHTML = show_information;
            $('#editItemUnit').modal('hide');
            $('#addItemModal').modal("show");
          }
        });
      }            
    }  
  });
}
/* End edit item */

/* Begin Add Item */
$("#add_item").submit(function(others) 
{
  others.preventDefault();
  var stock_pid            = document.getElementsByName('stock_pid')[0].value;
  var stock_pname          = document.getElementsByName('stock_pname')[0].value.toUpperCase().trim();
  var stock_print_in_bill  = '';
  if(document.getElementsByName('stock_print_in_bill')[0].checked == true)
    stock_print_in_bill  = 'yes';
  else
    stock_print_in_bill  = 'no';
  var stock_hsn_sac        = document.getElementsByName('stock_hsn_sac')[0].value;
  var conversion_id        = document.getElementsByName('conversion_id_value')[0].value;
  var category_id          = document.getElementsByName('category_id')[0].value;
  var stock_item_code      = document.getElementsByName('stock_item_code')[0].value;
  var stock_tax_rate       = document.getElementsByName('stock_tax_rate')[0].value;
  var stock_creation_date  = document.getElementsByName('stock_creation_date')[0].value;
  var stock_sell_price     = document.getElementsByName('stock_sell_price')[0].value;
  var stock_stax_status    = document.getElementsByName('stock_stax_status')[0].value;
  var stock_purchase_price = document.getElementsByName('stock_purchase_price')[0].value;
  var stock_ptax_status    = document.getElementsByName('stock_ptax_status')[0].value;
  var stock_min_stock      = document.getElementsByName('stock_min_stock')[0].value;
  var stock_openning_stock = document.getElementsByName('openning_stock')[0].value;
  
  if     (stock_pname=="")          {$('.stock_pname').focus();          toastr.warning("Item name required");}
  else if(stock_hsn_sac=="")        {$('.stock_hsn_sac').focus();        toastr.warning("sac code required");}
  else if(conversion_id=="")        {$('.conversion_id').focus();        toastr.warning("Unit selection required");}
  else if(category_id=="")          {$('.category_id').focus();          toastr.warning("Category selection required");}
  else if(stock_item_code=="")      {$('.stock_item_code').focus();      toastr.warning("Item code selection required");}
  else if(stock_tax_rate=="")       {$('.stock_tax_rate').focus();       toastr.warning("Tax rate selection required");}
  else if(stock_creation_date=="")  {$('.stock_creation_date').focus();  toastr.warning("Date selection required");}
  else if(stock_sell_price=="")     {$('.stock_sell_price').focus();     toastr.warning("Sale price selection required");}
  else if(stock_stax_status=="")    {$('.stock_stax_status').focus();    toastr.warning("Sale tax type selection required");}
  else if(stock_purchase_price=="") {$('.stock_purchase_price').focus(); toastr.warning("Purchase price selection required");}
  else if(stock_ptax_status=="")    {$('.stock_ptax_status').focus();    toastr.warning("Purchase tax type selection required");}
  else{
    $.ajax({
        type:"POST",
        url:"load_ajax.php",
        data:{stock_pid:stock_pid,stock_pname:stock_pname, stock_print_in_bill:stock_print_in_bill, stock_hsn_sac:stock_hsn_sac, conversion_id:conversion_id, category_id:category_id, stock_item_code:stock_item_code, stock_tax_rate:stock_tax_rate, stock_creation_date:stock_creation_date, stock_sell_price:stock_sell_price, stock_stax_status:stock_stax_status, stock_purchase_price:stock_purchase_price, stock_ptax_status:stock_ptax_status, stock_min_stock:stock_min_stock, stock_total_quantity:stock_openning_stock},
        success:function(data){  
          var array = $.parseJSON(data);
          
          if(array.status=="OK")
          {
            $('#add_item')[0].reset();
            $('#addItemModal').modal('hide');
            fetch_all_item();
            fetch_category_details_table(category_id);
          }
          else
          {
            toastr.warning('Item cannot be added !');
          }
            
          fetch_min_item();
        }
    });   
  }
  
});
/* End Add Item */

/* begin info item */
function infoItem(id)
{
  document.getElementById('item_id_for_search_right_item').value = id;
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{item_info:id},
    success:function(data){
      $("#info_item").html(data); 
    }
  });
  fetch_item_details_table(id);
}
/* end info item */

/* begin fetch item details */
function fetch_item_details_table(id)
{
  var item_details_table = "ITEM DETAILS";
  $.ajax({
  type:"POST",
  url:"load_ajax.php",
  data:{item_details_table:item_details_table, item_details_table_id:id},
  success:function(data)
  {
    $("#item_details_table").html(data);
  }
  });
}
/* end fetch item details */

/* begin delete individual adjustment */
function deleteIndividualAdjustment(id)
{
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{delete_individual_adjustment_id:id},
    success:function(data){
      infoItem(data);
    }
  });
}
/* end delete individual adjustment */

/* begin item adjustment modal call */
function adjust_item(item_id)
{
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{adjust_item_modal_item_id:item_id},
    success:function(data){
      $('.adjustment_item_name').val(data);
      $('.adjustment_item_id').val(item_id);
      var select_box_value=document.getElementsByName('adjustment_item_type')[0].value;
      adjust_item_disable_purchase_price(select_box_value);
      $('#adjustItemModal').modal('show');
    }
  });  
}
/* end item adjustment modal call */

/* begin item adjusment */
$("#adjust_item").submit(function(adjust) 
{
  adjust.preventDefault();
  var adjust_item_id             = document.getElementsByName('adjustment_item_id')[0].value;
  var adjust_item_type           = document.getElementsByName('adjustment_item_type')[0].value;
  var adjust_item_quantity       = document.getElementsByName('adjustment_item_quantity')[0].value;
  var adjust_item_purchase_price = document.getElementsByName('adjust_item_purchase_price')[0].value;
  var adjust_item_date           = document.getElementsByName('adjustment_item_date')[0].value;
  var adjust_item_details        = document.getElementsByName('adjustment_item_details')[0].value;
  
  $.ajax({
      type:"POST",
      url:"load_ajax.php",
      data:{adjust_item_id:adjust_item_id,adjust_item_type:adjust_item_type,adjust_item_quantity:adjust_item_quantity, adjust_item_purchase_price:adjust_item_purchase_price,adjust_item_date:adjust_item_date,adjust_item_details:adjust_item_details},
      success:function(data){
        var array = $.parseJSON(data);
        if(array.status == 'success')
        {
          $('#adjust_item')[0].reset();
          $('#adjustItemModal').modal('hide');
          toastr.success("Adjustment has been added !");
          fetch_all_item();
          infoItem(adjust_item_id);
        }
      }
  });      
});
/* end item adjusment */

/* begin adjust item disable purchase price */
function adjust_item_disable_purchase_price(val)
{
  if(val == 'reduce')
  {
    $('.adjust_item_purchase_price').val('PURCHASE PRICE');
    $('.adjust_item_purchase_price').prop('disabled', true);
  }
  else
  {
    $('.adjust_item_purchase_price').val('');
    $('.adjust_item_purchase_price').prop('disabled', false);
  }
  
}
/* end adjust item disable purchase price */

/* begin conversion modal unit fetch */
function call_conversion()
{
  var conversion_modal_unit_list = "CONVERSION";
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{conversion_modal_unit_list:conversion_modal_unit_list},
    success:function(data){
      document.getElementById('conversion_modal_base_unit_select').innerHTML = data;
      document.getElementById('conversion_modal_secondary_unit_select').innerHTML = data;
      $('#conversion_modal_base_unit_select').selectpicker('refresh');
      $('#conversion_modal_secondary_unit_select').selectpicker('refresh');
      $('#editUnit').modal('show');
    }
  }); 
}
/* end conversion modal unit fetch */

/* Begin Add Conversion */
$("#add_conversion").submit(function(others) 
{
  others.preventDefault();
  var base_unit_id      = document.getElementsByName('base_unit_id')[0].value;
  var conversion_rate   = document.getElementsByName('conversion_rate')[0].value;
  var secondary_unit_id = document.getElementsByName('secondary_unit_id')[0].value;
  
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{base_unit_id:base_unit_id, conversion_rate:conversion_rate, secondary_unit_id:secondary_unit_id},
    success:function(data){
      array=$.parseJSON(data);
      if(array.status=="OK")
      {
        $('#add_conversion')[0].reset();
        $('#editUnit').modal('hide');
        toastr.success("Conversion added successfully !");
      }
      else if(array.status=="NO_BASE_UNIT")
        toastr.error("Please enter base unit !");
      else if(array.status=="NO_SECONDARY_UNIT")
        toastr.error("Please enter secondary unit !");
      else if(array.status=="SAME_UNIT")
        toastr.error("Please enter secondary unit !");
      else if(array.status=="ZERO_CONVERSION_RATE")
        toastr.error("Please enter conversion rate !");
    }
  });      
});
/* End Add Conversion */

/* begin bill item select */
function bill_item_select(val, serial_no)
{
  item_fields_for_bill = 'ITEM FIELDS';
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{item_fields_for_bill:item_fields_for_bill, item_id:val},
    success:function(data)
    {
      var array = $.parseJSON(data);
      document.getElementById('bill_get_hsn_code_'+serial_no).value =array.item_hsn_sac;
      document.getElementById('bill_get_item_code_'+serial_no).value =array.item_code;
      if(document.getElementById('bill_get_item_quantity_'+serial_no).value == '')
        document.getElementById('bill_get_item_quantity_'+serial_no).value = '1';
      if(document.getElementById('bill_get_discount_rate_'+serial_no).value == '')
        document.getElementById('bill_get_discount_rate_'+serial_no).value = '0';
      if(document.getElementById('bill_get_discount_amount_'+serial_no).value == '')
        document.getElementById('bill_get_discount_amount_'+serial_no).value = '0';
      document.getElementById('bill_get_item_price_'+serial_no).value =roundToTwo(array.item_price);
      document.getElementById('bill_get_price_for_primary_unit_'+serial_no).value =roundToTwo(array.item_price);
      document.getElementById('bill_get_tax_rate_'+serial_no).value =array.item_tax_rate;
      var tax_amount = roundToTwo((parseFloat(array.item_tax_rate.split(' ').pop()) / 100) * parseFloat(array.item_price));
      document.getElementById('bill_get_tax_amount_'+serial_no).value = roundToTwo(tax_amount);
      document.getElementById('bill_get_total_amount_'+serial_no).value = roundToTwo(parseFloat(array.item_price) + parseFloat(tax_amount));
      
      var unit_selection_for_bill = "UNIT SELECTION";
      $.ajax({
        type:"POST",
        url:"load_ajax.php",
        data:{unit_selection_for_bill:unit_selection_for_bill, unit_selection_item_id:val},
        success:function(data)
        {
            var conversion_rate = data.split('*').pop();
            document.getElementById('bill_get_conversion_rate_'+serial_no).value = conversion_rate;
            $('#bill_get_item_unit_'+serial_no).html(data);
            $('#bill_get_item_unit_'+serial_no).selectpicker('refresh');
        }
      });

      bill_summation();
    }
  });
}
/* end bill item select */

/* begin bill quantity change */
function bill_quantity_change(quantity, serial_no)
{
  if (quantity == '') quantity = 0;
  
  var rough_total_amount = quantity * document.getElementById('bill_get_item_price_'+serial_no).value;

  var tax_rate = document.getElementById('bill_get_tax_rate_'+serial_no).value.split(' ').pop();
  var tax_amount = roundToTwo(rough_total_amount * (tax_rate/100));
  document.getElementById('bill_get_tax_amount_'+serial_no).value = tax_amount;

  var discount_rate = roundToTwo(document.getElementById('bill_get_discount_rate_'+serial_no).value);
  var discount_amount = roundToTwo(rough_total_amount * (discount_rate/100));
  document.getElementById('bill_get_discount_amount_'+serial_no).value = discount_amount;

  var total_amount = roundToTwo(parseFloat(rough_total_amount) + parseFloat(tax_amount) - parseFloat(discount_amount));
  document.getElementById('bill_get_total_amount_'+serial_no).value = total_amount;

  bill_summation();
}
/* end bill quantity change */

/* begin bill discount rate change */
function bill_discount_rate_change(discount_rate, serial_no)
{
  if (discount_rate == '') discount_rate = 0;
  
  var rough_total_amount = document.getElementById('bill_get_item_quantity_'+serial_no).value * document.getElementById('bill_get_item_price_'+serial_no).value;

  var tax_amount = roundToTwo(document.getElementById('bill_get_tax_amount_'+serial_no).value);

  var discount_amount = roundToTwo(rough_total_amount * (discount_rate/100));
  document.getElementById('bill_get_discount_amount_'+serial_no).value = discount_amount;

  var total_amount = roundToTwo(parseFloat(rough_total_amount) + parseFloat(tax_amount) - parseFloat(discount_amount));
  document.getElementById('bill_get_total_amount_'+serial_no).value = total_amount;

  bill_summation();
}
/* end bill discount rate change */

/* begin bill discount amount change */
function bill_discount_amount_change(discount_amount, serial_no)
{
  if(discount_amount == '') discount_amount = 0;

  var rough_total_amount = document.getElementById('bill_get_item_quantity_'+serial_no).value * document.getElementById('bill_get_item_price_'+serial_no).value;

  var tax_amount = roundToTwo(document.getElementById('bill_get_tax_amount_'+serial_no).value);

  var discount_rate = roundToTwo((discount_amount / rough_total_amount) * 100);
  document.getElementById('bill_get_discount_rate_'+serial_no).value = discount_rate;

  var total_amount = roundToTwo(parseFloat(rough_total_amount) + parseFloat(tax_amount) - parseFloat(discount_amount));
  document.getElementById('bill_get_total_amount_'+serial_no).value = total_amount;

  bill_summation();
}
/* end bill discount amount change */

/* begin bill tax rate change */
function bill_tax_rate_change(tax_rate, serial_no)
{
  if (tax_rate == '') tax_rate = 0;
  
  var rough_total_amount = document.getElementById('bill_get_item_quantity_'+serial_no).value * document.getElementById('bill_get_item_price_'+serial_no).value;

  var tax_rate = tax_rate.split(' ').pop();
  var tax_amount = roundToTwo(rough_total_amount * (tax_rate/100));
  document.getElementById('bill_get_tax_amount_'+serial_no).value = tax_amount;

  var discount_amount = roundToTwo(document.getElementById('bill_get_discount_amount_'+serial_no).value);

  var total_amount = roundToTwo(parseFloat(rough_total_amount) + parseFloat(tax_amount) - parseFloat(discount_amount));
  document.getElementById('bill_get_total_amount_'+serial_no).value = total_amount;

  bill_summation();
}
/* end bill tax rate change */

/* begin bill total amount change */

function bill_total_amount_change(total_amount, serial_no)
{
  if (total_amount == '') total_amount = 0;

  var discount_rate = document.getElementById('bill_get_discount_rate_'+serial_no).value;
  var tax_rate = document.getElementById('bill_get_tax_rate_'+serial_no).value.split(' ').pop();
  var quantity = document.getElementById('bill_get_item_quantity_'+serial_no).value;

  var price_per_unit = roundToTwo(parseFloat(total_amount) / (parseFloat(quantity) * (1 - (parseFloat(discount_rate)/100) + (parseFloat(tax_rate)/100))));
  document.getElementById('bill_get_item_price_'+serial_no).value = price_per_unit;
  
  var rough_total_amount = quantity * price_per_unit;

  var tax_amount = roundToTwo(parseFloat(rough_total_amount) * (parseFloat(tax_rate) / 100));
  document.getElementById('bill_get_tax_amount_'+serial_no).value = tax_amount;

  var discount_amount =  roundToTwo(parseFloat(rough_total_amount) * (parseFloat(discount_rate) / 100));
  document.getElementById('bill_get_discount_amount_'+serial_no).value = discount_amount;

  bill_summation();
}
/* end bill total amount change */

/* begin bill unit select */
function bill_unit_select(unit_value, serial_no)
{
  var price_per_unit = 0;
  if(unit_value == 'base')
  {
    price_per_unit = roundToTwo(parseFloat(document.getElementById('bill_get_price_for_primary_unit_'+serial_no).value));
  }
  else
  {
    price_per_unit = roundToTwo(parseFloat(document.getElementById('bill_get_price_for_primary_unit_'+serial_no).value) / parseFloat(document.getElementById('bill_get_conversion_rate_'+serial_no).value));
  }
  document.getElementById('bill_get_item_price_'+serial_no).value = price_per_unit;

  var rough_total_amount = document.getElementById('bill_get_item_quantity_'+serial_no).value * price_per_unit;

  var tax_rate = document.getElementById('bill_get_tax_rate_'+serial_no).value.split(' ').pop();
  var tax_amount = roundToTwo(rough_total_amount * (tax_rate/100));
  document.getElementById('bill_get_tax_amount_'+serial_no).value = tax_amount;

  var discount_rate = roundToTwo(document.getElementById('bill_get_discount_rate_'+serial_no).value);
  var discount_amount = roundToTwo(rough_total_amount * (discount_rate/100));
  document.getElementById('bill_get_discount_amount_'+serial_no).value = discount_amount;
  
  var total_amount = roundToTwo(parseFloat(rough_total_amount) + parseFloat(tax_amount) - parseFloat(discount_amount));
  document.getElementById('bill_get_total_amount_'+serial_no).value = total_amount;

  bill_summation();
}
/* end bill unit select */

/* begin bill price change */
function bill_price_change(price_value, serial_no)
{
  if (price_value == '') price_value = 0;

  var rough_total_amount = document.getElementById('bill_get_item_quantity_'+serial_no).value * price_value;

  var tax_rate = document.getElementById('bill_get_tax_rate_'+serial_no).value.split(' ').pop();
  var tax_amount = roundToTwo(rough_total_amount * (tax_rate/100));
  document.getElementById('bill_get_tax_amount_'+serial_no).value = tax_amount;

  var discount_rate = roundToTwo(document.getElementById('bill_get_discount_rate_'+serial_no).value);
  var discount_amount = roundToTwo(rough_total_amount * (discount_rate/100));
  document.getElementById('bill_get_discount_amount_'+serial_no).value = discount_amount;
  
  var total_amount = roundToTwo(parseFloat(rough_total_amount) + parseFloat(tax_amount) - parseFloat(discount_amount));
  document.getElementById('bill_get_total_amount_'+serial_no).value = total_amount;

  bill_summation();
}
/* end bill price change */

/* begin bill summation */
function bill_summation()
{
  var total_item = 0, total_price = 0;

  for (var i = 1 ; i <= bill_item_count ; i++)
  {
    var current_row_quantity = document.getElementById('bill_get_item_quantity_'+i);
    var current_row_price = document.getElementById('bill_get_total_amount_'+i);

    if (current_row_quantity && current_row_quantity.value != '')
      total_item += parseFloat(current_row_quantity.value);
    if (current_row_price && current_row_price.value != '')
      total_price += parseFloat(current_row_price.value);
  }

  document.getElementById('bill_total_quantity').innerHTML = total_item;
  document.getElementById('bill_total_quantity_input').value = total_item;
  document.getElementById('bill_total_price').innerHTML = Math.round(total_price);
  document.getElementById('bill_total_price_input').value = Math.round(total_price);
  document.getElementById('credit_received_amount').value = Math.round(total_price);
  document.getElementById('credit_balance_amount').value = 0;
}
/* end bill summation */

/* begin received amount change */
function received_amount_change(received_amount)
{
  if (received_amount == '')
    received_amount = 0;
  var balance_amount = roundToTwo(parseFloat(document.getElementById('bill_total_price_input').value) - parseFloat(received_amount));
  document.getElementById('credit_balance_amount').value = balance_amount;
}
/* end received amount change */

/* begin bill submit */
$("#bill_submit").click(function(others) 
{
  var invoice_id_string='';
  var bill_type = document.getElementById('receipt_type').value;

  var invoice_phone_number = document.getElementById('bill_customer_phone_number').value;
  var invoice_number = document.getElementById('bill_id').value;
  var invoice_customer_id = document.getElementById('bill_customer_id_input').value;
  var invoice_date = document.getElementsByName('bill_invoice_date')[0].value;
  var invoice_total_amount = document.getElementById('bill_total_price_input').value;
  var invoice_paid_amount = document.getElementById('credit_received_amount').value;
  var invoice_payment_mode = document.getElementById('bill_payment_mode').value;

  if(invoice_phone_number=='') toastr.warning("Customer phone number cannot be empty !");
  else if(!checkMobileNumber(invoice_phone_number)) toastr.warning("Invalid phone number !");
  else if(invoice_customer_id=='') toastr.warning("Customer name cannot be empty !");
  else if(invoice_date=='') toastr.warning("invoice date cannot be empty !");
  else
  {
    if(bill_type=='sell' || bill_type=='return')
    {
      for(var i = 1 ; i <= bill_item_count ; i++)
      {
        if (!(document.getElementById('bill_get_item_id_'+i))) continue;
    
        var bill_each_item_id = document.getElementById('bill_get_item_id_'+i).value;
        var bill_each_item_color_code = document.getElementById('bill_item_color_code_'+i).value;
        var bill_each_item_hsn_code = document.getElementById('bill_get_hsn_code_'+i).value;
        var bill_each_item_quantity = document.getElementById('bill_get_item_quantity_'+i).value;
        var bill_each_item_unit_type = document.getElementById('bill_get_item_unit_'+i).value;
        var bill_each_item_price_per_unit = roundToTwo(document.getElementById('bill_get_item_price_'+i).value);
        var bill_each_item_discount_rate = roundToTwo(document.getElementById('bill_get_discount_rate_'+i).value);
        var bill_each_item_discount_amount = roundToTwo(document.getElementById('bill_get_discount_amount_'+i).value);
        var bill_each_item_tax_rate = document.getElementById('bill_get_tax_rate_'+i).value;
        var bill_each_item_tax_amount = roundToTwo(document.getElementById('bill_get_tax_amount_'+i).value);
        var bill_each_conversion_rate = document.getElementById('bill_get_conversion_rate_'+i).value;
        var bill_date = document.getElementsByName('bill_invoice_date')[0].value;
    
        invoice_id_string+=bill_each_item_id+','+bill_each_item_color_code+','+bill_each_item_quantity+','+bill_each_item_unit_type+','+bill_each_item_price_per_unit+','+bill_each_item_discount_rate+','+bill_each_item_tax_rate+';';
    
        $.ajax({
          type:"POST",
          url:"load_ajax.php",
          data:{bill_each_item_id:bill_each_item_id,bill_each_item_hsn_code:bill_each_item_hsn_code,bill_each_item_color_code:bill_each_item_color_code,bill_each_item_quantity:bill_each_item_quantity, bill_each_item_unit_type:bill_each_item_unit_type,bill_each_item_price_per_unit:bill_each_item_price_per_unit,bill_each_item_discount_rate:bill_each_item_discount_rate,bill_each_item_discount_amount:bill_each_item_discount_amount,bill_each_item_tax_rate:bill_each_item_tax_rate,bill_each_item_tax_amount:bill_each_item_tax_amount,bill_each_conversion_rate: bill_each_conversion_rate,bill_date:bill_date,bill_type:bill_type},
          success:function(data)
          {
          }
        });
      }
    }

    $.ajax({
      type:"POST",
      url:"load_ajax.php",
      data:{invoice_number:invoice_number,invoice_customer_id:invoice_customer_id,invoice_date:invoice_date,invoice_total_amount:invoice_total_amount,invoice_paid_amount:invoice_paid_amount,invoice_payment_mode:invoice_payment_mode,invoice_id_string:invoice_id_string,bill_type:bill_type},
      success:function(data)
      {
        viewIndividualInvoice(invoice_number);
      }
    });
  }
})
/* end bill submit */

/* begin bill phone number search */
$("#bill_phone_number_search").click(function(others) 
{
  if(document.getElementById('bill_customer_phone_number'))
  {
    var bill_customer_phone_number = document.getElementById('bill_customer_phone_number').value;
    $.ajax({
      type:"POST",
      url:"load_ajax.php",
      data:{bill_customer_phone_number:bill_customer_phone_number},
      success:function(data)
      {
        var array = $.parseJSON(data);
        if (array.status == 'success')
        {
          document.getElementById('bill_customer_name').value = array.customer_name;
          document.getElementById('bill_customer_id_input').value = array.customer_id;
        }
        else
        {
          document.getElementById('bill_customer_name').value = '';
          $('.customer_mobile_number').val(bill_customer_phone_number);
          $('#addCustomerDetailsModal').modal('show');
        }
      }
    });
  }
})
/* end bill phone number search */

/* begin item input conversion unit selection */
function mc(){
  $('#conversion_list_for_unit').html('');
  var x = document.getElementById("b-unit");
  var y = document.getElementById("s-unit");
  var g = document.getElementById("seen");

  document.getElementsByName('unit-b')[0].innerHTML = x.options[x.selectedIndex].text;
  document.getElementsByName('unit-s')[0].innerHTML = y.options[y.selectedIndex].text;

  var radios_base_unit_id = x.options[x.selectedIndex].value;
  var radios_secondary_unit_id = y.options[y.selectedIndex].value;
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{radios_base_unit_id:radios_base_unit_id, radios_secondary_unit_id:radios_secondary_unit_id},
    success:function(data)
    {
      var iterations=parseInt(data.split('@').pop());
      $('#conversion_list_for_unit').html(data.split('@')[0]);
      document.getElementById('conversion_list_length_for_unit').value=iterations;
      for(var i = 1 ; i <= iterations ; i++)
      {
        document.getElementsByName('unit-b')[i].innerHTML = x.options[x.selectedIndex].text;
        document.getElementsByName('unit-s')[i].innerHTML = y.options[y.selectedIndex].text;
      }
    }
  });

  if(x.value &&  y.value && x.value != y.value){ 
      g.classList.remove("no_view");
  }else{ 
      g.classList.add("no_view");
  }
}
/* end item input conversion unit selection */

$("#item_add_cvonversion_list_select").click(function(others)
{
  if(document.getElementById('c0').checked)
  {
    var conversion_rate = document.getElementById('item_input_mannual_conversion_rate').value;
    var temp = document.getElementById("b-unit");
    var base_unit_id = temp.options[temp.selectedIndex].value;
    temp = document.getElementById("s-unit");
    var secondary_unit_id = temp.options[temp.selectedIndex].value;

    $.ajax({
      type:"POST",
      url:"load_ajax.php",
      data:{base_unit_id:base_unit_id, conversion_rate:conversion_rate, secondary_unit_id:secondary_unit_id},
      success:function(data){
        var array = $.parseJSON(data);
        if(array.status=="OK")
        {
          var show_information = '1 '+array.base_unit+' = '+array.conversion_rate+' '+array.secondary_unit;
          document.getElementById('conversion_id_value').value = array.last_id;
          document.getElementById('show_units_and_conversion_rate').innerHTML = show_information;
          $('#editItemUnit').modal('hide');
        }
      }
    });   
  }
  else
  {
    var selected_choice='';
    var iterations=document.getElementById('conversion_list_length_for_unit').value;
    for(var i = 1 ; i <= iterations ; i++)
      if(document.getElementById('c'+i).checked)
        selected_choice = document.getElementById('c'+i).value;
    document.getElementById('conversion_id_value').value = selected_choice;

    var show_units_in_modal='SHOW_UNITS';
    $.ajax({
      type:"POST",
      url:"load_ajax.php",
      data:{show_units_in_modal:show_units_in_modal, show_units_conversion_id:selected_choice},
      success:function(data)
      {
        array = $.parseJSON(data);
        var show_information = '1 '+array.base_unit+' = '+array.conversion_rate+' '+array.secondary_unit;
        document.getElementById('show_units_and_conversion_rate').innerHTML = show_information;
        $('#editItemUnit').modal('hide');
      }
    });
  }
})

function credit(){
  var x = document.getElementById("credit");
  if(x.checked == true){
      document.getElementById("credit_received_label").classList.remove("no_view");
      document.getElementById("credit_received_amount").classList.remove("no_view");
      document.getElementById("credit_balance_label").classList.remove("no_view");
      document.getElementById("credit_balance_amount").classList.remove("no_view");
  }else{
      document.getElementById("credit_received_label").classList.add("no_view");
      document.getElementById("credit_received_amount").classList.add("no_view");
      document.getElementById("credit_balance_label").classList.add("no_view");
      document.getElementById("credit_balance_amount").classList.add("no_view");
  }
}

/* Begin fetch min invoice data */
function fetch_min_invoice(){
  var min_invoice_date='0';
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{min_invoice_date:min_invoice_date},
    success:function(data)
    {
      infoInvoice(data);
    }
  });
}
/* End fetch min invoice data */

/* Begin Fetch All invoice data*/
function fetch_all_invoice(){
  var all_invoice = "ALL_INVOICE";
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{all_invoice:all_invoice},
    success:function(data)
    {
      $("#display_invoice").html(data);
    }
  });
}
fetch_all_invoice();  
/* End Fetch All invoice data */

/* START DELETE invoice data*/
function deleteInvoice(invoice_date)
{
  var date = invoice_date.split(",");
  var year = date[0];
  var month = date[1];
  var day = date[2];
  var final_date = year + '-' + month + '-' + day;

  Swal.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: true
  }).then(function(result) {
      if (result.value) {
        $.ajax({
          type:"POST",
          url:"load_ajax.php",
          data:{delete_invoice_date:final_date},
          success:function(data)
          {  
            Swal.fire(
              "Deleted!",
              "Your file has been deleted.",
              "success"
          )
          fetch_all_invoice();
          fetch_min_invoice();
          }
        });
      }else if (result.dismiss === "cancel") {
          Swal.fire(
              "Cancelled",
              "Your imaginary file is safe :)",
              "error"
          )
      }
    });
}
/* END DELETE invoice data*/

/* begin view individual invoice */
function viewIndividualInvoice(id)
{
  window.location.href ="?page=invoice&id="+id;
}
/* end view individual invoice */

/* begin delete individual invoice */
function deleteIndividualInvoice(id)
{
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{delete_individual_invoice_id:id},
    success:function(data){
      array = $.parseJSON(data);
      infoInvoice(array.billing_date);
      fetch_customer_details_table(array.billing_customer_id);
    }
  });
}
/* end delete individual invoice */

/* BEGIN INFO Customer */
function infoInvoice(invoice_date)
{
  document.getElementById('invoice_date_for_search_right_invoice').value=invoice_date;

  var date = invoice_date.split(",");
  var year = date[0];
  var month = date[1];
  var day = date[2];
  var final_date = year + '-' + month + '-' + day;
  
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{invoice_info:final_date},
    success:function(data){
      $("#info_invoice").html(data); 
    }
  });
  fetch_invoice_details_table(final_date);
}
/* END INFO invoice */

/* begin fetch invoice details */
function fetch_invoice_details_table(invoice_date)
{
  var invoice_details_table = "INVOICE DETAILS";
    $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{invoice_details_table:invoice_details_table, invoice_details_table_date:invoice_date},
    success:function(data)
    {
      $("#invoice_details_table").html(data);
    }
    });
}
/* end fetch invoice details */

/* Begin fetch min party data */
function fetch_min_party(){
  var min_party_id='0';
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{min_party_id:min_party_id},
    success:function(data)
    {
      infoParty(data);
    }
  });
}
/* End fetch min party data */

/* Begin Fetch All party data*/
function fetch_all_party(){
  var all_party = "ALL_PARTY";
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{all_party:all_party},
    success:function(data)
    {
      $("#display_party").html(data);
    }
  });
}
fetch_all_party();  
/* End Fetch All party data */

/* START DELETE party data*/
function deleteParty(id)
{
  Swal.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: true
  }).then(function(result) {
      if (result.value) {
        $.ajax({
          type:"POST",
          url:"load_ajax.php",
          data:{delete_party_id:id},
          success:function(data)
          {  
            Swal.fire(
              "Deleted!",
              "Your file has been deleted.",
              "success"
          )
          fetch_all_party();
          fetch_min_party();
          }
        });
      }else if (result.dismiss === "cancel") {
          Swal.fire(
              "Cancelled",
              "Your imaginary file is safe :)",
              "error"
          )
      }
    });
}
/* END DELETE party data*/

/* Begin edit customer */
function editParty(id){
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{edit_party_id:id},
    success:function(data){
      var array = $.parseJSON(data);
      if(array.status == "success")
      {      
        $('.party_name').val(array.party_name);
        $('.party_phone_number').val(array.party_phone_number);
        $('.party_phone_number').prop('disabled', true);
        $('.party_email').val(array.party_email);
        $('.party_gst_type').val(array.party_gst_type);
        $('.party_gst_value').val(array.party_gst_value);
        $('.party_state').val(array.party_state);
        $('.party_address').val(array.party_address);
        $('.party_openning_balance').val(Math.abs(array.party_total_balance));
        if(parseFloat(array.party_total_balance) > 0)
          $("#p1").prop("checked", true);
        else 
          $('#p2').prop("checked", true);
        $('.party_creation_date').val(array.party_creation_date); 
        $('.party_id').val(array.party_id);
        $('#insert_party').val("UDATE");           
      }            
    }  
  });

  $('#addPartyDetailsModal').modal("show");	
}
/* End edit party */

/* Begin Add party */
$("#add_party").submit(function(others) 
{
  others.preventDefault();
  var party_name              = document.getElementsByName('party_name')[0].value.toUpperCase().trim();;
  var party_mobile_number     = document.getElementsByName('party_phone_number')[0].value;
  var party_email             = document.getElementsByName('party_email')[0].value;
  var party_gst_type          = document.getElementsByName('party_gst_type')[0].value;
  var party_gst_value         = document.getElementsByName('party_gst_value')[0].value;
  var party_state             = document.getElementsByName('party_state')[0].value;
  var party_address           = document.getElementsByName('party_address')[0].value;
  var party_openning_balance  = document.getElementsByName('party_openning_balance')[0].value;
  var party_total_paid_amount = 0;
  if (document.getElementById('p1').checked) {
    party_total_paid_amount = parseFloat(Math.abs(party_openning_balance));
    }
  if (document.getElementById('p2').checked) {
    party_total_paid_amount = parseFloat(Math.abs(party_openning_balance)) * (-1);
    }
  var party_creation_date = document.getElementsByName('party_creation_date')[0].value;
  var party_id = document.getElementsByName('party_id')[0].value;

  if(party_name=="") {$('.party_name').focus(); toastr.warning("Party name required");}
  else if(!checkModalMobileNumber(party_mobile_number)) {$('.party_phone_number').focus(); toastr.warning("Party phone number is invalid");}
  else if(party_address=="") {$('.party_address').focus(); toastr.warning("Party address required");}
  else if(party_creation_date=="") {$('.party_creation_date').focus(); toastr.warning("Date selection required");}
  else{
    $.ajax({
      type:"POST",
      url:"load_ajax.php",
      data:{party_name:party_name,party_mobile_number:party_mobile_number,party_email:party_email,party_gst_type:party_gst_type,party_gst_value:party_gst_value,party_state:party_state,party_address:party_address,party_total_paid_amount:party_total_paid_amount,party_creation_date:party_creation_date,party_id:party_id},
      success:function(data){
        var array = $.parseJSON(data);
        if(array.status == "success")
        {
          $('#add_party')[0].reset();
          $('#addPartyDetailsModal').modal('hide');
          fetch_all_party();

          /* BEGIN SECTION FOR ORDERING PURPOSE */
          
          party_phone_number_in_order = document.getElementById('order_party_phone_number').value;
          if (party_mobile_number == party_phone_number_in_order)
          {
            document.getElementById('order_party_name').value = party_name;
            document.getElementById('order_party_id_input').value = array.last_id;
          }
          
          /* END SECTION FOR ORDERING PURPOSE */

          toastr.success("party has been added !");
        }
        else if(array.status == "error")
        {
          $('#add_party')[0].reset();
          toastr.warning("Phone number already exists !");
        }
        else
        {
          $('#add_party')[0].reset();
          $('#addPartyDetailsModal').modal('hide');
          fetch_all_party();
          toastr.success("Party has been Updated !");
        }

        fetch_min_party();
      }
    });
  }
});
/* End Add party */

/* BEGIN INFO PARTY */
function infoParty(id)
{
  document.getElementById('party_id_for_search_right_party').value = id;
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{party_info:id},
    success:function(data){
      $("#info_party").html(data); 
    }
  });
  fetch_party_details_table(id);
}
/* END INFO PARTY */

/* begin fetch party details */
function fetch_party_details_table(id)
{
  var party_details_table = "PARTY DETAILS";
  $.ajax({
  type:"POST",
  url:"load_ajax.php",
  data:{party_details_table:party_details_table, party_details_table_id:id},
  success:function(data)
  {
    $("#party_details_table").html(data);
  }
  });
}
/* end fetch party details */

/* begin payment to party */
function payment_to_party(party_id)
{
  document.getElementById('payment_party_id').value=party_id;
  $('#partyPayment').modal('show');
}
/* end payment to party */

/* begin party payment */
$("#party_payment").submit(function(others)
{
  others.preventDefault();
  var party_billing_amount = 0, party_paid_amount = 0;

  if(document.getElementsByName('payment_billing_amount')[0])
    party_billing_amount = document.getElementsByName('payment_billing_amount')[0].value;
  if(document.getElementsByName('payment_paid_amount')[0])
    party_paid_amount = document.getElementsByName('payment_paid_amount')[0].value;

  var party_id = document.getElementsByName('payment_party_id')[0].value;

  $.ajax({
      type:"POST",
      url:"load_ajax.php",
      data:{party_billing_amount:party_billing_amount, party_paid_amount:party_paid_amount,party_id:party_id},
      success:function(data)
      {
        $('#party_payment')[0].reset();
        $('#partyPayment').modal('hide');
        fetch_all_party();
      }
    });
})
/* end party payment */

/* begin order phone number search */
$("#order_phone_number_search").click(function(others) 
{
  if(document.getElementById('order_party_phone_number'))
  {
    var order_party_phone_number = document.getElementById('order_party_phone_number').value;
    $.ajax({
      type:"POST",
      url:"load_ajax.php",
      data:{order_party_phone_number:order_party_phone_number},
      success:function(data)
      {
        var array = $.parseJSON(data);
        if (array.status == 'success')
        {
          document.getElementById('order_party_name').value = array.party_name;
          document.getElementById('order_party_id_input').value = array.party_id;
        }
        else
        {
          document.getElementById('order_party_name').value = '';
          $('.party_phone_number').val(order_party_phone_number);
          $('#addPartyDetailsModal').modal('show');
        }
      }
    });
  }
})
/* end order phone number search */

/* begin order item select */
function order_item_select(val, serial_no)
{
  item_fields_for_order = 'ITEM FIELDS';
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{item_fields_for_order:item_fields_for_order, order_item_id:val},
    success:function(data)
    {
      var array = $.parseJSON(data);
      document.getElementById('order_get_hsn_code_'+serial_no).value=array.item_hsn_sac;
      if(document.getElementById('order_get_item_quantity_'+serial_no).value=='')
        document.getElementById('order_get_item_quantity_'+serial_no).value='1';

      var unit_selection_for_order = "UNIT SELECTION";
      $.ajax({
        type:"POST",
        url:"load_ajax.php",
        data:{unit_selection_for_order:unit_selection_for_order, order_unit_selection_item_id:val},
        success:function(data)
        {
        document.getElementById('order_get_item_unit_'+serial_no).value = data;
        }
      });
      order_summation();
    }
  });
}
/* end bill item select */

/* begin order summation */
function order_summation()
{
  var total_item = 0;

  for (var i = 1 ; i <= order_item_count ; i++)
  {
    var current_row_quantity = document.getElementById('order_get_item_quantity_'+i);
    if (current_row_quantity && current_row_quantity.value != '')
      total_item += parseFloat(current_row_quantity.value);
  }

  document.getElementById('order_total_quantity').innerHTML = total_item;
}
/* end order summation */

/* begin bill submit */
$("#order_submit").click(function(others) 
{
  var order_id_string='';

  var order_mobile_number = document.getElementById('order_party_phone_number').value;
  var order_number = document.getElementById('order_id').value;
  var order_party_id = document.getElementById('order_party_id_input').value;
  var order_date = document.getElementsByName('order_invoice_date')[0].value;

  if(order_mobile_number=='') toastr.warning("Party phone number cannot be empty !");
  else if(!checkMobileNumber(order_mobile_number)) toastr.warning("Invalid phone number !");
  else if(order_party_id=='') toastr.warning("Party name cannot be empty !");
  else if(order_date=='') toastr.warning("Order date cannot be empty !");
  else
  {
    for(var i = 1 ; i <= order_item_count ; i++)
    {
      if (!(document.getElementById('order_get_item_id_'+i))) continue;
      var order_each_item_id = document.getElementById('order_get_item_id_'+i).value;
      var order_each_item_quantity = document.getElementById('order_get_item_quantity_'+i).value;
      order_id_string+=order_each_item_id+','+order_each_item_quantity+';';
    }

    $.ajax({
      type:"POST",
      url:"load_ajax.php",
      data:{order_number:order_number,order_party_id:order_party_id,order_date:order_date,order_id_string:order_id_string},
      success:function(data)
      {
        viewIndividualOrder(order_number);
      }
    }); 
  } 
})
/* end bill submit */

/* begin view individual order */
function viewIndividualOrder(id)
{
  window.location.href ="?page=order&id="+id;
}
/* end view individual order */

/* begin delete individual order */
function deleteIndividualOrder(id)
{
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{delete_individual_order_number:id},
    success:function(data){
      infoParty(data);
    }
  });
}
/* end delete individual order */

/* begin add expense */
$("#add_expense").submit(function(others)
{
  others.preventDefault();
  var expense_description = document.getElementsByName('expense_description')[0].value;
  var expense_date = document.getElementsByName('expense_date')[0].value;
  var expense_amont = document.getElementsByName('expense_amount')[0].value;
  
  $.ajax({
      type:"POST",
      url:"load_ajax.php",
      data:{expense_description:expense_description,expense_date:expense_date,expense_amont:expense_amont},
      success:function(data)
      {
        $('#add_expense')[0].reset();
        $('#expense').modal('hide');
        fetch_expense_details_table();
      }
    });
})
/* end add expense */

/* begin fetch expense details */
function fetch_expense_details_table()
{
  var get_expense_details="EXPENSE DETAILS";
  $.ajax({
    url:'load_ajax.php',
    method:'POST',
    data:{get_expense_details:get_expense_details},
    success:function(data)
    {
      $('#display_expense').html(data);
    }
  });
}
/* end fetch expense details */

/* begin delete expense */
function deleteExpense(id)
{
  $.ajax({
    type:"POST",
    url:"load_ajax.php",
    data:{delete_expense_id:id},
    success:function(data)
    {
      fetch_expense_details_table();
    }
  });
}
/* end delete expense */

/*================CHECK SIGN UP MOBILE NUMBER ==================*/
function checkMobileNumber()
{
var sign_up_mobile_num ='';

if(document.getElementById('bill_customer_phone_number'))
  sign_up_mobile_num = document.getElementById('bill_customer_phone_number').value.trim();
else if(document.getElementById('order_party_phone_number'))
  sign_up_mobile_num = document.getElementById('order_party_phone_number').value.trim(); 

if(sign_up_mobile_num === '')
  return false;
else if (!isMobile(sign_up_mobile_num))
  return false;
else
  return true;
}
 function isMobile(mobile) {
   return /^[0-9]\d{9}$/.test(mobile);
 }

function checkModalMobileNumber(mobile_number)
{
if(mobile_number === '')
  return false;
else if (!isMobile(mobile_number))
  return false;
else
  return true;
}
/*================CHECK SIGN UP MOBILE NUMBER ==================*/
