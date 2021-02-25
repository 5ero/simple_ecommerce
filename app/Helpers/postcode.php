<?php
namespace App\Helpers;


class Postcode {

	public static function FormatPostcode( $postcode ) {

		return substr_replace(strtoupper($postcode), ' ', -3, -4);
			
	}

}
