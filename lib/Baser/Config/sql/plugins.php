<?php

/* SVN FILE: $Id$ */
/* Plugins schema generated on: 2010-11-04 18:11:10 : 1288863010 */

class PluginsSchema extends CakeSchema {

	public $name = 'Plugins';

	public $file = 'plugins.php';

	public $connection = 'baser';

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $plugins = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50),
		'title' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50),
		'version' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20),
		'status' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'db_inited' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);

}
