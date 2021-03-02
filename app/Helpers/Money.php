<?php 

namespace App\Helpers;

class Money {

    // Returns a value as money or DOUBLE e.g 10 will become 10.00
    public static function format_money($value)
    {
        return number_format($value, 2);
    }

    // Returns the VAT amount for a given value
    public static function vat($value)
    {
        $vat = ($value / 100) * config('money.vat_rate');
        return  Self::format_money($vat);
    }

    // Returns the total amount including VAT
    public static function total($value)
    {
        $vat = Self::vat($value);
        $total = Self::format_money($value-$vat);
        return $total;
    }

    

}