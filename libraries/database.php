<?php
error_reporting(1);
class database {
	var $_sql = '';
	var $_connection = '';
	var $_cursor = null;
	
	function database() {		
		$this->_connection = @mysql_connect( DB_HOST, DB_USER, DB_PASS);
		if (!$this->_connection ) 
			die( "Khong the ket noi MySQL" );
		$db=DB_NAME;
		if ($db != '' && !mysql_select_db( $db, $this->_connection )) 
			die ( "Khong the mo CSDL $db: ".mysql_error() );
	}
	function setQuery( $sql) {
		$this->_sql = $sql;
	}
	function query() {	
		mysql_query('SET NAMES UTF8', $this->_connection);
		$this->_cursor = mysql_query( $this->_sql, $this->_connection );
		return $this->_cursor;
	}
	function loadRow() {
		if (!($cur = $this->query()))
			return null;
		$ret = null;
		if ($row = mysql_fetch_assoc( $cur ))
			$ret = $row;
		mysql_free_result( $cur );
		return $ret;
	}
	function loadResult() {
		if (!($cur = $this->query()))
			return null;
		$ret = null;
		if ($row = mysql_fetch_row( $cur ))
			$ret = $row[0];
		mysql_free_result( $cur );
		return $ret;
	}
	function loadAllRow() {
		if (!($cur = $this->query()))
			return null;
		$array = array();
		while ($row = mysql_fetch_assoc( $cur )) 
			$array[] = $row;
		mysql_free_result( $cur );
		return $array;
	}
	function disconnect() {
		mysql_close( $this->_connection );
	}
	
	function get_error() {
		return mysql_errno();
	}
	
	function getInsert_id() {
		return mysql_insert_id();
	}
}
?>