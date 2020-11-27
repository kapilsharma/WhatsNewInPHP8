# Introduction

**Book version 1.0.0**

This book is just the notes made by the author (Kapil Sharma) while going through new features of PHP 8. I'll be sharing this as an ebook, in case someone finds these notes helpful.

I'll be first sharing this book during Laravel-Nagpur meetup on November 27th, 2020 at 7:30 pm IST, presented by me and live-streamed on YouTube. If you are reading the book later, you may see the recording on that meetup on Laravel-Nagpur's [YouTube channel (https://bit.ly/laravel-ngp-nov-2020)](https://bit.ly/laravel-ngp-nov-2020)

PHP 8 is the next major version of PHP. As like in any major version, there will be some breaking changes. That means we can not update PHP version on the server and expect everything to be working.

We are dividing this ebook into few sections:

- Major new changes.
- New functions.
- Syntax changes
- Breaking changes
- Internal improvements

### Code examples.

During the meet-up, we will be using a practical approach, lot of examples will be shown during the meet-up and also used in this book. You can get all of these examples by cloning [Git repository (https://github.com/kapilsharma/WhatsNewInPHP8)](https://github.com/kapilsharma/WhatsNewInPHP8).

Once you clone the repository, it has the following folders:

- `assets` - Ignore them. They are some assets used for making the ebook.
- `contents` - You can ignore them as well. It contains markdown files used to generate ebook. You may better use PDF ebook. If you wish to make any correction in the generated PDF, you may consider to fix the error/typo in related markdown and probably send back pull request with the correction.
- `example` - This folder contains the example PHP code used in the ebook. Each feature given in this book, have its folder under example and contains the code of examples given in the section. Even in the ebook, the file name of the example is there above the code.
- `export` - You will not get this folder after clone. However, if you decide to generate the ebook, the folder will be created automatically. Thanks to [Mohamed Said](https://twitter.com/themsaid), I'm using [ibis](https://github.com/themsaid/ibis) to generate this ebook. If you wish to make some correction (please consider PR) and regenerate the ebook yourself, just setup ibis and run `ibis build` command. This folder is added to '.gitignore' file to avoid committing it.

### Running the examples in PHP 8

At the time of writing this ebook, PHP 8 is still not released. I'm pretty sure it will be released by the time you will be reading this ebook. If not, or you may not install PHP 8 on your system for some reasons, you may use PHP 8 docker with following command (Expecting docker is installed on your system, if no, just DuckDuckGo as I can't cover docker installation in this book):

```bash
docker run -it -v "$PWD":/usr/src/app -w /usr/src/app php:8.0.0RC5 /bin/bash
```

Please note, `PHP 8.0.0 Release candidate 5` is latest at the time of writing this ebook. You may want to check PHP's official [dockerhub (https://hub.docker.com/_/php?tab=tags)](https://hub.docker.com/_/php?tab=tags) to check the latest PHP 8 version available and change `php:8.0.0RC5` in the above command with the latest version.

Also, it is recommended to run `composer install` (locally, not in docker) to generate required autoloading, which is needed for few examples.

### License

You can use these notes as you wish for personal learning. However, if you wish them to improve and share, please consider sending a pull request for improvement and keep the original author's name. In short, if you want to use these notes in any way, feel free to use it under [Creative Commons Attribution Share Alike 4.0 International](https://creativecommons.org/licenses/by-sa/4.0/) license.

### About author

**Short intro:** I'm Kapil Sharma, developing web applications since 15+ years in different technologies including PHP. I started my career in 2004, as a web designer, working in HTML 4 (Without CSS, using huge tables with a lot of rowspan and colspan for designing web pages). Soon I started using CSS 2, JavaScript and PHP 4/5. Later I started working as a developer in PHP and Java/J2EE. By the end of 2005, I completely started working on Java/J2EE and worked on it for next 3 years, mostly on OFBiz, Mule, Service Mix (Java) and occasionally on Joomla version 1 (PHP). In 2009, I worked on PHP, Python and Ruby on Rails and since 2010, I started working mostly in PHP.

I used PHP without using any framework, Code Igniter, Zend Framework 1, Symfony and nowadays mostly Laravel and Node JS along with Angular and Vue JS for frontend.

I also help to manage PHP Reboot, a developers' community in Pune, India since 2014 and a regular speaker on PHP Reboot and other meetups.

Right now, I'm working as Technical Architect at Cactus Global, Mumbai but I'm serving my notice period and soon will be joining Parker Consulting in Pune.

### Credits

While learning new features of PHP 8, making my notes and converting them into this ebook, I went through a lot of websites, articles, tutorials, PHP manual and official RFC. I mostly used search engine (Google and DuckDuckGo) to find them. I did not remember the link of all those pages but I'm thankful to everyone who posted any article/tutorial about new features of PHP 8, they helped me learn new features of PHP 8, make my notes and this book.

Most important were the PHP RFC, which I added as a source wherever possible. Until PHP 8 documentation is available, RFC is the best place to understand an upcoming feature.

I'd like to specially mention [stitcher.io blogs](https://stitcher.io/blog/page-1), which help me to understand a few RFC in details.

I used free service of [canva.com](https://www.canva.com) to design the cover page of the book and would like to thanks them for providing an online tool to create a free book cover.

## Issues

If you find any issue in the book, feel free to send a PR or at least [create a bug report (issue at https://github.com/kapilsharma/WhatsNewInPHP8/issues)](https://github.com/kapilsharma/WhatsNewInPHP8/issues) on GitHub. I will frequently check the issue and fix the issues in next version of the book.

## Improvements, book version

There is a chance of improvement in every work. I'll be doing it myself and fixing the issue raised by others. Make sure you have latest version of the book. Book version is given at the top of the introduction section of the book and on [GitHub (https://github.com/kapilsharma/whatsnewinphp8)](https://github.com/kapilsharma/whatsnewinphp8). If you find you have older version, please download the newer version of the book with bug fix and new features.
