Dentro del archivo Data.sql se encuentra la base de datos, tablas y su respectiva data para el ejemplo

Cada uno de los usuarios tiene un rol especifico que además de redireccionar a su respectiva pagina restringe (en el caso del usuario) el acceso al recurso del administrador

Los recursos API REST se encuentran dentro del archivo api.php el cual posee los respectivos metodos para el acceso, insecion o eliminacion de registro, ejemplos para acceder a la api serian:

Creacion de recurso
http://localhost/autofact/api.php?usuario_id=1&resp_1=Nada&resp_2=si&resp_3=2

Eliminacion de recurso
http://localhost/autofact/api.php?id=3
