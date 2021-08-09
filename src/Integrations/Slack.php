<?php

namespace Papercups\Integrations;

use Papercups\BaseClient;

class Slack extends BaseClient
{
    /**
     * @param array $params
     * @return mixed
     */
    public function notify(array $params)
    {
        return $this->post('slack/notify', $params);
    }
}
