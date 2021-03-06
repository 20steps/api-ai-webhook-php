<?php
	
	namespace APIAI\Response;
	
	class GoogleSuggestion extends AbstractData {
		
		/**
		 * @var string
		 */
		private $title;
		
		/**
		 * GoogleSuggestion constructor.
		 *
		 * @param string $title
		 */
		public function __construct($title) {
			$this->setTitle($title);
		}
		
		/**
		 * @return array
		 */
		public function render() {
			return [
				'title' => $this->getTitle()
			];
		}
		
		/**
		 * @return string
		 */
		public function getTitle() {
			return $this->title;
		}
		
		/**
		 * @param string $title
		 * @return GoogleSuggestion
		 */
		public function setTitle($title) {
			$this->title = $title;
			
			return $this;
		}
		
	}