<?php

function processar_cpf($cpf) {
    $credentials = 'jo_gonzaga88@hotmail.com:@Saude123';
    $credentials_base64 = base64_encode($credentials);
    $url_login = 'https://servicos-cloud.saude.gov.br/pni-bff/v1/autenticacao/tokenAcesso';
    $url_pesquisa_base = 'https://servicos-cloud.saude.gov.br/pni-bff/v1/cidadao/cpf/';
    $max_retries = 3; 
    $retry_delay = 5; 

    // Função para fazer login e obter o token de acesso
    function obter_token($url_login, $headers_login, $max_retries, $retry_delay) {
        for ($i = 0; $i < $max_retries; $i++) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url_login);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers_login);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $response_login = curl_exec($ch);
            curl_close($ch);

            if ($response_login === false) {
                sleep($retry_delay);
                continue;
            }

            $login_data = json_decode($response_login, true);
            if (isset($login_data['accessToken'])) {
                return $login_data['accessToken'];
            }
        }
        return null; // Retornar null se não conseguiu obter o token
    }

    // Função para realizar a pesquisa
    function realizar_pesquisa($url_pesquisa, $headers_pesquisa, $max_retries, $retry_delay) {
        for ($j = 0; $j < $max_retries; $j++) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url_pesquisa);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers_pesquisa);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $response_pesquisa = curl_exec($ch);
            curl_close($ch);

            if ($response_pesquisa === false) {
                sleep($retry_delay);
                continue;
            }

            $dados_pessoais = json_decode($response_pesquisa, true);
            if (isset($dados_pessoais['records'])) {
                return $response_pesquisa; // Retornar os dados pessoais
            }
        }
        return null; // Retornar null se a pesquisa falhar
    }

    // Headers para login
    $headers_login = [
        "Host: servicos-cloud.saude.gov.br",
        "Connection: keep-alive",
        "Content-Length: 0",
        "sec-ch-ua: \"Not.A/Brand\";v=\"8\", \"Chromium\";v=\"114\", \"Google Chrome\";v=\"114\"",
        "accept: application/json",
        "X-Authorization: Basic $credentials_base64",
        "sec-ch-ua-mobile: ?0",
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36",
        "sec-ch-ua-platform: Windows",
        "Origin: https://si-pni.saude.gov.br",
        "Sec-Fetch-Site: same-site",
        "Sec-Fetch-Mode: cors",
        "Sec-Fetch-Dest: empty",
        "Referer: https://si-pni.saude.gov.br/",
        "Accept-Encoding: gzip, deflate, br",
        "Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7"
    ];

    // Tentar obter o token de acesso
    $token_acesso = obter_token($url_login, $headers_login, $max_retries, $retry_delay);

    if (!$token_acesso) {
        return json_encode(["error" => "Erro no login, não foi possível obter o token"]);
    }

    // Headers para pesquisa
    $url_pesquisa = $url_pesquisa_base . $cpf;
    $headers_pesquisa = [
        'Host: servicos-cloud.saude.gov.br',
        "Authorization: Bearer $token_acesso",
        'Accept: application/json, text/plain, */*',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'Origin: https://si-pni.saude.gov.br',
        'Sec-Fetch-Site: same-site',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Dest: empty',
        'Referer: https://si-pni.saude.gov.br/',
        'Accept-Encoding: gzip, deflate, br',
        'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7'
    ];

    // Tentar realizar a pesquisa
    $dados_pessoais = realizar_pesquisa($url_pesquisa, $headers_pesquisa, $max_retries, $retry_delay);

    if ($dados_pessoais) {
        return $dados_pessoais; // Retornar os dados se a pesquisa foi bem-sucedida
    } else {
        return json_encode(["error" => "Erro na pesquisa, não foi possível obter os dados"]);
    }
}

header('Content-Type: application/json');

if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];
    echo processar_cpf($cpf);
} else {
    echo json_encode(["error" => "Por favor, forneça o CPF na URL como ?cpf=seu_cpf"]);
}
?>
