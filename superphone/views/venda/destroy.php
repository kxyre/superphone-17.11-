<?php
require "../../autoload.php";

$id = $_GET['id'];

$dao = new VendaDAO();
$dao->destroy($id);

header('Location: index.php');
exit;