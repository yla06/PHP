<?php
$im = imagecreatetruecolor( 100, 50 );

$color = imagecolorallocate( $im, rand(200,255), rand(200,255), rand(200,255) );

imagefill( $im, 0, 0, $color );

for($i=0, $j=15; $i<5; $i++, $j+=15){
    imageString( $im, 5, ($j + rand(-5, 5)), (18 + rand(-8, 8)), rand(1, 9), imageColorAllocate( $im,  rand(0,100), rand(0,100), rand(0,100)  ));
}

for($i=1; $i<200; $i++){
    imageSetPixel( $im, rand(0,100), rand(0,50), imageColorAllocate( $im, rand(0,255), rand(0,255), rand(0,255)  ));
}

for($i=1; $i<=10; $i++){
    if(rand(0,1))
        imageLine( $im, rand(0,100), rand(0,50), rand(0,100), rand(0,50), imageColorAllocate( $im, rand(100,255), rand(100,255), rand(100,255) ) );
    else 
        imageDashedLine( $im,  $x = rand(0,100), $y = rand(0,50), $x  + rand(0,10), $y + rand(0,10),  imageColorAllocate( $im, rand(0,255), rand(0,255), rand(0,255)  ) );
}

imageDashedLine( $im, rand(0,100), rand(0,50), rand(0,100), rand(0,50),  imageColorAllocate( $im, rand(0,255), rand(0,255), rand(0,255)  ) );
imageSetThickness( $im, 1 );
//imagePolygon($im, [rand(0,100), rand(0,50), rand(0,100), rand(0,50), rand(0,100), rand(0,50), rand(0,100), rand(0,50), rand(0,100), rand(0,50),], 5, imageColorAllocate( $im, rand(100,255), rand(100,255), rand(100,255)   ));

$ap = [];
        
for( $i=0; $i<10; $i++){
   $ap[] = rand(0, 100);
   $ap[] = rand(0, 50);
}
imagePolygon($im, $ap, rand(3, 10), imageColorAllocate( $im, rand(100,255), rand(100,255), rand(100,255)   ));

header( 'Content-Type: image/jpeg' );
imagejpeg( $im );

exit;
