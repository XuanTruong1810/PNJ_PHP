<?php

class StatusPayment extends ControllerBase
{
    public function index()
    {
        $orderId = $_GET['orderId'] ?? null;
        $message = $_GET['message'] ?? null;
        $modelPaymentOrder = $this->Model("PaymentOrder");

        if ($message == "Successful.") {
            $responseTime = "done";
            $modelPaymentOrder->SetPaymentStatus($orderId, $responseTime);
        } else {
            $modelPaymentOrder->SetPaymentStatus($orderId, null);
        }
        $this->View("statusPayment", "Home", [
            "Message" => $message
        ]);
    }
}
