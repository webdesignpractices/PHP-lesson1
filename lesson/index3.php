<?php
// Level 3（オブジェクト指向の入り口）へ
// 今のコードは「手続き型」と呼ばれる書き方ですが、Laravelは**「オブジェクト指向」の塊です。 
// 次は、データをただの配列ではなく「クラス（Class）」**として扱ってみましょう！

// 【Level 3：クラスを使って商品を管理しよう】
// 以下の Product クラスを完成させて、それを使って計算・出力するように書き換えてみてください。
class Product {
    public $name;
    public $price;
    public $quantity;

    public function __construct($name, $price, $quantity) {
        // プロパティに値をセットする処理を書いてください
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getSubtotal() {
        // 小計を計算して返すメソッドを書いてください
        return $this->price * $this->quantity;
    }
    //実務では、表示用の整形もクラスの中に持たせることが多いです。
    public function getFormattedSubtotal() {
    return number_format($this->getSubtotal()) . "円";
}
}


$products = [
    new Product('Tシャツ', 1500, 2),
    new Product('腕時計', 5000, 1),
];

foreach ($products as $product) {
    // ここで $product->getSubtotal() などを使って出力
    //echo $product->getSubtotal() .PHP_EOL;
    echo $product->getFormattedSubtotal() .PHP_EOL;
}