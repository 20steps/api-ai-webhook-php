<?php
	
	namespace APIAI\Request;
	
	class GoogleSurface {
		
		/**
		 * @var GoogleCapability[]
		 */
		protected $capabilities = [];
		
		public function __construct($data) {
			$capabilitiesData = isset($data['capabilities']) ? $data['capabilities'] : null;
			if ($capabilitiesData && is_array($capabilitiesData) && count($capabilitiesData)>0) {
				foreach ($capabilitiesData as $capabilityData) {
					$this->capabilities[]=new GoogleCapability($capabilityData);
				}
			}
		}
		
		/**
		 * @return GoogleCapability[]
		 */
		public function getCapabilities() {
			return $this->capabilities;
		}

	}