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

	public function sendMessage(string $to, $message)
	{
		try {
			return $this->client->post($this->endpoint, [
				'json' => [
					'content' => $message,
					"to" => [$to]
				]
			]);
		} catch (\Exception $e) {
			throw new \Exception($e->getMessage(), 422);
		}
	}

	public function sendMessages(array $to, $message)
	{
		if(count($to) > 500)
			throw new \Exception("Max Limit Reached, can only send to 500 in a single request, " . count($to) . " given.", 422);

		try {
			return $this->client->post($this->endpoint, [
				'json' => [
					'content' => $message,
					"to" => $to
				]
			]);
		} catch (\Exception $e) {
			throw new \Exception($e->getMessage(), 422);
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