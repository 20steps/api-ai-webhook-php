<?php
	
	namespace APIAI\Response;
	
	class GoogleRichResponse extends AbstractData {
		
		/**
		 * @var AbstractGoogleItem[]
		 */
		private $items = [];
		
		/**
		 * @var GoogleSuggestion[]
		 */
		private $suggestions = [];
		
		/**
		 * @param AbstractGoogleItem $item
		 * @return $this
		 */
		public function addItem(AbstractGoogleItem $item) {
			$this->items[]=$item;
			return $this;
		}
		
		/**
		 * @return AbstractGoogleItem[]
		 */
		public function getItems() {
			return $this->items;
		}
		
		/**
		 * @param GoogleSuggestion $suggestion
		 * @return $this
		 */
		public function addSuggestion(GoogleSuggestion $suggestion) {
			$this->suggestions[]=$suggestion;
			return $this;
		}
		
		/**
		 * @return GoogleSuggestion[]
		 */
		public function getSuggestions() {
			return $this->suggestions;
		}
		
		public function render() {
			$rtn = [
				'items' => array_map(function(AbstractGoogleItem $item) {
					return $item->render();
				},$this->getItems()),
				'suggestions' => array_map(function(GoogleSuggestion $suggestion) {
					return $suggestion->render();
				},$this->getSuggestions())
			];
			return $rtn;
		}
		
	}