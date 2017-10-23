# Docker container with metasploit.
FROM ubuntu:16.04
RUN echo "deb http://http.kali.org/kali kali-rolling main contrib non-free" >> /etc/apt/sources.list && \
echo "deb-src http://http.kali.org/kali kali-rolling main contrib non-free" >> /etc/apt/sources.list
ENV DEBIAN_FRONTEND noninteractive
RUN apt-key adv --keyserver hkp://keys.gnupg.net --recv-keys 7D8D0BF6
RUN gpg --keyserver pgpkeys.mit.edu --recv-key  ED444FF07D8D0BF6 && \
gpg -a --export ED444FF07D8D0BF6 |  apt-key add -

COPY adduser.sh /adduser.sh
COPY setgw.sh /setgw.sh
COPY addctf.sh /addctf.sh
COPY exec.sh /exec.sh
COPY start_telnet.sh /start_telnet.sh


RUN apt-get update && apt-get install -y libssl-dev net-tools iputils-ping telnet tcpdump nmap  ssh fping dsniff ftp  \
vim gcc make nano build-essential gdb \
bsdmainutils hydra ncrack john sqlmap \
firewalk wpscan tor proxychains php \
git ruby metasploit-framework \
xinetd telnetd

RUN /adduser.sh --name "kali" --password "kali" && usermod -a -G sudo kali
CMD service xinetd start && bash

LABEL \
  type="entry_point" \
  ports="23" \
    caps_add="ALL" \
    privileged=true \
    actions.exec.command="/exec.sh " \ 
    actions.exec.description="Execute a command in the container" \ 
    actions.exec.args.command.val="mkdir hello" \
    actions.exec.args.command.type="text" \
    actions.adduser.command="/adduser.sh" \ 
    actions.adduser.description="Add a new username : <name> <password> " \ 
    actions.adduser.args.name.val="user" \
    actions.adduser.args.name.type="text" \
    actions.adduser.args.name.rule.pattern="^[a-zA-Z0-9_-]+$" \
    actions.adduser.args.password.val="password" \
    actions.adduser.args.password.type="text" \
    actions.adduser.args.password.rule.pattern="^[a-zA-Z0-9_-]+$" \
    actions.addctf.command="/addctf.sh" \ 
    actions.addctf.description="Add a ctf in /home/<username> directory inside a secret file" \ 
    actions.addctf.args.username.val="" \
    actions.addctf.args.username.type="text" \
    actions.addctf.args.username.rule.pattern="^[a-zA-Z0-9_-]+$" \
    actions.addctf.args.ctf.val="" \
    actions.addctf.args.ctf.type="text" \
    actions.start_telnet.command="/start_telnet.sh" \
    actions.start_telnet.description="Start a telnet server" \
    actions.setgw.command="/setgw.sh" \ 
    actions.setgw.description="Set default gateway  <name container gateway> " \ 
    actions.setgw.args.gateway.val="" \
    actions.setgw.args.gateway.type="text" \
    actions.setgw.args.gateway.rule.pattern="^[a-zA-Z0-9_-]+$" \
