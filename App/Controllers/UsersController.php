<?php

namespace App\Controllers;
use App\Models\User;


class UsersController 
{
    /***
     * Método responsável por retornar método GET da API users
     * @param int $id
     * return array
     */
    public function get($id = null)
    {
        if($id) {
            
            return User::select($id);
        }

        return User::selectAll();
    }

    /***
     * Método responsável por inserir dados de usuários via API método POST
     * @param $name string
     * @param $email string
     * @param $password string
     * return array
     */
    public function post()
    {
        $data = $_POST;

        return User::insert($data);
    }

    public function update()
    {

    }

    public function delete()
    {
        
    }
}
