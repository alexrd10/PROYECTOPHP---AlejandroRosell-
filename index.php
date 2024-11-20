<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Proyecto Alejandro - Tienda Online</title>
</head>
<body>
    <nav class="navbar">
        <div class="auth-links">
            <a href="paginises.php" class="login">INICIAR SESIÓN</a>
            <a href="pagregistro.php" class="register">REGISTRARSE</a>
        </div>
    </nav>
    <h1 class="prh1">Productos</h1>  
    <?php
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
    
</body>
</html>