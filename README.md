URL Shortener RESTful API Service

This project provides a RESTful API for a URL shortening service. The service is built using Laravel and supports user registration, login (with API key authentication using Sanctum), URL shortening, listing, and redirection. Additionally, version 2 of the API includes visit counting for short URLs.
Features
v1

    User Registration: Users can create an account.
    User Login: Returns an API key to authenticate future requests (using Laravel Sanctum).
    URL Shortening: Authenticated users can shorten URLs. If a URL has already been shortened by the user, the existing short URL is returned instead of creating a new one.
    Unique Short URLs: Each shortened URL is unique to avoid collisions.
    List User's URLs: Users can view the list of their registered URLs.
    Redirection: Browsing a short URL redirects to the original long URL.

v2

    All v1 Features: v2 includes all features from v1.
    Visit Counting: Keeps track of the number of times each short URL has been accessed.

Installation
Step 1: Install Dependencies

Clone the project and install all necessary dependencies:

composer install

Step 2: Set Up Environment Variables

Copy the example .env file and generate a new application key:

cp .env.example .env
php artisan key:generate

Update the .env file with your database credentials.
Step 3: Run Migrations

Run the database migrations to create the required tables:

php artisan migrate

Step 4: Serve the Application

Start the development server:

php artisan serve

API Routes
v1 Routes
Method	Endpoint	Description
POST	/api/v1/register	Register a new user
POST	/api/v1/login	Login and retrieve an API token
POST	/api/v1/logout	Logout the user and revoke the token
POST	/api/v1/shorten-url	Shorten a URL
GET	/api/v1/list-urls	List URLs registered by the authenticated user
GET	/{short_url}	Redirects to the original long URL (Web route)
v2 Routes

Includes all v1 routes plus:
Method	Endpoint	Description
GET	/api/v2/list-urls	List URLs with visit counts
Usage Example
Setting the Bearer Token in Postman

    Obtain the token by logging in at /api/v1/login.
    Save the token in an environment variable, e.g., access_token.
    Use Bearer {{access_token}} in the Authorization header for all authenticated requests.

Example JSON Responses

Shorten URL Request:

POST /api/v1/shorten-url
{
    "long_url": "https://example.com"
}

Response:

{
    "short_url": "https://your-domain.com/abc123"
}

List URLs Response:

[
    {
        "long_url": "https://example.com",
        "short_url": "abc123",
        "user_name": "Mahir",
        "user_id": 1
    }
]

License

This project is licensed under the MIT License.
