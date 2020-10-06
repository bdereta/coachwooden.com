<?php

class BamblaHelper extends AppHelper {	

	public $helpers = array('Form','Html');
	
	public function FetchSection($index, array $options = NULL) {	
		//capture view variables
		$section = !empty($this->_View->viewVars['section']) ? $this->_View->viewVars['section'] : NULL;
		$is_admin = !empty($this->_View->viewVars['is_admin']) ? $this->_View->viewVars['is_admin'] : NULL;	
		$name = (!empty($options['name'])) 
			? $options['name'] //pass a page name
			: $this->request->params['action']; //use current page
		//returns section only if it exists in the database
		if (!empty($section[$name][$index])) {
			$edit = '<p>'.$this->Html->link('Edit', array('controller' => 'sections', 'action' => 'edit', $section[$name][$index]['id'], 'admin' => true), array('class'=>'bambla_edit_button')).'</p>';
			if (!empty($is_admin)) {
				if ($section[$name][$index]['content'] == '') {
					$content = '<div class="bambla_empty_section">
						 <b>This is a courtesy notice and it\'s only visible to logged in CMS administrators:</b>
						 Section ['.$index.'] for `'.ucwords($name).' Page` is currently empty. 
						 You may leave it empty or request your web developer to remove it from the page. 
						 You may also edit this section by clicking the EDIT button under it. 
						 This notice is only visible to logged in Administrators. The end users will not see this notice.</div>';
				} else {					
					$content = $section[$name][$index]['content'];
				}
				$content.= $edit;
			} else {
				$content = $section[$name][$index]['content'];	
			}
		} else {
			//otherwise allow admin to link directly to wysiwyg editor in order to edit the section
			if (!empty($is_admin)) {
				$content = '<span class="bambla_undefined_section">Section ['.$index.'] for `'.ucwords($name).' Page`  is undefined. ';
				$content.= '<a href="admin/sections/add/page:'.$name.'/index:'.$index.'">Click here to define it!</a></span>';
			} else {
				return false;	
			}
		}
		return $content;
	}
}