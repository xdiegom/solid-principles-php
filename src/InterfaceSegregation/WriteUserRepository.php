<?php

namespace SOLID\InterfaceSegregation;

class WriteUserRepository implements Writable
{

    public function create($fields)
    {
        $fields = join(',', $fields);
        echo "Create user with fields {$fields}";
    }

    public function update($id, $fields)
    {
        $fields = join(',', $fields);
        echo "Update user with ID {$id} with fields {$fields}";
    }

    public function delete($id)
    {
        echo "Delete user with ID {$id}";
    }
}
