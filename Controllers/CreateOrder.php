<?php

class CreateOrder extends ControllerBase
{
    private $OrderModel;
    public function __construct()
    {
        $this->OrderModel = $this->Model("OrderModel");
    }
    public function index()
    {
        $customerName = $_POST['customer_name'];
        $phoneNumber = $_POST['phone_number'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $paymentMethodId = $_POST['Payment'];
        $selectedProducts = [];
        foreach (unserialize($_POST['data']) as $index => $product) {
            if (isset($_POST['size_' . $index]) && !empty($_POST['size_' . $index])) {
                $selectedProducts[] = [
                    'product_size_id' => $_POST['size_' . $index],
                    'quantity' => $_POST['quantity_' . $index]
                ];
            }
        }
        $id = $this->Model("CustomerModel")->AddCustomer($customerName, $phoneNumber, $address, $email);
        $idOrder = $this->Model("OrderModel")->AddOrder($id);
        $this->Model("OrderDetailModel")->AddOrderDetail($selectedProducts, $idOrder);
        $result = $this->OrderModel->GetAll();
        session_start();
        unset($_SESSION['products']);
        $this->View("index", "Admin", [
            "Page" => "OrderManager",
            "Orders" => $result,
        ]);
    }
}