<?php
//index1に機能を足しつつ、オブジェクト指向よりにしていく！
//カートの中身の合計値を出力するためのクラスを定義する
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
class Cart {
    private $items = [];

    public function addItem($product){
        $this->items[] = $product;
    }
    public function getTotalPrice(){
        $total = 0;
        foreach($this->items as $item){
            $subtotal = $item->getSubtotal();
            $total += Product::addTax($subtotal);
        }
        return $total;
    }

}


$cart = new Cart();
$cart->addItem(new Product('Tシャツ', 1500, 2));
$cart->addItem(new Product('腕時計', 5000, 1));
$cart->addItem(new Product('靴下', 800, 5));

echo $cart->getTotalPrice() .PHP_EOL;