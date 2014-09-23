<?php
App::uses('QuoteCategory', 'Model');

/**
 * QuoteCategory Test Case
 *
 */
class QuoteCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.quote_category',
		'app.quote'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->QuoteCategory = ClassRegistry::init('QuoteCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QuoteCategory);

		parent::tearDown();
	}

}
