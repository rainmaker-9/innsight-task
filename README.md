# INNSight Task

Hello INNSight Team! I am Raviraj. This is the repository for task assigned to me in hiring process.

# How to run this app?

Requirements:

- Composer - https://getcomposer.org/download/

For PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)

- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) to use MySQL

```xml
git clone https://github.com/rblethal/innsight-task.git innsight-task-app
```

Import the MySQL Database Dump File (**innsight_task.sql**) using phpMyAdmin

- Note: You don't need to create a database first for importing the
  file. This file import will automatically create the database for
  you.

After successful clone, open shell/command prompt in the cloned folder and run following command:

If you use Composer as a PHP Archive:

```xml
php composer.phar update
```

If you have installed composer on your local machine:

```xml
composer update
```

Copy `env` to `.env` and tailor for your app, specifically the baseURL. Configure your database credentials in `app\Config\Database.php`

After composer is finished installing required dependencies, run following command in same window:

```xml
php spark serve
```

You can view your running app in your browser at your specified `baseURL` either in `.env` file or in `app\Config\App.php`
