<?php

class util {

    var $Void = "";
    var $SP = " ";
    var $Dot = ".";
    var $Zero = "0";
    var $Neg = "Menos";

    function __construct() {
        
    }

    function limpia_dato($val, $cant_caracteres = '') {
        if (!empty($cant_caracteres))
            $val = addslashes(trim(substr($val, 0, $cant_caracteres)));
        else
            $val = addslashes(trim($val));


        $val = str_replace("'", "", $val);
        $val = str_replace("\"", "", $val);
        $val = str_replace("(", "", $val);
        $val = str_replace(")", "", $val);
        $val = str_replace("&", "", $val);
        $val = str_replace("|", "", $val);
        $val = str_replace("<", "", $val);
        $val = str_replace(">", "", $val);
        $val = str_replace("--", "", $val);
        $val = str_replace("ñ", "Ñ", $val);
        $val = str_replace("Ñ", "Ñ", $val);
        $val = str_replace("à", "a", $val);
        $val = str_replace("À", "A", $val);
        $val = str_replace("á", "a", $val);
        $val = str_replace("Á", "A", $val);
        $val = str_replace("é", "e", $val);
        $val = str_replace("É", "E", $val);
        $val = str_replace("í", "i", $val);
        $val = str_replace("Í", "I", $val);
        $val = str_replace("ó", "o", $val);
        $val = str_replace("Ó", "O", $val);
        $val = str_replace("ú", "u", $val);
        $val = str_replace("Ú", "U", $val);
        $val = str_replace('"', "", $val);


        return $val;
    }
    
    
    function limpia_dato_miles($val, $cant_caracteres = '') {
        if (!empty($cant_caracteres))
            $val = addslashes(trim(substr($val, 0, $cant_caracteres)));
        else
            $val = addslashes(trim($val));
        $val = str_replace(".", "", $val);
        return $val;
    }

}
