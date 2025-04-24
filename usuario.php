require_once 'database.php';

class Usuario {
    protected $DB;
    protected $nome; 
    protected $email;
    protected $senha;

    public function __construct($nome, $email, $senha) {
        $this->DB = (new Database())->getConnection(); 

        $this->nome = $nome;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT); 
    }

    public function salvar() {
        $SQL = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES (:nome, :email, :senha, 'usuário')"; 

        $STMT = $this->DB->prepare($SQL);
        $STMT->bindParam(':nome', $this->nome); 
        $STMT->bindParam(':email', $this->email); 
        $STMT->bindParam(':senha', $this->senha); 

        return $STMT->execute(); 
    }

    public function login($email, $senha) {
        $SQL = "SELECT * FROM usuarios WHERE email = :email"; 
        $STMT = $this->DB->prepare($SQL); 
        $STMT->bindParam(':email', $email); 
        $STMT->execute(); 

        $usuario = $STMT->fetch(PDO::FETCH_ASSOC); 

        if ($usuario && password_verify($senha, $usuario['senha'])) { 
            return "Login bem-sucedido. Bem-vindo " . $usuario['nome']; 
        }
        return "Email ou senha incorretos"; 
    }
}