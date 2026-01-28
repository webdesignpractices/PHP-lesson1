<?php
//最終ミッション：ショッピングカートの合計を出そう
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
}
// --- ここから下が実践編 ---

$cart = [
    new Product('Tシャツ', 1500, 2),
    new Product('腕時計', 5000, 1),
    new Product('靴下', 800, 5),
];

$totalTaxIncluded = 0; // 総合計（税込）を入れる箱

foreach ($cart as $product) {
    // 1. この商品の小計（税抜）を出す
    $subtotal = $product->getSubtotal();
    // 2. その小計を addTax して、税込金額を出す
    $taxIncluded = Product::addTax($subtotal);
    // 3. 総合計の箱（$totalTaxIncluded）に、今回の税込金額を足していく
    $totalTaxIncluded = $totalTaxIncluded + $taxIncluded;
    // 4. 商品名、小計、税込を表示する（number_formatを忘れずに！）
    echo $product->name .":".number_format($subtotal)."円/税込み:".number_format($taxIncluded)."円" .PHP_EOL;
}

echo "-------------------" . PHP_EOL;
echo "総合計（税込）: " . number_format($totalTaxIncluded) . "円" . PHP_EOL;