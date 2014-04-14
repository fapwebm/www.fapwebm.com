<?php

use Carbon\Carbon;

class ChanApi {
	public
		$basePath = 'http://a.4cdn.org/',
		$offset = 0, 
		$length = 25,
		$board = 'gif',
		$threads, $posts;

	public function getPosts($term = ' ') {
		$key = $this->board . $term;
		// Cache::forget($key);

		if (!($this->posts = Cache::get($key))):
			self::getThreads($term)->filter();
			Cache::put($key, $this->posts, Carbon::now()->addMinutes(15));
		endif;

		return array_slice($this->posts, $this->offset, $this->length);
	}

	public function getThreads($term) {
		$this->threads = [];
		$catalog = self::getJson(self::getCatalogUrl());

		foreach ($catalog AS $page):
			foreach ($page->threads AS $thread):
				if (
					(
						self::findText($thread, 'ext', '.webm')
						|| self::findText($thread, 'sub', 'webm')
						|| self::findText($thread, 'com', 'webm')
					)

					&& (
						self::findText($thread, 'sub', $term)
						|| self::findText($thread, 'com', $term)
					)
				) array_push($this->threads, $thread);
			endforeach;
		endforeach;

		return $this;
	}

	public function filter() {
		$this->posts = [];

		if (!empty($this->threads)):
			foreach ($this->threads AS $thread):
				$posts = self::getJson(self::getThreadUri($thread->no))->posts;

				foreach ($posts AS $post):
					if (self::findText($post, 'ext', '.webm')):
						$post->src = "//i.4cdn.org/{$this->board}/src/{$post->tim}.webm";
						$post->thumb = "//t.4cdn.org/{$this->board}/thumb/{$post->tim}s.jpg";
						$post->url = "//boards.4chan.org/{$this->board}/res/{$post->resto}#p{$post->no}";
						
						array_push($this->posts, $post);
					endif;
				endforeach;
			endforeach;
		endif;

		if (empty($this->posts))
			$this->posts = ['error' => 'No webm files found for this board.'];

		return $this;
	}

	// --

	private function getCatalogUrl() {
		return "{$this->basePath}/{$this->board}/catalog.json";
	}

	private function getThreadUri($thread) {
		return "{$this->basePath}/{$this->board}/res/{$thread}.json";
	}

	private function getJson($url) {
		return json_decode(file_get_contents($url));
	}

	private function findText($obj, $method, $text) {
		if (!isset($obj->{$method})) return false;

		preg_match("/{$text}/i", $obj->{$method}, $result);
		return !empty($result);
	}
}