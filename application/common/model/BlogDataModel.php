<?php
/**
 * Created by PhpStorm.
 * User: Skyline
 * Date: 2018/4/1
 * Time: 0:33
 */
namespace app\common\model;

use think\Model;

class BlogDataModel extends Model
{
    protected $table = 'ice_blog_data';

    public static function getBlogDataById($id) {
        return self::get(function ($query) use ($id) {
            $map['b_id'] = $id;
            $query->where($map);
        });
    }

    public static function addBlogData($bid,$content) {
        $map['b_id'] = $bid;
        $map['content'] = $content;
        return self::create($map);
    }

    public static function uploadBlogData($b_id,$content) {
        $where['b_id'] = $b_id;
        $map['content'] = $content;
        return self::where($where)->update($map);
    }
}