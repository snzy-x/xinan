<?php
$sql="
CREATE TABLE IF NOT EXISTS `ims_baiban_wxlinks_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  `weigh` int(11) NOT NULL DEFAULT '0',
  `createtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;


CREATE TABLE IF NOT EXISTS `ims_baiban_wxlinks_cdkeys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0',
  `cdkey` char(20) NOT NULL DEFAULT '0',
  `days` int(11) NOT NULL DEFAULT '0',
  `createtime` int(11) NOT NULL DEFAULT '0',
  `usetime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;


CREATE TABLE IF NOT EXISTS `ims_baiban_wxlinks_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `userid` int(11) NOT NULL DEFAULT '0',
  `type` enum('小程序','个人小程序','公众号','微信号','微信群','视频号','企业微信','公众号文章','任意网址') NOT NULL DEFAULT '小程序',
  `wxappid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  `return` varchar(300) NOT NULL DEFAULT '',
  `desc` varchar(100) NOT NULL DEFAULT '',
  `btn_title` varchar(100) NOT NULL DEFAULT '',
  `app_top` varchar(200) NOT NULL DEFAULT '',
  `app_text` varchar(200) NOT NULL DEFAULT '',
  `message_img` varchar(200) NOT NULL DEFAULT '',
  `copy_words` varchar(200) NOT NULL DEFAULT '',
  `path` varchar(100) NOT NULL DEFAULT '',
  `query` varchar(1024) NOT NULL DEFAULT '',
  `openlink` varchar(100) NOT NULL DEFAULT '',
  `domain` varchar(100) NOT NULL DEFAULT '',
  `share_title` varchar(100) NOT NULL DEFAULT '',
  `views` int(11) NOT NULL DEFAULT '0',
  `arrives` int(11) NOT NULL DEFAULT '0',
  `createtime` int(11) NOT NULL DEFAULT '0',
  `updatetime` int(11) NOT NULL DEFAULT '0',
  `expiretime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;


CREATE TABLE IF NOT EXISTS `ims_baiban_wxlinks_platform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `component_appid` varchar(50) NOT NULL DEFAULT '',
  `component_appsecret` varchar(50) NOT NULL DEFAULT '',
  `component_token` varchar(50) NOT NULL DEFAULT '',
  `component_key` varchar(50) NOT NULL DEFAULT '',
  `component_verify_ticket` varchar(150) NOT NULL DEFAULT '',
  `component_access_token` varchar(250) NOT NULL DEFAULT '',
  `component_expire_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;


CREATE TABLE IF NOT EXISTS `ims_baiban_wxlinks_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `nickname` varchar(50) NOT NULL DEFAULT '',
  `avatar` varchar(250) NOT NULL DEFAULT '',
  `channel` enum('微信公众号','微信小程序') NOT NULL DEFAULT '微信小程序',
  `openid` varchar(50) NOT NULL DEFAULT '',
  `mobile` varchar(11) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `wxapps` int(11) NOT NULL DEFAULT '0',
  `links` int(11) NOT NULL DEFAULT '0',
  `config` varchar(15000) NOT NULL DEFAULT '',
  `createtime` int(11) NOT NULL DEFAULT '0',
  `expiretime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;


CREATE TABLE IF NOT EXISTS `ims_baiban_wxlinks_visit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0',
  `wxappid` int(11) NOT NULL DEFAULT '0',
  `linkid` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `arrives` int(11) NOT NULL DEFAULT '0',
  `date` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;


CREATE TABLE IF NOT EXISTS `ims_baiban_wxlinks_wxapps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `userid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  `type` enum('小程序','个人小程序') NOT NULL DEFAULT '小程序',
  `appid` varchar(50) NOT NULL DEFAULT '',
  `secret` varchar(50) NOT NULL DEFAULT '',
  `orid` varchar(50) NOT NULL DEFAULT '',
  `links` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `arrives` int(11) NOT NULL DEFAULT '0',
  `authorizer_access_token` varchar(250) NOT NULL DEFAULT '',
  `authorizer_refresh_token` varchar(150) NOT NULL DEFAULT '',
  `authorizer_expire_time` int(11) NOT NULL DEFAULT '0',
  `createtime` int(11) NOT NULL DEFAULT '0',
  `updatetime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

";
pdo_run($sql);
if(!pdo_fieldexists("baiban_wxlinks_banners", "id")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_banners")." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("baiban_wxlinks_banners", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_banners")." ADD `uniacid` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_banners", "title")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_banners")." ADD `title` varchar(255) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_banners", "image")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_banners")." ADD `image` varchar(255) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_banners", "url")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_banners")." ADD `url` varchar(255) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_banners", "enable")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_banners")." ADD `enable` tinyint(1) NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists("baiban_wxlinks_banners", "weigh")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_banners")." ADD `weigh` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_banners", "createtime")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_banners")." ADD `createtime` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_cdkeys", "id")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_cdkeys")." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("baiban_wxlinks_cdkeys", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_cdkeys")." ADD `uniacid` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_cdkeys", "userid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_cdkeys")." ADD `userid` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_cdkeys", "cdkey")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_cdkeys")." ADD `cdkey` char(20) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_cdkeys", "days")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_cdkeys")." ADD `days` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_cdkeys", "createtime")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_cdkeys")." ADD `createtime` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_cdkeys", "usetime")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_cdkeys")." ADD `usetime` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "id")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `uniacid` int(11) NOT NULL;");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "userid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `userid` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "type")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `type` enum('小程序','个人小程序','公众号','微信号','微信群','视频号','企业微信','公众号文章','任意网址') NOT NULL DEFAULT '小程序';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "wxappid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `wxappid` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "name")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `name` varchar(100) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "return")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `return` varchar(300) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "desc")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `desc` varchar(100) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "btn_title")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `btn_title` varchar(100) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "app_top")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `app_top` varchar(200) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "app_text")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `app_text` varchar(200) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "message_img")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `message_img` varchar(200) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "copy_words")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `copy_words` varchar(200) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "path")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `path` varchar(100) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "query")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `query` varchar(1024) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "openlink")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `openlink` varchar(100) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "domain")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `domain` varchar(100) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "share_title")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `share_title` varchar(100) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "views")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `views` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "arrives")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `arrives` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "createtime")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `createtime` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "updatetime")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `updatetime` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_links", "expiretime")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_links")." ADD `expiretime` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_platform", "id")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_platform")." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("baiban_wxlinks_platform", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_platform")." ADD `uniacid` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_platform", "component_appid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_platform")." ADD `component_appid` varchar(50) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_platform", "component_appsecret")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_platform")." ADD `component_appsecret` varchar(50) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_platform", "component_token")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_platform")." ADD `component_token` varchar(50) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_platform", "component_key")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_platform")." ADD `component_key` varchar(50) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_platform", "component_verify_ticket")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_platform")." ADD `component_verify_ticket` varchar(150) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_platform", "component_access_token")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_platform")." ADD `component_access_token` varchar(250) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_platform", "component_expire_time")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_platform")." ADD `component_expire_time` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_users", "id")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_users")." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("baiban_wxlinks_users", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_users")." ADD `uniacid` int(11) NOT NULL;");
}
if(!pdo_fieldexists("baiban_wxlinks_users", "nickname")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_users")." ADD `nickname` varchar(50) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_users", "avatar")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_users")." ADD `avatar` varchar(250) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_users", "channel")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_users")." ADD `channel` enum('微信公众号','微信小程序') NOT NULL DEFAULT '微信小程序';");
}
if(!pdo_fieldexists("baiban_wxlinks_users", "openid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_users")." ADD `openid` varchar(50) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_users", "mobile")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_users")." ADD `mobile` varchar(11) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_users", "password")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_users")." ADD `password` varchar(32) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_users", "wxapps")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_users")." ADD `wxapps` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_users", "links")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_users")." ADD `links` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_users", "config")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_users")." ADD `config` varchar(15000) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_users", "createtime")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_users")." ADD `createtime` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_users", "expiretime")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_users")." ADD `expiretime` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_visit", "id")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_visit")." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("baiban_wxlinks_visit", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_visit")." ADD `uniacid` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_visit", "userid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_visit")." ADD `userid` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_visit", "wxappid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_visit")." ADD `wxappid` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_visit", "linkid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_visit")." ADD `linkid` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_visit", "views")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_visit")." ADD `views` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_visit", "arrives")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_visit")." ADD `arrives` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_visit", "date")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_visit")." ADD `date` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_wxapps", "id")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_wxapps")." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("baiban_wxlinks_wxapps", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_wxapps")." ADD `uniacid` int(11) NOT NULL;");
}
if(!pdo_fieldexists("baiban_wxlinks_wxapps", "userid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_wxapps")." ADD `userid` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_wxapps", "name")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_wxapps")." ADD `name` varchar(100) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_wxapps", "type")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_wxapps")." ADD `type` enum('小程序','个人小程序') NOT NULL DEFAULT '小程序';");
}
if(!pdo_fieldexists("baiban_wxlinks_wxapps", "appid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_wxapps")." ADD `appid` varchar(50) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_wxapps", "secret")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_wxapps")." ADD `secret` varchar(50) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_wxapps", "orid")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_wxapps")." ADD `orid` varchar(50) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_wxapps", "links")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_wxapps")." ADD `links` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_wxapps", "views")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_wxapps")." ADD `views` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_wxapps", "arrives")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_wxapps")." ADD `arrives` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_wxapps", "authorizer_access_token")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_wxapps")." ADD `authorizer_access_token` varchar(250) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_wxapps", "authorizer_refresh_token")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_wxapps")." ADD `authorizer_refresh_token` varchar(150) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists("baiban_wxlinks_wxapps", "authorizer_expire_time")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_wxapps")." ADD `authorizer_expire_time` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_wxapps", "createtime")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_wxapps")." ADD `createtime` int(11) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("baiban_wxlinks_wxapps", "updatetime")) {
 pdo_query("ALTER TABLE ".tablename("baiban_wxlinks_wxapps")." ADD `updatetime` int(11) NOT NULL DEFAULT '0';");
}
