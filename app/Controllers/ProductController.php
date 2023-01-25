<?php

use app\Models\Product;

class ProductController
{

    public function index(): void
    {
        $db = new Product();
        View::load("product/index", [
            'products' => $db->all('DESC'),
        ]);
    }

    /*
     * Routing to Add page
     */
    public function add(): void
    {
        View::load("product/add");
    }

    /*
     * Store function
     */
    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            $data['price'] = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
            $data['description'] = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
            $data['qty'] = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_SPECIAL_CHARS);
    
            $validate = Product::validate($data);

            if (!empty($validate)) {
                $_SESSION['errors'] = $validate;
                View::redirect('product/add');
            } else {
                $db = new Product();
                $db->insert($data);
                $_SESSION['added'] = "Product added successfully..!";
                View::redirect('product');
            }
        }
    }

    /*
     * Routing to Edit Page
     */
    public function edit($id): void
    {
        $db = new Product();
        View::load("product/edit", [
            'product' => $db->find($id)
        ]);
    }

    /*
     * Update function
     */
    public function update(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = filter_input(INPUT_POST, 'id');
            $data['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            $data['price'] = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
            $data['description'] = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
            $data['qty'] = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_SPECIAL_CHARS);
    
            $validate = Product::validate($data);

            if (!empty($validate)) {
                $_SESSION['errors'] = $validate;
                View::redirect('product/edit/' . $id);
            } else {
                $db = new Product();
                $db->update($id, $data);
                $_SESSION['updated'] = "Product update successfully..!";
                View::redirect('product');
            }
        }
    }

    /*
     * Delete Function
     */
    public function delete($id): void
    {
        $db = new Product();
        $db->delete($id);
        $_SESSION['deleted'] = "Product deleted successfully..!";
        header("Location: " . BURL . "product");
        exit;
    }


}
