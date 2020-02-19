<?php

include_once 'class_bd.php';

class user extends Database {

    private $nombre;
    private $username;

    public function userExists($user, $pass) {
        $pass_bd = $this->connect_user_session()->prepare("SELECT pass FROM tb_usuario WHERE correo = '$user'");
        $pass_bd->execute();
        $password_bd = "";
        if ($pass_bd->rowCount()) {
            $resultado = mysqli_query($this->conectar(), "SELECT * FROM tb_usuario WHERE correo = '$user'");
            while ($consulta_resul = mysqli_fetch_array($resultado)){
                $password_bd = $consulta_resul['pass'];
            }
            $hashpass = password_verify($pass, $password_bd);
            if ($hashpass) {
                $query = $this->connect_user_session()->prepare('SELECT id_usuario FROM tb_usuario WHERE correo = :user');

                $query->execute(['user' => $user]);

                if ($query->rowCount()) {
                    return true;
                } else {
                    return false;
                }
            }else{
                return false;
            }
        } else {
            return false;
        }
    }

    public function setUser($user) {
        $query = $this->connect_user_session()->prepare('SELECT * FROM tb_usuario WHERE correo = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nom_usuario'];
            $this->username = $currentUser['correo'];
        }
    }

    public function getNombre() {
        return $this->nombre;
    }

}

?>