<?php namespace App\MyCore\Outside\Helpers;

class StringShort {
    public static function substr($string = '', $len = 100) {
        $string = strip_tags($string);
        $charset = 'UTF-8';
        $string = html_entity_decode ( $string, ENT_QUOTES, $charset );

        if (mb_strlen ( $string, $charset ) > $len) {
            $strings = explode ( ' ', $string );
            $string = mb_substr ( $string, 0, $len, $charset );
            $stringShort = explode ( ' ', $string );
            $last = $strings [count ( $stringShort ) - 1];
            unset ( $strings );
            if (strcasecmp ( $stringShort [count ( $stringShort ) - 1], $last )) {
                unset ( $stringShort [count ( $stringShort ) - 1] );
            }
            return implode ( ' ', $stringShort ) . '...';
        }
        return $string;
    }
}