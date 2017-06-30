<?php
/**
* create 3 tabels users , messages , comments
* the tabel users has ( id first_name, last_name, post_code, email, password, created_at, 
	updated_at )
* the tabel messages has ( id - users_id - title - message - created_at - updated_at )
* the tabel comments has ( id_c - messages_id - users_messages_id -comment - created_at - updated_at )
*/
class User extends CI_Model
{
	//sign in method 
	public function get_user($data) {
		if (empty($data)) {
			$email = 0;
		}
		else {
			$email=($data['email']);
		}
		
		$query = "SELECT * FROM users Where email =? ";
		$values = [$email];
		return $this->db->query($query, $values)->row_array();
	}

	//sign up method
	public function insert_user($data) {
		$query = "INSERT INTO users (first_name, last_name, post_code, email, password, code, created_at, updated_at) values (?,?,?,?,?,?,NOW(),NOW())";
		$values = [$data['first_name'], $data['last_name'], $data['post_code'], $data['email'], $data['password'],1];
		return $this->db->query($query, $values);
	}

	//print all the posts 
	public function get_all_post (){
		 return $this->db->query('SELECT first_name,last_name,users_id,title,messages.created_at,message,messages.id as id FROM messages , users where messages.users_id=users.id ORDER BY messages.id DESC')->result_array();
	}

	//add a new post into the DB
	public function insert_post($data) {
		$query = "INSERT INTO messages (title, message, created_at, updated_at, users_id) values (?,?,NOW(),NOW(),?)";
        $values = [$data['title'], $data['message'], $this->session->userdata('user_id')];
		return $this->db->query($query,$values);
	}

	public function insert_comment($data) {
		$query = "INSERT INTO comments (comment, created_at, updated_at, messages_id, users_messages_id) values (?,NOW(),NOW(),?,?)";
        $values = [$data['comment'], $data['message'], $this->session->userdata('user_id')];
		return $this->db->query($query,$values);
	}

	public function get_all_comment ($id){
		 $query = 'SELECT * FROM comments RIGHT JOIN messages ON comments.messages_id=messages.id join users on users.id = comments.users_messages_id WHERE comments.messages_id=? ORDER BY messages.created_at DESC';
		 $values=[$id];
		 return $this->db->query($query,$values)->result_array();
	}

	public function update_comment($data){
		$query = "UPDATE comments SET comment =? , updated_at = NOW(),users_messages_id =?  WHERE id_c=?  ";
		$values=[$data['comment'], $this->session->userdata('user_id'), $data['messages']];
		return $this->db->query($query,$values);
	}

	public function delete_comment($data){
		$query = "DELETE FROM comments WHERE id_c=?  ";
		$values=[$data['message']];
		return $this->db->query($query,$values);
	}

	public function delete_all_comment($data){
		$query = "DELETE FROM comments WHERE messages_id=?  ";
		$values = [$data['message']];
		return $this->db->query($query,$values);
	}

	public function delete_post($data){
		$query = "DELETE FROM messages WHERE id=?  ";
		$values = [$data['message']];
		return $this->db->query($query,$values);
	}	

	public function update_post($data){
		$query = "UPDATE messages SET message =? ,title=?, updated_at = NOW() WHERE id=?";
		$values = [$data['message'],$data['title'],$data['messages']];
		return $this->db->query($query,$values);
	}

	public function get_profile(){
		$query = 'SELECT * FROM users where id=?';
		$values = [$this->session->userdata('user_id')];
		return $this->db->query($query,$values)->result_array();
	}

	public function edit_firstname($data){
		$query = "UPDATE users SET first_name =? WHERE id=?";
		$values = [$data['new_firstname'],$this->session->userdata('user_id')];
		return $this->db->query($query,$values);
	}

	public function edit_lastname($data){
		$query = "UPDATE users SET last_name =? WHERE id=?";
		$values = [$data['new_lastname'],$this->session->userdata('user_id')];
		return $this->db->query($query,$values);
	}

	public function edit_postcode($data){
		$query = "UPDATE users SET post_code =? WHERE id=?";
		$values = [$data['new_postcode'],$this->session->userdata('user_id')];
		return $this->db->query($query,$values);
	}

	public function edit_email($data){
		$query = "UPDATE users SET email =? WHERE id=?";
		$values = [$data['email'],$this->session->userdata('user_id')];
		return $this->db->query($query,$values);
	}

	public function insert_activity($data){
		$query = "INSERT INTO activities (id_users_activity, type_of_activity, title, activity_date, start_time, end_time, meeting_address, Postcode, Description, created_at, updated_at) values (?,?,?,?,?,?,?,?,?,NOW(),NOW())";
        $values = [$this->session->userdata('user_id'),$data['taskOption'], $data['title_name'],$data['data_activity'],$data['start_time'],$data['end_time'],$data['meeting_address'],$data['post_code'],$data['description']];
		return $this->db->query($query,$values);
	}

	public function insert_activity_creater_as_Participants($id){
		$query = "INSERT INTO Participants (user_id, activity_id) values (?,?)";
		$values = [$this->session->userdata('user_id'),$id];
		return $this->db->query($query,$values);
	}

	public function get_activity(){
		$query = 'SELECT * FROM activities ORDER BY id DESC';
		return $this->db->query($query)->result_array();
	}

	public function my_activity(){
		$query = 'SELECT * FROM activities where id_users_activity=? ORDER BY id DESC';
		$values = [$this->session->userdata('user_id')];
		return $this->db->query($query,$values)->result_array();
	}

	public function activity_site($input){
		if (empty($input)) {
			return 0;
		}else{
		$query = 'SELECT * FROM activities where type_of_activity=? ORDER BY id DESC';
		$values = [$input['activity_name']];
		return $this->db->query($query,$values)->result_array();
		}
	}

	public function insert_Participants($data){
		$query = "INSERT INTO Participants (user_id, activity_id) values (?,?)";
		$values = [$this->session->userdata('user_id'),$data['activity_id']];
		return $this->db->query($query,$values);
	}

	public function get_Participants($id){
		$query = 'SELECT * FROM Participants RIGHT JOIN activities ON Participants.activity_id=activities.id join users on users.id = Participants.user_id WHERE Participants.activity_id=? AND Participants.user_id=?';
		$values = [$id,$this->session->userdata('user_id')];
		$result = $this->db->query($query,$values);
		$result1 = $this->db->query($query,$values)->result_array();
		if ($result->num_rows() > 0) {
			return $result1;
		}
		else{
			return "not going";
		}
	}

	public function get_all_Participants($id){
		$query = 'SELECT * FROM Participants RIGHT JOIN activities ON Participants.activity_id=activities.id join users on users.id = Participants.user_id WHERE Participants.activity_id=?';
		$values = [$id];
		$result = $this->db->query($query,$values);
		return $result->num_rows();
	}

	public function delete_Participants($data){
		$query = "DELETE FROM Participants WHERE user_id=? AND activity_id =?";
		$values = [$this->session->userdata('user_id'),$data['activity_id']];
		return $this->db->query($query,$values);
	}


	public function get_all_chat (){
		 return $this->db->query('SELECT * FROM chats join users on chats.users_id=users.id ORDER BY chats.created_at ASC')->result_array();
	}

	public function insert_chat($data) {
		if (empty($data)) {
			 return 0;
		}else{
		$query = "INSERT INTO chats (chat, created_at, updated_at, users_id) values (?,NOW(),NOW(),?)";
        $values = [$data['chat'], $this->session->userdata('user_id')];
		return $this->db->query($query,$values);
		}
	}

	public function get_one_activity($data){
		if (empty($data)) {
			 return 0;
		}else{
		$query = 'SELECT * FROM activities where id=?';
		$values = $data['activity_id'];
		return $this->db->query($query,$values)->result_array();
		}
	}

	public function check_email($data){
		if (empty($data)) {
			$email = 0;
		}
		else {
			$email=($data['email']);
		}
		
		$query = "SELECT * FROM users Where email =? ";
		$values = [$email];
		return $this->db->query($query, $values)->row_array();
	}

	public function update_code($code){
		$query = "UPDATE users SET code =? , updated_at = NOW() WHERE email=?  ";
		$values=[$code , $this->session->userdata('r_email')];
		return $this->db->query($query,$values);
	}
	public function check_code($data){
		if (empty($data)) {
			$email = 0;
			$code = 0;
		}
		else {
			$email=($data['email']);
			$code = ($data['code']);
		}
		$query = "SELECT * FROM users Where email =? and code=?";
		$values = [$email,$code];
		return $this->db->query($query, $values)->row_array();
	}

	public function new_password($data){
		$query = "UPDATE users SET password=? , updated_at = NOW() WHERE email=?  ";
		$values=[$data['password'] , $this->session->userdata('r_email')];
		return $this->db->query($query,$values);
	}
	//this is contact method (send email)
	/*
	public function contact()
	{
	    $this->form_validation->set_rules('name','Name','required|alpha|min_length[3]|max_length[15]|trim',array(
	    'required'=>'You must eneter data to field',
	    'alpha'=>'please enter only letters',
	    'min_length[3]'=>'the name must at least 3 letters'
	    ));

	    $this->form_validation->set_rules('email','Email','required|trim|valid_email',array(
	    'required'=>'You must eneter data to field',
	    'valid_email'=>'please enter valid email',
	    
	    ));

	    $this->form_validation->set_rules('message','Message',
	    'required|min_length[3]|max_length[1000]|trim',array(
	    'required'=>'You must enter data to field',
	    'min_length[3]'=>'the name must at least 3 letters'
	    ));
	    
	    if ($this->form_validation->run()==false) 
	    {
	        $error_message['error'] = "sorry there is an problem right now please try later"
	        $this->load->view('contact.php',$error_message);
	    }
	    else{
	    $to="mhd.anas.alrz@hotmail.com , eyobielyebio@gmail.com , somebodyelse@example.com";
	    $name = $this->input->post('name',TRUE);
	    $subject="from your website Activate Contact(Form " . $name . " )";
	    $email=$this->input->post('email',TRUE);
	    $message=$this->input->post('message',TRUE) . "\n";
	    $headers = "from:".$email ."\r\n";
	        mail($to,$subject,$message,$headers);
	    $error_message = "your mail has been sent thanks you!!"
	    $this->load->view('contact.php',$error_message);
	    }
	}
	*/
}

?>