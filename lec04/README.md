## Before Exercises:

Today we work with PHP and Laravel, remember to install both PHP and Laravel!

## Exercise: Create Artist and Album models

Before preparing the web application, we need to create the models.
We are finally going to create Artists and Albums; and save them into a database.

To do this, you need to create a migration for both artists and albums model.
For artists, the only extra field needed is the name.
For albums, remember the fields from previous exercises.
Moreover, an album is associated with one artist, and an artist may have several albums.
Design the database and migration accordingly.


## Exercise: Create album form

Now it is your job to create the album form, this time in Laravel.
We suggest to create the `AlbumController` with `create` method for this.
As a route, we also suggest to use the route `/albums/create`.

In this form, a user should select as an artist for the album one of the artists already inside your database (if you do not have any, create a couple of them).
In this Artist option list, the value of the input should be the id of the artist in the database, so you can find it afterwards!

Remember to add the csrf token in your form.


## Exercise: Save new album

The data of the the previous form should be sent to a new method (we suggest to call this method `store`) from the same controller you created before, and here you have to save your new album into the database.
We suggest to use the route `albums` with the method `POST`. * Why do we use the method `POST`? * * Do we need form method spoofing here? *

When finishing here, you can redirect to the `albums/create` route.


## Exercise: Album index

Now you need to list your albums in an index.
This index should have a list of all albums in the system with the following data:

* Name
* Artist name
* \# of tracks

Moreover, a button here is necessary to access the page to create a new album.
*TIP: remember to use the url helper method to create links!*

## Extra: Success message

When creating a new album, you need to notify the user that the album was saved successfully.
To do this, you need to redirect from the method which you saved the album to the index of your application with a success message.
Then, in the index this success message should be displayed.
The success message should only be displayed after an album was successfully saved, not at all times!
