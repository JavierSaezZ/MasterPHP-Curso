#INSERTS PARA CATEGORIAS #
INSERT INTO categorias values(null, 'Accion');
INSERT INTO categorias values(null, 'Rol');
INSERT INTO categorias values(null, 'Deportes');

#INSERTS PARA EMTRADAS#
INSERT INTO entradas values(null, 1, 1, 'Novedades de GTA 5 online', 'Un juego de accion muy bonito', curdate());
INSERT INTO entradas values(null, 1, 2, 'Review de LOL online', 'Todo sobre el LOL', curdate());
INSERT INTO entradas values(null, 1, 3, 'Nuevos jugadores de FIFA 23', 'Review del Fifa 23', curdate());

INSERT INTO entradas values(null, 2, 1, 'Novedades de Assasins Creed online', 'Review del Assasins Creed', curdate());
INSERT INTO entradas values(null, 2, 2, 'Review de WOW online', 'Todo sobre el WOW', curdate());
INSERT INTO entradas values(null, 2, 3, 'Nuevos jugadores de PES 23', 'Review del PES 2023', curdate());

INSERT INTO entradas values(null, 3, 1, 'Novedades de Call of duty online', 'Review del Call of duty', curdate());
INSERT INTO entradas values(null, 3, 1, 'Review de Fornite online', 'Todo sobre el Fornite', curdate());
INSERT INTO entradas values(null, 3, 3, 'Nuevos jugadores de Formula 1 2k20', 'Review del Formula 1 2k20', curdate());

/*
Donde seguir el autoincremento:
ALTER TABLE entradas AUTO_INCREMENT = 9;
*/

