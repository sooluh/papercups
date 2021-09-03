<?php

namespace Papercups;

class Tags extends BaseClient
{
    /**
     * Method to retrieve a list of tags
     * @param array $query
     * @return mixed
     */
    public function list(array $query = [])
    {
        return $this->get('tags', $query);
    }

    /**
     * Method to retrieve a spesific tag
     * @param string $id
     * @param array $query
     * @return mixed
     */
    public function retrieve(string $id, array $query = [])
    {
        $endpoint = ['tags', $id];
        $endpoint = implode('/', $endpoint);

        return $this->get($endpoint, $query);
    }

    /**
     * Method to create a tag
     * @param array $tag
     * @return mixed
     */
    public function create(array $tag)
    {
        return $this->post('tags', [
            'tag' => $tag
        ]);
    }

    /**
     * Method to delete a tag
     * @param string $id
     * @return mixed
     */
    public function destroy(string $id)
    {
        $endpoint = ['tags', $id];
        $endpoint = implode('/', $endpoint);

        return $this->delete($endpoint);
    }
}
