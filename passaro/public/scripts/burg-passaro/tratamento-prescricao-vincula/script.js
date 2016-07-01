/**
 * Script para vinculo entre prescrição e indicação
 */

function errorGeral(error) {
    console.log(error); 
    alert('Erro >>> ' + error.text);
};

function loadSelects(dataPrescricao, dataIndicacao) {
    
    var $sel1 = $('#sel1');
    var $sel2 = $('#sel2');
    var $sel3 = $('#sel3');
    var $btnAdd = $('#btnAdd');
    
    /**
     * Atribui os dados para o elemento sel1
     */
    var sel1 = [];
    sel1.push($('<option/>').val('').text('---'));
    for (var i in dataPrescricao[0]) {
        var item = dataPrescricao[0][i];
        var $opt = $('<option/>').val(item.id).text(item.id+' - '+item.nome);
        sel1.push($opt);
    }
    $sel1.html(sel1);
    $sel1.prop('disabled', false).removeClass('disabled');
    
    /**
     * Atribui os dados para o sel2
     */
    var sel2 = [];
    sel2.push($('<option/>').val('').text('---'));
    for (var i in dataIndicacao[0]) {
        var item = dataIndicacao[0][i];
        var $opt = $('<option/>').val(item.id).text(item.id+' - '+item.nome);
        sel2.push($opt);
    }
    $sel2.html(sel2);
    $sel2.prop('disabled', false).removeClass('disabled');
};

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
    }).fail(errorGeral);
    
    /**
     * Carrega os dados da Prescrição
     */
    var $promisePrescricao = $.getJSON('/tratamento_prescricoes').promise();
    var $promiseIndicacao = $.getJSON('/tratamento_indicacoes').promise();
    
    
    $.when($promisePrescricao, $promiseIndicacao).done(loadSelects);
            
    
});


