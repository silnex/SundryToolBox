#!/bin/bash
#China IP BAN using iptables

apt-get update && apt-get install wget unzip
wget http://geolite.maxmind.com/download/geoip/database/GeoIPCountryCSV.zip
unzip GeoIPCountryCSV.zip

DATA=./GeoIPCountryWhois.csv

for IPRANGE in `egrep "CN" $DATA | cut -d, -f1,2 | sed -e 's/"//g' | sed -e 's/,/-/g'`
do
    echo $IPRANGE
    iptables -A INPUT -p all -m iprange --src-range $IPRANGE -j DROP
done
