<?php

namespace Papercups;

class Messages extends BaseClient
{
    /**
     * Method to retrieve a list of messages
     * @param array $query
     * @return mixed
     */
    public function list(array $query = [])
    {
        return $this->get('messages', $query);
    }

    /**
     * Method to retrieve a spesific message
     * @param string $id
     * @param array $query
     * @return mixed
     */
    public function retrieve(string $id, array $query = [])
    {
        $endpoint = ['messages', $id];
        $endpoint = implode('/', $endpoint);

        return $this->get($endpoint, $query);
    }

    /**
     * Method to create a message
     * @param array $message
     * @return mixed
     */
    public function create(array $message)
    {
        return $this->post('messages', [
            'message' => $message
        ]);
    }

    /**
     * Method to delete a message
     * @param string $id
     * @return mixed
     */
    public function destroy(string $id)
    {
        $endpoint = ['messages', $id];
        $endpoint = implode('/', $endpoint);

        return $this->delete($endpoint);
    }
}
