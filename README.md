# GitHub for Laravel

Get repository or file information/content from your Github

For highlighted and formatted code use a code hightlighter, check the list at the bottom for a few plugins.

## Currently Supported

- get (Get file content)
- repo (Get repository information)
- commits (Get commits from a repository or file)

## Upcomming Support

- comments (Get comments from a repository)

## Usage

### Get a file from your repository
#### In your controller:
$file_data = file_get_contents('http://example.com/github/get/myproject/index_php');
$my_file = json_decode($file_data, true);

return View::make('home.index')->with('my_file', $my_file);

####In your view:
{{ replace(base64_decode($my_file['content'])) }}

## Code highlighters

- SyntaxHighlighter (http://alexgorbatchev.com/SyntaxHighlighter)
- Jquery Syntaxhighlighter (https://github.com/balupton/jquery-syntaxhighlighter)
