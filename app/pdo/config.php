<?php
session_start();
$_SESSION['admin'] = 1234;

define("TITOLO", 'Linguaggi OOP');
define("SOTTOTITOLO", 'Un blog per te');
define("MAX_POST_PAGE", 10);


define('DB_HOST', "localhost");
define('DB_USER', "its_2018");
define('DB_PASS', "its_2018!ITS");
define('DB_NAME', "its_2018");