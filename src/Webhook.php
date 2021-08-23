<?php

namespace Papercups;

class Webhook extends BaseClient
{
    private $availableEvent = [
        'message:created',
        'conversation:created',
        'conversation:updated'
    ];
    private $events = [];

    /**
     * Register webhook events
     * @param string $event
     * @param callable $callback
     * @throws Exception
     * @return void
     */
    public function on(string $event, callable $callback)
    {
        if (!in_array($event, $this->availableEvent)) {
            throw new \Exception('The event you entered is not supported or does not even exist');
        }

        if (!is_callable($callback)) {
            throw new \Exception('Your callback function is invalid');
        }

        if (in_array($event, $this->events)) {
            throw new \Exception("The '$event' event webhook has been registered before");
        }

        $this->events[$event] = $callback;
    }

    /**
     * Listen to Papercups requests
     * @param boolean $return
     * @return mixed
     */
    public function listen(bool $return = false)
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input);

        $event = $data->event;
        $payload = $data->payload;

        if (!in_array($event, array_keys($this->events))) {
            return;
        }

        if ($event === 'webhook:verify') {
            if (ob_get_contents() || ob_get_length() > 0) {
                ob_end_clean();
            }

            header('Content-Type', 'application/json');
            echo json_encode([
                'challenge' => $payload
            ]);
            return;
        }

        if ($return === true) {
            return $data;
        }

        $this->events[$event]($payload);
    }
}
