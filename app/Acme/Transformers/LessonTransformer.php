<?php namespace Acme\Transformers;

class LessonTransformer extends Transformer {

    public function transform($lesson)
    {
        return [
            'title' => $lesson['title'],
            'body' => $lesson['body'],
            'completed' => (boolean) $lesson['completed']
        ];
    }
}