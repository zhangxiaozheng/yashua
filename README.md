# Yashua E-commerce Platform (牙刷商城)

A PHP-based e-commerce platform built with a custom MVC framework.

## Documentation

📖 **[Complete API Documentation](API_DOCUMENTATION.md)** - Comprehensive documentation for all APIs, functions, and components

🚀 **[Quick Reference Guide](API_QUICK_REFERENCE.md)** - Concise overview of all endpoints and methods

📮 **[Postman Collection](Yashua_API_Collection.postman_collection.json)** - Ready-to-use API collection for testing

## Overview

Yashua is a modern e-commerce platform featuring:

- **Custom MVC Framework** with PSR-4 autoloading
- **User Management** with registration, authentication, and profiles
- **Content Management** for posts, comments, and interactions
- **Admin Panel** for site administration
- **Template Engine** with caching and custom syntax
- **File Upload & Image Processing** capabilities
- **Pagination & Search** functionality

## Quick Start

1. **Setup Database**: Configure `config/database.php` with your database credentials
2. **Configure Site**: Update `vendor/zhan/link.php` with your site information
3. **Set Permissions**: Ensure `cache/` and `upload/` directories are writable
4. **Access Application**: Open `index.php` in your web browser

## API Structure

```
Frontend: index.php?m=index&c={controller}&a={action}
Admin:    index.php?m=admin&c={controller}&a={action}
```

## Key Features

### Frontend APIs
- Homepage with paginated content
- User registration and authentication
- Post creation and management
- Comment system with replies
- Like and collection functionality

### Admin APIs
- User management and moderation
- Content administration
- Site configuration
- Comment management

### Framework Components
- **Model**: ORM with query building and data validation
- **Template**: Custom template engine with caching
- **Upload**: File upload handler with validation
- **Image**: Image processing with watermarking and resizing
- **Page**: Automatic pagination system
- **Verify**: Verification code generation

## Development

The platform follows MVC architecture:

```
MVC/
├── app/
│   ├── index/          # Frontend application
│   └── admin/          # Admin panel
├── boot/               # Bootstrap files
├── config/             # Configuration
├── vendor/             # Framework components
└── public/             # Static assets
```

For detailed information, please refer to the [complete documentation](API_DOCUMENTATION.md).
