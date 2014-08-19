<?php

class BamblaHelper extends AppHelper {	

	public $helpers = array('Form','Html');
	
	public function FetchSection($index, array $options = NULL) {	
		//capture view variables
		$is_admin 	= $this->_View->viewVars['is_admin'];
		$section 	= $this->_View->viewVars['section'];
		$page_name	= (isset($options['page_name']) && !empty($options['page_name'])) 
			? $options['page_name'] //pass a page name
			: $this->request->params['action']; //use current page
			
		//returns section only if it exists in the database
		if (isset($section[$page_name][$index])) {
			$edit = '<p>'.$this->Html->link('Edit', array('controller' => 'sections', 'action' => 'edit', $section[$page_name][$index]['id'], 'admin' => true), array('class'=>'bambla_edit_button')).'</p>';
			if ($is_admin) {
				if ($section[$page_name][$index]['content'] == '') {
					$content = '<div class="bambla_empty_section">
						 <b>This is a courtesy notice and it\'s only visible to logged in CMS administrators:</b>
						 Section ['.$index.'] for `'.ucwords($page_name).' Page` is currently empty. 
						 You may leave it empty or request your web developer to remove it from the page. 
						 You may also edit this section by clicking the EDIT button under it. 
						 This notice is only visible to logged in Administrators. The end users will not see this notice.</div>';
				} else {					
					$content = $section[$page_name][$index]['content'];
				}
				$content.= $edit;
			} else {
				$content = $section[$page_name][$index]['content'];	
			}
		} else {
			//otherwise allow admin to link directly to wysiwyg editor in order to edit the section
			if ($is_admin) {
				$content = '<span class="bambla_undefined_section">Section ['.$index.'] for `'.ucwords($page_name).' Page`  is undefined. ';
				$content.= '<a href="admin/sections/add/page:'.$page_name.'/index:'.$index.'">Click here to define it!</a></span>';
			} else {
				return false;	
			}
		}
		return $content;
	}
}