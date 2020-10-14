<?php

    function log_message_text($userName, $str_Message){
        $logmessage =  '[' . date('Y-m-d h:i:s') .' '.$userName.'] '. $str_Message . "\n";
        error_log($logmessage, 3,  './errores.log');
    }

?>