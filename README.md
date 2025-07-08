# Lead Manager

Lead Manager is a lead generation and management platform for property professionals. It provides reliable, fresh leads of property owners, with features for both clients and administrators.

## Features

- **User Registration & Login:** Secure authentication with email verification and password reset.
- **Lead Management:** Purchase zip codes, upload custom data, and receive skip-traced leads.
- **Admin Dashboard:** Manage clients, transactions, and pending tasks.
- **Client Dashboard:** Manage owned zip codes, upload files, and track lead status.
- **Payment Integration:** Secure payments via Stripe.
- **Email Notifications:** Automated emails for registration, password reset, and contact forms.
- **SMS/Telephony Integration:** Twilio SDK for communication features.
- **Responsive UI:** Built with Bootstrap, custom CSS, and modern JavaScript plugins.

## Technology Stack

- **Backend:** PHP 7+ (custom, no major framework)
- **Frontend:** HTML, CSS (Bootstrap, custom), JavaScript (jQuery, AOS)
- **Database:** MySQL
- **Dependencies:**
  - [PHPMailer](https://github.com/PHPMailer/PHPMailer) (email)
  - [Stripe PHP](https://github.com/stripe/stripe-php) (payments)
  - [Twilio PHP SDK](https://github.com/twilio/twilio-php) (SMS/telephony)
- **Other Libraries:** FontAwesome, Google Fonts, AOS, DataTables, Chart.js, etc.

## Installation

1. **Clone the repository:**
   ```bash
   git clone <repo-url>
   cd lead-manager
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Database Setup:**
   - Import `db.sql` into your MySQL server.

4. **Environment Variables Setup:**
   - Create a `.env` file in the project root (see below for template).
   - Add your database, SMTP, and Stripe credentials to the `.env` file.
   - **Example `.env` file:**
     ```env
     # Database configuration
     DB_SERVER=localhost
     DB_NAME=db
     DB_USERNAME=root
     DB_PASSWORD=

     # SMTP configuration
     SMTP_USERNAME=your_smtp_username_here
     SMTP_PASSWORD=your_smtp_password_here

     # Stripe configuration
     STRIPE_PUBLISHABLE_KEY=your_stripe_publishable_key_here
     STRIPE_SECRET_KEY=your_stripe_secret_key_here
     ```
   - **Note:** The `.env` file is already in `.gitignore` and will not be committed to git.

5. **Web Server:**
   - Deploy on Apache/Nginx with PHP 7.1+.
   - Ensure `uploads/` directory is writable.

6. **Environment Variable Loading:**
   - Make sure your PHP environment loads variables from the `.env` file. You can use a library like [`vlucas/phpdotenv`](https://github.com/vlucas/phpdotenv) if needed.

## Security Notes

- **Passwords:** Securely hashed using PHP's `password_hash`.
- **Database:** Uses PDO with prepared statements to prevent SQL injection.
- **Secrets:** All sensitive credentials are stored in the `.env` file and not committed to git.
- **Input Validation:** Some input sanitization is present, but further validation and output escaping is recommended.
- **CSRF Protection:** Not currently implemented; consider adding CSRF tokens to forms.
- **File Uploads:** Ensure only allowed file types are accepted and validate uploads on the server side.

## Quality & Best Practices

- Modular code with includes for templates and assets.
- Uses modern PHP features and libraries.
- Responsive and user-friendly UI.
- Prepared for further enhancements (e.g., CSRF, advanced validation).

## License

This project is proprietary. Contact the author for licensing information.

---

**For questions or support, contact:** devjr.tryus@gmail.com
