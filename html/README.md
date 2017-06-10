# write syslog line by line to any text file
cat /var/log/syslog | awk '{print $3, $4, $5, $6}' >> /var/www/html/sys.txt
