## Website Subscription

This application provides API for user to subscribe to a website and get notified when post is made


## Setup
```
git clone https://github.com/myrealjay/Website-Subscription.git

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan db:seed

php artisan serve

php artiosan queue:listen

```

### You can then make requests to subscribe users of create post

```
POST
/api/posts

{
    "title" : "something 4",
    "description" : "another",
    "website_id" : 1
}

POST
/api/subscriptions

{
    "website_id" : 1,
    "user_id" : 1
}
```

```
Run php artisan test, to run the tests  but first cp .env .env.testing and change
DB_CONNECTION=sqlite
DB_DATABASE=:memory:
```

Ensure you have sqlite3 installed.

Goodluck!



