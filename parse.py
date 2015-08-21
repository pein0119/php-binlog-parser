import struct

def byte2int(b):
    if isinstance(b, int):
        return b
    else:
        return struct.unpack("!B", b)[0]
    
with open('mysql-bin.000004') as f:
    binlog = f.read()


# header = binlog[:19]

print binlog[4:4+19]
