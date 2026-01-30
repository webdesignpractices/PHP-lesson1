<?php
// 2. 実装ルール
// **有効な注文の合計金額（税込）**を計算してください。
// count が 1 以上の商品のみを計算対象にしてください。
// 消費税は 10% とします。

// 送料無料の判定を行ってください。
// 税込の合計金額が 5,000円未満 の場合、送料として 500円 を加算してください。
// 5,000円以上なら送料は 0円 です。

// 結果の出力
// 最終的な「支払い合計金額（税込＋送料）」を数値で出力してください。
// （ボーナス：余裕があれば、対象となった商品名の一覧も配列で出力してみてください）

class Product {
    public $name;
    public $price;
    public $count;
    private const TAX_RATE = 1.1;
    private const postage = 500;

    public function __construct($name,$price,$count){
        if($count>=1){
        $this->name = $name;
        $this->price = $price;
        $this->count = $count;
        }
    }
    public function Subtotal(){
        return $this->price * $this->count;
    }
    public function addTaxSub(){
        return $this->Subtotal() * self::TAX_RATE;
    }
    public function getDetailLine(){
        echo $this->name.":"."小計:".number_format($this->Subtotal())."円(税込み:".number_format($this->addTaxSub())."円)" .PHP_EOL;
    }
}

class Order {
    private $cart = [];
    public function addItem($order){
        $this->cart[] = $order;
    }
        public function displayAllItem(){
        foreach($this->cart as $item){
            $item->getDetailLine();
        }
    }
    public function Total(){
        $total = 0;
        foreach($this->cart as $item){
        $total += $item->addTaxSub();
        }
        return $total;
    }

    public function addPostageTotal($sum){
        if($sum<5000){
            return $sum+=Product::postage;
        }
        return $sum;
    }
}
$item = new Order();
$item->addItem(new Product('ノートPC', 120000, 1));
$item->addItem(new Product('マウス', 3500, 2));
$item->addItem(new Product('モニター', 25000, 0));
$item->addItem(new Product('USBメモリ', 1500, 5));

//echo $item->Total();
$item->displayAllItem();
$item->addPostageTotal($item->Total());

echo "支払い合計金額（税込＋送料）".number_format($item->addPostageTotal($item->Total()))."円" .PHP_EOL;
// $orders = [
//     ['item' => 'ノートPC', 'price' => 120000, 'count' => 1],
//     ['item' => 'マウス', 'price' => 3500, 'count' => 2],
//     ['item' => 'モニター', 'price' => 25000, 'count' => 0], // 在庫なし
//     ['item' => 'USBメモリ', 'price' => 1500, 'count' => 5],
// ];

//new Product(ノートPC1200001);を出力
// foreach($orders as $order){
//     $product = new Product($order['item'],$order['price'],$order['count']);
//     echo "new Product(" . $order['item'] . ", " . $order['price'] . ", " . $order['count'] . ");" . PHP_EOL;
//     }
