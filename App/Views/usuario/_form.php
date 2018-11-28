
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control"  name="nome" placeholder="Seu nome" value="<?php if ($viewVar["usuario"]) {  echo $viewVar["usuario"]->getNome();  } ?>" required>
    </div>
    
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" name="email" placeholder="" value="<?php if ($viewVar["usuario"]) {  echo $viewVar["usuario"]->getEmail();  } ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Tipo</label>
        <select name="tipo" id="tipo">
            <?php 
                $tipo = array('Bibliotecário','Usuário','Outros');
                foreach($tipo as $t){
                    if ($viewVar["usuario"]) { 
                        if ($t == $viewVar["usuario"]->getTipo()) {
                            $selected = "selected";
                        } 
                    } else {
                        $selected = "";
                    }
                    echo "<option value='".$t."' ".$selected.">".$t."</option>";
                }
            ?>
            
        </select>
    </div>
    <div class="form-group">
        <label for="username">Usuário</label>
        <input type="text" class="form-control"  name="username" placeholder="Nome de Usuário" value="<?php if ($viewVar["usuario"]){  echo $viewVar["usuario"]->getUsername();} ?>" required>
    </div>
    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" class="form-control"  name="password"  value="<?php if ($viewVar["usuario"]){echo $viewVar["usuario"]->getPassword();} ?>" required>
    </div>
    <div class="form-group">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control"  name="cpf" placeholder="CPF" value="<?php if($viewVar["usuario"]){ echo $viewVar["usuario"]->getCpf();} ?>" required>
    </div>
