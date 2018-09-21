<?php

class ControllerExtensionModuleCleaningDb extends Controller {

	private $error = array();

	public function index() {

		$this->load->model('extension/module/cleaning_db');
		
		//Load language file
    $this->load->language('extension/module/cleaning_db');

		//Set title from language file
		$this->document->setTitle($this->language->get('heading_title'));

		//Load settings model
		$this->load->model('setting/setting');

		//Save settings
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('cleaning_db', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'], 'SSL'));
		}
		

		$text_strings = array(
				'heading_title',
				'button_save',
				'button_cancel',
				'button_add_module',
				'button_remove',
				'placeholder',
		);

		foreach ($text_strings as $text) {
			$data[$text] = $this->language->get($text);
		}


		//error handling
 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}


		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/category', 'token=' . $this->session->data['token'], true)
		);

		$data['action'] = $this->url->link('extension/module/cleaning_db', 'token=' . $this->session->data['token'], 'SSL');
		$data['clean_products'] = $this->url->link('extension/module/cleaning_db/cleanProducts', 'token=' . $this->session->data['token'], 'SSL');
		$data['clean_selected_products'] = $this->url->link('extension/module/cleaning_db/cleanSelectedProducts', 'token=' . $this->session->data['token'], 'SSL');
		$data['clean_categories'] = $this->url->link('extension/module/cleaning_db/cleanCategory', 'token=' . $this->session->data['token'], 'SSL');
		$data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'], 'SSL');

		//Check if multiple instances of this module
		$data['modules'] = array();

		if (isset($this->request->post['cleaning_db_module'])) {
			$data['modules'] = $this->request->post['cleaning_db_module'];
		} elseif ($this->config->get('cleaning_db_module')) {
			$data['modules'] = $this->config->get('cleaning_db_module');
		}

		//Prepare for display
		$this->load->model('design/layout');

		$data['layouts'] = $this->model_design_layout->getLayouts();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		//Send the output
		$this->response->setOutput($this->load->view('extension/module/cleaning_db.tpl', $data));
	}

	public function cleanCategory() {
		$this->load->model('extension/module/cleaning_db');

		if (isset($this->request->post['delete_categories'])) {
			$this->model_extension_module_cleaning_db->deleteCategories();
			
			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module/cleaning_db', 'token=' . $this->session->data['token'], 'SSL'));
		}
	}

	public function cleanProducts() {
		$this->load->model('extension/module/cleaning_db');

		if (isset($this->request->post['delete_products'])) {
			$this->model_extension_module_cleaning_db->deleteProducts();
			
			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module/cleaning_db', 'token=' . $this->session->data['token'], 'SSL'));
		}	
	}

	public function cleanSelectedProducts() {
		$this->load->model('extension/module/cleaning_db');

		if (isset($this->request->post['delete_selected_products'])) {
			foreach ($this->request->post['delete_selected_products'] as $product_model) {
				$this->model_extension_module_cleaning_db->deleteSelectedProducts($product_model);
			}
			
			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module/cleaning_db', 'token=' . $this->session->data['token'], 'SSL'));
		}	
	}

	/*
	 *
	 * Check that user actions are authorized
	 *
	 */
	private function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/cleaning_db')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


}
?>
