bugapp_mvctwig
==============

bugapp_mvc
BUGAPP DESCRIPTION:

Bugapp is the application which facilitates the bug tracking team in maintaning an updated record of all types of bugs, their status ,to whom is assigned to and many other details.

The functionalities that can be performed in this application are-
1.all the valid accound holders can login into the application 
2.users can see all the bugs data present in the database
3.users can insert and update the bugs data in database
4.users can search the data they require using the ID ,any text or the search form in header. THey can even use the UI filters options present for each column.




PAGE-WISE DESCRITION OF APPLICATION:

1.Login page--users can login into the app using the credentials given to them and if its valid they will navigate to bugs_page or else error message will be displayed if credentials are invalid or left blank.
2.Register page -- It provides the new user to register into the bugapp application.This page contains some fields which should be entered by the new user.
                   Once the registration was successfull it will redirect you to the home page where you need to submit the username and password,once it is successful you can access this application.
3.Bugs_page--
	BODY--In this by default the users can view the list of bugs and their related data present in database.
		  The bugs table is displayed using the pagination concept
	HEAD--in this user can view the following functionalities
		  1.bugs--can view the default total list of bugs and related data	
		  2.search--no functionality written,only UI has been done
		  3.go to id--can retrieve particular record related to id of bugs given in search input
		  4.search text--can retrieve any data from database bugs table which resembles the search input text
		  5.logged in as--shows the username of the user with which user logged in 
		  6.log off--redirected to home page(login page) ,on clicking this user can log out of the session and go to the login page
		  7.add new bug--redirected to create_bugs page where a form is displayed for taking users input details of bugs which on submit gets inserted into the database bugs table
4.Create_bugs page--
