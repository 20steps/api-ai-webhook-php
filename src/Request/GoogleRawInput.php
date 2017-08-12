<?php
	
	namespace APIAI\Request;
	
	class GoogleRawInput {
		
		/**
		 * @var string
		 */
		protected $query;
		
		/**
		 * @var string
		 */
		protected $inputType;
		
		public function __construct($data) {
			$this->query = isset($data['query']) ? $data['query'] : null;
			$this->inputType = isset($data['inputType']) ? $data['inputType'] : null;
		}
		
		/**
		 * @return string
		 */
		public function getQuery() {
			return $this->query;
		}
		
		/**
		 * @return string
		 */
		public function getInputType() {
			return $this->inputType;
		}
		

	}