# Yashua E-commerce Platform API Documentation

## Overview

Yashua (牙刷商城) is a PHP-based e-commerce platform built with a custom MVC framework. This documentation covers all public APIs, functions, and components available in the system.

## Table of Contents

- [Framework Architecture](#framework-architecture)
- [Routing System](#routing-system)
- [Public APIs](#public-apis)
- [Admin APIs](#admin-apis)
- [Data Models](#data-models)
- [Utility Classes](#utility-classes)
- [Usage Examples](#usage-examples)
- [Configuration](#configuration)

## Framework Architecture

### Core Components

The platform is built on a custom MVC framework with the following core components:

- **Model**: Database abstraction layer with ORM capabilities
- **Template**: Template engine for view rendering
- **Controller**: Base controller with common functionality
- **Psr4Autoloader**: PSR-4 compliant autoloader

### Directory Structure

```
MVC/
├── app/
│   ├── index/          # Frontend application
│   │   ├── controller/ # Frontend controllers
│   │   ├── model/      # Frontend models
│   │   └── view/       # Frontend templates
│   └── admin/          # Admin panel
│       ├── controller/ # Admin controllers
│       ├── model/      # Admin models
│       └── view/       # Admin templates
├── boot/               # Bootstrap files
├── config/             # Configuration files
├── public/             # Public assets
└── vendor/             # Framework components
```

## Routing System

### URL Structure

The platform uses a simple routing system based on GET parameters:

```
index.php?m={module}&c={controller}&a={action}
```

- **m** (module): `index` (frontend) or `admin` (admin panel)
- **c** (controller): Controller name (e.g., `index`, `user`, `post`)
- **a** (action): Action method name (e.g., `index`, `login`, `register`)

### Default Values

- Default module: `index`
- Default controller: `index`
- Default action: `index`

### Routing Examples

```php
// Homepage
index.php
// Equivalent to: index.php?m=index&c=index&a=index

// User login page
index.php?m=index&c=user&a=login

// Admin panel
index.php?m=admin&c=index&a=index
```

## Public APIs

### Index Controller

The main frontend controller handling homepage and post interactions.

#### Endpoints

##### GET /index.php?m=index&c=index&a=index
**Homepage with paginated posts**

Returns the main page with blog posts, pagination, and recent comments.

**Response Data:**
- `title`: Page title
- `total`: Total post count
- `select`: Array of posts for current page
- `p`: Pagination data
- `new`: Recent comments
- `web`: Site configuration

##### GET /index.php?m=index&c=index&a=read&id={post_id}
**Read full post**

Displays full post content and increments view count.

**Parameters:**
- `id` (integer): Post ID

**Response Data:**
- `read`: Post data
- `neirong`: Comments for the post
- `id`: Post ID

##### GET /index.php?m=index&c=index&a=love&id={post_id}&state={state}
**Like/Unlike post**

Handles post liking functionality.

**Parameters:**
- `id` (integer): Post ID
- `state` (integer): `1` for like, `2` for unlike

**Behavior:**
- Increments/decrements like count
- Redirects to homepage

##### GET /index.php?m=index&c=index&a=xiao&id={post_id}&stat={state}
**Collect/Uncollect post**

Handles post collection functionality.

**Parameters:**
- `id` (integer): Post ID
- `stat` (integer): `1` for collect, `2` for uncollect

**Behavior:**
- Increments/decrements collection count
- Redirects to homepage

### User Controller

Handles user authentication and account management.

#### Endpoints

##### GET /index.php?m=index&c=user&a=regist
**User Registration Page**

Displays registration form.

##### POST /index.php?m=index&c=user&a=regist
**User Registration**

Processes user registration.

**Form Data:**
- `username` (string): Username (minimum 5 characters)
- `password` (string): Password (minimum 5 characters)
- `rpassword` (string): Password confirmation
- `phone` (string): Phone number (Chinese mobile format)
- `yzm` (string): Verification code

**Validation Rules:**
- Username: Minimum 5 characters
- Password: Minimum 5 characters, must match confirmation
- Phone: Must match pattern `/^1[34578]\d{9}$/`
- Verification code: Must match session value

**Response:**
- Success: User account created
- Error: Validation error message

##### GET /index.php?m=index&c=user&a=login
**User Login Page**

Displays login form.

##### POST /index.php?m=index&c=user&a=login
**User Login**

Authenticates user credentials.

**Form Data:**
- `username` (string): Username
- `password` (string): Password

**Response:**
- Success: Sets session and redirects to homepage
- Error: Error message for invalid credentials

##### POST /index.php?m=index&c=user&a=pass
**Change Password**

Changes user password.

**Form Data:**
- `oldpassword` (string): Current password
- `password` (string): New password
- `rpassword` (string): New password confirmation

**Requirements:**
- User must be logged in
- Old password must be correct
- New passwords must match

##### GET /index.php?m=index&c=user&a=exit
**User Logout**

Logs out current user by destroying session.

##### GET /index.php?m=index&c=user&a=verify
**Generate Verification Code**

Generates and returns verification code image.

### Post Controller

Handles post creation and management.

#### Endpoints

##### POST /index.php?m=index&c=post&a=list
**Create New Post**

Creates a new blog post.

**Form Data:**
- `title` (string): Post title (required)
- `content` (string): Post content (required)
- `tijiao` (string): Submit flag

**Requirements:**
- User must be logged in
- Title and content cannot be empty

**Response:**
- Success: Post created, redirects to homepage
- Error: Error message

### Send Controller

Handles comments and replies.

#### Endpoints

##### POST /index.php?m=index&c=send&a=huifu
**Post Comment/Reply**

Adds a comment or reply to a post.

**Form Data:**
- `id` (integer): Post ID
- `txt` (string): Comment content

**Requirements:**
- User must be logged in

**Response:**
- Success: Comment added, redirects to homepage
- Error: Redirects to login page

## Admin APIs

### Admin Index Controller

Handles admin panel functionality.

#### Endpoints

##### GET /index.php?m=admin&c=index&a=index
**Admin Dashboard**

Displays admin dashboard.

##### GET /index.php?m=admin&c=index&a=info
**Site Information Management**

Displays site configuration form.

##### POST /index.php?m=admin&c=index&a=info
**Update Site Information**

Updates site configuration.

**Form Data:**
- `title` (string): Site name
- `stitle` (string): Site subtitle
- `work` (string): Profession
- `phone` (string): Phone number
- `email` (string): Email address

##### POST /index.php?m=admin&c=index&a=pass
**Change Admin Password**

Changes administrator password.

**Form Data:**
- `mpass` (string): Current password
- `newpass` (string): New password

##### GET /index.php?m=admin&c=index&a=book
**User Management**

Displays paginated list of users.

##### POST /index.php?m=admin&c=index&a=book
**Delete Users**

Deletes selected users.

**Form Data:**
- `id[]` (array): Array of user IDs to delete

##### GET /index.php?m=admin&c=index&a=column
**Post Management**

Displays paginated list of posts.

##### POST /index.php?m=admin&c=index&a=column
**Delete Posts**

Deletes selected posts.

**Form Data:**
- `id[]` (array): Array of post IDs to delete

##### GET /index.php?m=admin&c=index&a=list
**Comment Management**

Displays paginated list of comments.

##### POST /index.php?m=admin&c=index&a=list
**Delete Comments**

Deletes selected comments.

**Form Data:**
- `id[]` (array): Array of comment IDs to delete

## Data Models

### Base Model Class

All models extend the base `Model` class which provides ORM functionality.

#### Methods

##### `select()`
Executes SELECT query with current conditions.

```php
$posts = $model->select();
$posts = $model->where('status = 1')->select();
```

##### `find()`
Returns single record.

```php
$post = $model->where('id = 1')->find();
```

##### `insert($data)`
Inserts new record.

```php
$id = $model->insert([
    'title' => 'Post Title',
    'content' => 'Post Content'
]);
```

##### `update($data)`
Updates records matching current conditions.

```php
$model->where('id = 1')->update(['title' => 'New Title']);
```

##### `delete()`
Deletes records matching current conditions.

```php
$model->where('id = 1')->delete();
```

##### `where($condition)`
Adds WHERE condition.

```php
$model->where('status = 1');
$model->where(['status = 1', 'type = "post"']);
```

##### `order($order)`
Adds ORDER BY clause.

```php
$model->order('created_at DESC');
$model->order(['created_at DESC', 'title ASC']);
```

##### `limit($limit)`
Adds LIMIT clause.

```php
$model->limit('10');
$model->limit('10, 20');
```

##### `count()`
Returns count of records.

```php
$total = $model->count();
$activeCount = $model->where('status = 1')->count();
```

### User Model

Handles user data operations.

#### Methods

##### `registDeal($data)`
Handles user registration.

```php
$userModel = new UserModel();
$result = $userModel->registDeal([
    'username' => 'testuser',
    'password' => md5('password'),
    'phone' => '13812345678',
    'IP' => ip2long('127.0.0.1'),
    'undertype' => 0,
    'regtime' => time()
]);
```

##### `loginDeal($username)`
Retrieves user data for login.

```php
$user = $userModel->loginDeal('testuser');
```

##### `pass($username)`
Retrieves user password data.

```php
$passwordData = $userModel->pass('testuser');
```

##### `xiu($username, $data)`
Updates user data.

```php
$userModel->xiu('testuser', ['password' => md5('newpassword')]);
```

### Post Model

Handles blog post operations.

#### Methods

##### `fabiao($data)`
Creates new post.

```php
$postModel = new PostModel();
$result = $postModel->fabiao([
    'title' => 'Post Title',
    'content' => 'Post Content',
    'authorid' => 'username',
    'addtime' => time(),
    'addip' => ip2long('127.0.0.1')
]);
```

##### `read($id)`
Retrieves post by ID.

```php
$post = $postModel->read(1);
```

##### `hit($id, $data)`
Updates post hit count.

```php
$postModel->hit(1, ['hit' => 100]);
```

##### `dian($id)`
Retrieves post like data.

```php
$likeData = $postModel->dian(1);
```

##### `xiu($id, $data)`
Updates post data.

```php
$postModel->xiu(1, ['smiley' => 10, 'zan' => 1]);
```

##### `cha($id)`
Retrieves post collection data.

```php
$collectionData = $postModel->cha(1);
```

### Send Model

Handles comment operations.

#### Methods

##### `tianjia($data)`
Adds new comment.

```php
$sendModel = new SendModel();
$result = $sendModel->tianjia([
    'pid' => 1,
    'authorid' => 'username',
    'content' => 'Comment content',
    'addtime' => time()
]);
```

##### `neirong($id)`
Retrieves comments for post.

```php
$comments = $sendModel->neirong(1);
```

##### `new()`
Retrieves recent comments.

```php
$recentComments = $sendModel->new();
```

## Utility Classes

### Page Class

Handles pagination functionality with automatic URL generation.

#### Constructor

```php
$page = new Page($totalRecords, $recordsPerPage);
```

**Parameters:**
- `$totalRecords` (integer): Total number of records (default: 60)
- `$recordsPerPage` (integer): Records per page (default: 5)

#### Properties

- `$total`: Total number of records
- `$perPage`: Records per page
- `$pages`: Total number of pages
- `$curPage`: Current page number (from $_GET['p'])
- `$url`: Base URL for pagination links

#### Methods

##### `page()`
Returns complete pagination data.

```php
$paginationData = $page->page();
// Returns array with: firstUrl, prevUrl, nextUrl, endUrl, limit
```

**Return Array:**
- `firstUrl`: URL to first page
- `prevUrl`: URL to previous page
- `nextUrl`: URL to next page
- `endUrl`: URL to last page
- `limit`: MySQL LIMIT clause string (e.g., "10,5")

##### `limit()`
Returns MySQL LIMIT clause for current page.

```php
$limitClause = $page->limit(); // "20,10" for page 3 with 10 per page
```

**Example Usage:**
```php
$total = $postModel->count();
$page = new Page($total['count'], 10);
$paginationData = $page->page();
$posts = $postModel->limit($paginationData['limit'])->select();
```

### Verify Class

Generates various types of verification codes with image output.

#### Constructor

```php
$verify = new Verify($width, $height, $length, $type);
```

**Parameters:**
- `$width` (integer): Image width (default: 200)
- `$height` (integer): Image height (default: 50)  
- `$length` (integer): Code length (default: 4)
- `$type` (integer): Code type (default: 1)

#### Verification Types

1. **Type 1**: Pure numbers (0-9)
2. **Type 2**: Pure letters (a-z)
3. **Type 3**: Mixed numbers and letters
4. **Type 4**: Mathematical equations (e.g., "3+2=?")

#### Methods

##### `ver($width, $height, $length, $type)` (Static)
Generates verification code and returns the answer.

```php
$code = Verify::ver(200, 50, 4, 4); // Math equation type
$_SESSION['code'] = $code; // Store expected answer
```

##### `code()`
Returns the verification code answer.

```php
$verify = new Verify();
$answer = $verify->code();
```

**Example Usage:**
```php
// Generate math equation verification
$code = Verify::ver(200, 50, 4, 4);
$_SESSION['code'] = $code;

// In form validation
if (strcasecmp($_SESSION['code'], $_POST['yzm']) !== 0) {
    echo "Verification code incorrect";
}
```

### Template Class

Advanced template engine with caching and custom syntax.

#### Constructor

```php
$template = new Template($tplPath, $cachePath, $validTime);
```

**Parameters:**
- `$tplPath` (string): Template directory path (default: './view/')
- `$cachePath` (string): Cache directory path (default: './cache/template/')
- `$validTime` (integer): Cache validity in seconds (default: 3600)

#### Template Syntax

The template engine supports custom syntax for dynamic content:

- `{$variable}`: Echo variable
- `{if condition}...{/if}`: Conditional blocks
- `{elseif condition}`: Else if condition
- `{else}`: Else block
- `{foreach $array as $item}...{/foreach}`: Foreach loops
- `{for expression}...{/for}`: For loops
- `{include filename}`: Include other templates
- `{section}...{/section}`: Raw PHP code blocks

#### Methods

##### `assign($name, $value)`
Assigns variable to template scope.

```php
$template->assign('title', 'Page Title');
$template->assign('posts', $postArray);
$template->assign('user', ['name' => 'John', 'email' => 'john@example.com']);
```

##### `display($templateFile, $isExecute)`
Compiles and renders template.

```php
$template->display('index/index.html'); // Execute and display
$template->display('header.html', false); // Compile only, don't execute
```

##### `clearCache()`
Clears all template cache files.

```php
$template->clearCache();
```

**Template Example:**
```html
<!-- index/index.html -->
<h1>{$title}</h1>
{if $user}
    <p>Welcome, {$user.name}!</p>
{else}
    <p>Please login</p>
{/if}

{foreach $posts as $post}
    <article>
        <h2>{$post.title}</h2>
        <p>{$post.content}</p>
    </article>
{/foreach}

{include "footer.html"}
```

### Upload Class

Robust file upload handler with validation and automatic organization.

#### Constructor

```php
$upload = new Upload($options);
```

**Options Array:**
- `savePath` (string): Upload directory (default: './upload')
- `randName` (boolean): Use random filenames (default: true)
- `mime` (array): Allowed MIME types (default: ['image/png', 'image/jpeg', 'image/gif'])
- `extension` (string): Force file extension (default: 'png')
- `datePath` (boolean): Organize by date folders (default: true)
- `maxSize` (integer): Maximum file size in bytes (default: 2000000)

#### Properties

- `$errorNumber`: Error code (0 = success)
- `$errorMessage`: Error message description

#### Methods

##### `uploadFile($field)`
Uploads file from form field.

```php
$upload = new Upload([
    'savePath' => './uploads/images/',
    'maxSize' => 5000000, // 5MB
    'mime' => ['image/jpeg', 'image/png', 'image/gif']
]);

if ($upload->uploadFile('photo')) {
    echo "Upload successful";
} else {
    echo "Upload failed: " . $upload->errorMessage;
}
```

#### Upload Process

1. **Path Validation**: Checks if save directory exists and is writable
2. **Upload Info**: Validates $_FILES data
3. **Error Checking**: Checks PHP upload errors
4. **Custom Validation**: Validates MIME type and file size
5. **File Verification**: Ensures file was uploaded via POST
6. **Path Generation**: Creates final file path with optional date folders
7. **File Movement**: Moves file to final location

#### Error Codes

- `0`: Success
- `-1`: Directory doesn't exist
- `-2`: Directory not writable
- `-3`: No upload field found
- `-4`: Invalid MIME type
- `-5`: File too large
- `-6`: Not a POST upload
- `-8`: Move file failed
- `1-8`: PHP upload errors (UPLOAD_ERR_*)

**Example with Error Handling:**
```php
$upload = new Upload([
    'savePath' => './uploads/',
    'maxSize' => 1000000, // 1MB
    'datePath' => true,
    'randName' => true
]);

if (!$upload->uploadFile('avatar')) {
    switch ($upload->errorNumber) {
        case -4:
            echo "Invalid file type. Please upload JPG, PNG, or GIF.";
            break;
        case -5:
            echo "File too large. Maximum size is 1MB.";
            break;
        default:
            echo "Upload error: " . $upload->errorMessage;
    }
} else {
    echo "File uploaded successfully!";
}
```

### Image Class

Advanced image processing with watermarking and resizing capabilities.

#### Constructor

```php
$image = new Image($savePath, $randName, $extension);
```

**Parameters:**
- `$savePath` (string): Save directory (default: './')
- `$randName` (boolean): Use random filename (default: true)
- `$extension` (string): Output format (default: 'png')

#### Methods

##### `waterMark($dstPath, $srcPath, $pos, $pct)`
Adds watermark to image.

```php
$image = new Image('./processed/', true, 'jpg');
$result = $image->waterMark(
    './images/photo.jpg',    // Target image
    './watermarks/logo.png', // Watermark image
    9,                       // Position (1-9, see grid below)
    50                       // Opacity percentage
);
```

**Position Grid:**
```
1 2 3
4 5 6
7 8 9
```
- Positions 1-9 correspond to a 3x3 grid
- Any other value uses random positioning

**Parameters:**
- `$dstPath` (string): Target image path
- `$srcPath` (string): Watermark image path
- `$pos` (integer): Position (1-9 or random)
- `$pct` (integer): Opacity percentage (0-100)

##### `zoomImg($imgPath, $width, $height)`
Resizes image maintaining aspect ratio.

```php
$image = new Image('./thumbnails/', true, 'jpg');
$result = $image->zoomImg('./images/large.jpg', 300, 200);
```

**Parameters:**
- `$imgPath` (string): Source image path
- `$width` (integer): Target width
- `$height` (integer): Target height

**Features:**
- Maintains aspect ratio
- Centers image in target dimensions
- Preserves transparency for PNG/GIF
- Supports JPG, PNG, GIF formats

**Example Usage:**
```php
// Create thumbnail gallery
$image = new Image('./thumbs/', true, 'jpg');
$images = glob('./uploads/*.{jpg,png,gif}', GLOB_BRACE);

foreach ($images as $imagePath) {
    $thumbnail = $image->zoomImg($imagePath, 150, 150);
    if ($thumbnail) {
        echo "<img src='$thumbnail' alt='Thumbnail'>";
    }
}

// Add watermark to uploaded images
$image = new Image('./watermarked/', false, 'jpg');
$watermarked = $image->waterMark(
    './uploads/photo.jpg',
    './assets/watermark.png',
    9, // Bottom-right
    30 // 30% opacity
);
```

#### Supported Formats

- **Input**: JPG, JPEG, PNG, GIF
- **Output**: JPG, PNG (configurable via constructor)
- **Transparency**: Preserved for PNG/GIF in resize operations

## Usage Examples

### Creating a New Post

```php
// Frontend post creation
if ($_POST['tijiao']) {
    $postModel = new PostModel();
    $data = [
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'authorid' => $_SESSION['username'],
        'addtime' => time(),
        'addip' => ip2long($_SERVER['REMOTE_ADDR'])
    ];
    $result = $postModel->fabiao($data);
    if ($result) {
        // Success
        header('Location: index.php');
    }
}
```

### User Registration

```php
// User registration with validation
$userModel = new UserModel();
$data = [
    'username' => $_POST['username'],
    'password' => md5($_POST['password']),
    'phone' => $_POST['phone'],
    'IP' => ip2long($_SERVER['REMOTE_ADDR']),
    'undertype' => 0,
    'regtime' => time()
];

// Validate input
if (strlen($_POST['username']) < 5) {
    throw new Exception('Username must be at least 5 characters');
}
if (strlen($_POST['password']) < 5) {
    throw new Exception('Password must be at least 5 characters');
}
if (!preg_match("/^1[34578]\d{9}$/", $_POST['phone'])) {
    throw new Exception('Invalid phone number format');
}

$result = $userModel->registDeal($data);
```

### Implementing Pagination

```php
// Get total count
$postModel = new PostModel();
$total = $postModel->getCount();

// Set up pagination
$perpage = 10;
$page = new Page($total['count'], $perpage);
$paginationData = $page->page();

// Get posts for current page
$posts = $postModel->limit($paginationData['limit'])->select();

// Assign to template
$template->assign('posts', $posts);
$template->assign('pagination', $paginationData);
```

### Building Dynamic Queries

```php
$postModel = new PostModel();

// Simple query
$posts = $postModel->where('status = 1')->order('created_at DESC')->limit('10')->select();

// Complex query
$posts = $postModel
    ->where(['status = 1', 'type = "featured"'])
    ->order(['created_at DESC', 'hit DESC'])
    ->limit('5, 10')
    ->select();

// Count with conditions
$count = $postModel->where('status = 1')->count();
```

### Template Usage

```php
// In controller
class IndexController extends Controller {
    public function index() {
        $posts = $this->postModel->select();
        $this->assign('posts', $posts);
        $this->assign('title', 'Homepage');
        $this->display(); // Renders index/index.html
    }
}
```

```html
<!-- In template (index/index.html) -->
<h1>{$title}</h1>
{foreach $posts as $post}
    <article>
        <h2>{$post.title}</h2>
        <p>{$post.content}</p>
        <small>By {$post.authorid} on {$post.addtime}</small>
    </article>
{/foreach}
```

## Configuration

### Database Configuration

Edit `config/database.php`:

```php
return [
    'DB_HOST' => 'localhost',
    'DB_USER' => 'root',
    'DB_PWD' => '',
    'DB_NAME' => 'database_name',
    'DB_CHARSET' => 'utf8',
    'DB_PREFIX' => 'prefix_',
    'DB_CACHE' => 'cache/database/',
];
```

### Namespace Configuration

Edit `config/namespace.php`:

```php
return [
    'index\\controller' => 'app/index/controller',
    'index\\model' => 'app/index/model',
    'admin\\controller' => 'app/admin/controller',
    'admin\\model' => 'app/admin/model',
    'framework\\' => 'vendor/wml/framework/src',
];
```

### Site Configuration

Site information is stored in `vendor/zhan/link.php`:

```php
return [
    'WEB_NAME' => 'Site Name',
    'WEB_LOGO' => 'Site Logo',
    'WEB_ZHIYE' => 'Profession',
    'WEB_EMAIL' => 'contact@example.com',
    'WEB_PHONE' => '1234567890',
];
```

## Error Handling

The framework uses simple error handling:

- Database connection errors exit with message
- Missing template files exit with error
- Validation errors use the `notice()` method
- SQL errors return false

## Security Considerations

- Passwords are MD5 hashed (consider upgrading to bcrypt)
- SQL injection protection through parameter binding
- Session-based authentication
- CSRF protection should be implemented
- Input validation on all user data
- File upload restrictions should be configured

## Performance Optimization

- Template caching is built-in
- Database field caching
- Consider implementing query caching
- Optimize database indexes
- Use CDN for static assets

## Development Guidelines

### Creating New Controllers

1. Extend the appropriate base controller
2. Implement required methods
3. Follow naming conventions
4. Add proper validation
5. Handle errors gracefully

### Adding New Models

1. Extend the base Model class
2. Set table name if different from class name
3. Implement specific business logic
4. Add data validation
5. Document public methods

### Template Development

1. Use the template syntax for dynamic content
2. Keep logic minimal in templates
3. Use template inheritance where possible
4. Optimize for performance

This documentation provides a comprehensive overview of the Yashua e-commerce platform's APIs and components. For specific implementation details, refer to the source code in the respective controller and model files.