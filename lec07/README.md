## Exercise: Prepare your system with Sentry

Your project must work with error handling tools like Sentry. 
For this, you should take your assignment from lecture 6 and add Sentry support to it.
When you are sure Sentry is added correctly, it must be deactivated for working in your development environment.

## Exercise: Unit Test

Similar to the examples presented during class, you have to create unit testing for the Album and Artist model.
For the Album model, you should create the method `amountOfTracks`, which is the same method we use as an example during class.
For the Artist model, you must create the method `amountOfAlbums`, which returns an integer representing how many albums this artist has.
For both cases, you must write and test the methods.

## Exercise: Feature Test without users

In the exercise of lecture 5, you created an authorization system where only register users can create albums.
In this exercise, you must test only the creation of albums, without considering the user.
For this, you can follow the example `Feature\AlbumTest>testNoUserCreateWithoutMiddleware`, where you must make a POST call to the album store URL, with the correct parameters.

## Exercise: Feature Test with users

Now you are going to test the same case as before, but using a logged user.
You can follow your previous solution and the `Feature\AlbumTest>testUserCreate` method from the examples.

## Exercise: Browser Test

In this case, you are going to test a complete use case.
We list the use case, and for each step, you need to write the necessary asserts for it:

1. Go to the home page. Test you are in the right location.
2. Login with a user in the test.
3. Click on the link to create an album and create one.
4. Test that you are in the right URL after creating the album, with the right Flash text.
5. Test that the new album is listed on the Album index page.

## Extra: Test-driven development

Test-driven development (TDD) is a software development process where you write a test before implementing a feature.
Using TDD is out of the scope of the course, but here you can start working with it using a small example.
In this example, you are the one deciding a new feature in your system.
After you decide which feature you are going to implement, just before implementing it, you must write the test for it.

We recommend you to:

1. Think about a new feature
2. Create Unit tests if necessary. It may not be necessary depending on the complexity of your feature
3. Create Feature tests. Here you will decide the route and parameters for your new feature.
4. Make previous tests work. Create routes, controllers, and actions as necessary.
5. Write Browser tests for your feature.
6. Make browser tests work.
