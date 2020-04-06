
------------------
   Header Files
------------------

There are two header files in our project:
1. header.php
2. header_before.php

Every page that does not deal with User login will have "header_before.php"
and every page that is displayed when the user logs in will have "header.php"


------------------
   Register Page
------------------

This page contains a basic registration form where all inputs are required.
After registration, this is how the information gets saved in the database:
- The username and password are inserted in 'login' table.
- All information, except password, is inserted in 'clients' table.


------------------
   Login Session
------------------

The "header.php" file will automatically call the session.php file. 
Session checks whether a user is logged in or not, so it can start the session. So this file will return
the username that has logged in, in a string called $login_session.
For Example, suppose Awsaf1234 has logged in. This username is saved as 
$login_session = "Awsaf1234" so you can use it any way you want for queries.
If username is not found, session will redirect us to sign in page.
There is also a logout file which simply destroys the session.


------------------
   Welcome Page
-------------------

After successful login, user is redirected to 'welcome.php' page.
This page shows us a different header file (header.php) with some features.
All Packages are listed here and the user can browse or choose any of them.
There is a search box to search for any particular destination. 
(The search box searches name of package, destination and the main attractions of the package)

Expected Features : Sorting by Duration of trip, Travel without package


------------------
   Package Details
-------------------

The user selects a package and is redirected to this page (view_package.php) via GET method.
All available information about this particular tour package is enlisted here.
(Since the url shows the id of the package, anyone can change it to view some other package.
Any package with invalid id will redirect to Error page 404.php.

Once the "Book Now!" button is clicked, the user will be redirected another page for booking.


------------------
   Booking Page
------------------

This Page will be accessed after selecting a package.
Here all information regarding the trip will be finalized.
Hotels and Transportation Systems will be suggested here.
For Example, if the user selects a tour package to Chittagong, All hotels in Chittagong 
will be displayed for the user to choose. Similarly, all transports (Air, Water or Bus)
from Dhaka to Chittagong will be enlisted. 

