<?php
App::uses('InstagramPhoto', 'Model');

/**
 * InstagramPhoto Test Case
 *
 */
class InstagramPhotoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.instagram_photo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InstagramPhoto = ClassRegistry::init('InstagramPhoto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InstagramPhoto);

		parent::tearDown();
	}

}
