> [!CAUTION]
> DO NOT USE THIS IN PRODUCTION (OR WITH YOUR REAL CREDENTIALS)! The risks of storing and communicating credentials in plain-text are catastrophic.

# What?
Often times I am stuck making a site with PHP and a log-in system.
Hopefully this helps more people than just me.

# Why?
By the time I get a basic PHP log-in system and get it up to my standarts, I've usually wasted a significant amount of time.

# How?
In my case, I am using XAMPP, the process is near-identical if you are using phpMyAdmin alone.
1) Link connection.php to your server, make sure the port is correct!
2) Make a database that coresponds to the name you set in the above-mentioned file ($dbname)
3) Inside that database, add a table named 'userdata'
4) Add a table with the following:
 - user_id (Make this AI or auto-incrementing!)
 - user_name
 - user_email
 - user-pass
 - user_bal
 - user_creation (Set this as a date)

# Sources:
 - [Youtube Video](https://www.youtube.com/watch?v=hQPBeS4xlxg) and their [code](https://github.com/Rijushree123/Youtube-V/tree/main/phptut)
 - [Youtube Video 2](https://www.youtube.com/watch?v=rHs0b2MaNpg) and their [code](https://github.com/francis-njenga/login-form-with-database-connection)
 - [Youtube Video 3](https://www.youtube.com/watch?v=WYufSGgaCZ8&t=208s) and their [code](https://drive.google.com/file/d/15ZrwKt7D891-5V3tzNH8XzOTA7cfFQPH/view)

To do:
- Add Password hashing: [Ex](https://www.geeksforgeeks.org/how-to-encrypt-and-decrypt-passwords-using-php/)
