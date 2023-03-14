Para correr el proyecto se deben correr los siguientes comandos

  composer install --ignore-platform-reqs
  php artisan key:generate
  php artisan migrate:fresh --seed
  php artisan storage:link
  php artisan serve