<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/8
 * Time: 下午12:13
 */

namespace Clover\Http\Controllers;

use Request;
use Validator;

use UserAuth;
use Random;
use ReqLog;
use Clover\Exceptions\NotFoundException;
use Clover\Exceptions\InputException;
use Clover\Enumerations\TopicType;
use Clover\Models\Topic;
use Clover\Models\Like;

class TopicController extends Controller {

    public function __construct()
    {
        $this->middleware('userFilter');
    }

    /**
     * @get type
     */
    public function getList()
    {
        // TODO: Add more parameters
        $topics = Topic::where('type', TopicType::parse(Request::input('type')))->orderBy('created_at', 'desc')->get();
        return [
            'message' => '列出帖子成功',
            'topics' => $topics,
        ];
    }

    /**
     * @get id
     */
    public function getInfo()
    {
        $topic = Topic::find(intval(Request::input('id')));
        if (empty($topic)) {
            throw new NotFoundException('帖子不存在');
        }

        return [
            'message' => '获取信息成功',
            'topic' => $topic,
        ];
    }

    /**
     * @post title
     * @post content
     * @post type
     * @post [price]
     * @file [video]
     */
    public function postAdd()
    {
        $topic = new Topic();
        $topic->author = UserAuth::id();

        $topic->title = Request::input('title');
        if (empty($topic->title)) {
            throw new InputException('标题不得为空');
        }

        $topic->content = Request::input('content');
        if (empty($topic->content)) {
            throw new InputException('内容不得为空');
        }

        $topic->type = TopicType::parse(Request::input('type'));
        if ($topic->type === TopicType::VIDEO_STR) {
            if (!Request::hasFile('video')) {
                throw new InputException('视频不得为空');
            }

            $video = Request::file('video');
            $des_name = date('Y-m-d-H-i-s-') . Random::digitsAndLowercase();
            $topic->video = $des_name;
            // TODO: check type
            $topic->video_type = $video->getMimeType();
            $video->move('../storage/video/', $des_name);
            ReqLog::debug($topic->video_type);
        }

        $topic->price = intval(Request::input('price'));

        $topic->save();

        return [
            'message' => '添加帖子成功',
            'topic' => $topic,
        ];
    }

    /**
     * @post id
     */
    public function postLike()
    {
        $like = new Like();
        $like->user_id = UserAuth::id();

        $like->topic_id = intval(Request::input('id'));
        if (Validator::make(['key' => $like->topic_id], ['key' => 'exists:topic,id'])->fails()) {
            throw new NotFoundException('话题不存在');
        }

        // TODO: check for already like
        $like->save();

        return [
            'message' => '喜欢话题成功',
        ];
    }

    /**
     * @post id
     */
    public function postUnlike()
    {
        if (!Like::where('user_id', UserAuth::id())->where('topic_id', intval(Request::input('id')))->delete()) {
            throw new InputException('您没有喜欢此话题');
        }

        return [
            'message' => '取消喜欢话题成功',
        ];
    }

    /**
     * @post type
     */
    public function getListLike()
    {
        return [
            'message' => '列出喜欢的视频成功',
            'videos' => Like::listLikeTopic(UserAuth::id(), TopicType::VIDEO),
        ];
    }

} 