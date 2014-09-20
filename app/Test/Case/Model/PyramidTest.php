<?php
App::uses('Pyramid', 'Model');

/**
 * Pyramid Test Case
 *
 */
class PyramidTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pyramid'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pyramid = ClassRegistry::init('Pyramid');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pyramid);

		parent::tearDown();
	}

}
