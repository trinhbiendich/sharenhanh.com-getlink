<?php
require_once(ROOT_PATH . "/libraries/database.php");
class Link extends database
{
	function getLink($id){
	    $id=addslashes($id);
		$sql = "SELECT * FROM " . LINK_TABLE_NAME . " WHERE uuid = '$id'";
		$this->setQuery($sql);
		return $this->loadRow();
	}

    function insertNew($id, $link){
        $id = addslashes($id);
        $link = addslashes($link);
        $sql = "INSERT INTO `" . LINK_TABLE_NAME . "`(`uuid`, `target`) VALUES ('$id','$link')";
        $this->setQuery($sql);
        return $this->query();
    }
    
    function getAllLink($index, $limit){
        $id = intval($index);
        $link = intval($limit);
        $sql = "select * from " . LINK_TABLE_NAME . " limit $index, $limit";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }
    
    function getTotalLink(){
        $sql = "select count(*) from " . LINK_TABLE_NAME;
        $this->setQuery($sql);
        return $this->loadResult();
    }
    
    function deleteItem($id){
        $id = intval($id);
        $sql = "DELETE FROM " . LINK_TABLE_NAME . " WHERE id = $id";
        $this->setQuery($sql);
        return $this->loadResult();
    }

}


