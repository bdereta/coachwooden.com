<?php
App::uses('InstagramPhotosToAlbum', 'Model');

/**
 * InstagramPhotosToAlbum Test Case
 *
 */
class InstagramPhotosToAlbumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.instagram_photos_to_album',
		'app.album',
		'app.photo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InstagramPhotosToAlbum = ClassRegistry::init('InstagramPhotosToAlbum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InstagramPhotosToAlbum);

		parent::tearDown();
	}

}
