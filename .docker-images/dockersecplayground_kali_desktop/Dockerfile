# Docker container with metasploit.
#

FROM queeno/ubuntu-desktop 
#RUN echo "deb http://http.kali.org/kali kali-rolling main contrib non-free" > /etc/apt/sources.list && \
#echo "deb-src http://http.kali.org/kali kali-rolling main contrib non-free" >> /etc/apt/sources.list
#ENV DEBIAN_FRONTEND noninteractive
RUN apt-get -y update && apt-get clean && apt-get --allow-unauthenticated install -y libssl-dev  \
vim nano \ 
net-tools iputils-ping telnet tcpdump nmap  ssh fping dsniff ftp \ 
gcc make build-essential bsdmainutils hydra john sqlmap \
tor proxychains php 
RUN apt-get install -y git

#firewalk wpscan 


# Attach this container to stdin when running, like this:
# docker run -t -i linux/kali/metasploit
COPY files/addroute.sh  /addroute.sh
COPY files/setgw.sh  /setgw.sh
#COPY XTerm ~/XTerm
COPY .XResources /root/.XResources
# RUN './init.sh'


LABEL ports="5901" \
      type="entry_point" \
      caps_add="ALL" \
      actions.addroute.command="/addroute.sh" \ 
      actions.addroute.description="Add a new route for the subnet : set router ip and subnet " \ 
      actions.addroute.args.subnet.val="192.168.1.0/24" \
      actions.addroute.args.subnet.rule.name="subnet" \
      actions.addroute.args.subnet.type="text" \
      actions.addroute.args.router_ip.val="" \
      actions.addroute.args.router_ip.rule.name="ip" \
      actions.addroute.args.router_ip.type="text"  \

      actions.setgw.command="/setgw.sh" \ 
      actions.setgw.description="Set default gateway  <name container gateway> " \ 
      actions.setgw.args.gateway.val="" \
      actions.setgw.args.gateway.type="text" \
      actions.setgw.args.gateway.rule.pattern="^[a-zA-Z0-9_-]+$" \
