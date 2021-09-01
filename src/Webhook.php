<?php

namespace Papercups;

class Webhook extends BaseClient
{
    private static $availableEvent = [
        'webhook:verify',
        'message:created',
        'conversation:created',
        'conversation:updated'
    ];
    private static $events = [];

    /**
     * Method to be called before the function runs
     * @return void
     */
    public function setUp()
    {
        $self = $this;

        $this->on('webhook:verify', function ($payload, $action) use ($self) {
            return $self->sendJSON([
                'challenge' => $payload
            ]);
        });
    }

    /**
     * Private method to return response as JSON
     * @param mixed $body
     * @return void
     */
    private function sendJSON($body)
    {
        if (ob_get_contents() || ob_get_length() > 0) {
            ob_end_clean();
        }

        header('Content-Type: application/json');
        echo json_encode($body);

        // k.o.
        die();
    }

    /**
     * Register webhook events
     * @param string $event
     * @param callable $callback
     * @throws Exception
     * @return void
     */
    public function on(string $event, callable $callback)
    {
        if (!in_array($event, self::$availableEvent)) {
            throw new \Exception('The event you entered is not supported or does not even exist');
        }

        if (!is_callable($callback)) {
            throw new \Exception('Your callback function is invalid');
        }

        if (in_array($event, self::$events)) {
            throw new \Exception("The '$event' event webhook has been registered before");
        }

        self::$events[$event] = $callback;
    }

    /**
     * Listen to Papercups requests
     * @return void
     */
    public function listen()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input);

        $event = $data->event;
        $payload = $data->payload;

        if (!in_array($event, array_keys(self::$events))) {
            return $this->sendJSON([
                'ok' => false
            ]);
        }

        // TODO: variable for actions like reply, close, delete, etc.
        $action = null;
        call_user_func(self::$events[$event], $payload, $action);
    }
}
