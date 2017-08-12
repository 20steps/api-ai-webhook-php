<?php
	
	namespace APIAI\Request;
	
	class GoogleUser {
		
		/**
		 * @var string
		 */
		protected $userId;
		
		/**
		 * @var string
		 */
		protected $locale;
		
		/**
		 * @var string
		 */
		protected $accessToken;
		
		
		public function __construct($data) {
			$this->userId = isset($data['userId']) ? $data['userId'] : null;
			$this->locale = isset($data['locale']) ? $data['locale'] : null;
			$this->accessToken = isset($data['accessToken']) ? $data['accessToken'] : null;
		}
		
		
		/**
		 * @return string
		 */
		public function getUserId() {
			return $this->userId;
		}
		
		/**
		 * @return string
		 */
		public function getLocale() {
			return $this->locale;
		}
		
		/**
		 * @return string
		 */
		public function getAccessToken() {
			return $this->accessToken;
		}
		
		
		
	}