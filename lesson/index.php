<?php
$cart = [
    ['name' => 'Tシャツ', 'price' => 1500, 'quantity' => 2],
    ['name' => '腕時計', 'price' => 5000, 'quantity' => 1],
    ['name' => '靴下', 'price' => 800, 'quantity' => 5],
];
// Tシャツ: 3000円
// 腕時計: 5000円 [高級品]
// 靴下: 4000円
// -------
// 総合計: 12000円
$sum = 0;
forEach($cart as $item){
    $subtotal = $item['price']*$item['quantity'];
    $sum = $sum+$subtotal;
    $label = "";
    if($subtotal>=2000){
        $label = "[高級品]";
    }
    echo "{$item['name']}:{$subtotal}円 {$label}" .PHP_EOL;

}
    echo "-------------------" .PHP_EOL;
    echo "総合計:{$sum}円" .PHP_EOL;