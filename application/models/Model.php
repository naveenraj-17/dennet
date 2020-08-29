<?php


class Model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/kolkata");   //India time (GMT+5:30)
        $this->load->library('encryption');
        $this->load->library('email');
    }

    public function get_data_from_table($table = null){
        if(!is_null($table)){
            $result = $this->db->query("SELECT * FROM $table ORDER BY id DESC");
            return $result->result_array();
        }
        else return false;
    }

    public function get_row_from_table($table = null,$column = null,$data = null){
        if(!is_null($table) and !is_null($data) and !is_null($column)){
            $result = $this->db->query("SELECT * FROM $table where $column = '$data'");
            if($result->num_rows() > 0) return $result->row();
            else return false;
        }
        else return false;
    }

    public function get_profiles($id = null){
        if(!is_null($id)){
            $result = $this->db->query("SELECT * from users where id != '$id' and id not in (SELECT following_id from follow where follower_id = '$id') ORDER BY id DESC");
            return $result->result_array();
        }
        else return false;
    }

    public function get_following($id = null){
        if(!is_null($id)){
            $result = $this->db->query("SELECT * from users where id != '$id' and id in (SELECT following_id from follow where follower_id = '$id') ORDER BY id DESC");
            return $result->result_array();
        }
        else return false;
    }

    public function get_followers($id = null){
        if(!is_null($id)){
            $result = $this->db->query("SELECT * from users where id != '$id' and id in (SELECT follower_id from follow where following_id = '$id') ORDER BY id DESC");
            return $result->result_array();
        }
        else return false;
    }
    
    public function check_login_data($username = null){
        if(!is_null($username)){
            $result = $this->db->query("SELECT * FROM users where username = '$username'");
            return $result->row();
        }
        else return false;
    }

    public function get_posts($id = null){
        if(!is_null($id)){
            $result = $this->db->query("select * from users inner join post WHERE user_id = users.id and (users.id in(SELECT following_id from follow where follower_id = '$id') or users.id = '$id') order by post.id desc");
            return $result->result_array();
        }
        else return false;
    }

    public function get_myposts($id = null){
        if(!is_null($id)){
            $result = $this->db->query("select * from users inner join post WHERE user_id = users.id and  users.id = '$id' order by post.id desc");
            return $result->result_array();
        }
        else return false;
    }

    public function add_userdetails($id = null, $column = null,$data = null){
        if(!is_null($id) and !is_null($column) and !is_null($data)){
            $count = $this->num_data_in_table("user_details","user_id",$id);
            if($count){
                $result = $this->db->query("update user_details set $column = '$data' where user_id = '$id'");
                return $result;
            }else{
                $result = $this->db->query("insert into user_details($column,user_id) values('$data','$_SESSION[id]')");
                return $result;
            }
        }else return false;
    }

    public function follow_friend($following_id = null,$follower_id = null){
        if(!is_null($follower_id) and !is_null($following_id)){
            $r = $this->db->query("SELECT * FROM follow where follower_id = '$follower_id' and following_id = '$following_id'");
            if($r->num_rows() > 0){
                $result = $this->db->query("Delete FROM follow where follower_id = '$follower_id' and following_id = '$following_id'");
                return "unfollow";
            }
            else{
                $date = date("Y-m-d");
                $time = date("H:i:s");
                $result = $this->db->query("INSERT INTO follow(follower_id,following_id,date,time) values('$follower_id','$following_id','$date','$time')");
                return "follow";
            }
        }
    }

    public function check_data_in_table($table = null,$column = null,$data = null){
        if(!is_null($table) and !is_null($data) and !is_null($column)){
            $result = $this->db->query("SELECT * FROM $table where $column = '$data'");
            if($result->num_rows() > 0) return true;
            else return false;
        }
        else return false;
    }
	
	public function like_post($user_id = null,$post_id = null){
		if(!is_null($user_id) and !is_null($post_id)){
			$check = $this->db->query("SELECT * FROM likes WHERE post_id = '$post_id' and user_id = '$user_id'");
			if($check->num_rows() == 0){
				$result = $this->db->query("INSERT INTO likes(post_id,user_id) values('$post_id','$user_id')");
				if($result){
					$count = $this->db->query("SELECT * FROM likes WHERE post_id = '$post_id'");
					$num = $count->num_rows();
					$r = $this->db->query("update post set likes = '$num' WHERE id = '$post_id'");
					return "liked";
				}
				else return "error";
			}
			else{
				$result = $this->db->query("DELETE FROM likes WHERE post_id = '$post_id' and user_id = '$user_id'");
				if($result){
					$count = $this->db->query("SELECT * FROM likes WHERE post_id = '$post_id'");
					$num = $count->num_rows();
					$r = $this->db->query("update post set likes = '$num' WHERE id = '$post_id'");
					return "unliked";
				}
				else return "error";
			}
		}
		else return "error";
	}
	
	public function check_like($user_id = null,$post_id = null){
		$result = $this->db->query("select * from likes where user_id = '$user_id' and post_id = '$post_id'");
		if($result->num_rows() == 1) return true;
		else return false;
	}

    public function is_following($follower = null,$following = null){
        if(!is_null($follower) and !is_null($following)){
            $result = $this->db->query("SELECT * FROM follow where follower_id = '$follower' and following_id = '$following'");
            if($result->num_rows() > 0) return true;
            else return false;
        }
        else return false;
    }

    public function num_data_in_table($table = null,$column = null,$data = null){
        if(!is_null($table) and !is_null($data) and !is_null($column)){
            $result = $this->db->query("SELECT * FROM $table where $column = '$data'");
            if($result->num_rows() > 0) return $result->num_rows();
            else return 0;
        }
        else return 0;
    }

    public function insert_data_into_table($table=null,$data = null){
        if(!is_null($table) and !is_null($data)){
            $result = $this->db->insert($table,$data);
            return $result;
        }
        else return false;
    }


}