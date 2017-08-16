<?php
	
	namespace APIAI\Response;
	
	class GoogleBasicCard extends AbstractGoogleItem {
		
		/**
		 * @var string
		 */
		private $title;
		
		/**
		 * @var string
		 */
		private $subtitle;
		
		/**
		 * @var string
		 */
		private $formattedText;
		
		public function __construct(string $title, string $formattedText, string $subtitle = null) {
			$this->setTitle($title)->setFormattedText($formattedText)->setSubtitle($subtitle);
		}
		
		/**
		 * @return array
		 */
		public function render() {
			return [
				'title' => $this->getTitle(),
				'subtitle' => $this->getSubtitle(),
				'formattedText' => $this->getFormattedText()
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
		 * @return GoogleBasicCard
		 */
		public function setTitle($title) {
			$this->title = $title;
			
			return $this;
		}
		
		/**
		 * @return string
		 */
		public function getSubtitle() {
			return $this->subtitle;
		}
		
		/**
		 * @param string $subtitle
		 * @return GoogleBasicCard
		 */
		public function setSubtitle($subtitle) {
			$this->subtitle = $subtitle;
			
			return $this;
		}
		
		/**
		 * @return string
		 */
		public function getFormattedText() {
			return $this->formattedText;
		}
		
		/**
		 * @param string $formattedText
		 * @return GoogleBasicCard
		 */
		public function setFormattedText($formattedText) {
			$this->formattedText = $formattedText;
			
			return $this;
		}
		
		
		
	}