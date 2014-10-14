<?php
App::uses('Homeslide', 'Model');

/**
 * Homeslide Test Case
 *
 */
class HomeslideTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.homeslide'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Homeslide = ClassRegistry::init('Homeslide');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Homeslide);

		parent::tearDown();
	}

}
