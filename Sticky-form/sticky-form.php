<?php
    /* Always keep track of the last entered values in the form */
    $is_submitted = ($_SERVER['REQUEST_METHOD'] === 'POST');
    $is_valid = true;
    $first_name = '';

    if ($is_submitted) {
        $first_name = filter_input(INPUT_POST, 'first-name');

        if (strlen($first_name) < 3) {
            $is_valid = false;
            $error_message = 'invalid - name must contain at least 3 letters';
        }
    }

    if ($is_submitted && $is_valid) {
        print "Hello $first_name";
        exit();
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tiny stick postback form</title>
        <style>.error {
            background-color: pink; 
            padding: 1rem; 
            margin-bottom: .5em;        
            }
        </style>
    </head>
    <body>
        <form method='post'>
            <?php if ($is_submitted && !$is_valid):  ?>
                <div class='error'><?= $error_message ?></div>
            <?php endif; ?>

            <input name='first-name' value='<?= $first_name ?>'>
            <input type='submit'>
        </form>
    </body>
</html>