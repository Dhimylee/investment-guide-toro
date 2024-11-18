# Blog de Investimento - Toro
Desafio Pessoa Desenvolvedora Front-end WordPress


## Overview
The goal is to create a blog that talks about investments using WordPress. It has a homepage displaying the latest publications and an article page that displays the published content with a side section of "Read also" that lists five other posts in the same category. In addition, in the post editor it should be possible to add a custom block that when rendered displays information about a previously registered investment.

### Prerequisites
-   XAMPP or WAMPP or any other that has PHP and MySQL
-   PHP.
-   MySQL or MariaDB.
-   Access to PHPMyAdmin (database manager).
-   Node.js e NPM
-   Git

## Clone a repository

Follow the steps below to clone the repository.

1. Download the repository in the htdocs folder of XAMPP or WAMPP;
```
git clone https://github.com/Dhimylee/investment-guide-toro.git
```

2. Change the name of the folder created in the clone to 'investment-guide-toro';

3. Enter the folder created by the terminal and check if it is in the main branch;
```
git branch
```

4. Download all changes by giving the command;
```
git pull origin main
```
5. Go to https://drive.google.com/drive/folders/1Wrdx0gB-oTnzjO5bY6RUjiERqbKdjxnU?usp=sharing, the file contains the database and uploads;

6. Inside the wp-content folder extract the downloaded zip from uploads;

7. Configure database:
    -   Open PHPMyAdmin in your browser (usually accessible at `http://localhost/phpmyadmin`);
    -   Create a new database named investment-guide-toro using the collation as `utf8_general_ci`;
    -   After creating the database, go to the import tab and select the file previously downloaded from the link provided and import;
    
8. Access the local environment http://localhost/investment-guide-toro/;

9. To access the admin panel http://localhost/investment-guide-toro/wp-admin

10. Use the credentials user:dev pass:senhasecreta to log in to the admin;

11. Configure the plugin:
    - Enter the 'bloco-investimentos' plugin folder via the terminal and install the dependencies;
    ```
    npm install
    ```
    - To compile the JS run the following command
    ```
    npm run build
    ```
    - In your WordPress dashboard, go to Plugins and activate the "Bloco Investimentos" plugin.

12. Since the database has been imported, the posts will be populated. Access the website and see the homepage;

