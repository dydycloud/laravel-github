<?php
/**
 * 
 */
class Github_Repo_Controller extends Base_Controller
{
	public function __construct()
	{
		$this->git = new GitHub;
	}	
	/*
	 * Action for get_file
	 * @params repository
	 * @returns decoded and formatted content of specified file
	 */	
	public function action_get($repo, $file)
	{

		$data = $this->git->get_file($repo, $file);
		return str_replace(array('<?php', '?>'), array('&lt;?php', '?&gt;'), base64_decode($data->content));
	}
	
	/*
	 * Action for get_repo
	 * @params repository
	 * @returns array/json formatted repository information
	 */
	public function action_repo($repo)
	{
		return $data;
	}
	
	/*
	 * Action for get_commits
	 * @params repository
	 * @returns array/json formatted commits 
	 */
	public function action_commits($repo)
	{
		return $data;
	}
	
	/*
	 * Action for get_comments
	 * @params repository
	 * @returns array/json formatted comments
	 */
	public function action_comments($repo)
	{
		return $data;
	}
}
