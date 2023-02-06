<?php

namespace app\Core;

trait Validation {

    protected static array $errors = [];

    protected static function nameValidation($name): void {
        if (empty($name)) {
            self::$errors['name'] = "Name field is require!!";
        } else {
            if (strlen($name) > 25) {
                self::$errors['name'] = "Name cant be more than 25ch!!";
            }
        }
    }

    protected static function priceValidation($price): void {
        if (empty($price)) {
            self::$errors['price'] = "Price field is require!!";
        } else {
            if (strlen($price) > 6) {
                self::$errors['price'] = "price cant be more than 6ch!!";
            }
        }
    }

    protected static function descValidation($description): void {
        if (empty($description)) {
            self::$errors['description'] = "Description field is require!!";
        } else {
            if (strlen($description) > 64) {
                self::$errors['description'] = "Description cant be more than 64ch!!";
            }
        }
    }

    protected static function qtyValidation($qty): void {
        if (empty($qty)) {
            self::$errors['qty'] = "Quantity field is require!!";
        } else {
            if (strlen($qty) > 1) {
                self::$errors['qty'] = "Quantity cant be more than 1ch!!";
            }
        }
    }

}
