<?php
	Class SessionRedis {
		//REDIS连接对象
		Private $redis;
		//SESSION有效时间
		Private $expire;
		Public function execute(){
			session_set_save_handler(
				array(&$this,'open'),
				array(&$this,'close'),
				array(&$this,'read'),
				array(&$this,'write'),
				array(&$this,'destory'),
				array(&$this,'gc')
				);
		}
		Public function open($path,$name){
			$redis->expire = C('SESSION_EXPIRE')?C('SESSION_EXPIRE'):ini_get('session.gc_maxlifetime');
			$this->redis =new Redis();
			return $this->redis->connect(C('REDIS_HOST'),C('REDIS_PORT'));
		}
		Public function close(){
				return $this->redis->close();
		}  
		Public function read($id){
			$id =C('SESSION_PREFIX') .$id;
			$data = $this->redis->get($id);
			return $data ? $data : '';
		}
		Public function write($id,$data){
			$id =C('SESSION_PREFIX').$id;
			$data = addslashes($data);
			return $this->redis->set($id,$data,$this->expire);
		}
		Public function destory($id){
			$id = C('SESSION_PREFIX') . $id ;
			return $this->redis->delete();
		}
		Public function gc($maxLifeTime){
				return true;
		}
	}
?>