<?php
class Alanstormdotcom_Helloworld_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function __construct() {
		$this->log('construct');
	}

	public function log($text) {
		Mage::log(
			$text,
			null,
			'Alanstormdotcom_Helloworld.log'
		);
	}
}