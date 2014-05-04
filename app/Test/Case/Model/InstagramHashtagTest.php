<?php
App::uses('InstagramHashtag', 'Model');

/**
 * InstagramHashtag Test Case
 *
 */
class InstagramHashtagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.instagram_hashtag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InstagramHashtag = ClassRegistry::init('InstagramHashtag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InstagramHashtag);

		parent::tearDown();
	}

}
