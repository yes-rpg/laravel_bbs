<?php

namespace App\Observers;

use App\Models\Topic;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function saving(Topic $topic)
    {
        $topic->body = clean($topic->body,'user_topic_body');
//            $topic->body = $topic->body.'这是事件监听添加得内容';
        $topic->excerpt = make_excerpt($topic->body);
    }
}
