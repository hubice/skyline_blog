<?php
/**
 * Created by PhpStorm.
 * User: Skyline
 * Date: 2018/4/4
 * Time: 1:48
 */
namespace app\admin\controller;

use app\common\server\BlogServer;
use app\common\server\TagServer;
use base\BaseAdminController;

class Blog extends BaseAdminController {

    public function upload() {

        $file = request()->file('file');
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                $url = '/uploads/'.$info->getSaveName();
                return json(array(
                    'code' => 0,
                    'msg' => 'ok',
                    'data' => array(
                        'src' => $url
                    )
                ));
            }else{
                // 上传失败获取错误信息
                return json(array(
                    'code' => 1,
                    'msg' => $file->getError(),
                ));
            }
        }
    }

    public function index() {
        $page = input('param.page',1,'int');
        $step = input('param.step',20,'int');
        $limit = (($page - 1) * $step).','.$step;

        $where = '0 = 0';
        $blog = BlogServer::getAllBlogInfo($where,$limit);

        $page = $this->page($blog['other'],$page,$step,5); //这是分页
        $this->assign('blog',$blog);
        $this->assign('page',$page);

        return $this->fetch();
    }

    public function index_add() {
        $map = '0 = 0';
        $tags = TagServer::getAllTag($map);
        $this->assign('tags',$tags);
        return $this->fetch('blog/index_add');
    }

    public function index_add_http() {
        $param = input('post.');
        $data = $param['content'];
        unset($param['content']);
        $res = BlogServer::addBlog($param,$data);
        if (empty($res)) {
            return jsons([],'1001',TagServer::$err);
        }
        return jsons($res);
    }

    public function index_delete() {
        $id = input('param.id',1,'int');
        $res = BlogServer::delTagById($id);
        if (empty($res)) {
            return jsons([],'1001',TagServer::$err);
        }
        return jsons($res);
    }

    public function index_upload() {
        $id = input('param.id',1,'int');

        $map = '0 = 0';
        $tags = TagServer::getAllTag($map);
        $this->assign('tags',$tags);

        $log = BlogServer::getAllBlogById($id);
        $this->assign('log',$log);
        return $this->fetch('blog/index_upload');
    }

    public function index_upload_http() {
        $id = input('post.id',0,'intval');
        $title = input('post.title','','trim');
        $content = input('post.content','','trim');
        $s_status = input('post.s_status') ? 1 : 2;
        $seo = array(
            'seo_title' => input('post.seo_title','','trim'),
            'seo_keywords' => input('post.seo_keywords','','trim'),
            'seo_description' => input('post.seo_description','','trim'),
        );
        $res = BlogServer::uploadBlog($id,$title,$s_status,$content,$seo);
        if (empty($res)) {
            return jsons([],'1001',TagServer::$err);
        }
        return jsons($res);
    }

    public function tag() {
        $page = input('param.page',1,'int');
        $step = input('param.step',20,'int');
        $limit = (($page - 1) * $step).','.$step;

        $where = '0 = 0';
        $tags = TagServer::getAllTagInfo($where,$limit);

        $page = $this->page($tags['other'],$page,$step,5); //这是分页
        $this->assign('tags',$tags);
        $this->assign('page',$page);
        return $this->fetch();
    }

    public function tag_add() {
        return $this->fetch('blog/tag_add');
    }

    public function tag_upload() {
        $id = input('param.id',1,'int');
        $tag = TagServer::getTagById($id);
        $this->assign('tag',$tag);
        return $this->fetch('blog/tag_upload');
    }

    public function tag_add_http() {
        $param = input('post.');
        // 应该验证下的，这里不是前台的就算了。
        $res = TagServer::addTag($param);
        if (empty($res)) {
            return jsons([],'1001',TagServer::$err);
        }
        return jsons($res);
    }

    public function tag_upload_http() {
        $param = input('post.');
        $id = intval($param['id']);
        unset($param['id']);
        // 应该验证下的，这里不是前台的就算了。
        $res = TagServer::uploadTag($id,$param);
        if (empty($res)) {
            return jsons([],'1001',TagServer::$err);
        }
        return jsons($res);
    }

    public function tag_delete() {
        $id = input('param.id',1,'int');
        $res = TagServer::delTagById($id);
        if (empty($res)) {
            return jsons([],'1001',TagServer::$err);
        }
        return jsons($res);
    }
}