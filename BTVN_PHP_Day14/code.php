<?php

echo "<h2>Bài 4</h2>";
$arrs = array("Italy" => "Rome", "Luxembourg" => "Luxembourg", "Belgium" => "Brussels", "Denmark" => "Copenhagen", "Finland" => "Helsinki", "France" => "Paris", "Slovakia" => "Bratislava", "Slovenia" => "Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland" => "Dublin", "Netherlands" => "Amsterdam", "Portugal" => "Lisbon", "Spain" => "Madrid", "Sweden" => "Stockholm", "United Kingdom" => "London", "Cyprus" => "Nicosia", "Lithuania" => "Vilnius", "Czech Republic" => "Prague", "Estonia" => "Tallin", "Hungary" => "Budapest", "Latvia" => "Riga", "Malta" => "Valetta", "Austria" => "Vienna", "Poland" => "Warsaw");
/*echo "<pre>";
print_r($arrs);
echo "</pre>";*/
foreach ($arrs AS $key => $value){
    echo "Thủ đô của $key là $value <br/>";
}

echo "<h2>Bài 5</h2>";
$a = array("a"=>array("b"=>0, "c"=>1), "b"=>array("e"=>2, "o"=>array("b"=>3)));
echo "<pre>";
echo print_r($a);
echo "</pre>";
echo $a['b']['o']['b'] . "<br/>";
echo $a['a']['c'] . "<br/>";
echo "<pre>";
print_r($a['a']);
echo "</pre>";

echo "<h2>Bài 11</h2>";
$array = array(1, 2, 3, 4, 5);
echo "Mảng trước khi xóa phần tử thứ 3:";
echo "<pre>";
echo print_r($array);
echo "</pre>";

unset($array['3']);
$new_arr = array_values($array);
echo "Mảng sau khi xóa p.tử thứ 3:";
echo "<pre>";
echo print_r($array);
echo "</pre>";

echo "<h2>Bài 13</h2>";
$numbers = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73];
echo "<pre>";
print_r($numbers);
echo "</pre>";
function sum($arr){
    $sum = 0;
    for($i=0; $i<count($arr); $i++){
        $sum += $arr[$i];
    }
    return $sum;
}
$avg = sum($numbers) / count($numbers);
echo "Giá trị trung bình: $avg <br/>";
$new_arr = array_values(array_unique($numbers));
echo "Các số lớn hơn giá trị trung bình là: ";
for($i=0; $i<count($new_arr); $i++){
    if($new_arr[$i]>$avg){
        echo $new_arr[$i] . ' ';
    }
}
echo "<br/>Các số nhỏ hơn giá trị trung bình là: ";
for($i=0; $i<count($new_arr); $i++){
    if($new_arr[$i]<$avg){
        echo $new_arr[$i] . ' ';
    }
}