# Cocktailnator v2.0

Do you ever wish you were a _cocktail master_? Worry not, **Cocktailnator** has your back!

![Cocktailnator](https://user-images.githubusercontent.com/45714191/121658707-e24a5600-caa1-11eb-8c47-d1c1b40a86ec.png)

This is a do-over of a school project we had some months ago. I wanted to start from scratch taking into consideration the feedback received from both our teacher and classmates who got to test the app.

## Features

-   Revamped UI
-   Sign up/Login with email, Twitter or Github (more options coming soon)
-   Save your favorite recipes (work in progress)

### Coming soon!

-   Search by ingredients or beverages
-   Easily change username, email and password
-   Review recipes you've tested yourself
-   If you regret it all, you can also delete your account, no hard feelings

## Try this code:

-   Get your best shaker ready
-   Make sure you have previously installed PHP, Composer and NPM
-   Clone this repo on your computer
-   Install dependendcies

```
composer install
npm install
```

-   Copy the `.env` file

```
cp .env.example .env
```

-   Generate an App Key

```
php artisan key:generate
```

-   Add your prefered database to the `.env` file
-   If you have an API Key from [The Cocktail DB](https://www.thecocktaildb.com/api.php) you can add it there too
-   Run the migrations
-   You would also need API Keys from Twitter and Github if you want to test those features. Take a look at [Socialite](https://laravel.com/docs/8.x/socialite)

```
php artisan migrate
```

-   Get a server running

```
php artisan serve
```
