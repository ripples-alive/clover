<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/8
 * Time: 下午12:17
 */

namespace Clover\Http\Controllers;

use Request;
use Validator;

use UserAuth;
use Clover\Exceptions\NotFoundException;
use Clover\Exceptions\InputException;
use Clover\Models\Comment;

class CommentController extends Controller {

    public function __construct()
    {
        $this->middleware('userFilter');
    }

    /**
     * @topic_id
     */
    public function getList()
    {
        // TODO: add more parameters
        $comments = Comment::where('topic_id', intval(Request::input('topic_id')))->orderBy('created_at')->get();

        return [
            'message' => '列出评论成功',
            'comments' => $comments,
        ];
    }

    /**
     * @topic_id
     * @[reply_to]
     * @content
     */
    public function postAdd()
    {
        $comment = new Comment();
        $comment->author = UserAuth::id();

        $comment->topic_id = intval(Request::input('topic_id'));
        if (Validator::make(['key' => $comment->topic_id], ['key' => 'exists:topic,id'])->fails()) {
            throw new NotFoundException('话题不存在');
        }

        $reply_to = Request::input('reply_to');
        if (!empty($reply_to)) {
            $comment->reply_to = intval($reply_to);
            if (Validator::make(['key' => $comment->reply_to], ['key' => 'exists:comment,id'])->fails()) {
                throw new NotFoundException('回复的评论不存在');
            }
        }

        $comment->content = Request::input('content');
        if (empty($comment->content)) {
            throw new InputException('评论内容不得为空');
        }

        $comment->save();

        return [
            'message' => '评论成功',
            'comment' => $comment,
        ];
    }

} 