<?php

namespace App\Helpers;

class HandleResponse {

	public static function error( $message = 'error', $code = 200 ) {

		$error = true;

		return response()->json( compact( 'error', 'message' ), $code );

	}

	public static function success( $data = [], $message = 'success', $code = 200 ) {

		$error = false;

		return response()->json( compact( 'error', 'message', 'data' ), $code );

	}

}