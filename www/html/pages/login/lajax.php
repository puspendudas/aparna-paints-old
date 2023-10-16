<?php
include("../../lib/config.php");
include("../../lib/function.php");
if(isset($_POST['user_f_name'])){
    date_default_timezone_set("Asia/Kolkata");
    $user_creation_timestamp = date('Y-m-d H:i:s');
    $login = array(
        'user_f_name'                       => $_POST['user_f_name'],
        'user_l_name'                       => $_POST['user_l_name'],
        'user_phone'                        => $_POST['user_mobile_number'],
        'user_password'                     => md5($_POST['user_password']),
        'user_status'                       => 0,
        'user_add_1'                        => $_POST['user_add1'],
        'user_add_2'                        => $_POST['user_add2'],
        'user_pin'                          => $_POST['user_pin'],
        'user_city'                         => $_POST['user_city'],
        'user_state'                        => $_POST['user_state'],
        'user_contry'                       => $_POST['user_contry'],
        'user_shop_name'                    => $_POST['user_shopname'],
        'user_gst'                          => $_POST['user_gst'],
        'user_creation_timestamp'           => $user_creation_timestamp
    );
     //Your authentication key
    $authKey = "322488A7jIyCrEuK5fff2dc0P1";
    //Sender ID,While using route4 sender id should be 6 characters long.
    $senderId = "FINTRK";

    $add_user_query = setData("user", $login);
    if($con->query("SELECT * FROM `user`")->num_rows == 0){
        $con->query($add_user_query);

        $message = 'Welcome to FinTrack. Your Registration OTP is ##OTP## .';

        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $_POST['user_mobile_number'],
            'message' => $message,
            'sender' => $senderId,
        );

        $url="http://control.msg91.com/api/sendotp.php";

        $ch = curl_init($url);
            curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));


        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        //get response
        $output = curl_exec($ch);

        //Print error if any
        /*if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }*/

        curl_close($ch);

        echo "success";
    }else{
        echo "fail";
    }
}

if((isset($_POST['otp'])) && (isset($_POST['mobile']))){

     //Your authentication key
    $authKey = "322488A7jIyCrEuK5fff2dc0P1";
    //Sender ID,While using route4 sender id should be 6 characters long.
    $senderId = "FINTRK";

    $mobileNumber = $_POST['mobile'];
    $otpverify    = $_POST['otp'];

    
   $url ="https://api.msg91.com/api/v5/otp/verify?mobile=$mobileNumber&otp=$otpverify&authkey=$authKey";

   $ch = curl_init($url);
            curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded"
        ),
    ));


    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


    //get response
    $output = curl_exec($ch);

    //Print error if any
    if(curl_errno($ch))
    {
    echo 'error:' . curl_error($ch);
    }

    curl_close($ch);

    

    echo $output;
    
   
}

if((isset($_POST['user_phone_number']))){
    $user_details = $con->query("SELECT * FROM `user`")->fetch_array(MYSQLI_BOTH);
    echo json_encode(array('user_phone' => $user_details['user_phone'], 'user_password' => $user_details['user_password']));
}


if((isset($_POST['old_mobile'])))
{
    if($con->query("UPDATE `user` SET `user_status` = '1' WHERE `user_phone` = '$_POST[old_mobile]'"))
    {
        echo"update";
    }
}


if(isset($_POST['user_mobile'])){
    $cheack = array(
        'user_phone' => $_POST['user_mobile'],
        'user_password' => md5($_POST['pass'])
    );

    $user_cheack_details = $con->query("SELECT * FROM `user` WHERE `user_phone` = '$_POST[user_mobile]'")->fetch_array(MYSQLI_BOTH);

    if($user_cheack_details['user_password'] == md5($_POST['pass']) ){

        if($user_cheack_details['user_status'] == 1){

            $_SESSION['phone'] = $user_cheack_details['user_phone'];
            echo "success";
        }
        elseif($user_cheack_details['user_status'] == 0){

        //Your authentication key
        $authKey = "322488A7jIyCrEuK5fff2dc0P1";
        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "FINTRK";


        $message = 'Welcome to FinTrack. Your Registration OTP is ##OTP## .';

        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $user_cheack_details['user_phone'],
            'message' => $message,
            'sender' => $senderId,
        );

        $url="http://control.msg91.com/api/sendotp.php";

        $ch = curl_init($url);
            curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));


        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        //get response
        $output = curl_exec($ch);

        //Print error if any
        /*if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }*/

        curl_close($ch);

        echo "otpsnd";

        }
        
    }else{
        echo "fail";
    }
}
?>