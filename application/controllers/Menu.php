<?php
class Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('FoodModel');
    }

    public function index() {
        $data['foods'] = $this->FoodModel->get_all_foods();
        $this->load->view('menu', $data);
    }
}
