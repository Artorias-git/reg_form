<?php
    if (getenv('REQUEST_METHOD') === 'POST') {
        $filename = '';
        
        foreach ($_POST as &$value){
                $filename ="applications/" . $value;
                if (file_exists($filename)){
                    unlink($filename);
                    header("Refresh:0");
                }
        }
    }
?>