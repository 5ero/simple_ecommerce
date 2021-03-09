<?php

namespace App\Helpers;

class Money {

    public static function money($value)
    {
        return number_format($value, 2);
    }

    //Return the amount VAT on a given value
    public static function vat($value)
    {
        $vat = 20; //VAT rate
        $total = ($value / 100) * $vat;
        return number_format($total, 2, '.', '');
    }


    //Return the total order value including VAT
    public static function total($value)
    {
        $vat = Self::vat($value);
        $total = $value+$vat;
        return number_format($total, 2); 
    }
}