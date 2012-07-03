# GitHub for Laravel

Get repository or file information/content from your Github

For highlighted and formatted code use a code hightlighter, check the list at the bottom for a few plugins.

## Currently Supported

- [get (Get file content)] (#get)
- [repo (Get repository information)] (#repo)
- [commits (Get commits from a repository or file)] (#commits)

## Upcomming Support

- comments (Get comments from a repository)

## Usage
Returns file data in json format
<a name="get"></a>
### Get a file from your repository

#### In your controller:

$file_data = file_get_contents('http://example.com/github/get/myproject/index_php');<br>
$my_file = json_decode($file_data, true);

return View::make('home.index')->with('my_file', $my_file);

#### In your view:

{{ replace(base64_decode($my_file['content'])) }}

<a name="repo"></a>
### Get repository information

#### In your controller:

$repo_data = file_get_contents('http://example.com/github/repo/myproject'); <br>
$my_repo = json_decode($repo_data, true);

return View::make('home.index')->with('my_repo', $my_repo);

#### In your view:

{{ $my_repo['description'] }}

##### Check section <> GET at http://developer.github.com/v3/repos/ for full response data.

<a name="commits"></a>
### Get commits from your repository or file

#### In your controller:

$commits_data = file_get_contents('http://example.com/github/commits/myproject'); <br>
$my_commits = json_decode($commits_data, true);

return View::make('home.index')->with('my_commits', $my_commits);

#### In your view:

{{ $my_commits['url'] }}

##### Check section <> List commits on a repository at http://http://developer.github.com/v3/repos/commits/ for full response data.

## Code highlighters

- SyntaxHighlighter (http://alexgorbatchev.com/SyntaxHighlighter)
- Jquery Syntaxhighlighter (https://github.com/balupton/jquery-syntaxhighlighter)
