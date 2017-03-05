<?php

try{
    $db = new PDO('mysql:dbname=CodeLouisville; host=localhost', 'CodeLouPHP', 'codelou');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

?>