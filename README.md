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

## Installation

1. **Clone the Repository**:
   ```bash
   git clone <your-repo-url>
   cd <your-repo-directory>
