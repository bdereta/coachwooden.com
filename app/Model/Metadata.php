<?php
App::uses('AppModel', 'Model');
/**
 * Metadata Model
 *
 * @property Section $Section
 */
class Metadata extends AppModel {
	
	public $displayField = 'page_name';
	public $recursive = -1;
	
	public function FetchMetaData() {
		$cache_key = 'Metadata';
		$output = Cache::read($cache_key);
		if (!$output) {	
			$result = $this->find('all', array('fields' => array('Metadata.page_name','Metadata.title','Metadata.description','Metadata.keywords')));	
			$reorder = Hash::combine($result, '{n}.Metadata.page_name','{n}.Metadata');
			$output = serialize($reorder);
			Cache::write($cache_key, $output);
		}
		return $output;
	}
}
