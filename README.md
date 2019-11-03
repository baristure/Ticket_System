
# TicketSystem
Support Management System

### Background
Today, Many businesses beside having a call center, they have a sort of online customer
support platform which their customers can reach them when needed.

## Authorized People Roles
### 1-User's Page
The standard users should be able to:

- Create a support ticket
- Upload a file if needed.
- See Ticket statuses and add new messages.
- Re-Enter the ticket's page

### 2-Admin's Page
The Employee of the company should be able to:

- View, Update, and Close the tickets
- Respond to the tickets
- Upload files if needed
- Filter the tickets with status (E.g. See tickets with status: Open)
- Search inside the tickets by customer name and subject

## Technologies
-   PHP 7.3.10 
 - Codeigniter(3.1.11)
-   HTML5
-   CSS3
    -   Bootstrap(4.3.1)
-  jQuery(3.3.1)
- Database 
    - SQL

We have two version of this project.

Online version&Repo
This site was built using Heroku. >>> [Here is the live version](https://ticketsupportsystem.herokuapp.com/)

> https://github.com/baristure/Ticket_System
 


Local version repo

>https://github.com/baristure/TicketSystem_Local


## Local Setup
Clone this repository. Start your local server and database.

### Create Database Tables
To store the user’s and ticket's information a table needs to be created in the 'ticket' database. Create a database named 'ticket'. After that open the 'ticket.sql' file ; copy and run commands in SQL command line.

### Config
config.php
In the application/config/config.php file, define the base url.
Set this line for your server's url

> $config['base_url'] = 'http://baristure.sandbox/';

After this step you can run app.


##### This repository is a TicketSystem page made for pre-work phase of İpsizcambaz A.Ş.

 
