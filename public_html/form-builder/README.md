# Form Builder Project

## Overview
The Form Builder project is a web application that allows users to create and manage forms dynamically. Users can define form fields, create database tables to store form definitions, and view submissions.

## Project Structure
```
form-builder
├── app
│   ├── Config
│   │   └── Routes.php
│   ├── Controllers
│   │   └── FormController.php
│   ├── Database
│   │   └── Migrations
│   │       ├── CreateFormBuilderTable.php
│   │       └── CreateFormSubmissionsTable.php
│   ├── Models
│   │   ├── FormModel.php
│   │   └── FormSubmissionModel.php
│   └── Views
│       └── forms
│           ├── builder.php
│           └── submissions.php
├── public
│   └── assets
│       └── js
│           └── form-builder.js
└── README.md
```

## Setup Instructions
1. Clone the repository to your local machine.
2. Navigate to the project directory.
3. Install the necessary dependencies using Composer.
4. Set up your database and update the configuration files as needed.
5. Run the migrations to create the required tables in the database.

## Usage
- Access the application through your web browser.
- Use the form builder interface to create new forms.
- View submitted form data in the submissions section.

## Contributing
Contributions are welcome! Please submit a pull request for any enhancements or bug fixes.

## License
This project is licensed under the MIT License.