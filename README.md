# open-day
A repository for the banfi open day registration website

## contributors

--

## documentation and style guide
The code documentation is based on the [PHPdoc](http://manual.phpdoc.org/HTMLframesConverter/default/) standard


For the complete style guide, please read the [style guide](style-guide.md) page

Please note:
- indentation must have only two spaces
- function names must be camelCase
- Class names MUST start with a capital letter and MUST be camelcase
- Class files must have the same name of the class
- variable names must be camelCase
- variables that contain unfiltered input (received for example from get or post parameters, or curl requests)
  must be prefixed with U\_
### example

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

  $username = $_GET['username'];

</pre>

&#8627; Incorrect because `$username`doesn't have the correct prefix.

#### &#10004; Correct

<pre lang=php>
&lt;?php

  $U_username = $_GET['username'];

</pre>

## libraries used

this is a list of the libraries used in this project, along with some useful articles and documentations

### php mailer

repository: [PHPMailer](https://github.com/PHPMailer/PHPMailer)

### PDO

[documentation](http://php.net/manual/en/book.pdo.php)

a very useful guide [phpdelusions.net/pdo](https://phpdelusions.net/pdo)

## useful resources

- [PDO](https://phpdelusions.net/pdo)
- [error handling](http://nyphp.org/PHundamentals/7_PHP-Error-Handling)

