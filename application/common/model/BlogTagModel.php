<?php
/**
 * Created by PhpStorm.
 * User: Skyline
 * Date: 2018/4/1
 * Time: 0:33
 */
namespace app\common\model;

use think\Model;

class BlogTagModel extends Model
{
    protected $table = 'ice_blog_tag';

    public static function getTagIdByTagName($name) {
        $map['name'] = $name;
        return self::get($map);
    }

    public static function getAllTags($where,$limit = '') {
        return self::all(function($query) use ($where,$limit) {
            if ($limit) {
                $query->where($where)->order('sort desc')->limit($limit);
            } else {
                $query->where($where)->order('sort desc');
            }
        });
    }

    public static function addTagNum($id) {
        $model = new static();
        return $model->where('id', $id)->setInc('num');
    }

    public static function getCount($where) {
        return self::where($where)->count();
    }

    public static function addTag($data) {
        return self::create($data);
    }

    public static function getTagById($id) {
        return self::get($id);
    }

    public static function uploadTag($id,$data) {
        $map = $data;
        $map['id'] = $id;
        return self::update($map);
    }

    public static function delTagById($id) {
        return self::destroy($id);
    }
}