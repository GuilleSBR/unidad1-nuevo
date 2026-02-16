<?php
//condicionales if,else, elseif
//compara si la edad es menor de 18, en ese caso muestra que es menor de edad
//si es falso pero es menor a 60 muestra "Adulto"
//si tambien es falso lo anterior muestra "afulto mayor"
if ($edad < 18) {
    echo "Menor de edad<br>";
} elseif ($edad < 60) {
    echo "Adulto<br>";
} else {
    echo "Adulto mayor<br>";
}
//switch
//de acuerdo a la variable dia buscara un caso con lo mismo que la variable
// y mostra su respectivo resultado, en caso de no estar el caso especifico mostrara "es otro dia:
$dia = 1;

switch ($dia) {
    case 1:
        echo "Hoy es lunes<br>";
        break;
    case 2:
        echo "Hoy es martes<br>";
        break;
    default:
        echo "Es otro día<br>";
}
//for
//es un cilo con contador que muesta el valor del ciclo for mientra la vairable 1 sea menor o igual a 3
for ($i = 1; $i <= 3; $i++) {
    echo "For: $i<br>";
}
//while
// repite mientras se cumpla una condicion en este caso la condicion esque j sea menor/igual a 3
$j = 1;
while ($j <= 3) {
    echo "While: $j<br>";
    $j++;
}
//do while
// a diferencia del while primero ejecuta el codigo y luego evalua la condicion
$k = 1;
do {
    echo "Do While: $k<br>";
    $k++;
} while ($k <= 3);
//foreach
//el foreach es util para recorrer arreglos 
$frutas = ["Manzana", "Plátano", "Naranja"];

foreach ($frutas as $fruta) {
    echo "Fruta: $fruta<br>";
}
?>