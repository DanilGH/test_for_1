predir:
	sudo chown ${USER}:${USER} ./bootstrap/cache -R
	sudo chown ${USER}:${USER} ./storage -R
	sudo chmod 777 ./storage -R
	if [ -d "./public/build" ]; then sudo chown ${USER}:${USER} ./public/build -R; fi
	cp .env.local .env
	docker-compose exec php composer install
#	docker-compose exec php php artisan ui vue --auth
	docker-compose exec php php artisan migrate
	docker-compose exec nodejs npm install
	if [ -d "./node_modules" ]; then sudo chown ${USER}:${USER} ./node_modules -R; fi
	docker-compose exec nodejs npm run dev
	make queue
docker-up:
	docker-compose up -d
docker-down:
	docker-compose down
docker-build:
	docker-compose up --build -d
test:
	docker-compose exec php vendor/bin/phpunit --colors=always
queue:
	docker-compose exec php php artisan queue:work
cache:
	docker-compose exec php php artisan config:clear
	docker-compose exec php php artisan view:clear
	docker-compose exec php php artisan route:clear
	docker-compose exec php php artisan cache:clear
