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
encargadoserv@encargadoserv.com<br>
encargadoserv<br>

Recuerden que deben sustituir en el archivo .env los parametros de postgress que serían estos:

DB_CONNECTION=pgsql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=5432<br>
DB_DATABASE=admgestion<br>
DB_USERNAME=postgres<br>
DB_PASSWORD=123456

Luego descargan la carpeta vendor en este link y la pegan dentro del proyecto, esa carpeta es donde esta el core de laravel, sin eso no les funcionaran los comandos

https://mega.nz/#!F1w3CKDa!fK1ukIMJM1aYee_ag7j8xKhqXYwFZD_7pSlt5y9npkg

Ahora si pueden ejecutar los comandos

php artisan migrate:fresh<br>
php artisan voyager:install<br>
php artisan serve<br>

Y deberia correr con eso, por si acaso no les agarra el clone, descarguen el zip.