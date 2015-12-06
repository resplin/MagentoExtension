<?php
class REsplin_TestExtension_Model_Observer
{
	public function helper() {
		return Mage::helper('REsplin_TestExtension');
	}
	
	public function catalogProductSaveAfter(Varient_Event_Observer $observer)
	{
		$this->helper()->log('test');
	}
}