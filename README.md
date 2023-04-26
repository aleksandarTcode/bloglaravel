# Blog Laravel 8 app

This is an example of Laravel 8 blog app. It has three types of users: non-logged-in users, logged-in users, and admin users.

## Non-logged-in users

Non-logged-in users can read articles, search for words in articles, search by article category, subscribe to the newsletter, or register and login to become a logged-in user.

## Logged-in users

Logged-in users can do everything non-logged-in users can do, plus the following:

* Bookmark and unbookmark articles
* Follow and unfollow article writers
* Make comments in articles
* Update their own account (change username or profile picture)
* Go to bookmarks page with a list and links to all bookmarked posts and unbookmark individual bookmarks

## Admin users

Admin users (only usernames 'aleksandar' and 'jane' can be admins) can do everything logged-in users can do, plus the following:

* See post view counter for individual posts
* Create new posts and go to the admin dashboard
* In the admin dashboard, create new posts or see the list of all posts with a search option
* Change the post status from draft to publish to make it visible on the main page
* Edit or delete posts
* See the post view counter on the posts list

## Rss feed
All users can access RSS feed that lists all posts under /feeds link

## Installation

Clone the repository from GitHub:
```
git clone https://github.com/aleksandarTcode/bloglaravel
```

Install dependencies using Composer:

```
composer install
```
## Usage

Copy the .env.example file to .env and update the necessary configuration options

For MySQL, create database and insert your credentials in .env file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Run the database migrations and seed data:
```
php artisan migrate --seed
```

Run the webserver on port 8000:
```
php artisan serve
```

These commands will install the project's dependencies, create the database tables, and seed the database with some sample data.
Conclusion

That's it! You now have a working copy of Blog Laravel on your local machine. Feel free to explore the code and make changes as needed. If you have any questions or issues, please create an issue on GitHub or contact the project 
