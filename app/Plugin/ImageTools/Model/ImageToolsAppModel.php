<?php

App::uses('AppModel', 'Model');

class ImageToolsAppModel extends AppModel {

	public $useTable = false;
	
	public function upload($params) {
		foreach($params['requestData'] as $label=>$value) {
			//extract image files
			if (isset($value['size']) && is_int($value['size']) && $value['size'] > 0) {
				$filename = $this->moveImage($value);
				if (!empty($filename)) {
					$data[$label] = $filename;
				} 
			} else {
				$data[$label] = $value;	
			}
		}
		return $data;
	}
	
	public function moveImage($data=NULL) {
		// Define a destination
		$targetFolder = "img/uploads"; // Relative to the root		
		$upload = array();
		if (!empty($data)) {
			$tempFile = $data['tmp_name'];
			$targetPath = $targetFolder;
			$ext = pathinfo($data['name'], PATHINFO_EXTENSION);
			$new_name	= uniqid() . '.' . $ext;
			$targetFile = rtrim($targetPath,'/') . '/' . $new_name;
			if (@move_uploaded_file($tempFile,$targetFile)) {
				return $new_name;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	public function processImages($data) {
		foreach($data['uploadImages'] as $label => $info) {
			foreach($info as $action => $value) {
				//check if any image should be duplicated
				if ($action == 'source') {
					$copied_filename = $this->copyImage($data['uploadedData'][$value]);
					if ($copied_filename) {
						$data['uploadedData'][$label] = $copied_filename;	
					}
				}
				//resize images
				if ($action == 'resize') {
					$this->resizeImage($data['uploadedData'][$label], $value);
				}	
				//prepare crop params
				if ($action == 'crop') {
					$data['crop'][$label]['filename'] = $data['uploadedData'][$label];
					foreach($value as $property => $val) {
						$data['crop'][$label][$property] = $val;
					}
				}		
			}
		}
		return $data;		
	}

	public function cropImage(array $data=NULL) {
		$source = 'img/uploads/'.$data['ImageTool']["filename"];
		$x1 = !empty($data['ImageTool']["x1"]) ? $data['ImageTool']["x1"] : 0;
		$y1 = !empty($data['ImageTool']["y1"]) ? $data['ImageTool']["y1"] : 0;
		$w = !empty($data['ImageTool']["w"]) ? $data['ImageTool']["w"] : $data['ImageTool']["width"];
		$h = !empty($data['ImageTool']["h"]) ? $data['ImageTool']["h"] : $data['ImageTool']["height"];
		$width = $data['ImageTool']["width"];
		$height = $data['ImageTool']["height"];		
		$scale = $width/$w;
		$cropped = $this->cropIt($destination=$source,$source,$w,$h,$x1,$y1,$scale);
		return true;
	}
	
	public function resizeImage($filename, array $dimensions=NULL) {
		$image['path'] = 'img/uploads/'.$filename;
		$image['max_width'] = isset($dimensions['width']) ? $dimensions['width'] : false; 
		$image['max_height'] = isset($dimensions['height']) ? $dimensions['height'] : false; 
		$image['info'] = getimagesize($image['path']);
		$image['orientation'] = ($image['info'][0] > $image['info'][1]) ? 'landscape' : 'portrait';
		if ($image['orientation'] == 'landscape') {
			//if max width is set and the original width is larger than max width
			if ($image['max_width'] && $image['info'][0] > $image['max_width']) {
				$image['ratio'] = $image['info'][0] / $image['info'][1];
				$image['final_width'] = $image['max_width'];
				$image['final_height'] = ceil($image['max_width'] / $image['ratio']);
				$this->resampleImage($image);
				
				//check if max_height is set and if the new image is bigger than max height
				$image['info'] = getimagesize($image['path']);
				if ($image['max_height'] && $image['info'][1] > $image['max_height']) {
					$image['ratio'] = $image['info'][1] / $image['info'][0];
					$image['final_width'] = ceil($image['max_height'] / $image['ratio']);
					$image['final_height'] = $image['max_height'];
					$this->resampleImage($image);
				}				
			}
		} else {
			//if max height is set and the original height is larger than max height
			if ($image['max_height'] && $image['info'][1] > $image['max_height']) {
				$image['ratio'] = $image['info'][1] / $image['info'][0];
				$image['final_width'] = ceil($image['max_height'] / $image['ratio']);
				$image['final_height'] = $image['max_height'];
				$this->resampleImage($image);
				
				//if max width is set and the original width is larger than max width
				$image['info'] = getimagesize($image['path']);
				if ($image['max_width'] && $image['info'][0] > $image['max_width']) {
					$image['ratio'] = $image['info'][0] / $image['info'][1];
					$image['final_width'] = $image['max_width'];
					$image['final_height'] = ceil($image['max_width'] / $image['ratio']);
					$this->resampleImage($image);
				}				
			}
		}
		return true;
	}
	
	public function copyImage($source) {
		$path = 'img/uploads/';
		$filename = pathinfo($source, PATHINFO_FILENAME);
		$ext = pathinfo($source, PATHINFO_EXTENSION);
		$target = $filename . '_cp.'. $ext;
		if (@copy($path.$source, $path.$target)) {
			return $target;
		} else {
			return false;	
		}
	}

	public function resampleImage($image) {
		
		$newImage = imagecreatetruecolor($image['final_width'],$image['final_height']);
		switch($image['info']['mime']) {
			case "image/gif":
				$source=imagecreatefromgif($image['path']); 
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($image['path']); 
				break;
			case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($image['path']); 
				break;
		}
		imagecopyresampled($newImage,$source,0,0,0,0,$image['final_width'],$image['final_height'],$image['info'][0],$image['info'][1]);
		switch($image['info']['mime']) {
			case "image/gif":
				imagegif($newImage,$image['path']); 
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				imagejpeg($newImage,$image['path'],100); 
				break;
			case "image/png":
			case "image/x-png":
				imagepng($newImage,$image['path']);  
				break;
		}
		return $image['path'];
	}
	
	private function cropIt($destination, $source, $width, $height, $start_width, $start_height, $scale){
		list($imagewidth, $imageheight, $imageType) = getimagesize($source);
		$imageType = image_type_to_mime_type($imageType);
		
		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		switch($imageType) {
			case "image/gif":
				$source=imagecreatefromgif($source); 
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($source); 
				break;
			case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($source); 
				break;
		}
		imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
		switch($imageType) {
			case "image/gif":
				imagegif($newImage,$destination); 
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				imagejpeg($newImage,$destination,100); 
				break;
			case "image/png":
			case "image/x-png":
				imagepng($newImage,$destination);  
				break;
		}
		return $destination;
	}

}
