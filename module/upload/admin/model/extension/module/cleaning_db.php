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

	public function deleteSelectedProducts($product_model) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "product WHERE model = '" . $product_model . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE model = '" . $product_model . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_description WHERE model = '" . $product_model . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_discount WHERE model = '" . $product_model . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_image WHERE model = '" . $product_model . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE model = '" . $product_model . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE model = '" . $product_model . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE model = '" . $product_model . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE model = '" . $product_model . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_reward WHERE model = '" . $product_model . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_special WHERE model = '" . $product_model . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE model = '" . $product_model . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_store WHERE model = '" . $product_model . "'");

		$this->cache->delete('product');
	}

}
