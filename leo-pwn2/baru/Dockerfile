FROM ubuntu:latest
RUN apt update && apt install -y gcc socat

# Tambahkan user tanpa hak istimewa untuk keamanan
RUN useradd -m ctf

# Salin source code dan flag
WORKDIR /home/ctf
COPY chall.c .
COPY flag.txt .

# Kompilasi binary tanpa PIE
RUN gcc -fno-stack-protector -z execstack -no-pie -o chall chall.c && \
    chmod +x chall && \
    chown -R ctf:ctf /home/ctf

# Jalankan server menggunakan socat
CMD su -c "socat TCP-LISTEN:1338,reuseaddr,fork EXEC:'./chall',stderr" ctf
