<?php //Routing Control
if ($_SESSION['phone'] != null) {
    if ($_GET) {
        if ($_GET['page'] == null) {
            $route = 'partials/_content';
            $heading = 'Dashboard';
            $hide = 'false';
        } elseif ($_GET['page'] == 'puspendu') {
            $route = 'pages/' . $_GET['page'];
            $heading = 'Demo';
            $hide = 'true';
        } elseif ($_GET['page'] == 'subhamsaha') {
            $route = 'pages/' . $_GET['page'];
            $heading = 'Demo';
            $hide = 'true';
        } elseif ($_GET['page'] == 'party') {
            $route = 'pages/' . $_GET['page'];
            $heading = 'Parties';
            $hide = 'true';
        } elseif ($_GET['page'] == 'customer') {
            $route = 'pages/' . $_GET['page'];
            $heading = 'Customer';
            $hide = 'true';
        } elseif ($_GET['page'] == 'item') {
            $route = 'pages/' . $_GET['page'];
            $heading = 'Items';
            $hide = 'true';
        } elseif ($_GET['page'] == 'category') {
            $route = 'pages/' . $_GET['page'];
            $heading = 'Category';
            $hide = 'true';
        } elseif ($_GET['page'] == 'unit') {
            $route = 'pages/' . $_GET['page'];
            $heading = 'Unit';
            $hide = 'true';
        } elseif ($_GET['page'] == 'all-sell-invoice') {
            $route = 'pages/' . $_GET['page'];
            $heading = 'All Sell Invoice';
            $hide = 'true';
        } elseif ($_GET['page'] == 'add-invoice') {
            $route = 'pages/' . $_GET['page'];
            $heading ='';
            if ($_GET['receipt_type']=='sell') {
                $heading = 'Add Sell Invoice';
            }
            if ($_GET['receipt_type']=='payment') {
                $heading = 'Add Payment Receipt';
            }
            if ($_GET['receipt_type']=='return') {
                $heading = 'Add Return';
            }
            $hide = 'true';
        } elseif ($_GET['page'] == 'add-order') {
            $route = 'pages/' . $_GET['page'];
            $heading = 'Add Order';
            $hide = 'true';
        } elseif ($_GET['page'] == 'invoice') {
            $route = 'pages/' . $_GET['page'];
            $heading = 'Invoice';
            $hide = 'true';
        } elseif ($_GET['page'] == 'order') {
            $route = 'pages/' . $_GET['page'];
            $heading = 'Order';
            $hide = 'true';
        } elseif ($_GET['page'] == 'expense') {
            $route = 'pages/' . $_GET['page'];
            $heading = 'Order';
            $hide = 'true';
        }
    } else {
        $route = 'partials/_content';
        $heading = 'Dashboard';
        $hide = 'false';
    }
}else{
    header("location:pages/login/signin.php");
}
?>