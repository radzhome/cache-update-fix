# Cache-Update-Fix Wordpress Plugin #


## Description ##

Patches the following issue when updating alloptions in cache:

* https://github.com/tillkruss/redis-cache/issues/58
* https://core.trac.wordpress.org/ticket/40052
* https://core.trac.wordpress.org/ticket/31245
* https://wordpress.org/support/topic/object-cache-out-of-sync-with-database/

Based on the fix presented here:

* https://github.com/Automattic/vip-go-mu-plugins-built/blob/master/misc.php


It appears there is sometimes an edge-case once our redis store has many keys where once a key is set, 
eg `user_meta:x` the key even when updated via `update_user_meta`, it is never updated in the redis-cache
causing the db and cache to be out of sync.

## Changelog ##

### 0.1.0 ###

* Initial Version

## History

#### 1.0.0 - 2018-09-10
* Initial release
 
 
