<!DOCTYPE html>
<html>

<head>
    <!-- Metas -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php
    error_reporting(E_ERROR | E_PARSE);
    $url_Share = "https://weduc.natalnet.br/sbotics/tutorial/reduc";
    ?>
    <title>Tutorial sBotics - Robótica Simulada</title>
    <meta name="description" content="Esta página apresenta o tutorial oficial da linguagem R-Educ, incluindo modos de uso de suas estruturas e exemplos de utilização.">
    <meta name="keywords" content="simulação, sBotics, OBR, simulada, r-educ">
    <meta name="author" content="WEduc">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../images/favicon.png" type="image/png" />
    <link rel="apple-touch-icon" href="../images/favicon.png" />

    <!-- CSS -->
    <link rel="stylesheet" href="../funcoes/font-awesome/css/font-awesome.min.css">
    <?php
    $InputMode = $_GET['m'];
    if ($InputMode == "") {
        if (isset($_COOKIE["Mode"])) {
            switch ($_COOKIE["Mode"]) {
                case 'dark':
                    echo '<link rel="stylesheet" href="css/BlackMode_Tutorial.css?version=2" />';
                    echo '<script>darkMode = 1</script>';
                    break;
                case 'white':
                    echo '<link rel="stylesheet" href="css/WhiteMode_Tutorial.css?version=2" />';
                    echo '<script>darkMode = 0</script>';
                    break;
                default:
                    echo '<link rel="stylesheet" href="css/WhiteMode_Tutorial.css?version=2" />';
                    echo '<script>darkMode = 0</script>';
                    break;
            }
        } else {
            echo '<link rel="stylesheet" href="css/WhiteMode_Tutorial.css?version=2" />';
            echo '<script>darkMode = 0</script>';
        }
    } else {
        switch ($InputMode) {
            case 'V6Y95KtZQXHP':
                setcookie("Mode", "white", time() + (86400 * 30), "/");
                echo '<link rel="stylesheet" href="css/WhiteMode_Tutorial.css?version=2" />';
                echo '<script>darkMode = 0</script>';
                header('Location: reduc');
                break;
            case '5MAcmRtiNQQA':
                setcookie("Mode", "dark", time() + (86400 * 30), "/");
                echo '<link rel="stylesheet" href="css/BlackMode_Tutorial.css?version=2" />';
                echo '<script>darkMode = 1</script>';
                header('Location: reduc');
                break;

            default:
                echo '<link rel="stylesheet" href="css/WhiteMode_Tutorial.css?version=2" />';
                echo '<script>darkMode = 0</script>';
                header('Location: reduc');
                break;
        }
    }
    ?>
    <!-- Scripts -->
    <script src="../funcoes/sweet/sweetalert2.all.min.js"></script>
</head>

<body>
    <div id="conteined" class="conteined">
        <nav>
            <div id="Header">
                <div class="contentLogo">
                    <img id="LOGO" class="Logo" src="../funcoes/img/logo.png" alt="sBotics">
                    <div id="barra"></div>
                    <span>R-Educ</span>
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
                        <h1 class="txtCentroMobileHeader">Tutorial básico da linguagem R-Educ</h1>
                    </div>
                    <div class="EsquerdaMobileHeader">
                        <div onclick="window.location.href = '../funcoes/reduc'" class="btn_Tutoriais">Funções</div>
                    </div>
                </div>
            </div>
        </div>

        <div id="Visualization" class="contentViewResult">
            <div class="ViewResult" id="inicializacao">
                <div class="AjusteViewResult">
                    <div class="Result">
                        <h1 class="Name">Inicialização</h1>
                        <p class="Info">Todo programa deve começar com <b class="Bold">inicio</b> e terminar com <b class="Bold">fim</b></p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Codigo top">inicio</p>
                            <p class="Comentario">comandos</p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="TypeQuebra">Vamos testar escrevendo o seguinte programa: </p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Codigo top">inicio</p>
                            <p class="CodigoOld"><a class="LinkFunction" href="reduc?share=escrever">escrever(<span class="Numero">1</span><span class="sinais">,</span> <span class="Texto">"Olá sBotics!"</span>)</a></p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="Type">Após compilar, clique em "Testar Rotina". O texto <span class="Texto codeBackRef">"Olá sBotics!"</span> deve aparecer na linha 1 do console</p>
                        <h2 class="Warning">Aviso: todo texto deve ser escrito entre aspas duplas</h2>
                        <p class="TypeQuebra">Para realizar movimentações podemos utilizar alguma das funções de movimentação apresentadas na aba <a class="Link" href="reduc">Funções do robô</a> desde tutorial. </p>
                        <p class="Type">Vamos testar a movimentação escrevendo o seguinte programa: </p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Codigo top">inicio</p>
                            <p class="CodigoOld"><a class="LinkFunction" href="reduc?share=frente">frente(<span class="Numero">100</span>)</a></p>
                            <p class="CodigoOld"><a class="LinkFunction" href="reduc?share=esperar">esperar(<span class="Numero">1000</span>)</a></p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="Type">Após compilar, clique em "Testar Rotina". O seu robô deve ir para frente, com velocidade 100 por 1000 milissegundos (1 segundo).</p>
                        <h2 class="Warning">Aviso: as funções de movimentação do robô apenas acionam os motores em um determinado sentido. Para garantir que aquela
                            movimentação ocorra por um determinado tempo é necessário utilizar o comando <a class="LinkFunction codeBackRef" href="reduc?share=esperar">esperar</a>.</h2>
                    </div>
                    <div class="ActionView">
                        <i onclick="ShareSelection('inicializacao')" class="fa fa-share Share" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="ViewResult" id="se_entao_senao">
                <div class="AjusteViewResult">
                    <div class="Result">
                        <h1 class="Name">Se - Então - Senão</h1>
                        <p class="Info">Se quiser verificar se dois textos são iguais ou diferentes, ou ver se dois números são iguais, diferentes, maiores ou menores
                            que o outro, é possível usar a estrutura <b class="Bold">se</b>.</p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Codigo top">inicio</p>
                            <p class="Cond">se(<span class="ExFunt">condicao</span>) entao {</p>
                            <p class="Comentario" style="padding-left: 45px">comandos</p>
                            <p class="Cond">}</p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="TypeQuebra">Vamos testar a estrutura condicional escrevendo os dois programas: </p>
                        <h2 class="Exemplo">Exemplo 1: </h2>
                        <div class="codeBack">
                            <p class="Codigo top">inicio</p>
                            <p class="Cond">se(<span class="Texto">"isso"</span> <span class="Comparador">==</span> <span class="Texto">"isso"</span>) entao {</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=escrever">escrever(<span class="Numero">1</span><span class="sinais">,</span> <span class="Texto">"isso é igual a isso!"</span>)</a></p>
                            <p class="Cond">}</p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="Type">Note que <span class="Comparador">==</span> é utilizado para comparar os dois textos. Podemos realizar a comparação entre números utilizando</p>

                        <h2 class="Exemplo">Exemplo 2: </h2>
                        <div class="codeBack">
                            <p class="Codigo top">inicio</p>
                            <p class="Cond">se(<span class="Numero">3</span> <span class="Comparador">></span> <span class="Numero">1</span>) entao {</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=escrever">escrever(<span class="Numero">1</span><span class="sinais">,</span> <span class="Texto">"Três é maior que um!"</span>)</a></p>
                            <p class="Cond">}</p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="Type">Se os programas dos dois exercícios foram escritos corretamente, ao executar as rotinas os textos aparecerão na linha 1 do console.</p>

                        <p class="TypeQuebra">Teste vários exemplos utilizando se com condições e valores diferentes, mas leve em conta que:</p>
                        <p class="Comentario"><b class="Comparador codeBackRef">></b> - Compara se é maior que</p>
                        <p class="Comentario"><b class="Comparador codeBackRef">
                                <</b> - Compara se é menor que</p> <p class="Comentario"><b class="Comparador codeBackRef">>=</b> - Compara se é maior ou igual que</p>
                        <p class="Comentario"><b class="Comparador codeBackRef">
                                <=</b> - Compara se é menor ou igual que</p> <p class="Comentario"><b class="Comparador codeBackRef">==</b> - Compara se é igual</p>
                        <p class="Comentario"><b class="Comparador codeBackRef">!=</b> - Compara se é diferente</p>

                        <p class="TypeQuebra">É possível realizar um outro conjunto de comandos caso a condição não seja satisfeita. Para isso podemos utilizar o comando senao .</p>
                        <p class="Type">Teste o seguinte programa: </p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Codigo top">inicio</p>
                            <p class="Cond">se(<span class="Numero">3</span> <span class="Comparador">></span> <span class="Numero">1</span>) entao {</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=escrever">escrever(<span class="Numero">1</span><span class="sinais">,</span> <span class="Texto">"Três é maior que um!"</span>)</a></p>
                            <p class="Cond">} senao {</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=escrever">escrever(<span class="Numero">1</span><span class="sinais">,</span> <span class="Texto">"Três não é maior que um!"</span>)</a></p>
                            <p class="Cond">}</p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="Type">Observe que o texto <span class="Texto codeBackRef">"Três não é maior que um"</span>nunca vai ser escrito no console, pois a condição <span class="Numero codeBackRef">3</span> <span class="Comparador codeBackRef">
                                ></span> <span class="Numero codeBackRef">1</span> sempre é satisfeita</p>

                        <p class="Type ">Agora substitua a condição para <span class="Numero codeBackRef">3</span> <span class="Comparador codeBackRef">
                                <</span> <span class="Numero codeBackRef">1
                            </span> e observe que o texto <span class="Texto codeBackRef">"Três não é maior que um"</span> será escrito no console, pois a condição não é satisfeita. </p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Codigo top">inicio</p>
                            <p class="Cond">se(<span class="Numero">3</span> <span class="Comparador">
                                    <</span> <span class="Numero">1
                                </span>) entao {</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=escrever">escrever(<span class="Numero">1</span><span class="sinais">,</span> <span class="Texto">"Três é menor que um!"</span>)</a></p>
                            <p class="Cond">} senao {</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=escrever">escrever(<span class="Numero">1</span><span class="sinais">,</span> <span class="Texto">"Três não é menor que um!"</span>)</a></p>
                            <p class="Cond">}</p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                    </div>
                    <div class="ActionView">
                        <i onclick="ShareSelection('se_entao_senao')" class="fa fa-share Share" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="ViewResult" id="enquanto_farei">
                <div class="AjusteViewResult">
                    <div class="Result">
                        <h1 class="Name">Enquanto - Farei</h1>
                        <p class="Info">A estrutura enquanto da linguagem R-Educ representa um comando de repetição condicional. A ideia básica é fazer com que a execução
                            de uma série de comandos seja repetida enquanto uma determinada condição for satisfeita. Quando a condição não for mais satisfeita a repetição é finalizada.</p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Codigo top">inicio</p>
                            <p class="Cond">enquanto (<span class="ExFunt">condicao</span>) farei {</p>
                            <p class="Comentario" style="padding-left: 45px">comandos</p>
                            <p class="Cond">}</p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="TypeQuebra">Vamos testar a estrutura enquanto com o seguinte programa: </p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Codigo top">inicio</p>
                            <p class="Cond">enquanto (<a class="LinkFunction" href="reduc?share=ultra">ultra(<span class="Numero">1</span>)</a> <span class="Comparador">></span> <span class="Numero">50</span>) farei {</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=frente">frente(100)</a></p>
                            <p class="Cond">}</p>
                            <p class="CodigoOld"><a class="LinkFunction" href="reduc?share=parar">parar()</a></p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="Type">Ao testar essa rotina podemos observar que a movimentação do robô será acionada para frente enquanto o sensor de ultrassom 1 não detectar
                            um obstáculo a uma distância menor ou igual que 50. Quando a condição não for mais satisfeita a movimentação será interrompida.</p>
                    </div>
                    <div class="ActionView">
                        <i onclick="ShareSelection('enquanto_farei')" class="fa fa-share Share" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="ViewResult" id="farei_enquanto">
                <div class="AjusteViewResult">
                    <div class="Result">
                        <h1 class="Name">Farei - Enquanto</h1>
                        <p class="Info">A estrutura farei da linguagem R-Educ representa um comando de repetição condicional assim como o enquanto apresentado anteriormente.
                            A única diferença entre esta estrutura e a anterior é que nesta, primeiro a sequência de comandos é realizada e, em seguida, a condição é avaliada,
                            caso a condição seja satisfeita os comandos são novamente executados.</p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Codigo top">inicio</p>
                            <p class="Cond">farei {</p>
                            <p class="Comentario" style="padding-left: 45px">comandos</p>
                            <p class="Cond">} enquanto (<span class="ExFunt">condicao</span>)</p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="TypeQuebra">Vamos testar a estrutura farei com o seguinte programa: </p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Codigo top">inicio</p>
                            <p class="Cond">farei {</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=frente">frente(<span class="Numero">100</span>)</a></p>
                            <p class="Cond">} enquanto (<a class="LinkFunction" href="reduc?share=ultra">ultra(<span class="Numero">1</span>)</a> <span class="Comparador">></span> <span class="Numero">50</span>)</p>
                            <p class="CodigoOld"><a class="LinkFunction" href="reduc?share=parar">parar()</a></p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="Type">Ao testar essa rotina podemos observar que a movimentação do robô será acionada para frente enquanto o sensor de ultrassom 1 não detectar
                            um obstáculo a uma distância menor ou igual que 50. Quando a condição não for mais satisfeita a movimentação será interrompida.</p>
                        <p class="Type">A utilização dessa estrutura garante que a sequência de comandos seja realizada ao menos uma vez, ainda que a condição não seja satisfeita.</p>
                    </div>
                    <div class="ActionView">
                        <i onclick="ShareSelection('farei_enquanto')" class="fa fa-share Share" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="ViewResult" id="repita">
                <div class="AjusteViewResult">
                    <div class="Result">
                        <h1 class="Name">Repita</h1>
                        <p class="Info">A estrutura repita da linguagem R-Educ representa um comando de repetição contada. A utilização desta estrutura faz com que um conjunto de comandos seja executado determinado número
                            de vezes. Abaixo apresentamos como deve ser utilizada esta estrutura para que um conjunto de comando seja executado 4 vezes.</p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Codigo top">inicio</p>
                            <p class="Cond">repita <span class="Numero">4</span> vezes {</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=frente">frente(<span class="Numero">100</span>)</a></p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=esperar">esperar(<span class="Numero">100</span>)</a></p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=direita">direita(<span class="Numero">100</span>)</a></p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=esquerda">esquerda(<span class="Numero">100</span>)</a></p>
                            <p class="Cond">}</p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                    </div>
                    <div class="ActionView">
                        <i onclick="ShareSelection('repita')" class="fa fa-share Share" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="ViewResult" id="para">
                <div class="AjusteViewResult">
                    <div class="Result">
                        <h1 class="Name">Para</h1>
                        <p class="Info">A estrutura para da linguagem R-Educ representa um comando de repetição contada. A utilização desta estrutura faz com que um conjunto de comandos
                            seja executado determinado número de vezes. A quantidade de vezes que a sequência de comandos é realizada vai depender do valor da variável de
                            controle que vai assumir valores desde um limite superior até um limite inferior, percorrendo-os de acordo com um determinado passo informado na estrutura.</p>
                        <p class="TypeQuebra">No código abaixo a variável de controle foi chamada de variavel, o limite inferior e superior de valor1 e valor2 respectivamente e o passo de x.</p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Cond top" style="padding-left: 10px">numero <span class="Variavel">variavel</span> <span class="Comparador">=</span> <span class="Numero">0</span></p>
                            <p class="Codigo top">inicio</p>
                            <p class="Cond">para <span class="Variavel">variavel</span> de <span class="Numero">valor1</span> ate <span class="Numero">valor2</span> passo <span class="Numero">x</span> farei {</p>
                            <p class="Comentario" style="padding-left: 45px;">comandos</p>
                            <p class="Cond">}</p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="TypeQuebra">Para testar essa estrutura vamos utilizar o seguinte código: </p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Cond top" style="padding-left: 10px">numero <span class="Variavel">variavel</span> <span class="Comparador">=</span> <span class="Numero">0</span></p>
                            <p class="Codigo top">inicio</p>
                            <p class="Cond">para <span class="Variavel">variavel</span> de <span class="Numero">1</span> ate <span class="Numero">5</span> passo <span class="Numero">1</span> farei {</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=escrevernumero">escrevernumero(<span class="Numero">1</span><span class="sinais">,</span> <span class="Variavel">variavel</span>)</a></p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=esperar">esperar(<span class="Numero">1000</span>)</a></p>
                            <p class="Cond">}</p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="TypeQuebra">Ao executar esta rotina podemos observar que a contagem de 1 a 5 será apresentada na linha 1 do console. Cada valor será escrito em intervalos de 1 segundo devido a utilização do comando <a class="LinkFunction codeBackRef" href="reduc?share=esperar">esperar(<span class="Numero ">1000</span>)</a>.</p>
                        <p class="Type">Faça uma alteração no passo para 2 e observe novamente a contagem: </p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Cond top" style="padding-left: 10px">numero <span class="Variavel">variavel</span> <span class="Comparador">=</span> <span class="Numero">0</span></p>
                            <p class="Codigo top">inicio</p>
                            <p class="Cond">para <span class="Variavel">variavel</span> de <span class="Numero">1</span> ate <span class="Numero">5</span> passo <span class="Numero">2</span> farei {</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=escrevernumero">escrevernumero(<span class="Numero">1</span><span class="sinais">,</span> <span class="Variavel">variavel</span>)</a></p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=esperar">esperar(<span class="Numero">1000</span>)</a></p>
                            <p class="Cond">}</p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                    </div>
                    <div class="ActionView">
                        <i onclick="ShareSelection('para')" class="fa fa-share Share" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="ViewResult" id="teste">
                <div class="AjusteViewResult">
                    <div class="Result">
                        <h1 class="Name">Teste</h1>
                        <p class="Info">A estrutura teste da linguagem R-Educ representa um comando de seleção. A utilização desta estrutura faz com que o valor de uma variável do tipo texto fornecida
                            seja avaliado e dependendo de seu valor uma determinada sequência de comandos é realizada. No código abaixo a variável testada foi chamada de variavel e caso o seu valor seja
                            igual a valor1 a sequência de comandos denominada no código como comandos1 será executada, caso seu valor seja igual a valor2 o conjunto comandos2 será executado. Caso seu
                            valor não seja nenhum dos apresentados a sequência de comandos denominada de comandos3 será executada.</p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Codigo top">inicio</p>
                            <p class="Cond">teste (<span class="Variavel">variavel</span>) {</p>
                            <p class="Cond" style="padding-left: 45px;">caso <span class="Numero">valor1</span>:</p>
                            <p class="Comentario" style="padding-left: 65px;">comandos1</p>
                            <p class="Cond" style="padding-left: 45px;">caso <span class="Numero">valor2</span>:</p>
                            <p class="Comentario" style="padding-left: 65px;">comandos2</p>
                            <p class="Cond" style="padding-left: 45px;">outros:</p>
                            <p class="Comentario" style="padding-left: 65px;">comandos3</p>
                            <p class="Cond">}</p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="TypeQuebra">Para testar essa estrutura vamos escrever um programa que avalia a leitura do sensor de cor 2 e realiza escritas no console dependendo do valor lido: </p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Cond top" style="padding-left: 10px">texto <span class="Variavel">minhaLeitura </span> <span class="Comparador">=</span> <span class="Texto">"Aguardando leitura."</span></p>
                            <p class="Codigo top">inicio</p>
                            <p class="Variavel" style="padding-left: 25px;">minhaLeitura <span class="Comparador">=</span> <a class="LinkFunction" href="reduc?share=cor">cor(<span class="Numero">2</span>)</a></p>
                            <p class="Cond">teste (<span class="Variavel">minhaLeitura</span>) {</p>
                            <p class="Cond" style="padding-left: 45px;">caso <span class="Texto">"PRETO"</span>:</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=escrever">escrever(<span class="Numero">1</span><span class="sinais">,</span> <span class="Texto">"Meu sensor leu Preto."</span>)</a></p>
                            <p class="Cond" style="padding-left: 45px;">caso <span class="Texto">"BRANCO"</span>:</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=escrever">escrever(<span class="Numero">1</span><span class="sinais">,</span> <span class="Texto">"Meu sensor leu Branco."</span>)</a></p>
                            <p class="Cond" style="padding-left: 45px;">outros:</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=escrever">escrever(<span class="Numero">1</span><span class="sinais">,</span> <span class="Texto">"Meu sensor leu:"</span>)</a></p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=escrever">escrever(<span class="Numero">2</span><span class="sinais">,</span> <a class="LinkFunction" href="reduc?share=cor">cor(<span class="Numero">2</span>))</a></p>
                            <p class="Cond">}</p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="Type">No programa acima a estrutura verifica e a leitura do sensor de cor 2, armazenada na variável minhaLeitura retornou "PRETO", "BRANCO" ou outro valor.</p>
                    </div>
                    <div class="ActionView">
                        <i onclick="ShareSelection('teste')" class="fa fa-share Share" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="ViewResult" id="tarefas">
                <div class="AjusteViewResult">
                    <div class="Result">
                        <h1 class="Name">Tarefas</h1>
                        <p class="Info">Um programa escrito em R-Educ pode conter tarefas: conjunto de comandos nomeados que também são chamados de funções, procedimentos ou sub-rotinas. Para que esta estrutura seja utilizada ela deve ser definida <span class="Bold">antes do início do programa</span>.</p>
                        <p class="TypeQuebra">A declaração de uma tarefa com nome "funcao" por exemplo, é feita como segue: </p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Cond top" style="padding-left: 10px;">tarefa <span class="Variavel">funcao</span>{</p>
                            <p class="Comentario">comandos</p>
                            <p class="Cond bottom" style="padding-left: 10px;">}</p>
                        </div>
                        <p class="Type">Ao declarar uma tarefa a sequência de comandos contida nela não será executada. Para que a execução de seus comandos seja realizada é necessário que o seu nome seja chamado da seguinte forma: </p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Cond top"></p>
                            <p class="Cond" style="padding-left: 10px;"><span class="Variavel">funcao</span>()</p>
                            <p class="Cond bottom"></p>
                        </div>
                        <p class="TypeQuebra">A seguir apresentamos um exemplo de definição e utilização de uma tarefa. No exemplo chamaremos a tarefa de minhaTarefa. </p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Cond top" style="padding-left: 10px;">tarefa <span class="Variavel">funcao</span>{</p>
                            <p class="CodigoOld"><a class="LinkFunction" href="reduc?share=frente">frente(<span class="Numero">100</span>)</a></p>
                            <p class="CodigoOld"><a class="LinkFunction" href="reduc?share=esperar">esperar(<span class="Numero">1000</span>)</a></p>
                            <p class="Cond" style="padding-left: 10px;">}</p>
                            <p class="Codigo top">inicio</p>
                            <p class="CodigoOld"><span class="Variavel">funcao</span>()</p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="Type">Ao executar esta rotina podemos observar que os comandos inseridos na tarefa serão executados.</p>
                    </div>
                    <div class="ActionView">
                        <i onclick="ShareSelection('tarefas')" class="fa fa-share Share" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="ViewResult" id="tiposdedados">
                <div class="AjusteViewResult">
                    <div class="Result">
                        <h1 class="Name">Tipos de dados</h1>
                        <p class="Info">A linguagem R-Educ opera sobre três tipos de dados: <span class="Texto codeBackRef">texto</span>, <span class="Numero codeBackRef">numero</span> e <span class="Booleano codeBackRef">booleano</span>. As variáveis devem ser definidas sempre <span class="Bold">antes do inicio e fora das tarefas</span>.</p>
                        <p class="TypeQuebra">O tipo de dado <span class="Texto codeBackRef">texto</span> manipula variáveis do tipo String, que são sequências de símbolos e caracteres separados ou não por espaços e delimitados por aspas duplas.</p>
                        <p class="TypeQuebra">No programa a seguir, definimos uma variável do tipo <span class="Texto codeBackRef">texto</span> com o nome <span class="Variavel codeBackRef">minhaVariavel</span> e conteúdo <span class="Texto codeBackRef">"Esse é meu texto!"</span>.</p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Cond top" style="padding-left: 10px">texto <span class="Variavel">minhaVariavel</span> <span class="Comparador">=</span> <span class="Texto">"Esse é meu texto!"</span></p>
                            <p class="Codigo top">inicio</p>
                            <p class="CodigoOld"><a class="LinkFunction" href="reduc?share=escrever">escrever(<span class="Numero">1</span><span class="sinais">,</span> <span class="Variavel">minhaVariavel</span>)</a></p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="TypeQuebra">Ao ser executada a rotina o conteúdo da variável será escrito na linha 1 do console. Podemos também utilizar as variáveis para armazenar o valor da leitura do sensor de cor que retorna um texto, por exemplo: </p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Cond top" style="padding-left: 10px">texto <span class="Variavel">minhaVariavel</span> <span class="Comparador">=</span> <span class="Texto">"Esperando leitura"</span></p>
                            <p class="Codigo top">inicio</p>
                            <p class="Variavel" style="padding-left: 25px;">minhaVariavel <span class="Comparador">=</span> <a class="LinkFunction" href="reduc?share=cor">cor(<span class="Numero">1</span>)</a></p>
                            <p class="CodigoOld"><a class="LinkFunction" href="reduc?share=escrever">escrever(<span class="Numero">1</span><span class="sinais">,</span> <span class="Variavel">minhaVariavel</span>)</a></p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="TypeQuebra">Ao ser executado, este programa fará a leitura do sensor de cor 1, armazenará o valor lido em minhaVariavel e imprimirá seu valor na linha 1 do console. </p>
                        <p class="TypeQuebra">O tipo de dado <span class="Numero codeBackRef">numero</span> manipula variáveis do tipo double, números que podem assumir valores inteiros ou em ponto flutuante. Abaixo temos um exemplo da criação de uma variável do tipo numero com nome comparacao e conteúdo 3.</p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Cond top" style="padding-left: 10px">numero <span class="Variavel">comparacao </span> <span class="Comparador">=</span> <span class="Numero">3</span></p>
                            <p class="Codigo top">inicio</p>
                            <p class="Cond">se(<span class="Variavel">comparacao</span> <span class="Comparador">></span> <span class="Numero">5</span>) entao {</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=escrever">escrever(<span class="Numero">2</span><span class="sinais">,</span> <span class="Texto">"O valor da variável é maior que 5"</span>)</a></p>
                            <p class="Cond">}senoa{</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=escrever">escrever(<span class="Numero">2</span><span class="sinais">,</span> <span class="Texto">"O valor da variável é menor que 5"</span>)</a></p>
                            <p class="Cond">}</p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="TypeQuebra">Ao ser executado, este programa irá verificar se o valor armazenado na variável comparacao é maior do que 5, caso seja o texto "O valor da variável é maior que 5" será escrito na linha 2 do console. </p>
                        <p class="TypeQuebra">O tipo de dado <span class="Booleano codeBackRef">booleano</span> manipula variáveis lógicas do tipo verdadeiro ou falso. Abaixo temos um exemplo da criação de uma variável do tipo booleano com nome variavel e conteúdo verdadeiro.</p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="Cond top" style="padding-left: 10px">booleano <span class="Variavel">minhaVariavel</span> <span class="Comparador">=</span> <span class="Booleano">verdadeiro</span></p>
                            <p class="Codigo top">inicio</p>
                            <p class="Cond">se(<span class="Variavel">minhaVariavel</span> <span class="Comparador">></span> <span class="Booleano">verdadeiro</span>) entao {</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=escrever">escrever(<span class="Numero">2</span><span class="sinais">,</span> <span class="Texto">"minhaVariavel é verdadeira</span>)</a></p>
                            <p class="Cond">}senoa{</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=escrever">escrever(<span class="Numero">2</span><span class="sinais">,</span> <span class="Texto">"minhaVariavel é falsa"</span>)</a></p>
                            <p class="Cond">}</p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="TypeQuebra">Ao ser executado, este programa irá verificar se o valor armazenado na variável é verdadeiro, caso seja, o texto "minhaVariavel é verdadeira" será escrito na linha 1 do console. </p>
                    </div>
                    <div class="ActionView">
                        <i onclick="ShareSelection('tiposdedados')" class="fa fa-share Share" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="ViewResult" id="comentarios">
                <div class="AjusteViewResult">
                    <div class="Result">
                        <h1 class="Name">Comentários</h1>
                        <p class="Info">Para documentar bem seu código, indicando o que cada trecho de código executa, é possível inserir comentários. Em R-Educ os comentários de 1 linhas são inseridos utilizando o caracter
                            <span class="Bold">#</span> antes da linha que deseja comentar. Ao utilizar esse caracter tudo que vier após ele na mesma linha será ignorado.</p>
                        <h2 class="Exemplo">Exemplo: </h2>
                        <div class="codeBack">
                            <p class="ComentarioCode top" style="padding-left: 10px;"># Este é o meu programa!</p>
                            <p class="Codigo top">inicio</p>
                            <p class="CodigoOld" style="padding-left: 45px;"><span class="ComentarioCode"># frente(100)</p></span></p>
                            <p class="CodigoOld" style="padding-left: 45px;"><a class="LinkFunction" href="reduc?share=esperar">esperar(<span class="Numero">100</span>)</a></p>
                            <p class="Codigo bottom">fim</p>
                        </div>
                        <p class="Type">Ao ser executado, este programa irá apenas realizar uma espera de 1000 milissegundos antes de finalizar, isso ocorre pois devido a presença do
                            caracter <span class="ComentarioCode codeBackRef">#</span> antes do comando <a class="LinkFunction codeBackRef" href="reduc?share=frente">frente(<span class="Numero">100</span>)</a> este será ignorado não sendo executado pelo robô.</p>
                    </div>
                    <div class="ActionView">
                        <i onclick="ShareSelection('comentarios')" class="fa fa-share Share" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
        </div>
        <div class="MenuLinguagem">
            <div class="FundoMenuLinguagem">
                <div class="AjusteMenuLinguagem">
                    <div class="direitaMenuLinguagem">
                    </div>
                    <div class="esquerdaMenuLinguagem">
                        <i id="CleanSearch" class="fa fa-times-circle" aria-hidden="true"></i>
                        <div id="barraDivision"></div>
                        <i id="DarkModeMobileMenu" onclick="modeStyle()" class="fa fa-adjust" aria-hidden="true"></i>
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

    function modeStyle() {
        if (darkMode == 0) {
            window.location.href = "reduc?m=5MAcmRtiNQQA";
        } else {
            window.location.href = "reduc?m=V6Y95KtZQXHP"
        }
    }

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

    function copiar(text) {
        Indisponivel();
    }

    function ShareSelection(funcao) {
        Indisponivel();
    }

    $("#RE").click(function() {
        window.location.href = "../funcoes/reduc";
    });

    $("#CSHARP").click(function() {
        window.location.href = "../funcoes/csharp";
    });

    $("#LOGO").click(function() {
        $doc.animate({
            scrollTop: $("#conteined").offset().top - 300
        }, 500);
    });

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</html>