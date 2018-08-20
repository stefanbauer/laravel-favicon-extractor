# Contributing

If you want to contribute to one of my projects and make it better, **your help is very welcome**. It's also a great way to learn more about **social coding on Github** and **new technologies**.

For contribution please create a PR on [Github](https://github.com/stefanbauer/laravel-favicon-extractor).

## Pull Requests

#### Coding Standards

I use the **[Symfony Coding Standard](https://symfony.com/doc/current/contributing/code/standards.html)**. It's basically the **[PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)**, just with some additional standards. I always add a `.php_cs.dist`. Run the `php-cs-fixer` to keep code valid.

#### Feature Branches 

- **Use feature branches:** Create a new branch to work on. Branch from `master`.
- **One feature per PR:** I love simplicity. Please create only one PR per feature. If you would like to change more, create more PRs.

#### Commits

- **Don't pollute the git history:** Please don't create several (senseless) commits. Squash/Rebase your commits into one or several meaningful commits.
- **Commit in present tense:** Always write your commit messages in the present tense. Your commit message should describe what the commit, when applied, does to the code – not what you did to the code.

#### Tests

- **Don't forget your tests:** I don't accept your PRs without any tests.

#### Documentation
- **Document behaviour related things:** Update the `README.md` with details of changes if necessary.

## Running Tests

``` bash
$ vendor/bin/phpunit
```
