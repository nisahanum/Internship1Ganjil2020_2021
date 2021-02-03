<?php
include 'functions.php';
if (is_file($_GET['m'] . '_csv.php'))
    include $_GET['m'] . '_csv.php';
