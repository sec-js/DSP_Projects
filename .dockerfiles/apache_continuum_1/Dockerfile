FROM openjdk:7
RUN apt-get update  && apt-get install -y wget && wget https://www.exploit-db.com/apps/d913ae23ffc66d96a1e9296e5299155b-apache-continuum-1.4.2-bin.tar.gz && tar -zxf d913ae23ffc66d96a1e9296e5299155b-apache-continuum-1.4.2-bin.tar.gz
COPY jd-gui-1.6.6.jar /root
#CMD java -jar start.jar