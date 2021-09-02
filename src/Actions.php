<?php

namespace Papercups;

class Actions extends BaseClient
{
	/**
	 * @var string
	 */
	protected $id;

	/**
	 * @var object|array
	 */
	protected $payload;

	/**
	 * Method to set conversation payload
	 * @param string $event
	 * @param object|array $payload
	 * @return void
	 */
	public function setRequest(string $event, $payload)
	{
		if (in_array($event, ['message:created'])) {
			$this->id = (string) $payload->conversation_id;
		}

		$this->payload = $payload;
	}

	/**
	 * Method to check if this is a customer or not
	 * @return bool
	 */
	public function isCustomer()
	{
		return property_exists($this->payload, 'customer');
	}

	/**
	 * Method to check if this is a admin or not
	 * @return bool
	 */
	public function isAdmin()
	{
		return !property_exists($this->payload, 'customer') &&
			$this->payload->type !== 'bot';
	}

	/**
	 * Method to check if this is a bot or not
	 * @return bool
	 */
	public function isBot()
	{
		return !property_exists($this->payload, 'customer') &&
			$this->payload->type === 'bot';
	}

	/**
	 * Method for replying to messages
	 * @param string $message
	 * @param string $type
	 * @return mixed
	 */
	public function reply(string $message, string $type)
	{
		if (isset($this->id)) return null;

		return $this->post('messages', [
			'message' => [
				'body' => $message,
				'type' => $type,
				'conversation_id' => $this->id,
				'sent_at' => gmdate("Y-m-d\TH:i:s\Z")
			]
		]);
	}

	/**
	 * Methods for replying to messages with attachments
	 * @param string $message
	 * @param array $attachment
	 * @param string $type
	 */
	public function replyAttachment(string $message, array $attachment, string $type)
	{
		// TODO: hehehe
		return null;
	}
}
