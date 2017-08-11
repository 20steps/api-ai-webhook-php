<?php

namespace APIAI\Request;

use RuntimeException;
use InvalidArgumentException;
use DateTime;

class Request {
	
	/**
	 * @var string
	 */
	protected $id;
	
	/**
	 * @var string
	 */
	protected $lang;
	
	/**
	 * @var DateTime
	 */
	protected $timestamp;
	/**
	 * @var array|null
	 */
	protected $data;
	/**
	 * @var string
	 */
	protected $rawData;

	/**
	 * Set up Request with id, lang, timestamp (DateTime)
	 * @param string $data
	 */
	public function __construct(string $rawData) {
		// Decode the raw data into a JSON array.
		$data = json_decode($rawData, TRUE);
		$this->data = $data;
		$this->rawData = $rawData;

		$this->id = $data['id'];
		$this->lang = $data['lang'];
		
		$timestampData = $data['timestamp'];
		if (is_numeric($timestampData)) {
			$this->timestamp = new DateTime();
			$this->timestamp->setTimestamp($timestampData);
		} else {
			$this->timestamp = new DateTime($timestampData);
		}

	}
	
	/**
	 * @return Request
	 */
	public function fromData() {
		$request = $this;

		$metadata = $this->data['result']['metadata'];
		if (isset($metadata['intentId'])) {
			$request = new IntentRequest($this->rawData);
		}
		
		return $request;
	}
	
	/**
	 * @return string
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @return string
	 */
	public function getLang() {
		return $this->lang;
	}
	
	/**
	 * @return DateTime
	 */
	public function getTimestamp() {
		return $this->timestamp;
	}
	
	/**
	 * @return array|null
	 */
	public function getData() {
		return $this->data;
	}
	
	/**
	 * @return string
	 */
	public function getRawData() {
		return $this->rawData;
	}

}
