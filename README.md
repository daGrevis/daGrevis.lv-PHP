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
    Cloning into system...
    remote: Counting objects: 16395, done.
    remote: Compressing objects: 100% (5826/5826), done.
    remote: Total 16395 (delta 11409), reused 14904 (delta 10041)
    Receiving objects: 100% (16395/16395), 2.57 MiB | 683 KiB/s, done.
    Resolving deltas: 100% (11409/11409), done.
    [dagrevis@raitis dagrevis_lv]$ ls system/
    classes  config  guide  i18n  media  messages  tests  utf8  views
    [dagrevis@raitis dagrevis_lv]$ mkdir modules
    [dagrevis@raitis dagrevis_lv]$ cd modules/
    [dagrevis@raitis modules]$ git clone https://github.com/Alert/profilertoolbar
    Cloning into profilertoolbar...
    remote: Counting objects: 277, done.
    remote: Compressing objects: 100% (194/194), done.
    remote: Total 277 (delta 138), reused 202 (delta 63)
    Receiving objects: 100% (277/277), 141.23 KiB | 91 KiB/s, done.
    Resolving deltas: 100% (138/138), done.
    [dagrevis@raitis modules]$ git clone https://github.com/kohana/database
    Cloning into database...
    remote: Counting objects: 2709, done.
    remote: Compressing objects: 100% (1356/1356), done.
    remote: Total 2709 (delta 1442), reused 2423 (delta 1198)
    Receiving objects: 100% (2709/2709), 313.57 KiB | 198 KiB/s, done.
    Resolving deltas: 100% (1442/1442), done.
    [dagrevis@raitis modules]$ git clone https://github.com/zombor/Auto-Modeler am
    Cloning into am...
    remote: Counting objects: 1181, done.
    remote: Compressing objects: 100% (561/561), done.
    remote: Total 1181 (delta 561), reused 1086 (delta 477)
    Receiving objects: 100% (1181/1181), 163.55 KiB | 47 KiB/s, done.
    Resolving deltas: 100% (561/561), done.
    [dagrevis@raitis modules]$ git clone  https://github.com/kohana/orm
    Cloning into orm...
    remote: Counting objects: 1797, done.
    remote: Compressing objects: 100% (824/824), done.
    remote: Total 1797 (delta 600), reused 1750 (delta 565)
    Receiving objects: 100% (1797/1797), 296.71 KiB | 57 KiB/s, done.
    Resolving deltas: 100% (600/600), done.
    [dagrevis@raitis modules]$ git clone https://github.com/kohana/unittest
    Cloning into unittest...
    remote: Counting objects: 1395, done.
    remote: Compressing objects: 100% (606/606), done.
    remote: Total 1395 (delta 655), reused 1334 (delta 606)
    Receiving objects: 100% (1395/1395), 196.24 KiB | 38 KiB/s, done.
    Resolving deltas: 100% (655/655), done.
    [dagrevis@raitis modules]$ git clone https://github.com/kloopko/kohana-pagination pagination
    Cloning into pagination...
    remote: Counting objects: 330, done.
    remote: Compressing objects: 100% (193/193), done.
    remote: Total 330 (delta 93), reused 305 (delta 71)
    Receiving objects: 100% (330/330), 41.59 KiB, done.
    Resolving deltas: 100% (93/93), done.
    [dagrevis@raitis modules]$ cd ../
    [dagrevis@raitis dagrevis_lv]$ ls modules/
    am  database  orm  pagination  profilertoolbar  unittest