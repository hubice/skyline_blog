<?php
/**
 * Created by PhpStorm.
 * User: Skyline
 * Date: 2018/4/1
 * Time: 0:33
 */
namespace app\common\model;

use think\Model;

class BlogTagListModel extends Model
{
    protected $table = 'ice_blog_tag_list';

    public static function getBlogIdsByTagId($id) {
        $map['tag_id'] = $id;
        return self::all($map);
    }

    public static function getCount($where) {
        return self::where($where)->count();
    }

    public static function addBlogList($tag_id,$b_id) {
        $map['b_id'] = $b_id;
        $map['tag_id'] = $tag_id;
        return self::create($map);
    }
}