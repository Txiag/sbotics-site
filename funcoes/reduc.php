<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Site Metas -->
    <title>Funções sBotics - Robótica Simulada</title>
    <?php
    error_reporting(E_ERROR | E_PARSE);
    $url = file_get_contents('http://weduc.natalnet.br/api/languages/74/functions');
    $url_Share = "http://weduc.natalnet.br/sbotics/funcoes/reduc";
    $searchText = $_GET['share'];
    if ($searchText != "") {
        $pretext = "";
        $leads = json_decode($url);
        foreach ($leads as $contact) {
            if ($contact->name == $searchText) {
                $name = $contact->name;
                $Description = $contact->description;
                $type = $contact->type;
                switch ($contact->return_type) {
                    case "float":
                        $return_type = "numero";
                        break;
                    case "String":
                        $return_type = "texto";
                        break;
                    case "boolean":
                        $return_type = "booleano";
                        break;
                }
                $parametro = $contact->parameters;
                echo '<title> ' . $name . ' | R-Educ - Funções sBotics</title>';
                echo ' <meta name="description" content="' . $name . ' - ' . $description . ' Tipo: ' . $type . ' Retorno: ' . $return_type . ' Parâmetro: ' . $parametro . '">';
            }
        }
    } else {
        echo '<title>Funções sBotics - Robótica Simulada</title>';
        echo ' <meta name="description" content="
        Nesta página apresentamos as funções que podem ser utilizadas pelos robôs do simulador sBotics. Observe atentamente aos parâmetros (tipos e quantidades) e os retornos de cada função para sua correta utilização.
       ">';
    }
    ?>
    <meta name="keywords" content="simulação, sBotics, OBR, simulada, r-educ">
    <meta name="author" content="WEduc">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="../images/favicon.png" type="image/png" />
    <link rel="apple-touch-icon" href="../images/favicon.png" />
    <?php

    if (!isset($_COOKIE["Linguagem"])) {
        setcookie("Linguagem", "reduc", time() + (86400 * 30), "/");
    } else {
        $Linguagem = $_COOKIE["Linguagem"];
        if ($Linguagem != "reduc") {
            setcookie("Linguagem", "reduc", time() + (86400 * 30), "/");
        }
    }
    $InputMode = $_GET['m'];
    if ($InputMode == "") {
        if (isset($_COOKIE["Mode"])) {
            switch ($_COOKIE["Mode"]) {
                case 'dark':
                    echo '<link rel="stylesheet" href="css/BlackMode_Function.css?version=2" />';
                    echo '<script>darkMode = 1</script>';
                    break;
                case 'white':
                    echo '<link rel="stylesheet" href="css/WhiteMode_Function.css?version=2" />';
                    echo '<script>darkMode = 0</script>';
                    break;
                default:
                    echo '<link rel="stylesheet" href="css/WhiteMode_Function.css?version=2" />';
                    echo '<script>darkMode = 0</script>';
                    break;
            }
        } else {
            echo '<link rel="stylesheet" href="css/WhiteMode_Function.css?version=2" />';
            echo '<script>darkMode = 0</script>';
        }
    } else {
        switch ($InputMode) {
            case 'V6Y95KtZQXHP':
                setcookie("Mode", "white", time() + (86400 * 30), "/");
                echo '<link rel="stylesheet" href="css/WhiteMode_Function.css?version=2" />';
                echo '<script>darkMode = 0</script>';
                header('Location: reduc');
                break;
            case '5MAcmRtiNQQA':
                setcookie("Mode", "dark", time() + (86400 * 30), "/");
                echo '<link rel="stylesheet" href="css/BlackMode_Function.css?version=2" />';
                echo '<script>darkMode = 1</script>';
                header('Location: reduc');
                break;

            default:
                echo '<link rel="stylesheet" href="css/WhiteMode_Function.css?version=2" />';
                echo '<script>darkMode = 0</script>';
                header('Location: reduc');
                break;
        }
    }
    ?>
    <!-- CSS -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Sistema de Alerta -->
    <script src="sweet/sweetalert2.all.min.js"></script>
</head>

<body>
    <div id="conteined" class="conteined">
        <div class="DarkMode">
            <i id="DarkMode" onclick="modeStyle()" class="fa fa-adjust" aria-hidden="true"></i>
        </div>

        <nav>
            <div id="Header">
                <div class="contentLogo">
                    <img id="LOGO" class="Logo" src="img/logo.png" alt="sBotics">
                    <div id="barra"></div>
                    <span>R-Educ</span>
                </div>
                <div class="Menu">
                    <div class="RE">
                        <span id="RE">RE</span>
                    </div>
                    <div class="csharp">
                        <span onclick="Indisponivel()" id="CSHARP">C#</span>
                    </div>
                </div>
            </div>
        </nav>

        <div id="functionMenu">
            <div class="function">
                <div class="ordenar">
                    <i id="recente" onclick="Indisponivel()" class="fa fa-calendar" aria-hidden="true"></i>
                    <select class="ordenarInput" id="ordenar" name="ordenar">
                        <option class="option" value="A-Z">A-Z</option>
                        <option class="option" value="Z-A">Z-A</option>
                        <option class="option" value="Tipo">Tipo</option>
                        <option class="option" value="Data" selected>Data</option>
                    </select>
                </div>
                <div id="search" class="search">
                    <i id="searchIcon" name="search" class="fa fa-search" aria-hidden="true"></i>
                    <input class="searchInput" id="searchInput" type="text" placeholder="Pesquisar Função">
                </div>
                <span id="txtCentro" class="txtCentro">Funções do Robô</span>
                <div id="ActionsLeft" class="ActionsLeft">
                    <i id="RemoveInput" class="fa fa-times-circle" aria-hidden="true"></i>
                    <div id="barraFunction"></div>
                    <div onclick="Indisponivel()" class="btn_Tutoriais">Tutorial</div>
                </div>
            </div>
        </div>
        <div id="MobileHeader" class="MobileHeader">
            <div class="functionMobileHeader">
                <div class="DireitaMobileHeader">
                    <h1 class="txtCentroMobileHeader">Funções do Robô</h1>
                </div>
                <div class="EsquerdaMobileHeader">
                    <div onclick="Indisponivel()" class="btn_Tutoriais">Tutorial</div>
                </div>
            </div>
        </div>

        <div id="Visualization" class="contentViewResult">
            <?php
            error_reporting(E_ERROR | E_PARSE);
            $RequestAll = 0;
            if ($searchText != "") {
                $RequestAll = 1;
                $pretext = "";
                $leads = json_decode($url);
                $SearchTrue = 0;
                foreach ($leads as $contact) {
                    if ($contact->name == $searchText) {
                        echo '<div class="ViewResult" id="' . $contact->name . '">';
                        echo '<div class="AjusteViewResult"><div class="Result">';
                        echo '<h1 class="Name">' . $contact->name . '</h1>';
                        echo ' <p class="Info">';
                        $Quebra_1 = str_replace('Exemplo:', '</p><h2 class="Exemplo">Exemplo: </h2>', $contact->description);
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
                        $copi = "'$contact->name()'";
                        $Share = "'$url_Share?share=$contact->name'";
                        echo '</div>
                            <div class="ActionView">
                                <i onclick="copiar(' . $copi . ')" class="fa fa-clone Copy" aria-hidden="true"></i>
                                <i onclick="copiar(' . $Share . ')" class="fa fa-share Share" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>';
                        $SearchTrue = 1;
                    }
                }
                if ($SearchTrue == 0) {
                    echo '<div class="ViewResult">';
                    echo '<div class="AjusteViewResult">
                        <p class="Error">Não encontrado resultado!!!</p>
                    </div>
                </div>';
                }
            } else {
                $pretext = "";
                $leads = json_decode($url);
                foreach ($leads as $contact) {
                    echo '<div class="ViewResult" id="' . $contact->name . '">';
                    echo '<div class="AjusteViewResult"><div class="Result">';
                    echo '<h1 class="Name">' . $contact->name . '</h1>';
                    echo ' <p class="Info">';
                    $Quebra_1 = str_replace('Exemplo:', '</p><h2 class="Exemplo">Exemplo: </h2>', $contact->description);
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
                    $copi = "'$contact->name()'";
                    $Share = "'$url_Share?share=$contact->name'";
                    echo '</div>
                        <div class="ActionView">
                            <i onclick="copiar(' . $copi . ')" class="fa fa-clone Copy" aria-hidden="true"></i>
                            <i onclick="copiar(' . $Share . ')" class="fa fa-share Share" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>';
                }
            }
            ?>
        </div>
        <div class="MobileMenu">
            <div class="function_MobileMenu">
                <div class="direita_Mobile">
                    <div class="ordenar_MobileMenu">
                        <i id="recente_MobileMenu" onclick="Indisponivel()" class="fa fa-calendar" aria-hidden="true"></i>
                        <select class="ordenarInput_MobileMenu" id="ordenar_MobileMenu" name="ordenar_MobileMenu">
                            <option class="option" value="A-Z">A-Z</option>
                            <option class="option" value="Z-A">Z-A</option>
                            <option class="option" value="Tipo">Tipo</option>
                            <option class="option" value="Data" selected>Data</option>
                        </select>
                    </div>
                    <div id="search" class="search_MobileMenu">
                        <i id="searchIcon_MobileMenu" name="search" class="fa fa-search" aria-hidden="true"></i>
                        <input class="searchInput_MobileMenu" id="searchInput_MobileMenu" type="text" placeholder="Pesquisar Função">
                    </div>
                </div>
                <div class="Esquerda">
                    <div id="ActionsLeft_MobileMenu" class="ActionsLeft_MobileMenu">
                        <i id="RemoveInput_MobileMenu" class="fa fa-times-circle" aria-hidden="true"></i>
                        <div id="barraFunction_MobileMenu"></div>
                        <i id="DarkModeMobileMenu" onclick="modeStyle()" class="fa fa-adjust" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
</body>


<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>
    var screenWidth;
    var ordenar = 1;
    var PixelText;
    var ordenarDrop = 1;
    var $doc = $('html, body');
    var UltimoSearch = "";
    var ultimoRefresh = "";

    var PixelAntigo = 0;

    var Mudança = 0;

    function RequestDimension() {
        screenWidth = window.innerWidth;
        // console.log("screenWidth: " + screenWidth + " PixelText: " + PixelText + " PixelAntigo:" + PixelAntigo);
        if (screenWidth < 800) {
            PixelText = 125;
        } else {
            PixelText = 252;
            PixelAntigo = 252;
        }

    }
    RequestDimension();
    window.addEventListener('resize', function() {
        RequestDimension();
    });

    function scrollAjuste() {
        var scroll = $(this).scrollTop()
        if (scroll >= 120) {
            document.getElementById("functionMenu").style.marginTop = "65px";
            document.getElementById("MobileHeader").style.marginTop = "65px";
        } else {
            document.getElementById("functionMenu").style.marginTop = "95px";
            document.getElementById("MobileHeader").style.marginTop = "95px";
        }
    }
    scrollAjuste();
    $(window).on("scroll", function() {
        scrollAjuste();
    });

    function recente() {
        Mudança = 1;
        if (screenWidth < 500) {
            switch (ordenar) {
                case 1:
                    document.getElementById("ordenar_MobileMenu").style.width = "80px";
                    document.getElementById("recente_MobileMenu").style.marginLeft = "50px";
                    document.getElementById("ordenar_MobileMenu").style.display = "block";
                    ordenar = 0;
                    break;
                default:
                    document.getElementById("ordenar_MobileMenu").style.width = "0px";
                    document.getElementById("recente_MobileMenu").style.marginLeft = "0px";
                    document.getElementById("ordenar_MobileMenu").style.display = "none";
                    ordenar = 1;
                    break;
            }
        } else if (screenWidth < 800 && screenWidth > 500) {
            document.getElementById("recente").style.width = "31px";
            document.getElementById("recente").style.height = "31px";
            switch (ordenar) {
                case 1:
                    PixelText = PixelText - 51;
                    document.getElementById("txtCentro").style.marginLeft = PixelText + "px";
                    document.getElementById("ordenar").style.width = "80px";
                    document.getElementById("recente").style.marginLeft = "50px";
                    document.getElementById("ordenar").style.display = "block";
                    document.getElementById("search").style.marginLeft = "-7px";
                    ordenar = 0;
                    break;
                default:
                    PixelText = PixelText + 51;
                    document.getElementById("txtCentro").style.marginLeft = PixelText + "px";
                    document.getElementById("ordenar").style.width = "0px";
                    document.getElementById("recente").style.marginLeft = "0px";
                    document.getElementById("ordenar").style.display = "none";
                    document.getElementById("search").style.marginLeft = "22px";
                    ordenar = 1;
                    break;
            }
        } else {
            switch (ordenar) {
                case 1:
                    PixelText = PixelText - 60;
                    document.getElementById("txtCentro").style.marginLeft = PixelText + "px";
                    document.getElementById("recente").style.marginLeft = "60px";
                    document.getElementById("ordenar").style.display = "block";
                    document.getElementById("search").style.marginLeft = "0px";
                    ordenar = 0;
                    break;
                default:
                    PixelText = PixelText + 60;
                    document.getElementById("txtCentro").style.marginLeft = PixelText + "px";
                    document.getElementById("recente").style.marginLeft = "0px";
                    document.getElementById("ordenar").style.display = "none";
                    document.getElementById("search").style.marginLeft = "30px";
                    ordenar = 1;
                    break;
            }
        }
    }
    $("#ordenar_MobileMenu").click(function() {
        switch (ordenarDrop) {
            case 1:
                document.getElementById("ordenar_MobileMenu").style.borderRadius = "18px 18px 0px 0px";
                document.getElementById("recente_MobileMenu").style.borderRadius = "18px 18px 0px 18px";
                ordenarDrop = 0
                break;
            default:
                document.getElementById("ordenar_MobileMenu").style.borderRadius = "18px";
                document.getElementById("recente_MobileMenu").style.borderRadius = "18px";
                switch (document.getElementById("ordenar_MobileMenu").value) {
                    case "A-Z":
                        document.getElementById("recente_MobileMenu").outerHTML = "<i id=\"recente_MobileMenu\" onclick=\"recente()\" class=\"fa fa-sort-alpha-asc\" aria-hidden=\"true\"></i>";
                        document.getElementById("recente_MobileMenu").style.marginLeft = "50px";
                        break;
                    case "Z-A":
                        document.getElementById("recente_MobileMenu").outerHTML = "<i id=\"recente_MobileMenu\" onclick=\"recente()\" class=\"fa fa-sort-alpha-desc\" aria-hidden=\"true\"></i>";
                        document.getElementById("recente_MobileMenu").style.marginLeft = "50px";
                        break;
                    case "Tipo":
                        document.getElementById("recente_MobileMenu").outerHTML = "<i id=\"recente_MobileMenu\" onclick=\"recente()\" class=\"fa fa-sort-amount-asc\" aria-hidden=\"true\"></i>";
                        document.getElementById("recente_MobileMenu").style.marginLeft = "50px";
                        break;
                    case "Data":
                        document.getElementById("recente_MobileMenu").outerHTML = "<i id=\"recente_MobileMenu\" onclick=\"recente()\" class=\"fa fa-calendar\" aria-hidden=\"true\"></i>";
                        document.getElementById("recente_MobileMenu").style.marginLeft = "50px";
                        break;
                }

                ordenarDrop = 1
                break;
        }
    });
    $("#ordenar").click(function() {
        switch (ordenarDrop) {
            case 1:

                document.getElementById("ordenar").style.borderRadius = "18px 18px 0px 0px";
                document.getElementById("recente").style.borderRadius = "18px 18px 0px 18px";
                ordenarDrop = 0

                break;

            default:
                document.getElementById("ordenar").style.borderRadius = "18px";
                document.getElementById("recente").style.borderRadius = "18px";
                if (screenWidth < 800 && screenWidth > 500) {
                    switch (document.getElementById("ordenar").value) {
                        case "A-Z":
                            document.getElementById("recente").outerHTML = "<i id=\"recente\" onclick=\"recente()\" class=\"fa fa-sort-alpha-asc\" aria-hidden=\"true\"></i>";
                            document.getElementById("recente").style.marginLeft = "50px";
                            break;
                        case "Z-A":
                            document.getElementById("recente").outerHTML = "<i id=\"recente\" onclick=\"recente()\" class=\"fa fa-sort-alpha-desc\" aria-hidden=\"true\"></i>";
                            document.getElementById("recente").style.marginLeft = "50px";
                            break;
                        case "Tipo":
                            document.getElementById("recente").outerHTML = "<i id=\"recente\" onclick=\"recente()\" class=\"fa fa-sort-amount-asc\" aria-hidden=\"true\"></i>";
                            document.getElementById("recente").style.marginLeft = "50px";
                            break;
                        case "Data":
                            document.getElementById("recente").outerHTML = "<i id=\"recente\" onclick=\"recente()\" class=\"fa fa-calendar\" aria-hidden=\"true\"></i>";
                            document.getElementById("recente").style.marginLeft = "50px";
                            break;
                    }
                } else {
                    switch (document.getElementById("ordenar").value) {
                        case "A-Z":
                            document.getElementById("recente").outerHTML = "<i id=\"recente\" onclick=\"recente()\" class=\"fa fa-sort-alpha-asc\" aria-hidden=\"true\"></i>";
                            document.getElementById("recente").style.marginLeft = "60px";
                            break;
                        case "Z-A":
                            document.getElementById("recente").outerHTML = "<i id=\"recente\" onclick=\"recente()\" class=\"fa fa-sort-alpha-desc\" aria-hidden=\"true\"></i>";
                            document.getElementById("recente").style.marginLeft = "60px";
                            break;
                        case "Tipo":
                            document.getElementById("recente").outerHTML = "<i id=\"recente\" onclick=\"recente()\" class=\"fa fa-sort-amount-asc\" aria-hidden=\"true\"></i>";
                            document.getElementById("recente").style.marginLeft = "60px";
                            break;
                        case "Data":
                            document.getElementById("recente").outerHTML = "<i id=\"recente\" onclick=\"recente()\" class=\"fa fa-calendar\" aria-hidden=\"true\"></i>";
                            document.getElementById("recente").style.marginLeft = "60px";
                            break;
                    }
                }
                ordenarDrop = 1
                break;
        }
    });

    $("#ordenar").focusout(function() {
        switch (ordenarDrop) {
            case 0:
                document.getElementById("ordenar").style.borderRadius = "18px";
                document.getElementById("recente").style.borderRadius = "18px";
                ordenarDrop = 1
                break;
        }
    });

    $("#ordenar_MobileMenu").focusout(function() {
        switch (ordenarDrop) {
            case 0:
                document.getElementById("ordenar_MobileMenu").style.borderRadius = "18px";
                document.getElementById("recente_MobileMenu").style.borderRadius = "18px";
                ordenarDrop = 1
                break;
        }
    });

    var Search = 1;
    var SearchValue = "";
    $(document).keypress(function(e) {
        if (e.which == 13) {
            if (screenWidth < 500) {
                earchValue = document.getElementById("searchInput_MobileMenu").value;
                if (SearchValue != "") {
                    if (Search == 2 && UltimoSearch != "") {
                        document.getElementById(UltimoSearch).style.border = "none";
                    }
                    SearchValue = document.getElementById("searchInput_MobileMenu").value;
                    UltimoSearch = SearchValue;
                    searchRequest(SearchValue);
                    document.getElementById("RemoveInput_MobileMenu").style.display = "block";
                    document.getElementById("barraFunction_MobileMenu").style.display = "block"
                    Search = 2;
                }
            } else {
                SearchValue = document.getElementById("searchInput").value;
                if (SearchValue != "") {
                    if (screenWidth < 800) {
                        if (Search == 2 && UltimoSearch != "") {
                            document.getElementById(UltimoSearch).style.border = "none";
                        }
                        SearchValue = document.getElementById("searchInput").value;
                        UltimoSearch = SearchValue;
                        searchRequest(SearchValue);
                        document.getElementById("RemoveInput").style.display = "block";
                        document.getElementById("barraFunction").style.display = "block"
                        document.getElementById("ActionsLeft").style.marginLeft = "21px";
                        Search = 2;
                    } else {

                        if (Search == 2 && UltimoSearch != "") {
                            document.getElementById(UltimoSearch).style.border = "none";
                        }
                        SearchValue = document.getElementById("searchInput").value;
                        UltimoSearch = SearchValue;
                        searchRequest(SearchValue);
                        document.getElementById("RemoveInput").style.display = "block";
                        document.getElementById("barraFunction").style.display = "block"
                        document.getElementById("ActionsLeft").style.marginLeft = "148px";
                        Search = 2;

                    }
                }
            }
        }
    });
    $("#searchIcon").click(function() {
        Mudança = 1;
        if (document.getElementById("searchInput").value != UltimoSearch && UltimoSearch != "") {
            document.getElementById(UltimoSearch).style.border = "none";
        }
        if (screenWidth < 800) {
            switch (Search) {
                case 1:
                    PixelText = PixelText - 120;
                    document.getElementById("txtCentro").style.marginLeft = PixelText + "px";
                    document.getElementById("searchInput").style.width = "120px";
                    document.getElementById("searchIcon").style.marginLeft = "90px";
                    document.getElementById("searchInput").style.display = "block";
                    Search = 0;
                    break;
                default:
                    var InputValue = document.getElementById("searchInput").value;
                    if (InputValue != "" && InputValue != UltimoSearch) {
                        if (Search == 2 && UltimoSearch != "") {
                            document.getElementById(UltimoSearch).style.border = "none";
                        }
                        SearchValue = document.getElementById("searchInput").value;
                        UltimoSearch = SearchValue;
                        searchRequest(SearchValue);
                        document.getElementById("RemoveInput").style.display = "block";
                        document.getElementById("barraFunction").style.display = "block"
                        document.getElementById("ActionsLeft").style.marginLeft = "21px";
                        Search = 2;
                    } else {
                        PixelText = PixelText + 120;
                        document.getElementById("txtCentro").style.marginLeft = PixelText + "px";
                        document.getElementById("searchInput").style.width = "0px";
                        document.getElementById("searchIcon").style.marginLeft = "0px";
                        document.getElementById("searchInput").style.display = "none";
                        Search = 1;
                    }
                    break;
            }
        } else {
            switch (Search) {
                case 1:
                    PixelText = PixelText - 184;
                    document.getElementById("txtCentro").style.marginLeft = PixelText + "px";
                    document.getElementById("searchInput").setSelectionRange(0, 0);
                    document.getElementById("searchInput").style.width = "184px";
                    document.getElementById("searchIcon").style.marginLeft = "150px";
                    document.getElementById("searchInput").style.display = "block";
                    Search = 0;
                    break;
                default:
                    var InputValue = document.getElementById("searchInput").value;
                    if (InputValue != "" && InputValue != UltimoSearch) {
                        if (Search == 2 && UltimoSearch != "") {
                            document.getElementById(UltimoSearch).style.border = "none";
                        }
                        SearchValue = document.getElementById("searchInput").value;
                        UltimoSearch = SearchValue;
                        searchRequest(SearchValue);
                        document.getElementById("RemoveInput").style.display = "block";
                        document.getElementById("barraFunction").style.display = "block"
                        document.getElementById("ActionsLeft").style.marginLeft = "148px";
                        Search = 2;
                    } else {
                        PixelText = PixelText + 184;
                        document.getElementById("txtCentro").style.marginLeft = PixelText + "px";
                        document.getElementById("searchInput").style.width = "0px";
                        document.getElementById("searchIcon").style.marginLeft = "0px";
                        document.getElementById("searchInput").style.display = "none";
                        Search = 1;
                    }
                    break;
            }
        }
    });
    var Search = 1;
    var SearchValue = "";
    $("#searchIcon_MobileMenu").click(function() {

        if (document.getElementById("searchInput_MobileMenu").value != UltimoSearch && UltimoSearch != "") {
            document.getElementById(UltimoSearch).style.border = "none";
        }

        switch (Search) {
            case 1:
                document.getElementById("searchInput_MobileMenu").style.width = "120px";
                document.getElementById("searchIcon_MobileMenu").style.marginLeft = "100px";
                document.getElementById("searchInput_MobileMenu").style.display = "block";
                Search = 0;
                break;
            default:
                var InputValue = document.getElementById("searchInput_MobileMenu").value;
                if (InputValue != "" && InputValue != SearchValue) {
                    if (Search == 2 && UltimoSearch != "") {
                        document.getElementById(UltimoSearch).style.border = "none";
                    }
                    SearchValue = document.getElementById("searchInput_MobileMenu").value;
                    UltimoSearch = SearchValue;
                    searchRequest(SearchValue);
                    document.getElementById("RemoveInput_MobileMenu").style.display = "block";
                    document.getElementById("barraFunction_MobileMenu").style.display = "block"
                    Search = 2;
                } else {
                    document.getElementById("searchInput_MobileMenu").style.width = "0px";
                    document.getElementById("searchIcon_MobileMenu").style.marginLeft = "9px";
                    document.getElementById("searchInput_MobileMenu").style.display = "none";
                    Search = 1;
                }
                break;
        }
    });
    $("#RemoveInput_MobileMenu").click(function() {

        switch (Search) {
            case 0:
                document.getElementById("searchInput_MobileMenu").style.width = "0px";
                document.getElementById("searchIcon_MobileMenu").style.marginLeft = "8px";
                document.getElementById("searchInput_MobileMenu").style.display = "none";
                Search = 1;
                document.getElementById("searchInput_MobileMenu").value = "";
                document.getElementById("RemoveInput_MobileMenu").style.display = "none";
                document.getElementById("barraFunction_MobileMenu").style.display = "none"
                break;
            case 1:
                if (UltimoSearch != "") {
                    $doc.animate({
                        scrollTop: $("#conteined").offset().top - 300
                    }, 500);
                    document.getElementById(UltimoSearch).style.border = "none";
                }
                document.getElementById("searchInput_MobileMenu").style.width = "0px";
                document.getElementById("searchIcon_MobileMenu").style.marginLeft = "8px";
                document.getElementById("searchInput_MobileMenu").style.display = "none";
                Search = 1;
                document.getElementById("searchInput_MobileMenu").value = "";
                document.getElementById("RemoveInput_MobileMenu").style.display = "none";
                document.getElementById("barraFunction_MobileMenu").style.display = "none"
                break;
            default:
                if (UltimoSearch != "") {
                    $doc.animate({
                        scrollTop: $("#conteined").offset().top - 300
                    }, 500);
                    document.getElementById(UltimoSearch).style.border = "none";
                }
                document.getElementById("searchInput_MobileMenu").style.width = "0px";
                document.getElementById("searchIcon_MobileMenu").style.marginLeft = "8px";
                document.getElementById("searchInput_MobileMenu").style.display = "none";
                Search = 1;
                document.getElementById("searchInput_MobileMenu").value = "";
                document.getElementById("RemoveInput_MobileMenu").style.display = "none";
                document.getElementById("barraFunction_MobileMenu").style.display = "none"
                break;
        }

    });
    $("#RemoveInput").click(function() {
        if (screenWidth < 800) {
            switch (Search) {
                case 0:
                    PixelText = PixelText + 120;
                    document.getElementById("txtCentro").style.marginLeft = PixelText + "px";
                    document.getElementById("searchInput").style.width = "0px";
                    document.getElementById("searchIcon").style.marginLeft = "0px";
                    document.getElementById("searchInput").style.display = "none";
                    Search = 1;
                    document.getElementById("searchInput").value = "";
                    document.getElementById("RemoveInput").style.display = "none";
                    document.getElementById("barraFunction").style.display = "none"
                    document.getElementById("ActionsLeft").style.marginLeft = "72px";
                    break;
                case 1:
                    if (UltimoSearch != "") {
                        $doc.animate({
                            scrollTop: $("#conteined").offset().top - 300
                        }, 500);
                        document.getElementById(UltimoSearch).style.border = "none";
                    }
                    document.getElementById("searchInput").style.width = "0px";
                    document.getElementById("searchIcon").style.marginLeft = "0px";
                    document.getElementById("searchInput").style.display = "none";
                    Search = 1;
                    document.getElementById("searchInput").value = "";
                    document.getElementById("RemoveInput").style.display = "none";
                    document.getElementById("barraFunction").style.display = "none"
                    document.getElementById("ActionsLeft").style.marginLeft = "72px";
                    break;
                default:
                    if (UltimoSearch != "") {
                        $doc.animate({
                            scrollTop: $("#conteined").offset().top - 300
                        }, 500);
                        document.getElementById(UltimoSearch).style.border = "none";
                    }
                    PixelText = PixelText + 120;
                    document.getElementById("txtCentro").style.marginLeft = PixelText + "px";
                    document.getElementById("searchInput").style.width = "0px";
                    document.getElementById("searchIcon").style.marginLeft = "0px";
                    document.getElementById("searchInput").style.display = "none";
                    Search = 1;
                    document.getElementById("searchInput").value = "";
                    document.getElementById("RemoveInput").style.display = "none";
                    document.getElementById("barraFunction").style.display = "none"
                    document.getElementById("ActionsLeft").style.marginLeft = "72px";
                    break;
            }
        } else {
            switch (Search) {
                case 0:
                    PixelText = PixelText + 184;
                    document.getElementById("txtCentro").style.marginLeft = PixelText + "px";
                    document.getElementById("searchInput").style.width = "0px";
                    document.getElementById("searchIcon").style.marginLeft = "0px";
                    document.getElementById("searchInput").style.display = "none";
                    Search = 1;
                    document.getElementById("searchInput").value = "";
                    document.getElementById("RemoveInput").style.display = "none";
                    document.getElementById("barraFunction").style.display = "none"
                    document.getElementById("ActionsLeft").style.marginLeft = "208px";

                    break;
                case 1:
                    if (UltimoSearch != "") {
                        $doc.animate({
                            scrollTop: $("#conteined").offset().top - 300
                        }, 500);
                        document.getElementById(UltimoSearch).style.border = "none";
                    }
                    document.getElementById(UltimoSearch).style.border = "none";
                    document.getElementById("searchInput").style.width = "0px";
                    document.getElementById("searchIcon").style.marginLeft = "0px";
                    document.getElementById("searchInput").style.display = "none";
                    Search = 1;
                    document.getElementById("searchInput").value = "";
                    document.getElementById("RemoveInput").style.display = "none";
                    document.getElementById("barraFunction").style.display = "none"
                    document.getElementById("ActionsLeft").style.marginLeft = "208px";
                    break;
                default:

                    if (UltimoSearch != "") {
                        $doc.animate({
                            scrollTop: $("#conteined").offset().top - 300
                        }, 500);
                        document.getElementById(UltimoSearch).style.border = "none";
                    }
                    PixelText = PixelText + 184;
                    document.getElementById("txtCentro").style.marginLeft = PixelText + "px";
                    document.getElementById("searchInput").style.width = "0px";
                    document.getElementById("searchIcon").style.marginLeft = "0px";
                    document.getElementById("searchInput").style.display = "none";
                    Search = 1;
                    document.getElementById("searchInput").value = "";
                    document.getElementById("RemoveInput").style.display = "none";
                    document.getElementById("barraFunction").style.display = "none"
                    document.getElementById("ActionsLeft").style.marginLeft = "208px";
                    break;
            }
        }
    });

    function searchRequest(text) {
        var Text = "#" + text
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 500,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'info',
            title: text + ' | R-Educ - Pesquisando...'
        })
        var error = 0;
        if (document.getElementById("Visualization").querySelector(Text) != null) {
            $doc.animate({
                scrollTop: $(Text).offset().top - 300
            }, 500);
            error = 0;
        } else {
            UltimoSearch = "";
            error = 1;
        }
        setTimeout(function() {
            if (error == 1) {
                var Text = "#" + text
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: text + ' | R-Educ - Não encontrado!'
                })

            } else {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: text + ' | R-Educ - Encontrado!'
                })
                if (darkMode == 1) {
                    document.getElementById(text).style.borderStyle = "solid";
                    document.getElementById(text).style.borderWidth = "3px";
                    document.getElementById(text).style.borderColor = "#2FA9C2";
                } else {
                    document.getElementById(text).style.borderStyle = "solid";
                    document.getElementById(text).style.borderWidth = "3px";
                    document.getElementById(text).style.borderColor = "#ffae00";
                }

            }
        }, 500);

    }

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
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: text + ' | R-Educ - Copiado com sucesso!'
        })
    }

    function modeStyle() {
        if (darkMode == 0) {
            window.location.href = "reduc?m=5MAcmRtiNQQA";
        } else {
            window.location.href = "reduc?m=V6Y95KtZQXHP"
        }
    }
    $("#RE").click(function() {
        window.location.href = "reduc";
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
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: 'Indisponível no momento!'
        })
    }
</script>


</html>