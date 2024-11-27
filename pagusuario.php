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
    <h1 class="h1prod">Tus pedidos</h1>
    <?php
        $usuario = $_SESSION['usuario'];
        $sql2 = "select id_pedido, fecha, importe_total from pedidos where usuario = '$usuario'";
        $result2 = $conn->query($sql2);
        $row_count2 = $result2->num_rows;
        if ($row_count2 > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>ID_PEDIDO</th>";
            echo "<th>FECHA_PEDIDO</th>";
            echo "<th>IMPORTE_TOTAL</th>";
            echo "</tr>";
            while($row2 = $result2->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row2['id_pedido']."</td>";
                echo "<td>".$row2['fecha']."</td>";
                echo "<td>".$row2['importe_total']." €</td>";
                echo "</tr>";
            }
            echo "</table>";
        }else {
            echo "<p class='carrotexto'>Aun no has hecho ningun pedido</p>";
        }
    ?>
    <br>
    <hr>
    <h1 class="h1prod">Tu carrito</h1>
    <div class="carrotexto">
    <?php
        /* Ver carrito de la compra*/
        if (isset($_SESSION['carrito'])) {
            $productoscarrito = $_SESSION['carrito'];
            $precioQM = 12;
            $precioEJEMPLO = 100.01;
            $precioTOMCHERR = 1.43;
            $precioTURR = 8.95;

            foreach ($productoscarrito as $prod => $cantidad) {
                if ($prod == 'QuesoManchego')  {
                    $resultadoQM = $precioQM * $cantidad;
                    echo "<p class='carrotexto'>$prod: $cantidad x $precioQM € = $resultadoQM €</p>";
                }
                if ($prod == 'TomateCherry')  {
                    $resultadoTOMCHERR = $precioTOMCHERR * $cantidad;
                    echo "<p class='carrotexto'>$prod: $cantidad x $precioTOMCHERR € = $resultadoTOMCHERR €</p>";
                }
                if ($prod == 'TurronDuro')  {
                    $resultadoTURR = $precioTURR * $cantidad;
                    echo "<p class='carrotexto'>$prod: $cantidad x $precioTURR €  = $resultadoTURR €</p>";
                }
                if ($prod == 'Ejemplo')  {
                    $resultadoEJEMPLO = $precioEJEMPLO * $cantidad;
                    echo "<p class='carrotexto'>$prod: $cantidad x $precioEJEMPLO € = $resultadoEJEMPLO €</p>";
                }
            }
            /* Esto que declaro es por si las variables aun no estan definidas, para que el valor por defecto sea 0 */
            $resultadoQM =  $resultadoQM ?? 0;
            $resultadoTOMCHERR =  $resultadoTOMCHERR ?? 0;
            $resultadoTURR =  $resultadoTURR ?? 0;
            $resultadoEJEMPLO =  $resultadoEJEMPLO ?? 0;

            /* Calcular precio total */
            $preciototal = $resultadoQM + $resultadoTOMCHERR + $resultadoTURR + $resultadoEJEMPLO;
            echo "<p class='carrotexto'>Precio total del carrito = ".$preciototal." €</p>";
            $_SESSION['preciototal'] = $preciototal;
        }
        else {
            echo "<p class='carrotexto'>El carrito esta vacio</p>";
        }
    ?>
    <a class="boton" href="addCarrito.php?finalizar=1">Finalizar Pedido</a>
    <br>
    <br>
    <br>
    <hr>
    </div>
    <h1 class="h1prod">Añadir o restar productos al carrito</h1>
    <div class="form-box">
        <form action="addCarrito.php" method="GET">
            <input type="hidden" id="nombreprod" name="nombreprod" value="QuesoManchego">
            <label for="cantidad">Queso Manchego: </label>
            <input type="number" id="cantidad" name="cantidad">
            <input type="submit" value="Añadir">
        </form>
        <form action="addCarrito.php" method="GET">
            <input type="hidden" id="nombreprod" name="nombreprod" value="TomateCherry">
            <label for="cantidad">Tomate Cherry: </label>
            <input type="number" id="cantidad" name="cantidad">
            <input type="submit" value="Añadir">
        </form>
        <form action="addCarrito.php" method="GET">
            <input type="hidden" id="nombreprod" name="nombreprod" value="TurronDuro">
            <label for="cantidad">Turron Duro: </label>
            <input type="number" id="cantidad" name="cantidad">
            <input type="submit" value="Añadir">
        </form>
        <form action="addCarrito.php" method="GET">
            <input type="hidden" id="nombreprod" name="nombreprod" value="Ejemplo">
            <label for="cantidad">Ejemplo: </label>
            <input type="number" id="cantidad" name="cantidad">
            <input type="submit" value="Añadir">
        </form>
        <form action="addCarrito.php" method="GET">
            <input type="hidden" name="vaciar" id="vaciar" value="1">
            <label for="borrar">Vaciar Todo El Carrito: </label>
            <input type="submit" value="Vaciar">
        </form>
    </div>
    <br>
    <br>
    <br>
</body>
</html>