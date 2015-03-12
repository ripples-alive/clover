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

    protected $appends = ['author_name', 'like_count', 'comment_count', 'like_it'];

    /**
     * 自动将type解析为字符串
     * @return string
     */
    public function getTypeAttribute()
    {
        return TopicType::stringify($this->attributes['type']);
    }

    /**
     * 自动将video的视频修改为下载地址
     * @return mixed
     */
    public function getVideoAttribute()
    {
        if ($this->attributes['video']) {
            return "http://{$_SERVER['HTTP_HOST']}/static/video?name={$this->attributes['video']}";
        }
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

    /**
     * 自动判断出当前用户是否喜欢了此话题
     * @return bool
     */
    public function getLikeItAttribute()
    {
        $like = Like::where('topic_id', $this->attributes['id'])->where('user_id', \UserAuth::id())->first();
        return !empty($like);
    }

} 