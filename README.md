# Blog Laravel

## Features
 - Markdown for true developers
 
## API
 - description in progess

## Install
 - `composer install` - install php components
 - `npm install` - install nodejs components (front-end)
 - `npm run production` - build assets
 - `php artisan migrate` - create DB
 - `php artisan optimize` - some optimization

## User
User registration disabled by default.

### Manually add new user
Use tinker `php artisan tinker`:

```
$user = new App\User();
$user->email = 'user1@domain.nz';
$user->name = 'User1';
$user->password = Hash::make('Pa$sW0Rd!');
$user->save();
exit
```

CLEAR/REMOVE tinker history file `~/.config/psysh/psysh_history` after that.

## Known bugs

### Tests
 - Tests will not rollback fake data, because of Laravel MongoDB [bug](https://github.com/jenssegers/laravel-mongodb/issues/1334), some workaround applied
