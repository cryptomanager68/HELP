# Deployment Checklist for www.HomeOwnersEquityLiquidityPlan.com

## Pre-Deployment Changes

### 1. Update .env File
Change this line:
```bash
# FROM:
APP_URL=http://173.212.221.61:8080

# TO:
APP_URL=https://www.HomeOwnersEquityLiquidityPlan.com
```

### 2. DNS Configuration
Point your domain to your VPS IP:
```
A Record: www.HomeOwnersEquityLiquidityPlan.com → 173.212.221.61
A Record: HomeOwnersEquityLiquidityPlan.com → 173.212.221.61
```

### 3. Install SSL Certificate
```bash
sudo certbot --nginx -d www.HomeOwnersEquityLiquidityPlan.com -d HomeOwnersEquityLiquidityPlan.com
```

### 4. Update Nginx Configuration
Create: `/etc/nginx/sites-available/homeowners-equity`
```nginx
server {
    listen 80;
    server_name www.HomeOwnersEquityLiquidityPlan.com HomeOwnersEquityLiquidityPlan.com;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    server_name www.HomeOwnersEquityLiquidityPlan.com HomeOwnersEquityLiquidityPlan.com;
    
    root /home/star/www/HELP/public;
    index index.php index.html;
    
    ssl_certificate /etc/letsencrypt/live/www.HomeOwnersEquityLiquidityPlan.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/www.HomeOwnersEquityLiquidityPlan.com/privkey.pem;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
    
    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Enable the site:
```bash
sudo ln -s /etc/nginx/sites-available/homeowners-equity /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx
```

### 5. Update Stripe Webhook
In Stripe Dashboard (https://dashboard.stripe.com/webhooks):
- Update webhook endpoint to: `https://www.HomeOwnersEquityLiquidityPlan.com/stripe/webhook`
- Events to listen for:
  - checkout.session.completed
  - customer.subscription.created
  - customer.subscription.updated
  - customer.subscription.deleted

### 6. Clear Caches
```bash
cd /home/star/www/HELP
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 7. Restart Services
```bash
sudo systemctl restart nginx
sudo systemctl restart php8.3-fpm
```

---

## Post-Deployment Testing

### ✅ Test Checklist

1. **Main Site**
   - [ ] Visit: https://www.HomeOwnersEquityLiquidityPlan.com
   - [ ] Homepage loads correctly
   - [ ] No SSL warnings

2. **Admin Panel**
   - [ ] Visit: https://www.HomeOwnersEquityLiquidityPlan.com/admin
   - [ ] Login page appears
   - [ ] Login with: julioholden68@gmail.com / julio123
   - [ ] Dashboard loads successfully
   - [ ] Can view users, messages, expressions of interest

3. **User Registration Flow**
   - [ ] Click "Subscribe" on homepage
   - [ ] Enter test email and name
   - [ ] Stripe checkout opens
   - [ ] Complete test payment
   - [ ] Redirects to LVR form
   - [ ] Submit LVR data
   - [ ] Receives password reset email
   - [ ] Can set password and login

4. **Database Check**
   - [ ] New users appear in admin panel
   - [ ] Subscriptions are recorded
   - [ ] LVR data is saved

---

## Admin Panel Access Summary

**URL:** https://www.HomeOwnersEquityLiquidityPlan.com/admin

**Login Credentials:**
- Email: julioholden68@gmail.com
- Password: julio123

**Features:**
- View all registered users
- View customer messages
- View expressions of interest
- Manage subscriptions
- View financial statements

---

## Rollback Plan (If Issues Occur)

If something goes wrong, you can quickly rollback:

```bash
# Restore old nginx config
sudo rm /etc/nginx/sites-enabled/homeowners-equity
sudo systemctl reload nginx

# Restore old .env
cd /home/star/www/HELP
# Edit .env and change APP_URL back to http://173.212.221.61:8080

# Clear caches
php artisan config:clear
php artisan route:clear
```

---

## Support & Monitoring

### Check Logs
```bash
# Laravel logs
tail -f /home/star/www/HELP/storage/logs/laravel.log

# Nginx error logs
sudo tail -f /var/log/nginx/error.log

# PHP-FPM logs
sudo tail -f /var/log/php8.3-fpm.log
```

### Common Issues

**Issue:** Admin panel shows 404
**Solution:** 
```bash
php artisan route:clear
php artisan config:clear
```

**Issue:** SSL certificate error
**Solution:**
```bash
sudo certbot renew --dry-run
```

**Issue:** Stripe webhook fails
**Solution:** Check webhook URL in Stripe Dashboard matches your domain
