<?php
error_reporting(E_ERROR | E_PARSE);
$InputSearch  = $_POST['InputSeach'];

if ($InputSearch != "") {
    $url = file_get_contents('db/Tutorial.json');
    $json = json_decode($url);
    foreach ($json as $tutorial) {
        $sistema = 1;
        $valida = false;
        while ($valida == false) {
            if ($tutorial->search->$sistema) {
                if ($tutorial->search->$sistema == $InputSearch) {
                    echo $tutorial->share;
                    $erro = 1;
                    $valida = true;
                }
                $sistema = $sistema + 1;
            } else {
                if ($erro != 1) {
                    $erro = 2;
                }
                $valida = true;
            }
        }
    }
} else {
    echo '<script>window.location.href="../"</script>';
}
