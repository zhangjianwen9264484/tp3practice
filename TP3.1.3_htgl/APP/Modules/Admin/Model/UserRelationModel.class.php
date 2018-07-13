<?php
/**
 * 用户与角色的关联模型
 */
 	class UserRelationModel extends RelationModel {
 		//定义主表名称
 		Protected $tableName = 'user';
 		//定义关联模型
 		Protected $_link = array(
 			'role' =>array(								//副表的表名
 				'mapping_type' =>MANY_TO_MANY,			//关系   多对多    HAS_ONE  一对一  HAS_MANY 一对多
 				'foreign_key' =>'user_id',				//外键 主表在中间表的字段
 				'relation_key' =>'role_id',				//副表在中间表的字段
 				'relation_table' =>'think_role_user',  // 中间表名要加前缀
 				'mapping_fields' =>'id,name,remark',	//关联的副表显示的列
 				)
 			);
 	}
?>