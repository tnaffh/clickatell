<?php

namespace Ccom\Clickatell;

use GuzzleHttp\Client as Guzzle;

class Clickatell
{
	protected $client;
	protected $endpoint = 'https://platform.clickatell.com/messages';

	public function __construct()
	{
		$this->client = new Guzzle($this->getHeaders());
	}

	public function sendMessage($to, $message)
	{
		try {
			return $this->client->post($this->endpoint, [
				'json' => [
					'content' => $message,
					"to" => [(string) $to]
				]
			]);
		} catch (Exception $e) {
			throw new Exception($e->getMessage(), 422);
		}
	}

	protected function getHeaders()
	{
		return [
			'headers' => [
				'Authorization' => config('clickatell.api_key')
			]
		];
	}
	
}