Ya se puede logear con cada usuario y que se redirija a las vistas correspondientes, los menus estan filtrados por cada rol. El directoradm (mailen), el directorpro, el secreatario (registro academico) pueden ver las solicitudes y hasta ahora solo el directoradm las puede aprobar. los otros dos no me acuerdo a que estatus pueden cambiar la solicitud. Tambien coloque las solicitudes de servicios para el docente, creo que asi era que la querian o no se

Los usuarios son estos

admin@admin.com<br>
admin<br>
estudiante@estudiante.com<br>
estudiante<br>
directoradm@directoradm.com<br>
directoradm<br>
directorpro@directorpro.com<br>
directorpro<br>
secretario@secretario.com<br>
secretario<br>
docente@docente.com<br>
docente<br>

Recuerden que deben sustituir en el archivo .env los parametros de postgress que serían estos:

DB_CONNECTION=pgsql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=5432<br>
DB_DATABASE=admgestion<br>
DB_USERNAME=postgres<br>
DB_PASSWORD=123456

Luego descargan la carpeta vendor en este link y la pegan dentro del proyecto, esa carpeta es donde esta el core de laravel, sin eso no les funcionaran los comandos

https://mega.nz/#!o0wgwCjJ!erexI5zBYs7rviGsCQ__PJw9Klwyu50qRVAFW0q9gPc

Ahora si pueden ejecutar los comandos

php artisan migrate:fresh<br>
php artisan voyager:install<br>
php artisan serve<br>

php artisan voyager:admin "admin@admin.com" --create YA NO ES NECESARIO

Y deberia correr con eso, por si acaso no les agarra el clone, descarguen el zip, o descargenlo directamente de mega

https://mega.nz/#!tlpE3IYZ!H_6v7t2Z_-Zi7cuwjKkfuxD9TbSQoUPik15rAqIhz68