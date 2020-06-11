<?php

$pseudo = $_SESSION['pseudo'];
session_start();
session_destroy();
header("location:game.php"); 
//better than require 'game.php'; ?>