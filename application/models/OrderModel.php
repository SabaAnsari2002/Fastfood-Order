<?php
class OrderModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function place_order($data) {
        return $this->db->insert('orders', $data);
    }
}
