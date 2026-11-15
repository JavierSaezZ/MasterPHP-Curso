# Operadores aritmeticos #
select email, (4+5) as 'Operacion' from usuarios;


# Puedes hacer operaciones con columnas #


# FUNCIONES MATEMATICAS #
select ceil(7.34) as 'Operacion' from usuarios;
select floor(7.34) as 'Operacion' from usuarios;
select pi() as 'Operacion' from usuarios;
select rand() as 'Operacion' from usuarios;
select round(100,1) as 'Operacion' from usuarios;


# FUNCIONES PARA TEXTO #
select upper(email) from usuarios;
select concat(email," - ",password) as "email - password"from usuarios;


#FECHA#
select email, fecha,  curdate() as 'Fecha actual' from usuarios;
select email, fecha, datediff(fecha,curdate()) as 'Fecha actual' from usuarios;


# FUNCIONES GENERALES #
select isnull(apellidos) from usuarios;
select strcmp('admin',password), password from usuarios;
select ifnull(apellidos ,'El campo esta vacio') from usuarios;
