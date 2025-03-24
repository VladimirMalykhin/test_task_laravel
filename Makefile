
up: # Запускает контейнеры в фоновом режиме.
	@echo "$(INFO)Запуск контейнеров$(RESET)"
	docker compose up -d

destroy-all: # Полностью уничтожает контейнеры, удаляет все образы, тома и осиротевшие контейнеры.
	@echo "$(INFO)Полное уничтожение контейнеров$(RESET)"
	docker compose down --rmi all --volumes --remove-orphans

remake: # Перезапускает проект
	@make destroy-all
	@make up


migrate:
	docker compose exec app bash -c 'php artisan migrate'
	docker compose exec app bash -c 'php artisan db:seed'


install:
	docker compose exec app bash -c 'composer install'

bash: # Открывает консоль внутри контейнера `app`.
	docker compose exec app bash
