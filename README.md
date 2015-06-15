GITHUB API 
==========
I use the Github API quite a lot so am going to start posting some of my code in this repository.

Files
-----
* **GithubMiniClass:** is the class I use to on my blog. 

Example Usage Usage:
--------------------

```php
require 'githubminiclass.php';

=======


$obj = new github();
$username = 'harveytoro';
$path = '1WelcomePost.html';
$repo_name = 'myblog';

$content = $obj->get\_file\_content($username, $repo_name, $path);
echo $content;
```



=======
$content = $obj->get_file_content($username, $repo_name, $path);
 
echo $content;
```

