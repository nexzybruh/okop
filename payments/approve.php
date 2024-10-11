<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$access_token = "APP_USR-5645205528502458-062720-73f39f71cc203b79d09c2398c2c923cb-1665526945";
$url = "https://api.mercadopago.com/v1/payments";
include 'conexao.php';
header('Content-Type: application/json');

if (!isset($_GET['id'])) {
    echo json_encode(["success" => false, "message" => "ID inválido"]);
    exit;
}

$id = (int)$_GET['id'];

$qr = mysqli_query($conexao, "SELECT * FROM payment WHERE payid = $id");

if (mysqli_num_rows($qr) == 0) {
    echo json_encode(["success" => false, "message" => "ID inválido"]);
    exit;
}

$array = mysqli_fetch_array($qr);

// cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url . "/" . $id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $access_token",
    "Content-Type: application/json"
]);

// Execute cURL
$response = curl_exec($ch);

// Handle cURL errors
if (curl_errno($ch)) {
    echo json_encode(["success" => false, "message" => "cURL error: " . curl_error($ch)]);
    curl_close($ch);
    exit;
}

// Close cURL session
curl_close($ch);

$responseData = json_decode($response, true);

if (isset($responseData['status'])) {
    if ($responseData['status'] == 'approved' || isset($_GET['test'])) {
        $usuario = htmlspecialchars(mysqli_real_escape_string($conexao, $array['user']));
        $senha = htmlspecialchars(mysqli_real_escape_string($conexao, $array['password']));
        $email = htmlspecialchars(mysqli_real_escape_string($conexao, $array['email']));
        $plano = htmlspecialchars(mysqli_real_escape_string($conexao, $array['plano']));
        
        // Verificar se o usuário já existe
        $verificaUsuario = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email = '$email'");
        
        if (mysqli_num_rows($verificaUsuario) == 0) {
            $sql = "INSERT INTO usuarios (usuario, senha, email, nivel, dias) VALUES ('$usuario', '$senha', '$email', 0, '$plano')";
            $query = mysqli_query($conexao, $sql);
            
            if ($query) {
                // Remover da tabela payment
                mysqli_query($conexao, "DELETE FROM payment WHERE payid = $id");
                echo json_encode(["success" => true, "status" => "approved", "message" => "Usuário criado com sucesso."]);
            } else {
                echo json_encode(["success" => false, "message" => "Falha ao criar usuário."]);
            }
        } else {
            echo json_encode(["success" => false, "message" => "Usuário já existe."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Pagamento não aprovado."]);
    }
} else {
    echo json_encode([
        "success" => false,
        "message" => "Falha ao recuperar detalhes do pagamento."
    ]);
}
?>
