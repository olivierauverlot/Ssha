<?php
	class Ssha {
		// return the crypted value of the password
		public function crypt($password) {
			mt_srand((double)microtime()*1000000);
  			$salt = pack("CCCC", mt_rand(), mt_rand(), mt_rand(), mt_rand());
  			$hash = "{SSHA}" . base64_encode(pack("H*", sha1($password . $salt)) . $salt);
			return $hash;
		}
		
		// compare the crypted value of the password with the user password
		public function verifyPassword($password,$hash) {
		  $ohash = base64_decode(substr($hash, 6));
		  $osalt = substr($ohash, 20);
		  $ohash = substr($ohash, 0, 20);
		  $nhash = pack("H*", sha1($password . $osalt));
		  return ($ohash == $nhash);
		}
	}
?>