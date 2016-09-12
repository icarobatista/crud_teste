<div class="container">

    <div class="page-header">
        <h1>Clientes<small> Frontend em PHP</small></h1>
        <a href="<?php echo site_url('clientes/adicionar'); ?>" class="btn btn-default btn-large"><i
                class="fa fa-user-plus" aria-hidden="true"></i>Adicionar Cliente</a>
    </div>


    <?php if (isset($_GET['a']) && $_GET['a'] == 'sucesso') { // Mensagem de sucesso a para Adicionado
        ?>
        <div class="alert alert-success  alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            Cliente adicionado com Sucesso.
        </div>

    <?php } ?>


    <?php if (isset($_GET['e']) && $_GET['e'] == 'sucesso') { // Mensagem de sucesso a para Editado
        ?>
        <div class="alert alert-success  alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            Cliente editado com Sucesso.
        </div>

    <?php } ?>

    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xd-12">
            <table class="table table-hover" id="clientes-tabela">

                <thead>
                <th>Nome</th>
                <th>Data de nascimento</th>
                <th>RG</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Ações</th>
                </thead>

                <tbody>
                <?php foreach ($clientes as $cliente) { ?>
                    <tr>
                        <td><?php echo $cliente->nome_cliente; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($cliente->dt_nasc_cliente)); ?></td>
                        <td><?php echo $cliente->rg_cliente; ?></td>
                        <td><?php echo $cliente->cpf_cliente; ?></td>
                        <td><?php echo $cliente->telefone_cliente; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="<?php echo site_url('clientes/editar/' . $cliente->id_cliente); ?>"
                                   class="btn btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="<?php echo site_url('clientes/apagar/' . $cliente->id_cliente); ?>"
                                   class="btn btn-danger apagar_cliente"><i class="fa fa-trash-o"
                                                                            aria-hidden="true"></i></a>
                            </div>
                        </td>


                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
