<?php
	
	namespace APIAI\Request;
	
	use APIAI\Util\Util;
	
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
			$this->source = Util::getValueFromData($data,'source',null,true);
			$this->version = Util::getValueFromData($data,'version',null,true);
			$this->data = Util::getValueFromData($data,'data',null);
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