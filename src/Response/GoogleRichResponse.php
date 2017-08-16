<?php
	
	namespace APIAI\Response;
	
	class GoogleRichResponse extends AbstractData {
		
		/**
		 * @var AbstractGoogleItem[]
		 */
		private $items = [];
		
		public function addItem(AbstractGoogleItem $item) {
			$this->items[]=$item;
		}
		
		/**
		 * @return AbstractGoogleItem[]
		 */
		public function getItems() {
			return $this->items;
		}
		
		public function render() {
			$rtn = [
				'items' => array_map(function(AbstractGoogleItem $item) {
					return $item->render();
				},$this->getItems())
			];
			return $rtn;
		}
		
	}