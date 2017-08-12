<?php
	
	namespace APIAI\Request;
	
	class Message {
	
		/**
		 * @var int
		 */
		protected $type;
		
		/**
		 * @var string
		 */
		protected $speech;
		
    
		public function __construct($data) {
			$this->type = isset($data['type']) ? $data['type'] : null;
			$this->speech = isset($data['speech']) ? $data['speech'] : null;
		}
		
		/**
		 * @return int
		 */
		public function getType() {
			return $this->type;
		}
		
		/**
		 * @return string
		 */
		public function getSpeech() {
			return $this->speech;
		}
		
	}