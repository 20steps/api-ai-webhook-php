<?php

namespace APIAI\Response;

class Response {
	
	/**
	 * @var string|null
	 */
	protected $speech = null;
	/**
	 * @var string|null
	 */
	
	protected $displayText = null;
	/**
	 * @var array
	 */
	
	protected $data = [];
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
	
	/**
	 * @param array $data
	 * @return $this
	 */
	public function withData(array $data) {
		$this->data = $data;
		
		return $this;
	}
	
	
    /**
     * Return the response as an array for JSON-ification
     * @return array
     */
	public function render() {
		return [
			'speech' => $this->speech,
			'displayText' => $this->displayText,
			'data' => $this->data,
			'source' => $this->source
		];
	}
}