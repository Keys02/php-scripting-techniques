<?php
    // || - is the or logical operator ie it checks if one of the operand is true if so the whole expression evaluates to true

    /*
        If the Maker directory is not created the whole expression would shortcircuit leading to the creation of that directory ie the second operator. However the directory doesn't get created if it is already created.
    */
    $directory = 'Maker';
    is_dir($directory) || mkdir($diretory);