<?php
class Alanstormdotcom_Helloworld_IndexController extends Mage_Core_Controller_Front_Action {
	// localhost/magento/index.php/helloworld/index/index
	public function indexAction() {
		echo 'Hello Index!';
	}

	// localhost/magento/index.php/helloworld/index/goodbye
	public function goodbyeAction() {
		echo 'Goodbye World!';
	}

	// localhost/magento/index.php/helloworld/index/params?foo=bar&baz=eof
	public function paramsAction() {
		echo '<dl>';
		foreach ($this->getRequest()->getParams() as $key => $value) {
			echo '<dt><strong>Param: </strong>'.$key.'</dt>';
			echo '<dl><strong>Value: </strong>'.$value.'</dl>';
		}
		echo '</dl>';
	}
}