<?php

$curl = curl_init( 'https://bmis1.buildingmgt.gov.hk/bd_hadbiex/content/searchbuilding/building_search.jsf?renderedValue=true' );
curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $curl, CURLOPT_POST, true );

curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, true );
curl_setopt( $curl, CURLOPT_MAXREDIRS, 10 );

curl_setopt( $curl, CURLOPT_HTTPHEADER, [
    'Accept:*/*',
    'User-Agent:Mozilla/5.0 (Windows NT 10.0; …) Gecko/20100101 Firefox/56.0',
    'Accept:text/html,application/xhtml+xm…plication/xml;q=0.9,*/*;q=0.8',
    'Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3',
    'Accept-Encoding:gzip, deflate, br',
    'Referer:https://bmis1.buildingmgt.gov.…search.jsf?renderedValue=true',
    'Cookie:JSESSIONID=f-6rb0Cz8VBhx3xzAm8…ash.RENDERMAP.TOKEN=lxxx4poi2',
    'Connection:keep-alive',
    'Upgrade-Insecure-Requests: 1',
    'Cache-Control: max-age=0',
//  'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linu…) Gecko/20100101 Firefox/56.0',
//  'Referer: http://www.mak.lutsk.ua/guest',
//  'Cookie: PHPSESSID=c5391g2halof71akjjgmfhnqt3',
] );

$out = curl_exec( $curl );
curl_close( $curl );

echo '<pre>';
print_r( json_decode( $out, true ) );
echo '</pre>';

