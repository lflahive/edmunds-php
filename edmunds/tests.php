<?php
/**
 * Author: lflahive
 */

require_once('edmunds.php');

$edmunds = new Edmunds('YOUR API KEY');

assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_QUIET_EVAL, 1);

function assert_handler($file, $line, $code, $desc = null)
{
    echo "Assertion failed at $file:$line: $code";
    if ($desc) {
        echo ": $desc";
    }
    echo "\n";
}

assert_options(ASSERT_CALLBACK, 'assert_handler');

assert($edmunds->make_call('') == null);
assert($edmunds->make_call('ERROR') == null);
assert(array_key_exists('makesCount', $edmunds->make_call('/api/vehicle/v2/makes/count')));