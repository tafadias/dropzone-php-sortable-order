<?php
$ds = DIRECTORY_SEPARATOR;
$storeFolder = "..{$ds}imagens{$ds}";
$urlBase = "imagens/";

$result  = array();

if(is_dir($storeFolder)){
    $files = scandir($storeFolder);                 //1
    if ( false !== $files ) {
        $i = 0;
        foreach ( $files as $file ) {
            if ( '.'!=$file && '..'!=$file) {       //2
                $obj['arquivoCliente'] = $file;
                $obj['arquivoServidor'] = $file;
                $obj['tamanho'] = filesize($storeFolder.$ds.$file);
                $obj['url'] = $urlBase . $file;
                $obj['ordem'] = $i++;
                
                $result[] = $obj;
            }
        }
    }
}

//header('Content-type: text/json');              //3
header('Content-Type: application/json');
echo json_encode($result);
