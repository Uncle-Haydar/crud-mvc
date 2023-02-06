<?php

namespace app\Models;

use app\Core\Validation;
use app\Models\_Model;

class Product extends _Model {

    use Validation;

    public function __construct() {
        $this->table = "products";
    }

    public static function validate(array $data): array {
        self::nameValidation($data['name']);
        self::priceValidation($data['price']);
        self::descValidation($data['description']);
        self::qtyValidation($data['qty']);

        return self::$errors;
    }

}
