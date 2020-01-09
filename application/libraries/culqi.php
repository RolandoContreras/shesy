<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Culqi {
    public function charge($token,$price,$email,$first_name,$last_name,$address,$phone){
        require 'Requests/library/Requests.php';
        Requests::register_autoloader();
        require 'culqi-php/lib/culqi.php';
        
        
        $SECRET_KEY = "sk_test_CPp73DuovXPdX0Dh";
        $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));
        
        $charge = $culqi->Charges->create(
                array(
                  "amount" => $price,
                  "capture" => true,
                  "currency_code" => "USD",
                  "description" => "Venta de Producto FK",
                  "email" => "$email",
                  "installments" => 0,
                  "antifraud_details" => array(
                      "address" => "$address",
                      "country_code" => "PE",
                      "first_name" => "$first_name",
                      "last_name" => "$last_name",
                      "phone_number" => "$phone",
                  ),
                  "source_id" => "$token"
                )
            );
        return $charge;
    }
}

