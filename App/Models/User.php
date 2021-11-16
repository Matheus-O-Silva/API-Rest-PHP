<?php

namespace App\Models;


class user
{
    private static $table = 'user';

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
}
