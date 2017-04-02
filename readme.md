<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Learning Laravel

Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
# DiscoveReal
### General introduction:
DiscoveReal is a forum website for travelers to share their experience.
Users can make posts, comment on other people's posts, upload images, send messages to other users.
The posts are organized by countries, from the destination page, you can find categorized posts.
There are only 4 countries populated with seeder posts, you are free to add more and play with it. ;)

### Features included besides required:
Front-end features:
1. A simple carousel on the home page.
2. Dropzone.js is used for image uploading.
3. Modals are added when users click other user's name on the website, then he/she can choose to view all posts from that user or send him/her a message.
4. Modals are also used when users delete.
5. Pagination is added to pages.
6. Tinymce is used in almost all text boxes for users to style their comments.
7. An image gallery is implemented, when you click on images in a post, you can view other images in the generated gallery by clicking next or prev buttons.


Back-end and other features:
1. A messenger is added into the website.
2. The website supports multiple image uploading.
3. News Purifier is used to purify text with HTML code.
4. Snappy is used to transfer HTML content to PDF.
5. Toastr is added for better UX by popping up notifications indicating how an operation is completed, success or fail.


### Remarks of this assignment:
1. The administrator's username is haiyima, the password is 11111111.
2. The three regular users:
username: robsmith, password: 11111111
username: laurastone, password: 11111111
username: mengxuezhang, password: 11111111
3. To reach the admin page, please log in with administrator's account, then from the profile page, you can reach admin page with a button below edit button.
4. Users' profile images are designed to be updated separately by Ajax call.
5. In order to download PDF, please install wkhtmltopdf, and set the path to "C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf.exe".
6. In Admin page, administrators are design not to have the right to edit users' profiles, only delete and read, create can be done in signup page.
7. Each user's profile page has all his posts and conversations, the logout option is also in the profile page as well as option of making a new post.
8. It is designed that username cannot be edited.
9. The very first post "lovely city" in the Netherlands is populated with images and comments. Others are not.