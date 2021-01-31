# Smsrl

### Install
	composer require rlgroups/smsrl

### ENV
	SMSRL_SERVER=http://server.test/
	SMSRL_KEY=***
	SMSRL_SECRET=****
	SMSRL_TEST_PHONE=000-0000000

### Notify for User.php
```php
public  function  routeNotificationForSmsrl()
{
	return  '000-0000000';
}
```

### SmsNotification.php Example
```php
<?php
namespace  App\Notifications;

use Illuminate\Bus\Queueable;
use Rlgroups\Smsrl\Services\Message;
use Illuminate\Notifications\Notification;

class  SmsNotification  extends  Notification
{
	use  Queueable;

	public function via($notifiable) {
		return ['smsrl'];
	}

	public function toSmsrl($notifiable) {
		return (new  Message())
			->line('line 1')
			->line()
			->line('line 3')
			->line('line 4');
	}
}
```

### example send notify
```php
$user->notify(new SmsNotification());
```

### example send sms manual
```php
Rlgroups\Smsrl\Services\Smsrl::send('000-0000000', 'Test');
```

### or 
```php
...
use Rlgroups\Smsrl\Services\Message;
use Rlgroups\Smsrl\Services\Smsrl;
...

$message = (new  Message())
	->line('line 1')
	->line()
	->line('line 3')
	->line('line 4');

Smsrl::send('000-0000000', $message->toString());
```




