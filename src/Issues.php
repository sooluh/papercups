<?php

namespace Papercups;

class Issues extends BaseClient
{
    /**
     * Method to retrieve a list of issues
     * @param array $query
     * @return mixed
     */
    public function list(array $query = [])
    {
        return $this->get('issues', $query);
    }

    /**
     * Method to retrieve a spesific issue
     * @param string $id
     * @param array $query
     * @return mixed
     */
    public function retrieve(string $id, array $query = [])
    {
        $endpoint = ['issues', $id];
        $endpoint = implode('/', $endpoint);

        return $this->get($endpoint, $query);
    }

    /**
     * Method to create a issue
     * @param array $issue
     * @return mixed
     */
    public function create(array $issue)
    {
        return $this->post('issues', [
            'issue' => $issue
        ]);
    }

    /**
     * Method to delete a issue
     * @param string $id
     * @return mixed
     */
    public function destroy(string $id)
    {
        $endpoint = ['issues', $id];
        $endpoint = implode('/', $endpoint);

        return $this->delete($endpoint);
    }
}
