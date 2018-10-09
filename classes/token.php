<?php 
class Token {
	public static function generate($tokenName) {
		return Session::put($tokenName, base64_encode(openssl_random_pseudo_bytes(32)));
	}

	public static function check($token, $tokenName) {
		if(Session::exists($tokenName) && $token === Session::get($tokenName)) {
			Session::delete($tokenName);
			return true;
		}

		return false;
	}
}