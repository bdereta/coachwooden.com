<?php
App::uses('AppModel', 'Model');
/**
 * Page Model
 *
 * @property Section $Section
 */
class Page extends AppModel {
	
	public $displayField = 'name';
	public $recursive = -1;
	
	public function fetchPageMetum() {
		$cache_key = 'metum';
		$output = Cache::read($cache_key);
		if (!$output) {	
			$result = $this->find('all', array('fields' => array('Page.name','Page.title','Page.description','Page.keywords')));	
			$reorder = Hash::combine($result, '{n}.Page.name','{n}.Page');
			$output = serialize($reorder);
			Cache::write($cache_key, $output);
		}
		return $output;
	}
	
	public function ClearCache($cache_key) {
		Cache::delete($cache_key);
	}
}
