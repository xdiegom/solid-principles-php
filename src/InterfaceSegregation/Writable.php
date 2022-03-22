<?php

namespace SOLID\InterfaceSegregation;

interface Writable
{
    /**
     * Creates a record into database
     * @param array $fields
     * @return mixed
     */
    public function create($fields);

    /**
     * Updates the record in database with given
     * fields and record ID
     * @param mixed $id
     * @param array $fields
     * @return mixed
     */
    public function update($id, $fields);

    /**
     * Deletes a record from database
     * @param mixed $id
     * @return mixed
     */
    public function delete($id);
}
