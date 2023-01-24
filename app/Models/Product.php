<?php

namespace app\Models;

use app\Models\Model;

class Product extends Model
{
    public function __construct()
    {
        $this->table = "products";
        $this->allowed_col = [
            'name', 'price', 'description', 'qty'
        ];
    }

    /*
     * Input Validation
     */
    public static function validate(array $cols): array
    {
        $errors = [];

        if (empty($cols['name'])) {
            $errors['name'] = "Name field is require!!";
        } else {
            if (strlen($cols['name']) > 30) {
                $errors['name'] = "Name cant be more than 30ch!!";
            }
        }
        if (empty($cols['price'])) {
            $errors['price'] = "Price field is require!!";
        }
        if (empty($cols['description'])) {
            $errors['description'] = "Description field is require!!";
        } else {
            if (strlen($cols['description']) > 200) {
                $errors['description'] = "Description cant be more than 200ch!!";
            }
        }
        if (empty($cols['qty'])) {
            $errors['qty'] = "Quantity field is require!!";
        }

        return $errors;
    }
}
