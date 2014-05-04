<?php
App::uses('AlbumsPhoto', 'Model');

/**
 * AlbumsPhoto Test Case
 *
 */
class AlbumsPhotoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.albums_photo',
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
		$this->AlbumsPhoto = ClassRegistry::init('AlbumsPhoto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AlbumsPhoto);

		parent::tearDown();
	}

}
