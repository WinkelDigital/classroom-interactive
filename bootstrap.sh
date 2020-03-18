LC_ALL=C.UTF-8 sudo add-apt-repository -y ppa:ondrej/php && sudo apt-get update && sudo apt install -y php7.2 php7.2-common php7.2-cli php7.2-fpm
apt-get install -y apache2 

# Setup hosts file
VHOST=$(cat <<EOF
<VirtualHost *:80>
  DocumentRoot "/vagrant/public"
  ServerName localhost
  <Directory "/vagrant/public">
    AllowOverride All
  </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-enabled/000-default

apt-get install -y libapache2-mod-php7.2 php7.2-mcrypt php7.2-curl php7.2-dom 

apt-get install -y composer --fix-missing

apt-get install -y php7.2-mbstring

a2enconf php7.2
a2enmod php7.2
a2enmod rewrite


echo mysql-server mysql-server/root_password password letmein | debconf-set-selections
echo mysql-server mysql-server/root_password_again password letmein | debconf-set-selections
apt-get install -y mysql-server php7.2-mysql
cd /vagrant && composer install && php artisan migrate && php artisan db:seed
systemctl restart apache2
if ! [ -L /var/www ]; then
  rm -rf /var/www
  ln -fs /vagrant /var/www
fi