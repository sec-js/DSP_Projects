update_image() {
cd $1; docker build -t $2 . 
cd ..
}

update_image dsp_alpine_base dsp/alpine_base
update_image dsp_alpine_router dsp/alpine_router
update_image dsp_shellinabox dsp/shellinabox
update_image dsp_linode_lamp/ dsp/linode_lamp

