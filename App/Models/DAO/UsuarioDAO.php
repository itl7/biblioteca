<?php

namespace App\Models\DAO;

use App\Models\Entidades\Usuario;

class UsuarioDAO extends BaseDAO
{
    public function verificaEmail($email)
    {
        try {

            $query = $this->select(
                "SELECT * FROM usuario WHERE email = '$email' "
            );

            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public  function create(Usuario $usuario) {
        try {
            $nome      = $usuario->getNome();
            $email     = $usuario->getEmail();
            $tipo      = $usuario->getTipo();
            $username  = $usuario->getUsername();
            $password  = $usuario->getPassword();
            $cpf       = $usuario->getCpf();

            return $this->insert(
                'usuario',
                ":nome,:email,:tipo,:username,:password,:cpf",
                [
                    ':nome'=>$nome,
                    ':email'=>$email,
                    ':tipo'=>$tipo,
                    ':username'=>$username,
                    ':password'=>$password,
                    ':cpf'=>$cpf
                ]
            );

        }catch (\Exception $e){
            throw new \Exception($e, 500);
        }
    }

    public function lista($id = null) {
        if($id) {
            $resultado = $this->select(
                "SELECT * FROM usuario WHERE id = $id"
            );

            return $resultado->fetchObject(Usuario::class);
        }else{
            $resultado = $this->select(
                'SELECT * FROM usuario'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Usuario::class);
        }

        return false;
    }

    public  function atualizar(Usuario $usuario) 
    {
        try {

            $id        = $usuario->getId();
            $nome      = $usuario->getNome();
            $email     = $usuario->getEmail();
            $tipo      = $usuario->getTipo();
            $username  = $usuario->getUsername();
            $password  = $usuario->getPassword();
            $cpf       = $usuario->getCpf();
            
            return $this->update(
                'usuario',
                'nome = :nome, email = :email, tipo = :tipo, username = :username, password = :password, cpf = :cpf',
                [
                    ':id'=>$id,
                    ':nome'=>$nome,
                    ':email'=>$email,
                    ':tipo'=>$tipo,
                    ':username'=>$username,
                    ':password'=>$password,
                    ':cpf'=>$cpf
                ],
                "id = :id"
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }
    public function excluir(Usuario $usuario)
    {
        try {
            $id = $usuario->getId();

            return $this->delete('usuario',"id = $id");

        }catch (Exception $e){

            throw new \Exception("Erro ao excluir", 500);
        }
    }
}
