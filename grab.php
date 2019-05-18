<?php

$url = 'http://shop.nashkraj.ua/uk/catalog/specialoffer/2.html';

$product = [];

$page = mb_convert_encoding( file_get_contents( $url ), 'HTML-ENTITIES', "UTF-8" );

$doc  = new \DOMDocument( );
@$doc -> loadHTML( $page );

$xpath      = new \DOMXPath( $doc );

$category = @$xpath -> query( '//p[@itemprop="description"]' );
