<?php
App::uses('ShareMemory', 'Model');

/**
 * ShareMemory Test Case
 *
 */
class ShareMemoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.share_memory'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ShareMemory = ClassRegistry::init('ShareMemory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ShareMemory);

		parent::tearDown();
	}

}
