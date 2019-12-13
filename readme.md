# Mega awesome website about Pokémons

Well hi there! Hope you like my last project in procedural PHP, because the next one *will* be with Symfony!

## Setup

If you've just downloaded the code, congratulations!!

To get it working, follow these steps:

**Download node_modules**

Make sure you have [NodeJS](https://nodejs.org/en/download/)
and then run:

```
npm install
```

**Setup the Database**

It's easy, just run:

```
mysqldump -u username -p pokedex > pokedex.sql
```

If you get an error that the database exists, that should
be ok.

Then, modify `/config/mysql.php` and put in here your MySql username and password.

-----

Have fun! ❤️

## Things to know

The admin user is the only one able to create new accounts, by default it is:
> foobar

> 1234

You must be logged to create or edit pokemons, but everyone can look at everyone's pokémons or the pokémons created last week.

Some files uses require with `$_SERVER['DOCUMENT_ROOT']`, It works when the project's root is `/var/www/html`, but I'm not sure if that root is different.

-----

Do NOT under ANY CIRCUMSTANCES ***CLICK*** on Pikachu!!!

do try a konami code though. 