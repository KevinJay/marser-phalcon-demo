/*
SQLyog 企业版 - MySQL GUI v8.14 
MySQL - 5.6.29-log : Database - test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `test`;

/*Table structure for table `test_articles` */

DROP TABLE IF EXISTS `test_articles`;

CREATE TABLE `test_articles` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT ' 文章ID',
  `title` varchar(255) NOT NULL COMMENT '文章标题',
  `introduce` text NOT NULL COMMENT '文章摘要',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态 0：删除  1：发布 2：草稿',
  `view_number` int(10) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `is_recommend` char(1) NOT NULL DEFAULT '0' COMMENT '是否为推荐阅读',
  `is_top` char(1) NOT NULL DEFAULT '0' COMMENT '是否置顶',
  `create_by` int(10) unsigned NOT NULL COMMENT '创建者',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `modify_by` int(10) unsigned NOT NULL COMMENT '修改者',
  `modify_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  PRIMARY KEY (`aid`),
  KEY `INDEX_TITLE` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='文章表';

/*Data for the table `test_articles` */

insert  into `test_articles`(`aid`,`title`,`introduce`,`status`,`view_number`,`is_recommend`,`is_top`,`create_by`,`create_time`,`modify_by`,`modify_time`) values (1,'英语演讲','纯口语式',1,0,'0','0',1,'2017-05-21 05:13:46',1,'2017-05-21 05:13:46'),(2,'限购政策','快买房',1,0,'0','0',1,'2017-05-21 05:13:46',1,'2017-05-21 05:13:46');

/*Table structure for table `test_articles_categorys` */

DROP TABLE IF EXISTS `test_articles_categorys`;

CREATE TABLE `test_articles_categorys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(10) unsigned NOT NULL COMMENT '文章ID',
  `cid` int(10) unsigned NOT NULL COMMENT '分类ID',
  PRIMARY KEY (`id`),
  KEY `INDEX_AID_CID` (`aid`,`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `test_articles_categorys` */

/*Table structure for table `test_articles_tags` */

DROP TABLE IF EXISTS `test_articles_tags`;

CREATE TABLE `test_articles_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL COMMENT '文章ID',
  `tid` int(11) NOT NULL COMMENT '标签ID',
  PRIMARY KEY (`id`),
  KEY `INDEX_AID_TID` (`aid`,`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `test_articles_tags` */

/*Table structure for table `test_categorys` */

DROP TABLE IF EXISTS `test_categorys`;

CREATE TABLE `test_categorys` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT ' 分类ID',
  `category_name` varchar(50) NOT NULL COMMENT '分类名称',
  `slug` varchar(50) NOT NULL DEFAULT '' COMMENT '分类缩略名',
  `sort` mediumint(9) NOT NULL DEFAULT '999' COMMENT '分类排序',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '分类描述',
  `parent_cid` int(10) unsigned NOT NULL COMMENT '父分类ID',
  `path` varchar(255) NOT NULL COMMENT '分类路径',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态 0：删除',
  `create_by` int(10) unsigned NOT NULL COMMENT '创建者',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `modify_by` int(10) unsigned NOT NULL COMMENT '修改者',
  `modify_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  PRIMARY KEY (`cid`),
  KEY `INDEX_SLUG` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分类表';

/*Data for the table `test_categorys` */

/*Table structure for table `test_tags` */

DROP TABLE IF EXISTS `test_tags`;

CREATE TABLE `test_tags` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '标签ID',
  `tag_name` varchar(50) NOT NULL COMMENT '标签名称',
  `slug` varchar(50) NOT NULL DEFAULT '' COMMENT '标签缩略名',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '标签状态 0：删除',
  `create_by` int(10) unsigned NOT NULL COMMENT '创建者',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `modify_by` int(10) unsigned NOT NULL COMMENT '修改者',
  `modify_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  PRIMARY KEY (`tid`),
  UNIQUE KEY `UQ_TAG_NAME` (`tag_name`),
  KEY `INDEX_SLUG` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='标签表';

/*Data for the table `test_tags` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
