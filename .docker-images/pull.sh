pull_image() {
  # If doesn't exists pull
 if [ -z "$(docker images | grep -w "$1")" ]; then
  echo "Pulling $1..."
  docker pull $1
  fi
}
# Built images
pull_image dockersecplayground/alpine:v1.0
pull_image dockersecplayground/alpine_ftp:v1.0
pull_image dockersecplayground/alpine_compiler:v1.0
pull_image dockersecplayground/alpine_networking:v1.0
pull_image dockersecplayground/alpine_bot:v1.0
pull_image dockersecplayground/alpine_router:v1.0
pull_image dockersecplayground/alpine_telnet:v1.0
pull_image dockersecplayground/alpine_test:v1.0
pull_image dockersecplayground/ssh_keys:v1.0
pull_image dockersecplayground/alpine_ssh_password:v1.0
pull_image dockersecplayground/linode_lamp:v1.0
pull_image dockersecplayground/linode_lamp:v2.0
pull_image dockersecplayground/ubuntu32
pull_image dockersecplayground/kali

# Update entrypoint image
# Remote Images NO v1.0 TO LET THE pull_image function to properly work
pull_image vimagick/webgoat:latest
#pull_image bkimminich/juice-shop:v1.0
