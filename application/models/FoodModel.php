<?php
class FoodModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_foods() {
        $query = $this->db->get('foods');
        return $query->result();
    }
}
