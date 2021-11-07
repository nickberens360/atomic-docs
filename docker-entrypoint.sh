#!/usr/bin/env bash
set -e
echo "Start of entrypoint"
if [ "$1" = 'apache2-foreground' ]; then
		echo "starting compiler checks"
	if [ "$CSSCOMPILER" = "SASS" ]; then
		echo "Starting SASS compiler."
		nohup sass --watch scss/:css/ > ${logDir}/$(/bin/date +%Y%m%d.%H%M).sass_watch.log 2>&1 &
	fi
fi
echo "End of entrypoint"

exec "$@"
