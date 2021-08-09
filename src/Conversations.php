<?php

namespace Papercups;

class Conversations extends BaseClient
{
    /**
     * Method to retrieve a list of conversations
     * @param array $query
     * @return mixed
     */
    public function list(array $query = [])
    {
        return $this->get('conversations', $query);
    }

    /**
     * Method to retrieve a spesific conversation
     * @param int $id
     * @param array $query
     * @return mixed
     */
    public function retrieve(int $id, array $query = [])
    {
        $endpoint = ['conversations', $id];
        $endpoint = implode('/', $endpoint);

        return $this->get($endpoint, $query);
    }

    /**
     * Method to create a conversation
     * @param array $conversation
     * @return mixed
     */
    public function create(array $conversation)
    {
        return $this->post('conversations', [
            'conversation' => $conversation
        ]);
    }

    /**
     * Method to update a conversation
     * @param int $id
     * @param array $updates
     * @return mixed
     */
    public function update(int $id, array $updates)
    {
        $endpoint = ['conversations', $id];
        $endpoint = implode('/', $endpoint);

        return $this->put($endpoint, [
            'conversation' => $updates
        ]);
    }

    /**
     * Method to delete a conversation
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        $endpoint = ['conversations', $id];
        $endpoint = implode('/', $endpoint);

        return $this->delete($endpoint);
    }
}
