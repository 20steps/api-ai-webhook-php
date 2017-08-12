<?php
	
	namespace APIAI\Request;
	
	class OriginalRequest {
		
		/**
		 * @var string|null
		 */
		protected $source;
		
		/**
		 * @var string|null
		 */
		protected $version;
		
		/**
		 * @var array|null
		 */
		protected $data;
		
		public function __construct($data) {
			$this->source = isset($data['source']) ? $data['source'] : null;
			$this->version = isset($data['version']) ? $data['version'] : null;
			$this->data = isset($data['data']) ? $data['data'] : null;
		}
		
		/**
		 * @return null|string
		 */
		public function getSource() {
			return $this->source;
		}
		
		/**
		 * @return null|string
		 */
		public function getVersion() {
			return $this->version;
		}
		
		/**
		 * @return array|null
		 */
		public function getData() {
			return $this->data;
		}
		
	}