<?php
App::uses('Cigar', 'Model');

/**
 * Cigar Test Case
 *
 */
class CigarTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cigar'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cigar = ClassRegistry::init('Cigar');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cigar);

		parent::tearDown();
	}

}
