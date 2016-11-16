# petcommunity forum
1.	Objectives : This website is for pet owners or people who likes/wants pets. Main purpose is to make people to adopt pets from the shelter instead of buying a new one, to adopt pets from the other owners who has some personal circumstances for not being able to have them. Also, there is a board that people can post for missing their dogs or found dogs. Furthermore, for people whom does not like their pets to be in small cage that dog hotel uses, they can post to find someone to take care of their dogs or they can take care of others’ dogs for some daily charge. Lastly, people can post and watch the videos people’s pet. 

2.	Details of functionality :
    
    a.	Posting a board and check out the board that people post : 

        All the Adoption from other users, Lost, Found, Care, Cared, and Petube will have a functionality of posting a new post and check them out with a stored posts. Post will be stored in database and read from the database.
        
    b.	Check out the adoption from the shelter using zip code and radius : 
    
        After getting the zip code and radius from the user, it directs to the actual adoption website that has lists of the pets available for adoption.
        
    c.	Check out the encyclopedia of the pets(only dogs in this case) : 

        It will let users to choose the breeds of the dog that is stored in database (about 225 breeds). Then, it will direct to other website that has the information on that breed.
        
    d.	Sign up and Login : 
    
        All users can use the service except posting a new post and messaging without logged in. In order them to posting a new post or send a message to other users, they have to login first. If they do that have an account, they can create a new. 
    
    e.	After Login, user can send a message to other users : 
    
        Users can send a message to each other. All the messages will be stored and read from the database. It is more likely a chat style message so that they can lively have a conversation. Yet, notification of new message has not been implemented.
    
    f.	Checking all inputs to be valid:
    
        It is checking basic input checking such as allow only numbers to the Zip code, allow number and one dot to the amount of money, check if Zip code is length of 5, check if password are matched when they are signing up, check if the id they try to sign up is existing. If user try to violate those, it will either pop up the alert message or showing the red text warning next to input.

3.	Implement detail:
    1)	Web programming language used :

        a.	Html – Basic layout of the page, input and output designs.

        b.	Jquery – Handles all event types such as click, keypress, redirects, and showing error message. Also, Used to send data to Ajax and Json.

        c.	Php – Mostly handles getting data after submitting, inserting and getting data from the database. Also, used to handle Ajax and Json.

        d.	 Ajax, Json – Used to process the data without reloading the page such as searching the post function and message function. This makes the pages stable and dynamic. 

    2)	Tools used :

        a.	Mysql – To store the data.

        b.	Notepad++ - To write the web program language.
        
        c.	Xampp – For localhost testing.

3.	Project Highlights :

    a.	Live chat messaging 

    b.	Searching without reloading 

    c.	Checking inputs before submitting 

4.	Web link : localhost/petforum/
