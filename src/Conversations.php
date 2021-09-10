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
     * @param string $id
     * @param array $query
     * @return mixed
     */
    public function retrieve(string $id, array $query = [])
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
     * @param string $id
     * @param array $updates
     * @return mixed
     */
    public function update(string $id, array $updates)
    {
        $endpoint = ['conversations', $id];
        $endpoint = implode('/', $endpoint);

        return $this->put($endpoint, [
            'conversation' => $updates
        ]);
    }

    /**
     * Method to archive a conversation
     * @param string $id
     * @return mixed
     */
    public function archive(string $id)
    {
        $endpoint = ['conversations', $id, 'archive'];
        $endpoint = implode('/', $endpoint);

        return $this->post($endpoint);
    }

    /**
     * Method to delete a conversation
     * @param string $id
     * @return mixed
     */
    public function destroy(string $id)
    {
        $endpoint = ['conversations', $id];
        $endpoint = implode('/', $endpoint);

        return $this->delete($endpoint);
    }
}
