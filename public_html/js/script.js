/**
 * Created by icaro on 10/09/2016.
 */

$(document).ready(function(){


    //Datatable view lista
    if($('#clientes-tabela').length) {
        $('#clientes-tabela').DataTable({
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });

    }
    // Máscadas dos inputs

    $("#nascimento").mask("99/99/9999");


    var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00)00000-0000' : '(00)0000-00009';
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

    $('#telefone').mask(SPMaskBehavior, spOptions);

    $('#cpf').mask('000.000.000-00', {reverse: true});


    $('.apagar_cliente').click(function(e){

        e.preventDefault();
        var url = $(this).attr('href')
        var confirma = confirm("Tem certeza que deseja apagar esse registro?");
        if (confirma == true) {
            $.ajax({url:url })
                .done(function(){
                    var redirect = window.location.href.split('?')[0]; // limpa o get da mensagem de sucesso se estiver presente
                    window.location= redirect;
                });

        }
    })
});
