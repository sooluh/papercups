<?php

namespace Papercups;

class Customers extends BaseClient
{
    /**
     * Method to retrieve a list of customers
     * @param array $query
     * @return mixed
     */
    public function list(array $query = [])
    {
        return $this->get('customers', $query);
    }

    /**
     * Method to retrieve a spesific customer
     * @param int $id
     * @param array $query
     * @return mixed
     */
    public function retrieve(int $id, array $query = [])
    {
        $endpoint = ['customers', $id];
        $endpoint = implode('/', $endpoint);

        return $this->get($endpoint, $query);
    }

    /**
     * Method to create a customer
     * @param array $customer
     * @return mixed
     */
    public function create(array $customer)
    {
        return $this->post('customers', [
            'customer' => $customer
        ]);
    }

    /**
     * Method to update a customer
     * @param int $id
     * @param array $updates
     * @return mixed
     */
    public function update(int $id, array $updates)
    {
        $endpoint = ['customers', $id];
        $endpoint = implode('/', $endpoint);

        return $this->put($endpoint, [
            'customer' => $updates
        ]);
    }

    /**
     * Method to delete a customer
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        $endpoint = ['customers', $id];
        $endpoint = implode('/', $endpoint);

        return $this->delete($endpoint);
    }
}
