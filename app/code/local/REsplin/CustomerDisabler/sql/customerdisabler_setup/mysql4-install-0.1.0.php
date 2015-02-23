<?php

$installer = $this;
$installer->startSetup();

$setup = new Mage_Eav_Model_Entity_Setup('core_setup');

$entityTypeId     = $setup->getEntityTypeId('customer');
$attributeSetId   = $setup->getDefaultAttributeSetId($entityTypeId);
$attributeGroupId = $setup->getDefaultAttributeGroupId($entityTypeId, $attributeSetId);

$setup->addAttribute('customer', 'resplin_is_active', array(
	'input'         => 'boolean',
	'type'          => 'int',
	'label'         => 'Is Active',
	'visible'       => 1,
	'required'      => 0,
	'user_defined'  => 1
));

$setup->addAttributeToGroup(
	$entityTypeId,
	$attributeSetId,
	$attributeGroupId,
	'resplin_is_active',
	'998'  //sort_order
);

$oAttribute = Mage::getSingleton('eav/config')->getAttribute('customer', 'resplin_is_active');
$oAttribute->setData('used_in_forms', array('adminhtml_customer'));
$oAttribute->save();

$setup->endSetup();