<?php
class ModelExtensionModuleCleaningDb extends Model {

	public function deleteCategories() {
		$this->db->query("TRUNCATE " . DB_PREFIX . "category_path");
		$this->db->query("TRUNCATE " . DB_PREFIX . "category");
		$this->db->query("TRUNCATE " . DB_PREFIX . "category_description");
		$this->db->query("TRUNCATE " . DB_PREFIX . "category_filter");
		$this->db->query("TRUNCATE " . DB_PREFIX . "category_to_store");
		$this->db->query("TRUNCATE " . DB_PREFIX . "category_to_layout");
		$this->db->query("TRUNCATE " . DB_PREFIX . "product_to_category");

		$this->cache->delete('category');
	}

	public function deleteProducts() {
		$this->db->query("TRUNCATE " . DB_PREFIX . "product");
		$this->db->query("TRUNCATE " . DB_PREFIX . "product_attribute");
		$this->db->query("TRUNCATE " . DB_PREFIX . "product_description");
		$this->db->query("TRUNCATE " . DB_PREFIX . "product_discount");
		$this->db->query("TRUNCATE " . DB_PREFIX . "product_image");
		$this->db->query("TRUNCATE " . DB_PREFIX . "product_option");
		$this->db->query("TRUNCATE " . DB_PREFIX . "product_option_value");
		$this->db->query("TRUNCATE " . DB_PREFIX . "product_related");
		$this->db->query("TRUNCATE " . DB_PREFIX . "product_related");
		$this->db->query("TRUNCATE " . DB_PREFIX . "product_reward");
		$this->db->query("TRUNCATE " . DB_PREFIX . "product_special");
		$this->db->query("TRUNCATE " . DB_PREFIX . "product_to_category");

		$this->db->query("TRUNCATE " . DB_PREFIX . "product_to_store");

		$this->cache->delete('product');
	}

}
