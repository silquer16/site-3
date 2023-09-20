<?php
// Conectar ao banco de dados (substitua as informações com as suas)
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Recuperar dados do formulário
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); // Criptografa a senha

// Inserir dados na tabela
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

if ($conn->query($sql) === TRUE) {
    echo "Registro bem-sucedido!";
} else {
    echo "Erro ao registrar: " . $conn->error;
}

$conn->close();
?>

<?php
// Conectar ao banco de dados (substitua as informações com as suas)
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Recuperar dados do formulário
$email = $_POST["email"];
$senha = $_POST["senha"];

// Verificar o login
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($senha, $row["senha"])) {
        echo "Login bem-sucedido!";
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Usuário não encontrado!";
}

$conn->close();
?>
