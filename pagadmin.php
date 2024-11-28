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
    <h1 class="h1prod">Pedidos</h1>
    <?php
        $usuario = $_SESSION['usuario'];
        $sql2 = "select id_pedido, usuario, fecha, importe_total from pedidos";
        $result2 = $conn->query($sql2);
        $row_count2 = $result2->num_rows;
        if ($row_count2 > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>ID_PEDIDO</th>";
            echo "<th>USUARIO</th>";
            echo "<th>FECHA_PEDIDO</th>";
            echo "<th>IMPORTE_TOTAL</th>";
            echo "<th>BORRAR_PEDIDO</th>";
            echo "</tr>";
            while($row2 = $result2->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row2['id_pedido']."</td>";
                echo "<td>".$row2['usuario']."</td>";
                echo "<td>".$row2['fecha']."</td>";
                echo "<td>".$row2['importe_total']." €</td>";
                echo "<td><a class='boton' href='eliminarPedido_Usu.php?eliminar=".$row2['id_pedido']."'>Eliminar</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }else {
            echo "<p class='carrotexto'>Aun no hay pedidos</p>";
        }
    ?>
    <br>
    <br>
    <br> 
    <hr>
    <h1 class="h1prod">Usuarios</h1>
    <?php
        $sql10 = "select * from usuarios";
        $result10 = $conn->query($sql10);
        $row_count10 = $result10->num_rows;
        echo "<table>";
        echo "<tr>";
        echo "<th>ID_USUARIO</th>";
        echo "<th>NOMBRE_USUARIO</th>";
        echo "<th>CORREO_ELECTRÓNICO</th>";
        echo "<th>CONTRASEÑA</th>";
        echo "<th>FECHA_CREACION</th>";
        echo "<th>ELIMINAR_USUARIO</th>";
        echo "</tr>";
        while($row10 = $result10->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row10['id']."</td>";
            echo "<td>".$row10['nombre']."</td>";
            echo "<td>".$row10['email']."</td>";
            echo "<td>".$row10['contraseña']."</td>";
            echo "<td>".$row10['fecha_creacion']."</td>";
            echo "<td><a class='boton' href='eliminarPedido_Usu.php?eliminar2=".$row10['id']."'>Eliminar</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
    <br>
    <br>
    <br>
</body>
</html>