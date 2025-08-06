# PHP MVC Framework API Documentation

## Table of Contents
1. [Framework Overview](#framework-overview)
2. [Core Classes](#core-classes)
3. [Template System](#template-system)
4. [Database Model](#database-model)
5. [File Upload](#file-upload)
6. [Verification System](#verification-system)
7. [Pagination](#pagination)
8. [Image Processing](#image-processing)
9. [Routing System](#routing-system)
10. [Usage Examples](#usage-examples)

## Framework Overview

This is a lightweight PHP MVC framework that provides:
- Template engine with caching
- Database abstraction layer
- File upload handling
- Verification code generation
- Pagination system
- Image processing
- PSR-4 autoloading

### Directory Structure
```
MVC/
├── app/                    # Application code
│   ├── index/             # Frontend application
│   │   ├── controller/    # Controllers
│   │   ├── model/        # Models
│   │   └── view/         # Views
│   └── admin/            # Admin application
│       ├── controller/   # Admin controllers
│       ├── model/        # Admin models
│       └── view/         # Admin views
├── boot/                  # Framework bootstrap
├── config/               # Configuration files
├── vendor/               # Framework core
│   └── wml/framework/src/
├── public/               # Public assets
└── cache/               # Cache files
```

## Core Classes

### Start Class
**Location**: `boot/Start.php`

The main entry point for the framework.

#### Public Methods

##### `init()`
Initializes the framework by setting up autoloading and session.

**Usage:**
```php
Start::init();
```

##### `route()`
Handles URL routing and dispatches to appropriate controller.

**URL Format**: `?m=module&c=controller&a=action`

**Default Values:**
- `m` (module): `index`
- `c` (controller): `index`
- `a` (action): `index`

**Usage:**
```php
Start::route();
```

**Example URLs:**
- `index.php?m=index&c=user&a=login` → `index\controller\User::login()`
- `index.php?m=admin&c=post&a=create` → `admin\controller\Post::create()`

### Psr4Autoloader Class
**Location**: `boot/Psr4Autoloader.php`

PSR-4 compliant autoloader for the framework.

#### Public Methods

##### `__construct($namespaces = null)`
Creates a new autoloader instance.

**Parameters:**
- `$namespaces` (array|null): Namespace to path mappings

**Usage:**
```php
$autoloader = new Psr4Autoloader([
    'index\\controller' => 'app/index/controller',
    'framework\\' => 'vendor/wml/framework/src'
]);
```

##### `addNamespace($namespace, $realPath = null)`
Adds namespace to path mappings.

**Parameters:**
- `$namespace` (string|array): Namespace or array of namespaces
- `$realPath` (string|null): Physical path for the namespace

**Usage:**
```php
$autoloader->addNamespace('app\\', 'app/');
$autoloader->addNamespace([
    'admin\\controller' => 'app/admin/controller',
    'admin\\model' => 'app/admin/model'
]);
```

## Template System

### Template Class
**Location**: `vendor/wml/framework/src/Template.php`

Template engine with caching support.

#### Public Methods

##### `__construct($tplPath = './view/', $cachePath = './cache/template/', $validTime = 3600)`
Creates a new template instance.

**Parameters:**
- `$tplPath` (string): Template files directory
- `$cachePath` (string): Cache files directory
- `$validTime` (int): Cache validity time in seconds

**Usage:**
```php
$template = new Template('app/index/view/', 'cache/template/', 1800);
```

##### `assign($name, $value)`
Assigns a variable to the template.

**Parameters:**
- `$name` (string): Variable name
- `$value` (mixed): Variable value

**Usage:**
```php
$template->assign('title', 'My Page');
$template->assign('users', $userList);
```

##### `display($tplFile, $isExecute = true)`
Displays a template file.

**Parameters:**
- `$tplFile` (string): Template file name
- `$isExecute` (bool): Whether to execute the template

**Usage:**
```php
$template->display('user/login.html');
$template->display('header.html', false); // Include only
```

##### `clearCache()`
Clears all template cache files.

**Usage:**
```php
$template->clearCache();
```

#### Template Syntax

The template engine supports the following syntax:

```html
<!-- Variable output -->
{$variable}
${variable}
{__variable__}

<!-- Conditional statements -->
{if $condition}
    Content
{elseif $other_condition}
    Other content
{else}
    Default content
{/if}

<!-- Loops -->
{foreach $items as $item}
    {$item.name}
{/foreach}

{for $i = 0; $i < 10; $i++}
    {$i}
{/for}

<!-- Switch statements -->
{switch $value case 'option1'}
    Option 1 content
{case 'option2'}
    Option 2 content
{break}
{/switch}

<!-- Include files -->
{include header.html}
{include footer.html}

<!-- PHP code blocks -->
{section}
    <?php echo "Custom PHP code"; ?>
{/section}
```

### Controller Class
**Location**: `app/index/controller/Controller.php`

Base controller class that extends Template.

#### Public Methods

##### `__construct()`
Initializes the controller with default template paths.

**Usage:**
```php
class MyController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}
```

##### `display($tplFile = null, $isExecute = true)`
Displays a template with automatic path resolution.

**Parameters:**
- `$tplFile` (string|null): Template file name (auto-resolved if null)
- `$isExecute` (bool): Whether to execute the template

**Usage:**
```php
// Automatically resolves to: controller/action.html
$this->display();

// Custom template file
$this->display('custom.html');
```

##### `notice($msg, $url = null, $second = 300)`
Displays a notice/alert page.

**Parameters:**
- `$msg` (string): Message to display
- `$url` (string|null): Redirect URL (uses HTTP_REFERER if null)
- `$second` (int): Seconds before redirect

**Usage:**
```php
$this->notice('User created successfully', 'user/list');
$this->notice('Error occurred', null, 5);
```

## Database Model

### Model Class
**Location**: `vendor/wml/framework/src/Model.php`

Database abstraction layer with query builder.

#### Public Methods

##### `__construct($config = null)`
Creates a new model instance.

**Parameters:**
- `$config` (array|null): Database configuration

**Usage:**
```php
$user = new UserModel();
$user = new UserModel($customConfig);
```

##### `field($fields)`
Sets the fields to select.

**Parameters:**
- `$fields` (string|array): Field names

**Usage:**
```php
$user->field('id, name, email')->select();
$user->field(['id', 'name', 'email'])->select();
```

##### `where($where)`
Sets the WHERE condition.

**Parameters:**
- `$where` (string|array): WHERE condition

**Usage:**
```php
$user->where("status = 'active'")->select();
$user->where(['status' => 'active', 'age >' => 18])->select();
```

##### `order($order)`
Sets the ORDER BY clause.

**Parameters:**
- `$order` (string|array): Order specification

**Usage:**
```php
$user->order('created_at DESC')->select();
$user->order(['name ASC', 'age DESC'])->select();
```

##### `group($group)`
Sets the GROUP BY clause.

**Parameters:**
- `$group` (string|array): Group specification

**Usage:**
```php
$user->group('department')->select();
$user->group(['department', 'status'])->select();
```

##### `having($having)`
Sets the HAVING clause.

**Parameters:**
- `$having` (string|array): Having condition

**Usage:**
```php
$user->group('department')->having('COUNT(*) > 5')->select();
```

##### `limit($limit)`
Sets the LIMIT clause.

**Parameters:**
- `$limit` (string|array): Limit specification

**Usage:**
```php
$user->limit(10)->select();
$user->limit([0, 10])->select(); // offset, count
```

##### `find()`
Finds a single record.

**Returns:** (array|null): First record or null

**Usage:**
```php
$user = $user->where("id = 1")->find();
```

##### `select()`
Executes a SELECT query.

**Returns:** (array): Query results

**Usage:**
```php
$users = $user->select();
$activeUsers = $user->where("status = 'active'")->select();
```

##### `insert($data)`
Inserts a new record.

**Parameters:**
- `$data` (array): Data to insert

**Returns:** (int|bool): Insert ID or false

**Usage:**
```php
$userId = $user->insert([
    'name' => 'John Doe',
    'email' => 'john@example.com'
]);
```

##### `update($data)`
Updates records.

**Parameters:**
- `$data` (array): Data to update

**Returns:** (bool): Success status

**Usage:**
```php
$user->where("id = 1")->update(['status' => 'inactive']);
```

##### `delete()`
Deletes records.

**Returns:** (bool): Success status

**Usage:**
```php
$user->where("id = 1")->delete();
```

##### `priKey($value)`
Finds records by primary key.

**Parameters:**
- `$value` (int|string|array): Primary key value(s)

**Usage:**
```php
$user = $user->priKey(1);
$users = $user->priKey([1, 2, 3]);
```

##### `setInc($field, $value)`
Increments a field value.

**Parameters:**
- `$field` (string): Field name
- `$value` (int): Increment value

**Usage:**
```php
$user->where("id = 1")->setInc('login_count', 1);
```

##### `getBy($field, $value)`
Finds records by field value.

**Parameters:**
- `$field` (string): Field name
- `$value` (mixed): Field value

**Usage:**
```php
$user = $user->getBy('email', 'john@example.com');
```

##### `query($sql, $resultType = MYSQLI_BOTH)`
Executes a raw SQL query.

**Parameters:**
- `$sql` (string): SQL query
- `$resultType` (int): Result type constant

**Returns:** (array): Query results

**Usage:**
```php
$results = $user->query("SELECT * FROM users WHERE status = 'active'");
```

##### `getLastSql()`
Gets the last executed SQL query.

**Returns:** (string): SQL query

**Usage:**
```php
$user->select();
echo $user->getLastSql();
```

#### Magic Methods

The Model class supports dynamic method calls:

##### `getBy{FieldName}($value)`
Automatically converts to `getBy()` method.

**Usage:**
```php
$user = $user->getByEmail('john@example.com');
$user = $user->getByUsername('johndoe');
```

##### Aggregate Functions
Supports `count()`, `sum()`, `avg()`, `min()`, `max()`.

**Usage:**
```php
$count = $user->count();
$total = $user->sum('amount');
$average = $user->avg('score');
```

## File Upload

### Upload Class
**Location**: `vendor/wml/framework/src/Upload.php`

Handles file uploads with validation and processing.

#### Public Properties

- `$savePath` (string): Save directory (default: './upload')
- `$randName` (bool): Use random filename (default: true)
- `$mime` (array): Allowed MIME types
- `$extension` (string): File extension (default: 'png')
- `$errorNumber` (int): Error code
- `$errorMessage` (string): Error message
- `$datePath` (bool): Create date-based subdirectories (default: true)
- `$maxSize` (int): Maximum file size in bytes (default: 2000000)

#### Public Methods

##### `__construct($options = null)`
Creates a new upload instance.

**Parameters:**
- `$options` (array|null): Upload options

**Usage:**
```php
$upload = new Upload([
    'savePath' => './uploads/images',
    'maxSize' => 5000000,
    'mime' => ['image/jpeg', 'image/png']
]);
```

##### `uploadFile($field)`
Uploads a file from form field.

**Parameters:**
- `$field` (string): Form field name

**Returns:** (bool): Success status

**Usage:**
```php
if ($upload->uploadFile('avatar')) {
    echo "Upload successful";
} else {
    echo "Upload failed: " . $upload->errorMessage;
}
```

#### Error Codes

- `0`: Success
- `-1`: Save path error
- `-2`: Upload info error
- `-3`: Upload error
- `-4`: File type not allowed
- `-5`: File size exceeds limit
- `-6`: Not an uploaded file
- `-7`: Path creation failed
- `-8`: File move failed

## Verification System

### Verify Class
**Location**: `vendor/wml/framework/src/Verify.php`

Generates verification codes (CAPTCHA).

#### Public Methods

##### `__construct($width = 200, $height = 50, $length = 4, $type = 1)`
Creates a new verification code instance.

**Parameters:**
- `$width` (int): Image width
- `$height` (int): Image height
- `$length` (int): Code length
- `$type` (int): Code type (1=numbers, 2=letters, 3=mixed, 4=Chinese)

**Usage:**
```php
$verify = new Verify(300, 80, 6, 3);
```

##### `static ver($width = 200, $height = 50, $length = 4, $type = 4)`
Static method to generate verification code.

**Returns:** (string): Generated code

**Usage:**
```php
$code = Verify::ver(250, 60, 5, 1);
```

##### `code()`
Gets the generated verification code.

**Returns:** (string): Verification code

**Usage:**
```php
$verify = new Verify();
$code = $verify->code();
```

#### Code Types

- `1`: Numbers only (0-9)
- `2`: Letters only (A-Z, a-z)
- `3`: Mixed alphanumeric
- `4`: Chinese characters

## Pagination

### Page Class
**Location**: `vendor/wml/framework/src/Page.php`

Handles pagination for database queries.

#### Public Methods

##### `__construct($total = 60, $perPage = 5)`
Creates a new pagination instance.

**Parameters:**
- `$total` (int): Total number of records
- `$perPage` (int): Records per page

**Usage:**
```php
$page = new Page(100, 10);
```

##### `page()`
Gets pagination information.

**Returns:** (array): Pagination data

**Usage:**
```php
$pagination = $page->page();
// Returns: ['firstUrl', 'prevUrl', 'nextUrl', 'endUrl', 'limit']
```

##### `limit()`
Gets the LIMIT clause for database queries.

**Returns:** (string): LIMIT clause

**Usage:**
```php
$limit = $page->limit(); // Returns: "0,10"
$users = $user->limit($limit)->select();
```

#### Pagination Data Structure

```php
[
    'firstUrl' => 'http://example.com/page?p=1',
    'prevUrl' => 'http://example.com/page?p=2',
    'nextUrl' => 'http://example.com/page?p=4',
    'endUrl' => 'http://example.com/page?p=10',
    'limit' => '20,10'
]
```

## Image Processing

### Image Class
**Location**: `vendor/wml/framework/src/Image.php`

Handles image processing operations.

#### Public Methods

##### `__construct($imagePath)`
Creates a new image instance.

**Parameters:**
- `$imagePath` (string): Path to image file

**Usage:**
```php
$image = new Image('path/to/image.jpg');
```

##### `resize($width, $height)`
Resizes the image.

**Parameters:**
- `$width` (int): New width
- `$height` (int): New height

**Usage:**
```php
$image->resize(800, 600);
```

##### `crop($x, $y, $width, $height)`
Crops the image.

**Parameters:**
- `$x` (int): X coordinate
- `$y` (int): Y coordinate
- `$width` (int): Crop width
- `$height` (int): Crop height

**Usage:**
```php
$image->crop(100, 100, 400, 300);
```

##### `save($path = null, $quality = 90)`
Saves the processed image.

**Parameters:**
- `$path` (string|null): Save path
- `$quality` (int): JPEG quality (1-100)

**Usage:**
```php
$image->save('processed/image.jpg', 85);
```

## Routing System

The framework uses a simple URL parameter-based routing system:

### URL Format
```
index.php?m=module&c=controller&a=action&id=123
```

### Parameters
- `m`: Module name (default: 'index')
- `c`: Controller name (default: 'index')
- `a`: Action name (default: 'index')
- Additional parameters are passed to the action method

### Controller Resolution
The framework automatically resolves controller classes based on the URL parameters:

```
?m=index&c=user&a=login
↓
index\controller\User::login()
```

### Example URLs

```php
// Home page
index.php

// User login
index.php?m=index&c=user&a=login

// Admin post creation
index.php?m=admin&c=post&a=create

// Post detail with ID
index.php?m=index&c=post&a=detail&id=123
```

## Usage Examples

### Creating a Controller

```php
<?php
namespace index\controller;

class User extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->assign('title', 'User List');
        $this->assign('users', $this->getUsers());
        $this->display();
    }

    public function create()
    {
        if ($_POST) {
            $user = new \index\model\User();
            $result = $user->insert($_POST);
            if ($result) {
                $this->notice('User created successfully', 'user/index');
            } else {
                $this->notice('Creation failed');
            }
        }
        $this->display();
    }

    private function getUsers()
    {
        $user = new \index\model\User();
        return $user->select();
    }
}
```

### Creating a Model

```php
<?php
namespace index\model;

class User extends \framework\Model
{
    public function getActiveUsers()
    {
        return $this->where("status = 'active'")->select();
    }

    public function findByEmail($email)
    {
        return $this->getByEmail($email);
    }

    public function updateLastLogin($userId)
    {
        return $this->where("id = $userId")->update([
            'last_login' => date('Y-m-d H:i:s')
        ]);
    }
}
```

### File Upload Example

```php
<?php
namespace index\controller;

use framework\Upload;

class File extends Controller
{
    public function upload()
    {
        if ($_POST) {
            $upload = new Upload([
                'savePath' => './uploads/',
                'maxSize' => 5000000,
                'mime' => ['image/jpeg', 'image/png', 'image/gif']
            ]);

            if ($upload->uploadFile('file')) {
                $this->notice('File uploaded successfully');
            } else {
                $this->notice('Upload failed: ' . $upload->errorMessage);
            }
        }
        $this->display();
    }
}
```

### Pagination Example

```php
<?php
namespace index\controller;

use framework\Page;

class Post extends Controller
{
    public function index()
    {
        $post = new \index\model\Post();
        $total = $post->count()['count'];
        
        $page = new Page($total, 10);
        $pagination = $page->page();
        
        $posts = $post->limit($pagination['limit'])->select();
        
        $this->assign('posts', $posts);
        $this->assign('pagination', $pagination);
        $this->display();
    }
}
```

### Verification Code Example

```php
<?php
namespace index\controller;

use framework\Verify;

class Auth extends Controller
{
    public function captcha()
    {
        $verify = new Verify(200, 50, 4, 1);
        // Image is automatically output
    }

    public function login()
    {
        if ($_POST) {
            $code = $_POST['captcha'];
            if ($code == $_SESSION['code']) {
                // Valid verification code
                $this->notice('Login successful');
            } else {
                $this->notice('Invalid verification code');
            }
        }
        $this->display();
    }
}
```

### Template Example

```html
<!-- user/list.html -->
<!DOCTYPE html>
<html>
<head>
    <title>{$title}</title>
</head>
<body>
    <h1>{$title}</h1>
    
    {if $users}
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            {foreach $users as $user}
                <tr>
                    <td>{$user.id}</td>
                    <td>{$user.name}</td>
                    <td>{$user.email}</td>
                </tr>
            {/foreach}
        </table>
    {else}
        <p>No users found.</p>
    {/if}
    
    {include pagination.html}
</body>
</html>
```

## Configuration

### Database Configuration
**File**: `config/database.php`

```php
<?php
return [
    'DB_HOST' => 'localhost',
    'DB_USER' => 'root',
    'DB_PWD' => '',
    'DB_NAME' => 'myapp',
    'DB_CHARSET' => 'utf8',
    'DB_PREFIX' => 'app_',
    'DB_CACHE' => 'cache/database/',
];
```

### Namespace Configuration
**File**: `config/namespace.php`

```php
<?php
return [
    'index\\controller' => 'app/index/controller',
    'index\\model' => 'app/index/model',
    'framework\\' => 'vendor/wml/framework/src',
    'admin\\controller' => 'app/admin/controller',
    'admin\\model' => 'app/admin/model',
];
```

## Best Practices

1. **Controller Organization**: Keep controllers focused on a single resource
2. **Model Methods**: Use descriptive method names for database operations
3. **Template Caching**: Clear cache during development, enable in production
4. **Error Handling**: Always check return values from database operations
5. **Security**: Validate and sanitize all user input
6. **File Uploads**: Always validate file types and sizes
7. **Database Queries**: Use the query builder for complex queries
8. **Pagination**: Always implement pagination for large datasets

## Error Handling

The framework provides basic error handling:

- Database connection failures
- Template file not found
- Upload validation errors
- Invalid controller/action calls

Check the `$errorMessage` property on relevant classes for detailed error information.

## Performance Considerations

1. **Template Caching**: Templates are automatically cached for better performance
2. **Database Field Caching**: Model fields are cached to avoid repeated DESCRIBE queries
3. **Query Optimization**: Use specific field selection instead of `SELECT *`
4. **File Uploads**: Set appropriate file size limits
5. **Pagination**: Always limit query results for large datasets

## Security Notes

1. **SQL Injection**: The framework provides basic protection, but always validate input
2. **File Uploads**: Always validate file types and use secure upload directories
3. **Session Security**: Sessions are automatically started by the framework
4. **XSS Protection**: Template variables are not automatically escaped
5. **CSRF Protection**: Implement CSRF tokens for forms

---

This documentation covers all public APIs, functions, and components of the PHP MVC framework. For additional support or questions, refer to the source code or create issues in the project repository.