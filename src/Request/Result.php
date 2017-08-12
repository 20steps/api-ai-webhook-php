<?php
	
	namespace APIAI\Request;
	
	class Result {
		
		/**
		 * @var string
		 */
		protected $source;
		
		/**
		 * @var string
		 */
		protected $resolvedQuery;
		
		/**
		 * @var string
		 */
		protected $speech;
		
		/**
		 * @var bool
		 */
		protected $actionIncomplete;
		
		/**
		 * @var array
		 */
		protected $parameters;
		
		/**
		 * @var Context[]
		 */
		protected $contexts;
		
		/**
		 * @var array
		 */
		protected $metadata;
		
		/**
		 * @var array
		 */
		protected $fulfillment;
		
		/**
		 * @var float
		 */
		protected $score;
    
		public function __construct($data) {
			$this->source = isset($data['source']) ? $data['source'] : null;
			$this->resolvedQuery = isset($data['resolvedQuery']) ? $data['resolvedQuery'] : null;
			$this->speech = isset($data['speech']) ? $data['speech'] : null;
			$this->actionIncomplete = isset($data['actionIncomplete']) ? $data['actionIncomplete'] : null;
			$this->parameters = isset($data['parameters']) ? $data['parameters'] : null;
			$contextsData = isset($data['contexts']) ? $data['contexts'] : null;
			if ($contextsData && is_array($contextsData) && count($contextsData)>0) {
				foreach ($contextsData as $contextData) {
					$this->contexts[]=new Context($contextData);
				}
			}
			$this->metadata = isset($data['metadata']) ? new Metadata($data['metadata']) : null;
			$this->fulfillment = isset($data['fulfillment']) ? $data['fulfillment'] : null;
			$this->score = isset($data['score']) ? $data['score'] : null;
		}
		
		/**
		 * @return string
		 */
		public function getSource() {
			return $this->source;
		}
		
		/**
		 * @return string
		 */
		public function getResolvedQuery() {
			return $this->resolvedQuery;
		}
		
		/**
		 * @return string
		 */
		public function getSpeech() {
			return $this->speech;
		}
		
		/**
		 * @return bool
		 */
		public function isActionIncomplete() {
			return $this->actionIncomplete;
		}
		
		/**
		 * @return array
		 */
		public function getParameters() {
			return $this->parameters;
		}
		
		/**
		 * @return Context[]
		 */
		public function getContexts() {
			return $this->contexts;
		}
		
		/**
		 * @return array
		 */
		public function getMetadata() {
			return $this->metadata;
		}
		
		/**
		 * @return array
		 */
		public function getFulfillment() {
			return $this->fulfillment;
		}
		
		/**
		 * @return float
		 */
		public function getScore() {
			return $this->score;
		}
		
		
	}