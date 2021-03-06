<?php

namespace Papercups;

class Notes extends BaseClient
{
    /**
     * Method to retrieve a list of notes
     * @param array $query
     * @return mixed
     */
    public function list(array $query = [])
    {
        return $this->get('notes', $query);
    }

    /**
     * Method to retrieve a spesific note
     * @param string $id
     * @param array $query
     * @return mixed
     */
    public function retrieve(string $id, array $query = [])
    {
        $endpoint = ['notes', $id];
        $endpoint = implode('/', $endpoint);

        return $this->get($endpoint, $query);
    }

    /**
     * Method to create a note
     * @param array $note
     * @return mixed
     */
    public function create(array $note)
    {
        return $this->post('notes', [
            'note' => $note
        ]);
    }

    /**
     * Method to delete a note
     * @param string $id
     * @return mixed
     */
    public function destroy(string $id)
    {
        $endpoint = ['notes', $id];
        $endpoint = implode('/', $endpoint);

        return $this->delete($endpoint);
    }
}
