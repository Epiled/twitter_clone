<?php

    session_start();

    echo($_SESSION['usuario']."</br> obrigado pela sua compania volte logo");

    unset($_SESSION['usuario']);
    unset($_SESSION['email']);

?>