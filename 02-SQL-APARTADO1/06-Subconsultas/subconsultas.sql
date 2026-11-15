/*
- Consultas que se ejecutan dentro de otras
- Utilizar los resultados de la subconsulta para operar en la consulta principal
- Jugando con las claves ajenas / foraneas 
*/

#Sacara usuarios con entradas#
 select * from usuarios where id in (select usuario_id from entradas); 
 select * from usuarios where id not in (select usuario_id from entradas); 

#Sacara los usuarios que tengan alguna entrada que en su titulo hable de gta #
select nombre, apellidos from usuarios where id in (select usuario_id from entradas where titulo like"%GTA%");

#Sacar todas la entradas de la categoria accion sabiendo su nombre#
select * from entradas where categoria_id in (select id from categorias where nombre="accion");

#Mostar las categorias con mas de 3 entradas#
select id,nombre from categorias where id in (select categoria_id from entradas group by categoria_id having count(categoria_id) >=3) ;

#Mostar Los usuarios que crearon una entrada un dia#
select * from usuarios where id in (select usuarios_id from entradas where DAYOFWEEK(fecha)=2);

#Mostar el nombre de el usuario que tenga mas  entradas#
select  concat (nombre, ' ', apellidos) as 'El usuario con mas entradas'  from usuarios where id = (select usuario_id from entradas group by usuario_id order by count(id) desc limit 1);

#Mostar las categorias sin ertradas entradas#
select * from categorias where id not in ( select categoria_id from entradas);

