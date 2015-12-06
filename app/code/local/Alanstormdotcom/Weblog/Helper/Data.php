<?php
class Alanstormdotcom_Weblog_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function __construct() {
		$this->log('construct');
	}

	public function log($text) {
		Mage::log(
			$text,
			null,
			'Alanstormdotcom_Weblog.log'
		);
	}
}