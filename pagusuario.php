<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Área Personal</title>
</head>
<body>
    <nav class="navbar">
        <h1 id="titulopag">Area Personal</h1>
    </nav>
    <nav class="navbar2">
        <?php
            session_start();
            echo "<h2 class='prh1'>Bienvenido ".$_SESSION['usuario']."</h2>";
        ?>
    </nav>
    <nav class="navbar">
        <div class="auth-links">
            <a href="finsesion.php" class="login">CERRAR SESIÓN</a>
        </div>
    </nav>
    <?php
        echo "<h1 class='h1prod'>Productos</h1>";

        # Tabla con productos
        include("conexion.php");
        $sql = "select nombre, descripcion, precio, imagen from productos";
        $result = $conn->query($sql);
        $row_count = $result->num_rows;
        echo "<table>";
        echo "<tr>";
        echo "<th>Producto</th>";
        echo "<th>Descripcion</th>";
        echo "<th>Precio</th>";
        echo "<th>Imagen</th>";
        echo "</tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['nombre']."</td>";
            echo "<td>".$row['descripcion']."</td>";
            echo "<td>".$row['precio']."€</td>";
            echo "<td><img src='imagenes/".$row['imagen']."'></td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
    <br>
    <hr>
    <br>
    
</body>
</html>