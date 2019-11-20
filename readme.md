# Installation
- Clone project from repository ``git clone git@gitlab.com:sehatq/test-adi.git``
- Go to cloned folder ``cd test-adi``
- Copy environment ``cp .env.example .env``
- Setting environtment
```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

GOOGLE_CLIENT_ID=
GOOGLE_SECRET_KEY=

FACEBOOK_CLIENT_ID=
FACEBOOK_SECRET_KEY=
```
- Install all composer packages ``composer install``
- Install all npm packages ``npm install``
- Build js and css ``npm run dev``
- Migrate tables ``php artisan migrate``
- Running app ``php artisan serve``
- Open on browser ``http://localhost:8000``

**Optional**
- Seed user ``php artisan db:seed``
- User
```
Username: aditest
Password: password
```

**Refs**
- Laravel documentation ``https://laravel.com/docs/6.x``
- Laravel UI ``https://laravel.com/docs/6.x/frontend``