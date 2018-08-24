# BetterBlog (Dev)
BetterBlog is a blogging system build using Laravel.

## Local Installation
In order to use this application locally we will need to ensure we have a few things installed first. 

**Be sure to follow all steps below in order to properly use this application!**

### Requirements

- [Composer](https://getcomposer.org/) - PHP Dependency Manager
- [Laravel](https://laravel.com/docs/5.6#installation) - PHP Framework
- [Socialite](https://laravel.com/docs/5.6/socialite#installation) - PHP Package for social media OAuth

### Social Media Login Setup
After installing Socialite you will need to create an app with [Facebook Developer](https://developers.facebook.com/) and [Google Developer](https://console.developers.google.com/) in order to get the clientID and clientSecret needed for OAuth

Once you have your app information you will need to input it into your local ``.env`` file

```
FB_CLIENT_ID = CLIENT_ID
FB_CLIENT_SECRET = CLIENT_SECRET
FB_REDIRECT = 'http://localhost:8000/callback/facebook'
 
G+_CLIENT_ID = CLIENT_ID
G+_CLIENT_SECRET = CLIENT_SECRET
G+_REDIRECT = 'http://localhost:8000/callback/google'
```


### Database Tables Setup
Finally, the last thing to get this application up and running is to run the migrations. To do this we run a simple command

```
php artisan migrate
```

## Authors
* **[Toby Horn](https://www.linkedin.com/in/horntoby/)** - Initial Work and Social Media Login
* **[Malcolm Ross](https://www.linkedin.com/in/malcolm-ross-ab8928114/)** - Initial Work and Like Feature