predir:
	sudo chown ${USER}:${USER} ./bootstrap/cache -R
	sudo chown ${USER}:${USER} ./storage -R
	sudo chmod 777 ./storage -R
	if [ -d "./node_modules" ]; then sudo chown ${USER}:${USER} ./node_modules -R; fi
	if [ -d "./public/build" ]; then sudo chown ${USER}:${USER} ./public/build -R; fi
docker-up:
	docker-compose up -d
docker-down:
	docker-compose down
docker-build:
	docker-compose up --build -d
test:
	docker-compose exec php vendor/bin/phpunit --colors=always
