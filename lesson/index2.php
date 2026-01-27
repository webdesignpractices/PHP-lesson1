<?php
$cart = [
    ['name' => 'Tシャツ', 'price' => 1500, 'quantity' => 2],
    ['name' => '腕時計', 'price' => 5000, 'quantity' => 1],
    ['name' => '靴下', 'price' => 800, 'quantity' => 5],
];


function isLuxury($price){//関数に判定をお願いする
    return $price >= 2000;
}

$sum = 0;
forEach($cart as $item){
    $subtotal = $item['price']*$item['quantity'];
    $sum = $sum+$subtotal;
    $price = $item['price'];
    $isLuxury = isLuxury($price);
    if($isLuxury){
        $label = "[高級品]";
    }else{
        $label = "";
    }
    $display_subtotal = number_format($subtotal);
    echo "{$item['name']}:{$display_subtotal}円 {$label}" .PHP_EOL;

}
    echo "-------------------" .PHP_EOL;
    $display_sum = number_format($sum);
    echo "総合計:{$display_sum}円" .PHP_EOL;