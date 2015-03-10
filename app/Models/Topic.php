<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/8
 * Time: 下午12:12
 */

namespace Clover\Models;

use Illuminate\Database\Eloquent\Model;

use Clover\Enumerations\TopicType;

class Topic extends Model {

    protected $table = 'topic';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $appends = ['author_name', 'like_count', 'comment_count'];

    /**
     * 自动将type解析为字符串
     * @return string
     */
    public function getTypeAttribute()
    {
        return TopicType::stringify($this->attributes['type']);
    }

    /**
     * 自动获取作者名
     * @return string
     */
    public function getAuthorNameAttribute()
    {
        return User::find($this->attributes['author'])->username;
    }

    /**
     * 自动统计出话题被喜欢次数
     * @return int
     */
    public function getLikeCountAttribute()
    {
        return Like::where('topic_id', $this->attributes['id'])->count();
    }

    /**
     * 自动统计出话题被评论次数
     * @return int
     */
    public function getCommentCountAttribute()
    {
        return Comment::where('topic_id', $this->attributes['id'])->count();
    }

} 