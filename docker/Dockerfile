# the FROM specifies what base image to build from. In this case, we have decided to go with the Alpine image.
# a Linux distribution built around musl libc and BusyBox. The image is only 5 MB in size
# and has access to a package repository that is much more complete than other BusyBox based images
FROM php:7.4.3-fpm-alpine
LABEL maintainer="Jean_Baptiste HUNTZINGER <jbh@huntz.fr>"

#  copies files from the host filesystem into the image when the image is building.
# In this case, we want to copy start.sh, nginx.conf, supervisord.conf, and site.conf, which we will create later,
# to the image’s filesystem.
COPY start.sh /start.sh
COPY nginx.conf /etc/nginx/nginx.conf
COPY supervisord.conf /etc/supervisord.conf
COPY site.conf /etc/nginx/sites-available/default.conf


# In the RUN command, we can see that we are calling the apk command: the Alpine package manager needed to install
# the PHP packages into our image.
# installing bash, which is optional so we can SSH into our container when it is running
# We also install Ngninx and Composer into the image.
# openssh-client and supervisor: Supervisor will help us keep our Nginx running in the background
# and stop the container from exiting.
# We symlink /usr/bin/php7 to /usr/bin/php so we can run php when using PHP in the container.
# Lastly, we created a symlink for the php.ini file.
# We are using the &amp;&amp; to chain commands so they run as part of one image layer in the build process.
RUN apk add --update --no-cache \
bash \
less \
vim \
nginx \
ca-certificates \
openssh-client \
supervisor \
php7 \
php7-fpm \
php7-pdo \
php7-pdo_mysql \
php7-mcrypt \
php7-mbstring \
php7-xml \
php7-openssl \
php7-json \
php7-phar \
php7-zip \
php7-dom \
php7-bcmath \
php7-ctype \
php7-tokenizer \
php7-session \
php7-zlib && \
php7 -r "copy('http://getcomposer.org/installer', 'composer-setup.php');" && \
php7 composer-setup.php --install-dir=/usr/bin --filename=composer && \
php7 -r "unlink('composer-setup.php');" && \
ln -s /etc/php7/php.ini /etc/php7/conf.d/php.ini


# made sure all the directories Nginx expects to exist do, and create them if they don’t
# Create a symlink for the default.conf file so Nginx loads it
# Add a directory to store Supervisors logs and removed any contents in the /var/www directory so we can mount
# our source code as a volume to that directory
# chmod the /start.sh file so we can execute it from the image.
RUN mkdir -p /etc/nginx && \
mkdir -p /etc/nginx/sites-available && \
mkdir -p /etc/nginx/sites-enabled && \
mkdir -p /run/nginx && \
ln -s /etc/nginx/sites-available/default.conf /etc/nginx/sites-enabled/default.conf && \
mkdir -p /var/log/supervisor && \
rm -Rf /var/www/* && \
chmod 755 /start.sh


# Configure the PHP configuration files for our Docker image (sed is a stream editor command)
# the following code replace some options in the config files
RUN sed -i -e "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g" \
-e "s/variables_order = \"GPCS\"/variables_order = \"EGPCS\"/g" \
/etc/php7/php.ini && \
sed -i -e "s/;daemonize\s*=\s*yes/daemonize = no/g" \
-e "s/;catch_workers_output\s*=\s*yes/catch_workers_output = yes/g" \
-e "s/user = nobody/user = nginx/g" \
-e "s/group = nobody/group = nginx/g" \
-e "s/;listen.mode = 0660/listen.mode = 0666/g" \
-e "s/;listen.owner = nobody/listen.owner = nginx/g" \
-e "s/;listen.group = nobody/listen.group = nginx/g" \
-e "s/listen = 127.0.0.1:9000/listen = \/var\/run\/php-fpm.sock/g" \
-e "s/^;clear_env = no$/clear_env = no/" \
/etc/php7/php-fpm.d/www.conf


# The EXPOSE command informs Docker that the container listens on the specified network ports at runtime.
# The WORKDIR command sets the working directory for our commands going forth.
# It’ll also create the /var/www directory.
EXPOSE 443 80
WORKDIR /var/www

# Whenever we build our image successfully, the file start.sh will be executed.
#In this file, we will specify some additional commands that we don’t want as a part of the Docker build process.
CMD ["/start.sh"]