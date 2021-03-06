<?php
    //Gets an array from a previously opened file handle
    function get_array_from_handle($handle)
    {
        $contents = fread($handle, filesize($handle));
        $array = json_decode($contents, false, filesize($handle));
        return $array;
    }
    function get_array_from_handle($handle, $with_keys)
    {
        $contents = fread($handle, filesize($handle));
        $array = json_decode($contents, $with_keys, filesize($handle));
        return $array;
    }
    function get_array_from_handle($handle, $with_keys, $close_handle)
    {
        $contents = fread($handle, filesize($handle));
        $array = json_decode($contents, $with_keys, filesize($handle));
        if($close_handle)
        {
            fclose($handle);
        }
        return $array;
    }
    //Creates a new database file
    function newdb($type, $name, $location)
    {
        switch($type)
        {
            case "userAccountSystem", "UAS":
            $fileLoc = $location."/".$name.".phpdb";
            $db = fopen($fileLoc, "w");
            $uas = array($name, "uas");
            $enc = json_encode($uas);
            fwrite($db, $enc);
            fclose($db);
            break;
            case "custom":
            $fileLoc = $location."/".$name.".phpdb";
            $db = fopen($fileLoc, "w");
            $custom = array($name, "custom");
            $enc = json_encode($custom);
            fwrite($db, $enc);
            fclose($db);
        }
    }
?>
