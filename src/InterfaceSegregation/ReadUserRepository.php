<?php

namespace SOLID\InterfaceSegregation;

class ReadUserRepository implements Readable
{
    public function all()
    {
        echo 'Read users';
    }

    public function show($id)
    {
        echo "Show user with ID $id";
    }
}
