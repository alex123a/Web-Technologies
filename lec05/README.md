## Exercise: Sessions

In this exercise, it is your job to keep track how many albums a user has saved in the database.
To do this, every saved album should be saved in `Session`.

In the index page of the albums, you should show the amount of albums the user has uploaded so far.
Of course, if another user uploads albums, these numbers should be different.
You can easily test this by open another browser, or using the same browser but in incognito mode.


## Exercise: Validate albums, part one

You have already validated the albums using JavaScript, now it is time to do the same using PHP and Laravel.

The data you should validate is:

* name: should not be empty
* year: should be numeric
* artist: should exist in database

If the data is valid, you should redirect to the album index, where a flash message is displayed: `Album :name created successfully`.
If the data is not valid, you should show the error messages per each input.

## Exercise: User in the systems

Until now, anyone can save albums in your system.
It is time to change this by adding a layer of security: only authorized users can add albums.

Your job is to create an authorization model, where a User can login into the system and add albums.
You need to build a model for the User, the necessary migrations, the view to create a new user, the view to login into the system and a logout button.
You can take advantages of Laravel authentication bootstrap.

In this new version of your app, anyone can see the albums created, but only logged users can add albums into the system.

## Extra: Validate albums, second part

In the first version of validating an album, we missed some of the fields.
Now you need to finish the validation of the album, by adding the following validation rules:

* type: should be one value of a set of three possible values
* tracks: should be more than 0 and every field should be non-empty

Remember to show the error messages for the new validation rules.

## Extra: User roles

Your system will be only accessible for users, but you will have two types of users: *subscriber* and *editor*.
Both users can see the list of albums, but only editors can add more albums into the system.
Remember, users that are not logged in into the system should not even see the list of albums.