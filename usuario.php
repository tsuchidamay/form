require_once 'database.php'
class usuario{
protect$DB;
protect$Nome; 
protect$email;
protect$senha;

public function_construct($nome,$email,$senha){
$this -> DB=(new database()) ->Get Connection();

$this -> nome = $nome;
$this -> email = $email;
$this -> senha = password_has(senha, password_default);
}

Public function salvar () {
$SQL = “insert into usuarios (nome,email,senha, tipo)
 Valves (nome;email;senha;usuário;)”;

$STMT = $this -> DB -> prepare ($SQL);
$STMT -> Bindparon(‘:nome $this -> nome);
$STMT -> Bindparon(‘:email $this ->email);
$STMT -> Bindparon(‘:senha$this ->senha);

Return $STMT -> execute);
}

Public function login($email, $senha){
$SQL = “select * from usuarios where email =:email”;
$STMT -> Bindparom (‘email’,$email);
$STMT -> execute ();
$Usuario = $ -> fetch (pdo:: fetch_assoc);

if ($usuário && password_verify($senha, $usuario[‘senha])){
return “Login bem-sucedido. Bem-vindo”;
$Usuario [‘nome’];
return “email ou senha incorretos”;
}
}
