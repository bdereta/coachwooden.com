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
		$output = NULL;
		$cache_key = 'Metadata';
		$data = Cache::read($cache_key);
		if (!$data) {	
			$result = $this->find('all', array('fields' => array('name','title','description','keywords')));
			$reorder = Hash::combine($result, '{n}.Metadata.name','{n}.Metadata');
			$data = serialize($reorder);
			Cache::write($cache_key, $data);
		}
		if (!empty($data)) {
			$output = unserialize($data);
		}
		return $output;
	}
}
