## Exercise: Create your own self-signed certificate

You must create a self-signed certificate, which can be is used in the NodeJS server presented in the example.

First, install `openssl`.

* Mac/Linux: you may already have `openssl` installed.
* Windows Subsystem for Linux: `sudo apt-get install openssl`.
* Windows: https://tecadmin.net/install-openssl-on-windows/

Generate a self-signed certificate: https://letsencrypt.org/docs/certificates-for-localhost/

Run your NodeJS HTTPS server with your certificate.

## Exercise: CSRF Attack

In this exercise, you must simulate a CSRF Attack. To do this, you will follow the next steps:

* Remove the CSRF protection for creating albums in your application.
* Create a plain HTML web page (outside your framework)
* This HTML should have a form with the necessary inputs to create an Album. Remember to set up the action and the method to your local server.
* You can open this HTML web page outside the server, you will see something like this in the URL: `file:///<path_to_file>`.
* Submit the data to create a new album, and check if a new album is created.
* Add the CSRF protection and try to create an album from your plain HTML page, what happened?

## Exercise: XSS Attack

Here you will simulate an XSS Attack:

* First, create a show page for your albums
* On this page, you should show the name, the artist name, the description, and the tracks of the album.
* Create a new Album, and in the description add JavaScript code.
* Check the execution of the JavaScript code in the show of this album.

Can you automatically redirect someone who wants to know more of an album to any other webpage?

Play with other HTML elements. Can you create a description that renders with style?

## Exercise: Use your own salt to hash passwords

PHP hashing algorithms already work with salt for passwords.
However, you will add your own salt to your application.
To do this, you will use the same hashing algorithms you are using, but you should use an extra salt created by you:

    Hash::make($password . $mySalt);
    Hash::check($password . $mySalt , $hashedPassword)

To create a salt, you can use the following function:

    $salt = bin2hex(random_bytes($numberOfDesiredBytes));

Remember:

* Each user has a different salt
* You should save the used salt in the database (or else, you will not be able to check the password!)
