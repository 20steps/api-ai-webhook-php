<?php
	
	namespace APIAI\Request;
	
	class GoogleInput {
		
		/**
		 * @var string
		 */
		protected $intent;
		
		/**
		 * @var GoogleRawInput[]
		 */
		protected $rawInputs = [];
		
		public function __construct($data) {
			$this->intent = isset($data['intent']) ? $data['intent'] : null;
			$rawInputsData = isset($data['rawInputs']) ? $data['rawInputs'] : null;
			if ($rawInputsData && is_array($rawInputsData) && count($rawInputsData)>0) {
				foreach ($rawInputsData as $rawInput) {
					$this->rawInputs[]=new GoogleRawInput($rawInput);
				}
			}
		}
		
		/**
		 * @return string
		 */
		public function getIntent() {
			return $this->intent;
		}
		
		/**
		 * @return GoogleRawInput[]
		 */
		public function getRawInputs() {
			return $this->rawInputs;
		}
		
	}