<?php
/**
* 
*/
class Activity extends CI_Controller
{
	public function index(){
		$posts['result'] = $this->stories_load();
		$this->load->view('home',['posts'=>$posts]);
	}

	public function about_us(){
		$this->load->view('/about_us.php');
	}

	//login form 
	public function login(){
		$this->load->library('session');
		$this->load->model('User');
		$data= $this->input->post(NULL ,true);
		$user=$this->User->get_user($data);
		$submit =$this->input->post('loginSubmit' ,true);
		$error=false;
		if(!$user) $error=true;
		if (empty($data) || empty($user)) {
			$error = true;
		}
		else{ if($user['password']!=($data['password'])){ $error=true;}}
		if($error){
			if ($submit === "Submit") {
			 	$errors_log= 'Email or password is incorrect';
			 	$this->load->view('/registration.php',['errors_log'=> $errors_log]);
			}
			elseif ($submit === "loginSubmit") {
				$posts = array(
					'errors' => 'Email or password is incorrect',
					'result' => $this->stories_load()
					);
				$this->load->view('/stories.php',['posts'=> $posts]);
			}
			elseif ($submit === "Login") {
				$posts = array(
					'errors' => 'Email or password is incorrect',
					'result' => $this->activity_page()
					);
				$this->load->view('/activity.php',['posts'=>$posts]);
			}
			elseif ($submit === "Login_chat") {
				$chat = array(
					'errors' => 'Email or password is incorrect',
					'result' => $this->get_all_chat()
					);
				$this->load->view('/chat.php',['chat'=>$chat]);
			}
			elseif ($submit === "login_about_us") {
				$posts = array(
					'errors' => 'Email or password is incorrect'
					);
				$this->load->view('/about_us.php',['posts'=>$posts]);
			}
			else{
			 	$posts = array('errors' => 'Email or password is incorrect',
			 					'result' => $this->stories_load()
			 	 );
				$this->load->view('/home.php',['posts'=> $posts]);
			}
		}else{
			if ($submit === "loginSubmit") {
				$this->session->set_userdata(['first_name'=>$user['first_name']]);
				$this->session->set_userdata(['user_id'=>$user['id']]);
				$posts['result'] = $this->stories_load();
				$this->load->view('/stories.php',['posts'=>$posts]);
			}
			elseif ($submit === "Login") {
				$this->session->set_userdata(['first_name'=>$user['first_name']]);
				$this->session->set_userdata(['user_id'=>$user['id']]);
				$posts['result'] = $this->activity_page();
				$this->load->view('/activity.php',['posts'=>$posts]);
			}
			elseif ($submit === "Login_chat") {
				$this->session->set_userdata(['first_name'=>$user['first_name']]);
				$this->session->set_userdata(['user_id'=>$user['id']]);
				$chat['result'] = $this->get_all_chat();
				$this->load->view('/chat.php',['chat'=>$chat]);
			}
			elseif ($submit === "login_about_us") {
				$this->session->set_userdata(['first_name'=>$user['first_name']]);
				$this->session->set_userdata(['user_id'=>$user['id']]);
				$this->load->view('/about_us.php');
			}
			else{
				$this->session->set_userdata(['first_name'=>$user['first_name']]);
				$this->session->set_userdata(['user_id'=>$user['id']]);
				$posts['result'] = $this->stories_load();
				$this->load->view('/home.php',['posts'=>$posts]); 
			}
		}
	}

	public function register_page(){
		$this->load->library('form_validation');
		$this->load->view('registration');
	}
	public function register(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('User');
		$data= $this->input->post(NULL ,true);
		$email=$this->User->get_user($data);
		$name= $this->input->post('first_name' ,true);
            if (count($email)>0){
            	$error="Your email exist.";
            	$this->load->view('/registration.php',['error'=> $error]);
        	}elseif (count($email) == 0){
				$this->form_validation->set_rules('first_name','first name','trim|required|min_length[3]',array('required'=>'you must enter your first name','min_length[3]'=>'enter an text more than 3 chars'));

				$this->form_validation->set_rules('last_name','last name','trim|required|min_length[3]',array('required'=>'you must enter your last name','min_length[3]'=>'enter an text more than 3 chars'));

				$this->form_validation->set_rules('post_code','post code','trim|required|min_length[6]',array('required'=>'you must enter your post code','min_length[6]'=>'enter valid post code'));

				$this->form_validation->set_rules('email','Email','trim|required|valid_email',array('required'=>'you must enter your  email','valid_email'=>'enter valid email'));

				$this->form_validation->set_rules('password','Password','trim|required|min_length[8]',array('required'=>'you must enter your password','min_length[8]'=>'enter an password more than 8 chars'));

				$this->form_validation->set_rules('conf_password','confirm password','trim|required|matches[password]',array('required'=>'you must confirm you password ','matches[password]'=>'no match'));

				if ($this->form_validation->run()==false)
				{
					$this->load->view('/registration');
				}
				else{
				$this->User->insert_user($data);
				$this->session->set_userdata(['email'=>$data['email']]);
				$user=$this->User->get_user($data);
				$this->session->set_userdata(['first_name'=>$user['first_name']]);
				$this->session->set_userdata(['user_id'=>$user['id']]);
				//load the name instead of the sign in icon
				//in the nav bar
				$posts['result'] = $this->stories_load();
				$this->load->view('/home.php',['posts'=>$posts]); 
			}
		}
	}

	//show all the posts

	public function stories_load(){
		$this->load->model('User');
		$posts=array();
		$data=$this->User->get_all_post();

		for ($i=0; $i <count($data) ; $i++) 
		{ 
			array_push($posts
				,array(
				'id'=>$data[$i]['users_id'],
				'first_name'=>$data[$i]['first_name'],
				'last_name'=>$data[$i]['last_name'],
				'created_at'=>$data[$i]['created_at'],
				'title'=>$data[$i]['title'],
				'message'=>$data[$i]['message'],
				'messages_id'=>$data[$i]['id'],
				'comments'=>$this->User->get_all_comment($data[$i]['id']),
				'getComments'=>$this->User->get_count_comments($data[$i]['id'])
				)
			);
		}
			return $posts;
		}

	public function stories(){
		// $this->load->model('User');
		// $posts=array();
		// $data=$this->User->get_all_post();

		// for ($i=0; $i <count($data) ; $i++) 
		// { 
		// 	array_push($posts
		// 		,array(
		// 		'id'=>$data[$i]['users_id'],
		// 		'first_name'=>$data[$i]['first_name'],
		// 		'last_name'=>$data[$i]['last_name'],
		// 		'created_at'=>$data[$i]['created_at'],
		// 		'title'=>$data[$i]['title'],
		// 		'message'=>$data[$i]['message'],
		// 		'messages_id'=>$data[$i]['id'],
		// 		'comments'=>$this->User->get_all_comment($data[$i]['id'])
		// 		)
		// 	);
		// }
		$posts['result'] = $this->stories_load();
			$this->load->view('/stories.php',['posts'=> $posts]);
		}

	//insert a new post into messages tabel 
	public function insert_post(){
		$this->load->model('User');
		$data= $this->input->post(NULL ,true);
		$this->User->insert_post($data);
		$submit = $this->input->post('my_submit' ,true);
		if ($submit == "post") {
			redirect("/Activity/my_stories");
		}else{
		 redirect("/Activity/stories");
		}
	}

	public function insert_comment(){
		$this->load->model('User');
		$data= $this->input->post(NULL ,true);
		$this->User->insert_comment($data);
		 $submit = $this->input->post('my_submit' ,true);
		if ($submit == "Comment") {
			redirect("/Activity/my_stories");
		}else{
		 redirect("/Activity/stories");
		}
	}

	public function delete_comment(){
		$this->load->model('User');
		$data=$this->input->post(NULL ,true);
		$this->User->delete_comment($data);
		$submit = $this->input->post('delete_my_c' ,true);
		if ($submit == "delete") {
			redirect("/Activity/my_stories");
		}else{
		 redirect("/Activity/stories");
		}
	}

	

	public function update_comment(){
		$this->load->model('User');
		$data=$this->input->post(NULL ,true);
		$this->User->update_comment($data);
		 $submit = $this->input->post('update_my_c' ,true);
		if ($submit == "edit") {
			redirect("/Activity/my_stories");
		}else{
		 redirect("/Activity/stories");
		}
	}


	public function delete_post(){
		$this->load->model('User');
		$data=$this->input->post(NULL ,true);
		$this->User->delete_all_comment($data);
		$this->User->delete_post($data);
		$submit = $this->input->post('update_my_c' ,true);
		if ($submit == "delete") {
			redirect("/Activity/my_stories");
		}else{
		 redirect("/Activity/stories");
		}
	}

	public function update_post(){
		$this->load->model('User');
		$data=$this->input->post(NULL ,true);
		$this->User->update_post($data);
		$submit = $this->input->post('update_my_p' ,true);
		if ($submit == "edit") {
			redirect("/Activity/my_stories");
		}else{
		 redirect("/Activity/stories");
		}
	}

	public function profile(){
		$this->load->model('User');
		$data['result']=$this->User->get_profile();
		$this->load->view('/profile.php',['data'=>$data]);
	}

	public function edit_firstname(){
		$this->load->model('User');
		$data=$this->input->post(NULL ,true);
		$data=$this->User->edit_firstname($data);
		redirect("/Activity/profile");
	}

	public function edit_lastname(){
		$this->load->model('User');
		$data=$this->input->post(NULL ,true);
		$data=$this->User->edit_lastname($data);
		redirect("/Activity/profile");
	}

	public function edit_postcode(){
		$this->load->model('User');
		$data=$this->input->post(NULL ,true);
		$data=$this->User->edit_postcode($data);
		redirect("/Activity/profile");
	}

	public function edit_email(){
		$this->load->model('User');
		$data=$this->input->post(NULL ,true);
		$email=$this->User->get_user($data);
		if (count($email)>0) {
			$data = array('error' => "This email exist !! Put your correct email",
						  'result'=> $this->User->get_profile() 
			);
			$this->load->view('/profile.php',['data'=>$data]);
		}else{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email',array('required'=>'you must enter your  email','valid_email'=>'enter valid email'));

			if ($this->form_validation->run()==false) {
				$data = array('error' => "This email is incorrect !! Put your correct email",
						  'result'=> $this->User->get_profile() 
			);
			$this->load->view('/profile.php',['data'=>$data]);
			}

			else{
			$data=$this->User->edit_email($data);
			redirect("/Activity/profile");
			}
		}
	}

	public function my_stories(){
		$this->load->model('User');
		$posts=array();
		$data=$this->User->get_all_post();

		for ($i=0; $i <count($data) ; $i++) 
		{ 
			array_push($posts
				,array(
				'id'=>$data[$i]['users_id'],
				'first_name'=>$data[$i]['first_name'],
				'last_name'=>$data[$i]['last_name'],
				'created_at'=>$data[$i]['created_at'],
				'title'=>$data[$i]['title'],
				'message'=>$data[$i]['message'],
				'messages_id'=>$data[$i]['id'],
				'comments'=>$this->User->get_all_comment($data[$i]['id']),
				'getComments'=>$this->User->get_count_comments($data[$i]['id'])
				)
			);
		}
			$this->load->view('/my_stories.php',['post'=> $posts]);
		}


		public function activity_page(){
			$this->load->model('User');
			$posts=array();
			$data=$this->User->get_activity();
			for ($i=0; $i <count($data) ; $i++) 
			{
				array_push($posts
				,array(
				'id_users_activity'=>$data[$i]['id_users_activity'],
				'type_of_activity'=>$data[$i]['type_of_activity'],
				'activity_date'=>$data[$i]['activity_date'],
				'start_time'=>$data[$i]['start_time'],
				'end_time'=>$data[$i]['end_time'],
				'id'=>$data[$i]['id'],
				'Participants'=>$this->User->get_Participants($data[$i]['id']),
				'getParticipants'=>$this->User->get_all_Participants($data[$i]['id'])
				)
			);
			}
			return $posts;
			
		}

		public function activity_page_load(){
			$posts['result'] = $this->activity_page();
			$this->load->view('/activity.php',['posts'=>$posts]);
		}





		

		

		// public function activity_page_load(){
		// $this->load->model('User');
		// $result=$this->User->get_activity();
		// return $result;
		// }

		public function insert_activity(){
			$this->load->model('User');
			$data=$this->input->post(NULL ,true);
			$this->User->insert_activity($data);
			$activity = $this->activity_page();
			$this->User->insert_activity_creater_as_Participants($activity[0]['id']);
			redirect('/Activity/activity_page_load');
		}

		public function insert_Participants(){
			$this->load->model('User');
			$data=$this->input->post(NULL ,true);
			$this->User->insert_Participants($data);
			redirect("/Activity/activity_page_load");
		}
		
		public function delete_Participants(){
			$this->load->model('User');
			$data=$this->input->post(NULL ,true);
			$this->User->delete_Participants($data);
			$submit =$this->input->post('im_not_going' ,true);
			if ($submit === 'my_activity') {
				redirect("/Activity/my_activity");
			}
			redirect("/Activity/activity_page_load");
		}
		
		public function get_all_Participants(){
			$this->load->model('User');
			$Participants=$this->User->get_all_Participants();
			return $Participants;
		}

		public function my_activity(){
			$posts = array('result' => $this->my_activity_page(),
							'post' => $this->activity_page() );
			$this->load->view('/my_activity.php',['posts'=>$posts]);
		}

		public function my_activity_page(){
			$this->load->model('User');
			$posts=array();
			$data=$this->User->my_activity();
			for ($i=0; $i <count($data) ; $i++) 
			{
				array_push($posts
				,array(
				'type_of_activity'=>$data[$i]['type_of_activity'],
				'activity_date'=>$data[$i]['activity_date'],
				'start_time'=>$data[$i]['start_time'],
				'end_time'=>$data[$i]['end_time'],
				'id'=>$data[$i]['id'],
				'Participants'=>$this->User->get_Participants($data[$i]['id']),
				'getParticipants'=>$this->User->get_all_Participants($data[$i]['id'])
				)
			);
			}
			return $posts;
			
		}

		public function site_activity(){
			$posts['result'] = $this->site_activity_page();
			$this->load->view('/site_activity.php',['posts'=>$posts]);
		}

		public function site_activity_page(){
			$this->load->model('User');
			$posts=array();
			$input=$this->input->post(NULL ,true);
			$data=$this->User->activity_site($input);
			if ($data === 0) {
				redirect('/');
			}else{
			for ($i=0; $i <count($data) ; $i++) 
			{
				array_push($posts
				,array(
				'type_of_activity'=>$data[$i]['type_of_activity'],
				'activity_date'=>$data[$i]['activity_date'],
				'start_time'=>$data[$i]['start_time'],
				'end_time'=>$data[$i]['end_time'],
				'id'=>$data[$i]['id'],
				'Participants'=>$this->User->get_Participants($data[$i]['id']),
				'getParticipants'=>$this->User->get_all_Participants($data[$i]['id'])
				)
			);
			}
			return $posts;
			}
		}

		public function load_chat(){
		$chat['result'] = $this->get_all_chat();
		$this->load->view('/chat.php',['chat'=> $chat]);
		}

		public function get_all_chat(){
		$this->load->model('User');
		$chat=$this->User->get_all_chat();
		$last = end($chat)['chat'];
		$this->session->set_userdata(['last'=>$last]);
		return $chat;
		}

		public function get_comier_chat(){
		$chat['result'] = $this->get_all_chat();
		for ($i=0; $i < count($chat['result']); $i++) { 
        if ($this->session->userdata('user_id') === 
          $chat['result'][$i]['users_id']) {
              $class_name = "user-message";
            }else{
              $class_name = "normal-message";
            }
            echo '<div class="'.$class_name.' col-lg-12">

                    <h3>'. htmlspecialchars($chat['result'][$i]['first_name'].' '.$chat['result'][$i]['last_name']) .'</h3>
                    <p>'. htmlspecialchars($chat['result'][$i]['chat']).'</p>
                    <p>'. htmlspecialchars($chat['result'][$i]['created_at']).'</p>

                  </div>';
             }
              $last = end($chat['result'])['chat'];
              $this->session->set_userdata(['last'=>$last]);
		}

		public function insert_chat(){
		$this->load->model('User');
		$data= $this->input->post(NULL ,true);
		$this->User->insert_chat($data);
		$chat['result']=$this->User->get_all_chat();
		$this->load->view('/chat.php',['chat'=> $chat]);
	}

	public function get_chat(){
		$this->load->model('User');
		$chat['result']=$this->User->get_all_chat(); 
		for ($i=0; $i < count($chat['result']); $i++) { 
				echo '<p>'. $chat['result'][$i]['chat'] .'</p>';
				 }
					$last = end($chat['result'])['chat'];
					$this->session->set_userdata(['last_nor'=>$last]);
	}

	public function combering(){
		$last_nor = $this->session->userdata('last');
		$last = $this->session->userdata('last_nor');
		if ($last_nor !== $last) {
			echo "not equal";
			echo '<script type="text/javascript">
				    $( ".here" ).load("/index.php/Activity/get_comier_chat");
				  </script>
				  <script type="text/javascript">
					$(".here").animate({ scrollTop: 100000000000});
				  </script>';
		}
		else {
			echo "equal";
		}
	}






	public function map(){
		$data = array('result' =>$this->one_activity(),
					  'map' => $this->print_map()
		);
		if ($data['result'][0]['type_of_activity'] === NULL) {
			redirect('/');
		}else{
			$this->load->view('/oneActivity.php',['data'=> $data]);
		}
	}

	public function print_map(){
		$this->load->model('User');
		$this->load->library('googlemaps');
		$postcode = $this->one_activity();

		$config['center'] = "'".$postcode[0]['Postcode']."'";
		$config['zoom'] = '18';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = "'".$postcode[0]['Postcode']."'";
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		return $data;

	}

	public function one_activity(){
		$this->load->model('User');
			$posts=array();
			$data= $this->input->post(NULL ,true);
			$data=$this->User->get_one_activity($data);
			for ($i=0; $i <count($data) ; $i++) 
			{
				array_push($posts
				,array(
				'id_users_activity'=>$data[$i]['id_users_activity'],
				'type_of_activity'=>$data[$i]['type_of_activity'],
				'title'=>$data[$i]['title'],
				'activity_date'=>$data[$i]['activity_date'],
				'start_time'=>$data[$i]['start_time'],
				'end_time'=>$data[$i]['end_time'],
				'meeting_address'=>$data[$i]['meeting_address'],
				'Postcode'=>$data[$i]['Postcode'],
				'Description'=>$data[$i]['Description'],
				'id'=>$data[$i]['id'],
				'Participants'=>$this->User->get_Participants($data[$i]['id']),
				'getParticipants'=>$this->User->get_all_Participants($data[$i]['id'])
				)
			);
			}
			return $posts;
	}


	public function forget_password(){
		if ($this->session->userdata('first_name')) {
			redirect('/');
		}else{
		$this->load->view('/email.php');
		}
	}


	public function check_email(){
		$this->load->model('User');
		$data = $this->input->post(NULL ,true);
		if ($this->session->userdata('first_name')) {
			redirect('/');
		}
		elseif (empty($data)) {
				$error = 'please enter your email';
				$this->load->view('/email.php',['error'=>$error]);
			}
		else{
		$this->session->set_userdata(['r_email'=>$data['email']]);
			$check = $this->User->check_email($data);
			
			if ($check) {
				$characters = '0123456789abccdefghijklmnopkrstuvwxyzABCCDEFGHIJKLMNOPKRSTUVWXYZ';
				$code = '';
				for ($i=0; $i <10 ; $i++) { 
					$code .= $characters[rand(0, strlen($characters)-1)];
				}
				$this->User->update_code($code);
				$code_message = "Hello ".$this->session->userdata('r_email')." \r\n
				Someone has requested a code to change your password. You can do this \r\n through this code below.\r\n
				your code : ".$code."\r\n
				If you didn't request this, please ignore this email.\r\n
				Your password won't change until you enter this code above and create a \r\n new one.
				";
				$this->load->library('email');
				
				$this->email->from('No Reply@funider.com', 'Funider Team');
				$this->email->to($this->session->userdata('r_email'));
				//$this->email->cc('another@another-example.com');
				//$this->email->bcc('them@their-example.com');
				//$this->email->set_header('Header1', 'Value1');
				$this->email->subject('your code is');
				$this->email->message($code_message);

				$result = $this->email->send();
				if ($result) {
					$this->load->view('/code.php');
				}else{
					echo($this->email->print_debugger());
				}
			}else{
				$error = 'this email dose not exist';
				$this->load->view('/email.php',['error'=>$error]);
			}
		}
		
	}


		public function check_code(){
			$this->load->model('User');
			$data = $this->input->post(NULL ,true);
				$check = $this->User->check_code($data);
				if ($this->session->userdata('first_name')) {
					redirect('/');
				}
				elseif (empty($data)) {
					$error ='please enter the code';
					$this->load->view('/code.php',['error'=>$error]);
				}
				elseif ($check){
					$this->load->view('/new_password.php');
				}else{
					$error ='this code is incorrect';
					$this->load->view('/code.php',['error'=>$error]);
				}
		}

		public function set_new_password(){
			$this->load->library('form_validation');
			$this->load->model('User');
			$data= $this->input->post(NULL ,true);

			$info = $this->session->userdata('r_email');
			$password =$this->input->post('password' ,true);
			$conf_password =$this->input->post('conf_password' ,true);
			if ($this->session->userdata('first_name')) {
				redirect('/');
			}
			elseif (strlen($password)<8) {
				$info = $error1 = "enter an password more than 8 chars";
				$this->load->view('/new_password.php',['error1'=>$error1]);
			}elseif ($password !== $conf_password) {
				$error = "you must confirm you password";
				$this->load->view('/new_password.php',['error'=>$error]);
			}
			else{
				$this->User->new_password($data);
				redirect('/');
			}
		}

		public function contact_us(){
			$this->load->view('contact_us.php');
		}

		public function contact_pro(){
			$this->load->library('form_validation');
			$data= $this->input->post(NULL ,true);
				$this->form_validation->set_rules('name','name','trim|required|min_length[3]',array('required'=>'you must enter your first name','min_length[3]'=>'enter an text more than 3 chars'));
				$this->form_validation->set_rules('email','Email','trim|required|valid_email',array('required'=>'you must enter your  email','valid_email'=>'enter valid email'));

				$this->form_validation->set_rules('subject','subject','trim|required|min_length[3]',array('required'=>'you must enter your last name','min_length[3]'=>'enter an text more than 3 chars'));

				$this->form_validation->set_rules('message','message','trim|required|min_length[6]',array('required'=>'you must enter your post code','min_length[6]'=>'enter valid post code'));
				if ($this->form_validation->run()==false)
				{
					$this->load->view('contact_us.php');
				}
				else
				{
					$name = $this->input->post('name' ,true);
					$email=$this->input->post('email' ,true);
					$subject = $this->input->post('subject' ,true);
					$message = $this->input->post('message' ,true);
					
					$this->load->library('email');
					$this->email->from($email, $name);
					$this->email->to("mhd.anas.alrz@hotmail.com");
					//$this->email->cc('another@another-example.com');
					//$this->email->bcc('them@their-example.com');
					//$this->email->set_header('Header1', 'Value1');
					$this->email->subject("from funder submission 'contact us page' : ".$subject);
					$this->email->message($message);

					$result = $this->email->send();
					if ($result) {
						$done = "thank you";
						$this->load->view('/contact_us.php',['done'=>$done]);
					}else{
						echo($this->email->print_debugger());
					}
				}
				

		}

		//logoff
		public function logoff(){
			$this->session->sess_destroy();
			redirect('/');
		}

		public function logoff_stories(){
			$this->session->sess_destroy();
			redirect("/Activity/stories");
		}

		public function logoff_activity(){
			$this->session->sess_destroy();
			redirect("/Activity/activity_page_load");
		}

		public function logoff_chat(){
			$this->session->sess_destroy();
			redirect("/Activity/load_chat");
		}

		public function logoff_about_us(){
			$this->session->sess_destroy();
			redirect("/Activity/about_us");
		}
}


?>