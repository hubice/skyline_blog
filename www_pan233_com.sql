/*
Navicat MySQL Data Transfer

Source Server         : www_pan233_com
Source Server Version : 50719
Source Host           : 118.25.50.31:3306
Source Database       : www_pan233_com

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-07-15 23:00:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ice_blog
-- ----------------------------
DROP TABLE IF EXISTS `ice_blog`;
CREATE TABLE `ice_blog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '名称',
  `size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '大小',
  `page_view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `tag_str` varchar(255) NOT NULL DEFAULT '' COMMENT '标签名称',
  `seo_title` varchar(255) NOT NULL DEFAULT '',
  `seo_description` varchar(255) NOT NULL DEFAULT '',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '',
  `s_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 ok',
  `s_create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `s_update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ice_blog
-- ----------------------------
INSERT INTO `ice_blog` VALUES ('2', '友链页', '40', '51', '系统', '友链', '友链', '友链', '1', '1528425636', '1528425738');
INSERT INTO `ice_blog` VALUES ('100', '错误传输方式', '1552', '81', 'PHP回炉', '错误传输方式', '错误传输方式', '错误传输方式', '1', '1528169241', '1528170737');

-- ----------------------------
-- Table structure for ice_blog_data
-- ----------------------------
DROP TABLE IF EXISTS `ice_blog_data`;
CREATE TABLE `ice_blog_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `b_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '博客id',
  `content` text COMMENT '博客内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='博客内容表';

-- ----------------------------
-- Records of ice_blog_data
-- ----------------------------
INSERT INTO `ice_blog_data` VALUES ('1', '100', '<p data-source-line=\"1\">博客<span class=\"Apple-converted-space\">&nbsp;</span><a href=\"https://blog.csdn.net/dylgsy/article/details/946056\">https://blog.csdn.net/dylgsy/article/details/946056</a></p><h3 id=\"1返回值判断\" data-source-line=\"3\"><a class=\"markdownIt-Anchor\" href=\"file:///C:/Users/Administrator.USER-20170705WQ/AppData/Local/Youdao/YNote/markdown/index.html#1%E8%BF%94%E5%9B%9E%E5%80%BC%E5%88%A4%E6%96%AD\"></a>1.返回值判断</h3><p data-source-line=\"5\"><em>代表是C语言</em></p><table data-source-line=\"7\" class=\"layui-table\"><thead><tr><th>优点</th><th>缺点</th></tr></thead><tbody><tr><td>代码简单,过程化程序</td><td>处理错误繁琐，而且不能确保调用者进行处理，或则遗漏处理</td></tr></tbody></table><h5 id=\"实例\" data-source-line=\"11\"><a class=\"markdownIt-Anchor\" href=\"file:///C:/Users/Administrator.USER-20170705WQ/AppData/Local/Youdao/YNote/markdown/index.html#%E5%AE%9E%E4%BE%8B\"></a>实例</h5><pre data-source-line=\"12\"><code class=\"hljs\"><span class=\"hljs-number\">0</span> <span class=\"zh-hans\">以下的事错误</span>\r\nfunction <span class=\"hljs-function\"><span class=\"hljs-keyword\">func</span><span class=\"hljs-params\">()</span></span> {\r\n    <span class=\"hljs-comment\">// todo</span>\r\n    <span class=\"hljs-keyword\">if</span> (<span class=\"hljs-keyword\">do</span>) {\r\n        <span class=\"hljs-keyword\">return</span> -<span class=\"hljs-number\">1</span>\r\n    } elseif (<span class=\"hljs-keyword\">do</span>) {\r\n        <span class=\"hljs-keyword\">return</span> -<span class=\"hljs-number\">2</span>\r\n    } <span class=\"hljs-keyword\">else</span> {\r\n        <span class=\"hljs-keyword\">return</span> <span class=\"hljs-number\">1</span>\r\n    }\r\n}\r\n\r\nb = <span class=\"hljs-function\"><span class=\"hljs-keyword\">func</span><span class=\"hljs-params\">()</span></span>;\r\n\r\n<span class=\"hljs-keyword\">if</span> (b == -<span class=\"hljs-number\">2</span>) {\r\n    <span class=\"hljs-comment\">// <span class=\"zh-hans\">什么错误</span></span>\r\n} elseif (b == -<span class=\"hljs-number\">1</span>) {\r\n    <span class=\"hljs-comment\">// <span class=\"zh-hans\">什么错误</span></span>\r\n} <span class=\"hljs-keyword\">else</span> {}\r\n</code></pre><h3 id=\"2错误统一处理\" data-source-line=\"34\"><a class=\"markdownIt-Anchor\" href=\"file:///C:/Users/Administrator.USER-20170705WQ/AppData/Local/Youdao/YNote/markdown/index.html#2%E9%94%99%E8%AF%AF%E7%BB%9F%E4%B8%80%E5%A4%84%E7%90%86\"></a>2.错误统一处理</h3><p data-source-line=\"35\">其实是返回值的变体，还是返回false但是暴露出一个错误的方法</p><table data-source-line=\"37\" class=\"layui-table\"><thead><tr><th>优点</th><th>缺点</th></tr></thead><tbody><tr><td>代码简单,过程化程序</td><td>减轻了调用者的负担，应该算是面向过程比较完善的错误处理，但调用者面对多个操作还是会出现if等冗余代码</td></tr></tbody></table><h5 id=\"实例-2\" data-source-line=\"41\"><a class=\"markdownIt-Anchor\" href=\"file:///C:/Users/Administrator.USER-20170705WQ/AppData/Local/Youdao/YNote/markdown/index.html#%E5%AE%9E%E4%BE%8B-2\"></a>实例</h5><pre data-source-line=\"42\"><code class=\"hljs\"><span class=\"zh-hans\">变体</span><span class=\"hljs-number\">1</span>\r\n<span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> <span class=\"hljs-title\">app</span><span class=\"hljs-params\">()</span></span>{\r\n    <span class=\"hljs-keyword\">if</span> (!a) <span class=\"hljs-keyword\">goto</span> err;\r\n    <span class=\"hljs-keyword\">if</span> (!c) err();\r\n}\r\n\r\n<span class=\"zh-hans\">变体</span><span class=\"hljs-number\">2</span>\r\n<span class=\"hljs-class\"><span class=\"hljs-keyword\">class</span> <span class=\"hljs-title\">A</span> </span>{\r\n    $err = <span class=\"hljs-string\">\'\'</span>;\r\n    <span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> <span class=\"hljs-title\">fun</span><span class=\"hljs-params\">()</span> </span>{\r\n        <span class=\"hljs-keyword\">if</span> (<span class=\"hljs-keyword\">do</span>) {\r\n            <span class=\"hljs-keyword\">$this</span>-&gt;$err = <span class=\"hljs-string\">\'<span class=\"zh-hans\">错误信息</span>\'</span>;\r\n            <span class=\"hljs-keyword\">return</span> <span class=\"hljs-keyword\">false</span>\r\n        } <span class=\"hljs-keyword\">elseif</span>(<span class=\"hljs-keyword\">do</span>) {\r\n            <span class=\"hljs-keyword\">$this</span>-&gt;$err = <span class=\"hljs-string\">\'<span class=\"zh-hans\">错误信息</span>2\'</span>;\r\n            <span class=\"hljs-keyword\">return</span> <span class=\"hljs-keyword\">false</span>;\r\n        } <span class=\"hljs-keyword\">else</span> {\r\n            <span class=\"hljs-keyword\">return</span> <span class=\"hljs-keyword\">true</span>;\r\n        }\r\n    }\r\n}\r\n\r\n$a = <span class=\"hljs-keyword\">new</span> A();\r\n<span class=\"hljs-keyword\">if</span> (<span class=\"hljs-keyword\">false</span> === $a-&gt;func()) {\r\n    <span class=\"hljs-comment\">// <span class=\"zh-hans\">统一处理</span> $a-&gt;$err</span>\r\n} <span class=\"hljs-keyword\">else</span> {}\r\n\r\n<span class=\"zh-hans\">但是面对多个</span>\r\n$b = <span class=\"hljs-keyword\">new</span> B();\r\n<span class=\"zh-hans\">还是需要写一遍</span>\r\n</code></pre><h3 id=\"3异常处理\" data-source-line=\"75\"><a class=\"markdownIt-Anchor\" href=\"file:///C:/Users/Administrator.USER-20170705WQ/AppData/Local/Youdao/YNote/markdown/index.html#3%E5%BC%82%E5%B8%B8%E5%A4%84%E7%90%86\"></a>3.异常处理</h3><p data-source-line=\"76\">面向对象中的方法，语言级别的一种错误处理的方法。其实原理是发生错误后调用指定的错误处理代码。</p><table data-source-line=\"78\" class=\"layui-table\"><thead><tr><th>优点</th><th>缺点</th></tr></thead><tbody><tr><td>把异常当成是一种对象</td><td>面向对象，相对复杂点</td></tr></tbody></table><pre data-source-line=\"82\"><code class=\"hljs\"><span class=\"hljs-class\"><span class=\"hljs-keyword\">class</span> <span class=\"hljs-title\">A</span> </span>{\r\n    <span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> <span class=\"hljs-title\">fun</span><span class=\"hljs-params\">()</span> </span>{\r\n        <span class=\"hljs-keyword\">if</span> (<span class=\"hljs-keyword\">do</span>) {\r\n            <span class=\"hljs-keyword\">throw</span> E\r\n        } <span class=\"hljs-keyword\">elseif</span>(<span class=\"hljs-keyword\">do</span>) {\r\n            <span class=\"hljs-keyword\">throw</span> E\r\n        } <span class=\"hljs-keyword\">else</span> {\r\n            <span class=\"hljs-keyword\">return</span> <span class=\"hljs-keyword\">true</span>;\r\n        }\r\n    }\r\n}\r\n\r\n$a = <span class=\"hljs-keyword\">new</span> A();\r\n$b = <span class=\"hljs-keyword\">new</span> A();\r\n<span class=\"hljs-keyword\">try</span> {\r\n    $a-&gt;func();\r\n    $b-&gt;func();   \r\n} cache ($e) {\r\n    \r\n} <span class=\"hljs-keyword\">finally</span> {\r\n    <span class=\"hljs-comment\">// <span class=\"zh-hans\">解决成对操作</span> <span class=\"zh-hans\">对类当然也可以使用析构函数解决</span></span>\r\n}\r\n</code></pre><h3 id=\"4触发事件\" data-source-line=\"107\"><a class=\"markdownIt-Anchor\" href=\"file:///C:/Users/Administrator.USER-20170705WQ/AppData/Local/Youdao/YNote/markdown/index.html#4%E8%A7%A6%E5%8F%91%E4%BA%8B%E4%BB%B6\"></a>4.触发事件</h3><p data-source-line=\"108\">这个在ajax这种很常见，但个人实现操作难度较高。</p><h3 id=\"5总结\" data-source-line=\"110\"><a class=\"markdownIt-Anchor\" href=\"file:///C:/Users/Administrator.USER-20170705WQ/AppData/Local/Youdao/YNote/markdown/index.html#5%E6%80%BB%E7%BB%93\"></a>5.总结</h3><p data-source-line=\"111\"><a href=\"https://blog.csdn.net/zoujunjie202/article/details/51329950\">https://blog.csdn.net/zoujunjie202/article/details/51329950</a></p><p data-source-line=\"113\">综上所述，使用哪种方式来反馈错误，的确是要看场景。个人觉得，操作频率高的代码模块尽量少使用异常处理，但是要确保返回信息的简洁。而一些失败因素无法穷举的场景，如果不会出现性能问题，则考虑使用异常。</p>');
INSERT INTO `ice_blog_data` VALUES ('2', '2', '<p data-source-line=\"2\">本页面为Naice友情链接页面</p><p data-source-line=\"4\"><a href=\"https://www.xm4021.com/\">小虾米大理想-&gt;www.xm4021.com</a></p>');

-- ----------------------------
-- Table structure for ice_blog_tag
-- ----------------------------
DROP TABLE IF EXISTS `ice_blog_tag`;
CREATE TABLE `ice_blog_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '引用次数',
  `sort` tinyint(4) NOT NULL DEFAULT '1' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='标签表';

-- ----------------------------
-- Records of ice_blog_tag
-- ----------------------------
INSERT INTO `ice_blog_tag` VALUES ('1', 'PHP回炉', '1', '0');
INSERT INTO `ice_blog_tag` VALUES ('2', '系统', '1', '0');

-- ----------------------------
-- Table structure for ice_blog_tag_list
-- ----------------------------
DROP TABLE IF EXISTS `ice_blog_tag_list`;
CREATE TABLE `ice_blog_tag_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'tag的id',
  `b_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '博客id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ice_blog_tag_list
-- ----------------------------
INSERT INTO `ice_blog_tag_list` VALUES ('1', '1', '100');
INSERT INTO `ice_blog_tag_list` VALUES ('2', '2', '2');

-- ----------------------------
-- Table structure for ice_nav
-- ----------------------------
DROP TABLE IF EXISTS `ice_nav`;
CREATE TABLE `ice_nav` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `sort` tinyint(4) NOT NULL DEFAULT '1' COMMENT '排序',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '调整位置',
  `s_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 ok',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ice_nav
-- ----------------------------
INSERT INTO `ice_nav` VALUES ('1', '首&nbsp;&nbsp;页', '10', '/', '1');
INSERT INTO `ice_nav` VALUES ('2', '友&nbsp;&nbsp;链', '8', '/2', '1');

-- ----------------------------
-- Table structure for ice_system_menu
-- ----------------------------
DROP TABLE IF EXISTS `ice_system_menu`;
CREATE TABLE `ice_system_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `ico` varchar(50) NOT NULL DEFAULT '' COMMENT 'class 的 ico',
  `node` varchar(255) NOT NULL DEFAULT '#' COMMENT '路径',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `s_status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1是正常 -1删除',
  `s_create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `s_update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ice_system_menu
-- ----------------------------
INSERT INTO `ice_system_menu` VALUES ('1', '0', 'Admin', 'fa fa-user-o', '#', '100', '1', '0', '0');
INSERT INTO `ice_system_menu` VALUES ('2', '0', '内容管理', 'fa fa-desktop', '#', '0', '1', '0', '0');
INSERT INTO `ice_system_menu` VALUES ('3', '0', '站点设置', 'fa fa-cog', '#', '0', '2', '0', '0');
INSERT INTO `ice_system_menu` VALUES ('4', '1', '个人信息', 'fa fa-user-o', '/admin/sys_user/index', '0', '1', '0', '0');
INSERT INTO `ice_system_menu` VALUES ('5', '1', '修改密码', 'fa fa-user-o', '/admin/sys_user/pwd', '0', '1', '0', '0');
INSERT INTO `ice_system_menu` VALUES ('6', '2', '文章管理', 'fa fa-user-o', '/admin/blog/index', '0', '1', '0', '0');
INSERT INTO `ice_system_menu` VALUES ('7', '2', '标签管理', 'fa fa-user-o', '/admin/blog/tag', '1', '1', '0', '0');

-- ----------------------------
-- Table structure for ice_system_user
-- ----------------------------
DROP TABLE IF EXISTS `ice_system_user`;
CREATE TABLE `ice_system_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(25) NOT NULL DEFAULT '' COMMENT '登陆',
  `password` char(32) NOT NULL,
  `email` varchar(40) NOT NULL DEFAULT '' COMMENT '邮箱',
  `phone` char(15) NOT NULL DEFAULT '' COMMENT '手机号',
  `authorize` varchar(100) NOT NULL DEFAULT '' COMMENT '权限id',
  `desc` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `s_status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '-1 删除 1是正常',
  `s_create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `s_update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) COMMENT '唯一username'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ice_system_user
-- ----------------------------
INSERT INTO `ice_system_user` VALUES ('1', 'panpan', '12f1b52ae343c200f385276446a7d1e6', '1820120473@qq.com', '18521335564', '', '', '1', '0', '1522994174');
