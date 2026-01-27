<?php
// Level 4：Laravelへの最終準備（静的メソッドと継承）
// いよいよ最後、Laravelで最もよく使う「魔法」の正体を突き止めましょう。
//  Laravelでは Route::get() や Log::info() のように、new しなくても使えるメソッドが多用されます。

class Product {
    // ...これまでのプロパティやメソッド...
    public $name;
    public $price;
    public $quantity;
    //public static $amount;これはその時々で計算したい「数字」を外から投げ入れるだけなので、クラスがずっと持っておく必要はありません。

    public function __construct($name,$price,$quantity){
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    public function getSubtotal(){
        return $this->price * $this->quantity;
    }
    public function getFormattedSubtotal(){
        return number_format($this->getSubtotal())."円";
    }
    public function getResult(){
        //return "小計:".$this->getFormattedSubtotal()."円/税込み:".Product::addTax($this->getSubtotal())."円";
        $subtotal = $this->getSubtotal();
        $taxIncluded = Product::addTax($subtotal);
        return "小計:".$this->getFormattedSubtotal()."税込み:".number_format($taxIncluded)."円";
    }
    public static function addTax($amount) {
        return $amount * 1.1;
    }
}

$products = [
    new Product('Tシャツ', 1500, 2),
    new Product('腕時計', 5000, 1),
];
//$taxIncluded = Product::addTax($subtotal);
forEach($products as $product){
    echo $product->getResult() .PHP_EOL;
}

