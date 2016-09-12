
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col xs-12">
            <div class="page-header">
                <h1>Editar Cliente</h1>
            </div>

            <?php if(isset($erros)){ ?>
                <div class="alert alert-danger alert-dismissible" role="alert">

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $erros; ?>


                </div>

            <?php } ?>
            <form id="form_cliente" method="POST" action ="<?php echo site_url('clientes/editar/'.$cliente[0]->id_cliente); ?>">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="nome" value=" <?php echo (set_value('nome') != NULL)? set_value('nome'): $cliente[0]->nome_cliente; ?> ">
                </div>

                <div class="form-group">
                    <label for="nascimento">Data de Nascimento:</label>
                    <input type="text" class="form-control" id="nascimento" name="nascimento" placeholder="Data de Nascimento" value= "<?php echo (set_value('nascimento') != NULL)? set_value('nascimento'): date('d/m/Y', strtotime($cliente[0]->dt_nasc_cliente)); ?>">
                </div>

                <div class="form-group">
                    <label for="rg">RG:</label>
                    <input type="text" class="form-control" id="rg" name="rg" placeholder="RG" value="<?php echo (set_value('rg') != NULL)? set_value('rg'): $cliente[0]->rg_cliente; ?>">
                </div>

                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" value="<?php echo (set_value('cpf') != NULL)? set_value('cpf'): $cliente[0]->cpf_cliente; ?>">
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" value="<?php echo (set_value('telefone') != NULL)? set_value('telefone'): $cliente[0]->telefone_cliente; ?>">
                </div>

                <button type="submit" class="btn btn-default">Enviar</button>
                <a href="<?php echo site_url('clientes'); ?>" class="btn btn-default">Voltar para lista</a>
            </form>

        </div>
    </div>


</div>
