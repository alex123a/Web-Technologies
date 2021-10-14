## Exercise: Ajax GET

Remember the Album index web page?
This web page displays a list of every album in your database.
In this exercise you will recreate this list, but using Ajax to get the information.

We do not want you to lose your previous index, so to do this, it is better if you create a new index just for this purpose.
In this new index, you will retrieve all albums using an Ajax call, and then fill the web page with them.

## Exercise: Ajax POST

Go back to your original Album index.
Here, besides each album you will add a link/button to remove an album using a POST Ajax call.
If the removal is successful, then this album should also disappear from the HTML, without reloading the whole index (That is why we use Ajax!). 
*Is POST the best HTTP Method for this?*

## Exercise: Polling

Imagine that you are in the index of albums contemplating the amazing music register you have in your database.
Then another user add a new album, but you cannot see this change in real time!

To solve this problem, you decide to implement a polling strategy when you are in the album index web page.
Here, you ask to the server if new albums have been added, and if the answer is positive, an alert should appear indicating this (remember how insightful are Facebook alerts? you want to do the same here).

This alert should display the number of new albums added since you have been in the index web page.
Now you know when you reload the index, you can see all the new albums there!

## Exercise: WebSocket

You know there is better way of doing the last exercise.
Instead of using a polling strategy, now you are going to use a WebSocket strategy.
Remember to user `pusher` instead of plain WebSockets, they are easier to use in our setup.

## Extra: Ajax DELETE

Remember that you used a POST Ajax call to remove an album from the index?
Now it is time to fix this an use the proper HTTP Method DELETE.

## Extra: Polling/WebSocket automatic update

You have been using polling and websockets to know when new albums has been added, but you still need to reload the webpage.
This time, you are decided to never press again the reload button, so when a new album arrive, you will add it automatically to the list of albums in the index.

Moreover, the notification number should still appear.
This is an important feature for you, you are not looking at the screen at all times and you may miss some changes.
This notification will keep you up to date how many new albums has been added into the database, which are the same that are appended to the list of albums in the index.
And this notification will only be removed (go back to 0) when you decide it (when you click it).

## Extra: WebSocket Chat

Using websockets, you decide to build your own chat application.
Different users can enter to your chat, which can chat between each other in a big whiteboard (speak to all).
They can select a certain user and initiate a private chat with that user.