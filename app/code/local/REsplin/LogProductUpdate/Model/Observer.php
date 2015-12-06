<?php
/**
 * Our class name should follow the directory structure of
 * our Observer.php model, starting from the namespace,
 * replacing directory separators with underscores.
 * i.e. app/code/local/REsplin/
 *                     LogProductUpdate/Model/Observer.php
 */
class REsplin_LogProductUpdate_Model_Observer
{
	public function helper()
	{
		return Mage::helper('REsplin_LogProductUpdate');
	}

	/**
	 * Magento passes a Varien_Event_Observer object as
	 * the first parameter of dispatched events.
	 */
	public function catalogProductSaveAfter(Varien_Event_Observer $observer)
	{
		// Retrieve the product being updated from the event observer
		$product = $observer->getEvent()->getProduct();

		// Write a new line to var/log/product-updates.log
		$name = $product->getName();
		$sku  = $product->getSku();
		
		$this->helper()->log("CatalogProductSaveAfter(): {$name} ({$sku})");
	}

	public function catalogProductSaveBefore(Varien_Event_Observer $observer)
	{
		// Retrieve the product being updated from the event observer
		$product = $observer->getEvent()->getProduct();

		// Write a new line to var/log/product-updates.log
		$name = $product->getName();
		$sku = $product->getSku();
		
		$this->helper()->log("CatalogProductSaveBefore(): {$name} ({$sku})");
	}

	public function catalogProductLoadAfter(Varien_Event_Observer $observer)
	{
		// Retrieve the product being updated from the event observer
		$product = $observer->getEvent()->getProduct();

		// Write a new line to var/log/product-updates.log
		$name = $product->getName();
		$sku = $product->getSku();

		$this->helper()->log("CatalogProductLoadAfter(): {$name} ({$sku})");
		$this->helper()->log("Observer: " . print_r($observer, true));

		//$product = $observer->getData('product');
		//$oldDescription = $product->getDescription();
		//$newDescription = str_replace("Apple", "Android", $oldDescription);
		//$product->setDescription($newDescription);
	}

	public function catalogProductCollectionLoadAfter(Varien_Event_Observer $observer)
	{
		$products = $observer->getCollection();
		
		$products->addAttributeToFilter('sku', 'iPod');
		
		$this->helper()->log("CatalogProductCollectionLoadAfter(): Count: " . count($products));
	}

	public function controllerActionPostDispatch(Varien_Event_Observer $observer)
	{
		$this->helper()->log("ControllerActionPostDispatch() - " . $observer->getEvent()->getControllerAction()->getFullActionName());
	}

	public function customerSaveAfter(Varien_Event_Observer $observer)
	{
		$this->helper()->log("CustomerSaveAfter()");
	}
	
	public function customerPrepareSave(Varien_Event_Observer $observer)
	{
		$this->helper()->log("CustomerPrepareSave()");
	}
	
	public function translateDescription($oldDescription)
	{
		return "text";
	}
}