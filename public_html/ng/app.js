var CRUDapp = angular.module('CRUDapp', ["datetime"]);

CRUDapp.controller('CRUDCtrl', function ($scope, $filter,  $http) {

    $http.get('api/clientes').success(function(data){

        angular.forEach(data, function(value, key) {
            data[key].dt_nasc_cliente = $filter('date')(data[key].dt_nasc_cliente, "dd/MM/yyyy"); //  filtrar data pelo controller para evitar conflito com a máscara

        });
        $scope.clientes = data;
    }).error(function(data){
        $scope.clientes = data;
    });

    $scope.refresh = function(){
        $http.get('api/clientes').success(function(data){
            angular.forEach(data, function(value, key) {
                data[key].dt_nasc_cliente = $filter('date')(data[key].dt_nasc_cliente, "dd/MM/yyyy");

            });
            $scope.clientes = data;
            $scope.adicionarForm.$setUntouched();
            $scope.currentRecord={};
        }).error(function(data){
            $scope.clientes = data;
        });
    }

    $scope.adicionarCliente = function(){
        console.log($scope);


        if ($scope.adicionarForm.$valid) {


            var newCliente = {
                nome_cliente: $scope.nome_cliente,
                dt_nasc_cliente: $scope.dt_nasc_cliente,
                rg_cliente: $scope.rg_cliente,
                cpf_cliente: $scope.cpf_cliente,
                telefone_cliente: $scope.telefone_cliente

            };


            $http.post('api/clientes', newCliente).success(function (data) {
                $scope.adicionar = false;

                    $scope.nome_cliente = '';
                    $scope.dt_nasc_cliente ='';
                   $scope.rg_cliente ='';
                   $scope.cpf_cliente ='';
                   $scope.telefone_cliente ='';
                $scope.refresh();


            }).error(function (data) {
                alert(data.error);
            });
        }else{
            $scope.validacao = true;
        }
    }

    $scope.deleteCliente = function(cliente){
        $http.delete('api/clientes/?id=' + cliente.id_cliente);
        $scope.clientes.splice($scope.clientes.indexOf(cliente),1);
    }

    $scope.updateCliente = function(cliente){

        var edit = false;
        $http.post('api/clientes_edit', cliente).error(function(data){
            alert(data.error);
        }).then(function(){
            setTimeout($scope.refresh(), 500); //delay para prevenir que ele busque os dados desatualizados
            ;
        })

        ;

    }

});