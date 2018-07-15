<?php

namespace app\common\server;

use app\common\model\BlogDataModel;
use app\common\model\BlogModel;
use app\common\model\BlogTagListModel;
use app\common\model\BlogTagModel;
use base\BaseServer;

class BlogServer extends BaseServer {

    /**
     * @return array
     * 获取全部的list
     */
    public static function getAllBlogList() {
        $res = BlogModel::getBlogList('0,100');
        return parent::toArray($res);
    }
    /**
     * 获取单条数据
     */
    public static function getBlogById($id) {
        $res = BlogModel::getBlogById($id);
        if (!$res) {
            self::$err = '标题没有数据';
            return false;
        }
        $data = BlogDataModel::getBlogDataById($id);
        if (!$data) {
            self::$err = '内容没有数据';
            return false;
        }
        $all = $res->toArray();
        $all['data'] = $data->toArray();
        return $all;
    }

    public static function getAllBlogById($id) {
        $res = BlogModel::getAllBlogById($id);
        if (!$res) {
            self::$err = '标题没有数据';
            return false;
        }
        $data = BlogDataModel::getBlogDataById($id);
        if (!$data) {
            self::$err = '内容没有数据';
            return false;
        }
        $all = $res->toArray();
        $all['data'] = $data->toArray();
        return $all;
    }

    /**
     * @param $name
     * @return array|bool
     * 通过tagName获取检索的数据
     */
    public static function getBlogByTagName($name) {
        $tag_id = BlogTagModel::getTagIdByTagName($name);
        if (!$tag_id) {
            self::$err = 'tag没有数据';
            return false;
        }
        $tag_id = $tag_id['id'];
        $b_ids = BlogTagListModel::getBlogIdsByTagId($tag_id);
        $tag_all = [];
        foreach ($b_ids as $v) {
            $tag_all[] = $v['b_id'];
        }
        if (empty($tag_all)) {
            self::$err = 'blog没有数据';
            return false;
        }
        $res = BlogModel::getBlogsByIds(implode(',',$tag_all),'0,100');
        return parent::toArray($res);
    }

    public static function delTagById($id) {
        return BlogModel::delById($id);
    }
    /**
     * 获取最热门的数据
     */
    public static function getBlogHost() {
        $res = BlogModel::getBlogHost('0,7');
        return parent::toArray($res);
    }

    public static function incBlogView($id) {
        return BlogModel::incBlogView($id);
    }

    public static function getAllBlogInfo($where,$limit) {
        $res['data'] = [];
        $res['other'] = BlogModel::getCount($where);
        if ($res['other']) {
            $bolgData = BlogModel::getAllTags($where,$limit);
            $res['data'] = parent::toArray($bolgData);
        }
        return $res;
    }

    public static function addBlog($param,$data) {
        $tags = $param['tag_str'];
        $map['id'] = array('in',$tags);
        $res = BlogTagModel::getAllTags($map);
        if (!$res) {
            self::$err = '数据错误';
            return false;
        }
        $tagStr = [];
        foreach ($res as $v) {
            $tagStr[] = $v['name'];
        }
        $param['tag_str'] = implode(',',$tagStr);
        $param['size'] = mb_strlen(strip_tags(htmlspecialchars_decode($data)));
        $param['s_create_time'] = time();
        $param['s_update_time'] = time();
        $res = BlogModel::addBlog($param);
        if ($res) {
            self::$err = '添加错误';
        }
        $resArr = $res->toArray();
        $id = $resArr['id'];
        //添加进去 不需要判断有没有成功
        BlogDataModel::addBlogData($id,$data);
        //添加到list中
        $tagsArr = explode(',',$tags);
        foreach ($tagsArr as $v) {
            BlogTagListModel::addBlogList($v,$id);
            BlogTagModel::addTagNum($v);
        }
        return $res;
    }

    public static function uploadBlog($id,$title,$s_status,$content,$seo) {
        $res = BlogModel::uploadBlog($id,$title,$s_status,mb_strlen(strip_tags($content)),$seo);
        if ($res) {
            BlogDataModel::uploadBlogData($id,$content);
        }
        return $res;
    }
}