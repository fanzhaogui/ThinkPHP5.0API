CREATE TABLE `ts_wxuser` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(64) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '小程序openid',
  `AppID` varchar(32) COLLATE utf8mb4_bin DEFAULT NULL,
  `arcID` varchar(32) COLLATE utf8mb4_bin DEFAULT NULL,
  `avatarUrl` varchar(256) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '头像url',
  `city` varchar(64) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '城市',
  `country` varchar(64) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '国家',
  `gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1男，2女，0未知',
  `language` varchar(32) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '语言',
  `nickName` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '用户名',
  `province` varchar(64) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '省份',
  `telNumber` varchar(16) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '电话号码',
  `country_code` varchar(12) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '用户绑定的手机号（区号）',
  `register_channel` varchar(32) COLLATE utf8mb4_bin NOT NULL COMMENT '注册渠道',
  `page_id` smallint(5) NOT NULL DEFAULT '0' COMMENT '小程序来源页面id',
  `create_time` varchar(32) COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '进入小程序时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`user_id`),
  KEY `openid` (`openid`) USING BTREE,
  KEY `telNumber` (`telNumber`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户表';


CREATE TABLE `ts_activity_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `open_gid` varchar(32) NOT NULL DEFAULT '0' COMMENT '群Id:由于取消了转发到群的回调，故无法确认',
  `openid` varchar(32) NOT NULL DEFAULT '' COMMENT 'openid',
  `founder_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '发起人的ID',
  `title` varchar(128) NOT NULL DEFAULT '' COMMENT '标题',
  `remark` text COMMENT '活动内容说明',
  `free` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '费用：非必填',
  `free_desc` varchar(128) NOT NULL DEFAULT '' COMMENT '费用说明',
  `longitude` varchar(32) NOT NULL DEFAULT '' COMMENT '经度',
  `latitude` varchar(32) NOT NULL DEFAULT '' COMMENT '纬度',
  `address_supplement` varchar(128) NOT NULL DEFAULT '' COMMENT '地址补充说明',
  `dead_time` int(11) NOT NULL DEFAULT '0' COMMENT '活动开始前多久，停止报名，0表示不限制',
  `queue_start_time` int(11) NOT NULL DEFAULT '0' COMMENT '活动开始时间',
  `queue_end_time` int(11) NOT NULL DEFAULT '0' COMMENT '活动结束时间，非必填',
  `less_mumber` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最少参与人数，活动才开始，0则无此限制',
  `large_mumber` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '参与活动的人数是否上限，0不限',
  `view_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `delete_time` int(11) NOT NULL DEFAULT '0' COMMENT '删除时间，如删除时间存在，则执行了删除操作',
  `date` varchar(32) DEFAULT NULL,
  `time` varchar(32) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `tel` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='发起活动';

CREATE TABLE `ts_activity_joinner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `act_id` int(10) NOT NULL COMMENT '接龙ID',
  `user_id` int(10) NOT NULL COMMENT '用户ID',
  `nickName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '用户名',
  `telNumber` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '电话号码',
  `mail` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT '邮箱',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='接龙活动参与者';

CREATE TABLE `ts_activity_notice_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `act_id` int(11) NOT NULL DEFAULT '0' COMMENT '活动ID，ts_activity_queue',
  `join_user_id`  int(11) NOT NULL DEFAULT '0' COMMENT '参与用户ID',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '发送短信或发送邮件通知参与用户的状态：1成功，0失败',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='通知用户';


CREATE TABLE `ts_acter_action_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `open_gid` varchar(32) CHARACTER SET utf8mb4 NOT NULL DEFAULT '0' COMMENT '群Id',
  `act_id` int(11) NOT NULL DEFAULT '0' COMMENT '活动ID，ts_activity_queue',
  `userid` varchar(32) CHARACTER SET utf8mb4 NOT NULL DEFAULT '0' COMMENT '用户',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='进入活动页面的用户数据';