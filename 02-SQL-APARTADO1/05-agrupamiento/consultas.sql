# CONSULTAS DE AGRUPAMIENTO #
SELECT count(titulo) As 'numero de entradas' ,categoria_id from entradas group by categoria_id;

# CONSULTAS DE AGRUPAMIENTO CON CONDICIONES#
SELECT count(titulo) As 'numero de entradas' ,categoria_id from entradas group by categoria_id HAVING count(titulo)>=4;

/*
AVG     Sacar la media
COYNT   Contar el numnero de elementos
MAX     Valor maximo del grupo
MIN     Sacar el valor mini del grupo
SUM     Sumar todo el contenido del grupo
*/

SELECT AVG(id) as 'Media de entradas' FROM entradas;
/* Mal
SELECT MAX(id) as 'Maximo id', titulo FROM entradas;  
*/
SELECT id, titulo from entradas WHERE id in (SELECT MAX(id) FROM entradas);
SELECT id, titulo from entradas WHERE id = (SELECT MIN(categoria_id) FROM entradas);

SELECT sum(id) as 'Suma de los id' FROM entradas;

