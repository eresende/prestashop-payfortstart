FROM prestashop/prestashop:1.6

MAINTAINER Eusebio Resende <eresende2k@gmail.com>

RUN apt-get update && apt-get -y install git
RUN curl -SL -o prestashop-payfort-start.zip https://github.com/payfort/prestashop/archive/master.zip \
	&& unzip prestashop-payfort-start.zip -d /usr/src/

COPY config_files/docker_run.sh /tmp/

CMD ["/tmp/docker_run.sh"]

