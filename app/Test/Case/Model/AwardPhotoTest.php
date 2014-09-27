<?php
App::uses('AwardPhoto', 'Model');

/**
 * AwardPhoto Test Case
 *
 */
class AwardPhotoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.award_photo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AwardPhoto = ClassRegistry::init('AwardPhoto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AwardPhoto);

		parent::tearDown();
	}

}
