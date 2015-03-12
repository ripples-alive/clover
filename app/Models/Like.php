<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/9
 * Time: 下午10:30
 */

namespace Clover\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model {

    protected $table = 'like';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function listLikeTopic($user_id, $type)
    {
//        return self::join('topic', 'topic_id', '=', 'topic.id')->where('user_id', $user_id)
//            ->where('type', $type)->select(['topic.id', 'title', 'content', 'video', 'video_type', 'price',
//                'topic.created_at', 'topic.updated_at'])->orderBy('like.created_at', 'desc')->get();
        // Just temporary
        $topic_ids = self::where('user_id', $user_id)->orderBy('created_at', 'desc')->lists('topic_id');
        return Topic::whereIn('id', $topic_ids)->where('type', $type)->get();
    }

} 