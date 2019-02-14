<?php

session_start();
include './inc/header.php';


if (isset($_SESSION['login'])) {
    
    echo "esto es el chat, el cual no me ha dado tiempo";


    //$fecha= date(10, 8, 2020);
} else {
    echo'<p>NO tienes permisos,pulsa <a href="index.php">aquí</a> para registrate</p>';
}

include './inc/footer.php';
