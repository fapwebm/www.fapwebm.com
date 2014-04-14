<?php
class VideoController extends BaseController {
	protected $chanApi;

	public function __construct(ChanApi $chan) {
		$this->chanApi =& $chan;
		
		if ($board = Request::segment(1))
			$this->chanApi->board = $board;
	}

	public function index() {
		return View::make('videos.index', ['board' => $this->chanApi->board]);
	}

	public function page($board, $page = 0) {
		$this->chanApi->offset = ($page - 1) * ($this->chanApi->length + 1);

		if (Request::ajax())
			return Response::json($this->chanApi->getPosts());

		else return Redirect::to('/');
	}

	public function search($board, $term) {
		$this->chanApi->length = 9999;

		if (Request::ajax())
			return Response::json($this->chanApi->getPosts($term));

		else return Redirect::to('/');
	}
}