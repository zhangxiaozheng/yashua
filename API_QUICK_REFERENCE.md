# Yashua Platform - API Quick Reference

## URL Structure
```
index.php?m={module}&c={controller}&a={action}
```

## Frontend APIs (m=index)

### Homepage & Posts (c=index)
| Action | Method | URL | Description |
|--------|--------|-----|-------------|
| `index` | GET | `index.php` | Homepage with paginated posts |
| `read` | GET | `index.php?c=index&a=read&id={id}` | Read full post |
| `love` | GET | `index.php?c=index&a=love&id={id}&state={1\|2}` | Like/unlike post |
| `xiao` | GET | `index.php?c=index&a=xiao&id={id}&stat={1\|2}` | Collect/uncollect post |

### User Management (c=user)
| Action | Method | URL | Description |
|--------|--------|-----|-------------|
| `regist` | GET/POST | `index.php?c=user&a=regist` | User registration |
| `login` | GET/POST | `index.php?c=user&a=login` | User login |
| `pass` | POST | `index.php?c=user&a=pass` | Change password |
| `exit` | GET | `index.php?c=user&a=exit` | User logout |
| `verify` | GET | `index.php?c=user&a=verify` | Generate verification code |

### Post Creation (c=post)
| Action | Method | URL | Description |
|--------|--------|-----|-------------|
| `list` | POST | `index.php?c=post&a=list` | Create new post |

### Comments (c=send)
| Action | Method | URL | Description |
|--------|--------|-----|-------------|
| `huifu` | POST | `index.php?c=send&a=huifu` | Post comment/reply |

## Admin APIs (m=admin)

### Admin Panel (c=index)
| Action | Method | URL | Description |
|--------|--------|-----|-------------|
| `index` | GET | `index.php?m=admin` | Admin dashboard |
| `info` | GET/POST | `index.php?m=admin&a=info` | Site information management |
| `pass` | POST | `index.php?m=admin&a=pass` | Change admin password |
| `book` | GET/POST | `index.php?m=admin&a=book` | User management |
| `column` | GET/POST | `index.php?m=admin&a=column` | Post management |
| `list` | GET/POST | `index.php?m=admin&a=list` | Comment management |

## Model Methods

### Base Model (ORM)
```php
// Query Building
$model->where($condition)->select();
$model->order($order)->limit($limit)->select();
$model->find(); // Single record
$model->count(); // Count records

// Data Operations
$model->insert($data);
$model->update($data); // Requires where()
$model->delete(); // Requires where()

// Magic Methods
$model->getByUsername('john'); // getBy + field name
$model->count(); // Aggregate functions
```

### User Model
```php
$userModel->registDeal($data); // User registration
$userModel->loginDeal($username); // Login data
$userModel->pass($username); // Password data
$userModel->xiu($username, $data); // Update user
```

### Post Model
```php
$postModel->fabiao($data); // Create post
$postModel->read($id); // Read post
$postModel->hit($id, $data); // Update hit count
$postModel->dian($id); // Like data
$postModel->xiu($id, $data); // Update post
$postModel->cha($id); // Collection data
```

### Send Model
```php
$sendModel->tianjia($data); // Add comment
$sendModel->neirong($id); // Get comments
$sendModel->new(); // Recent comments
```

## Utility Classes

### Pagination
```php
$page = new Page($total, $perPage);
$data = $page->page(); // firstUrl, prevUrl, nextUrl, endUrl, limit
```

### Verification Codes
```php
$code = Verify::ver($width, $height, $length, $type);
// Types: 1=numbers, 2=letters, 3=mixed, 4=math
```

### Template Engine
```php
$template->assign($name, $value);
$template->display($file);
```

### File Upload
```php
$upload = new Upload($options);
$success = $upload->uploadFile($fieldName);
```

### Image Processing
```php
$image = new Image($savePath, $randName, $extension);
$image->waterMark($dst, $src, $pos, $opacity);
$image->zoomImg($src, $width, $height);
```

## Form Data Examples

### User Registration
```php
$_POST = [
    'username' => 'testuser', // min 5 chars
    'password' => 'password123', // min 5 chars
    'rpassword' => 'password123', // must match
    'phone' => '13812345678', // Chinese mobile format
    'yzm' => '1234' // verification code
];
```

### Post Creation
```php
$_POST = [
    'title' => 'Post Title', // required
    'content' => 'Post content...', // required
    'tijiao' => '1' // submit flag
];
```

### Comment Posting
```php
$_POST = [
    'id' => 1, // post ID
    'txt' => 'Comment content...' // comment text
];
```

## Response Patterns

### Success Responses
- Redirects to appropriate page
- Sets session data for login
- Updates database records

### Error Responses
- Uses `notice()` method for user feedback
- Returns validation error messages
- Redirects to error or previous page

## Authentication

### Session Variables
- `$_SESSION['username']`: Current user
- `$_SESSION['undertype']`: User type (0=normal, 1=admin)
- `$_SESSION['code']`: Verification code

### Access Control
- Login required: Post creation, comments, password change
- Admin required: Admin panel functions
- Guest access: Registration, login, reading posts

## Database Schema Notes

### User Table
- Username (unique, min 5 chars)
- Password (MD5 hashed)
- Phone (Chinese mobile format)
- IP (stored as integer via ip2long)
- Registration time (timestamp)
- User type (0=normal user)

### Post Table  
- Title, content
- Author ID
- Add time, add IP
- Hit count, like count (smiley)
- Collection count (sollect)
- Like status (zan), collection status (coll)

### Comment Table (Send)
- Post ID (pid)
- Author ID
- Content
- Add time

## Configuration Files

### Database Config (`config/database.php`)
```php
return [
    'DB_HOST' => 'localhost',
    'DB_USER' => 'root', 
    'DB_PWD' => '',
    'DB_NAME' => 'database_name',
    'DB_CHARSET' => 'utf8',
    'DB_PREFIX' => 'prefix_',
    'DB_CACHE' => 'cache/database/'
];
```

### Site Config (`vendor/zhan/link.php`)
```php
return [
    'WEB_NAME' => 'Site Name',
    'WEB_LOGO' => 'Site Logo', 
    'WEB_ZHIYE' => 'Profession',
    'WEB_EMAIL' => 'contact@example.com',
    'WEB_PHONE' => '1234567890'
];
```

## Common Error Codes

### Upload Errors
- `-1`: Directory doesn't exist
- `-2`: Directory not writable  
- `-4`: Invalid MIME type
- `-5`: File too large
- `-6`: Not POST upload

### Validation Errors
- Username too short (< 5 chars)
- Password mismatch
- Invalid phone format
- Incorrect verification code
- Missing required fields