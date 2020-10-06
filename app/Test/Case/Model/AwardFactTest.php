<?php
App::uses('AwardFact', 'Model');

/**
 * AwardFact Test Case
 *
 */
class AwardFactTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.award_fact'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AwardFact = ClassRegistry::init('AwardFact');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AwardFact);

		parent::tearDown();
	}

}
