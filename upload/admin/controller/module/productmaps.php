<?php

class ControllerModuleProductmaps extends Controller {
	private $error = array(); 
	
	public function install() {
		$this->load->model('module/productmaps');
		$this->model_module_productmaps->createTable();
	}

	public function uninstall() {
		$this->load->model('module/productmaps');
		$this->model_module_productmaps->dropTable();
	}
}
?>
