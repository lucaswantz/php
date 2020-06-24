<?php
session_start();

echo "<br>";
echo $_SESSION['cor']."<br>".$_SESSION['carro']."<br>".session_id();