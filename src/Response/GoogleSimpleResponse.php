<?php
	
	namespace APIAI\Response;
	
	class GoogleSimpleResponse extends AbstractGoogleItem {
		
		/**
		 * @var string
		 */
		private $textToSpeech;
		
		public function __construct(string $textToSpeech) {
			$this->setTextToSpeech($textToSpeech);
		}
		
		/**
		 * @return array
		 */
		public function render() {
			return ['simpleResponse' =>
				        [
							'textToSpeech' => $this->getTextToSpeech()
						]
			];
		}
		
		/**
		 * @return string
		 */
		public function getTextToSpeech() {
			return $this->textToSpeech;
		}
		
		/**
		 * @param string $textToSpeech
		 * @return GoogleSimpleResponse
		 */
		public function setTextToSpeech($textToSpeech) {
			$this->textToSpeech = $textToSpeech;
			
			return $this;
		}
		
		
	}