<?php
echo "Clasificación de Números";

// el ciclo for inicia en 1, aumenta en 1 y termina cuando llegue a 1p
for ($i = 1; $i <= 10; $i++) {

    echo "Número $i: ";

    // condicional if si el número dividido entre 2 sobra 0 es par
    // si es falso es impar
    if ($i % 2 == 0) {
        echo "es par ";
    } else {
        echo "Es impar ";
    }
}

?>