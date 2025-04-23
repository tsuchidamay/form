
class Database{
Private $host = "Localhost".
Private $DBName = "example_poo":
Private $username = "root".
Private $Password=””;
Private $conn;

Public function_cosntruct (){

Try {this -> conn = new pdo ("mySQL: host ={ This -> host}, DBName= {$this DBName}", $this->username, this ->password);

This -> conn -> set atribute (PDO:: oter-errmode - exception);

}

Catch (pdo exception $e {

Die (erro de conexão:."$E -> GetMessage());

}
Public function Get Connection ()
}

Return $this -> conn;
 }
}
