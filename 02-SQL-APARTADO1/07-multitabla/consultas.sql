/* CONSULTAS MULTITABLA: 
Consultas varias tablas
*/

/*Mostra las entradas con el nombre del autor y el nombre de la categoria */
select entradas.titulo, categorias.nombre, usuarios.nombre from entradas, usuarios, categorias;
select e.id, e.titulo, c.nombre, u.nombre from entradas e, usuarios u , categorias c where e.usuario_id= u.id and e.categoria_id=c.id;

/* inner join */
select e.id, e.titulo, u.nombre from entradas e inner join usuarios u on e.usuario_id= u.id;
select e.id, e.titulo, c.nombre as "Categoria", u.nombre as "Nombre usuario" from entradas e inner join usuarios u on e.usuario_id= u.id inner join categorias c on e.categoria_id=c.id;




/* Mostrar el nombre de las categorias y al lado cuantas entradas tienen */
select c.nombre, count(e.id) As "Total id" from categorias c, entradas e where e.categoria_id = c.id group by e.categoria_id;
select c.nombre, count(e.id) As "Total id" from categorias c  inner join entradas e on  e.categoria_id = c.id group by e.categoria_id;

/*Muetra todas las filas aunque esten vacias si a la izquierda hay valores*/
select c.nombre, count(e.id) As "Total id" from categorias c  left join entradas e on  e.categoria_id = c.id group by e.categoria_id;

/*Muetra todas las filas aunque esten vacias si a la derecha hay valores*/
select c.nombre, count(e.id) As "Total id" from entradas e  right join  categorias c on  e.categoria_id = c.id group by e.categoria_id;


/* Mostrar el email de los usuarios y al lado cuantas entradas tienen */
select u.email, count(e.id) as "total entradas" from usuarios u, entradas e where e.usuario_id = u.id group by e.usuario_id;