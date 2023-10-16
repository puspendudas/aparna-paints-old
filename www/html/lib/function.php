<?php

    function link_head(){
        // Adding Header link
        include("lib/config.php");
        include("lib/head.php");
        include("lib/modal.php");
    }
    
    function script_footer(){
        // Adding script
    include("lib/script.php");
    }

    function more(){
        include("lib/more_option.php");
    }

    function user(){
         include("partials/_extras/dropdown/user.php");
    }

    function setData ($tableName, $customer_data)
    {
        $query = "INSERT INTO ".$tableName." (";
        $query.= implode (",", array_keys ($customer_data)).") VALUES (";
        $query.= "'".implode ("','", array_values ($customer_data))."')";
        return($query);  
    }
    function dalData ($tableName, $customer_data)
    {
        $query = "DELETE FROM ".$tableName." WHERE ";
        $query.=array_keys ($customer_data)[0]." =";
        $query.="'".array_values ($customer_data)[0]."'";
        return($query); 
    }

    function updateData($id, $customer_data, $tableName)
    {
        $sIDColumn  = key($id);
        $sIDValue   = current($id);

        array_walk($customer_data, function(&$value, $key){
            $value = "{$key} = '{$value}'";
        });
        $sUpdate = implode(", ", array_values($customer_data));

        $query="UPDATE {$tableName} SET {$sUpdate} WHERE {$sIDColumn} = '{$sIDValue}'";
        return($query);
    }
    
    
?>