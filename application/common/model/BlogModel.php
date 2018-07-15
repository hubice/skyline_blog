<?php
/**
 * Created by PhpStorm.
 * User: Skyline
 * Date: 2018/4/1
 * Time: 0:33
 */
namespace app\common\model;

use think\Model;

class BlogModel extends Model
{
    protected $table = 'ice_blog';

    //select

    /**
     * 取名字
     * selectXxx 查找有用的就是有where
     * selectAllXxx 没 where
     *
     * where 1=1 limit 0 order
     * 以上可以合并在一起
     *
     * find
     * where
     *
     * 聚合
     * where
     *
     * 修改
     * 理论只能通过id修改
     * where data
     *
     * 添加
     * data
     *
     * 应该可以写一个脚本执行下就可以了
     */

    public static function getBlogList($limit) {
        return self::all(function ($query) use ($limit) {
            $map['s_status'] = 1; // 表示ok
            $query->where($map)->order('id desc')->limit($limit);
        });
    }

    public static function getAllTags($where,$limit) {
        return self::all(function($query) use ($where,$limit) {
            $query->where($where)->limit($limit);
        });
    }

    public static function getBlogsByIds($ids,$limit) {
        return self::all(function ($query) use ($ids,$limit) {
            $map['id'] = array('in',$ids);
            $map['s_status'] = 1;
            $query->where($map)->limit($limit);
        });
    }

    public static function getBlogHost($limit) {
        return self::all(function ($query) use ($limit) {
            $map['s_status'] = 1;
            $query->where($map)->order('page_view desc')->limit($limit);
        });
    }

    //find
    public static function getBlogById($id) {
        return self::get(function ($query) use ($id) {
            $map['s_status'] = 1;
            $map['id'] = $id;
            $query->where($map);
        });
    }

    public static function getAllBlogById($id) {
        return self::get(function ($query) use ($id) {
            $map['id'] = $id;
            $query->where($map);
        });
    }

    // 聚合
    public static function getCount($where) {
        return self::where($where)->count();
    }

    //修改
    public static function delById($id) {
        $map['s_status'] = 2;
        $map['id'] = $id;
        return self::update($map);
    }

    public static function incBlogView($id) {
        $model = new static();
        return $model->where('id', $id)->setInc('page_view');
    }

    public static function uploadBlog($id,$title,$s_status,$size,$seo) {
        $map['id'] = $id;
        $map['title'] = $title;
        $map['s_status'] = $s_status;
        $map['s_update_time'] = time();
        $map['size'] = $size;
        $map = array_merge($map,$seo);
        return self::update($map);
    }
    //添加
    public static function addBlog($data) {
        return self::create($data);
    }
}