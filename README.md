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
$file_data = file_get_contents('http://example.com/github/get/myproject/index_php');<br/>
$my_file = json_decode($file_data, true);

return View::make('home.index')->with('my_file', $my_file);

#### In your view:
{{ replace(base64_decode($my_file['content'])) }}

<a name="repo"></a>
### Get repository information

#### In your controller:

#### In your view:

<a name="commits"></a>
### Get commits from your repository or file

#### In your controller:

#### In your view:

## Code highlighters

- SyntaxHighlighter (http://alexgorbatchev.com/SyntaxHighlighter)
- Jquery Syntaxhighlighter (https://github.com/balupton/jquery-syntaxhighlighter)
