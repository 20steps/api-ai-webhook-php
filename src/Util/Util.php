<?php
	
	namespace APIAI\Util;
	
	use twentysteps\Commons\EnsureBundle\Ensure;
	
	class Util {
		
		/**
		 * @param array $data
		 * @param string $key
		 * @param null $default
		 * @return mixed|null
		 */
		static public function getValueFromData(array $data, string $key,$default=null, $mustExist = false) {
			Ensure::isTrue($data &&  is_array($data),'data must not be null and must be an array');
			if (array_key_exists($key,$data)) {
				return $data['key'];
			}
			if ($mustExist) {
				Ensure::fail(sprintf("Element %s does not exist",$key));
			}
			return $default;
		}
		
	}