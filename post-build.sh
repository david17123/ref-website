# These commands (and actions) are meant to be executed after the virtual server
# is up and running (hence the name post build).

# 1. Set up apache2 to REF dev website
# Check https://getcomposer.org/download/ to get the latest hash value
sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/ref-au.conf
sudo a2dissite 000-default
sudo a2ensite ref-au
# Change DocumentRoot to /var/www/ref-au
sudo service apache2 restart

# 2. Install composer
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '070854512ef404f16bac87071a6db9fd9721da1684cd4589b1196c3faf71b9a2682e2311b36a5079825e155ac7ce150d') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

mv composer.phar /usr/local/bin/composer

# 3. Install Laravel installer
composer global require "laravel/installer"
PATH=$PATH:~/.config/composer/vendor/bin/

