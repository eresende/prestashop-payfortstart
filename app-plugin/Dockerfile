FROM eresende/prestashop-app:configured

RUN curl -SL -o prestashop-payfort-start.zip https://github.com/payfort/prestashop/archive/master.zip \
	&& unzip prestashop-payfort-start.zip -d /usr/src/ \
	&& chown -R www-data:www-data /usr/src/prestashop-master/payfortstart \
	&& mv /usr/src/prestashop-master/payfortstart /var/www/html/modules/ \
	&& rm -fr /usr/src/prestashop-master*
