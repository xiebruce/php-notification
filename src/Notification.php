<?php
/**
 * Created by PhpStorm.
 * User: Bruce Xie
 * Date: 2019-09-11
 * Time: 14:01
 */

namespace Notification;

class Notification {
	
	/**
	 * $config format:
	 * $config = [
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
	 *
	 */
	private $config = [];
	
	/**
	 * Notification constructor.
	 *
	 * @param array $config
	 */
	public function __construct(array $config = []){
		if(PHP_OS == 'Linux'){
			$notifySend1 = '/usr/bin/notify-send';
			$notifySend2 = '/usr/local/bin/notify-send';
			if(!is_file($notifySend1) && !is_file($notifySend2)){
				exit('notify-send is required, you should install `notify-send` first.');
			}
		}
		$this->config = $config;
	}
	
	/**
	 * Send notification on Windows 7/10, macOS and Linux Desktop(e.g. Ubuntu)
	 * @param $type, The key of your config
	 *
	 * @return bool
	 */
	public function send($type){
		if(!isset($this->config[$type])){
			return false;
		}

		$config = $this->config[$type];
		
		$title = isset($config['title']) ? trim($config['title']) : 'no title set';
		$message = isset($config['message']) ? trim($config['message']) : 'no message set';
		// Not use in Windows
		$subtitle = isset($config['subtitle']) ? trim($config['subtitle']) : 'no subtitle set';
		switch (PHP_OS){
			case 'Darwin':
				// Apple script: display notification
				$applescript_command = 'display notification "' . $message . '" with title "' . $title . '" subtitle "' . $subtitle . '"';
				// Execute apple script
				$notification_script = "osascript -e '" . $applescript_command . "'";
				break;
			case 'WINNT':
				$powerShell = __DIR__ . '/notification.ps1';
				$notification_script = "powershell -ExecutionPolicy Unrestricted {$powerShell} '{$title}' '{$message}'";
				break;
			default:
				//Linux(Only test on Ubuntu，you need to install `notify-send` first)
				$notification_script = "notify-send '{$title}' '{$message}'";
		}
		$handle = popen($notification_script, 'r');
		pclose($handle);
	}
}