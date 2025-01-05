<?php
include_once './modules/config.php';
// Configurações do banco de dados
$host = CONF_DB_HOST;
$dbname = CONF_DB_NAME;
$username = CONF_DB_USER;
$password = CONF_DB_PASS;

try {
    // Conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar se o parâmetro 'pais' foi enviado
    if (!isset($_GET['pais']) || empty($_GET['pais'])) {
        throw new Exception("Parâmetro 'pais' não informado.");
    }

    // Obter o nome do país
    $pais = $_GET['pais'];

    // Verificar se o país já existe na tabela
    $stmt = $pdo->prepare("SELECT id FROM paises WHERE pais = :pais");
    $stmt->bindParam(':pais', $pais);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // País já existe, atualizar a coluna 'updated_at'
        $stmt = $pdo->prepare("UPDATE paises SET updated_at = CURRENT_TIMESTAMP WHERE pais = :pais");
        $stmt->bindParam(':pais', $pais);
        $stmt->execute();
    } else {
        // País não existe, inserir um novo registro
        $stmt = $pdo->prepare("INSERT INTO paises (pais) VALUES (:pais)");
        $stmt->bindParam(':pais', $pais);
        $stmt->execute();
    }

    // Retornar resposta de sucesso
    echo json_encode(['status' => 'success', 'message' => 'Registro salvo com sucesso.']);
} catch (Exception $e) {
    // Retornar erro em caso de exceção
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
