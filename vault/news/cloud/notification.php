<?php
class Notification{
	private $title;
	private $message;
	private $image_url;
	private $action;
	private $action_destination;
	private $data;
	
	function __construct(){
         
	}
 
	public function setTitle($title){
		$this->title = $title;
	}
 
	public function setMessage($message){
		$this->message = $message;
	}
 
	public function setImage($imageUrl){
		$this->image_url = $imageUrl;
	}

	public function setPayload($data){
		$this->data = $data;
	}
	
	public function getNotificatin(){
		$notification = array();
		$notification['title'] = $this->title;
		$notification['body'] = $this->message;
		$notification['image-url'] = $this->image_url;
		return $notification;
	}
}
?>
