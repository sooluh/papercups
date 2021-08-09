<?php

namespace Papercups\Integrations;

use Papercups\BaseClient;

class Github
{
    public function issues()
    {
        return new class extends BaseClient
        {
            /**
             * @param array $query
             * @return mixed
             */
            public function list($query)
            {
                return $this->get('github/issues', $query);
            }

            /**
             * @param array $params
             * @return mixed
             */
            public function create($params)
            {
                return $this->post('github/issues', $params);
            }
        };
    }

    public function repos()
    {
        return new class extends BaseClient
        {
            /**
             * @param array $query
             * @return mixed
             */
            public function list($query)
            {
                return $this->get('github/repos', $query);
            }
        };
    }
}
