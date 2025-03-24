

## Инструкция по запуску приложения

1. Клонируйте репозиторий
```bash
git clone https://github.com/VladimirMalykhin/test_task_laravel
cd test_task_laravel
```
2. Разверните окружение
```bash
make up
```

3. Установите зависимости
```bash
make install
```

3. Выполните миграции и сиды
```bash
make migrate
```

4. Перейдите в консоль контейнера app для выполнения команды
```bash
make bash
```

5. Выполните команду с выбранными параметрами
```bash
php artisan intervals:list --left=1 --right=100
```
