<?php    
    function isAnEmptyNonZeroString($form_input) : bool {
        if($form_input === '0') { return false; }
        return empty($form_input);
    }