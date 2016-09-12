<html ng-app="CRUDapp" ng-app >
<head>
    <meta charset="utf-8">
    <link href="<?php echo site_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('css/font-awesome.min.css'); ?>" rel="stylesheet">
    <title>Frontend CRUD em Angular</title>
</head>
<body data-ng-controller="CRUDCtrl">



<div>
    <div class="container">

        <div class="page-header">
            <h1>Clientes <small>Frontend em Angular</small></h1>
            <a href="#" class="btn btn-default btn-large" ng-click="adicionar = true" ng-hide="adicionar"> <i
                    class="fa fa-user-plus" aria-hidden="true"></i>Adicionar Cliente</a>
        </div>
        <br/>

        <div class="row" ng-show="adicionar">
            <div class="col-lg-12 col-md-12 col sm-12 col xs-12">
                <form id="form_cliente" role="form" ng-submit="adicionarCliente()" name="adicionarForm">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="nome" ng-model="nome_cliente" required>

                    </div>

                    <div class="form-group">
                        <label for="nascimento">Data de Nascimento:</label>
                        <input type="text" class="form-control" id="nascimento" name="nascimento" placeholder="Data de Nascimento" ng_model="dt_nasc_cliente" required>
                    </div>

                    <div class="form-group">
                        <label for="rg">RG:</label>
                        <input type="text" class="form-control" id="rg" name="rg" placeholder="RG" ng-model="rg_cliente" required>
                    </div>

                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" ng-model="cpf_cliente" required>
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone"  ng-model="telefone_cliente" required>
                    </div>

                    <button type="submit"  ng-disabled="adicionarForm.$invalid" class="btn btn-primary">Enviar</button>
                    <a href="" class="btn btn-default" ng-click="adicionar = false">Voltar para lista</a>
                </form>


            </div>

        </div>


        <div class="row" ng-hide="adicionar">
            <div class="col-lg12 col-md-12 col sm-12 col xd-12">
                <table  class="table table-hover">
                    <th>Nome</th>
                    <th>Data de nascimento</th>
                    <th>RG</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Ações</th>

                    <tr data-ng-repeat="cliente in clientes track by $index">


                        <td>
                            <span ng-hide="edit" >{{ cliente.nome_cliente }}</span>
                            <input type="text" ng-show="edit" ng-model="cliente.nome_cliente" required >
                        </td>
                        <td>
                            <span ng-hide="edit" >{{ cliente.dt_nasc_cliente }}</span>
                            <input type="text" ng-show="edit" style="width:153px" id="nascimento" ng-model="cliente.dt_nasc_cliente" required>
                        </td>
                        <td>
                            <span ng-hide="edit" >{{ cliente.rg_cliente }}</span>
                            <input type="text" ng-show="edit"  style="width:153px" ng-model="cliente.rg_cliente" required>
                        </td>
                        <td>
                            <span ng-hide="edit" >{{ cliente.cpf_cliente }}</span>
                            <input type="text" ng-show="edit" id="cpf"  ng-model="cliente.cpf_cliente" required >

                        </td>
                        <td>
                            <span ng-hide="edit" >{{ cliente.telefone_cliente }}</span>
                            <input type="text" ng-show="edit" id="telefone" ng-model="cliente.telefone_cliente" required >
                        </td>
                    <td>
                        <a href="#"
                            class="btn btn-default" ng-click="edit = true" ng-hide="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="#"
                        class="btn btn-success" ng-click="updateCliente(cliente); edit = false" ng-show="edit"><i class="fa fa-check" aria-hidden="true"></i></a>
                        <a href=""
                           class="btn btn-danger" ng-hide="edit" ng-Click="deleteCliente(cliente)"><i class="fa fa-trash-o"
                                                                    aria-hidden="true"></i></a>

                    <td>

                </table>
            </div>
        </div>
        <br/>
       <a href="<?php echo site_url('clientes'); ?>">Versão Em PHP</a>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="<?php echo site_url('js/bootstrap.min.js'); ?>"></script>

<script src="<?php echo site_url('js/jquery.maskedinput.min.js'); ?>"></script>
<script src="<?php echo site_url('js/script.js'); ?>"></script>


<script src="<?php echo site_url('ng/angular.min.js'); ?>"></script>
<script src="<?php echo site_url('ng/datetime.js'); ?>"></script>
<script src="<?php echo site_url('ng/app.js'); ?>"></script>
</body>
</html>