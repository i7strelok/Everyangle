# Everyangle
Everyangle code challenge

Introduction

The requirements have been provided by Mr. Piotr Gospodarczyk, however, these will be considered as functional requirements. Additionally, the non-functional requirements will be detailed.

Selection of technologies

The technologies selected for the realization of this project are:

PHP	8.1.6

Laravel Framework	9.33.0

HTML

Javascript

CSS

JQuery	3.5.1

Bootstrap	4.3.1

PHPUnit (included in Laravel)	8

Coding Conventions

In order to achieve a high level of technical interoperability between shared PHP code, it is always advisable to follow Code Conventions, and this project will be no exception.

In order to achieve the above, the following standards will be used:

1-	PSR-1: Basic Coding Standard

2-	PSR-2: Coding Style Guide

Below are some examples of both standards:

PSR-1: Basic Coding Standard

-	Class names MUST be declared in StudlyCaps.

-	Class constants MUST be declared in all upper case with underscore separators.

-	Method names MUST be declared in camelCase.

PSR-2: Coding Style Guide

-	Code MUST use 4 spaces for indenting, not tabs.

-	There MUST NOT be a hard limit on line length; the soft limit MUST be 120 characters; lines SHOULD be 80 characters or less.

-	There MUST be one blank line after the namespace declaration, and there MUST be one blank line after the block of use declarations.

Testing

Testing is a fundamental part, since it evaluates the quality of the software. 
According to Glen Myers, software testing has the following objectives:

1)	The process of investigating and checking a program to find whether there is an error or not and does it fulfill the requirements or not is called testing.

2)	When the number of errors found during the testing is high, it indicates that the testing was good and is a sign of good test case.

3)	Finding an unknown error that’s wasn’t discovered yet is a sign of a successful and a good test case. 

PHPUnit is a programmer-oriented testing framework for PHP. A unit test consists of checking the correct functioning of a developed functionality. The objective of unit tests is to demonstrate that each functionality works correctly and to find problems in the initial phases of software development.
In all my developments I consider the use of PHPUnit essential.

In order to run the unit tests, run the following command: php artisan test

Code Clarifications

In software design and development, it is very important to understand 100% of the software requirements and not make assumptions. That is why I made the decision to send a document with questions about the development of this project.

•	I have understood that there will only be 3 Media Types, so I made the decision that there will be no possibility to add new, delete or edit existing ones. If you want to add a new one in the future, just create a class that implements the MediaTypeInterface.php interface. In case the idea is that users with elevated privileges (for example, Administrator) can add, delete and edit them at any time, the ideal would be to create a table for the MimeTypes that is related to the MediaType table. So, a MediaType supports N Mime types, but this would also require a privilege system to be implemented.

•	To be able to interact with the platform it is necessary to be logged in. If you run the Seeders you will have automatically created users, but if you prefer you can register.

•	Only users who have uploaded the Media Items (authors) can edit or delete the Media Items, however, all users can view it in the list or play it.

•	File upload has been implemented, where the MIME TYPE of the files is checked, therefore, if you wish to register files, make sure that files supported by the platform are selected. You can see the supported formats in the list of Media Types. This implementation is basic, however, I can perform more checks such as: maximum file size, duration, etc.

•	The last 3 categories added to the system are shown on the home page, regardless of the Media Type, that is, they can be of the same Media Type or of a different one. The last 9 Media Items added to the platform are also shown. A good update could be: keep track of what users visit (categories and media items) to show them on the home page.

•	The playback of any Media Type has not been implemented, therefore, when you try to play a Media Item, you will be redirected to the corresponding view where a text message will be displayed.

•	Another good update would be to implement a privilege system and delegate the responsibility of managing the categories to the Administrators. New Middleware can be created to control access to controllers.


Instructions

The commands that should be executed to clone the repository and run the server on localhost will be detailed. Make sure you have Apache, Mysql, Php, Composer, etc. Before running the migration, create an .env file with the database connection settings.

git clone https://github.com/i7strelok/Everyangle.git

composer install

php artisan migrate (press yes)

php artisan migrate:refresh –seed

php artisan key:generate

php artisan serve


Credentials for software testing

The following table details credentials to log in and test the system

piotr@everyangle.ai	@PiotrCTO@EveryAngle

fergal@everyangle.ai @FergalHR@EveryAngle

david@everyangle.ai	@DavidCEO@EveryAngle


