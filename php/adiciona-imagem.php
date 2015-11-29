<?php
$ds = DIRECTORY_SEPARATOR;
$storeFolder = "..{$ds}imagens{$ds}";
$urlBase = "imagens/";

$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

$tempFile = $_FILES['file']['tmp_name'];
$targetPath = $storeFolder;
$novoNome = time() . '_' . uniqid() . '.' . $ext;

if(move_uploaded_file($tempFile, $targetPath.$novoNome)){
    $res['success'] = 1;
    $res['arquivoCliente'] = $_FILES['file']['name'];
    $res['arquivoServidor'] = $novoNome;
    $res['url'] = $urlBase.$novoNome;
}

header('Content-Type: application/json');
echo json_encode($res);
