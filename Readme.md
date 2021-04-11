## Work in progress 🙇‍


### Install instructions

1 ) Add package to your composer.json 
```json 
"repositories": [
    {
        "type": "vcs",
        "url": "git@github.com:bluebird-signal/bluebird-signal-laravel-channel.git"
    }
],
   
```
And run ``` php composer install ```

2 ) Add Provider to `config/app.php`
```php
'provider' => [
    ...
    BlueBirdSignal\BlueBirdSignalChannel\BlueBirdSignalServiceProvider::class
];
```

2 ) Run publish 
```composer log
php artisan vendor:publish --provider="BlueBirdSignal\BlueBirdSignalChannel\BlueBirdSignalServiceProvider" --tag=bluebird-signal
```
3 ) Add Environment API Keys to your .env file 
```dotenv
BLUEBIRD_SIGNAL_KEY=<ENV KEY>
```
4 ) Implement in notification
```php
    public function via($notifiable)
    {
        return [BlueBirdSignalChannel::class];
    }

    public function toBlueBirdSignal($notifiable): BlueBirdSignalMessage
    {
        return (new BlueBirdSignalMessage())
            ->setMessageKey('<message_key>')
            ->setSubject('Hello {{$full_name}}')
            ->setParameters([
                'full_name' => 'John Doe',
                'message' => 'Welcome our platform',
            ]);
    }
```
