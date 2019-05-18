<?php


echo 'A';

echo '<pre>';
print_r( $_COOKIE );
echo '</pre>';

$city_id = ( isset( $_COOKIE[ 'city_id' ] ) and is_string( $_COOKIE[ 'city_id' ] ) ) ? $_COOKIE[ 'city_id' ] : 0;

echo '<pre>';
print_r($city_id);
echo '</pre>';

//'hash_bits_per_character' => 6, //27 - 0-9, a-z, A-Z, "-", ","
//'hash_function'           => 1, //sha-1
//'use_trans_sid'           => 0,
//'use_cookies'             => 1,
//'use_only_cookies'        => 1,
//'name'                    => 'sid',
//'gc_maxlifetime'          => 60*60*24*365,
//'cookie_lifetime'         => 60*60*24*365,

ini_set( "session.cookie_lifetime", 60*15 );
ini_set( "session.gc_maxlifetime", 60*15 );
ini_set( "session.name", 'sid7' );
ini_set( "session.hash_bits_per_character", 6 );
ini_set( "session.use_cookies", 0 );
ini_set( "session.use_only_cookies", 0 );
ini_set( "session.use_trans_sid", 0 );
session_start();

echo '<pre>';
print_r( session_id() );
echo '</pre>';

//$_SESSION['foo'] = 'hello';
//$_SESSION['bar'] = 123;
//
//
//
//$_SESSION['auth'] = true;
//$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
//$_SESSION['ua'] = $_SERVER['HTTP_USER_AGENT'];
//
//
//
//if ( isset( $_SESSION['auth'], $_SESSION['ua'], $_SESSION['ip'] )
//  and $_SESSION['ua'] == $_SERVER['HTTP_USER_AGENT']
//  and $_SESSION['ip'] == $_SERVER['REMOTE_ADDR']
//)
//{
//  //
//}
//else
//  session_destroy( );
/*
session_start();

print_r(session_id());

$_SESSION['foo']='hello';
*/
