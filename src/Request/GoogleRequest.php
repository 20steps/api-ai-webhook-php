<?php
	
	namespace APIAI\Request;
	
	use APIAI\Util\Util;
	
	class GoogleRequest extends OriginalRequest {
		
		/**
		 * @var bool
		 */
		protected $isInSandbox;
		
		/**
		 * @var GoogleSurface
		 */
		protected $surface;
		
		/**
		 * @var GoogleInput[]
		 */
		protected $inputs = [];
		
		/**
		 * @var array
		 */
		protected $device;
		
		/**
		 * @var GoogleConversation
		 */
		protected $conversation;
		
		/**
		 * @var GoogleUser|null
		 */
		protected $user;
		
		
		public function __construct($data) {
			parent::__construct($data);
			$data = Util::getValueFromData($data,'data',null,true);
			$this->isInSandbox = Util::getValueFromData($data,'isInSandbox',false);
			$this->surface = new GoogleSurface(Util::getValueFromData($data,'surface',null,true));
			$inputsData = Util::getValueFromData($data,'inputs',null,true);
			if ($inputsData && is_array($inputsData) && count($inputsData)>0) {
				foreach ($inputsData as $inputData) {
					$this->inputs[]=new GoogleInput($inputData);
				}
			}
			$this->device = isset($data['device']) ? new GoogleConversation($data['device']) : null;
			$this->conversation = isset($data['conversation']) ? new GoogleConversation($data['conversation']) : null;
			$this->user = isset($data['user']) ? new GoogleUser($data['user']) : null;
		}
		
		/**
		 * @return bool
		 */
		public function isInSandbox() {
			return $this->isInSandbox;
		}
		
		/**
		 * @return GoogleSurface
		 */
		public function getSurface() {
			return $this->surface;
		}
		
		/**
		 * @return GoogleInput[]
		 */
		public function getInputs() {
			return $this->inputs;
		}
		
		/**
		 * @return array
		 */
		public function getDevice() {
			return $this->device;
		}
		
		/**
		 * @return GoogleConversation
		 */
		public function getConversation() {
			return $this->conversation;
		}
		
		/**
		 * @return GoogleUser|null
		 */
		public function getUser() {
			return $this->user;
		}
		
	}