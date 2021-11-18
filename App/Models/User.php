<?php

namespace App\Models;

class user
{
    //VARIÁVEL RESPONSÁVEL POR ARMAZENAR NOME DA TABELA
    private static $table = 'user';

    /**
     * Método responsável por retornar o usuário solicitado pelo $id enviado pela API
     *
     * @param int $id
     * @return array
     */
    public static function select($id)
    {
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0 ){

            return $stmt->fetch(\PDO::FETCH_ASSOC);

        } else {
            
            throw new \Exception("Nenhum usuário encontrado");

        }

    }

    /**
     * Método responsável por retornar todos os registros de usuários 
     * @return array
     */
    public static function selectAll()
    {
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'SELECT * FROM '.self::$table.'';
        $stmt = $connPdo->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0 ){

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        } else {
            
            throw new \Exception("Nenhum usuário encontrado");

        }

    }

    /**
     * Método responsável por inserir dados de usuário na tabela users
     * @param $name string
     * @param $email string
     * @param $password string
     * @return string
     */
    public static function insert($data)
    {
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'INSERT INTO '.self::$table.'(name,email,password) VALUES (:nam,:ema,:pas)';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':nam', $data['name']);
        $stmt->bindValue(':ema', $data['email']);
        $stmt->bindValue(':pas', $data['password']);
        $stmt->execute();

        if ($stmt->rowCount() > 0 ){

            return 'Usuário cadastrado com sucesso!';

        } else {
            
            throw new \Exception("Erro ao cadastrar usuário");

        }

    }

    
}
