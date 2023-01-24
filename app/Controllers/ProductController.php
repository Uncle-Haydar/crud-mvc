<?php

use app\Models\Product;

class ProductController
{

    public function index(): void
    {
        $db = new Product();
        View::load("product/index", [
            'products' => $db->all(),
        ]);
    }

    /*
     * Routing to Store Function
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
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
            $qty = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_SPECIAL_CHARS);
    
            $validate = $this->validateData($_POST);

            if (!empty($validate)) {
                $_SESSION['errors'] = $validate;
                View::redirect('product/add');
            } else {
                $db = new Product();
                $db->insert([
                    'name'          => $name,
                    'price'         => $price,
                    'description'   => $description,
                    'qty'           => $qty
                ]);
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
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
            $qty = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_SPECIAL_CHARS);
    
            $validate = $this->validateData($_POST);

            if (!empty($validate)) {
                $_SESSION['errors'] = $validate;
                View::redirect('product/edit/' . $id);
            } else {
                $db = new Product();
                $db->update([
                    'id'            => $id,
                    'name'          => $name,
                    'price'         => $price,
                    'description'   => $description,
                    'qty'           => $qty
                ]);
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

    /*
     *  Validate Data 
     */
    public function validateData($data)
    {
        $validate = Product::validate([
            'name'          => $data['name'],
            'price'         => $data['price'],
            'description'   => $data['description'],
            'qty'           => $data['qty']
        ]);
        return $validate;
    }
}
