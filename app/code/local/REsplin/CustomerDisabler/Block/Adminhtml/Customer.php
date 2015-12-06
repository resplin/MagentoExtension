<?php

class REsplin_CustomerDisabler_Block_Adminhtml_Customer extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct()
	{
		$this->_blockGroup = 'REsplin_CustomerDisabler';
		$this->_controller = 'adminhtml_customer';
		$this->_headerText = Mage::helper('REsplin_CustomerDisabler')->__('Customer Disabler');
		parent::__construct();
		$this->_removeButton('add');
	}
}