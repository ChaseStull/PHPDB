<?php
    function newdb($type, $name, $location)
    {
        switch($type)
        {
            case "userAccountSystem":
            $fileLoc = $location."/".$name.".json";
            $db = fopen($fileLoc, "w");
            $uas = array($name, "uas");
            $enc = json_encode($uas);
            fwrite($db, $enc);
            fclose($db);
            break;
            case "custom":
            $fileLoc = $location."/".$name.".json";
            $db = fopen($fileLoc, "w");
            $custom = array($name, "custom");
            $enc = json_encode($custom);
            fwrite($db, $enc);
            fclose($db);
        }
    }
?>