<?php

use Acme\Transformers\TagTransformer;

class TagsController extends ApiController {

	/**
	 * @var Acme\Transformers\TagTransformer
	 */
	protected $tagTransformer;

	public function __construct(TagTransformer $tagTransformer)
	{
		$this->tagTransformer = $tagTransformer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param null $lessonId
	 * @return Response
	 */
	public function index($lessonId = null)
	{
		$tags = $this->getTags($lessonId);

		return $this->respond([
			'data' => $this->tagTransformer->transformCollection($tags->all())
		]);
	}

	/**
	 * @param $lessonId
	 * @return mixed
	 */
	private function getTags($lessonId)
	{
		return $lessonId ? Lesson::findOrFail($lessonId)->tags : Tag::all();
	}
}
