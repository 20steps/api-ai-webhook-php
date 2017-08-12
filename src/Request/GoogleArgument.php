<?php
	
	namespace APIAI\Request;
	
	class GoogleArgument {
		
		/**
		 * @var string
		 */
		protected $name;
		
		/**
		 * @var string
		 */
		protected $rawText;
		
		/**
		 * @var string
		 */
		protected $textValue;


		public function __construct($data) {
			$this->name = isset($data['name']) ? $data['name'] : null;
			$this->rawText = isset($data['rawText']) ? $data['rawText'] : null;
			$this->textValue = isset($data['textValue']) ? $data['textValue'] : null;
		}
		
		/**
		 * @return string
		 */
		public function getName() {
			return $this->name;
		}
		
		/**
		 * @return string
		 */
		public function getRawText() {
			return $this->rawText;
		}
		
		/**
		 * @return string
		 */
		public function getTextValue() {
			return $this->textValue;
		}

	}