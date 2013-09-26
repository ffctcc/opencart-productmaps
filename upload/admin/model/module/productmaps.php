<?php
class ModelModuleProductmaps extends Model {
	public function createTable() {
		$createTable = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "productmaps` (
             `id` int(11) NOT NULL AUTO_INCREMENT,
             `p` point NOT NULL,
			 `zoom` tinyint unsigned NOT NULL DEFAULT 14,
             `address` varchar(128) NOT NULL DEFAULT 'Some place',
             `width` int unsigned NOT NULL DEFAULT 600,
             `height` int unsigned NOT NULL DEFAULT 400,
             `id_product` int(11) NOT NULL UNIQUE,
        PRIMARY KEY (`id`)) default CHARSET=utf8";
        
        $this->db->query($createTable);
	}
	
	public function dropTable() {
		$dropTable = "DROP TABLE IF EXISTS " . DB_PREFIX . "productmaps";
		$this->db->query($dropTable);
    }
	
	public function getLocations($id_product) {
        $sql = 'SELECT id, x(p) as lat, y(p) as lng, zoom, address, width, height, id_product FROM `' . DB_PREFIX . 'productmaps` g WHERE id_product = '.$id_product;

        if (!$res = $this->db->query($sql))
        	return $this->showErrors();
        
        return $res->rows;
    }
    
    public function showErrors() {
        $sql = 'SHOW ERRORS';
        $err = $this->db->query($sql);
        
        foreach ($err as $e) {
			echo "<div class='error'>Error: {$e['Message']}</div>";
		}
		return false;
    }
}
