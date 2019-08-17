# !/bin/bash

s1=$(/usr/bin/cat /etc/crontab_cpy)
s2=$(/usr/bin/ls -l /etc/crontab)
if [ "$s1" != "$s2" ]
	then
	sudo sendmail root@debian < /etc/init.d/cron_mail.txt
	diff -u /etc/crontab_cpy /etc/crontab >> /etc/contab_diff.diff
	ls -l /etc/crontab > /etc/crontab_cpy
fi
