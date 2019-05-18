<?php
try
{
    $pdo = new PDO(
        'mysql:host=localhost;dbname=st411',
        'st411',
        'E6t9B7g5'    
    );
}
catch (PDOException $e)
{
//    if( $_SERVER[ 'HTTP_USER_AGENT' ] === '')
//    {
//        echo '<pre>';
//        print_r($e);
//        echo '<pre>';
//        exit( 'Stoped: <b>' . mf_get_spath(1). '</b>');
//    }    
    exit( 'Подключение не удалось: ' . $e -> getMessage() );
}




