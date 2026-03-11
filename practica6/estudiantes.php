<!DOCTYPE html>
<html>
<head>
    <title>Estudiantes</title>
</head>
<body>
<h2>Captura de estudiantes</h2>
<form method="post">
Cantidad de estudiantes:
<input type="number" name="cantidad">
<input type="submit" name="enviar" value="Continuar">
</form>

<?php
if(isset($_POST['enviar'])){
    $cantidad = $_POST['cantidad'];
    echo "<form method='post'>";
    for($i=0; $i<$cantidad; $i++){
        echo "<h3>Estudiante ".($i+1)."</h3>";
        echo "Matricula: ";
        echo "<input type='text' name='matricula[]'><br>";
        echo "Nombre: ";
        echo "<input type='text' name='nombre[]'><br>";
        echo "Sexo (M/F): ";
        echo "<input type='text' name='sexo[]'><br><br>";
    }
    echo "<input type='hidden' name='cantidad' value='$cantidad'>";
    echo "<input type='submit' name='guardar' value='Mostrar mujeres'>";
    echo "</form>";
}

if(isset($_POST['guardar'])){
    $cantidad = $_POST['cantidad'];
    echo "<h2>Nombres de mujeres:</h2>";
    for($i=0; $i<$cantidad; $i++){
        if($_POST['sexo'][$i] == "F"){
            echo $_POST['nombre'][$i]."<br>";
        }
    }
}
?>
</body>
</html>