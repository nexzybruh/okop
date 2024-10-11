<?php

include("conexao.php");

session_start();
$is_localhost = ($_SERVER['REMOTE_ADDR'] === '127.0.0.1' || $_SERVER['REMOTE_ADDR'] === '::1');
if (!$is_localhost && $captcha_response) {
    $captcha_secret = '0x4AAAAAAAkv31gTVxo1gJkheOmwXTH-u7Q';
    $captcha_url = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
    $data = [
        'secret' => $captcha_secret,
        'response' => $captcha_response
    ];

    $ch = curl_init($captcha_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $captcha_result = curl_exec($ch);
    curl_close($ch);

    $captcha_result = json_decode($captcha_result, true);

    if (!$captcha_result['success']) {
        echo json_encode(['status' => 'error', 'message' => 'CAPTCHA verification failed']);
        exit;
    }
}
$captcha_response = isset($_REQUEST['captcha']) ? $_REQUEST['captcha'] : null;
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

if(empty($usuario) and empty($senha)){
    $json = array("success" => false, "message" => "Preencha os Dados.");
    echo json_encode($json);
    exit();
}


$sql = "SELECT * FROM usuarios where usuario = '$usuario' and senha = '$senha'";
$execute = mysqli_query($conexao, $sql);

if(mysqli_num_rows($execute) > 0){
    $array = mysqli_fetch_assoc($execute);

    $dias1 = $array["dias"];
    $dias2 = $array["data_acesso"];

    $data_inicial = date("Y-m-d");
    $dias2 = date($dias1);

    $diferenca = strtotime($dias2) - strtotime($data_inicial);

    $dias = floor($diferenca / (60 * 60 * 24));

    if($dias > 0){


        if(!isset($_SESSION)) {
        session_start();
        }
    
        $_SESSION["logado"] = true;
        $_SESSION["usuario"] = $array["usuario"];
        $_SESSION["dias"] = $array["dias"];
        $_SESSION["id"] = $array["id"];
        $_SESSION["nivel"] = $array["nivel"];
    
    
    
        $json = array("success" => true);
        echo json_encode($json);
    }

    elseif($dias == "0"){
        $_SESSION["logado"] = true;
        $_SESSION["dias"] = $array["dias"];
        $_SESSION["usuario"] = $array["usuario"];

        $json = array("renovar" => true, "message" => "Seu usuário Expirou");
        echo json_encode($json);
    }

    elseif($dias < "-0"){
        $_SESSION["logado"] = true;
        $_SESSION["expirado"] = true;
        $_SESSION["dias"] = $array["dias"];
        $_SESSION["usuario"] = $array["usuario"];

        $json = array("renovar" => true, "message" => "Seu usuário Expirou");
        echo json_encode($json);
    }

}

else{
    $json = array("success" => false, "message" => "Usuário ou Senha incorretos");
    echo json_encode($json);
}

?>