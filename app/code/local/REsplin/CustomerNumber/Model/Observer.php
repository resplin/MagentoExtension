<?php
class REsplin_CustomerNumber_Model_Observer
{
	public function beforeBlockToHtml(Varien_Event_Observer $observer)
	{
		$grid = $observer->getBlock();

		if ($grid instanceof Mage_Adminhtml_Block_Customer_Grid)
		{
			$grid ->addColumnAfter(
				'customer_number',
				array(
					'header' => 'Customer Number',
					'type' => 'text',
					'index' => 'customer_number'
				),
				'email'
			);
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
			$collection->addAttributeToSelect('customer_number');
		}
	}
}