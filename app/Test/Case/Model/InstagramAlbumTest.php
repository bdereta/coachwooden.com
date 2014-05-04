<?php
App::uses('InstagramAlbum', 'Model');

/**
 * InstagramAlbum Test Case
 *
 */
class InstagramAlbumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.instagram_album'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InstagramAlbum = ClassRegistry::init('InstagramAlbum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InstagramAlbum);

		parent::tearDown();
	}

}
