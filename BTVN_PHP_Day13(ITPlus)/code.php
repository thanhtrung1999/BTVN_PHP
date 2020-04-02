<style>
    html, *{
        margin: 0;
        padding: 0;
        font-size: 1rem;
    }
    h2{
        font-size: 1.5rem;
        margin-top: 1rem;
        margin-bottom: 0.4rem;
    }
    td{
        border: 1px solid darkgray;
        padding: 1rem;
        text-align: center;
    }
    th{
        background-color: #a3faff;
        border: 1px solid darkgray;
        color: red;
        font-size: 1.2rem;
    }
    .bg-black{
        border: 1px solid black;
        border-bottom: 2px solid dimgray;
        border-right: 2px solid dimgray;
        background-color: black;
    }
</style>

<?php
echo "<h2>Bài 1</h2>";
function chuVi_dienTich_HCN($a, $b) {
    echo 'Chiều dài hình chữ nhật = ' . $a . 'm<br/>';
    echo 'Chiều rộng hình chữ nhật = ' . $b . 'm<br/>';
    echo 'Chu vi hình chữ nhật = ' . 2*($a + $b) . 'm<br/>';
    echo 'Diện tích hình chữ nhật = ' . ($a * $b) . 'm<sup>2</sup><br/>';
}
chuVi_dienTich_HCN(10, 5);

echo "<h2>Bài 2</h2>";
function chuVi_dienTich_HV($a) {
    echo 'Cạnh hình vuông = ' . $a . 'm<br/>';
    echo 'Chu vi hình vuông = ' . 4*$a . 'm<br/>';
    echo 'Diện tích hình vuông = ' . pow($a,2) . 'm<sup>2</sup><br/>';
}
chuVi_dienTich_HV(12);

echo "<h2>Bài 3</h2>";
CONST PI = 3.1416;
function chuVi_dienTich_HTron($a) {
    echo 'Đường kính hình tròn = ' . $a . 'm<br/>';
    echo 'Chu vi hình tròn = ' . PI*$a . 'm<br/>';
    echo 'Diện tích hình tròn = ' . PI*pow(($a/2),2) . 'm<sup>2</sup><br/>';
}
chuVi_dienTich_HTron(9);

echo "<h2>Bài 4</h2>";
function show_string($n){
    $char_string = 1;
    for($i=2; $i<=$n; $i++){
        $char_string .= ' - '.$i;
    }
    return $char_string;
}
echo show_string(50);

echo "<h2>Bài 5</h2>";
function result_expression($n){
    $sum = 0;
    for($i=1; $i<=$n; $i++){
        $sum += 1/$i;
    }
    return $sum;
}
function show_expresion($n){
    $string = "S($n) = 1/1";
    for($i=2; $i<=$n; $i++) {
        $string .= ' + ' . "1/$i";
    }
    return $string . ' = ' . result_expression($n);
}
echo show_expresion(15);

echo "<h2>Bài 6</h2>";
function sum_expr($n){
    $sum = 0;
    $string = "";
    for($i=1; $i<=$n; $i++){
        $sum += $i;
    }
    $string = "Tổng các số từ 1 đến $n = $sum";
    return $string;
}
echo sum_expr(50);

echo "<h2>Bài 7</h2>";
function show_character($n){
    for($i=0; $i<$n; $i++){
        for($j=0; $j<$n; $j++){
            if($i>=$j){
                echo '* ';
            }
        }
        echo '<br/>';
    }
}
show_character(5);
/*00
01 11
02 12 22
03 13 23 33
04 14 24 34 44
05 15 25 35 45 55*/

echo "<h2>Bài 8</h2>";
function show_character2($n){
    for($i=0; $i<$n; $i++){
        for($j=0; $j<$n; $j++){
            if($i>=$j){
                echo '* ';
            }
        }
        echo '<br/>';
    }
    for($i=0; $i<$n; $i++){
        for($j=0; $j<$n-1; $j++){
            if($j>=$i){
                echo '* ';
            }
        }
        echo '<br/>';
    }
}
show_character2(6);

echo '<h2>Bài 9</h2>';
?>
<table>
    <tr>
        <?php
        for($i = 1; $i <= 5; $i++) {
            echo "<th>";
            echo $i;
            echo "</th>";
        }
        ?>
    </tr>
    <tr>
        <?php
        for($i = 1; $i <= 5; $i++) {
            echo "<td>";
            for($j = 1; $j <= 10; $j ++) {
                echo "$i x $j = " . ($i * $j);
                echo "<br>";
            }
            echo "</td>";
        }
        ?>
    </tr>
    <tr>
        <?php
        for($i = 6; $i <= 10; $i++) {
            echo "<th>";
            echo $i;
            echo "</th>";
        }
        ?>
    </tr>
    <tr>
        <?php
        for($i = 6; $i <= 10; $i++) {
            echo "<td>";
            for($j = 1; $j <= 10; $j ++) {
                echo "$i x $j = " . ($i * $j);
                echo "<br>";
            }
            echo "</td>";
        }
        ?>
    </tr>
</table>

<?php
echo '<h2>Bài 10</h2>';
?>
<table cellspacing="0" style="margin-left: 1rem; border: 2px solid black;">
    <?php for($row=0; $row<8; $row++) : ?>
        <tr>
            <?php for($col=0; $col<8; $col++) :
                $class = '';
                if(($row%2==0 && $col%2==0) || ($row%2!=0 && $col%2!=0)) {
                    $class = ' class = "bg-black"';
                }
            ?>
                <td <?php echo $class; ?>></td>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>


