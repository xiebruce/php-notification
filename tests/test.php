<?php
	/**
	 * Created by PhpStorm.
	 * User: Bruce Xie
	 * Date: 2019-09-11
	 * Time: 14:01
	 */
	
	require '../vendor/autoload.php';
	
	use Notification\Notification;
	
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