<?php

namespace APIAI\Response;

class Response {
	
	/**
	 * @var string|null
	 */
	protected $speech;

	/**
	 * @var string|null
	 */
	protected $displayText;

	/**
	 * @var array|null
	 */
	protected $data;
	
	/**
	 * @var string
	 */
	protected $source = '20steps';
	
	/**
	 * Response constructor.
	 *
	 * @param string $source
	 */
	public function __construct(string $source='20steps') {
		$this->source = $source;
	}
	
	/**
	 * @param string $speech
	 * @return $this
	 */
	public function respond(string $speech) {
		$this->speech = $speech;
		
		return $this;
	}
	
	/**
	 * @param string $displayText
	 * @return $this
	 */
	public function withDisplayText(string $displayText) {
		$this->displayText = $displayText;

		return $this;
	}
	
	// make it compatible with amazon-alexa-php
	
	/**
	 * @param string $title
	 * @param string $displayText
	 * @return $this
	 */
	public function withCard(string $title, string $displayText) {
		$this->withDisplayText($displayText);
		
		return $this;
	}
	
	public function withLinkAccountCard($foo,$bar) {
		// nop
		return $this;
	}
	
	/**
	 * @param array $data
	 * @return $this
	 */
	public function withData(array $data) {
		$this->data = $data;
		
		return $this;
	}
	
	/**
	 * @param array $googleData
	 * @return $this
	 */
	public function withGoogleData(array $googleData) {
		if (!$this->data) {
			$this->data = [];
		}

		$this->data['google']=$googleData;

		return $this;
	}
	
	/**
	 * @return $this
	 */
	public function endSession() {
		// nop
		return $this;
	}
	
	
    /**
     * Return the response as an array for JSON-ification
     * @return array
     */
	public function render() {
		$rtn = [
			'speech' => $this->speech,
			'source' => $this->source
		];
		if ($this->data) {
			$rtn['data']=$this->data;
		}
		if ($this->displayText) {
			$rtn['displayText'] = $this->displayText;
		}
		return $rtn;
	}
}