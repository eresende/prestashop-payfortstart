FROM php:5.6

RUN apt-get update \
	&& apt-get -y install curl php5-cli git zip wget build-essential chrpath libssl-dev libxft-dev

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN wget -O /usr/local/share/phantomjs-2.1.1-linux-x86_64.tar.bz2 https://bitbucket.org/ariya/phantomjs/downloads/phantomjs-2.1.1-linux-x86_64.tar.bz2

RUN tar xvjf /usr/local/share/phantomjs-2.1.1-linux-x86_64.tar.bz2 -C /usr/local/share

RUN ln -sf /usr/local/share/phantomjs-2.1.1-linux-x86_64/bin/phantomjs /usr/local/bin/phantomjs

RUN mkdir /tests

ADD payfort.php /tests
ADD composer.json /tests 

WORKDIR /tests

RUN composer install

CMD /usr/local/bin/phantomjs --webdriver=4444

