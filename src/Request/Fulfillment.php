<?php
	
	namespace APIAI\Request;
	
	class Fulfillment {
	
		/**
		 * @var string
		 */
		protected $speech;
		
		/**
		 * @var Message[]
		 */
		protected $messages = [];
		
    
		public function __construct($data) {
			$this->speech = isset($data['speech']) ? $data['speech'] : null;
			$messagesData = isset($data['messages']) ? $data['messages'] : null;
			if ($messagesData && is_array($messagesData) && count($messagesData)>0) {
				foreach ($messagesData as $messageData) {
					$this->messages[]=new Message($messageData);
				}
			}
		}
		
		
		/**
		 * @return string
		 */
		public function getSpeech() {
			return $this->speech;
		}
		
		/**
		 * @return Message[]
		 */
		public function getMessages() {
			return $this->messages;
		}
		
	}