# php-notification
Send notifications on Windows7/10 / macOS / Linux Desktop with php.

## Install
```bash
composer require xiebruce/php-notification
```

## Usage
```php
require 'vendor/autoload.php';

use Notification\Notification;

// subtitle only supported on macOS.
$config = [
	'success' => [
		'title' => 'Upload succeed',
		'subtitle' => 'Upload succeed',
		'message' => 'You can paste url directly.',
	],
	'failed' => [
		'title' => 'Upload failed',
		'subtitle' => 'Upload failed',
		'message' => 'Sorry, Upload failed.',
	],
	'no_image' => [
		'title' => 'No image',
		'subtitle' => 'No image was dected on the clipboard',
		'message' => 'No image was detected on the clipboard, Please take a screenshot first.',
	],
];

$notify = new Notification($config);
$notify->send('success');
```

## Demonstration
[macOS](https://img.xiebruce.top/2019/09/12/7e2fb81428050854cb94c5f81b2bb906.gif):
![notification-macOS](https://img.xiebruce.top/2019/09/12/7e2fb81428050854cb94c5f81b2bb906.gif)

[Windows 10](https://img.xiebruce.top/2019/09/12/ce9465d704af6eca74949eaee71646d2.gif):
![notification-Win10](https://img.xiebruce.top/2019/09/12/ce9465d704af6eca74949eaee71646d2.gif)

[Windows 7](https://img.xiebruce.top/2019/09/12/69e2655ad3b2666b31684a4d370e02c7.gif):
![notification-Win7](https://img.xiebruce.top/2019/09/12/69e2655ad3b2666b31684a4d370e02c7.gif)

[Linux(Ubuntu 18.04)](https://img.xiebruce.top/2019/09/12/d23ae77d6a0baa55910b41235eab6435.gif):
![notification-Ubuntu](https://img.xiebruce.top/2019/09/12/d23ae77d6a0baa55910b41235eab6435.gif)
