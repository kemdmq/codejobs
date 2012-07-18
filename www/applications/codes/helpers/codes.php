<?php
if(!defined("_access")) {
	die("Error: You don't have permission to access here...");
}

function getFilesByMIME($mimes) {
    $files = array();
    // Aún faltan definir más MIMEs
    foreach ($mimes as $mime) {
        switch ($mime) {
            case "text/javascript": case "application/json":
                $files[] = "javascript";
                break;
            case "application/x-httpd-php":
                $files[] = "xml";
                $files[] = "css";
                $files[] = "javascript";
            case "text/x-php":
                $files[] = "clike";
                $files[] = "php";
                break;
        }
    }

    return $files;
}

?>
