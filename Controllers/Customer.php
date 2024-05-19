<?php

class Customer extends ControllerBase
{
    public function index()
    {

        $model = $this->Model("Authentication");
        $decode = $model->GenerateTokenUser($_COOKIE['AuthenticationUser']);
        $ModelCustomer = $this->Model("CustomerModel");
        $result = $ModelCustomer->GetCustomerByID($decode->IDUser);
        $this->View("index", "Customer", [
            "Page" => "home",
            "customer" => $result,
        ]);
    }
    public function CreateAccount()
    {
        $this->View("index", "Customer", [
            "Page" => "CreateAccount"
        ]);
    }
    public function Login()
    {
        $this->View('login', "Customer");
    }
    public function History()
    {
        $model = $this->Model("Authentication");
        $decode = $model->GenerateTokenUser($_COOKIE['AuthenticationUser']);
        $modelOrder = $this->Model('OrderModel');
        $result = $modelOrder->GetHistoryOrder($decode->IDUser);
        $this->View("index", "Customer", [
            "Page" => "History",
            "History" => $result,
        ]);
    }
}
