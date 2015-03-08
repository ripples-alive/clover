<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/8
 * Time: 下午12:13
 */

namespace Clover\Http\Controllers;

use Request;

use UserAuth;
use Clover\Exceptions\NotFoundException;
use Clover\Exceptions\InputException;
use Clover\Enumerations\TopicType;
use Clover\Models\Topic;

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
        if ($topic->type === TopicType::VIDEO) {
            if (!Request::hasFile('video')) {
                throw new InputException('视频不得为空');
            }

            $video = Request::file('video');
            $file_type = $video->getMimeType();
            // TODO: check type
            // TODO: permanently save file
            $topic->video = $file_type;
        }

        $topic->price = intval(Request::input('price'));

        $topic->save();

        return [
            'message' => '添加帖子成功',
            'topic' => $topic,
        ];
    }

} 