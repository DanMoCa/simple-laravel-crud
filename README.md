<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Simple laravel CRUD using https://www.digitalocean.com/community/tutorials/simple-laravel-crud-with-resource-controllers as reference.

Updated to laravel 10

## Test Your Laravel Simple CRUD Skills

This repository is a test for you: perform a set of tasks listed below, and fix the PHPUnit tests, which are currently intentionally failing.

To test if all the functions work correctly, there are PHPUnit tests in `tests/Feature/CRUDTest.php` file.

In the very beginning, if you run `php artisan test`, or `vendor/bin/phpunit`, all tests fail.
Your task is to make those tests pass.

## How to Submit Your Solution

If you want to submit your solution, you should make a Pull Request to the `main` branch.
It will automatically run the tests via GitHub Actions and will show you/me if the test pass.

If you don't know how to make a Pull Request, [here's a video with instructions from Laravel Daily](https://www.youtube.com/watch?v=vEcT6JIFji0).

This task is mostly self-served, so I'm not planning review or merge the Pull Requests. This test is for yourselves to assess your skills, the automated tests will be your answer if you passed the test :)


## Questions / Problems?

If you're struggling with some tasks, or you have suggestions how to improve the task, create a GitHub Issue.

Good luck!

---

## Task 1. Route Resource Controller not defined.

In `routes/web.php` file, the routes for `/sharks` are not defined, define a Route Resouce Controller and use `app/Http/Controllers/SharkController.php`

Test method `test_routes_are_defined()`.

---

## Task 2. Shark index() method.

In the `app/Http/Controllers/SharkController.php` file, the logic for the `index()` method is missing

Write the logic to show the `sharks/index.blade.php` view when visiting the route named `sharks.index` with a 
variable named `sharks` for all the registered sharks.

Test method `test_show_list_of_sharks()`.

---

## Task 3. Shark create() method.

In the `app/Http/Controllers/SharkController.php` file, the logic for the `create()` method is missing 

Write the logic to show the `sharks/create.blade.php` view when visiting the route named `sharks.create`

Test method `test_shark_create_form()`.

---

## Task 4. Shark store() method.

In the `app/Http/Controllers/SharkController.php` file, the logic for the `store()` method is missing

Write the logic to store a shark using the validated request parameters of the `validator` variable and 
redirect the user to the route named `sharks.index` with a success `message` to the user.  

Test method `test_shark_store()`.

---

## Task 5. Shark show() method.

In the `app/Http/Controllers/SharkController.php` file, the logic for the `show()` method is missing

Write the logic to show the `sharks/show.blade.php` view when visiting the route named `sharks.show` with a 
variable named `shark` for the selected shark.

Test method `test_shark_show()`.

---

## Task 6. Shark edit() method

In the `app/Http/Controllers/SharkController.php` file, the logic for the `edit()` method is missing

Write the logic to show the `sharks/edit.blade.php` view when visiting the route named `sharks.edit` with a 
variable named `shark` for the selected shark.

Test method `test_shark_edit_form()`.

---

## Task 7. Shark update() method

In the `app/Http/Controllers/SharkController.php` file, the logic for the `update()` method is missing

Write the logic to update the selected shark using the validated request parameters of the `validator` variable and
redirect the user to the route named `sharks.index` with a success `message` to the user.

Test method `test_shark_update()`.

---

## Task 8. Shark destroy() method

In the `app/Http/Controllers/SharkController.php` file, the logic for the `update()` method is missing

Write the logic to destroy the selected shark andredirect the user to the route named `sharks.index` 
with a success `message` to the user.

Test method `test_shark_destroy()`.

---
