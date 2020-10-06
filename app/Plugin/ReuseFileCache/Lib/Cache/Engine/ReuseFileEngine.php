<?php

class ReuseFileEngine extends FileEngine {
	
	public function write($key, $data, $duration) {
		if ($data === '' || !$this->_init) {
			return false;
		}

		if ($this->_setKey($key, true) === false) {
			return false;
		}

		$lineBreak = "\n";

		if ($this->settings['isWindows']) {
			$lineBreak = "\r\n";
		}

		if (!empty($this->settings['serialize'])) {
			if ($this->settings['isWindows']) {
				$data = str_replace('\\', '\\\\\\\\', serialize($data));
			} else {
				$data = serialize($data);
			}
		}

		$created = time();
		$contents = $created . $lineBreak . $data . $lineBreak;
		
		if ($this->settings['lock']) {
			$this->_File->flock(LOCK_EX);
		}

		$this->_File->rewind();
		$success = $this->_File->ftruncate(0) && $this->_File->fwrite($contents) && $this->_File->fflush();

		if ($this->settings['lock']) {
			$this->_File->flock(LOCK_UN);
		}

		return $success;
	}

	public function read($key) {
		if (!$this->_init || $this->_setKey($key) === false) {
			return false;
		}

		if ($this->settings['lock']) {
			$this->_File->flock(LOCK_SH);
		}

		$this->_File->rewind();
		$time = time();
		
		$cachecreated = intval($this->_File->current());
		if ($cachecreated !== false && $this->settings['duration'] < ($time - $cachecreated)) {
			if ($this->settings['lock']) {
				$this->_File->flock(LOCK_UN);
			}
			return false;
		}


		$data = '';
		$this->_File->next();
		while ($this->_File->valid()) {
			$data .= $this->_File->current();
			$this->_File->next();
		}

		if ($this->settings['lock']) {
			$this->_File->flock(LOCK_UN);
		}

		$data = trim($data);

		if ($data !== '' && !empty($this->settings['serialize'])) {
			if ($this->settings['isWindows']) {
				$data = str_replace('\\\\\\\\', '\\', $data);
			}
			$data = unserialize((string)$data);
		}
		return $data;
	}
}
