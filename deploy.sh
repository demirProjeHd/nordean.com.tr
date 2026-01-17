#!/bin/bash

echo "========================================="
echo "NORDEAN.COM.TR Deployment Script"
echo "========================================="

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Check if running as root
if [[ $EUID -ne 0 ]]; then
   echo -e "${RED}This script must be run as root${NC}" 
   exit 1
fi

echo -e "${GREEN}Step 1: Installing dependencies...${NC}"
apt-get update
apt-get install -y nginx php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml php8.2-zip php8.2-curl php8.2-gd mysql-server composer certbot python3-certbot-nginx

echo -e "${GREEN}Step 2: Creating database...${NC}"
read -p "Enter MySQL root password: " -s MYSQL_ROOT_PASS
echo
mysql -u root -p"$MYSQL_ROOT_PASS" << MYSQLEOF
CREATE DATABASE IF NOT EXISTS nordean CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS 'nordean_user'@'localhost' IDENTIFIED BY 'STRONG_PASSWORD_HERE';
GRANT ALL PRIVILEGES ON nordean.* TO 'nordean_user'@'localhost';
FLUSH PRIVILEGES;
MYSQLEOF

echo -e "${GREEN}Step 3: Importing database...${NC}"
mysql -u root -p"$MYSQL_ROOT_PASS" nordean < database/nordean_production_20260117.sql

echo -e "${GREEN}Step 4: Setting up Laravel...${NC}"
cp .env.production .env
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link

echo -e "${GREEN}Step 5: Setting permissions...${NC}"
chown -R www-data:www-data /var/www/nordean.com.tr
chmod -R 755 /var/www/nordean.com.tr
chmod -R 775 /var/www/nordean.com.tr/storage
chmod -R 775 /var/www/nordean.com.tr/bootstrap/cache

echo -e "${GREEN}Step 6: Configuring Nginx...${NC}"
cp nginx.conf /etc/nginx/sites-available/nordean.com.tr
ln -sf /etc/nginx/sites-available/nordean.com.tr /etc/nginx/sites-enabled/
nginx -t && systemctl restart nginx

echo -e "${GREEN}Step 7: Getting SSL certificate...${NC}"
certbot --nginx -d nordean.com.tr -d www.nordean.com.tr

echo -e "${GREEN}=========================================${NC}"
echo -e "${GREEN}Deployment completed successfully!${NC}"
echo -e "${GREEN}=========================================${NC}"
echo ""
echo -e "${YELLOW}Next steps:${NC}"
echo "1. Update .env file with correct database credentials"
echo "2. Update mail settings in admin panel: /admin/settings"
echo "3. Test the website: https://nordean.com.tr"
echo "4. Admin panel: https://nordean.com.tr/admin"
echo "   Email: info@nordean.com.tr"
echo "   Password: Beril2021#"
