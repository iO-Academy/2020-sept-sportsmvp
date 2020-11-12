<?php

namespace TheRealMVP;

class PDO
{
    /** Creates PDO connection
     *
     * @return \PDO
     */
    public static function createPDO() : \PDO
    {
        return new \PDO ("mysql:host=db; dbname=TheRealMVP", "root", "password");
    }
}