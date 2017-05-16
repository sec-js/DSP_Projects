FROM daindragon2/alpine:latest

COPY adduser.sh /adduser.sh
COPY setgw.sh /setgw.sh
COPY addctf.sh /addctf.sh
COPY test_check.sh /test_check.sh
COPY exec.sh /exec.sh
CMD /bin/sh

LABEL \
        caps_add="NET_ADMIN" \
