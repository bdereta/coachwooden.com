<?php
App::uses('Instagram', 'Model');

/**
 * Instagram Test Case
 *
 */
class InstagramTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.instagram'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Instagram = ClassRegistry::init('Instagram');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Instagram);

		parent::tearDown();
	}

}
