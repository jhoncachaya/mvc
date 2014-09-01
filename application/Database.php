<?php


class Database extends PDO
{
    public function __construct() {
        parent::__construct(
                'mysql:host=' . db_host .
                ';dbname=' . db_name,
                db_user, 
                db_pass, 
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . db_char
                    ));
                
    }
}
?>