<?php
namespace App\_Helpers;

class ColorConvert
{  
    /**
     * hex2rgb
     *
     * How to use
     * $rgb2hex = new ColorConvert();
     * $rgb2hex->hex2rgb( '#cc0' );
     * 
     * @param  string $hex
     * @return Array returns an array with the rgb values
     */
    public function hex2rgb($hex): array
    {
       $hex = str_replace("#", "", $hex);

       if(strlen($hex) == 3) {
          $r = hexdec(substr($hex,0,1).substr($hex,0,1));
          $g = hexdec(substr($hex,1,1).substr($hex,1,1));
          $b = hexdec(substr($hex,2,1).substr($hex,2,1));
       } else {
          $r = hexdec(substr($hex,0,2));
          $g = hexdec(substr($hex,2,2));
          $b = hexdec(substr($hex,4,2));
       }
       $rgb = array($r, $g, $b);

       return $rgb;
    }

    /**
     * rgb2hex
     *
     * How to use
     * $rgb2hex = new ColorConvert();
     * $rgb = array( 255, 255, 255 );
     * $rgb2hex->rgb2hex( $rgb );
     * 
     * @param  array $rgb       array de 3 posições. Ex: [255,255,255]
     * @return String returns   the hex value including the number sign (#)
     */
    public function rgb2hex($rgb): string
    {
       $hex = "#";
       $hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
       $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
       $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);

       return $hex;
    }
}
