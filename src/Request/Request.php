<?php

namespace APIAI\Request;

use RuntimeException;
use InvalidArgumentException;
use DateTime;

class Request {
	
	/**
	 * @var array|null
	 */
	protected $data;
	/**
	 * @var string
	 */
	protected $rawData;
	
	/**
	 * @var string
	 */
	protected $lang;
	
	/**
	 * @var Status
	 */
	protected $status;
	
	/**
	 * @var DateTime
	 */
	protected $timestamp;
	
	/**
	 * @var string
	 */
	protected $sessionId;
	
	/**
	 * @var Result
	 */
	protected $result;
	
	/**
	 * @var string
	 */
	protected $id;
	
	/**
	 * @var OriginalRequest
	 */
	protected $originalRequest;

	/**
	 * Set up Request with id, lang, timestamp (DateTime)
	 * @param string $data
	 */
	public function __construct(string $rawData) {
		$data = json_decode($rawData, TRUE);
		$this->data = $data;
		$this->rawData = $rawData;
		
		$this->lang = $data['lang'];
		
		$this->status = new Status($data['status']);
		
		$timestampData = $data['timestamp'];
		if (is_numeric($timestampData)) {
			$this->timestamp = new DateTime();
			$this->timestamp->setTimestamp($timestampData);
		} else {
			$this->timestamp = new DateTime($timestampData);
		}
		
		$this->sessionId = $data['sessioId'];
		
		$this->result = $data['result'];
		
		$this->id = $data['id'];
		
		$this->originalRequest = $this->createOriginalRequest($data['originalRequest']);
		
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
	
	/**
	 * @return string
	 */
	public function getLang() {
		return $this->lang;
	}
	
	/**
	 * @return Status
	 */
	public function getStatus() {
		return $this->status;
	}
	
	/**
	 * @return DateTime
	 */
	public function getTimestamp() {
		return $this->timestamp;
	}
	
	/**
	 * @return string
	 */
	public function getSessionId() {
		return $this->sessionId;
	}
	
	/**
	 * @return Result
	 */
	public function getResult() {
		return $this->result;
	}
	
	/**
	 * @return string
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @return OriginalRequest
	 */
	public function getOriginalRequest() {
		return $this->originalRequest;
	}
	
	// helpers
	
	/**
	 * @param $data
	 * @return OriginalRequest
	 */
	protected function createOriginalRequest($data) {
		if (!isset($data['source'])) {
			throw new RuntimeException('Element source missing in original request');
		}

		$source = $data['source'];
		$className = '\\APIAI\\Request\\' . ucfirst($source).'Request';

		if (!class_exists($className)) {
			return new OriginalRequest($data);
		}
		
		return new $className($data);
	}

}
