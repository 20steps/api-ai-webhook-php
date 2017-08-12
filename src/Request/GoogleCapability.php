<?php
	
	namespace APIAI\Request;
	
	class GoogleCapability {
		
		/**
		 * @var string
		 */
		protected $name;
		
		
		public function __construct($data) {
			$this->name = isset($data['name']) ? $data['name'] : null;
		}
		
		/**
		 * @return string
		 */
		public function getName() {
			return $this->name;
		}
		
	}