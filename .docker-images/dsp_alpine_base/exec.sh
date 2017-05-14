#!/bin/bash
# Author:       giper
# Email:        g.per45@gmail.com
# Date:        	 
# Usage:       exec.sh [--command=command to execute] 
# Description:
# 
#
#


usage() {
echo $1
echo "Usage exec.sh [--command=val] "
exit 1
}

Arguments=( "$@" ) 
# Parse Parameters #
for ARG in "${Arguments[@]}"; do
  case $ARG in
    --command=*)
      COMMAND=${ARG#*=} 
      ;;
    *)
      usage "Unknown Argument $ARG" ;;
  esac
done

if [ $# -ne 1 ]; then
   usage "args must be 1"
fi


# Execute the command
/bin/sh -c "$COMMAND"
