<?php
/**
 * 
 */
class GitHub extends Curl
{
	public $git_username;
	public $delimiter;
	public $use_cache;
	public $cache_duration;

	/*
	 * Set configuration variables
	 */
	public function __construct()
	{
		$this->git_username = GIT_USERNAME;
		$this->delimiter = PATH_DELIMITER;
		$this->use_cache = USE_CACHE;
		$this->cache_duration = CACHE_DURATION;
	}

	/*
	 * Get cached file
	 * @param repository, file
	 * @returns cached content
	 */
	public function get_cache($repo, $file)
	{
		$cache = Cache::get($repo . '-' . $file);

		return $cache;
	}
	
	/*
	 * Save cache
	 * @params repository, file, content
	 * @returns void
	 */
	public function put_cache($repo, $file, $content)
	{
		Cache::put($repo . '-' . $file, $content, $this->cache_duration);
	}

	/*
	 * Convert the path_string to a valid path
	 * @params $path_string (use a '-' as '/' and '_' as a '.')
	 * @returns a valid path
	 * 
	 * Example:
	 * css-layout-style_css becomes css/layout/style.css
	 */
	public function build_file_path($path_string)
	{	
		$path_array = explode($this->delimiter, $path_string);
		
		$path = '';
		
		foreach ($path_array as $segment) {
			$path .= '/' . str_replace('_', '.', $segment);
		}
		
		return $path;
	}
	
	/*
	 * Get file from the repository
	 * @params repository, file
	 * @returns file content
	 */
	public function get_file($repo, $file)
	{	
		$repo_file = NULL;
		
		// if cache is enabled, get the cache file
		if ($this->use_cache == TRUE)
		{
			$repo_file = $this->get_cache($repo, $file);
		}
	
		if ($repo_file == NULL)
		{
			$url = 'repos/' . $this->git_username . '/' . $repo . '/contents'. $this->build_file_path($file);

			$repo_file = $this->request($url);
		}
		
		if ($this->use_cache == TRUE)
		{
			$this->put_cache($repo, $file, $repo_file);
		}
		
		return $repo_file;
	}
	
	public function get_commits($repo)
	{
		//GET /repos/:user/:repo/commits
		$commits_file = NULL;
		
		// if cache is enabled, get the cache file
		if ($this->use_cache == TRUE)
		{
			$commits_file = $this->get_cache($repo, '_commits');
		}
	
		if ($commits_file == NULL)
		{
			$url = 'repos/' . $this->git_username . '/' . $repo . '/commits';

			$commits_file = $this->request($url);
		}
		
		if ($this->use_cache == TRUE)
		{
			$this->put_cache($repo, '_commits', $commits_file);
		}
		
		if (is_array($commits_file))
		{
			return json_encode($commits_file, true);
		}
		else {
			return $commits_file;
		}	
	}
	
	public function get_repo($repo)
	{
		//GET /repos/:user/:repo
		$repository = NULL;
		
		// if cache is enabled, get the cache file
		if ($this->use_cache == TRUE)
		{
			$repository = $this->get_cache($repo, '_repo');
		}
	
		if ($repository == NULL)
		{
			$url = 'repos/' . $this->git_username . '/' . $repo;

			$repository = $this->request($url);
		}
		
		if ($this->use_cache == TRUE)
		{
			$this->put_cache($repo, '_repo', $repository);
		}
		
		if (is_array($repository))
		{
			return json_encode($repository, true);
		}
		else {
			return $repository;
		}
	}
}