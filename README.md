# infosec
some scripts collected related to infosec

Running a simple HTTP Server via Python:
https://docs.python.org/2/library/simplehttpserver.html
--------------------------------------------------------
# python -m SimpleHTTPServer 8080


Checking open egress ports from victim host:
https://github.com/stufus/egresscheck-framework
--------------------------------------------------------
# git clone https://github.com/stufus/egresscheck-framework.git
# ./ecf.py
egresschecker> set SOURCEIP 10.0.0.1
SOURCEIP => 10.0.0.1

egresschecker> set TARGETIP 192.168.0.1
TARGETIP => 192.168.0.1

egresschecker> set PORTS 1-65535
PORTS => 1-65535 (65535 ports)

egresschecker> set PROTOCOL all
PROTOCOL => ALL

egresschecker> get
+--------------+-----------------------------+
| Option       | Value                       |
+--------------+-----------------------------+
| PROTOCOL     | ALL                         |
| VERBOSITY    | 0                           |
| DELAY        | 0.1                         |
| THREADS      | 25                          |
| TARGETIP     | 192.168.0.1                 |
| SOURCEIP     | 10.0.0.1                    |
| PORTS        | 1-65535                     |
+--------------+-----------------------------+

egresschecker> generate tcpdump

Run the command below on the target machine (probably yours) to save connection attempts:                                                                                                                      
tcpdump -n -U -w /tmp/egress_2015nov26_130154_650H57.pcap 'dst host 192.168.0.1 && src host 10.0.0.1 && (((tcp[tcpflags]&(tcp-syn|tcp-ack))==tcp-syn && tcp)||(udp))'                                          

The commands below will parse the saved capture file and display the ports on which connections were received:                                                                                                 
tshark -r /tmp/egress_2015nov26_130154_650H57.pcap -Tfields -eip.proto -eip.src -etcp.dstport tcp | sort -u #For received TCP                                                                                  
tshark -r /tmp/egress_2015nov26_130154_650H57.pcap -Tfields -eip.proto -eip.src -eudp.dstport udp | sort -u #For received UDP                                                                                  

Also written to: /tmp/capture_2015nov26_130154_OiH0mn.sh

egresschecker> generate python-cmd

Run the command below on the client machine:
python -c 'import base64,sys,zlib;exec(zlib.decompress(base64.b64decode("eJx9U8FO4zAQvfsrLC51RIjSrop2VwxSgXZ3VQoLLXCoKpSmLjUkjhW7ouXr12M7EIS0l2TmZd57M2NHlKqqDdVV/sINESHbazIG+0z4ThgygoJLcgF1Jp84OQchDdmCpySBedbkg9Hjn6vhjKwaYHp9Pn6czm6HgwnRn8CLX7cWC55GlJy8Ab4SXXCuyD2kSff986bm2UrIJzKD9zjJt3XNpZk5gFy2vgTooQVxuS15nRlOXqDXJ89w0P3RS7rH3xPrc0CUzY+O+/1v/QOy4mv6mwkVL/9GPwk19d4+qYQtO4tXEYaJ5mZZ2GGsMks9lFdS8tywQAxgUWnObMx3OVcGdVSmtbMYfrF4dRYaqa9fLRCSK1OxTtKJWy6v/3VZYiUuUaPRuqqpokJSh2ChG1ShzvA9emP3kSPfMJUhbQ/X7CW2sVcQqOA6vmQmq5+4gWVs3xrYcyyiKNEWNdjQFcxYIBkkPTCUo2KNqaayMvQKAWqS50pI5m2v2SZujOcLQu9gxJy5WLO7k42T2MBdq5kL5tF9killt8TmC1s+gLRVozJXMR8smiIR+V4GAGxz1HUKnkR5oblPD6FLaM3NtrYzu/YKpqZYu3PN1aCmiVaFMKwTd9obqlEgHC0t4dz7oWF5mtJMrmh5glfu2BXQXdNWiWUfR0k5iMbgqNNIjBiPAHqe2phQOrE2fJ4uIp/mLu2GtKVJm5FSl1nBSegp9z25eHICeSjHqXK/6kmcH4ZltdvOg0mzuc8WH/AHGqKd2+qtuxoZ2O26k7YhpMgYsx5e7cINnUWnDrxheB/G+GdYInHBP/7yVuw=")))'

Also written to: /tmp/egress_2015nov26_130157_EXxfhI.sh

egresschecker>

