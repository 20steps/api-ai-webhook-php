<?php

namespace APIAI\Request;

use DateTime;

use APIAI\Util\Util;

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
		
		$this->lang = Util::getValueFromData($data,'lang',null,true);
		
		$this->status = new Status(Util::getValueFromData($data,'status',null,true));
		
		$timestampData = Util::getValueFromData($data,'timestamp',null,true);
		if (is_numeric($timestampData)) {
			$this->timestamp = new DateTime();
			$this->timestamp->setTimestamp($timestampData);
		} else {
			$this->timestamp = new DateTime($timestampData);
		}
		
		$this->sessionId = Util::getValueFromData($data,'sessionId',null,true);
		
		$this->result = Util::getValueFromData($data,'result',null,true);
		
		$this->id = Util::getValueFromData($data,'id',null,true);
		
		$this->originalRequest = $this->createOriginalRequestFromData($data);
		
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
	protected function createOriginalRequestFromData($data) {
		$originalRequestData = Util::getValueFromData($data,'originalRequest');
		if ($originalRequestData) {
			$source = Util::getValueFromData($originalRequestData,'source',null,true);

			$className = '\\APIAI\\Request\\' . ucfirst($source).'Request';

			if (!class_exists($className)) {
				return new OriginalRequest($originalRequestData);
			}
			
			return new $className($originalRequestData);
		}
		return null;
	}

}
