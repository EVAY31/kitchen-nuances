## При разворачивании проекта на локальном сервере необходимо выполнить следующие команды

## Прописываем в консоли  Open Server:

- [composer install]() ---- установка композера

_____
## Копируем .env.example вствляем и переименовываем в env меняем строки:
## (с 11- по 16)

- [DB_CONNECTION=mysql]()

- [DB_HOST=localhost]()

- [DB_PORT=3306]()

- [DB_DATABASE=kitchen_db]()

- [DB_USERNAME=root]()

- [DB_PASSWORD=]()

_____
## Применяем миграции для создания таблиц, создание ключа и ссылки на хранилище  для отображения на сайте:

<!-- php artisan migrate  -->
- [php artisan migrate --seed]() Миграция + создание в базе seeder

- [php artisan key:generate ]()
_____
## Установка админ панели администратора:

- [composer require moonshine/moonshine]() --- установка композера моншайна

- [php artisan moonshine:install]() --- Установка моншайна

Install migrations? (yes/no) [yes]  --- Установка миграции моншайна

- [yes]()

WARN  The database 'kitchen_db' does not exist on the 'mysql' connection.

Would you like to create it? (yes/no) [no]

- [yes]()

php artisan moonshine:user --- РЕГИСТРАЦИЯ АДМИНА

Username(email):

- [superadmin@superadmin.ru]() --- Почта Админа

Name: [superadmin@superadmin.ru]

- [Superadmin]() --- Имя Админа

Password:

- [z12345678]() --- Пароль Админа
_____

## Breeze

## При первичной установке:
- [composer require laravel/breeze --dev]()
- [php artisan breeze:install]()

<!-- php artisan migrate -->

## Прописываем в терминале php storm:

- [npm install]()
- [npm run dev  (Q- Нажать для выхода!)]()
- [npm run build]()
_____


## Необязательно, только если сломается:
## Если проблемы С последними обновлениями программы

- [https://nodejs.org/en/download]()
- [npm -v]()

## Если папка с модулями сломана
- [npm cache clean --force]()
- [rm -rf node_modules]()
- [npm install]()

_____

## Опять возвращаемся в консоль Open Server и прописываем последнюю команду:

## php artisan storage:link --- для перемещения файлов из хранилища в папку public, что позволяет отобразить картинки


## В случае ошибки:
- [rm public/storage]()  и [rm -rf public/storage]()  --позволяют сбросить "storage".

## [в противном случае в папке public просто удалите папке "storage"]()

---затем снова запустите --- [php artisan storage:link]()


## Если спросят:
- [php artisan moonshine:resource Product ]() ——СОЗДАНИЕ РЕСУРСОВ В MOONSHINE
_____
для применения продуктов:

- [php artisan db:seed]()
- [php artisan migrate --seed]()
_____
