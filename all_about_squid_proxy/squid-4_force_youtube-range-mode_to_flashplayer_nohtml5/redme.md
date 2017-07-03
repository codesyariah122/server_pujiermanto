<h2>Install Ecap Adapter</h2>
# install libecap

```bash
wget https://github.com/puji122/server/raw/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/libecap-1.0.1.tar.gz
tar zxvf libecap-1.0.1.tar.gz
cd libecap-*
./configure && make && make install
```
# install ecap_adapter_sample
```bash
wget https://raw.githubusercontent.com/puji122/server/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/ecap_DSI.tar.gz
tar zxvf ecap_DSI.tar.gz
cd ecap_adapter_sample-1.0.0/
./configure && make && make install
cd
echo '/usr/local/lib' >> /etc/ld.so.conf
ldconfig
```

# install squid-4.0.4

```bash
wget http://www.squid-cache.org/Versions/v4/squid-4.0.4.tar.gz
tar xzvf squid-4.0.4.tar.gz
cd squid-4*
./configure '--prefix=/usr' '--bindir=/usr/bin' '--sbindir=/usr/sbin' '--libexecdir=/usr/lib/squid' '--sysconfdir=/etc/squid' '--localstatedir=/var' '--libdir=/usr/lib' '--includedir=/usr/include' '--datadir=/usr/share/squid' '--infodir=/usr/share/info' '--mandir=/usr/share/man' '--disable-dependency-tracking' '--disable-strict-error-checking' '--enable-async-io=24' '--with-aufs-threads=24' '--with-pthreads' '--enable-storeio=aufs,diskd' '--enable-removal-policies=lru,heap' '--with-aio' '--with-dl' '--enable-icmp' '--enable-esi' '--disable-icap-client' '--disable-wccp' '--disable-wccpv2' '--enable-kill-parent-hack' '--enable-cache-digests' '--disable-select' '--enable-http-violations' '--enable-linux-netfilter' '--enable-follow-x-forwarded-for' '--disable-ident-lookups' '--enable-x-accelerator-vary' '--enable-zph-qos' '--with-default-user=proxy' '--with-logdir=/var/log/squid' '--with-pidfile=/var/run/squid.pid' '--with-swapdir=/cache' '--with-openssl' '--with-large-files' '--enable-ltdl-convenience' '--with-filedescriptors=65536' '--with-maxfd=65536' '--enable-storeid-rewrite-helpers' '--enable-snmp' '--enable-referer-log' '--enable-ecap' '--enable-ssl-crtd' '--enable-err-languages=English' '--enable-default-err-language=English' '--build=x86_64' 'build_alias=x86_64' 'PKG_CONFIG_PATH=/usr/local/lib/pkgconfig'
make && make install

cd
chown -R proxy:proxy /cache/
chmod -R 777 /cache/
cd /var/log/squid/
touch access.log
touch cache.log

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

squid -k parse
squid -k reconfigure
reboot
squid -k reconfigure
/etc/init.d/squid restart
```

# documentation 
<img src="https://github.com/puji122/server/blob/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/Untitled.jpg?raw=true"/>

<img src="https://github.com/puji122/server/blob/master/all_about_squid_proxy/squid-4_force_youtube-range-mode_to_flashplayer_nohtml5/Untitled1.jpg?raw=true"/>

# GNET_NETWORK 
<p>Desa.Margahurip Kp.Tarigu Kec.Banjaran Kab. Bandung<br/>
Website : <a href="http://gnet.vacau.com/">GNET NETWORK</a><br/>
contact : <br/>
<li>+62 8122 0562 220 / rangga - owner GNet</li>
<li>+62 8953 4504 1053 / puji - proxy</li>
</p>
