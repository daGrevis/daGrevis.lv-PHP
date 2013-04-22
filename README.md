This code is not the current version of my blog. Current version is written on Django framework and [can be found here](https://github.com/daGrevis/daGrevis.lv).

# Code of [my blog](http://dagrevis.lv/ "daGrevis.lv") (based on [Kohana](http://kohanaframework.org/ "Kohana") 3.2)

## How to get it working?

1. Get `system/` directory of Kohana 3.2 and place it in `/`,
2. Get the needed modules (in `application/modules.php` you can find the list),
3. Adjust `.htaccess` and `application/bootstrap.php`,
4. Adjust all needed files in `application/config` (like `database.php`),
5. Execute all SQL scripts from `application/sql`;

## First and second step explained

    [dagrevis@raitis dagrevis_lv]$ mkdir -m 777 application/cache application/logs
    [dagrevis@raitis dagrevis_lv]$ ls application/
    bootstrap.php  cache  classes  config  logs  messages  modules.php  routes.php  sql  vendor  views
    [dagrevis@raitis dagrevis_lv]$ git clone https://github.com/kohana/core system
    [dagrevis@raitis dagrevis_lv]$ ls system/
    classes  config  guide  i18n  media  messages  tests  utf8  views
    [dagrevis@raitis dagrevis_lv]$ mkdir modules
    [dagrevis@raitis dagrevis_lv]$ cd modules/
    [dagrevis@raitis modules]$ git clone https://github.com/Alert/profilertoolbar
    [dagrevis@raitis modules]$ git clone https://github.com/kohana/database
    [dagrevis@raitis modules]$ git clone https://github.com/zombor/Auto-Modeler am
    [dagrevis@raitis modules]$ git clone https://github.com/kohana/orm
    [dagrevis@raitis modules]$ git clone https://github.com/kohana/unittest
    [dagrevis@raitis modules]$ git clone https://github.com/kloopko/kohana-pagination pagination
    [dagrevis@raitis modules]$ git clone https://github.com/daGrevis/Darkmown darkmown
    [dagrevis@raitis modules]$ cd ../
    [dagrevis@raitis dagrevis_lv]$ ls modules/
    am  darkmown  database  orm  pagination  profilertoolbar  unittest
