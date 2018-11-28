<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\UsuarioDAO;
use App\Models\Entidades\Usuario;

class UsuarioController extends Controller
{
    public function criar()
    {
        $this->render('/usuario/criar');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }
    
    public function editar($params)
    {   
        $id = $params[0];
        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->lista($id);
        
        $this->setViewParam('usuario',$usuario);

        $this->render('/usuario/editar');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }

    public function insert()
    {
        $Usuario = new Usuario();
        $Usuario->setNome($_POST['nome']);
        $Usuario->setEmail($_POST['email']);
        $Usuario->setPassword($_POST['password']);
        $Usuario->setUsername($_POST['username']);
        $Usuario->setCpf($_POST['cpf']);
        $Usuario->setTipo($_POST['tipo']);


        Sessao::gravaFormulario($_POST);

        $usuarioDAO = new UsuarioDAO();

        if($usuarioDAO->verificaEmail($_POST['email'])){
            Sessao::gravaMensagem("Email existente");
            $this->redirect('/usuario/criar');
        }

        if($usuarioDAO->create($Usuario)){
            $this->redirect('/usuario/sucesso');
        }else{
            Sessao::gravaMensagem("Erro ao gravar");
        }
    }
    
    public function update()
    {
        
        $Usuario = new Usuario();
        
        $Usuario->setId($_POST['id']);
        $Usuario->setNome($_POST['nome']);
        $Usuario->setEmail($_POST['email']);
        $Usuario->setPassword($_POST['password']);
        $Usuario->setUsername($_POST['username']);
        $Usuario->setCpf($_POST['cpf']);
        $Usuario->setTipo($_POST['tipo']);
        
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->atualizar($Usuario);
        
        Sessao::gravaMensagem("Atualizado com sucesso");
        $this->redirect('/usuario/editar/'.$_POST['id']);
        
        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function sucesso()
    {
        if(Sessao::retornaValorFormulario('nome')) {
            $this->render('/usuario/sucesso');

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
        }else{
            $this->redirect('/');
        }
    }

    public function index()
    {
        $this->redirect('/usuario/criar');
    }

}