# Test bootstrap file
echo " ___            ___                        ___      _ _";
echo "|   \ _____ __ / __| ___ _ ___ _____ _ _  |_ _|_ _ (_) |_";
echo "| |) / -_) V / \__ \/ -_) '_\ V / -_) '_|  | || ' \| |  _|";
echo "|___/\___|\_/  |___/\___|_|  \_/\___|_|   |___|_||_|_|\__|";
echo " ";

# Update repository
sudo apt-get update

# 1. Install Vim
sudo apt-get install vim -y

# 2. Install Apache
sudo apt-get install apache2 -y

# 3. Install MySQL
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password refdevdb'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password refdevdb'
sudo apt-get install mysql-server -y
# Run these in mysql client on the virtual machine (under 'mysql' db)
# CREATE USER 'root'@'%' IDENTIFIED BY 'refdevdb';
# GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;
#
# CREATE DATABASE refdb;
#
# Comment out this line on /etc/mysql/my.cnf:
# bind-address = 127.0.0.1
# Restart mysql by: sudo service mysql restart


sudo apt-get install libapache2-mod-auth-mysql -y
sudo apt-get install php5-mysql -y

# 4. Install PHP5 (5.5.9)
# Ubuntu 14.04 seems to only support installing PHP 5.5.9 at most. Once the
# server is upgraded to 16.04, we can use PHP7.
#sudo apt-get install php5 -y
sudo apt-get install libapache2-mod-php5 -y

# 5. Install node and npm
curl -sL https://deb.nodesource.com/setup_4.x | sudo -E bash -
sudo apt-get install -y nodejs

# 6. Install Gulp globally
sudo npm install --global gulp

# 7. Install dev dependencies
# Note that running "npm install laravel-elixir" should be enough. The other
# dependencies come straight from Laravel's fresh installation.
cd /var/www/ref-au/ && npm install
