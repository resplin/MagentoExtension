<?php
class REsplin_CustomerDisabler_Model_Observer
{
	public function customerAuthenticated(Varien_Event_Observer $observer)
	{
        $customer = $observer->getEvent()->getModel();
		$isActive = $customer->getData('resplin_is_active');

		if ($isActive == 0)
		{
			error_log('Inactive customer ' . $customer->getData('entity_id') . ' attempted to login');
			Mage::throwException('Customer is currently inactive.  Login prohibited.');
		}
	}

	public function beforeBlockToHtml(Varien_Event_Observer $observer)
	{
		$grid = $observer->getBlock();

		if ($grid instanceof Mage_Adminhtml_Block_Customer_Grid)
		{
			$grid->addColumnAfter('resplin_is_active', array(
				'header'  => 'Is Active',
				'index'   => 'resplin_is_active',
                'type'    => 'options',
                'options' => array('1' => 'Yes', '0' => 'No', '' => '??')
            ), 'billing_region');
		}
	}

	public function beforeCollectionLoad(Varien_Event_Observer $observer)
	{
		$collection = $observer->getCollection();
		if (!isset($collection))
		{
			return;
		}

		if ($collection instanceof Mage_Customer_Model_Resource_Customer_Collection)
		{
			$collection->addAttributeToSelect('resplin_is_active');
		}
	}
}