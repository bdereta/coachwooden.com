<?php

class ImageToolsHelper extends AppHelper {	

	public $helpers = array('Form','Html');

	public function uploadImages($params = array(), $output = null) {
		if (!empty($params['uploadImages'])) {
			foreach($params['uploadImages'] as $fieldname=>$options){
				$input_options = array('type'=>'file');
				$input_options['label'] = 'Upload ';
				$input_options['label'] .= !empty($options['label']) ? $options['label'] : NULL;
				if (!empty($options['multiple'])) { 
					$input_options['multiple'] = true;
					$fieldname = $fieldname.".";
				}
				if (empty($options['source'])) {
					//display existing image
					if (!empty($params['model'])) { 
						if (isset($this->request->data[$params['model']][$fieldname]) && !empty($this->request->data[$params['model']][$fieldname])) {
							$output.= '<div class="input text"><label for="Preview">Current Image</label>';			
							$output.= $this->Html->Image('uploads/'.$this->request->data[$params['model']][$fieldname], array('width' => 200));
							$output.= '</div>';
						}
					}
					$output.= $this->Form->input($fieldname, $input_options);
				}
			}
		}
		return $output;
	}
}