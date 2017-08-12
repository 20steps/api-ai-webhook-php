<?php
	
	namespace APIAI\Request;
	
	class Metadata {
	
		/**
		 * @var string
		 */
		protected $intentId;
		
		/**
		 * @var string
		 */
		protected $webhookUsed;
		
		/**
		 * @var string
		 */
		protected $webhookForSlotFillingUsed;
		
		/**
		 * @var int
		 */
		protected $nluResponseTime;
		
		/**
		 * @var string
		 */
		protected $intentName;
		
    
		public function __construct($data) {
			$this->intentId = isset($data['intentId']) ? $data['intentId'] : null;
			$this->webhookUsed = isset($data['webhookUsed']) ? $data['webhookUsed'] : null;
			$this->webhookForSlotFillingUsed = isset($data['webhookForSlotFillingUsed']) ? $data['webhookForSlotFillingUsed'] : null;
			$this->nluResponseTime = isset($data['nluResponseTime']) ? $data['nluResponseTime'] : null;
			$this->intentName = isset($data['intentName']) ? $data['intentName'] : null;
		}
		
		/**
		 * @return string
		 */
		public function getIntentId() {
			return $this->intentId;
		}
		
		/**
		 * @return string
		 */
		public function getWebhookUsed() {
			return $this->webhookUsed;
		}
		
		/**
		 * @return string
		 */
		public function getWebhookForSlotFillingUsed() {
			return $this->webhookForSlotFillingUsed;
		}
		
		/**
		 * @return int
		 */
		public function getNluResponseTime() {
			return $this->nluResponseTime;
		}
		
		/**
		 * @return string
		 */
		public function getIntentName() {
			return $this->intentName;
		}

	}