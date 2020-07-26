<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../funcoes/font-awesome/css/font-awesome.min.css">
    <script src="../../funcoes/sweet/sweetalert2.all.min.js"></script>
</head>
<style>
    #BlackFundo {
        display: block;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.952);
    }
</style>

<body>
    <?php
    error_reporting(E_ERROR | E_PARSE);
    $UserAcesso = $_GET['token'];
    $PassAcesso = $_GET['tokenpass'];
    $data = $_GET['data'];

    $UserAcesso = md5($UserAcesso);
    $PassAcesso = md5($PassAcesso);
    $data = md5($data);

    // Credencial de validação
    //token=MiNAmZhlhgCoufVm0SOUU8&tokenpass=5pWYw6mRv7KfYhS4o5ZIKW&data=auth['Data Atual']
    $Token = md5("MiNAmZhlhgCoufVm0SOUU8");
    $Tokenpass = md5("5pWYw6mRv7KfYhS4o5ZIKW");
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('H:i:s');
    $data = md5("auth" . $data);
    if ($UserAcesso == $Token && $PassAcesso == $Tokenpass && $data == $data) {
        $inicializacao = array(
            'id' => 1,
            'share' => 'inicializacao',
            'name' => 'Inicialização',
            'search' => array(
                '1' => 'como começar',
                '2' => 'como inciar',
                '3' => 'inicializacao'
            ),
            'created_at' => '2020-07-25 21:46:00',
            'updated_at' => '2020-07-25 21:46:00'
        );
        $se_entao_senao = array(
            'id' => 2,
            'share' => 'se_entao_senao',
            'name' => 'Se - Então - Senão',
            'search' => array(
                '1' => 'se',
                '2' => 'senao',
                '3' => 'senão',
                '4' => 'entao',
                '5' => 'então',
                '6' => 'se senão',
                '7' => 'se então',
                '8' => 'se senão',
                '9' => 'se então'
            ),
            'created_at' => '2020-07-25 21:46:00',
            'updated_at' => '2020-07-25 21:46:00'
        );
        $enquanto_farei = array(
            'id' => 3,
            'share' => 'enquanto_farei',
            'name' => 'Enquanto - Farei',
            'search' => array(
                '1' => 'enquanto',
                '2' => 'farei',
                '3' => 'Farei',
                '4' => 'enquanto',
                '5' => 'enquanto farei'
            ),
            'created_at' => '2020-07-25 21:46:00',
            'updated_at' => '2020-07-25 21:46:00'
        );
        $farei_enquanto = array(
            'id' => 4,
            'share' => 'farei_enquanto',
            'name' => 'Farei - Enquanto',
            'search' => array(
                '1' => 'enquanto',
                '2' => 'farei',
                '3' => 'Farei',
                '4' => 'Enquanto',
                '5' => 'farei enquanto',
                '6' => 'Farei Enquanto',
                '7' => 'Farei enquanto',
                '8' => 'farei Enquanto'
            ),
            'created_at' => '2020-07-25 21:46:00',
            'updated_at' => '2020-07-25 21:46:00'
        );
        $Repita = array(
            'id' => 5,
            'share' => 'repita',
            'name' => 'Repita',
            'search' => array(
                '1' => 'repita',
                '2' => 'Repita'
            ),
            'created_at' => '2020-07-25 21:46:00',
            'updated_at' => '2020-07-25 21:46:00'
        );
        $Para = array(
            'id' => 6,
            'share' => 'para',
            'name' => 'Para',
            'search' => array(
                '1' => 'para',
                '2' => 'parar',
                '3' => 'Para',
                '4' => 'Parar'
            ),
            'created_at' => '2020-07-25 21:46:00',
            'updated_at' => '2020-07-25 21:46:00'
        );
        $Teste = array(
            'id' => 7,
            'share' => 'teste',
            'name' => 'Teste',
            'search' => array(
                '1' => 'Teste',
                '2' => 'teste'
            ),
            'created_at' => '2020-07-25 21:46:00',
            'updated_at' => '2020-07-25 21:46:00'
        );
        $Tarefas = array(
            'id' => 8,
            'share' => 'tarefa',
            'name' => 'Tarefas',
            'search' => array(
                '1' => 'Tarefas',
                '2' => 'tarefas',
                '3' => 'Tarefa',
                '4' => 'tarefa'
            ),
            'created_at' => '2020-07-25 21:46:00',
            'updated_at' => '2020-07-25 21:46:00'
        );
        $Tipos_de_dados = array(
            'id' => 9,
            'share' => 'tipo_de_dados',
            'name' => 'Tipos de dados',
            'search' => array(
                '1' => 'tipo de dados',
                '2' => 'dados',
                '3' => 'tipo',
                '4' => 'Tipo de Dados'
            ),
            'created_at' => '2020-07-25 21:46:00',
            'updated_at' => '2020-07-25 21:46:00'
        );
        $tutorial = array($inicializacao, $se_entao_senao, $enquanto_farei, $farei_enquanto, $Repita, $Para, $Teste, $Tarefas, $Tipos_de_dados);

        // $dados_identificador = array('tutorial' => $tutorial);

        $tutorial_json = json_encode($tutorial);

        $JSON_file_Name = "./tutorial.json";
        if (file_exists($JSON_file_Name)) {
            unlink($JSON_file_Name);
            $fp = fopen($JSON_file_Name, "a");
            $escreve = fwrite($fp, $tutorial_json);
        } else {
            $fp = fopen($JSON_file_Name, "a");
            $escreve = fwrite($fp, $tutorial_json);
        }

        fclose($fp);
        echo '<div id="BlackFundo">';
        echo "<script>
            let timerInterval
            Swal.fire({
                icon: 'success',
                title:'Sucesso!',
                html: 'Arquivo Tutorial.json alterado!',
                timer: 3000,
                timerProgressBar: true,
                onClose: function() {
                    window.location.href = \"../../funcoes\";
                }
            }).then(function(result) {
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = \"../../funcoes\";
                }
            })
            setTimeout(function() {
                window.location.href = \"../../funcoes\";
            },3000);
            ";
        echo '</script></div>';
    } else {
        echo '<script>window.location.href="../../funcoes"</script>';
    }
    ?>
</body>

</html>