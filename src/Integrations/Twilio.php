<?php

namespace Papercups\Integrations;

use Papercups\BaseClient;

class Twilio extends BaseClient
{
    /**
     * @param array $params
     * @return mixed
     */
    public function send(array $params)
    {
        return $this->post('twilio/send', $params);
    }
}
