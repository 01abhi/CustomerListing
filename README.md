# Customer Data Listing
1. Features: User Registration and Sign in.
2. Creating Customer Data information using a form.
3. Displaying Customer data lists publicly
4. Editing/Deleting the existing customer data.

# Pre-requisites to run this application.
1. PHP 7.2.5 or higher along with these PHP extensions Ctype, iconv, JSON, PCRE, Session, SimpleXML, and Tokenizer should be installed.
2. Composer and MYSQL should be installed.

# Installation of dependencies and starting the server.
1. $ cd clists
2. $ composer install
3. $ php bin/console server:start
   The server address in your browser: localhost:8000

# .env
1. DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name. 
   Change the database configuration for mysql username,password and database name.