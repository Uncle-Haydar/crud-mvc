<?php

use app\Models\Product;

class ProductController {


    public function index() {
        $db = new Product();
        View::load("product/index", [
            'products' => $db->all(),
        ]);
    }

    public function add() {
        View::load("product/add");
    }

    public function store() {
        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'POST') {

            $name = filter_input(INPUT_POST, 'name');
            $price = filter_input(INPUT_POST, 'price');
            $desc = filter_input(INPUT_POST, 'desc');
            $qty = filter_input(INPUT_POST, 'qty');

            $db = new Product();
            $sql = "INSERT INTO `products`(`name`, `price`, `description`, `qty`) "
                    . "VALUES ('$name','$price','$desc','$qty')";
            $success = $db->insert($sql);
            if ($success == true) {
                header("Location: " . BURL . "product");
                exit;
            }
        }
    }

    public function edit($id) {
        $db = new Product();
        View::load("product/edit", [
            'product' => $db->find($id)
        ]);
    }

    public function update() {
        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'POST') {

            $id = filter_input(INPUT_POST, 'id');
            $name = filter_input(INPUT_POST, 'name');
            $price = filter_input(INPUT_POST, 'price');
            $desc = filter_input(INPUT_POST, 'desc');
            $qty = filter_input(INPUT_POST, 'qty');

            $db = new Product();
            $sql = "UPDATE `products`
                    SET `name`='$name',`price`='$price',`description`='$desc',`qty`='$qty'
                    WHERE `id` = $id";
            $success = $db->update($sql);
            if ($success == true) {
                header("Location: " . BURL . "product");
                exit;
            } else {
                echo "Not inserted!!";
            }
        }
    }

    public function delete($id) {
        $db = new Product();
        $db->delete($id);
        header("Location: " . BURL . "product");
        exit;
    }

}
