<?php
require_once(ROOT_PATH . "/libraries/database.php");
class User extends database
{
    function getuserByUserName($username){
        $username = addslashes($username);
        
        $sql = "INSERT INTO `links`(`uuid`, `target`) VALUES ('$id','$link')";
        $this->setQuery($sql);
        return $this->query();
    }

}


