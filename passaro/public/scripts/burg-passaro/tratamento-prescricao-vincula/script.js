/**
 * Script para vinculo entre prescrição e indicação
 */
$(function(){
    
    console.log('script add >> ' + new Date());
    
    var $sel1 = $('#sel1');
    
    var $sel2 = $('#sel2');
    
    var $sel3 = $('#sel3');
    
    var $btnAdd = $('#btnAdd');
    
    $sel1.prop('disabled', true).addClass('disabled');
    
    $sel2.prop('disabled', true).addClass('disabled');
    
    $sel3.prop('disabled', true).addClass('disabled');
    
    $btnAdd.prop('disabled', true).addClass('disabled');
    
    
    $.get('/tratamento_prescricao_vinculacoes')
    .done(function(data){
        console.log(data);
    }).fail(function(error){
       console.log(error); 
    });
    
    
    
    
});


