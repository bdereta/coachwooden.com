<?php
App::uses('Scrapbook', 'Model');

/**
 * Scrapbook Test Case
 *
 */
class ScrapbookTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.scrapbook'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Scrapbook = ClassRegistry::init('Scrapbook');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Scrapbook);

		parent::tearDown();
	}

}
