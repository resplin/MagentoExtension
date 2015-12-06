<?php
class Alanstormdotcom_Helloworld_MessagesController extends Mage_Core_Controller_Front_Action {
	// localhost/magento/index.php/helloworld/messages/goodbye
	public function goodbyeAction() {
		echo 'Another Goodbye';
	}
}