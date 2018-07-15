<?php
/**
 * Created by PhpStorm.
 * User: Skyline
 * Date: 2018/4/4
 * Time: 23:11
 */
namespace app\common\server;

use app\common\model\BlogDataModel;
use app\common\model\BlogModel;
use app\common\model\BlogTagListModel;
use app\common\model\BlogTagModel;
use base\BaseServer;

class TagServer extends BaseServer {

    public static function getAllTagInfo($where,$limit) {
        $res['data'] = [];
        $res['other'] = BlogTagModel::getCount($where);
        if ($res['other']) {
            $bolgData = BlogTagModel::getAllTags($where,$limit);
            $res['data'] = parent::toArray($bolgData);
        }
        return $res;
    }

    public static function getAllTag($where,$limit = '') {
        $bolg = BlogTagModel::getAllTags($where,$limit);
        return parent::toArray($bolg);
    }

    public static function addTag($data) {
        $name = $data['name'];
        if (BlogTagModel::getCount(array('name' => $name))) {
            self::$err = '重复数据';
            return false;
        }
        return BlogTagModel::addTag($data);
    }

    public static function getTagById($id) {
        $res = BlogTagModel::getTagById($id);
        if (!$res) {
            self::$err = '数据为空';
            return false;
        }
        return $res->toArray();
    }

    public static function uploadTag($id,$data) {
        $res = BlogTagModel::uploadTag($id,$data);
        if (!$res) {
            self::$err = '数据为空';
            return false;
        }
        return $res->toArray();
    }

    public static function delTagById($id) {
        $map['tag_id'] = $id;
        $num = BlogTagListModel::getCount($map);
        if ($num) {
            self::$err = '有和它相关连的blog,不能删除';
            return false;
        }
        return BlogTagModel::delTagById($id);
    }
}