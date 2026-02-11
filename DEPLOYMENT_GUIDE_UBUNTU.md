# Laravel Deployment Guide - Ubuntu 24.04 VPS

## Prerequisites
- Ubuntu 24.04 VPS
- Non-root user: `star` with sudo privileges
- Domain name pointed to your VPS IP
- SSH access to your server

---

## Step 1: Initial Server Setup

### 1.1 Connect to Your VPS
```bash
ssh star@your-server-ip
```

### 1.2 Update System
```bash
sudo apt update
sudo apt upgrade -y
```

### 1.3 Install Required Software
```bash
# Install PHP 8.2 and extensions
sudo apt install -y php8.2 php8.2-fpm php8.2-cli php8.2-common php8.2-mysql \
php8.2-zip php8.2-gd php8.2-mbstring php8.2-curl php8.2-xml php8.2-bcmath \
php8.2-intl php8.2-redis php8.2-soap

# Install Nginx
sudo apt install -y nginx

# Install MySQL
sudo apt install -y mysql-server

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer

# Install Git
sudo apt install -y git

# Install Node.js and NPM (for asset compilation)
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs

# Install Certbot for SSL
sudo apt install -y certbot python3-certbot-nginx
```

---

## Step 2: Configure MySQL

### 2.1 Secure MySQL Installation
```bash
sudo mysql_secure_installation
```
- Set root password
- Remove anonymous users: Yes
- Disallow root login remotely: Yes
- Remove test database: Yes
- Reload privilege tables: Yes

### 2.2 Create Database and User
```bash
sudo mysql -u root -p
```

Then run these SQL commands:
```sql
CREATE DATABASE help_platform CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'help_user'@'localhost' IDENTIFIED BY 'your_strong_password_here';
GRANT ALL PRIVILEGES ON help_platform.* TO 'help_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

---

## Step 3: Deploy Laravel Application

### 3.1 Create Project Directory
```bash
cd /home/star
mkdir -p www
cd www
```

### 3.2 Clone or Upload Your Project

**Option A: Using Git (Recommended)**
```bash
git clone https://github.com/your-username/your-repo.git help
cd help
```

**Option B: Upload via SCP (from your local machine)**
```bash
# On your local machine (Windows)
scp -r E:\work\George\help star@your-server-ip:/home/star/www/
```

### 3.3 Set Permissions
```bash
cd /home/star/www/help
sudo chown -R star:www-data .
sudo find . -type f -exec chmod 644 {} \;
sudo find . -type d -exec chmod 755 {} \;
sudo chmod -R 775 storage bootstrap/cache
sudo chgrp -R www-data storage bootstrap/cache
```

### 3.4 Install Dependencies
```bash
# Install PHP dependencies
composer install --optimize-autoloader --no-dev

# Install Node dependencies and build assets
npm install
npm run build
```

### 3.5 Configure Environment
```bash
# Copy environment file
cp .env.example .env

# Edit environment file
nano .env
```

Update these values in `.env`:
```env
APP_NAME="HELP Platform"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=help_platform
DB_USERNAME=help_user
DB_PASSWORD=your_strong_password_here

# Mail Configuration (Gmail)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=julioholden68@gmail.com
MAIL_PASSWORD=fipzzytmuibpevyq
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="julioholden68@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"

# Stripe Configuration
STRIPE_KEY=your_stripe_publishable_key
STRIPE_SECRET=your_stripe_secret_key
STRIPE_WEBHOOK_SECRET=your_webhook_secret
STRIPE_PRICE_ID=your_price_id
CASHIER_CURRENCY=aud
CASHIER_CURRENCY_LOCALE=en_AU
```

### 3.6 Generate Application Key
```bash
php artisan key:generate
```

### 3.7 Run Migrations
```bash
php artisan migrate --force
```

### 3.8 Optimize Application
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
```

---

## Step 4: Configure Nginx

### 4.1 Create Nginx Configuration
```bash
sudo nano /etc/nginx/sites-available/help
```

Paste this configuration:
```nginx
server {
    listen 80;
    listen [::]:80;
    server_name your-domain.com www.your-domain.com;
    root /home/star/www/help/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### 4.2 Enable Site
```bash
sudo ln -s /etc/nginx/sites-available/help /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

---

## Step 5: Configure PHP-FPM

### 5.1 Edit PHP-FPM Pool Configuration
```bash
sudo nano /etc/php/8.2/fpm/pool.d/www.conf
```

Find and update these lines:
```ini
user = www-data
group = www-data
listen.owner = www-data
listen.group = www-data
```

### 5.2 Restart PHP-FPM
```bash
sudo systemctl restart php8.2-fpm
```

---

## Step 6: Setup SSL Certificate (Let's Encrypt)

### 6.1 Obtain SSL Certificate
```bash
sudo certbot --nginx -d your-domain.com -d www.your-domain.com
```

Follow the prompts:
- Enter email address
- Agree to terms
- Choose to redirect HTTP to HTTPS (option 2)

### 6.2 Test Auto-Renewal
```bash
sudo certbot renew --dry-run
```

---

## Step 7: Configure Stripe Webhooks

### 7.1 Set Up Webhook Endpoint

1. Go to: https://dashboard.stripe.com/webhooks
2. Click "Add endpoint"
3. Enter URL: `https://your-domain.com/stripe/webhook`
4. Select events:
   - `customer.subscription.created`
   - `customer.subscription.updated`
   - `customer.subscription.deleted`
   - `invoice.payment_succeeded`
   - `invoice.payment_failed`
5. Copy the webhook signing secret
6. Update `.env`:
   ```bash
   nano /home/star/www/help/.env
   ```
   Add:
   ```env
   STRIPE_WEBHOOK_SECRET=whsec_xxxxxxxxxxxxx
   ```

### 7.2 Clear Config Cache
```bash
cd /home/star/www/help
php artisan config:clear
php artisan config:cache
```

---

## Step 8: Setup Queue Worker (Optional but Recommended)

### 8.1 Create Supervisor Configuration
```bash
sudo nano /etc/supervisor/conf.d/help-worker.conf
```

Paste:
```ini
[program:help-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /home/star/www/help/artisan queue:work --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=star
numprocs=2
redirect_stderr=true
stdout_logfile=/home/star/www/help/storage/logs/worker.log
stopwaitsecs=3600
```

### 8.2 Start Supervisor
```bash
sudo apt install -y supervisor
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start help-worker:*
```

---

## Step 9: Setup Scheduled Tasks (Cron)

### 9.1 Edit Crontab
```bash
crontab -e
```

Add this line:
```cron
* * * * * cd /home/star/www/help && php artisan schedule:run >> /dev/null 2>&1
```

---

## Step 10: Create Admin User

### 10.1 Access Tinker
```bash
cd /home/star/www/help
php artisan tinker
```

### 10.2 Create Admin
```php
$user = new App\Models\User();
$user->name = 'Admin User';
$user->email = 'admin@yourdomain.com';
$user->password = bcrypt('SecurePassword123!');
$user->email_verified_at = now();
$user->save();
exit
```

---

## Step 11: Security Hardening

### 11.1 Configure Firewall
```bash
sudo ufw allow OpenSSH
sudo ufw allow 'Nginx Full'
sudo ufw enable
```

### 11.2 Disable Directory Listing
Already configured in Nginx config above.

### 11.3 Hide PHP Version
```bash
sudo nano /etc/php/8.2/fpm/php.ini
```
Find and set:
```ini
expose_php = Off
```

Restart PHP-FPM:
```bash
sudo systemctl restart php8.2-fpm
```

---

## Step 12: Monitoring and Logs

### 12.1 View Laravel Logs
```bash
tail -f /home/star/www/help/storage/logs/laravel.log
```

### 12.2 View Nginx Logs
```bash
sudo tail -f /var/log/nginx/error.log
sudo tail -f /var/log/nginx/access.log
```

### 12.3 View PHP-FPM Logs
```bash
sudo tail -f /var/log/php8.2-fpm.log
```

---

## Step 13: Backup Strategy

### 13.1 Create Backup Script
```bash
nano /home/star/backup.sh
```

Paste:
```bash
#!/bin/bash
DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/home/star/backups"
mkdir -p $BACKUP_DIR

# Backup database
mysqldump -u help_user -p'your_password' help_platform > $BACKUP_DIR/db_$DATE.sql

# Backup files
tar -czf $BACKUP_DIR/files_$DATE.tar.gz /home/star/www/help

# Keep only last 7 days
find $BACKUP_DIR -type f -mtime +7 -delete

echo "Backup completed: $DATE"
```

Make executable:
```bash
chmod +x /home/star/backup.sh
```

### 13.2 Schedule Daily Backups
```bash
crontab -e
```

Add:
```cron
0 2 * * * /home/star/backup.sh >> /home/star/backup.log 2>&1
```

---

## Step 14: Post-Deployment Checklist

- [ ] Application accessible at https://your-domain.com
- [ ] SSL certificate working (green padlock)
- [ ] Database connection working
- [ ] Admin login working at /admin
- [ ] Payment flow working (test mode)
- [ ] Emails sending successfully
- [ ] Stripe webhooks receiving events
- [ ] Queue workers running
- [ ] Cron jobs scheduled
- [ ] Backups configured
- [ ] Firewall enabled
- [ ] Logs accessible

---

## Troubleshooting

### Issue: 500 Internal Server Error
```bash
# Check Laravel logs
tail -f /home/star/www/help/storage/logs/laravel.log

# Check Nginx logs
sudo tail -f /var/log/nginx/error.log

# Check permissions
sudo chown -R star:www-data /home/star/www/help
sudo chmod -R 775 /home/star/www/help/storage
```

### Issue: Database Connection Failed
```bash
# Test MySQL connection
mysql -u help_user -p help_platform

# Check .env file
cat /home/star/www/help/.env | grep DB_
```

### Issue: Emails Not Sending
```bash
# Test SMTP connection
telnet smtp.gmail.com 587

# Check Laravel logs for email errors
grep -i "mail" /home/star/www/help/storage/logs/laravel.log
```

---

## Updating the Application

### Pull Latest Changes
```bash
cd /home/star/www/help
git pull origin main
composer install --optimize-autoloader --no-dev
npm install && npm run build
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
sudo systemctl restart php8.2-fpm
```

---

## Useful Commands

```bash
# Restart services
sudo systemctl restart nginx
sudo systemctl restart php8.2-fpm
sudo systemctl restart mysql

# Check service status
sudo systemctl status nginx
sudo systemctl status php8.2-fpm
sudo systemctl status mysql

# Clear Laravel cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Rebuild cache
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## Production Environment Variables

Make sure these are set in production `.env`:
```env
APP_ENV=production
APP_DEBUG=false
MAIL_MAILER=smtp (not log)
STRIPE_WEBHOOK_SECRET=whsec_xxxxx (must be set)
```

---

**Your Laravel application is now deployed and ready for production! 🚀**
