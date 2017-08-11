<?php

namespace APIAI\Request;

class IntentRequest extends Request {
	
	/**
	 * @var string
	 */
	private $intentName;
	
	public function __construct($rawData) {
		parent::__construct($rawData);
		
		$this->intentName = $this->data['result']['metadata']['intentName'];
		
	}
	
	/**
	 * @return string
	 */
	public function getIntentName() {
		return $this->intentName;
	}
	
}
