<?php

class github {

private $_apiURL = 'https://api.github.com/';
private $token = 'ACCESS TOKEN HERE';

	public function get_repo($username,$repo){

		$repo_info = $this->get_with_curl($this->_apiURL.'repos/'.$username.'/'.$repo.'/contents?access_token='.$this->token);

		return $repo_info;
	}

	public function get_file_content($username, $repo, $path){

		$repo_content = $this->get_with_curl($this->_apiURL.'repos/'.$username.'/'.$repo.'/contents/'.$path.'?access_token='.$this->token);
		
		$content = $repo_content->content;

		$str = str_replace("\n", "", $content);
	
		$decoded_content = base64_decode($str);
		
		return $decoded_content;
	}

	public function get_file_date($username, $repo, $sha){
			
		$repo_commits = $this->get_with_curl($this->_apiURL.'repos/'.$username.'/'.$repo.'/commits?sha='.$sha.'&access_token='.$this->token);
			
		return $repo_commits;
	}

	private function get_with_curl($url){
	
		$ch = curl_init();
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$headers  =  array( "Accept:application/json" );
    	curl_setopt($ch, CURLOPT_USERAGENT, "SOME USER AGENT HERE");
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    	curl_setopt($ch, CURLOPT_URL, $url);
    	$data = curl_exec($ch);
       	curl_close($ch);
	
		$obj = json_decode($data);
	
		return $obj;
	}


}//class
?>