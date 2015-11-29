<?php
$ds = DIRECTORY_SEPARATOR;
$storeFolder = "..{$ds}imagens{$ds}";

$imagem = $storeFolder . $_POST['imagem'];

header('Content-Type: application/json');

if(is_file($imagem)){
    if(unlink($imagem)){
        return json_encode(array("success" => "1"));
    }
}

return json_encode(array("success" => "0"));
