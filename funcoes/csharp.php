<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Site Metas -->
    <?php
    error_reporting(E_ERROR | E_PARSE);
    $url = file_get_contents('http://weduc.natalnet.br/api/languages/74/functions');
    $url_Share = "https://weduc.natalnet.br/sbotics/funcoes/csharp.php";
    $searchText = $_GET['share'];
    if ($searchText != "") {
        $pretext = "";
        $leads = json_decode($url);
        foreach ($leads as $contact) {
            if ($contact->name == $searchText && $target_description != "") {
                $name = $contact->name;
                $Share = $name;
                $Description = $contact->target_description;
                $Quebra_1 = str_replace('<b>', '', $Description);
                $Quebra_2 = str_replace('<mspace=12px><mark=#eeeeee55>', '', $Quebra_1);
                $Quebra_3 = str_replace('</mark></mspace>', '', $Quebra_2);
                $Quebra_4 = str_replace('</b>', '', $Quebra_3);
                $type = "\r\nTipo: " . $contact->type;
                switch ($contact->return_type) {
                    case "float":
                        $return_type = "\r\nRetorno: numero";
                        break;
                    case "String":
                        $return_type = "\r\nRetorno: texto";
                        break;
                    case "boolean":
                        $return_type = "\r\nRetorno: booleano";
                        break;
                }
                $parametro = "\r\nParâmetro: " . $contact->parameters;
                echo '<title> ' . $name . ' | C# - Funções sBotics</title>';
                echo ' <meta name="description" content="' . $Quebra_4 . $type . $return_type . $parametro . '">';
            }
        }
        setcookie("SearchDadosCsharp", "$searchText", time() + (5), "/");
        header('Location: csharp.php');
    } else if ($_COOKIE['SearchDadosCsharp'] != "") {
        $pretext = "";
        $leads = json_decode($url);
        foreach ($leads as $contact) {
            if ($contact->name == $_COOKIE['SearchDadosCsharp']) {
                $name = $contact->name;
                $Share = $name;
                $Description = $contact->description;
                $Quebra_1 = str_replace('<b>', '', $Description);
                $Quebra_2 = str_replace('<mspace=12px><mark=#eeeeee55>', '', $Quebra_1);
                $Quebra_3 = str_replace('</mark></mspace>', '', $Quebra_2);
                $Quebra_4 = str_replace('</b>', '', $Quebra_3);
                $type = "\r\nTipo: " . $contact->type;
                switch ($contact->return_type) {
                    case "float":
                        $return_type = "\r\nRetorno: numero";
                        break;
                    case "String":
                        $return_type = "\r\nRetorno: texto";
                        break;
                    case "boolean":
                        $return_type = "\r\nRetorno: booleano";
                        break;
                }
                $parametro = "\r\nParâmetro: " . $contact->parameters;
                echo '<title> ' . $name . ' | C# - Funções sBotics</title>';
                echo ' <meta name="description" content="' . $Quebra_4 . $type . $return_type . $parametro . '">';
            }
        }
    } else {
        echo '<title>Funções sBotics - Robótica Simulada</title>';
        echo ' <meta name="description" content="
        Nesta página apresentamos as funções que podem ser utilizadas pelos robôs do simulador sBotics. Observe atentamente aos parâmetros (tipos e quantidades) e os retornos de cada função para sua correta utilização.
       ">';
        $Share = "";
    }
    ?>
    <meta name="keywords" content="simulação, sBotics, OBR, simulada, C#">
    <meta name="author" content="WEduc">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="../images/favicon.png" type="image/png" />
    <link rel="apple-touch-icon" href="../images/favicon.png" />
    <?php
    $OrdenadorMode = $_GET['o'];

    if ($OrdenadorMode != "") {
        setcookie("OrdenadorReduc", "$OrdenadorMode", time() + (5), "/");
        header('Location: csharp.php');
    }

    if (!isset($_COOKIE["Linguagem"])) {
        setcookie("Linguagem", "csharp", time() + (86400 * 30), "/");
    } else {
        $Linguagem = $_COOKIE["Linguagem"];
        if ($Linguagem != "csharp") {
            setcookie("Linguagem", "csharp", time() + (86400 * 30), "/");
        }
    }
    $InputMode = $_GET['m'];
    if ($InputMode == "") {
        if (isset($_COOKIE["Mode"])) {
            switch ($_COOKIE["Mode"]) {
                case 'dark':
                    echo '<link rel="stylesheet" href="css/BlackMode_Function.css?version=7" />';
                    echo '<script>darkMode = 1</script>';
                    break;
                case 'white':
                    echo '<link rel="stylesheet" href="css/WhiteMode_Function.css?version=7" />';
                    echo '<script>darkMode = 0</script>';
                    break;
                default:
                    echo '<link rel="stylesheet" href="css/WhiteMode_Function.css?version=7" />';
                    echo '<script>darkMode = 0</script>';
                    break;
            }
        } else {
            echo '<link rel="stylesheet" href="css/WhiteMode_Function.css?version=4" />';
            echo '<script>darkMode = 0</script>';
        }
    } else {
        switch ($InputMode) {
            case 'V6Y95KtZQXHP':
                setcookie("Mode", "white", time() + (86400 * 30), "/");
                echo '<link rel="stylesheet" href="css/WhiteMode_Function.css?version=7" />';
                echo '<script>darkMode = 0</script>';
                header('Location: csharp.php');
                break;
            case '5MAcmRtiNQQA':
                setcookie("Mode", "dark", time() + (86400 * 30), "/");
                echo '<link rel="stylesheet" href="css/BlackMode_Function.css?version=7" />';
                echo '<script>darkMode = 1</script>';
                header('Location: csharp.php');
                break;

            default:
                echo '<link rel="stylesheet" href="css/WhiteMode_Function.css?version=5" />';
                echo '<script>darkMode = 0</script>';
                header('Location: csharp.php');
                break;
        }
    }
    ?>
    <!-- CSS -->
    <link rel="stylesheet" href="font-awesome/css/all.css">
    <!-- Sistema de Alerta -->
    <script src="sweet/sweetalert2.all.min.js"></script>
</head>

<?php
if ($Share != "") {
    echo '<script>shareResponse = "' . $Share . '"</script>';
} else {
    echo '<script>shareResponse = ""</script>';
}
?>


<body>
    <div id="conteined" class="conteined">
        <nav>
            <div id="Header">
                <div class="contentLogo">
                    <img id="LOGO" class="Logo" src="img/logo.png" alt="sBotics">
                    <div id="barra"></div>
                    <span>C#</span>
                </div>
                <div class="Menu">
                    <div class="RE">
                        <span id="RE">RE</span>
                    </div>
                    <div class="csharp">
                        <span id="CSHARP">C#</span>
                    </div>
                </div>
            </div>
        </nav>
        <div class="AjusteCompatibilidade">
            <div class="MobileHeader">
                <div class="AjusteMobileHeader">
                    <div class="DireitaMobileHeader">
                        <h1 class="txtCentroMobileHeader">Funções do Robô</h1>
                    </div>
                    <div class="EsquerdaMobileHeader">
                        <div onclick="Indisponivel()" class="btn_Tutoriais">Tutorial</div>
                    </div>
                </div>
            </div>
        </div>

        <div id="Visualization" class="contentViewResult">
            <?php
            error_reporting(E_ERROR | E_PARSE);
            $RequestAll = 0;
            $searchText = $_COOKIE['SearchDadosCsharp'];
            if ($searchText != "") {
                $RequestAll = 1;
                $pretext = "";
                $leads = json_decode($url);
                $SearchTrue = 0;
                foreach ($leads as $contact) {
                    if ($contact->name == $searchText && $contact->target_description != "") {
                        echo '<div class="ViewResult" id="' . $contact->name . '">';
                        echo '<div class="AjusteViewResult"><div class="Result">';
                        echo '<h1 class="Name">' . $contact->name . '</h1>';
                        echo ' <p class="Info">';
                        $Quebra_1 = str_replace('Exemplo:', '</p><h2 class="Exemplo">Exemplo: </h2>', $contact->target_description);
                        $Quebra_2 = str_replace('Código:', '<p class="Codigo"><b class="Bold">Código: </b>', $Quebra_1);
                        $Quebra_3 = str_replace('Descrição:', '</p><p class="Codigo"><b class="Bold">Descrição: </b>', $Quebra_2);
                        echo '' . $Quebra_3 . '</p>';
                        echo '<p class="Type"><b class="Bold">Tipo: </b>' . $contact->type . '</p>';
                        switch ($contact->return_type) {
                            case "float":
                                echo '<p class="Type"><b class="Bold">Retorno:</b> numero</p>';
                                break;
                            case "String":
                                echo '<p class="Type"><b class="Bold">Retorno:</b> texto</p>';
                                break;
                            case "boolean":
                                echo '<p class="Type"><b class="Bold">Retorno:</b> booleano</p>';
                                break;
                        }
                        echo '<p class="Type"><b class="Bold">Parâmetro: </b>' . $contact->parameters . '</p>';
                        $Quebra_1 = str_replace('<b>Exemplo:</b>', 'Exemplo: ', $contact->target_description);
                        $Quebra_2 = str_replace('<mspace=12px><mark=#eeeeee55>', '', $Quebra_1);
                        $Quebra_3 = str_replace('</mark></mspace>', '', $Quebra_2);
                        $Quebra_4 = str_replace('<mspace=12px><mspace=2.1em><mark=#eeeeee55>', '', $Quebra_3);
                        $array = explode(" ",  $Quebra_4);
                        $CodigoFinal = "";
                        $Codigo =  array_search('Código:',  $array) + 1;
                        $Descrição = array_search('Descrição:',  $array) - 1;
                        if ($Descrição != "" && $Descrição != "-1") {
                            while ($Codigo <= $Descrição) {
                                $CodigoFinal .= $array[$Codigo];
                                $Codigo = $Codigo + 1;
                            }
                        } else {
                            $list = array_slice($array, $Codigo);
                            $CodigoFinal = implode("",  $list);
                        }
                        $CodigoFinal = str_replace('<b>', '',  $CodigoFinal);
                        $CodigoFinal = str_replace('</b>', '',  $CodigoFinal);
                        $CodigoFinal = str_replace('"', '',  $CodigoFinal);
                        $CodigoFinal = preg_replace("/\s+/", "", $CodigoFinal);
                        $copi = "'" . trim($CodigoFinal) . "'";
                        $ShareOther = "'$contact->name'";
                        echo '</div>
                            <div class="ActionView">
                                <i onclick="copiar(' . $copi . ')" class="fa fa-clone Copy" aria-hidden="true"></i>
                                <i onclick="ShareSelection(' . $ShareOther . ')" class="fa fa-share Share" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>';
                        $SearchTrue = 1;
                    }
                }
                if ($SearchTrue == 0) {
                    echo '<div id="BlackFundo">';
                    echo "<script>
                    let timerInterval
                    Swal.fire({
                        icon: 'error',
                        title:'" . $searchText . " | C# - Não encontrado!',
                        html: 'Redirecionando para <b>Funções C#</b>...',
                        timer: 3000,
                        timerProgressBar: true,
                        onClose: () => {
                            window.location.href = \"csharp.php\";
                        }
                    }).then(function(result) {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            window.location.href = \"csharp.php\";
                        }
                    })
                    setTimeout(function() {
                        window.location.href = \"csharp.php\";
                    },3000);
                    ";
                    echo '</script></div>';
                }
            } else if ($_COOKIE["OrdenadorReduc"] != "") {
                switch ($_COOKIE["OrdenadorReduc"]) {
                    case '0KIj5fcfeMzp':
                        $arr = json_decode($url, true);
                        $sort = array();
                        foreach ($arr as $k => $v) {
                            $sort['name'][$k] = $v['name'];
                            $sort['target_description'][$k] = $v['target_description'];
                            $sort['type'][$k] = $v['type'];
                            $sort['return_type'][$k] = $v['return_type'];
                            $sort['parameters'][$k] = $v['parameters'];
                        }

                        array_multisort($sort['name'], SORT_ASC, $sort['target_description'], SORT_ASC, $sort['type'], SORT_ASC, $sort['return_type'], SORT_ASC, $sort['parameters'], SORT_ASC, $arr);

                        foreach ($arr as $k => $v) {
                            if ($sort['target_description'][$k] = $v['target_description'] != "") {
                                echo '<div class="ViewResult" id="' . $sort['name'][$k] = $v['name'] . '">';
                                echo '<div class="AjusteViewResult"><div class="Result">';
                                echo '<h1 class="Name">' . $sort['name'][$k] = $v['name'] . '</h1>';
                                echo ' <p class="Info">';
                                $Quebra_1 = str_replace('Exemplo:', '</p><h2 class="Exemplo">Exemplo: </h2>', $sort['target_description'][$k] = $v['target_description']);
                                $Quebra_2 = str_replace('Código:', '<p class="Codigo"><b class="Bold">Código: </b>', $Quebra_1);
                                $Quebra_3 = str_replace('Descrição:', '</p><p class="Codigo"><b class="Bold">Descrição: </b>', $Quebra_2);
                                echo '' . $Quebra_3 . '</p>';
                                echo '<p class="Type"><b class="Bold">Tipo: </b>' . $sort['name'][$k] = $v['type'] . '</p>';
                                switch ($sort['return_type'][$k] = $v['return_type']) {
                                    case "float":
                                        echo '<p class="Type"><b class="Bold">Retorno:</b> numero</p>';
                                        break;
                                    case "String":
                                        echo '<p class="Type"><b class="Bold">Retorno:</b> texto</p>';
                                        break;
                                    case "boolean":
                                        echo '<p class="Type"><b class="Bold">Retorno:</b> booleano</p>';
                                        break;
                                }
                                echo '<p class="Type"><b class="Bold">Parâmetro: </b>' . $sort['parameters'][$k] = $v['parameters'] . '</p>';
                                $Quebra_1 = str_replace('<b>Exemplo:</b>', 'Exemplo: ', $sort['target_description'][$k] = $v['target_description']);
                                $Quebra_2 = str_replace('<mspace=12px><mark=#eeeeee55>', '', $Quebra_1);
                                $Quebra_3 = str_replace('</mark></mspace>', '', $Quebra_2);
                                $Quebra_4 = str_replace('<mspace=12px><mspace=2.1em><mark=#eeeeee55>', '', $Quebra_3);
                                $array = explode(" ",  $Quebra_4);
                                $CodigoFinal = "";
                                $Codigo =  array_search('Código:',  $array) + 1;
                                $Descrição = array_search('Descrição:',  $array) - 1;
                                if ($Descrição != "" && $Descrição != "-1") {
                                    while ($Codigo <= $Descrição) {
                                        $CodigoFinal .= $array[$Codigo];
                                        $Codigo = $Codigo + 1;
                                    }
                                } else {
                                    $list = array_slice($array, $Codigo);
                                    $CodigoFinal = implode("",  $list);
                                }
                                $CodigoFinal = str_replace('<b>', '',  $CodigoFinal);
                                $CodigoFinal = str_replace('</b>', '',  $CodigoFinal);
                                $CodigoFinal = str_replace('"', '',  $CodigoFinal);
                                $CodigoFinal = preg_replace("/\s+/", "", $CodigoFinal);
                                $copi = "'" . trim($CodigoFinal) . "'";
                                $ShareOther = "'" . $sort['name'][$k] = $v['name'] . "'";
                                echo '</div>
                                <div class="ActionView">
                                    <i onclick="copiar(' . $copi . ')" class="fa fa-clone Copy" aria-hidden="true"></i>
                                    <i onclick="ShareSelection(' . $ShareOther . ')" class="fa fa-share Share" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>';
                            }
                        }
                        break;
                    case 'Q9yiFAnY6WRP':
                        $arr = json_decode($url, true);
                        $sort = array();
                        foreach ($arr as $k => $v) {
                            $sort['name'][$k] = $v['name'];
                            $sort['target_description'][$k] = $v['target_description'];
                            $sort['type'][$k] = $v['type'];
                            $sort['return_type'][$k] = $v['return_type'];
                            $sort['parameters'][$k] = $v['parameters'];
                        }

                        array_multisort($sort['name'], SORT_DESC, $sort['target_description'], SORT_DESC, $sort['type'], SORT_DESC, $sort['return_type'], SORT_DESC, $sort['parameters'], SORT_DESC, $arr);

                        foreach ($arr as $k => $v) {
                            if ($sort['target_description'][$k] = $v['target_description'] != "") {
                                echo '<div class="ViewResult" id="' . $sort['name'][$k] = $v['name'] . '">';
                                echo '<div class="AjusteViewResult"><div class="Result">';
                                echo '<h1 class="Name">' . $sort['name'][$k] = $v['name'] . '</h1>';
                                echo ' <p class="Info">';
                                $Quebra_1 = str_replace('Exemplo:', '</p><h2 class="Exemplo">Exemplo: </h2>', $sort['target_description'][$k] = $v['target_description']);
                                $Quebra_2 = str_replace('Código:', '<p class="Codigo"><b class="Bold">Código: </b>', $Quebra_1);
                                $Quebra_3 = str_replace('Descrição:', '</p><p class="Codigo"><b class="Bold">Descrição: </b>', $Quebra_2);
                                echo '' . $Quebra_3 . '</p>';
                                echo '<p class="Type"><b class="Bold">Tipo: </b>' . $sort['name'][$k] = $v['type'] . '</p>';
                                switch ($sort['return_type'][$k] = $v['return_type']) {
                                    case "float":
                                        echo '<p class="Type"><b class="Bold">Retorno:</b> numero</p>';
                                        break;
                                    case "String":
                                        echo '<p class="Type"><b class="Bold">Retorno:</b> texto</p>';
                                        break;
                                    case "boolean":
                                        echo '<p class="Type"><b class="Bold">Retorno:</b> booleano</p>';
                                        break;
                                }
                                echo '<p class="Type"><b class="Bold">Parâmetro: </b>' . $sort['parameters'][$k] = $v['parameters'] . '</p>';
                                $Quebra_1 = str_replace('<b>Exemplo:</b>', 'Exemplo: ', $sort['target_description'][$k] = $v['target_description']);
                                $Quebra_2 = str_replace('<mspace=12px><mark=#eeeeee55>', '', $Quebra_1);
                                $Quebra_3 = str_replace('</mark></mspace>', '', $Quebra_2);
                                $Quebra_4 = str_replace('<mspace=12px><mspace=2.1em><mark=#eeeeee55>', '', $Quebra_3);
                                $array = explode(" ",  $Quebra_4);
                                $CodigoFinal = "";
                                $Codigo =  array_search('Código:',  $array) + 1;
                                $Descrição = array_search('Descrição:',  $array) - 1;
                                if ($Descrição != "" && $Descrição != "-1") {
                                    while ($Codigo <= $Descrição) {
                                        $CodigoFinal .= $array[$Codigo];
                                        $Codigo = $Codigo + 1;
                                    }
                                } else {
                                    $list = array_slice($array, $Codigo);
                                    $CodigoFinal = implode("",  $list);
                                }
                                $CodigoFinal = str_replace('<b>', '',  $CodigoFinal);
                                $CodigoFinal = str_replace('</b>', '',  $CodigoFinal);
                                $CodigoFinal = str_replace('"', '',  $CodigoFinal);
                                $CodigoFinal = preg_replace("/\s+/", "", $CodigoFinal);
                                $copi = "'" . trim($CodigoFinal) . "'";
                                $ShareOther = "'" . $sort['name'][$k] = $v['name'] . "'";
                                echo '</div>
                                    <div class="ActionView">
                                        <i onclick="copiar(' . $copi . ')" class="fa fa-clone Copy" aria-hidden="true"></i>
                                        <i onclick="ShareSelection(' . $ShareOther . ')" class="fa fa-share Share" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>';
                            }
                        }
                        break;
                    case 'JlNx4fMLNF9V':
                        $arr = json_decode($url, true);
                        $sort = array();
                        foreach ($arr as $k => $v) {
                            $sort['type'][$k] = $v['type'];
                            $sort['name'][$k] = $v['name'];
                            $sort['target_description'][$k] = $v['target_description'];
                            $sort['return_type'][$k] = $v['return_type'];
                            $sort['parameters'][$k] = $v['parameters'];
                        }

                        array_multisort($sort['type'], SORT_ASC, $sort['name'], SORT_ASC, $sort['target_description'], SORT_ASC, $sort['return_type'], SORT_ASC, $sort['parameters'], SORT_ASC, $arr);

                        foreach ($arr as $k => $v) {
                            if ($sort['target_description'][$k] = $v['target_description'] != "") {
                                echo '<div class="ViewResult" id="' . $sort['name'][$k] = $v['name'] . '">';
                                echo '<div class="AjusteViewResult"><div class="Result">';
                                echo '<h1 class="Name">' . $sort['name'][$k] = $v['name'] . '</h1>';
                                echo ' <p class="Info">';
                                $Quebra_1 = str_replace('Exemplo:', '</p><h2 class="Exemplo">Exemplo: </h2>', $sort['target_description'][$k] = $v['target_description']);
                                $Quebra_2 = str_replace('Código:', '<p class="Codigo"><b class="Bold">Código: </b>', $Quebra_1);
                                $Quebra_3 = str_replace('Descrição:', '</p><p class="Codigo"><b class="Bold">Descrição: </b>', $Quebra_2);
                                echo '' . $Quebra_3 . '</p>';
                                echo '<p class="Type"><b class="Bold">Tipo: </b>' . $sort['name'][$k] = $v['type'] . '</p>';
                                switch ($sort['return_type'][$k] = $v['return_type']) {
                                    case "float":
                                        echo '<p class="Type"><b class="Bold">Retorno:</b> numero</p>';
                                        break;
                                    case "String":
                                        echo '<p class="Type"><b class="Bold">Retorno:</b> texto</p>';
                                        break;
                                    case "boolean":
                                        echo '<p class="Type"><b class="Bold">Retorno:</b> booleano</p>';
                                        break;
                                }
                                echo '<p class="Type"><b class="Bold">Parâmetro: </b>' . $sort['parameters'][$k] = $v['parameters'] . '</p>';
                                $Quebra_1 = str_replace('<b>Exemplo:</b>', 'Exemplo: ', $sort['target_description'][$k] = $v['target_description']);
                                $Quebra_2 = str_replace('<mspace=12px><mark=#eeeeee55>', '', $Quebra_1);
                                $Quebra_3 = str_replace('</mark></mspace>', '', $Quebra_2);
                                $Quebra_4 = str_replace('<mspace=12px><mspace=2.1em><mark=#eeeeee55>', '', $Quebra_3);
                                $array = explode(" ",  $Quebra_4);
                                $CodigoFinal = "";
                                $Codigo =  array_search('Código:',  $array) + 1;
                                $Descrição = array_search('Descrição:',  $array) - 1;
                                if ($Descrição != "" && $Descrição != "-1") {
                                    while ($Codigo <= $Descrição) {
                                        $CodigoFinal .= $array[$Codigo];
                                        $Codigo = $Codigo + 1;
                                    }
                                } else {
                                    $list = array_slice($array, $Codigo);
                                    $CodigoFinal = implode("",  $list);
                                }
                                $CodigoFinal = str_replace('<b>', '',  $CodigoFinal);
                                $CodigoFinal = str_replace('</b>', '',  $CodigoFinal);
                                $CodigoFinal = str_replace('"', '',  $CodigoFinal);
                                $CodigoFinal = preg_replace("/\s+/", "", $CodigoFinal);
                                $copi = "'" . trim($CodigoFinal) . "'";
                                $ShareOther = "'" . $sort['name'][$k] = $v['name'] . "'";
                                echo '</div>
                                        <div class="ActionView">
                                            <i onclick="copiar(' . $copi . ')" class="fa fa-clone Copy" aria-hidden="true"></i>
                                            <i onclick="ShareSelection(' . $ShareOther . ')" class="fa fa-share Share" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>';
                            }
                        }
                        break;
                    default:
                        $pretext = "";
                        $leads = json_decode($url);
                        foreach ($leads as $contact) {
                            if ($contact->target_description != "") {
                                echo '<div class="ViewResult" id="' . $contact->name . '">';
                                echo '<div class="AjusteViewResult"><div class="Result">';
                                echo '<h1 class="Name">' . $contact->name . '</h1>';
                                echo ' <p class="Info">';
                                $Quebra_1 = str_replace('Exemplo:', '</p><h2 class="Exemplo">Exemplo: </h2>', $contact->target_description);
                                $Quebra_2 = str_replace('Código:', '<p class="Codigo"><b class="Bold">Código: </b>', $Quebra_1);
                                $Quebra_3 = str_replace('Descrição:', '</p><p class="Codigo"><b class="Bold">Descrição: </b>', $Quebra_2);
                                echo '' . $Quebra_3 . '</p>';
                                echo '<p class="Type"><b class="Bold">Tipo: </b>' . $contact->type . '</p>';
                                switch ($contact->return_type) {
                                    case "float":
                                        echo '<p class="Type"><b class="Bold">Retorno:</b> numero</p>';
                                        break;
                                    case "String":
                                        echo '<p class="Type"><b class="Bold">Retorno:</b> texto</p>';
                                        break;
                                    case "boolean":
                                        echo '<p class="Type"><b class="Bold">Retorno:</b> booleano</p>';
                                        break;
                                }
                                echo '<p class="Type"><b class="Bold">Parâmetro: </b>' . $contact->parameters . '</p>';
                                $Quebra_1 = str_replace('<b>Exemplo:</b>', 'Exemplo: ', $contact->target_description);
                                $Quebra_2 = str_replace('<mspace=12px><mark=#eeeeee55>', '', $Quebra_1);
                                $Quebra_3 = str_replace('</mark></mspace>', '', $Quebra_2);
                                $Quebra_4 = str_replace('<mspace=12px><mspace=2.1em><mark=#eeeeee55>', '', $Quebra_3);
                                $array = explode(" ",  $Quebra_4);
                                $CodigoFinal = "";
                                $Codigo =  array_search('Código:',  $array) + 1;
                                $Descrição = array_search('Descrição:',  $array) - 1;
                                if ($Descrição != "" && $Descrição != "-1") {
                                    while ($Codigo <= $Descrição) {
                                        $CodigoFinal .= $array[$Codigo];
                                        $Codigo = $Codigo + 1;
                                    }
                                } else {
                                    $list = array_slice($array, $Codigo);
                                    $CodigoFinal = implode("",  $list);
                                }
                                $CodigoFinal = str_replace('<b>', '',  $CodigoFinal);
                                $CodigoFinal = str_replace('</b>', '',  $CodigoFinal);
                                $CodigoFinal = str_replace('"', '',  $CodigoFinal);
                                $CodigoFinal = preg_replace("/\s+/", "", $CodigoFinal);
                                $copi = "'" . trim($CodigoFinal) . "'";
                                $ShareOther = "'$contact->name'";
                                echo '</div>
                                    <div class="ActionView">
                                        <i onclick="copiar(' . $copi . ')" class="fa fa-clone Copy" aria-hidden="true"></i>
                                        <i onclick="ShareSelection(' . $ShareOther . ')" class="fa fa-share Share" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>';
                            }
                        }
                        break;
                }
            } else {
                $pretext = "";
                $leads = json_decode($url);
                foreach ($leads as $contact) {
                    if ($contact->target_description != "") {
                        echo '<div class="ViewResult" id="' . $contact->name . '">';
                        echo '<div class="AjusteViewResult"><div class="Result">';
                        echo '<h1 class="Name">' . $contact->name . '</h1>';
                        echo ' <p class="Info">';
                        $Quebra_1 = str_replace('Exemplo:', '</p><h2 class="Exemplo">Exemplo: </h2>', $contact->target_description);
                        $Quebra_2 = str_replace('Código:', '<p class="Codigo"><b class="Bold">Código: </b>', $Quebra_1);
                        $Quebra_3 = str_replace('Descrição:', '</p><p class="Codigo"><b class="Bold">Descrição: </b>', $Quebra_2);
                        echo '' . $Quebra_3 . '</p>';
                        echo '<p class="Type"><b class="Bold">Tipo: </b>' . $contact->type . '</p>';
                        switch ($contact->return_type) {
                            case "float":
                                echo '<p class="Type"><b class="Bold">Retorno:</b> numero</p>';
                                break;
                            case "String":
                                echo '<p class="Type"><b class="Bold">Retorno:</b> texto</p>';
                                break;
                            case "boolean":
                                echo '<p class="Type"><b class="Bold">Retorno:</b> booleano</p>';
                                break;
                        }
                        echo '<p class="Type"><b class="Bold">Parâmetro: </b>' . $contact->parameters . '</p>';
                        $Quebra_1 = str_replace('<b>Exemplo:</b>', 'Exemplo: ', $contact->target_description);
                        $Quebra_2 = str_replace('<mspace=12px><mark=#eeeeee55>', '', $Quebra_1);
                        $Quebra_3 = str_replace('</mark></mspace>', '', $Quebra_2);
                        $Quebra_4 = str_replace('<mspace=12px><mspace=2.1em><mark=#eeeeee55>', '', $Quebra_3);
                        $array = explode(" ",  $Quebra_4);
                        $CodigoFinal = "";
                        $Codigo =  array_search('Código:',  $array) + 1;
                        $Descrição = array_search('Descrição:',  $array) - 1;
                        if ($Descrição != "" && $Descrição != "-1") {
                            while ($Codigo <= $Descrição) {
                                $CodigoFinal .= $array[$Codigo];
                                $Codigo = $Codigo + 1;
                            }
                        } else {
                            $list = array_slice($array, $Codigo);
                            $CodigoFinal = implode("",  $list);
                        }
                        $CodigoFinal = str_replace('<b>', '',  $CodigoFinal);
                        $CodigoFinal = str_replace('</b>', '',  $CodigoFinal);
                        $CodigoFinal = str_replace('"', '',  $CodigoFinal);
                        $CodigoFinal = preg_replace("/\s+/", "", $CodigoFinal);
                        $copi = "'" . trim($CodigoFinal) . "'";
                        $ShareOther = "'$contact->name'";
                        echo '</div>
                        <div class="ActionView">
                                    <i onclick="copiar(' . $copi . ')" class="fa fa-clone Copy" aria-hidden="true"></i>
                                    <i onclick="ShareSelection(' . $ShareOther . ')" class="fa fa-share Share" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>';
                    }
                }
            }
            ?>
        </div>
        <div class="MenuLinguagem">
            <div class="FundoMenuLinguagem">
                <div class="AjusteMenuLinguagem">
                    <div class="direitaMenuLinguagem">
                        <div class="ordenar">
                            <select id="InputOrdenar" class="ordenar_Input">
                                <?php
                                switch ($_COOKIE["OrdenadorReduc"]) {
                                    case '0KIj5fcfeMzp':
                                        echo '
                                            <option value="A-Z" selected>A-Z</option>
                                            <option value="Z-A">Z-A</option>
                                            <option value="Tipo">Tipo</option>
                                            <option value="Data">Data</option>
                                            ';
                                        break;
                                    case 'Q9yiFAnY6WRP':
                                        echo '
                                            <option value="A-Z">A-Z</option>
                                            <option value="Z-A" selected>Z-A</option>
                                            <option value="Tipo">Tipo</option>
                                            <option value="Data">Data</option>
                                            ';
                                        break;
                                    case 'JlNx4fMLNF9V':
                                        echo '
                                            <option value="A-Z">A-Z</option>
                                            <option value="Z-A">Z-A</option>
                                            <option value="Tipo" selected>Tipo</option>
                                            <option value="Data">Data</option>
                                            ';
                                        break;
                                    default:
                                        echo '
                                            <option value="A-Z">A-Z</option>
                                            <option value="Z-A">Z-A</option>
                                            <option value="Tipo">Tipo</option>
                                            <option value="Data" selected>Data</option>
                                            ';
                                        break;
                                }
                                ?>

                            </select>
                            <i id="IconOrdenarTrue" class="fa fa-calendar IconOrdenar"></i>
                            <i id="IconOrdenarFalse" class="fa fa-calendar IconOrdenar"></i>

                        </div>
                        <div class="search">
                            <input type="checkbox" id="SearchController" />
                            <input id="InputSeach" class="search_Input" type="text" placeholder="Pesquisar Função">
                            <label for="SearchController"><i id="lupa" class="fas fa-search"></i></label>
                        </div>
                    </div>
                    <div class="esquerdaMenuLinguagem">
                        <i id="CleanSearch" class="fa fa-times-circle" aria-hidden="true"></i>
                        <div id="barraDivision"></div>
                        <i id="DarkModeMobileMenu" onclick="modeStyle()" class="fas fa-adjust"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>
    var $doc = $('html, body');
    $doc.animate({
        scrollTop: $("#conteined").offset().top - 300
    }, 500);

    $("#InputOrdenar").change(function() {
        console.log("OlamUNDO!")
        switch (document.getElementById("InputOrdenar").value) {
            case "A-Z":
                document.getElementById('IconOrdenarTrue').className = 'fas fa-sort-alpha-down IconOrdenar';
                document.getElementById('IconOrdenarFalse').className = 'fas fa-sort-alpha-down IconOrdenar';
                window.location.href = "csharp.php?o=0KIj5fcfeMzp"
                break;
            case "Z-A":
                document.getElementById('IconOrdenarTrue').className = 'fas fa-sort-alpha-down-alt IconOrdenar';
                document.getElementById('IconOrdenarFalse').className = 'fas fa-sort-alpha-down-alt IconOrdenar';
                window.location.href = "csharp.php?o=Q9yiFAnY6WRP"
                break;
            case "Tipo":
                document.getElementById('IconOrdenarTrue').className = 'fas fa-sort-amount-down IconOrdenar';
                document.getElementById('IconOrdenarFalse').className = 'fas fa-sort-amount-down IconOrdenar';
                window.location.href = "csharp.php?o=JlNx4fMLNF9V"
                break;
            case "Data":
                document.getElementById('IconOrdenarTrue').className = 'fas fa-calendar-alt IconOrdenar';
                document.getElementById('IconOrdenarFalse').className = 'fas fa-calendar-alt IconOrdenar';
                window.location.href = "csharp.php?o=h1s825rbRsEn"
                break;
        }
    });
    var ordenarDrop = 1;
    $("#InputOrdenar").click(function() {
        if (ordenarDrop == 1) {
            document.getElementById("InputOrdenar").style.borderRadius = "0px 0px 18px 18px";
            document.getElementById("IconOrdenarTrue").style.borderRadius = "18px 0px 18px 18px";
            ordenarDrop = 0;
        } else {
            document.getElementById("InputOrdenar").style.borderRadius = "18px";
            document.getElementById("IconOrdenarTrue").style.borderRadius = "18px";
            ordenarDrop = 1;
        }
    });

    $("#InputOrdenar").focusout(function() {
        document.getElementById("InputOrdenar").style.borderRadius = "18px";
        document.getElementById("IconOrdenarTrue").style.borderRadius = "18px";
        ordenarDrop = 1;
    });

    $("#IconOrdenarFalse").click(function() {
        document.getElementById("IconOrdenarFalse").style.display = "none";
        document.getElementById("InputOrdenar").style.display = "block";
        document.getElementById("IconOrdenarTrue").style.display = "block";
    });

    $("#IconOrdenarTrue").click(function() {
        document.getElementById("IconOrdenarFalse").style.display = "block";
        document.getElementById("InputOrdenar").style.borderRadius = "18px";
        document.getElementById("IconOrdenarTrue").style.borderRadius = "18px";
        document.getElementById("InputOrdenar").style.display = "none";
        document.getElementById("IconOrdenarTrue").style.display = "none";
        ordenarDrop = 1;
    });
    $(document).keypress(function(e) {
        if (e.which == 13) {
            $("#SearchController").click();
        }
    });
    var SeachOld = "";
    $("#SearchController").click(function() {
        var Search = document.getElementById("InputSeach").value;
        if (Search != "") {
            if (shareResponse != Search && shareResponse != "") {
                let timerInterval
                Swal.fire({
                    icon: 'question',
                    title: Search + ' | C#',
                    html: 'Aguarde pesquisando...',
                    timer: 1200,
                    timerProgressBar: true,
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        window.location.href = "csharp.php?share=" + Search;
                    }
                })
            } else {
                document.getElementById("SearchController").checked = "true";

                if (Search != SeachOld && SeachOld != "") {
                    document.getElementById(SeachOld).style.border = " none";
                }

                var Text = "#" + Search

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 500,
                    timerProgressBar: true,
                    onOpen: (function(toast) {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    })
                })

                Toast.fire({
                    icon: 'question',
                    title: Search + ' | C# - Pesquisando...'
                })

                var error = 0;
                if (document.getElementById("Visualization").querySelector(Text) != null) {
                    $doc.animate({
                        scrollTop: $(Text).offset().top - 300
                    }, 500);
                    SeachOld = Search;
                    error = 0;
                    document.getElementById("CleanSearch").style.display = "block";
                    document.getElementById("barraDivision").style.display = "block";
                } else {
                    SeachOld = "";
                    error = 1;
                    document.getElementById("CleanSearch").style.display = "none";
                    document.getElementById("barraDivision").style.display = "none";
                }
                setTimeout(function() {
                    if (error == 1) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            onOpen: (function(toast) {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            })
                        })

                        Toast.fire({
                            icon: 'error',
                            title: Search + ' | C# - Não encontrado!'
                        })
                    } else {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            onOpen: (function(toast) {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            })
                        })

                        Toast.fire({
                            icon: 'success',
                            title: Search + ' | C# - Encontrado!'
                        })
                        if (darkMode == 1) {
                            document.getElementById(Search).style.borderStyle = "solid";
                            document.getElementById(Search).style.borderWidth = "3px";
                            document.getElementById(Search).style.borderColor = "#2FA9C2";
                        } else {
                            document.getElementById(Search).style.borderStyle = "solid";
                            document.getElementById(Search).style.borderWidth = "3px";
                            document.getElementById(Search).style.borderColor = "#ffae00";
                        }

                    }
                }, 500);
            }
        } else {
            if (SeachOld != "") {
                document.getElementById(SeachOld).style.border = "none";
            }
            document.getElementById("CleanSearch").style.display = "none";
            document.getElementById("barraDivision").style.display = "none";
        }

    });
    $("#CleanSearch").click(function() {
        if (SeachOld != "") {
            document.getElementById(SeachOld).style.border = "none";
        }
        document.getElementById("InputSeach").value = "";
        document.getElementById("CleanSearch").style.display = "none";
        document.getElementById("barraDivision").style.display = "none";
        $("#SearchController").click();
        $doc.animate({
            scrollTop: $("#conteined").offset().top - 300
        }, 500);
    });

    function copiar(text) {
        const texto = text;
        let inputTest = document.createElement("input");
        inputTest.value = texto;
        document.body.appendChild(inputTest);
        inputTest.select();
        document.execCommand('copy');
        document.body.removeChild(inputTest);
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (function(toast) {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            })
        })

        Toast.fire({
            icon: 'success',
            title: text + ' | C# - Copiado com sucesso!'
        })
    }

    function modeStyle() {
        if (darkMode == 0) {
            window.location.href = "csharp.php?m=5MAcmRtiNQQA";
        } else {
            window.location.href = "csharp.php?m=V6Y95KtZQXHP"
        }
    }
    $("#RE").click(function() {
        window.location.href = "reduc.php";
    });
    $("#CSHARP").click(function() {
        window.location.href = "csharp.php";
    });
    $("#LOGO").click(function() {
        $doc.animate({
            scrollTop: $("#conteined").offset().top - 300
        }, 500);
    });

    function Indisponivel() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            onOpen: (function(toast) {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            })
        })

        Toast.fire({
            icon: 'error',
            title: 'Indisponível no momento!'
        })
    }

    function ShareSelection(funcao) {
        var url_Share = "http://weduc.natalnet.br/sbotics/funcoes/csharp.php";
        const texto = url_Share + "share=" + funcao;
        let inputTest = document.createElement("input");
        inputTest.value = texto;
        document.body.appendChild(inputTest);
        inputTest.select();
        document.execCommand('copy');
        document.body.removeChild(inputTest);
        Swal.fire(
            'Link Copiado!',
            funcao + ' | C#',
            'success'
        )
    }
</script>

</html>