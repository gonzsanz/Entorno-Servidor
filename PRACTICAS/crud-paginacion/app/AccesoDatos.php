<?php
include_once "Cliente.php";
include_once "config.php";

/*
 * Acceso a datos con BD Clientes: 
 * Usando la librería mysqli
 * Uso el Patrón Singleton :Un único objeto para la clase
 * Constructor privado, y métodos estáticos 
 */
class AccesoDatos {

    private static $modelo = null;
    private $dbh = null;

    public static function getModelo() {
        if (self::$modelo == null) {
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }



    // Constructor privado  Patron singleton

    private function __construct() {


        $this->dbh = new mysqli(DB_SERVER, DB_USER, DB_PASSWD, DATABASE);

        if ($this->dbh->connect_error) {
            die(" Error en la conexión " . $this->dbh->connect_errno);
        }
    }

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo() {
        if (self::$modelo != null) {
            $obj = self::$modelo;
            // Cierro la base de datos
            $obj->dbh->close();
            self::$modelo = null; // Borro el objeto.
        }
    }


    // Devuelvo cuantos filas tiene la tabla

    public function numClientes(): int {
        $result = $this->dbh->query("SELECT id FROM Clientes");
        $num = $result->num_rows;
        return $num;
    }


    // SELECT Devuelvo la lista de Clients
    public function getClientes($primero, $cuantos): array {
        $tuser = [];
        // Crea la sentencia preparada
        // echo "<h1> $primero : $cuantos  </h1>";
        $stmt_usuarios  = $this->dbh->prepare("select * from clientes limit $primero,$cuantos");
        // Si falla termina el programa
        if ($stmt_usuarios == false) die(__FILE__ . ':' . __LINE__ . $this->dbh->error);
        // Ejecuto la sentencia
        $stmt_usuarios->execute();
        // Obtengo los resultados
        $result = $stmt_usuarios->get_result();
        // Si hay resultado correctos
        if ($result) {
            // Obtengo cada fila de la respuesta como un objeto de tipo Usuario
            while ($user = $result->fetch_object('Cliente')) {
                $tuser[] = $user;
            }
        }
        // Devuelvo el array de objetos
        return $tuser;
    }

    // SELECT Devuelvo un usuario
    public function getUsuario(String $login) {
        $user = false;

        $stmt_usuario   = $this->dbh->prepare("select * from clientes where id =?");
        if ($stmt_usuario == false) die($this->dbh->error);

        // Enlazo $id con el primer ? 
        $stmt_usuario->bind_param("i", $login);
        $stmt_usuario->execute();
        $result = $stmt_usuario->get_result();
        if ($result) {
            $user = $result->fetch_object('Cliente');
        }

        return $user;
    }

    //INSERT
    public function addUsuario($user): bool {

        // Crea la sentencia preparada
        $stmt_creauser  = $this->dbh->prepare("insert into clientes (id,first_name,last_name,email,gender,ip_address,telefono) Values(?,?,?,?,?,?,?)");
        if ($stmt_creauser == false) die($this->dbh->error);

        @$stmt_creauser->bind_param("issssss", $user->id, $user->first_name, $user->last_name, $user->email, $user->gender, $user->ip_address, $user->telefono);
        $stmt_creauser->execute();
        $resu = ($this->dbh->affected_rows  == 1);
        return $resu;
    }

    //DELETE
    public function borrarUsuario($id): bool {
        // Crea la sentencia preparada
        $stmt_borrauser  = $this->dbh->prepare("delete from clientes where id=?");
        if ($stmt_borrauser == false) die($this->dbh->error);
        $stmt_borrauser->bind_param("i", $id);
        $stmt_borrauser->execute();
        $resu = ($this->dbh->affected_rows  == 1);
        return $resu;
    }

    // UPDATE
    public function modUsuario($user): bool {

        $stmt_moduser = $this->dbh->prepare("UPDATE clientes set first_name=?, email=?, gender=?, ip_address=?, telefono=? where id=?");
        if ($stmt_moduser == false) die($this->dbh->error);

        @$stmt_moduser->bind_param("ssssss", $user->first_name, $user->email, $user->gender, $user->ip_address, $user->telefono, $user->id);
        $stmt_moduser->execute();
        $resu = ($this->dbh->affected_rows  == 1);
        return $resu;
    }


    // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone() {
        trigger_error('La clonación no permitida', E_USER_ERROR);
    }
}
