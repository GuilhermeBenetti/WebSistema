<?php

define('HOST', 'localhost:3306');
define('USER', 'fmanhaes_guilherme_megapontocom');
define('PASS', 'Meg@com2021');
define('DBNAME', 'fmanhaes_clientes_primeiraconsulta');

$conn = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';',USER, PASS);