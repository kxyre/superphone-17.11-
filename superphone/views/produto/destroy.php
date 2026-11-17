<?php
require "../../autoload.php";

$id = $_GET['id'];

$dao = new produtoDAO();
$dao->destroy($id);

header('Location: index.php');
exit;