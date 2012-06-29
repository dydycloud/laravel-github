<?php
/**
 * 
 */
class Curl
{
	public $github = 'https://api.github.com/';

	/*
	 * Get content via curl
	 * @param $url
	 * @returns $data array
	 */	
	public function request($url)
	{
		$url = $this->github . $url;
		
		$ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
	    $data = curl_exec($ch);
	    curl_close($ch);

	    return json_decode($data);		
	}
}
