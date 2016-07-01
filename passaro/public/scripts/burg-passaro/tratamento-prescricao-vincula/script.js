/**
 * Script para vinculo entre prescrição e indicação
 */
$(function(){
    
    var $sel1 = $('#sel1');
    var $sel2 = $('#sel2');
    var $sel3 = $('#sel3');
    var $btnAdd = $('#btnAdd');
    var $vinculacoesTable = $('#vinculacoesTable');
    var $vinculacoesTableTbody = $vinculacoesTable.find('tbody');
    var $htmlCarregando = $('<tr/>').append($('<td/>').text('Carregando...'));
    
    $sel1.prop('disabled', true).addClass('disabled');
    $sel2.prop('disabled', true).addClass('disabled');
    $sel3.prop('disabled', true).addClass('disabled');
    $btnAdd.prop('disabled', true).addClass('disabled');
    
    /**
     * Carrega os dados cadastrados
     */
    $vinculacoesTableTbody.html($htmlCarregando);
    
    $.getJSON('/tratamento_prescricao_vinculacoes')
    .done(function(data){
        var html = [];
        for (var i in data) {
            var item = data[i];
            var tr = $('<tr/>');
            tr.append($('<td/>').text(item.tratamentoPrescricaoId));
            tr.append($('<td/>').text(item.tratamentoIndicacaoId));
            tr.append($('<td/>').text(item.tratamentoDuracaoId));
            tr.append($('<td/>').text('#'));
            html.push(tr);
        }
        setTimeout(function(){
            $vinculacoesTableTbody.html(html);
        }, 1000);
    }).fail(function(error){
       console.log(error); 
       alert('Erro ao caggerar a tabela!');
    });
    
    
    
    
});


