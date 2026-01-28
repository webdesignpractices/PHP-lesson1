<?php
//index5のechoの中身を短くするためのメソッド
//Product クラスの中に「自分の情報を整形して返す」メソッドを作る
class Product {
    public $name;
    public $price;
    public $quantity;

    public function __construct($name,$price,$quantity){
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    public function getSubtotal(){
        return $this->price * $this->quantity;
    }

    public static function addTax($amount) {
        return floor($amount * 1.1);
    }
    //"Tシャツ : 小計 3,000円 (税込: 3,300円)"
    public function getDetailLine(){
        $subtotal = $this->getSubtotal();
        $taxIncluded = self::addTax($subtotal);
        return $this->name.":小計".number_format($subtotal)."円"."(税込み:".number_format($taxIncluded)."円)";
    }
}
$cart = [
    new Product('Tシャツ', 1500, 2),
    new Product('腕時計', 5000, 1),
    new Product('靴下', 800, 5),
];

foreach ($cart as $product) {
    echo $product->getDetailLine() .PHP_EOL;
}