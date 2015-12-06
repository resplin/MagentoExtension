<?php
class REsplin_TestExtension_TestExtensionController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
	{
		$this->loadLayout();

		$block = $this->getLayout()
			->createBlock('core/text', 'title-block')
			->setText('<h1>Test Extension</h1>');

		$this->_addContent($block);

		$this->renderLayout();
	}
}