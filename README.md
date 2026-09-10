# BonCard CRUD

 
## Features
 
- User authentication (Laravel Breeze)
- Full CRUD for gift cards: create, list, edit, delete
- Fields: card number, PIN, activation date, expiration date, balance
- Server-side validation on create/edit
- Paginated card list (10 per page)
## Tech stack
 
- **Backend:** Laravel
- **Frontend:** Vue 3 + Inertia.js
- **Database:** SQLite
### Why SQLite instead of MySQL?
 
SQLite was chosen for this task to keep local setup as simple as possible - it requires no separate database server or service, just a single file. Since this is a small recruitment project meant to be cloned and run quickly by a reviewer, avoiding an extra installation/configuration step (setting up MySQL, creating a database, managing credentials) removes friction without any real trade-off for a project of this size. Laravel supports both out of the box, so switching to MySQL later would only require updating the `.env` database connection settings.
 
## Getting started
 
### Requirements
 
- PHP 8.2+
- Composer
- Node.js + npm
### Setup
 
1. Clone the repository
```bash
   git clone https://github.com/wkoltonowska/boncard-crud.git
   cd boncard-crud
```
 
2. Install PHP dependencies
```bash
   composer install
```
 
3. Install JS dependencies
```bash
   npm install
```
 
4. Copy the environment file and generate an app key
```bash
   cp .env.example .env
   php artisan key:generate
```
 
5. Create the SQLite database file
```bash
   touch database/database.sqlite
```
   (On Windows, you can just create an empty `database.sqlite` file inside the `database` folder manually.)
 
   Make sure your `.env` has:
```
   DB_CONNECTION=sqlite
```
 
6. Run migrations
```bash
   php artisan migrate
```
 
7. Start the dev servers (in two terminals)
```bash
   php artisan serve
   npm run dev
```
 
8. Open the app in your browser (by default `http://127.0.0.1:8000`), register an account, and log in to manage cards.
