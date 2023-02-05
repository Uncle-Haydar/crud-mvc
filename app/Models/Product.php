<?php

namespace App\Models;

use App\Models\_Model;

class Product extends _Model
{
    private static array $errors = [];

    public function __construct()
    {
        $this->table = "products";
    }

    public static function validate(array $data): array
    {
        self::nameValidation($data['name']);
        self::priceValidation($data['price']);
        self::descValidation($data['description']);
        self::qtyValidation($data['qty']);

        return self::$errors;
    }

    private static function nameValidation($name): void
    {
        if (empty($name)) {
            self::$errors['name'] = "Name field is require!!";
        } else {
            if (strlen($name) > 25) {
                self::$errors['name'] = "Name cant be more than 25ch!!";
            }
        }
    }

    private static function priceValidation($price): void
    {
        if (empty($price)) {
            self::$errors['price'] = "Price field is require!!";
        } else {
            if (strlen($price) > 6) {
                self::$errors['price'] = "price cant be more than 6ch!!";
            }
        }
    }

    private static function descValidation($description): void
    {
        if (empty($description)) {
            self::$errors['description'] = "Description field is require!!";
        } else {
            if (strlen($description) > 64) {
                self::$errors['description'] = "Description cant be more than 64ch!!";
            }
        }
    }

    private static function qtyValidation($qty): void
    {
        if (empty($qty)) {
            self::$errors['qty'] = "Quantity field is require!!";
        } else {
            if (strlen($qty) > 1) {
                self::$errors['qty'] = "Quantity cant be more than 1ch!!";
            }
        }
    }
}
