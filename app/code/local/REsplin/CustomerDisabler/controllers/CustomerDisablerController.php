<?php
class REsplin_CustomerDisabler_CustomerDisablerController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
	{
		$this->_title($this->__('Customers'))->_title($this->__('Disabled Customers'));

		$this->loadLayout();

		$this->_setActiveMenu('customer/customer');

		/*
		$block = $this->getLayout()
			->createBlock('core/text', 'title-block')
			->setText('<h1>Disabled Customers</h1>');
			
		$this->_addContent($block);
		*/

		$content = $this->getLayout()->createBlock('REsplin_CustomerDisabler/adminhtml_customer');
		
		$this->_addContent($content);

		$this->renderLayout();
	}
	
	public function gridAction()
	{
		$this->loadLayout();
		$this->getResponse()->setBody(
			$this->getLayout()->createBlock('REsplin_CustomerDisabler/adminhtml_customer_grid')->toHtml()
		);
	}
}