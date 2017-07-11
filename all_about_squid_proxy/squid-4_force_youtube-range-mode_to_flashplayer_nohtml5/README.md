<h2>Install Ecap Adapter</h2>
# install libecap

```bash
wget https://github.com/puji122/server/raw/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/libecap-1.0.1.tar.gz
tar xvf libecap-1.0.1.tar.gz
cd libecap-1.0.1
./configure && make && make install
echo '/usr/local/lib' >> /etc/ld.so.conf
ldconfig
cd ..
```
# install ecap_adapter_sample
```bash
wget https://raw.githubusercontent.com/puji122/server/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/ecap_DSI.tar.gz
tar zxvf ecap_DSI.tar.gz
cd ecap_adapter_sample-1.0.0/
cd src/
curl -o adapter_async.cc https://raw.githubusercontent.com/puji122/server/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/adapter_async.cc
curl -o adapter_modifying.cc https://raw.githubusercontent.com/puji122/server/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/adapter_modifying.cc
cd ..
./configure && make && make install
cd ..
```

# install squid-4.0.4

```bash
wget http://www.squid-cache.org/Versions/v4/squid-4.0.4.tar.gz
tar xzvf squid-4.0.4.tar.gz
cd squid-4*
./configure '--prefix=/usr' '--bindir=/usr/bin' '--sbindir=/usr/sbin' '--libexecdir=/usr/lib/squid' '--sysconfdir=/etc/squid' '--localstatedir=/var' '--libdir=/usr/lib' '--includedir=/usr/include' '--datadir=/usr/share/squid' '--infodir=/usr/share/info' '--mandir=/usr/share/man' '--disable-dependency-tracking' '--disable-strict-error-checking' '--enable-async-io=24' '--with-aufs-threads=24' '--with-pthreads' '--enable-storeio=aufs,diskd' '--enable-removal-policies=lru,heap' '--with-aio' '--with-dl' '--enable-icmp' '--enable-esi' '--disable-wccp' '--disable-wccpv2' '--enable-kill-parent-hack' '--enable-cache-digests' '--disable-select' '--enable-http-violations' '--enable-linux-netfilter' '--enable-follow-x-forwarded-for' '--disable-ident-lookups' '--enable-x-accelerator-vary' '--enable-zph-qos' '--with-default-user=proxy' '--with-logdir=/var/log/squid' '--with-pidfile=/var/run/squid.pid' '--with-swapdir=/cache' '--with-openssl' '--with-large-files' '--enable-ltdl-convenience' '--with-filedescriptors=65536' '--with-maxfd=65536' '--enable-storeid-rewrite-helpers' '--enable-snmp' '--enable-referer-log' '--enable-ecap' '--enable-ssl-crtd' '--enable-err-languages=English' '--enable-default-err-language=English' '--build=x86_64' 'build_alias=x86_64' 'PKG_CONFIG_PATH=/usr/local/lib/pkgconfig'
make && make install

cd
chown -R proxy:proxy /cache/
chmod -R 777 /cache/
cd /var/log/squid/
touch access.log
touch cache.log

# create certificates
cd /etc/squid
mkdir -p /etc/squid/ssl_cert
openssl req -new -newkey rsa:2048 -sha256 -days 3652 -nodes -x509 -keyout /etc/squid/ssl_cert/proxy.pem -out /etc/squid/ssl_cert/proxy.pem -subj "/C=ID/ST=West Java/L=Bandung/O=TSI/CN=gnet.net.id"
openssl x509 -in /etc/squid/ssl_cert/proxy.pem -outform DER -out /etc/squid/ssl_cert/proxy.der
openssl x509 -in /etc/squid/ssl_cert/proxy.pem -outform DER -out /etc/squid/ssl_cert/proxy.crt
cd -
curl -o ad_block.txt https://raw.githubusercontent.com/puji122/server/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/ad_block.txt
curl -o ip_bypas.txt https://raw.githubusercontent.com/puji122/server/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/ip_bypas.txt
curl -o nossl.txt https://raw.githubusercontent.com/puji122/server/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/nossl.txt
curl -o splice.txt https://raw.githubusercontent.com/puji122/server/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/splice.txt
curl -o bypass_regex.txt https://raw.githubusercontent.com/puji122/server/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/bypass_regex.txt
curl -o squid.conf https://raw.githubusercontent.com/puji122/server/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/squid.conf
curl -o store-id.pl https://raw.githubusercontent.com/puji122/server/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/store-id.pl
curl -o refresh.conf https://raw.githubusercontent.com/puji122/server/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/refresh.conf
cd /etc/
curl -o sysctl.conf https://raw.githubusercontent.com/puji122/server/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/sysctl.conf
cd security/
curl -o limits.conf https://raw.githubusercontent.com/puji122/server/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/limits.conf
cd -
curl -o modules https://raw.githubusercontent.com/puji122/server/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/modules
curl -o rc.local https://raw.githubusercontent.com/puji122/server/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/rc.local
cd
chown -R proxy:proxy /var/log/squid/
chmod -R 777 /var/log/squid/
cd /usr/local/lib && rm -rf ecap_adapter*
wget https://github.com/puji122/server/raw/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/adapter.tar.gz
tar zxvf adapter.tar.gz && cd
ldconfig
chown -R proxy:proxy /etc/squid/
chmod -R 777 /etc/squid/
mkdir /var/lib/squid
/usr/lib/squid/ssl_crtd -c -s /var/lib/squid/ssl_db
chown -R nobody /var/lib/squid/ssl_db
squid -k parse
squid -k reconfigure
reboot
squid -k reconfigure
/etc/init.d/squid restart
```

# documentation 
<img src="https://github.com/puji122/server/blob/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/Untitled.jpg?raw=true"/>

<img src="https://github.com/puji122/server/blob/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/Untitled1.jpg?raw=true"/>

<img src="https://github.com/puji122/server/blob/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/Untitled3.jpg?raw=true"/>

<img src="https://github.com/puji122/server/blob/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/Untitled4.jpg?raw=true"/>
# GNET_NETWORK 
<p>Desa.Margahurip Kp.Tarigu Kec.Banjaran Kab. Bandung<br/>
Website : <a href="http://gnet.vacau.com/">GNET NETWORK</a><br/>
contact : <br/>
<li>+62 8122 0562 220 / rangga - owner GNet</li>
<li>+62 8953 4504 1053 / puji - proxy</li>
</p>
