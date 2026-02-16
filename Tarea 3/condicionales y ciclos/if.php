<?php
$edad = isset($_POST["edad"]) ? (int)$_POST["edad"] : null;
?>
<form method="POST">
  <label>Ingresa tu edad:</label><br>
  <input type="number" name="edad" min="0" required>
  <button type="submit">Evaluar</button>
</form>
<?php
if ($edad < 18) {
    echo "Menor de edad<br>";
} elseif ($edad < 60) {
    echo "Adulto<br>";
} else {
    echo "Adulto mayor<br>";
}
?>