<?php

App::uses('AppModel', 'Model');

class JASFinder extends BamblaAppModel {

	public function get_folder_contents() {
		
		$files 			= array();
		$base_url 		= Configure::read('JASFinder.baseURL');
		$uploads_folder = Configure::read('JASFinder.browseFolder');
		$relative_path	= '../webroot'.$uploads_folder;
		
		if ($handle = opendir($relative_path)) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry != "." && $entry != "..") {
					$filesize = ceil(filesize($relative_path.$entry)/1024);
					$files[] = array('@name' => $entry, '@size' => $filesize);
				}
			}
			closedir($handle);
		}
		
		$xmlArray = array(
			'Connector' => array(
				'@command' => 'GetFoldersAndFiles',
				'@resourceType' => 'File',
				'CurrentFolder' => array(
					'@path' => $base_url,
					'@url' => $uploads_folder
				),
				'Files' => array(
					'File' => $files			
				),	
			),		
		);
		
		
		return $xmlArray;
		
		
	}

}
