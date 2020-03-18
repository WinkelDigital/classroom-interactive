### requirements
+ php version 7+
+ mysql
+ composer
+ git
### Instalation
clone code from https://gitlab.com/hprasetyou/classroom-interactive.git

    git clone https://gitlab.com/hprasetyou/classroom-interactive.git
create new database on mysql
copy file .env.example to .env
modify .env file with your local setting(database name, username, password, etc)
run migration

    php artisan migrate
    
run seeder

    php artisan db:seeder

install required php package dependency

    composer install
 
run server by command

    php artisan serve
application now running on localhost port 8000
