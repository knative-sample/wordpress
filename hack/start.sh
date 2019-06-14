#!/bin/bash
#****************************************************************#
# Create Date: 2019-05-29 14:36
#********************************* ******************************#

waitterm() {
    local PID
	# any process to block
	tail -f /dev/null &
	PID="$!"
	# setup trap, could do nothing, or just kill the blocker
	trap 'exit ' SIGNHUP SIGINT SIGQUIT SIGTERM

	# wait blocker, ignore blocker exit code
	wait "${PID}" 2>/dev/null || true
}

mkdir -p /run/nginx
mkdir -p /var/log/nginx
chown -R www-data:www-data /var/www/html &
nginx &
php-fpm &

waitterm
