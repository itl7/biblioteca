<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Atualização de Usuário</h3>
            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
            <?php } ?>
            <form action="http://<?php echo APP_HOST; ?>/usuario/update" method="post" id="form_cadastro">
                <input type="hidden" name="id" value="<?php echo $viewVar['usuario']->getId(); ?>">
                <?php include("_form.php"); ?>
                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>