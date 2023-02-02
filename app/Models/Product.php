<?php

namespace App\Models;

use App\Models\Model;

class Product extends Model
{
    public function __construct()
    {
        $this->table = "products";
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
            if (strlen($data['name']) > 25) {
                $errors['name'] = "Name cant be more than 25ch!!";
            }
        }
        if (empty($data['price'])) {
            $errors['price'] = "Price field is require!!";
        } else {
            if (strlen($data['price']) > 6) {
                $errors['price'] = "price cant be more than 6ch!!";
            }
        }
        if (empty($data['description'])) {
            $errors['description'] = "Description field is require!!";
        } else {
            if (strlen($data['description']) > 64) {
                $errors['description'] = "Description cant be more than 64ch!!";
            }
        }
        if (empty($data['qty'])) {
            $errors['qty'] = "Quantity field is require!!";
        } else {
            if (strlen($data['qty']) > 1) {
                $errors['qty'] = "Quantity cant be more than 1ch!!";
            }
        }

        return $errors;
    }
}
