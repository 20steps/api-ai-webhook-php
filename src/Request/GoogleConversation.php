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
		
		/**
		 * @var string
		 */
		protected $conversationToken;
		
		public function __construct($data) {
			$this->conversationId = isset($data['conversationId']) ? $data['conversationId'] : null;
			$this->type = isset($data['type']) ? $data['type'] : null;
			$this->conversationToken = isset($data['conversationToken']) ? $data['conversationToken'] : null;
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
		
		/**
		 * @return string
		 */
		public function getConversationToken() {
			return $this->conversationToken;
		}
		
		
	}