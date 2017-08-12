<?php
	
	namespace APIAI\Request;
	
	class GoogleConversation {
		
		/**
		 * @var string
		 */
		protected $conversationId;
		
		/**
		 * @var string
		 */
		protected $type;
		
		public function __construct($data) {
			$this->conversationId = isset($data['conversationId']) ? $data['conversationId'] : null;
			$this->type = isset($data['type']) ? $data['type'] : null;
		}
		
		/**
		 * @return string
		 */
		public function getConversationId() {
			return $this->conversationId;
		}
		
		/**
		 * @return string
		 */
		public function getType() {
			return $this->type;
		}
		
	}