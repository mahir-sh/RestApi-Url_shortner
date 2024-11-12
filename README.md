# URL Shortener RESTful API

This RESTful API provides URL shortening services with user registration and authentication. The API includes two versions with enhanced features in version 2.

## Features

### v1
- **User Registration**: Register a new user account.
- **User Login**: Authenticate users and return an API token via Sanctum.
- **URL Shortening**: Shorten a long URL. If the long URL already exists for the user, return the existing short URL instead of creating a new one.
- **URL List**: Retrieve a list of URLs shortened by the authenticated user.
- **URL Redirection**: Short URLs redirect to their respective long URLs when accessed in the browser.

### v2
- Includes all features from **v1**.
- **Visit Count**: Track the number of times each shortened URL is accessed.


## API Routes

### Authentication Routes
| Method | Endpoint               | Description                                 |
| ------ | ----------------------- | ------------------------------------------- |
| POST   | /api/v1/register        | Register a new user.                        |
| POST   | /api/v1/login           | Log in to receive an API token.             |
| POST   | /api/v1/logout          | Log out the authenticated user. Requires authentication. |

### URL Shortening Routes (v1)
| Method | Endpoint               | Description                                 |
| ------ | ----------------------- | ------------------------------------------- |
| POST   | /api/v1/shorten-url     | Shorten a URL (Requires API token).         |
| GET    | /api/v1/list-urls       | List all URLs shortened by the user.        |
| GET    | /{short_url}            | Redirect to the original URL.               |

### Additional Features in v2
| Method | Endpoint               | Description                                 |
| ------ | ----------------------- | ------------------------------------------- |
| POST   | /api/v2/shorten-url     | Shorten a URL with visit counting.          |
| GET    | /api/v2/list-urls       | List URLs with visit counts.                |





## Installation

**Clone the Repository**:
   ```bash
   git clone https://github.com/mahir-sh/RestApi-Url_shortner.git

```

```bash
# Install Dependencies
composer install
```

# Set Up Environment Variables

```bash
cp .env.example .env
php artisan key:generate
```
# Configure Database
# Update your .env file with your database credentials, then run migrations:

```bash
php artisan migrate
```

# Serve the Application

```bash
php artisan serve
```

![image](https://github.com/user-attachments/assets/df184dda-4633-484d-a1a9-90ca82097674)

