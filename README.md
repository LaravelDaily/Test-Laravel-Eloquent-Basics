## Test Your Laravel Eloquent Basic Skills

This repository is a test for you: perform a set of tasks listed below, and fix the PHPUnit tests, which are currently intentionally failing.

To test if all the functions work correctly, there are PHPUnit tests in `tests/Feature/EloquentTest.php` file.

In the very beginning, if you run `php artisan test`, or `vendor/bin/phpunit`, all tests fail.
Your task is to make those tests pass.

## How to Submit Your Solution

If you want to submit your solution, you should make a Pull Request to the `main` branch.
It will automatically run the tests via GitHub Actions and will show you/me if the test pass.

If you don't know how to make a Pull Request, [here's my video with instructions](https://www.youtube.com/watch?v=vEcT6JIFji0).

This task is mostly self-served, so I'm not planning review or merge the Pull Requests. This test is for yourselves to assess your skills, the automated tests will be your answer if you passed the test :)


## Questions / Problems?

If you're struggling with some tasks, or you have suggestions how to improve the task, create a GitHub Issue.

Good luck!

---

## Task 1. Model with Different Table Name.

In `app/Models/Morningnews.php` file, change it so that the model would work with "morning_news" table, as it is created in the migrations.

Test method `test_create_model_incorrect_table()`.

---

## Task 2. Get Data List.

In `app/Http/Controllers/UserController.php` file method `index()`, write Eloquent query to get 3 newest users with verified emails, ordered from newest to oldest. Transform this SQL query into Eloquent:

```
select * from users where email_verified_at is not null order by created_at desc limit 3
```

Test method `test_get_filtered_list()`.

---

## Task 3. Get a Single Record.

In `app/Http/Controllers/UserController.php` file method `show($userId)`, fill in the `$user` value with finding the user by `users.id = $userId`. If the user is not found, show default Laravel 404 page. 

Test method `test_find_user_or_show_404_page()`.

---

## Task 4. Get a Single Record or Create a New Record.

In `app/Http/Controllers/UserController.php` file method `check_create()`, find the user by name and email. If the user is not found, create it (with random password).

Test method `test_check_or_create_user()`.

---

## Task 5. Create a New Record.

In `app/Http/Controllers/ProjectController.php` file method `store()`, creating the project will fail. Fix the underlying issue, to make it work.

Test method `test_create_project()`.

---

## Task 6. Mass Update.

In `app/Http/Controllers/ProjectController.php` file method `mass_update()`, write the update SQL query as Eloquent statement.

```
update projects set name = $request->new_name where name = $request->old_name
```

Test method `test_mass_update_projects()`.

---

## Task 7. Update or New Record.

In `app/Http/Controllers/UserController.php` file method `check_update()`, find a user by $name and update it with $email. If not found, create a user with $name, $email and random password

Test method `test_check_or_update_user()`.

---

## Task 8. Mass Delete Users.

In `app/Http/Controllers/UserController.php` file method `destroy()`, delete all users by the array of `$request->users`

Test method `test_mass_delete_users()`.

---

## Task 9. Soft Deletes.

In `app/Http/Controllers/ProjectController.php` file method `destroy()`, change Eloquent statement to still return the soft-deleted records in the list of `$projects`

Test method `test_soft_delete_projects()`.

---

## Task 10. Scopes with Filters.

In `app/Http/Controllers/UserController.php` file method `only_active()`, make the main statement work and to filter records where email_verified_at is not null.

Test method `test_active_users()`.

---

## Task 11. Observers with New Record.

In `app/Http/Controllers/ProjectController.php` file method `store_with_stats()`, create a separate Observer file with an event to perform a +1 in the stats table.

Test method `test_insert_observer()`.

---
