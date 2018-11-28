<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Usuário</h3>

            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/usuario/salvar" method="post" id="form_cadastro">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control"  name="nome" placeholder="Seu nome" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="" value="<?php echo $Sessao::retornaValorFormulario('email'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Tipo</label>
                    <select name="tipo" id="tipo">
                        <option value="Bibliotecário">Bibliotecário</option>
                        <option value="Usuário">Usuário</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="username">Usuário</label>
                    <input type="text" class="form-control"  name="username" placeholder="Nome de Usuário" value="<?php echo $Sessao::retornaValorFormulario('username'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control"  name="password"  value="<?php echo $Sessao::retornaValorFormulario('password'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control"  name="cpf" placeholder="CPF" value="<?php echo $Sessao::retornaValorFormulario('cpf'); ?>" required>
                </div>

                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>