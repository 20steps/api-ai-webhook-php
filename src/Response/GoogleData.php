<?php
	
	namespace APIAI\Response;
	
	class GoogleData extends AbstractData {
		
		/**
		 * @var bool
		 */
		private $expectUserResponse;

		/**
		 * @var GoogleRichResponse
		 */
		private $richResponse;
		
		/**
		 * GoogleData constructor.
		 *
		 * @param $expectUserResponse
		 * @param GoogleRichResponse $richResponse
		 */
		public function __construct($expectUserResponse = false, GoogleRichResponse $richResponse = null) {
			$this->setExpectUserResponse($expectUserResponse);
			$this->setRichResponse($richResponse);
		}
		
		/**
		 * @return bool
		 */
		public function isExpectUserResponse() {
			return $this->expectUserResponse;
		}
		
		/**
		 * @param bool $expectUserResponse
		 * @return GoogleData
		 */
		public function setExpectUserResponse($expectUserResponse) {
			$this->expectUserResponse = $expectUserResponse;
			
			return $this;
		}
		
		/**
		 * @return GoogleRichResponse
		 */
		public function getRichResponse() {
			return $this->richResponse;
		}
		
		/**
		 * @param GoogleRichResponse $richResponse
		 * @return GoogleData
		 */
		public function setRichResponse($richResponse) {
			$this->richResponse = $richResponse;
			
			return $this;
		}
		
		
		public function render() {
			$rtn = [
				'expectUserResponse' => $this->isExpectUserResponse()
			];
			if ($this->getRichResponse()) {
				$rtn['richResponse']=$this->getRichResponse()->render();
			}
			return $rtn;
		}
		
	}