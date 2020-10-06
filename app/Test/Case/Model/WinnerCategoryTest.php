<?php
App::uses('WinnerCategory', 'Model');

/**
 * WinnerCategory Test Case
 *
 */
class WinnerCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.winner_category',
		'app.winner'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WinnerCategory = ClassRegistry::init('WinnerCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WinnerCategory);

		parent::tearDown();
	}

}
