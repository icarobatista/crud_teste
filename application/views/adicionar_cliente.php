<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col xs-12">
            <div class="page-header">
                <h1>Adicionar Cliente</h1>
            </div>

            <?php if(isset($erros)){ ?>
                <div class="alert alert-danger alert-dismissible" role="alert">

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $erros; ?>


                </div>

            <?php } ?>
<form id="form_cliente" method="POST" action ="<?php echo site_url('clientes/adicionar'); ?>">
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="nome" value="<?php echo set_value('nome'); ?> ">
    </div>

    <div class="form-group">
        <label for="nascimento">Data de Nascimento:</label>
        <input type="text" class="form-control" id="nascimento" name="nascimento" placeholder="Data de Nascimento" value="<?php echo set_value('nascimento'); ?>">
    </div>

    <div class="form-group">
        <label for="rg">RG:</label>
        <input type="text" class="form-control" id="rg" name="rg" placeholder="RG" value="<?php echo set_value('rg'); ?>">
    </div>

    <div class="form-group">
        <label for="cpf">CPF:</label>
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" value="<?php echo set_value('cpf'); ?>">
    </div>

    <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" value="<?php echo set_value('telefone'); ?>">
    </div>

    <button type="submit" class="btn btn-default">Enviar</button>
    <a href="<?php echo site_url('clientes'); ?>" class="btn btn-default">Voltar para lista</a>
</form>

        </div>
    </div>


</div>
