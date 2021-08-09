<?php

namespace Papercups;

class Companies extends BaseClient
{
    /**
     * Method to retrieve a list of companies
     * @param array $query
     * @return mixed
     */
    public function list(array $query = [])
    {
        return $this->get('companies', $query);
    }

    /**
     * Method to retrieve a spesific company
     * @param int $id
     * @param array $query
     * @return mixed
     */
    public function retrieve(int $id, array $query = [])
    {
        $endpoint = ['companies', $id];
        $endpoint = implode('/', $endpoint);

        return $this->get($endpoint, $query);
    }

    /**
     * Method to create a company
     * @param array $company
     * @return mixed
     */
    public function create(array $company)
    {
        return $this->post('companies', [
            'company' => $company
        ]);
    }

    /**
     * Method to delete a company
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        $endpoint = ['companies', $id];
        $endpoint = implode('/', $endpoint);

        return $this->delete($endpoint);
    }
}
