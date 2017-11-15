# How to setup
- Rename .env.example to .env
- Change DB credentials for your SQL server
- Run `composer install`
- Run `npm install`
- Start your SQL server
- Change email settings in .env to yours, use gmail if you wish. For gmail your port is 587
  You will need to change setting in gmail called `Allow less secure apps` to get this work,sample provided below
  
   - MAIL_DRIVER=smtp
   - MAIL_HOST=smtp.gmail.com
   - MAIL_PORT=587
   - MAIL_USERNAME=you@gmail.com
   - MAIL_PASSWORD=yourpassword
   - MAIL_ENCRYPTION=tls
  
- Finally start server with `php artisan serve`
- Go to 127.0.0.1:8000
 
 # How to compile SCSS
 - After running `npm install` run `npm run dev` after you modified any scss file. 
 - If you wish run `npm run watch` to do the compilation automatically
  