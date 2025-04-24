$serverName = "localhost"; 
$username = "root"; 
$password = ""; 
$dbNome = "Meu banco"; 


$conn = new mysqli($serverName, $username, $password, $dbNome); 

if ($conn->connect_error) { // Corrigido para "connect_error"
    die("Falha na conexão: " . $conn->connect_error); 
}

echo "Conectado com sucesso!"; 