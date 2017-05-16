update_image() {
cd $1; docker build -t $2 . 
cd ..
}

update_image dsp_alpine_base dsp/alpine_base
#update_image dsp_alpine_router dsp/alpine_router
#update_image dsp_shellinabox dsp/shellinabox
#update_image dsp_alpine_ssh_keys_auth/ dsp/alpine_ssh_keys_auth
#update_image dsp_alpine_ssh_password_auth/ dsp/alpine_ssh_password_auth
#update_image dsp_linode_lamp/ dsp/linode_lamp
#update_image dsp_alpine_telnet/ dsp/alpine_telnet
#update_image dsp_alpine_bot/ dsp/alpine_bot
