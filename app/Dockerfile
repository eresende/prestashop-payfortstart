FROM payfortstart/lamp

RUN apt-get update && apt-get install unzip

RUN curl -o prestashop_1.6.1.10.zip -SL https://download.prestashop.com/download/old/prestashop_1.6.1.10.zip \
	&& unzip prestashop_1.6.1.10.zip -d /usr/src/ \
	&& rm prestashop_1.6.1.10.zip \
	&& chown -R www-data:www-data /usr/src/prestashop

RUN tar cf - --one-file-system -C /usr/src/prestashop . | tar xf -
