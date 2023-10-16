/* Begin Add Customer */
$("#kt_login_signup_form").submit(function(others) 
{
  others.preventDefault();
  var user_f_name              = document.getElementById('user_f_name').value.toUpperCase().trim();
  var user_l_name              = document.getElementById('user_l_name').value.toUpperCase().trim();
  var user_mobile_number       = document.getElementById('user_mobile_number').value;
  var user_password            = document.getElementById('user_password').value;
  var user_add1                = document.getElementById('user_add1').value;
  var user_add2                = document.getElementById('user_add2').value;
  var user_pin                 = document.getElementById('user_pin').value;
  var user_city                = document.getElementById('user_city').value;
  var user_state               = document.getElementById('user_state').value;
  var user_contry              = document.getElementById('user_contry').value;
  var user_shopname            = document.getElementById('user_shopname').value;
  var user_gst                 = document.getElementById('user_gst').value;

  $.ajax({
    type:"POST",
    url:"lajax.php",
    data:{user_f_name:user_f_name,user_l_name:user_l_name,user_mobile_number:user_mobile_number,user_password:user_password,user_add1:user_add1,user_add2:user_add2,user_pin:user_pin,user_city:user_city,user_state:user_state,user_contry:user_contry,user_shopname:user_shopname,user_gst:user_gst},
    success:function(data){
      if(data == "success")
      {
        toastr.success("User has been added !");
        window.location="otp.php";
      }
      else
      {
        toastr.error("User Already Register !");
        window.location="signin.php";
      }
    }
  });
});

/* End Add Customer */


function checkotp() 
{
  var mobile = document.getElementById('mobile').innerHTML;

  var otp  = document.getElementById('otp').value;

  $.ajax({
    type:"POST",
    url:"lajax.php",
    data:{otp:otp,mobile:mobile},
    success:function(data){
      if(data=='{"message":"OTP not match","type":"error"}')
      {
        toastr.error("OTP Not Match!");
      }
      else if(data=='{"message":"Mobile no. already verified","type":"error"}')
      {
        toastr.error("Mobile Number Already Verified");
      }
      else if(data=='{"message":"Otp empty or not numeric","type":"error"}')
      {
        toastr.error("Otp empty or not numeric");
      }
      else if(data=='{"message":"Mobile no. empty or not numeric","type":"error"}')
      {
        toastr.error("Mobile no. empty or not numeric");
      }
      else if(data=='{"message":"Mobile no. not found","type":"error"}')
      {
        toastr.error("Mobile no. not found");
      }
      else if(data=='{"message":"OTP request invalid","type":"error"}')
      {
        toastr.error("OTP request invalid");
      }
      else if(data=='{"message":"OTP expired","type":"error"}')
      {
        toastr.error("OTP Expired");
      }
      else if(data=='{"message":"Max limit reached for this otp verification","type":"error"}')
      {
        toastr.error("Max limit reached for this otp verification");
      }
      else if(data=='{"message":"OTP verified success","type":"success"}')
      {
        $.ajax({
          type:"POST",
          url:"lajax.php",
          data:{old_mobile:mobile},
          success:function(data){
            if(data == 'update'){
              window.location="../../index.php";
            }
          }
        });
        
      }
    }
  });
}


/* Begin Add Customer */
$("#login_form").submit(function(others) 
{
  others.preventDefault();
  var user_f_name              = document.getElementById('user_f_name').value.toUpperCase().trim();;
  var user_l_name              = document.getElementById('user_l_name').value.toUpperCase().trim();;

  $.ajax({
    type:"POST",
    url:"lajax.php",
    data:{user_f_name:user_f_name,user_l_name:user_l_name,user_mobile_number:user_mobile_number,user_password:user_password,user_add1:user_add1,user_add2:user_add2,user_pin:user_pin,user_city:user_city,user_state:user_state,user_contry:user_contry,user_shopname:user_shopname,user_gst:user_gst},
    success:function(data){
      if(data == "success")
      {
        toastr.success("User has been added !");
        window.location="otp.php";
      }
      else
      {
        toastr.error("User Already Register !");
        window.location="signin.php";
      }
    }
  });
});

/* End Add Customer */

function userdata(){

    var log_pass
    var user_phone_number = "PHONE";
    $.ajax({
        type:"POST",
        url:"lajax.php",
        data:{user_phone_number:user_phone_number},
        success:function(data){
            array = $.parseJSON(data);
          if(array.user_phone != null)
          {
            document.getElementById('mobile').value=array.user_phone;
            document.getElementById('mobile').innerHTML=array.user_phone;
            log_pass = array.user_password;
          }
          else if(array.user_phone == null)
          {
            toastr.error("Please Register");
            window.location="signup.php";
          }
        }

      });

}

function c_pass(){
    var pass = document.getElementById('password').value;
    var user_mobile = document.getElementById('mobile').value;
    $.ajax({
        type:"POST",
        url:"lajax.php",
        data:{user_mobile:user_mobile,pass:pass},
        success:function(data){
          if(data == 'success'){
            window.location="../../index.php";
          }else if(data == 'otpsnd'){
            window.location="otp.php";
          }else if(data == 'fail'){
            toastr.error("Wrong Password");
          }
        }

      });

  }

  function all_data()
  {
    
  var user_f_name              = document.getElementById('user_f_name').value.toUpperCase().trim();
  var user_l_name              = document.getElementById('user_l_name').value.toUpperCase().trim();
  var user_mobile_number       = document.getElementById('user_mobile_number').value;
  var user_password            = document.getElementById('user_password').value;
  var user_add1                = document.getElementById('user_add1').value.toUpperCase().trim();;
  var user_add2                = document.getElementById('user_add2').value.toUpperCase().trim();;
  var user_pin                 = document.getElementById('user_pin').value.toUpperCase().trim();;
  var user_city                = document.getElementById('user_city').value.toUpperCase().trim();;
  var user_state               = document.getElementById('user_state').value.toUpperCase().trim();;
  var user_contry              = document.getElementById('user_contry').value.toUpperCase().trim();;
  var user_shopname            = document.getElementById('user_shopname').value.toUpperCase().trim();;
  var user_gst                 = document.getElementById('user_gst').value.toUpperCase().trim();;

  document.getElementById('log_name').innerHTML=user_f_name+" "+user_l_name;
  document.getElementById('log_phone').innerHTML=user_mobile_number;
  document.getElementById('log_add1').innerHTML=user_add1;
  document.getElementById('log_add2').innerHTML=user_add2;
  document.getElementById('log_add').innerHTML=user_contry+","+user_state+","+user_city+","+user_pin;


  document.getElementById('this_shop').innerHTML=user_shopname;
  document.getElementById('this_gst').innerHTML=user_gst;


  }