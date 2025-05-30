<?php    
    function isAnEmptyNonZeroString($form_input) : bool {
        if(intval($form_input) === '0') { return false; }
        return empty($form_input);
    }