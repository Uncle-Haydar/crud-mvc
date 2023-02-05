<?php

use App\Controllers\_Controller;
use App\Models\Product;

class ProductController extends _Controller
{
    public function index(): void
    {
        $db = new Product;
        $this->view("product/index", [
            'products' => $db->all('DESC'),
        ]);
    }

    /*
     * Routing to Adding page
     */
    public function add(): void
    {
        $this->view("product/add");
    }

    /*
     * Adding data into table
     */
    public function store(): void
    {
        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_FULL_SPECIAL_CHARS) === 'POST') {
            $data['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data['price'] = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data['description'] = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data['qty'] = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
            $validate = Product::validate($data);

            if (!empty($validate)) {
                $_SESSION['errors'] = $validate;
                $this->redirect('product/add');
            } else {
                $db = new Product();
                $db->insert($data);
                $_SESSION['added'] = "Product added successfully..!";
                $this->redirect('product');
            }
        }
    }

    /*
     * Routing to Edit Page
     */
    public function edit($id): void
    {
        $db = new Product();
        $this->view("product/edit", [
            'product' => $db->find($id)
        ]);
    }


    public function update(): void
    {
        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_FULL_SPECIAL_CHARS) === 'POST') {
            $id = filter_input(INPUT_POST, 'id');
            $data['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data['price'] = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data['description'] = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data['qty'] = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
            $validate = Product::validate($data);

            if (!empty($validate)) {
                $_SESSION['errors'] = $validate;
                $this->redirect('product/edit/' . $id);
            } else {
                $db = new Product();
                $db->update($id, $data);
                $_SESSION['updated'] = "Product update successfully..!";
                $this->redirect('product');
            }
        }
    }


    public function delete($id): void
    {
        $db = new Product();
        $db->delete($id);
        $_SESSION['deleted'] = "Product deleted successfully..!";
        $this->redirect('product');
    }


}
