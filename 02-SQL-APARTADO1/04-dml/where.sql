# Consulta una condicion #
select * from usuarios where email = 'juanpepe@gmail.com';

/*
Operador de comparacion
Igual           =
Distinto        !*
Menor           <
Mayor           >
Menor o igual   <=
Mayor o igual   >=
Entre           between A and B
En              in
Es nulo         is null
No nulo         is not null
Como            like
No es como      not like
*/

/*
Operadores logicos:
o   or
y   and
no  not
*/

/*
comodines:
cualquier cantidad de caracteres: %
Un caracter desconocido:
*/


# EJEMPLOS #
Select nombre, apellidos, fecha from usuarios where year (fecha) != 2021 or isnull(fecha);

Select email from usuarios where apellidos like '%a%';
Select email from usuarios where apellidos like '%a%' and password ='pepe1234';

select * from usuarios limit 1,3;