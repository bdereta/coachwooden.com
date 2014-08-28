<?php
App::uses('AppModel', 'Model');
/**
 * Metadata Model
 *
 * @property Section $Section
 */
class Metadata extends BamblaAppModel {
	
	public $recursive = -1;
	
	public function FetchMetadata($output = null) {
		$cache_key = 'Metadata';
		$output = Cache::read($cache_key);
		if (!$output) {	
			$result = $this->find('all', array('fields' => array('name','title','description','keywords')));	
			$reorder = Hash::combine($result, '{n}.Metadata.name','{n}.Metadata');
			$output = serialize($reorder);
			Cache::write($cache_key, $output);
		}
		return $output;
	}
}
