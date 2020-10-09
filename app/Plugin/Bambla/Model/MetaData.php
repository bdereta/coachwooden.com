<?php
App::uses('AppModel', 'Model');
/**
 * Metadata Model
 *
 * @property Section $Section
 */
class MetaData extends BamblaAppModel {
	
	public $recursive = -1;
    public $useTable = 'metadata';
	
	public function FetchMetaData($output = null) {
		$output = NULL;
		$cache_key = 'Metadata';
		$data = Cache::read($cache_key);
		if (!$data) {	
			$result = $this->find('all', array('fields' => array('name','title','description','keywords')));
			$reorder = Hash::combine($result, '{n}.MetaData.name','{n}.MetaData');
			$data = serialize($reorder);
			Cache::write($cache_key, $data);
		}
		if (!empty($data)) {
			$output = unserialize($data);
		}
		return $output;
	}
}
