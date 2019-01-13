# PHP Style Guide

https://gist.github.com/ryansechrest/8138375

All rules and guidelines in this document apply to PHP files unless otherwise noted. References to PHP/HTML files can be interpreted as files that primarily contain HTML, but use PHP for templating purposes.

> The keywords "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD", "SHOULD NOT", "RECOMMENDED",  "MAY", and "OPTIONAL" in this document are to be interpreted as described in [RFC 2119](http://www.ietf.org/rfc/rfc2119.txt).

Most sections are broken up into two parts:

1. Overview of all rules with a quick example
2. Each rule called out with examples of do's and don'ts

**Icon Legend**:

`·` Space, `⇥` Tab, `↵` Enter/Return

<!-- ---------------------------------------------------------------------- -->

## Table of Contents

1. [**Files**](#1-files)
	1. [File Format](#file-format)
	2. [Filename](#filename)
2. [**Skeleton**](#2-skeleton)
3. [**PHP Tags**](#3-php-tags)
	1. [Open Tag](#1-open-tag)
	2. [Close Tag](#2-close-tag)
	3. [Open/Close Tag](#3-openclose-tag)
	4. [Short Open Tag](#4-short-open-tag)
	5. [Short Echo Tag](#5-short-echo-tag)
4. [**End of File**](#4-end-of-file)
5. [**Namespaces**](#5-namespaces)
	1. [Namespace Declaration](#1-namespace-declaration)
	2. [Namespace Name](#2-namespace-name)
	3. [Multiple Namespaces](#3-multiple-namespaces)
	4. [Magic Constant](#4-magic-constant)
6. [**Comments**](#6-comments)
	1. [Single-line Comments](#1-single-line-comments)
	2. [Multi-line Comments](#2-multi-line-comments)
	3. [Header Comments](#3-header-comments)
	4. [Divider Comments](#4-divider-comments)
	5. [Comments](#5-comments)
	6. [Blocks of Code](#6-blocks-of-code)
	7. [Ambiguous Numbers](#7-ambiguous-numbers)
	8. [External Variables](#8-external-variables)
7. [**Includes**](#7-includes)
	1. [Include/Require Once](#1-includerequire-once)
	2. [Parenthesis](#2-parenthesis)
	3. [Purpose of Include](#3-purpose-of-include)
8. [**Formatting**](#8-formatting)
	1. [Line Length](#1-line-length)
	2. [Line Indentation](#2-line-indentation)
	3. [Blank Lines](#3-blank-lines)
	4. [Text Alignment](#4-text-alignment)
	5. [Trailing Whitespace](#5-trailing-whitespace)
	6. [Keywords](#6-keywords)
	7. [Variables](#7-variables)
	8. [Global Variables](#8-global-variables)
	9. [Constants](#9-constants)
	10. [Statements](#10-statements)
	11. [Operators](#11-operators)
	12. [Unary Operators](#12-unary-operators)
	13. [Concatenation Period](#13-concatenation-period)
	14. [Single Quotes](#14-single-quotes)
	15. [Double Quotes](#15-double-quotes)
9. [**Functions**](#9-functions)
	1. [Function Name](#1-function-name)
	2. [Function Prefix](#2-function-prefix)
	3. [Function Call](#3-function-call)
	4. [Function Arguments](#4-function-arguments)
	5. [Function Declaration](#5-function-declaration)
	6. [Function Return](#6-function-return)
10. [**Control Structures**](#10-control-structures)
	1. [If, Elseif, Else](#1-if-elseif-else)
	2. [Switch, Case](#2-switch-case)
	3. [While, Do While](#3-while-do-while)
	4. [For, Foreach](#4-for-foreach)
	5. [Try, Catch](#5-try-catch)
11. [**Classes**](#11-classes)
	1. [Class File](#1-class-file)
	2. [Class Namespace](#2-class-namespace)
	3. [Class Name](#3-class-name)
	4. [Class Documentation](#4-class-documentation)
	5. [Class Definition](#5-class-definition)
	6. [Class Properties](#6-class-properties)
	7. [Class Methods](#7-class-methods)
	8. [Class Instance](#8-class-instance)
12. [**Best Practices**](#12-best-practices)
	1. [Variable Initialization](#1-variable-initialization)
	2. [Initialization/Declaration Order](#2-initializationdeclaration-order)
	3. [Globals](#3-globals)
	4. [Explicit Expressions](#4-explicit-expressions)
	5. [E_STRICT Reporting](#5-e_strict-reporting)

<!-- ---------------------------------------------------------------------- -->

## 1. Files

This section describes the format and naming convention of PHP files.

#### File Format

1. **Character encoding** MUST be set to UTF-8 without BOM
	* Sublime.app &rarr; `File` &#8250; `Save with Encoding` &#8250; `UTF-8`
2. **Line endings** MUST be set to Unix (LF)
	* Sublime.app &rarr; `View` &#8250; `Line Endings` &#8250; `Unix`

#### Filename

1. **Letters** MUST be all lowercase
	* e.g. `autoloader.php`
2. **Words** MUST be separated with a hyphen
	* e.g. `app-config.php`

&#9650; [Table of Contents](#table-of-contents)

<!-- ---------------------------------------------------------------------- -->

## 2. Skeleton

This section showcases a barebones PHP file with its minimum requirements.

Line by line breakdown:

* **Line 1**: PHP open tag
* **Line 2**: Blank line
* **Line 3**: Your code
* **Line 4**: Blank line
* **Line 5**: End-of-file comment
* **Line 6**: Blank line

<pre lang=php>
&lt;?php

// your code

// EOF
 
</pre>

&#9650; [Table of Contents](#table-of-contents)

<!-- ---------------------------------------------------------------------- -->

## 3. PHP Tags

This section describes the use of PHP tags in PHP and PHP/HTML files.

1. [**Open tag**](#1-open-tag) MUST be on its own line and MUST be followed by a blank line
	* i.e. `<?php` `↵` `↵` `...`
2. [**Close tag**](#2-close-tag) MUST NOT be used in PHP files
	* i.e. no `?>`
3. [**Open/close tag**](#3-openclose-tag) MUST be on one line in PHP/HTML files
	* i.e. `<?php ... ?>`
4. [**Short open tag**](#4-short-open-tag) MUST NOT be used
	* i.e. `<?` &rarr; `<?php`
5. [**Short echo tag**](#5-short-echo-tag) SHOULD be used in PHP/HTML files
	* i.e. `<?php echo` &rarr; `<?=`

&#9650; [Table of Contents](#table-of-contents)

<!-- ------------------------------ -->

### 1. Open Tag

Open tag MUST be on its own line and MUST be followed by a blank line.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php print_welcome_message();
</pre>

&#8627; Incorrect because `<?php` is not on its own line.

<pre lang=php>
&lt;?php
print_welcome_message();
</pre>

&#8627; Incorrect because `<?php` is not followed by a blank line.

#### &#10004; Correct

<pre lang=php>
&lt;?php

print_welcome_message();
</pre>

&#9650; [PHP Tags](#3-php-tags)

<!-- ------------------------------ -->

### 2. Close Tag

Close tag MUST NOT be used in PHP files.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

print_welcome_message();

?&gt;
</pre>

&#8627; Incorrect because `?>` was used.

#### &#10004; Correct

<pre lang=php>
&lt;?php

print_welcome_message();
</pre>

&#9650; [PHP Tags](#3-php-tags)

<!-- ------------------------------ -->

### 3. Open/Close Tag

Open/close tag MUST be on one line in PHP/HTML files.

#### &#10006; Incorrect

<pre lang=html>
&lt;div&gt;
	&lt;h1&gt;&lt;?php
	print_welcome_message();
	?&gt;&lt;/h1&gt;
&lt;/div&gt;
</pre>

&#8627; Incorrect because `<?php` and `?>` are not on one line.

#### &#10004; Correct

<pre lang=html>
&lt;div&gt;
	&lt;h1&gt;&lt;?php print_welcome_message(); ?&gt;&lt;/h1&gt;
&lt;/div&gt;
</pre>

&#9650; [PHP Tags](#3-php-tags)

<!-- ------------------------------ -->

### 4. Short Open Tag

Short open tag MUST NOT be used.

#### &#10006; Incorrect

<pre lang=php>
&lt;?

print_welcome_message();
</pre>

&#8627; Incorrect because `<?` was used instead of `<?php`.

#### &#10004; Correct

<pre lang=php>
&lt;?php

print_welcome_message();
</pre>

&#9650; [PHP Tags](#3-php-tags)

<!-- ------------------------------ -->

### 5. Short Echo Tag

Short echo tag SHOULD be used in PHP/HTML files.

#### ~ Acceptable

<pre lang=html>
&lt;div&gt;
	&lt;p&gt;&lt;?php echo get_welcome_message(); ?&gt;&lt;/p&gt;
&lt;/div&gt;
</pre>

&#8627; Acceptable, but `<?=` should be used over `<?php echo` when possible.

#### &#10004; Preferred

<pre lang=html>
&lt;div&gt;
	&lt;p&gt;&lt;?= get_welcome_message(); ?&gt;&lt;/p&gt;
&lt;/div&gt;
</pre>

&#9650; [PHP Tags](#3-php-tags)

<!-- ---------------------------------------------------------------------- -->

## 4. End of File

This section describes how every PHP file must end.

End-of-file comment:

* MUST be included at the end of a file
	* i.e. `// EOF`
* MUST be on its own line
	* i.e. `↵` `// EOF`
* MUST be surrounded by blank lines
	* i.e. `...` `↵` `↵` `// EOF` `↵`

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

print_welcome_message();
</pre>

&#8627; Incorrect because `// EOF` is missing.

<pre lang=php>
&lt;?php

print_welcome_message(); // EOF
</pre>

&#8627; Incorrect because `// EOF` is not on its own line.

<pre lang=php>
&lt;?php

print_welcome_message();
// EOF
</pre>

&#8627; Incorrect because `// EOF` is not surrounded by blank lines.

#### &#10004; Correct

<pre lang=php>
&lt;?php

print_welcome_message();

// EOF
 
</pre>

&#9650; [Table of Contents](#table-of-contents)

<!-- ---------------------------------------------------------------------- -->

## 5. Namespaces

This section describes how to use one or more namespaces and their naming convention.

1. [**Namespace declaration**](#1-namespace-declaration) MUST be the first statement and MUST be followed by a blank line
	* i.e. `<?php` `↵` `↵` `namespace MyCompany;` `↵` `↵` `...`
2. [**Namespace name**](#2-namespace-name) MUST start with a capital letter and MUST be camelcase
	* e.g. `namespace MyCompany;`
3. [**Multiple namespaces**](#3-multiple-namespaces) MUST use the curly brace syntax
	* i.e. `namespace MyCompany { ... }`
4. [**Magic constant**](#4-magic-constant) SHOULD be used to reference the namespace name
	* i.e. `__NAMESPACE__`

&#9650; [Table of Contents](#table-of-contents)

<!-- ------------------------------ -->

### 1. Namespace Declaration

Namespace declaration MUST be the first statement and MUST be followed by a blank line.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

print_welcome_message();

namespace MyCompany;

// EOF
 
</pre>

&#8627; Incorrect because `namespace MyCompany;` is not the first statement.

<pre lang=php>
&lt;?php

namespace MyCompany;
print_welcome_message();

// EOF
 
</pre>

&#8627; Incorrect because `namespace MyCompany;` is not followed by a blank line.

#### &#10004; Correct

<pre lang=php>
&lt;?php

namespace MyCompany;

print_welcome_message();

// EOF
 
</pre>

&#9650; [Namespaces](#5-namespaces)

<!-- ------------------------------ -->

### 2. Namespace Name

Namespace name MUST start with a capital letter and MUST be camelcase.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

namespace myCompany;

// EOF
 
</pre>

&#8627; Incorrect because `myCompany` does not start with a capital letter.

<pre lang=php>
&lt;?php

namespace MyCOMPANY;

// EOF
 
</pre>

&#8627; Incorrect because `MyCOMPANY` is not written in camelcase.

#### &#10004; Correct

<pre lang=php>
&lt;?php

namespace MyCompany;

// EOF
 
</pre>

&#9650; [Namespaces](#5-namespaces)

<!-- ------------------------------ -->

### 3. Multiple Namespaces

Multiple namespaces MUST use the curly brace syntax.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

namespace MyCompany\View;

// EOF
 
</pre>

&#8627; Incorrect because there are two namespaces and the curly brace syntax was not used.

#### &#10004; Correct

<pre lang=php>
&lt;?php

namespace MyCompany\Model {
	// model body
}

namespace MyCompany\View {
	// view body
}

// EOF
 
</pre>

&#9650; [Namespaces](#5-namespaces)

<!-- ------------------------------ -->

### 4. Magic Constant

Magic constant SHOULD be used to reference the namespace name.

#### ~ Acceptable

<pre lang=php>
&lt;?php

namespace MyCompany\Model {
	// model body
}

namespace MyCompany\View {
	$welcome_message = MyCompany\View\get_welcome_message();
}

// EOF
 
</pre>

&#8627; Acceptable, but using `__NAMESPACE__` instead of `MyCompany\View` is preferred.

#### &#10004; Preferred

<pre lang=php>
&lt;?php

namespace MyCompany\Model {
	// ModuleOne body
}

namespace MyCompany\View {
	$welcome_message = __NAMESPACE__ . '\\' . get_welcome_message();
}

// EOF
 
</pre>

&#9650; [Namespaces](#5-namespaces)

<!-- ---------------------------------------------------------------------- -->

## 6. Comments

This section describes how comments should be formatted and used.

1. **[Single-line comments](#1-single-line-comments)** MUST use two forward slashes
	* e.g. `// My comment`
2. **[Multi-line comments](#2-multi-line-comments)** MUST use the block format
	* i.e. `/**` `↵` `* My comment` `↵` `*/`
3. **[Header comments](#3-header-comments)** SHOULD use the block format
	* i.e. `/**` `↵` `* Name of code section` `↵` `*/`
4. **[Divider comments](#4-divider-comments)** SHOULD use the block format with asterisks in between
	* i.e. `/**` `75 asterisks` `*/`
5. **[Comments](#5-comments)** MUST be on their own line
	* i.e. `↵` `// My comment`
6. **[Blocks of code](#6-blocks-of-code)** SHOULD be explained or summarized
	* e.g. `// Compare user accounts from export against expired accounts in system`
7. **[Ambiguous numbers](#7-ambiguous-numbers)** MUST be clarified
	* e.g. `// 1,000 processable records per hour API limit`
8. **[External variables](#8-external-variables)** MUST be clarified
	* e.g. `// Database object included in file.php`

&#9650; [Table of Contents](#table-of-contents)

<!-- ------------------------------ -->

### 1. Single-line Comments

Single-line comments MUST use two forward slashes.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

/* This is a comment */

// EOF
 
</pre>

&#8627; Incorrect because it uses `/*` and `*/` for a single-line comment.

#### &#10004; Correct

<pre lang=php>
&lt;?php

// This is a comment

// EOF
 
</pre>

&#9650; [Comments](#6-comments)

<!-- ------------------------------ -->

### 2. Multi-line Comments

Multi-line comments MUST use the block format.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

// This is a
// multi-line
// comment

// EOF
 
</pre>

&#8627; Incorrect because it uses `//` for a multi-line comment.

#### &#10004; Correct

<pre lang=php>
&lt;?php

/**
 * This is a
 * multi-line
 * comment
 */

// EOF
 
</pre>

&#9650; [Comments](#6-comments)

<!-- ------------------------------ -->

### 3. Header Comments

Header comments SHOULD use the block format.

<pre lang=php>
&lt;?php

/**
 * Global application settings
 */

define('SETTING_ONE', '');
define('SETTING_TWO', '');
define('SETTING_THREE', '');

// EOF
 
</pre>

&#9650; [Comments](#6-comments)

<!-- ------------------------------ -->

### 4. Divider Comments

Divider comments SHOULD use the block format with 75 asterisks in between.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

/**#######################################################################*/

// EOF
 
</pre>

&#8627; Incorrect because it uses `#` instead of `*`.

<pre lang=php>
&lt;?php

/*************/

// EOF
 
</pre>

&#8627; Incorrect because it uses 10 instead of 75 `*`.

#### &#10004; Correct

<pre lang=php>
&lt;?php

/**
 * Beginning + Middle + End
 * 3 spaces + 75 spaces + 2 spaces = 80 character line limit
 */

/******************************************************************************/

// EOF
 
</pre>

&#9650; [Comments](#6-comments)

<!-- ------------------------------ -->

### 5. Comments

Comment MUST be on their own line.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

print_welcome_message(); // Prints welcome message

// EOF
 
</pre>

&#8627; Incorrect because `// Prints welcome message` is not on its own line.

#### &#10004; Correct

<pre lang=php>
&lt;?php

// Prints welcome message
print_welcome_message();

// EOF
 
</pre>

&#9650; [Comments](#6-comments)

<!-- ------------------------------ -->

### 6. Blocks of Code

Blocks of code SHOULD be explained or summarized.

#### ~ Acceptable

<pre lang=php>
&lt;?php

foreach ($users as $user) {
	if ($expr1) {
		// ...
	} else {
		// ...
	}
	if ($expr2) {
		// ...
	} elseif ($expr3) {
		// ...
	} else {
		// ...
	}
	// ...
}

// EOF
 
</pre>

&#8627; Acceptable, but block of code should be explained or summarized.

#### &#10004; Preferred

<pre lang=php>
&lt;?php

/**
 * Get active website bloggers with profile photo for author page.
 * If no photo exists on website, check intranet.
 * If neither location has photo, send user email to upload one.
 */
foreach ($users as $user) {
	if ($expr1) {
		// ...
	} else {
		// ...
	}
	if ($expr2) {
		// ...
	} elseif ($expr3) {
		// ...
	} else {
		// ...
	}
	// ...
}

// EOF
 
</pre>

&#9650; [Comments](#6-comments)

<!-- ------------------------------ -->

### 7. Ambiguous Numbers

Ambiguous numbers MUST be clarified.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

while ($expr && $x &lt; 1000) {
	// ...
}

// EOF
 
</pre>

&#8627; Incorrect because `1000` is not clarified.

#### &#10004; Correct

<pre lang=php>
&lt;?php

// Script times out after 1,000 records
while ($expr && $x &lt; 1000) {
	// ...
}

// EOF
 
</pre>

&#9650; [Comments](#6-comments)

<!-- ------------------------------ -->

### 8. External Variables

External variables MUST be clarified.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

include_once 'some-file.php';

// ...

foreach($users as $user) {
	// ...
}

// EOF
 
</pre>

&#8627; Incorrect because source of `$users` is not clear.

#### &#10004; Correct

<pre lang=php>
&lt;?php

include_once 'some-file.php';

// ...

// $users from some-file.php
foreach($users as $user) {
	// ...
}

// EOF
 
</pre>

&#9650; [Comments](#6-comments)

<!-- ---------------------------------------------------------------------- -->

## 7. Includes

This section describes the format for including and requiring files.

1. [**Include/require once**](#1-includerequire-once) SHOULD be used
	* i.e. `include` &rarr; `include_once`, `require` &rarr; `require_once`
2. [**Parenthesis**](#2-parenthesis) MUST NOT be used
	* e.g. `include_once('file.php');` &rarr; `include_once 'file.php';`
3. [**Purpose of include**](#3-purpose-of-include) MUST be documented with a comment
	* e.g. `// Provides WordPress environment` `↵` `require_once 'wp-load.php';`

&#9650; [Table of Contents](#table-of-contents)

<!-- ------------------------------ -->

### 1. Include/Require Once

Include/require once SHOULD be used.

#### ~ Acceptable

<pre lang=php>
&lt;?php

include 'some-file.php';
require 'some-other-file.php';

// EOF
 
</pre>

&#8627; Acceptable, but `_once` should be appended to `include` and `require` if possible.

#### &#10004; Preferred

<pre lang=php>
&lt;?php

include_once 'some-file.php';
require_once 'some-other-file.php';

// EOF
 
</pre>

&#9650; [Includes](#7-includes)

<!-- ------------------------------ -->

### 2. Parenthesis

Parenthesis MUST NOT be used.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

include_once('some-file.php');
require_once('some-other-file.php');

// EOF
 
</pre>

&#8627; Incorrect because `include_once` and `require_once` are used with parenthesis.

#### &#10004; Correct

<pre lang=php>
&lt;?php

include_once 'some-file.php';
require_once 'some-other-file.php';

// EOF
 
</pre>

&#9650; [Includes](#7-includes)

<!-- ------------------------------ -->

### 3. Purpose of Include

Purpose of include MUST be documented with a comment.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

require_once 'some-file.php';

// EOF
 
</pre>

&#8627; Incorrect because there is no comment as to what `some-file.php` does or provides.

#### &#10004; Correct

<pre lang=php>
&lt;?php

// Provides XYZ framework
require_once 'some-file.php';

// EOF
 
</pre>

&#9650; [Includes](#7-includes)

<!-- ---------------------------------------------------------------------- -->

## 8. Formatting

This section outline various, general formatting rules related to whitespace and text.

1. [**Line length**](#1-line-length) MUST NOT exceed 80 characters, unless it is text
	* i.e. `|---- 80+ chars ----|` &rarr; refactor expression and/or break list values
2. [**Line indentation**](#2-line-indentation) MUST be accomplished using tabs
	* i.e. `function func() {` `↵` `⇥` `...` `↵` `}`
3. [**Blank lines**](#3-blank-lines) SHOULD be added between logical blocks of code
	* i.e. `...` `↵` `↵` `...`
4. [**Text alignment**](#4-text-alignment) MUST be accomplished using spaces
	* i.e. `$var` `·` `·` `·` `= ...;`
5. [**Trailing whitespace**](#5-trailing-whitespace) MUST NOT be present after statements or serial comma break or on blank lines
	* i.e. no `...` `·` `·` `↵` `·` `↵` `...`
6. [**Keywords**](#6-keywords) MUST be all lowercase
	* e.g. `false`, `true`, `null`, etc.
7. [**Variables**](#7-variables) MUST be all lowercase and words MUST be separated by an underscore
	* e.g. `$welcome_message`
8. [**Global variables**](#8-global-variables) MUST be declared one variable per line and MUST be indented after the first
	* e.g. `global $var1,` `↵` `⇥` `$var2;`
9. [**Constants**](#9-constants) MUST be all uppercase and words MUST be separated by an underscore
	* e.g. `WELCOME_MESSAGE`
10. [**Statements**](#10-statements) MUST be placed on their own line and MUST end with a semicolon
	* e.g. `welcome_message();`
11. [**Operators**](#11-operators) MUST be surrounded by a space
	* e.g. `$total = 15 + 7;`, `$var .= '';`
12. [**Unary operators**](#12-unary-operators) MUST be attached to their variable or integer
	* e.g. `$index++`, `--$index`
13. [**Concatenation period**](#13-concatenation-period) MUST be surrounded by a space
	* e.g. `echo 'Read:' . $welcome_message;`
14. [**Single quotes**](#14-single-quotes) MUST be used
	* e.g. `echo 'Hello, World!';`
15. [**Double quotes**](#15-double-quotes) SHOULD NOT be used
	* e.g. `echo "Read: $welcome_message";` &rarr; `echo 'Read: ' . $welcome_message;`

&#9650; [Table of Contents](#table-of-contents)

<!-- ------------------------------ -->

### 1. Line Length

Line length MUST NOT exceed 80 characters, unless it is text.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

if(in_array('Slumdog Millionaire', $movies) && in_array('Silver Linings Playbook', $movies) && in_array('The Lives of Others', $movies) && in_array('The Shawshank Redemption', $movies)) {
	// if body
}

// EOF
 
</pre>

&#8627; Incorrect because expression exceeds 80 characters and should be refactored.

<pre lang=php>
&lt;?php

$my_movies = array('Slumdog Millionaire', 'Silver Linings Playbook', 'The Lives of Others', 'The Shawshank Redemption');

// EOF
 
</pre>

&#8627; Incorrect because arguments exceed 80 characters and should be placed on their own line.

#### ~ Acceptable

<pre lang=php>
&lt;?php

$text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec posuere rutrum tincidunt. Duis lacinia laoreet diam, nec consectetur magna facilisis eget. Quisque elit mauris, auctor quis vulputate id, sagittis nec tortor. Praesent fringilla lorem eu massa convallis ultricies. Maecenas lacinia porta purus, sollicitudin condimentum felis mollis a. Proin sed augue purus. Quisque scelerisque eros vitae egestas porta. Suspendisse vitae purus justo. Pellentesque justo nunc, luctus quis magna sit amet, venenatis rutrum ante. Nam eget nisi ultricies, sodales lectus vel, luctus dui. Cras pellentesque augue vitae nulla laoreet convallis. Mauris ut turpis mollis, elementum arcu eu, semper risus. Mauris vel urna ut felis blandit dictum. Aliquam sit amet tincidunt arcu. Nunc et elit quam. Aliquam hendrerit magna ut lacus semper consequat blandit eu ipsum.';

// EOF
 
</pre>

&#8627; Acceptable because line length was exceeded due to text, not code.

#### &#10004; Correct

<pre lang=php>
&lt;?php

$my_movies = array(
	'Slumdog Millionaire',
	'Silver Linings Playbook',
	'The Lives of Others',
	'The Shawshank Redemption'
);

$has_all_movies = true;

foreach($my_movies as $my_movie) {
	if(!in_array($my_movie, $movies)) {
		$has_all_movies = false;
	}
}

if($has_all_movies) {
	// if body
}

$some_long_variable = get_something_else(
	'from_some_other_function',
	'another_long_argument'
);

// EOF
 
</pre>

&#9650; [Formatting](#8-formatting)

<!-- ------------------------------ -->

### 2. Line Indentation

Line indentation MUST be accomplished using tabs.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

function print_welcome_message() {
    echo WELCOME_MESSAGE;
}

// EOF
 
</pre>

&#8627; Incorrect because spaces are used to indent `echo WELCOME_MESSAGE;` instead of a tab.

#### &#10004; Correct

<pre lang=php>
&lt;?php

function print_welcome_message() {
	echo WELCOME_MESSAGE;
}

// EOF
 
</pre>

&#9650; [Formatting](#8-formatting)

<!-- ------------------------------ -->

### 3. Blank Lines

Blank lines SHOULD be added between logical blocks of code.

#### ~ Acceptable

<pre lang=php>
&lt;?php

$my_movies = array(
	'Slumdog Millionaire',
	'Silver Linings Playbook',
	'The Lives of Others',
	'The Shawshank Redemption'
);
$has_all_movies = true;
foreach($my_movies as $my_movie) {
	if(!in_array($my_movie, $movies)) {
		$has_all_movies = false;
	}
}
if($has_all_movies) {
	// if body
}

// EOF

</pre>

&#8627; Acceptable, but can make scanning code more difficult.

#### &#10004; Preferred

<pre lang=php>
&lt;?php

$my_movies = array(
	'Slumdog Millionaire',
	'Silver Linings Playbook',
	'The Lives of Others',
	'The Shawshank Redemption'
);

$has_all_movies = true;

foreach($my_movies as $my_movie) {
	if(!in_array($my_movie, $movies)) {
		$has_all_movies = false;
	}
}

if($has_all_movies) {
	// if body
}

// EOF
 
</pre>

&#9650; [Formatting](#8-formatting)

<!-- ------------------------------ -->

### 4. Text Alignment

Text alignment MUST be accomplished using spaces.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

$movie_quotes = array(
	'slumdog_millionaire'		=> 'When somebody asks me a question, I tell them the answer.',
	'silver_linings_playbook'	=> 'I opened up to you, and you judged me.',
	'the_lives_of_others'		=> 'To think that people like you ruled a country.',
	'the_shawshank_redemption'	=> 'Get busy living, or get busy dying.'
);

// EOF
 
</pre>

&#8627; Incorrect because tabs are used instead of spaces to vertically align `=>`.

<pre lang=php>
&lt;?php

$movie_quotes = array(
    'slumdog_millionaire'       => 'When somebody asks me a question, I tell them the answer.',
    'silver_linings_playbook'   => 'I opened up to you, and you judged me.',
    'the_lives_of_others'       => 'To think that people like you ruled a country.',
    'the_shawshank_redemption'  => 'Get busy living, or get busy dying.'
);

// EOF
 
</pre>

&#8627; Incorrect because spaces are used instead of tabs to indent array keys.

#### &#10004; Correct

<pre lang=php>
&lt;?php

$movie_quotes = array(
	'slumdog_millionaire'       => 'When somebody asks me a question, I tell them the answer.',
	'silver_linings_playbook'   => 'I opened up to you, and you judged me.',
	'the_lives_of_others'       => 'To think that people like you ruled a country.',
	'the_shawshank_redemption'  => 'Get busy living, or get busy dying.'
);

// EOF
 
</pre>

&#9650; [Formatting](#8-formatting)

<!-- ------------------------------ -->

### 5. Trailing Whitespace

Trailing whitespace MUST NOT be present after statements or serial comma break or on blank lines.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

$quotes_exist = false;  

print_welcome_message();

// EOF
 
</pre>

&#8627; Incorrect because there are two spaces after `$quotes_exist = false;`.

<pre lang=php>
&lt;?php

$my_movies = array(
	'Slumdog Millionaire', 
	'Silver Linings Playbook', 
	'The Lives of Others', 
	'The Shawshank Redemption'
);

// EOF
 
</pre>

&#8627; Incorrect because there is a space after `,`.

<pre lang=php>
&lt;?php

$quotes_exist = false;
  
print_welcome_message();

// EOF
 
</pre>

&#8627; Incorrect because there are two spaces on the blank line below `$quotes_exist = false;`.

#### &#10004; Correct

<pre lang=php>
&lt;?php

$quotes_exist = false;

print_welcome_message();

// EOF
 
</pre>

<pre lang=php>
&lt;?php

$my_movies = array(
	'Slumdog Millionaire',
	'Silver Linings Playbook',
	'The Lives of Others',
	'The Shawshank Redemption'
);

// EOF
 
</pre>

&#9650; [Formatting](#8-formatting)

<!-- ------------------------------ -->

### 6. Keywords

Keywords MUST be all lowercase.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

$is_true = FALSE;
$is_false = TRUE:
$movie_quote = NULL;

// EOF
 
</pre>

&#8627; Incorrect because `FALSE`, `TRUE` and `NULL` are not all lowercase.

#### &#10004; Correct

<pre lang=php>
&lt;?php

$is_true = false;
$is_false = true:
$movie_quote = null;

// EOF
 
</pre>

&#9650; [Formatting](#8-formatting)

<!-- ------------------------------ -->

### 7. Variables

Variables MUST be all lowercase and words MUST be separated by an underscore.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

$welcome_Message = '';
$Welcome_Message = '';
$WELCOME_MESSAGE = '';

// EOF
 
</pre>

&#8627; Incorrect because `$welcome_Message`, `$Welcome_Message` and `$WELCOME_MESSAGE` are not all lowercase.

<pre lang=php>
&lt;?php

$welcomemessage = '';

// EOF
 
</pre>

&#8627; Incorrect because `welcome` and `message` are not separated with an underscore.

#### &#10004; Correct

<pre lang=php>
&lt;?php

$welcome_message = '';

// EOF
 
</pre>

&#9650; [Formatting](#8-formatting)

<!-- ------------------------------ -->

### 8. Global Variables

Global variables MUST be declared one variable per line and MUST be indented after the first.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

global $app_config, $cache, $db_connection;

// EOF
 
</pre>

&#8627; Incorrect because `$app_config`, `$cache` and `$db_connection` are together on one line.

<pre lang=php>
&lt;?php

global $app_config,
$cache,
$db_connection;

// EOF
 
</pre>

&#8627; Incorrect because `$db_connection` and `$cache` are not indentend once.

#### &#10004; Correct

<pre lang=php>
&lt;?php

global $app_config,
	$cache,
	$db_connection;

// EOF
 
</pre>

&#9650; [Formatting](#8-formatting)

<!-- ------------------------------ -->

### 9. Constants

Constants MUST be all uppercase and words MUST be separated by an underscore.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

define('welcome_Message', '');
define('Welcome_Message', '');
define('welcome_message', '');

// EOF
 
</pre>

&#8627; Incorrect because `welcome_Message`, `Welcome_Message` and `welcome_message` are not all uppercase.

<pre lang=php>
&lt;?php

define('WELCOMEMESSAGE', '');

// EOF
 
</pre>

&#8627; Incorrect because `WELCOME` and `MESSAGE` are not separated with an underscore.

#### &#10004; Correct

<pre lang=php>
&lt;?php

define('WELCOME_MESSAGE', '');

// EOF
 
</pre>

&#9650; [Formatting](#8-formatting)

<!-- ------------------------------ -->

### 10. Statements

Statements MUST be placed on their own line and MUST end with a semicolon.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

$quotes_exist = false; print_welcome_message();

// EOF
 
</pre>

&#8627; Incorrect because `$quotes_exist = false;` and `print_welcome_message();` are on one line.

<pre lang=html>
&lt;div&gt;
	&lt;h1&gt;&lt;?= print_welcome_message() ?&gt;&lt;/h1&gt;
&lt;/div&gt;
</pre>

&#8627; Incorrect because `print_welcome_message()` is missing a semicolon.

#### &#10004; Correct

<pre lang=php>
&lt;?php

$quotes_exist = false;
print_welcome_message();

// EOF
 
</pre>

<pre lang=html>
&lt;div&gt;
	&lt;h1&gt;&lt;?= print_welcome_message() ?&gt;&lt;/h1&gt;
&lt;/div&gt;
</pre>

&#9650; [Formatting](#8-formatting)

<!-- ------------------------------ -->

### 11. Operators

Operators MUST be surrounded a space.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

$total=3+14;
$string='Hello, World! ';
$string.='Today is a good day!';

// EOF
 
</pre>

&#8627; Incorrect because there is no space surrounding the `=`, `+` or `.=` sign.

#### &#10004; Correct

<pre lang=php>
&lt;?php

$total = 3 + 14;
$string = 'Hello, World! ';
$string .= 'Today is a good day!';

// EOF
 
</pre>

&#9650; [Formatting](#8-formatting)

<!-- ------------------------------ -->

### 12. Unary Operators

Unary operators MUST be attached to their variable or integer.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

$index ++;
-- $index;

// EOF
 
</pre>

&#8627; Incorrect because there is a space before `++` and after `--`.

#### &#10004; Correct

<pre lang=php>
&lt;?php

$index++;
--$index;

// EOF
 
</pre>

&#9650; [Formatting](#8-formatting)

<!-- ------------------------------ -->

### 13. Concatenation Period

Concatenation period MUST be surrounded by a space.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

echo 'Hello, World! Today is '.$date.'!';

// EOF
 
</pre>

&#8627; Incorrect because there is no space surrounding `.`.

#### &#10004; Correct

<pre lang=php>
&lt;?php

echo 'Hello, World! Today is ' . $date . '!';

// EOF
 
</pre>

&#9650; [Formatting](#8-formatting)

<!-- ------------------------------ -->

### 14. Single Quotes

Single quotes MUST be used.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

echo "Hello, World!";

// EOF
 
</pre>

&#8627; Incorrect because `"Hello, World!"` is not written with single quotes.

#### &#10004; Correct

<pre lang=php>
&lt;?php

echo 'Hello, World!';

// EOF
 
</pre>

&#9650; [Formatting](#8-formatting)

<!-- ------------------------------ -->

### 15. Double Quotes

Double quotes SHOULD NOT be used.

#### ~ Acceptable

<pre lang=php>
&lt;?php

echo "Hello, World! Today is $date!";

// EOF
 
</pre>

&#8627; Acceptable, but burries the `$date` variable, which is why single quotes are preferred.

<pre lang=php>
&lt;?php

echo "Hello, World! He's watching movies and she's reading books.";

// EOF
 
</pre>

&#8627; Acceptable when long pieces of text have apostrophies that would need to be escaped.

#### &#10004; Preferred

<pre lang=php>
&lt;?php

echo 'Hello, World! Today is ' . $date . '!';

echo 'Hello, World! He\'s watching movies and she\'s reading books.';

// EOF
 
</pre>

&#9650; [Formatting](#8-formatting)

<!-- ---------------------------------------------------------------------- -->

## 9. Functions

This section describes the format for function names, calls, arguments and declarations.

1. [**Function name**](#1-function-name) MUST be all lowercase and words MUST be separated by an underscore
	* e.g. `function welcome_message() {`
2. [**Function prefix**](#2-function-prefix) MUST start with verb
	* e.g. `get_`, `add_`, `update_`, `delete_`, `convert_`, etc.
3. [**Function call**](#3-function-call) MUST NOT have a space between function name and open parenthesis
	* e.g. `func();`
4. [**Function arguments**](#4-function-arguments)
	* MUST NOT have a space before the comma
	* MUST have a space after the comma
	* MAY use line breaks for long arguments
	* MUST then place each argument on its own line
	* MUST then indent each argument once
	* MUST be ordered from required to optional first
	* MUST be ordered from high to low importance second
	* MUST use descriptive defaults
	* MUST use type hinting
	* e.g. `func($arg1, $arg2 = 'asc', $arg3 = 100);`
5. [**Function declaration**](#5-function-declaration) MUST be documented using [phpDocumentor](http://phpdoc.org/docs/latest/index.html) tag style and SHOULD include
	* Short description
	* Optional long description, if needed
	* @access: `private` or `protected` (assumed `public`)
	* @author: Author name
	* @global: Global variables function uses, if applicable
	* @param: Parameters with data type, variable name, and description
	* @return: Return data type, if applicable
6. [**Function return**](#6-function-return)
	* MUST occur as early as possible 
	* MUST be initialized prior at top
	* MUST be preceded by blank line, except inside control statement
	* i.e. `if (!$expr) { return false; }`

&#9650; [Table of Contents](#table-of-contents)

<!-- ------------------------------ -->

### 1. Function Name

Function name MUST be all lowercase and words MUST be separated by an underscore.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

get_Welcome_Message();
Get_Welcome_Message();
GET_WELCOME_MESSAGE();

// EOF
 
</pre>

&#8627; Incorrect because the function names are not all lowercase.

<pre lang=php>
&lt;?php

getwelcomemessage();

// EOF
 
</pre>

&#8627; Incorrect because `get`, `welcome` and `message` are not separated with an underscore.

#### &#10004; Correct

<pre lang=php>
&lt;?php

get_welcome_message();

// EOF
 
</pre>

&#9650; [Functions](#9-functions)

<!-- ------------------------------ -->

### 2. Function Prefix

Function prefix MUST start with verb.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

active_users();
network_location($location1, $location2);
widget_form($id);

// EOF
 
</pre>

&#8627; Incorrect because functions are not prefixed with a verb.

#### &#10004; Correct

<pre lang=php>
&lt;?php

get_active_users();
move_network_location($location1, $location2);
delete_widget_form($id);

// EOF
 
</pre>

&#9650; [Functions](#9-functions)

<!-- ------------------------------ -->

### 3. Function Call

Function call MUST NOT have a space between function name and open parenthesis.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

print_welcome_message ();

// EOF
 
</pre>

&#8627; Incorrect because there is a space between `get_welcome_message` and `()`.

#### &#10004; Correct

<pre lang=php>
&lt;?php

print_welcome_message();

// EOF
 
</pre>

&#9650; [Functions](#9-functions)

<!-- ------------------------------ -->

### 4. Function Arguments

Function arguments:

* MUST NOT have a space before the comma
* MUST have a space after the comma
* MAY use line breaks for long arguments
* MUST then place each argument on its own line
* MUST then indent each argument once
* MUST be ordered from required to optional first
* MUST be ordered from high to low importance second
* MUST use descriptive defaults
* MUST use type hinting

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

my_function($arg1 , $arg2 , $arg3);

// EOF
 
</pre>

&#8627; Incorrect because there is a space before `,`.

<pre lang=php>
&lt;?php

my_function($arg1,$arg2,$arg3);

// EOF
 
</pre>

&#8627; Incorrect because there is no space after `,`.

<pre lang=php>
&lt;?php

my_other_function($arg1_with_a_really_long_name,
	$arg2_also_has_a_long_name,
	$arg3
);

// EOF
 
</pre>

&#8627; Incorrect because `$arg1_with_a_really_long_name` is not on its own line.

<pre lang=php>
&lt;?php

my_other_function(
$arg1_with_a_really_long_name,
$arg2_also_has_a_long_name,
$arg3
);

// EOF
 
</pre>

&#8627; Incorrect because arguments are not indented once.

<pre lang=php>
&lt;?php

function get_objects($type, $order = 'asc', $limit) {
	// ...
}

// EOF
 
</pre>

&#8627; Incorrect because `$type`, `$order` and `$limit` are not in order of required to optional.

<pre lang=php>
&lt;?php

function get_objects($limit, $order, $type) {
	// ...
}

// EOF
 
</pre>

&#8627; Incorrect because `$limit`, `$order` and `$type` are not in order of importance.

<pre lang=php>
&lt;?php

function get_objects($type, $order = true, $limit = 100) {
	// ...
}

// EOF
 
</pre>

&#8627; Incorrect because `true` is not a descriptive default for `$order`.

<pre lang=php>
&lt;?php

function add_users_to_office($users, $office) {
	// ...
}

// EOF
 
</pre>

&#8627; Incorrect because `$users` and `$office` are missing their data type.

#### &#10004; Correct

<pre lang=php>
&lt;?php

my_function($arg1, $arg2, $arg3);

my_other_function(
	$arg1_with_a_really_long_name,
	$arg2_also_has_a_long_name,
	$arg3
);

function get_objects($type, $order = 'asc', $limit = 100) {
	// ...
}

function add_users_to_office(array $users, Office $office) {
	// ...
}

// EOF
 
</pre>

&#9650; [Functions](#9-functions)

<!-- ------------------------------ -->

### 5. Function Declaration

Function declaration MUST be documented using [phpDocumentor](http://phpdoc.org/docs/latest/index.html) tag style and SHOULD include:

* Short description
* Optional long description, if needed
* @access: `private` or `protected` (assumed `public`)
* @author: Author name
* @global: Global variables function uses, if applicable
* @param: Parameters with data type, variable name, and description
* @return: Return data type, if applicable

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

function my_function($id, $type, $width, $height) {
	// ...
	return $Photo;
}

// EOF
 
</pre>

&#8627; Incorrect because `my_function` is not documented.

#### &#10004; Correct

<pre lang=php>
&lt;?php

/**
 * Get photo from blog author
 * 
 * Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id volutpat 
 * orci. Etiam pharetra eget turpis non ultrices. Pellentesque vitae risus 
 * sagittis, vehicula massa eget, tincidunt ligula.
 *
 * @access private
 * @author Firstname Lastname
 * @global object $post
 * @param int $id Author ID
 * @param string $type Type of photo
 * @param int $width Photo width in px
 * @param int $height Photo height in px
 * @return object Photo
 */
function my_function($id, $type, $width, $height) {
	// ...
	return $Photo;
}

// EOF
 
</pre>

&#9650; [Functions](#9-functions)

<!-- ------------------------------ -->

### 6. Function Return

Function return:

* MUST occur as early as possible 
* MUST be initialized prior at top
* MUST be preceded by blank line, except inside control statement

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

function get_object() {
	$var = false;
	if($expr1) {
		// ...
		if($expr2) {
			// ...
		}
	}

	return $var;
}

// EOF
 
</pre>

&#8627; Incorrect because `get_object` does not return as early as possible.

<pre lang=php>
&lt;?php

function get_movies() {
	// ...

	return $movies;
}

// EOF
 
</pre>

&#8627; Incorrect because `$movies` is not initialized at top.

<pre lang=php>
&lt;?php

function get_movies() {
	$movies = array();
	// ...
	return $movies;
}

// EOF
 
</pre>

&#8627; Incorrect because `return $movies` is not preceded by blank line.

#### &#10004; Correct

<pre lang=php>
&lt;?php

function get_object() {
	$var = false;
	if (!$expr1) {
		return $var;
	}
	if (!$expr2) {
		return $var;
	}
	// ...

	return $var;
}

// EOF
 
</pre>

<pre lang=php>
&lt;?php

function get_movies() {
	$movies = array();
	// ...

	return $movies;
}

// EOF
 
</pre>

&#9650; [Functions](#9-functions)

<!-- ---------------------------------------------------------------------- -->

## 10. Control Structures
This section defines the layout and usage of control structures. Note that this section is separated into rules that are applicable to all structures, followed by specific rules for individual structures.

* **Keyword** MUST be followed by a space
	* e.g. `if (`, `switch (`, `do {`, `for (`
* **Opening parenthesis** MUST NOT be followed by a space
	* e.g. `($expr`, `($i`
* **Closing parenthesis** MUST NOT be preceded by a space
	* e.g. `$expr)`, `$i++)`, `$value)`
* **Opening brace** MUST be preceded by a space and MUST be followed by a new line
	* e.g. `$expr) {`, `$i++) {`
* **Structure body** MUST be indented once and MUST be enclosed with curly braces (no shorthand)
	* e.g. `if ($expr) {` `↵` `⇥` `...` `↵` `}`
* **Closing brace** MUST start on the next line
	* i.e. `...` `↵` `}`
* **Nesting** MUST NOT exceed three levels
	* e.g. no `if ($expr1) { if ($expr2) { if ($expr3) { if ($expr4) { ` `...` `}}}}`

In addition to the rules above, some control structures have additional requirements:

1. [**If, Elseif, Else**](#1-if-elseif-else)
	* `elseif` MUST be used instead of `else if`
	* `elseif` and `else` MUST be between `}` and `{` on one line
2. [**Switch, Case**](#2-switch-case)
	* Case statement MUST be indented once
		* i.e. `⇥` `case 1:`
	* Case body MUST be indented twice
		* i.e. `⇥` `⇥` `func();`
	* Break keyword MUST be indented twice
		* i.e. `⇥` `⇥` `break;`
	* Case logic MUST be separated by one blank line
		* i.e. `case 1: ... break;` `↵` `↵` `case 2: ... break;`
3. [**While, Do While**](#3-while-do-while)
4. [**For, Foreach**](#4-for-foreach)
5. [**Try, Catch**](#5-try-catch)
	* `catch` MUST be between `}` and `{` on one line

&#9650; [Table of Contents](#table-of-contents)

<!-- ------------------------------ -->

### 1. If, Elseif, Else
* `elseif` MUST be used instead of `else if`
* `elseif` and `else` MUST be between `}` and `{` on one line

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

if ($expr1) {
	// if body
} else if ($expr2) {
	// elseif body
} else {
	// else body
}

// EOF
 
</pre>

&#8627; Incorrect because `else if` was used instead of `elseif`.

<pre lang=php>
&lt;?php

if ($expr1) {
	// if body
}
elseif ($expr2) {
	// elseif body
}
else {
	// else body
}

// EOF
 
</pre>

&#8627; Incorrect because `elseif` and `else` are not between `}` and `{` on one line.

<pre lang=php>
&lt;?php

$result1 = if ($expr1) ? true : false;

if($expr2)
	$result2 = true;

// EOF
 
</pre>

&#8627; Incorrect because structure body is not wrapped in curly braces.

#### &#10004; Correct

<pre lang=php>
&lt;?php

if ($expr1) {
	// if body
} elseif ($expr2) {
	// elseif body
} else {
	// else body
}

if ($expr1) {
	$result1 = true;
} else {
	$result1 = false;
}

if ($expr2) {
	$result2 = true;
}

// EOF
 
</pre>

&#9650; [Control Structures](#10-control-structures)

<!-- ------------------------------ -->

### 2. Switch, Case
* Case statement MUST be indented once
* Case body MUST be indented twice
* Break keyword MUST be indented twice
* Case logic MUST be separated by one blank line

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

switch ($expr) {
case 0:
	echo 'First case, with a break';
	break;

case 1:
	echo 'Second case, which falls through';
	// no break
case 2:
case 3:
case 4:
	echo 'Third case, return instead of break';
	return;

default:
	echo 'Default case';
	break;
}

// EOF
 
</pre>

&#8627; Incorrect because `case 0` thru `default` are not indented once.

<pre lang=php>
&lt;?php

switch ($expr) {
	case 0:
	echo 'First case, with a break';
	break;

	case 1:
	echo 'Second case, which falls through';
	// no break
	case 2:
	case 3:
	case 4:
	echo 'Third case, return instead of break';
	return;

	default:
	echo 'Default case';
	break;
}

// EOF
 
</pre>

&#8627; Incorrect because `echo`, `break` and `return` are not indented twice.

<pre lang=php>
&lt;?php

switch ($expr) {
	case 0:
		echo 'First case, with a break';
		break;
	case 1:
		echo 'Second case, which falls through';
		// no break
	case 2:
	case 3:
	case 4:
		echo 'Third case, return instead of break';
		return;
	default:
		echo 'Default case';
		break;
}

// EOF
 
</pre>

&#8627; Incorrect because `case 0`, `case 1` thru `case 4`, and `default` are not separated by one blank line.

#### &#10004; Correct

<pre lang=php>
&lt;?php

switch ($expr) {
	case 0:
		echo 'First case, with a break';
		break;

	case 1:
		echo 'Second case, which falls through';
		// no break
	case 2:
	case 3:
	case 4:
		echo 'Third case, return instead of break';
		return;

	default:
		echo 'Default case';
		break;
}

// EOF
 
</pre>

&#9650; [Control Structures](#10-control-structures)

<!-- ------------------------------ -->

### 3. While, Do While

#### &#10004; Correct

<pre lang=php>
&lt;?php

while ($expr) {
	// structure body
}

do {
	// structure body;
} while ($expr);

// EOF
 
</pre>

&#9650; [Control Structures](#10-control-structures)

<!-- ------------------------------ -->

### 4. For, Foreach

#### &#10004; Correct

<pre lang=php>
&lt;?php

for ($i = 0; $i &lt; 10; $i++) {
	// for body
}

foreach ($iterable as $key => $value) {
	// foreach body
}

// EOF
 
</pre>

&#9650; [Control Structures](#10-control-structures)

<!-- ------------------------------ -->

### 5. Try, Catch

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

try {
	// try body
}
catch (FirstExceptionType $e) {
	// catch body
}
catch (OtherExceptionType $e) {
	// catch body
}

// EOF
 
</pre>

&#8627; Incorrect because `catch` is not between `}` and `{` on one line.

#### &#10004; Correct

<pre lang=php>
&lt;?php

try {
	// try body
} catch (FirstExceptionType $e) {
	// catch body
} catch (OtherExceptionType $e) {
	// catch body
}

// EOF
 
</pre>

&#9650; [Control Structures](#10-control-structures)

<!-- ---------------------------------------------------------------------- -->

## 11. Classes

This section describes class files, names, definitions, properties, methods and instantiation.

1. [**Class file**](#1-class-file) MUST only contain one definition and MUST be prefixed with `class-`
	* i.e. `class User` &rarr; `class-user.php`, `class Office` &rarr; `class-office.php`
2. [**Class namespace**](#2-class-namespace) MUST be defined and MUST include vendor name
	* e.g. `namespace MyCompany\Model;`, `namespace MyCompany\View;`, `namespace MyCompany\Controller;`
3. [**Class name**](#3-class-name) MUST start with a capital letter and MUST be camelcase
	* e.g. `MyCompany`
4. [**Class documentation**](#4-class-documentation) MUST be present and MUST use [phpDocumentor](http://phpdoc.org/docs/latest/index.html) tag style
	* i.e. `@author`, `@global`, `@package`
5. [**Class definition**](#5-class-definition) MUST place curly braces on their own line
	* i.e. `class User` `↵` `{` `↵` `...` `↵` `}`
6. [**Class properties**](#6-class-properties)
	* MUST follow [variable standards](#7-variables)
	* MUST specify visibility
	* MUST NOT be prefixed with an underscore if private or protected
	* e.g. `$var1;`, `private $var2;`, `protected $var3;`
7. [**Class methods**](#7-class-methods)
	* MUST follow [function standards](#9-functions)
	* MUST specify visibility
	* MUST NOT be prefixed with an underscore if private or protected
	* e.g. `func1()`, `private func2()`, `protected func3()`
8. [**Class instance**](#8-class-instance)
	* MUST start with capital letter
	* MUST be camelcase
	* MUST include parenthesis
	* e.g. `$user = new User();`, `$OfficeProgram = new OfficeProgram();`

&#9650; [Table of Contents](#table-of-contents)

<!-- ------------------------------ -->

### 1. Class File

Class file MUST only contain one definition and MUST be prefixed with `class-`.

#### &#10006; Incorrect

Filename: `class-user.php`

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class User
{
	// ...
}

class Office
{
	// ...
}

// EOF
 
</pre>

&#8627; Incorrect because `User` and `Office` are defined in one file.

Filename: `user.php`

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class User
{
	// ...
}

// EOF
 
</pre>

&#8627; Incorrect because filename is not prefixed with `class-`.

#### &#10004; Correct

Filename: `class-user.php`

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class User
{
	// ...
}

// EOF
 
</pre>

Filename: `class-office.php`

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class Office
{
	// ...
}

// EOF
 
</pre>

&#9650; [Classes](#11-classes)

<!-- ------------------------------ -->

### 2. Class Namespace

Class namespace MUST be defined and MUST include vendor name.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

class User
{
	// ...
}

// EOF
 
</pre>

&#8627; Incorrect because there is no namespace defined.

<pre lang=php>
&lt;?php

namespace Model;

class User
{
	// ...
}

// EOF
 
</pre>

&#8627; Incorrect because vendor name is missing in the namespace name.

#### &#10004; Correct

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class User
{
	// ...
}

// EOF
 
</pre>

&#9650; [Classes](#11-classes)

<!-- ------------------------------ -->

### 3. Class Name

Class name MUST start with a capital letter and MUST be camelcase.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class officeProgram
{
	// ...
}

// EOF
 
</pre>

&#8627; Incorrect because `officeProgram` does not start with a capital letter.

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class Officeprogram
{
	// ...
}

// EOF
 
</pre>

&#8627; Incorrect because `Officeprogram` is not camelcase.

#### &#10004; Correct

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class OfficeProgram
{
	// ...
}

// EOF
 
</pre>

&#9650; [Classes](#11-classes)

<!-- ------------------------------ -->

### 4. Class Documentation

Class documentation MUST be present and MUST use [phpDocumentor](http://phpdoc.org/docs/latest/index.html) tag style.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class User
{
	// ...
}

// EOF
 
</pre>

&#8627; Incorrect because `User` is missing documentation.

<pre lang=php>
&lt;?php

namespace MyCompany\View;

/**
 * User View
 */
class User
{
	// ...
}

// EOF
 
</pre>

&#8627; Incorrect because `User` is missing [phpDocumentor](http://phpdoc.org/docs/latest/index.html) tags.

#### &#10004; Correct

<pre lang=php>
&lt;?php

namespace MyCompany\View;

/**
 * User View
 *
 * @author Firstname Lastname
 * @global object $post
 * @package MyCompany\API
 */
class User
{
	// ...
}

// EOF
 
</pre>

&#9650; [Classes](#11-classes)

<!-- ------------------------------ -->

### 5. Class Definition

Class definition MUST place curly braces on their own line.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class User {
	// ...
}

// EOF
 
</pre>

&#8627; Incorrect because `{` is not on its own line.

#### &#10004; Correct

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class User
{
	// ...
}

// EOF
 
</pre>

&#9650; [Classes](#11-classes)

<!-- ------------------------------ -->

### 6. Class Properties

Class properties:

* MUST follow [variable standards](#7-variables)
* MUST specify visibility
* MUST NOT be prefixed with an underscore if private or protected

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class User
{
	// Public
	$var1;

	// Protected
	$var2;

	// Private
	$var3;
}

// EOF
 
</pre>

&#8627; Incorrect because visibility is not specified for `$var1`, `$var2` and `$var3`.

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class User
{
	public $var1;
	protected $_var2;
	private $_var3;
}

// EOF
 
</pre>

&#8627; Incorrect because `protected` and `private` properties are prefixed with `_`.

#### &#10004; Correct

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class User
{
	public $var1;
	protected $var2;
	private $var3;
}

// EOF
 
</pre>

&#9650; [Classes](#11-classes)

<!-- ------------------------------ -->

### 7. Class Methods

Class methods:

* MUST follow [function standards](#9-functions)
* MUST specify visibility
* MUST NOT be prefixed with an underscore if private or protected

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class User
{
	// ...

	// Public
	function get_var1() {
		return $this->var1;
	}

	// Protected
	function get_var2() {
		return $this->var2;
	}

	// Private
	function get_var3() {
		return $this->var3;
	}
}

// EOF
 
</pre>

&#8627; Incorrect because visibility is not specified for `get_var1()`, `get_var2()` and `get_var3()`.

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class User
{
	// ...

	public function get_var1() {
		return $this->var1;
	}

	protected function _get_var2() {
		return $this->var2;
	}

	private function _get_var3() {
		return $this->var3;
	}
}

// EOF
 
</pre>

&#8627; Incorrect because `protected` and `private` methods are prefixed with `_`.

#### &#10004; Correct

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class User
{
	// ...

	public function get_var1() {
		return $this->var1;
	}

	protected function get_var2() {
		return $this->var2;
	}

	private function get_var3() {
		return $this->var3;
	}
}

// EOF
 
</pre>

&#9650; [Classes](#11-classes)

<!-- ------------------------------ -->

### 8. Class Instance

Class instance:

* MUST follow [variable standards](#7-variables)
* MUST include parenthesis

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

$office_program = new OfficeProgram;

// EOF
 
</pre>

&#8627; Incorrect because `new OfficeProgram` is missing parenthesis.

#### &#10004; Correct

<pre lang=php>
&lt;?php

$office_program = new OfficeProgram();

// EOF
 
</pre>

&#9650; [Classes](#11-classes)

<!-- ---------------------------------------------------------------------- -->

## 12. Best Practices

1. [**Variable initialization**](#1-variable-initialization) SHOULD occur prior to use and SHOULD occur early
	* e.g. `$var1 = '';`, `$var2 = 0;`
2. [**Initialization/declaration order**](#2-initializationdeclaration-order)
	* MUST lead with globals, follow with constants, conclude with local variables
	* MUST lead with properties and follow with methods in classes
	* MUST lead with `public`, follow with `protected`, conclude with `private` methods in classes
	* SHOULD be alphabetical within their type
	* i.e. `global $var1;`, `define('VAR2', '');`, `$var3 = 0;`
3. [**Globals**](#4-globals) SHOULD NOT be used
	* i.e. no `global $var;`
4. [**Explicit expressions**](#5-explicit-expressions) SHOULD be used
	* e.g. `if ($expr === false)`, `while ($expr !== true)`
5. [**E_STRICT reporting**](#6-e_strict-reporting) MUST NOT trigger errors
	* i.e. do not use deprecated functions, etc.

&#9650; [Table of Contents](#table-of-contents)

<!-- ------------------------------ -->

### 1. Variable Initialization

Variable initialization SHOULD occur prior to use and SHOULD occur early.

#### ~ Acceptable

<pre lang=php>
&lt;?php

$movies = get_movies();

// EOF
 
</pre>

&#8627; Acceptable, but `$movies` should be initialized prior to use.

<pre lang=php>
&lt;?php

if ($expr) {
	// ....
}

$movies = array();
$movies = get_movies();

// EOF
 
</pre>

&#8627; Acceptable, but `$movies` should be initialized earlier.

#### &#10004; Preferred

<pre lang=php>
&lt;?php

$movies = array();

if ($expr) {
	// ....
}

$movies = get_movies();

// EOF
 
</pre>

&#9650; [Best Practices](#12-best-practices)

<!-- ------------------------------ -->

### 2. Initialization/Declaration Order

Initialization/declaration order:

* MUST lead with globals, follow with constants, conclude with local variables
* MUST lead with properties and follow with methods in classes
* MUST lead with `public`, follow with `protected`, conclude with `private` methods in classes
* SHOULD be alphabetical within their type

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

define('ENVIRONMENT', 'PRODUCTION');

$id = 0;

global $app_config;

// EOF
 
</pre>

&#8627; Incorrect because `$app_config` is not first, `ENVIRONMENT` not second, and `$id` not third.

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class Office
{
	public function get_name() {
		// ...
	}

	private $name;
}

// EOF
 
</pre>

&#8627; Incorrect because `get_name()` is declared before `$name`.

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class Office
{
	private $id;
	private $name;
	private $status;

	private function get_name() {
		// ...
	}

	public function get_id() {
		// ...
	}

	protected function get_status() {
		// ...
	}
}

// EOF
 
</pre>

&#8627; Incorrect because `get_id()` is not first, `get_status()` not second, and `get_name()` not third.

#### ~ Acceptable

<pre lang=php>
&lt;?php

global $db_connection,
	$app_config,
	$cache;

define('MODE', 1);
define('ENVIRONMENT', 'PRODUCTION');

$id = 0;
$firstname = '';
$lastname = '';

// EOF
 
</pre>

&#8627; Acceptable, but the globals and constants should be in alphabetical order.

<pre lang=php>
&lt;?php

function get_movies() {
	// ...
}

function get_actors() {
	// ...
}

// EOF
 
</pre>

&#8627; Acceptable, but `get_actors` should be declared before `get_movies`.

#### &#10004; Correct

<pre lang=php>
&lt;?php

global $app_config,
	$cache,
	$db_connection;

define('ENVIRONMENT', 'PRODUCTION');
define('MODE', 1);

$id = 0;
$firstname = '';
$lastname = '';

// EOF
 
</pre>

<pre lang=php>
&lt;?php

namespace MyCompany\Model;

class Office
{
	private $id;
	private $name;
	private $status;

	public function get_id() {
		// ...
	}

	protected function get_status() {
		// ...
	}

	private function get_name() {
		// ...
	}
}

// EOF
 
</pre>

#### &#10004; Preferred

<pre lang=php>
&lt;?php

function get_actors() {
	// ...
}

function get_movies() {
	// ...
}

// EOF
 
</pre>

&#9650; [Best Practices](#12-best-practices)

<!-- ------------------------------ -->

### 3. Globals

Globals SHOULD NOT be used.

#### ~ Acceptable

<pre lang=php>
&lt;?php

$pdo = new PDO('mysql:host=localhost;dbname=test', $user, $pass);

function get_user($id) {
	global $pdo;
	// ...
}

// EOF
 
</pre>

&#8627; Acceptable, but `global` variables should be avoided.

#### &#10004; Preferred

<pre lang=php>
&lt;?php

function get_database_object() {
	return new PDO('mysql:host=localhost;dbname=test', $user, $pass);
}

function get_user($id) {
	$pdo = get_database_object();
	// ...
}

// EOF
 
</pre>

&#9650; [Best Practices](#12-best-practices)

<!-- ------------------------------ -->

### 4. Explicit Expressions

Explicit expressions SHOULD be used.

#### ~ Acceptable

<pre lang=php>
&lt;?php

if ($expr == true) {
	// ...
}

// EOF
 
</pre>

&#8627; Acceptable, but `===` could be used here instead.

#### &#10004; Preferred

<pre lang=php>
&lt;?php

if ($expr === true) {
	// ...
}

// EOF
 
</pre>

&#9650; [Best Practices](#12-best-practices)

<!-- ------------------------------ -->

### 5. E_STRICT Reporting

E_STRICT reporting MUST NOT trigger errors.

#### &#10006; Incorrect

<pre lang=php>
&lt;?php

$firstname = call_user_method('get_firstname', $User);

// EOF
 
</pre>

&#8627; Incorrect because `call_user_method` (deprecated) will cause E_STRICT warning.

#### &#10004; Correct

<pre lang=php>
&lt;?php

$firstname = call_user_func(array($User, 'get_firstname'));

// EOF
 
</pre>

&#9650; [Best Practices](#12-best-practices)

---

&#9650; [Table of Contents](#table-of-contents)

Inspired in part by style guides from:<br />
[CodeIgniter](http://ellislab.com/codeigniter/user-guide/general/styleguide.html), [Drupal](https://drupal.org/coding-standards), [Horde](http://www.horde.org/apps/horde/docs/CODING_STANDARDS), [Pear](http://pear.php.net/manual/en/standards.php), [PSR-1](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md), [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md), [Symfony](http://symfony.com/doc/current/contributing/code/standards.html), and [WordPress](http://make.wordpress.org/core/handbook/coding-standards/php/).
