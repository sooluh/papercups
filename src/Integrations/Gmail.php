<?php

namespace Papercups\Integrations;

use Papercups\BaseClient;

class Gmail extends BaseClient
{
    /**
     * @param array $params
     * @return mixed
     */
    public function send(array $params)
    {
        return $this->post('gmail/send', $params);
    }
}
