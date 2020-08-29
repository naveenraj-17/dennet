<?php


class dennet extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->library('encryption');
        $this->load->library('pagination');
        $this->load->library('email');
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if ($_SESSION['login'] == true) {
                $data['user'] = $this->Model->check_login_data($_SESSION['username']);
                $data['following'] = $this->Model->num_data_in_table("follow","follower_id",$_SESSION['id']);
                $data['followers'] = $this->Model->num_data_in_table("follow","following_id",$_SESSION['id']);
                $data['profiles'] = $this->Model->get_profiles($_SESSION['id']);
                $data['posts'] = $this->Model->get_posts($_SESSION['id']);
                $this->load->view("home",$data);
            }
            else{
                $this->load->view("login");
            }
        }
        else $this->load->view("login");
    }

    public function signin(){
        if($this->input->server("REQUEST_METHOD") == "POST"){
            if(!$this->Model->check_data_in_table("users","username",$_POST['username'])){
                if(!$this->Model->check_data_in_table("users","email",$_POST['email'])){
                    $signin = array("username" => $_POST['username'],
                        "email" => $_POST['email'],
                        "profile_image" => $_POST['profile_img'],
                        "password" => $this->encryption->encrypt($_POST['password']));
                    $result = $this->Model->insert_data_into_table("users",$signin);
                    if ($result){
                        $data['success'] = "Registered Successfully, Now Login";
                        $this->load->view("login",$data);
                    }
                    else{
                        $data['error'] = "Error Occurred , Retry Again";
                        $this->load->view("login",$data);
                    }
                }
                else{
                    $data['warning'] = "You have already signed in try logging in";
                    $this->load->view("login",$data);
                }
            }
            else{
                $data['warning'] = "Username already exist try again with new name";
                $this->load->view("login",$data);
            }

        }
        else{
            redirect(base_url());
        }
    }

    public function check_username(){
        if($this->input->server("REQUEST_METHOD") == 'POST'){
            $check = $this->Model->check_data_in_table("users","username",$_POST['name']);
            if($check) echo "present";
            else echo "not-present";
        }
    }

    public function add_overview(){
        if($this->input->server("REQUEST_METHOD") == 'POST'){
            $result = $this->Model->add_userdetails($_SESSION['id'],"overview",$_POST['overview']);
            if($result) redirect(base_url('myprofile'));
            else{
                $data['error'] = "Error Occurred retry again";
                $data['user'] = $this->Model->check_login_data($_SESSION['username']);
                $data['following'] = $this->Model->num_data_in_table("follow","follower_id",$_SESSION['id']);
                $data['followers'] = $this->Model->num_data_in_table("follow","following_id",$_SESSION['id']);
                $data['profiles'] = $this->Model->get_profiles($_SESSION['id']);
                $data['myposts'] = $this->Model->get_myposts($_SESSION['id']);
                $data['user_details'] = $this->Model->get_row_from_table("user_details","user_id",$_SESSION['id']);
                $this->load->view("myprofile",$data);
            }
        }
    }

    public function add_education(){
        if($this->input->server("REQUEST_METHOD") == 'POST'){
            $result = $this->Model->add_userdetails($_SESSION['id'],"edu_degree",$_POST['degree']);
            $result1 = $this->Model->add_userdetails($_SESSION['id'],"edu_start",$_POST['from']);
            $result2 = $this->Model->add_userdetails($_SESSION['id'],"edu_end",$_POST['to']);
            $result3 = $this->Model->add_userdetails($_SESSION['id'],"edu_description",$_POST['description']);
            if($result and $result1 and $result2 and $result3) redirect(base_url('myprofile'));
            else{
                $data['error'] = "Error Occurred retry again";
                $data['user'] = $this->Model->check_login_data($_SESSION['username']);
                $data['following'] = $this->Model->num_data_in_table("follow","follower_id",$_SESSION['id']);
                $data['followers'] = $this->Model->num_data_in_table("follow","following_id",$_SESSION['id']);
                $data['profiles'] = $this->Model->get_profiles($_SESSION['id']);
                $data['myposts'] = $this->Model->get_myposts($_SESSION['id']);
                $data['user_details'] = $this->Model->get_row_from_table("user_details","user_id",$_SESSION['id']);
                $this->load->view("myprofile",$data);
            }
        }
    }

    public function add_location(){
        if($this->input->server("REQUEST_METHOD") == 'POST'){
            $result = $this->Model->add_userdetails($_SESSION['id'],"country",$_POST['country']);
            $result1 = $this->Model->add_userdetails($_SESSION['id'],"city",$_POST['city']);
            if($result and $result1) redirect(base_url('myprofile'));
            else{
                $data['error'] = "Error Occurred retry again";
                $data['user'] = $this->Model->check_login_data($_SESSION['username']);
                $data['following'] = $this->Model->num_data_in_table("follow","follower_id",$_SESSION['id']);
                $data['followers'] = $this->Model->num_data_in_table("follow","following_id",$_SESSION['id']);
                $data['profiles'] = $this->Model->get_profiles($_SESSION['id']);
                $data['myposts'] = $this->Model->get_myposts($_SESSION['id']);
                $data['user_details'] = $this->Model->get_row_from_table("user_details","user_id",$_SESSION['id']);
                $this->load->view("myprofile",$data);
            }
        }
    }

    public function login(){
        if ($this->input->server("REQUEST_METHOD") == "POST"){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $result = $this->Model->check_login_data($username);
            if($result){
                if($password === $this->encryption->decrypt($result->password)){
                    $profile = array("username" => $username,
                                    "id" => $result->id,
                                    "profile_image" => $result->profile_image,
                                    "login" => true);
                    $this->session->set_userdata($profile);
                    redirect(base_url());
                }
                else{
                    $data['error'] = "Incorrect Password Retry Again";
                    $this->load->view("login",$data);
                }
            }
            else{
                $data['error'] = "Username not present check username or register a new account";
                $this->load->view("login",$data);
            }
        }
        else {
            redirect(base_url());
        }
    }
	
	public function like_post(){
		if($this->input->server("REQUEST_METHOD") == "POST"){
			$post_id = $_POST['pid'];
			$result = $this->Model->like_post($_SESSION['id'],$post_id);
			echo $result;
		}
	}

    public function myprofile(){
        if(isset($_SESSION['id'])){
            $data['user'] = $this->Model->check_login_data($_SESSION['username']);
            $data['following'] = $this->Model->num_data_in_table("follow","follower_id",$_SESSION['id']);
            $data['followers'] = $this->Model->num_data_in_table("follow","following_id",$_SESSION['id']);
            $data['profiles'] = $this->Model->get_profiles($_SESSION['id']);
            $data['myposts'] = $this->Model->get_myposts($_SESSION['id']);
            $data['user_details'] = $this->Model->get_row_from_table("user_details","user_id",$_SESSION['id']);
            $this->load->view("myprofile",$data);
        }
        else{
            redirect(base_url());
        }
    }

    public function overview(){

    }

    public function submit_description_image(){
        if(!empty($_FILES)){

            $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
            $before = pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
            $name = date('m-d-Y-H-i-s');
            $ran = rand(0,3);
            $image = $before."-".$name .$ran. "." . $extension;

            $config['upload_path']          = './assets/images/posts/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['file_name']            = $image;
            $config['max_size']             = 2000;
            $config['max_width']            = 1024;
            $config['max_height']           = 1024;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if($this->upload->do_upload("file")) echo $this->upload->data('file_name');
            else echo "not uploaded";
        }
    }

    public function submit_post(){
        if(isset($_SESSION['login'])){
            if($_SESSION['login'] == true){
               if($this->input->server('REQUEST_METHOD') == 'POST'){
                   $post = array("user_id" => $_SESSION['id'],
                                "description" => $_POST['description'],
                                "image" => $_POST['description_img'],
                                "likes" => 0,
                                "date" => date("Y-m-d"),
                                "time" => date("H:i:s"));
                   $result = $this->Model->insert_data_into_table("post",$post);
                   if($result){
                       $data['success'] = "Post Created Successfully";
                       $data['user'] = $this->Model->check_login_data($_SESSION['username']);
                       $data['following'] = $this->Model->num_data_in_table("follow","follower_id",$_SESSION['id']);
                       $data['followers'] = $this->Model->num_data_in_table("follow","following_id",$_SESSION['id']);
                       $data['profiles'] = $this->Model->get_profiles($_SESSION['id']);
                       $data['posts'] = $this->Model->get_posts($_SESSION['id']);
                       $this->load->view("home",$data);
                   }
               }
            }
            else redirect(base_url('login'));
        }
        else redirect(base_url('login'));
    }

    public function follow_friend(){
        if($this->input->server("REQUEST_METHOD") == "POST"){
          $fid = $_POST['fid'];
          $result = $this->Model->follow_friend($fid,$_SESSION['id']);
          echo $result;
        }
        else echo "not_submitted";
    }

    public function profiles(){
        if(isset($_SESSION['login'])){
            if ($_SESSION['login'] == true){
                $data['profiles'] = $this->Model->get_profiles($_SESSION['id']);
                $this->load->view('profiles',$data);
            }
            else redirect(base_url());
        }
        else redirect(base_url());
    }

    public function following(){
        if(isset($_SESSION['id'])){
            $data['profiles'] = $this->Model->get_following($_SESSION['id']);
            $this->load->view('profiles',$data);
        }
        else redirect(base_url());
    }

    public function followers(){
        if(isset($_SESSION['id'])){
            $data['profiles'] = $this->Model->get_followers($_SESSION['id']);
            $this->load->view('profiles',$data);
        }
        else redirect(base_url());
    }

    public function profile($username = null){
        if(!is_null($username) and isset($_SESSION['id'])){
            $user = $this->Model->check_login_data($username);
            $data['user'] = $user;
            $data['following'] = $this->Model->num_data_in_table("follow","follower_id",$user->id);
            $data['isfollowing'] = $this->Model->is_following($_SESSION['id'],$user->id);
            $data['followers'] = $this->Model->num_data_in_table("follow","following_id",$user->id);
            $data['profiles'] = $this->Model->get_profiles($_SESSION['id']);
            $data['userposts'] = $this->Model->get_myposts($user->id);
            $data['user_details'] = $this->Model->get_row_from_table("user_details","user_id",$user->id);
            $this->load->view("userprofile",$data);
        }
        else redirect(base_url());
    }

    public function submit_image(){
        if(!empty($_FILES)){

            $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
            $before = pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
            $name = date('m-d-Y-H-i-s');
            $ran = rand(0,3);
            $image = $before."-".$name .$ran. "." . $extension;

            $config['upload_path']          = './assets/images/profiles/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['file_name']            = $image;
            $config['max_size']             = 2000;
            $config['max_width']            = 1024;
            $config['max_height']           = 1024;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if($this->upload->do_upload("file")) echo $this->upload->data('file_name');
            else echo "not uploaded";
        }
    }

    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('profile_image');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('login');
        $this->session->sess_destroy();
        $this->load->view("login");
    }
}