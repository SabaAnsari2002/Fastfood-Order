<?php
class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('OrderModel');
    }

    public function index() {
        $selected_foods = $this->input->post('selected_foods'); // غذاهای انتخاب شده

        // فرض بر این است که selected_foods آرایه‌ای از شناسه‌های غذاها است.
        $total_price = $this->calculate_total_price($selected_foods); // محاسبه قیمت کل

        $data['selected_foods'] = $selected_foods;
        $data['total_price'] = $total_price;
        
        $this->load->view('order', $data);
    }

    private function calculate_total_price($selected_foods) {
        $total_price = 0;

        // فرض بر این است که $selected_foods شامل شناسه غذاها است.
        foreach ($selected_foods as $food_id) {
            // دریافت قیمت غذا از دیتابیس
            $this->db->select('price');
            $this->db->from('foods');
            $this->db->where('id', $food_id);
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $food_price = $query->row()->price; // قیمت غذا
                $total_price += $food_price; // اضافه کردن قیمت به مجموع
            }
        }

        return $total_price;
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
