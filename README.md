# BC Skills

##About BC Skills: An Open Source Boston College Platform
<p>BC Skills is an open source platform built by Boston College students for Boston College students.
This project has two main goals: to help connect technical and entrepreneurial students to build new start ups, and teach 
students how to collaborate through open source applications.</p>

##Installation

###Forking This Repository
Fork this repository by using the following Git command:

<pre>
git clone git@github.com:pcas00/bc_css_sandbox.git
</pre>

If you want a quick tutorial on how to fork, <a href="http://help.github.com/fork-a-repo/" target="_blank">click here</a>.

If you need help getting started with GitHub, <a href="http://learn.github.com/p/intro.html" target="_blank">click here to learn more</a>.

Setting up on mac? <a href="http://help.github.com/mac-set-up-git/" target="_blank">check out this guide</a>

###Importing Test Database Data
This applicaton uses a PostgreSQL backend. To import dummy data, after forking this repository, import the database.sql file located
in the root directory of this application.

For one-click PostgreSQL installation, <a href="http://www.enterprisedb.com/products-services-training/pgdownload" target="_blank">click here to visit a PostgreSQL download web site</a>.

###Installing Database With CodeIgniter
Once you have forked the PHP application and installed your PostgreSQL database with dummy data, you will need to connect it to the application!
This can be done by navigating to the Application folder, then opening the Config folder, and then opening the Database.php file.

You will only be concerned with editing the following lines of code:

<pre>
$db['default']['hostname'] = 'hostnamehere';	//Usually localhost
$db['default']['username'] = 'usernamehere';	//May be postgres
$db['default']['password'] = 'yourpasswordhere';	//Whatever password you chose to setup the database
$db['default']['database'] = 'yourdatabasenamehere';	//Name of the database. We used css for "computer science society"!
</pre>

Important: you must comment out this line (number 53)

<pre>
//extract(parse_url($_ENV["DATABASE_URL"]));
</pre>

Note: If you encounter a database error at any point (error description: "Unable to connect to your database server using the provided settings."), try making the following change to database.php:

<pre>
$db['default']['db_debug'] = FALSE;
</pre>


Save this file, and open it on your local server

###Installing a Local Server
If you are running a Mac, you can easiy setup a PHP Apache environment by <a href="http://www.coolestguyplanet.net/how-to-install-php-mysql-apache-on-os-x-10-6/" target="_blank">clicking here and checking out this tutorial</a>.

If you are running Windows, an easy way to install a local server is by using WAMP. <a href="http://www.wampserver.com/en/" target="_blank">Click here to view installation instructions and get started quickly.</a>

## Making Pull Requests
Please make an effort to enhance the functionality of this application! We encourage everyone, of any skill level, to try and extend features, fix bugs, or enhance documentation. If you know how to do something better, share it!

Make sure you do not commit your project settings, local files that do not belong in the repository, or configuration settings. These pull requests will have to be rejected.

##Getting Help
If you need help getting started, do not hesitate to contact Peter Casinelli at <a href="mailto:peter.casinelli@bc.edu" target="_blank">peter.casinelli@bc.edu</a> .
If you have questions regarding how Codeigniter or PostgreSQL works, or particular functionality, please refer to the documentation help below!

##Documentation

This PHP application is being built using an open source PHP framework called <a href="http://www.codeigniter.com" target="blank">Codeigniter</a>.
If you have general questions about code being used, you can always refer to <a href="http://codeigniter.com/user_guide/" target="_blank">Codeigniter's documentation here</a>.

For documentation regarding PostgreSQL databases, <a href="http://www.postgresql.org/docs/" target="_blank">click here visit the documentation web page</a>.
