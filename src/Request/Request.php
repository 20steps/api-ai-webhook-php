<?php

namespace APIAI\Request;

use RuntimeException;
use InvalidArgumentException;
use DateTime;

class Request {

	private $id;
	private $lang;
	
	private $timestamp;
	private $data;
	private $rawData;

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
	 * @param array $data
	 * @return IntentRequest|null
	 */
	public function fromData(array $data) {
		$data = $this->data;
		
		$metadata = $data['result']['metadata'];
		if (isset($metadata['intentId'])) {
			$request = new IntentRequest($this->rawData);
		}
		
		return $request;
	}
	
	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @return mixed
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
	 * @return mixed
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
