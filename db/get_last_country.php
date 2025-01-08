<?php
include_once '../modules/config.php';
// Configurações do banco de dados
$host = CONF_DB_HOST;
$dbname = CONF_DB_NAME;
$username = CONF_DB_USER;
$password = CONF_DB_PASS;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT pais, updated_at FROM paises ORDER BY updated_at DESC LIMIT 1");
    $lastCountry = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($lastCountry) {
      echo json_encode(['status' => 'success', 'data' => $lastCountry]);
  } else {
      echo json_encode(['status' => 'success', 'data' => null, 'message' => 'Nenhum país pesquisado ainda.']);
  }
} catch (Exception $e) {
    // Retornar erro em caso de exceção
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>