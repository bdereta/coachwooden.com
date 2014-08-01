<?php
App::uses('AppModel', 'Model');
/**
 * Section Model
 *
 */
class Section extends AppModel {

	public $displayField = 'page_name';
	
	public function fetchSections() {
		$result = Cache::read('sections');
		if (!$result) {
			$result = $this->find('all', array('recursive' => -1));
			if (!empty($result)) {
				$section = array();
				for($i=0; $i<count($result);$i++) {
					$section[$result[$i]['Section']['page_name']][$result[$i]['Section']['index']] = array(
							'id' => $result[$i]['Section']['id'], 
							'content' => $result[$i]['Section']['content']
					);
				}
				$result = serialize($section);
				Cache::write('sections', $result);
			}
		}
		return $result;
	}
}
