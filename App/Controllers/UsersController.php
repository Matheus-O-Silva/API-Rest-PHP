<?php

namespace App\Controllers;
use App\Models\User;


class UsersController 
{
    public function get($id = null)
    {
        if($id) {
            return 'funcionou';
        }

        return 'erro';
    }

    public function post()
    {
        
    }

    public function update()
    {
        
    }

    public function delete()
    {
        
    }
}
