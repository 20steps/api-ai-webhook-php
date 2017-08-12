<?php
	
	namespace APIAI\Request;
	
	class Status {
		
		/**
		 * @var string
		 */
		protected $errorType;
		
		/**
		 * @var int
		 */
		protected $code;
		
		public function __construct($data) {
			$this->errorType = isset($data['errorType']) ? $data['errorType'] : null;
			$this->code = isset($data['code']) ? $data['code'] : null;
		}
		
		/**
		 * @return string
		 */
		public function getErrorType() {
			return $this->errorType;
		}
		
		/**
		 * @return int
		 */
		public function getCode() {
			return $this->code;
		}
		
	}