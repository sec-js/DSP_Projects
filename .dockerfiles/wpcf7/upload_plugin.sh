#!/bin/bash     
function assertNoSpaces {
    if [[ "$1" != "${1/ /}" ]]
    then
	usage 'Parameter cannot have spaces';
    fi
}



optspec=":-:"
while getopts "$optspec" optchar; do
  case "${optchar}" in
  -)
    case "${OPTARG}" in
    url)
    URL="${!OPTIND}"; OPTIND=$(( $OPTIND + 1 ))
    [[ ! -z "${URL// }" ]] && URL_BOOL=true || usage 'Empty Name'
    ;;
    esac;;
  *)
    usage
    ;;
  esac
done

assertNoSpaces "$URL"

if [ $URL_BOOL != true ] ; then
	usage 'no url';
fi
PLUGIN_NAME=`basename $URL`
echo $PLUGIN_NAME
echo $URL  

curl $URL  -o /tmp/${PLUGIN_NAME}  && unzip /tmp/${PLUGIN_NAME} -d /var/www/html/wp-content/plugins 