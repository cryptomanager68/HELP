# Domain Deployment Guide

## Admin Panel Access After Domain Deployment

### Admin URL
Once deployed to your domain, the admin panel will be accessible at:
```
https://www.HomeOwnersEquityLiquidityPlan.com/admin
```

### Admin Login Credentials
- **Email:** julioholden68@gmail.com
- **Password:** julio123
- **Role:** super_admin

---

## Deployment Steps

### 1. Update Environment Variables (.env)
```bash
APP_URL=https://www.HomeOwnersEquityLiquidityPlan.com
APP_ENV=production
APP_DEBUG=false
```

### 2. Update Nginx Configuration
Create/update nginx config for your domain:

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name www.HomeOwnersEquityLiquidityPlan.com HomeOwnersEquityLiquidityPlan.com;
    
    # Redirect to HTTPS
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name www.HomeOwnersEquityLiquidityPlan.com HomeOwnersEquityLiquidityPlan.com;
    
    root /path/to/your/project/public;
    index index.php index.html;
    
    # SSL Certificate (use Let's Encrypt)
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
}
```

### 3. Install SSL Certificate (Let's Encrypt)
```bash
sudo apt install certbot python3-certbot-nginx
sudo certbot --nginx -d www.HomeOwnersEquityLiquidityPlan.com -d HomeOwnersEquityLiquidityPlan.com
```

### 4. Update Stripe Webhook URL
In your Stripe Dashboard, update the webhook endpoint to:
```
https://www.HomeOwnersEquityLiquidityPlan.com/stripe/webhook
```

### 5. Clear All Caches
```bash
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 6. Set Proper Permissions
```bash
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

### 7. Restart Services
```bash
sudo systemctl restart nginx
sudo systemctl restart php8.3-fpm
```

---

## Post-Deployment Verification

### Test Main Site
```
https://www.HomeOwnersEquityLiquidityPlan.com
```

### Test Admin Panel
```
https://www.HomeOwnersEquityLiquidityPlan.com/admin
```

### Test Admin Login
1. Go to: https://www.HomeOwnersEquityLiquidityPlan.com/admin/login
2. Enter credentials:
   - Email: julioholden68@gmail.com
   - Password: julio123
3. Should redirect to admin dashboard

---

## Important Notes

1. **Admin Panel Path:** Always `/admin` - this is configured in `AdminPanelProvider.php`
2. **No Port Numbers:** With proper domain setup, no port numbers needed
3. **HTTPS Required:** Stripe requires HTTPS for production webhooks
4. **Email Configuration:** Update MAIL_* settings in .env for production email sending
5. **Database Backup:** Always backup database before deployment

---

## Troubleshooting

### If admin panel shows 404:
```bash
php artisan route:clear
php artisan config:clear
```

### If admin panel shows 403:
- Check file permissions
- Verify super_admin role exists
- Clear browser cache/use incognito

### If Stripe payments fail:
- Verify webhook URL in Stripe Dashboard
- Check Stripe API keys in .env
- Review Laravel logs: `storage/logs/laravel.log`
