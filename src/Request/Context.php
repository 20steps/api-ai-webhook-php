<?php
	
	namespace APIAI\Request;
	
	class Context {
		
		/**
		 * @var string
		 */
		protected $name;
		
		/**
		 * @var array
		 */
		protected $parameters;
		
		/**
		 * @var int
		 */
		protected $lifespan;

		
		public function __construct($data) {
			$this->name = isset($data['name']) ? $data['name'] : null;
			$this->parameters = isset($data['parameters']) ? $data['parameters'] : null;
			$this->lifespan = isset($data['lifespan']) ? $data['lifespan'] : null;
		}
		
		/**
		 * @return string
		 */
		public function getName() {
			return $this->name;
		}
		
		/**
		 * @return array
		 */
		public function getParameters() {
			return $this->parameters;
		}
		
		/**
		 * @return int
		 */
		public function getLifespan() {
			return $this->lifespan;
		}
		
	}