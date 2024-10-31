<?php
class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('OrderModel');
    }

    public function index() {
        $selected_foods = $this->input->post('selected_foods'); // غذاهای انتخاب شده
        $total_price = $this->input->post('total_price'); // قیمت کل

        $data['selected_foods'] = $selected_foods;
        $data['total_price'] = $total_price;
        
        $this->load->view('order', $data);
    }

    public function place_order() {
        $data = array(
            'customer_name' => $this->input->post('customer_name'),
            'customer_phone' => $this->input->post('customer_phone'),
            'customer_address' => $this->input->post('customer_address'),
            'selected_foods' => $this->input->post('selected_foods'),
            'total_price' => $this->input->post('total_price')
        );

        // ذخیره سفارش در دیتابیس
        $this->OrderModel->place_order($data);

        // هدایت به صفحه‌ی موفقیت
        redirect('order/order_success');
    }

    public function order_success() {
        // بارگذاری صفحه‌ی موفقیت
        $this->load->view('order_success');
    }
}
