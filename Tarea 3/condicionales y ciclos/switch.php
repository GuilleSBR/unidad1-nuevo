<?php
$dia = isset($_POST["dia"]) ? (int)$_POST["dia"] : "";
?>
<form method="POST">
  <label>Ingresa un número de día (1-7):</label><br>
  <input type="number" name="dia" min="1" max="7" required>
  <button type="submit">Mostrar día</button>
</form>
<?php
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
?>