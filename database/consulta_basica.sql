
select * from tratamento_indicacao;
select * from tratamento_periodo;
select * from tratamento;

select * from especie;
select * from passaro;
select * from passaro_tratamento;

select p.nome, 
	   e.nome,
       p.sexo,
       pt.tratamento_id,
       tp.data_inicio,
       tp.data_fim,
       ti.nome,
       tp.obs,
       tp.bloq_periodo
from passaro as p
inner join especie as e 
on p.especie_id = e.id
inner join passaro_tratamento as pt
on p.id = pt.passaro_id
inner join tratamento_periodo as tp
on pt.tratamento_id = tp.tratamento_id
inner join tratamento_indicacao as ti
on tp.tratamento_indicacao_id = ti.id
order by p.id, tp.data_inicio;

