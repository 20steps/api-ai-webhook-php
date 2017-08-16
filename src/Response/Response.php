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
	 * @var GoogleData|null
	 */
	protected $googleData;
	
	/**
	 * @var string
	 */
	protected $source = '20steps';
	
	/**
	 * @var bool
	 */
	protected $createGoogleData;
	
	/**
	 * Response constructor.
	 *
	 * @param string $source
	 */
	public function __construct(string $source='20steps',$createGoogleData = true) {
		$this->source = $source;
		$this->createGoogleData = $createGoogleData;
		if ($this->createGoogleData) {
			$this->googleData = new GoogleData();
		}
	}
	
	/**
	 * @param string $speech
	 * @return $this
	 */
	public function respond(string $speech) {
		$this->speech = $speech;

		if ($this->createGoogleData) {
			$this->googleData->addItem(new GoogleSimpleResponse($speech));
		}

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
	public function withCard(string $title, string $text, string $subtitle = null) {

		if ($this->createGoogleData) {
			$this->googleData->addItem(new GoogleBasicCard($title,$text,$subtitle));
		}
		
		return $this;
	}
	
	public function withLinkAccountCard($foo,$bar) {
		// nop
		return $this;
	}
	
	/**
	 * @param GoogleData $googleData
	 * @return $this
	 */
	public function withGoogleData(GoogleData $googleData) {
		$this->googleData = $googleData;

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
		$data = [];
		if ($this->googleData) {
			$data['google']=$this->googleData->render();
		}
		if (count($data)>0) {
			$rtn['data']=$data;
		}
		if ($this->displayText) {
			$rtn['displayText'] = $this->displayText;
		}
		return $rtn;
	}
}