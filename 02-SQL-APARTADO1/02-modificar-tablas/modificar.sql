# RENOMBRAR UNA TABLA #
ALTER TABLE usuarios RENAME to usuarios_renom;

# Caambiar el nonmde de una columna #
alter TABLE usuarios_renom CHANGE apellido apellidos varchar(100) null;

# Modificar columna sin cambiar nombre #
ALTER TABLE usuarios_renom MODIFY apellidos char(40) not null;

# AÑADIR COLUMNA #
ALTER TABLE usuarios_renom ADD website varchar(100) null;

# AÑADIR RESTRICCION A COLUMNA #
ALTER TABLE usuarios_renom ADD CONSTRAINT uq_email UNIQUE(email);

#  BORRAR UNA COLUMNA #
ALTER TABLE usuarios_renom DROP  website;