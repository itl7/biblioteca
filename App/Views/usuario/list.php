<div class="container">
    <div class="row">
    <br>
    <div class="col-md-12">
        <a href="http://<?php echo APP_HOST; ?>/usuario/criar" class="btn btn-success btn-sm">Adicionar</a>
        <hr>
    </div>
    <div class="col-md-12">
        <?php if($Sessao::retornaMensagem()){ ?>
            <div class="alert alert-warning" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $Sessao::retornaMensagem(); ?>
            </div>
        <?php } ?>

        <?php
            if(!count($viewVar['usuarios'])){
        ?>
            <div class="alert alert-info" role="alert">Nenhum usuario encontrado</div>
        <?php
            } else {
        ?>
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td class="info">Nome</td>
                        <td class="info">Tipo</td>
                        <td class="info">Email</td>
                        <td class="info"></td>
                    </tr>
                    <?php
                        foreach($viewVar['usuarios'] as $usuario) {
                    ?>
                        <tr>
                            <td><?php echo $usuario->getNome(); ?></td>
                            <td><?php echo $usuario->getTipo(); ?></td>
                            <td><?php echo $usuario->getEmail(); ?></td>
                            <td>
                                <a href="http://<?php echo APP_HOST; ?>/usuario/editar/<?php echo $usuario->getId(); ?>" class="btn btn-info btn-sm">Editar</a>
                                <a href="http://<?php echo APP_HOST; ?>/usuario/exclusao/<?php echo $usuario->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        <?php
            }
        ?>
    </div>
</div>
</div>