Adeshina's Coffee Shop Website - Technical README

GitHub link : https://github.com/Adebowale0103/SBA_website_Adeshina

Project Overview
This project is a Coffee Shop website designed to showcase a menu, provide a contact form, and collect user feedback through a survey. It includes HTML, CSS, JavaScript, and PHP components for a fully functional web application.

Project Structure
css
Adeshina's-coffee-shop-website/
│
├── index.html
├── menu.html
├── contact.html
├── coffee-survey.html
├── submit-form.php
│
├── css/
│   └── styles.css
│
├── js/
│   └── script.js
│
├── images/
│   └── [image files for the website]
│
└── README.md
Technologies Used
HTML5: Structure and content of the web pages.
CSS3: Styling and layout using external and internal styles.
JavaScript: Adding dynamic behavior and handling form actions.
PHP: Server-side scripting for form submission and email handling.
Google Fonts: Used for typography.
Google Maps API: Embedded map in the contact page.











Set Up a Local Server (for PHP functionality)

Ensure you have a local server environment such as XAMPP, WAMP, or MAMP.
Place the project directory in the htdocs folder (for XAMPP) or the appropriate folder for your server.
Configure Email in submit-form.php

Open submit-form.php and replace your-email@example.com with the email address where you want to receive form submissions.
Run the Local Server

Start your local server and access the website at http://localhost/coffee-shop-website/.
File Descriptions
index.html: Homepage with introduction and basic information.

menu.html: Menu page with items, descriptions, prices, and shopping cart functionality.

contact.html: Contact form for users to get in touch and Google Maps embed.

coffee-survey.html: Survey page for user feedback (not detailed in this README but follows a similar pattern to menu.html).

submit-form.php: Processes form submissions and sends email notifications.

css/styles.css: External stylesheet for overall site styling.

js/script.js: External JavaScript file handling dynamic interactions (e.g., add-to-cart functionality).

JavaScript Functions
Add to Cart: Adds selected menu items to the cart and updates the total price.
Checkout: Displays an alert with the total price and clears the cart.
Form Validation: Ensures required fields in the contact form are filled before submission.
PHP Functionality
Form Processing: Validates form data, sends an email notification, and provides feedback to the user.
Deployment
Web Hosting: For live deployment, upload files to your web hosting service.
Domain Configuration: Point your domain to the hosting server.
Browser Compatibility
The website is designed to be compatible with modern browsers such as Chrome, Firefox, Safari, and Edge.
Accessibility Considerations
Forms are validated with regex patterns for better data integrity.
Basic ARIA attributes and semantic HTML used for better accessibility.
Future Enhancements
Responsive Design: Implement media queries to ensure the site is fully responsive on mobile devices.
SASS/SCSS: Refactor CSS using SASS/SCSS for more maintainable styling.
Advanced Form Handling: Use AJAX for form submission to improve user experience.
Troubleshooting
Form Not Submitting: Ensure your server supports PHP and is configured to send emails.
Cart Functionality Issues: Check browser console for JavaScript errors and verify correct paths to script.js.