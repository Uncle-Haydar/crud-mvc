<?php

namespace app\Models;

use app\Models\Model;

class Product extends Model
{
    public function __construct()
    {
        $this->table = "products";
        $this->allowed_col; //  Later
    }

    /*
     *  Input Validation
     */
    public static function validate(array $data): array
    {
        $errors = [];

        if (empty($data['name'])) {
            $errors['name'] = "Name field is require!!";
        } else {
            if (strlen($data['name']) > 30) {
                $errors['name'] = "Name cant be more than 30ch!!";
            }
        }
        if (empty($data['price'])) {
            $errors['price'] = "Price field is require!!";
        }
        if (empty($data['description'])) {
            $errors['description'] = "Description field is require!!";
        } else {
            if (strlen($data['description']) > 200) {
                $errors['description'] = "Description cant be more than 200ch!!";
            }
        }
        if (empty($data['qty'])) {
            $errors['qty'] = "Quantity field is require!!";
        }

        return $errors;
    }
}
