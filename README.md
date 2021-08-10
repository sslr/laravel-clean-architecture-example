<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



## Clean Architect Laravel

###run
- we assume docker desktop is up and running
- open up a terminal
- cd project directory
- run "cp .env.example .env"  
- run "docker-compose up -d"
- open http://0.0.0.0:23005/
- login with user: "root" and password: "very_secret" and build a database named: "lvclean"
- find laravel-8x_php container ID and run "docker exec -it CONTAINER_ID bash"
- inside the bash run "composer install"
- after install is done, again inside the bash run "php artisan migrate"
- gain inside the bash run "php artisan db:seed"
- now find the "claen-lv.postman_collection.json" inside the root directory and import it to post man
