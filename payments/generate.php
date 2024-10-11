<?php
include 'conexao.php';
date_default_timezone_set('America/Sao_Paulo');

header('Content-Type: application/json');

$required_params = ['usuario', 'email', 'senha', 'plano'];
foreach ($required_params as $param) {
    if (!isset($_GET[$param])) {
        echo json_encode(['error' => "Parâmetro '$param' é obrigatório."]);
        exit;
    }
}

$usuario = $_GET['usuario'];
$email = $_GET['email'];
$senha = $_GET['senha'];
$plano = $_GET['plano'];

if (!in_array($plano, ['1', '2', '3'])) {
    echo json_encode(['error' => "Parâmetro 'plano' deve ser 1, 2 ou 3."]);
    exit;
}

$plano_array = ['1' => 10, '2' => 25, '3' => 40];
$plano_a_datas = ['1' => '+1 day', '2' => '+7 days', '3' => '+1 month'];

$access_token = "APP_USR-5645205528502458-062720-73f39f71cc203b79d09c2398c2c923cb-1665526945";
$url = "https://api.mercadopago.com/v1/payments";

$data = [
    "transaction_amount" => $plano_array[$plano],
    "description" => "Pagamento $usuario e $senha",
    "payment_method_id" => "pix",
    "payer" => [
        "email" => $email,
    ],
    "additional_info" => [
        "items" => [
            [
                "id" => "item-ID",
                "title" => "Plano $plano",
                "description" => "Descrição do Plano",
                "quantity" => 1,
                "unit_price" => $plano_array[$plano],
            ],
        ],
    ],
];

$idempotencyKey = uniqid();
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $access_token",
    "Content-Type: application/json",
    "X-Idempotency-Key: $idempotencyKey",
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo json_encode(['error' => 'Erro: ' . curl_error($ch)]);
    exit;
}
curl_close($ch);
$response_data = json_decode($response, true);

if (isset($response_data['id'])) {
    $payment_id = $response_data['id'];
    $status = $response_data['status'];
    $qr_code = $response_data['point_of_interaction']['transaction_data']['qr_code'] ?? null;
    
    $plano_data = date('Y-m-d', strtotime($plano_a_datas[$plano]));
    
    $sql = "INSERT INTO payment (user, email, password, payid, plano) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'sssss', $usuario, $email, $senha, $payment_id, $plano_data);
    
    if (mysqli_stmt_execute($stmt)) {
        $response_json = [
            'payment_id' => $payment_id,
            'status' => $status,
            'qr_code' => $qr_code,
            'ticket' => $payment_id,
        ];
        
        $response_base64 = $response_data['point_of_interaction']['transaction_data']['qr_code_base64'] ?? null;;
        echo json_encode(['response' => $response_json, 'base64' => $response_base64]);
    } else {
        echo json_encode(['error' => 'Erro ao inserir dados no banco: ' . mysqli_error($conexao)]);
    }

    mysqli_stmt_close($stmt);
} else {
    echo json_encode(['error' => 'Erro ao gerar pagamento: ' . ($response_data['message'] ?? 'Unknown error')]);
}

mysqli_close($conexao);
?>
