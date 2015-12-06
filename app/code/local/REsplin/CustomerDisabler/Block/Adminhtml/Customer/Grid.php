<?php

class REsplin_CustomerDisabler_Block_Adminhtml_Customer_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
		parent::__construct();
	}
	
	protected function _prepareCollection()
	{
		$collection = Mage::getResourceModel('customer/customer_collection');
		$this->setCollection($collection);
		parent::_prepareCollection();
		return $this;
	}
	
	protected function _prepareColumns()
	{
		$helper = Mage::helper('REsplin_CustomerDisabler');

		$this->addColumn('entity_id', array(
			'header' => $helper->__('ID'),
			'index' => 'entity_id'
		));

		/*
		$this->addColumn('name', array(
			'header' => $helper->__('Name'),
			'index' => 'name'
		));
		*/

		$this->addColumn('resplin_is_active', array(
			'header' => $helper->__('Is Active'),
			'index' => 'resplin_is_active'
		));

		return parent::_prepareColumns();
	}
	
	public function getGridUrl()
	{
		return $this->getUrl('*/*/grid', array('_current'=>true));
	}
}