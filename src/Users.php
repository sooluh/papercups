<?php

namespace Papercups;

class Users extends BaseClient
{
    /**
     * Method to retrieve the current user informations
     * @return mixed
     */
    public function me()
    {
        return $this->get('me');
    }

    /**
     * Method to retrieve a list of active users on your team
     * @param array $query
     * @return mixed
     */
    public function list(array $query = [])
    {
        return $this->get('users', $query);
    }

    /**
     * Method to retrieve spesific user on your team
     * @param int $id
     * @param array $query
     * @return mixed
     */
    public function retrieve(int $id, array $query = [])
    {
        $endpoint = ['users', $id];
        $endpoint = implode('/', $endpoint);

        return $this->get($endpoint, $query);
    }
}
