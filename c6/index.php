<?php

$email = 'asdasdasd@asdasd.asdasd';

print_r(
	filter_var( $email, FILTER_VALIDATE_EMAIL)
);

echo '<br>';

$integer = 123;

print_r(
	filter_var( $integer , FILTER_VALIDATE_INT)
);

echo '<br>';

$ip = '127.0.0.255';

print_r(
	filter_var( $ip, FILTER_VALIDATE_IP, FILTER_NULL_ON_FAILURE )
);

echo '<br>';

$email = 'nenohotmail.com';
$pattern = '/[a-z]+@[a-z]+.[a-z]+/';

print_r(preg_match($pattern, $email));


ini_set( 'max_execution_time' , 0 );

ini_get( 'max_execution_time');