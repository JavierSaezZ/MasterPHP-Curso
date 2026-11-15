/*
Vistas: Las podemos definir como una consta almacenada en la base de datos que se utiliza como una tabla vierual.
No almacena datos sino que utiliza asociaciones y los datos originales de las tablas de forma que siempre se mantien actualizada
*/

create view entradas_con_nombres as
select e.id, e.titulo, c.nombre as "Categoria", u.nombre as "Nombre usuario" 
from entradas e 
inner join usuarios u on e.usuario_id= u.id 
inner join categorias c on e.categoria_id=c.id;
