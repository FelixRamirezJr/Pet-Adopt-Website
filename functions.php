<?php
/*
 * function check_input() uses the php strim() function to strip unnecessary
 * characters like extra space, tab...
 * check_input() also uses the php function stripslashes() to remove backslashes
 */

function sanitize_user_input($user_input) {
    $user_input = trim($user_input);
    $user_input = stripslashes($user_input);
    /* $user_input = htmlspecialchars($user_input); */
    return $user_input;
}

