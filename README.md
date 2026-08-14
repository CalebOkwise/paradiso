# YourLandlady NG / Paradiso Farms

Lightweight landing page and lead capture system built with HTML, CSS, vanilla JavaScript, PHP, and MySQL.

## Contents

- `index.php` - landing page with lead capture form
- `submit-lead.php` - lead submission handler
- `thank-you.php` - conversion confirmation page
- `includes/` - configuration, database connection, helper functions, authentication
- `admin/` - simple admin dashboard for viewing and updating leads
- `assets/` - CSS, JS, and image assets
- `sql/schema.sql` - database schema and initial admin user

## Deployment

1. Create a MySQL database.
2. Update `includes/config.php` with database credentials.
3. Import `sql/schema.sql` into the database.
4. Upload the files to your PHP hosting document root.
5. Replace `YOUR_META_PIXEL_ID` in the page templates with your actual Meta Pixel ID.

## Media

The landing page currently uses styled media slots instead of pretending to show Paradiso assets. Replace those slots with real Paradiso farm photographs, field videos, approved testimonials, and ownership/process proof when available.

## Admin Login

Default credentials in schema:

- Username: `admin`
- Password: `YourLandlady123!`

Change this password immediately after first login.
