<?php
class Testmigration extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'testmigration';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
		),
		'down' => array(
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		$post = ClassRegistry::init('Post');
		if ($direction === 'up') {

			/*for($i = 0; $i < 2000; $i++ ) {
				$data['Post'][]['title'] = $this->generateRandomString(20);
			}

			$post->create();
	        if ($post->saveAll($data)) {
	            $this->callback->out('Posts table has been initialized');
	        }*/

			for($i = 0; $i < 2000; $i++ ) {
				$post->create();
				$data['Post']['title'] = $this->generateRandomString(20);
				$data['Post']['body'] = $this->generateRandomString(100);
				$data['Post']['user_id'] = 1;
				$post->save($data);
			}
		} elseif ($direction === 'down') {
			// do more work here
		}
		return true;
	}
	
	function generateRandomString($length = 10) {
		$characters = ' abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}
