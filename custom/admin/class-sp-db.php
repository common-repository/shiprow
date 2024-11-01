<?php

/**

 * sprowdb this class work for all db operation

 */

class sprowdb

{

	public function insert( $tablename , $data, $format ){

		global $wpdb;

		$insert = $wpdb->insert( $table_name, $data, $format );

		

	}

}

global $sprowdb;

$sprowdb = new sprowdb();

?>