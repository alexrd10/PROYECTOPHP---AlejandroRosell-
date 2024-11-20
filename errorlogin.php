<?php
    session_start();
    if(isset($_SESSION["msg"])) {
        echo "<p id='errorregis'>Rellena todos los campos</p>";
        unset($_SESSION['msg']);
    }
    if(isset($_SESSION["msg2"])) {
        echo "<p id='errorregis'>Usuario o Contraseña incorrectos</p>";
        unset($_SESSION['msg2']);
    }
?>