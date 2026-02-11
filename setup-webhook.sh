#!/bin/bash
# Script to update webhook secret and restart services

echo "Clearing Laravel cache..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear

echo "Done! Your webhook is now configured."
echo "Test by making a payment and checking if subscription activates."
