FROM ubuntu:latest

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
      build-essential \
      socat && \
    rm -rf /var/lib/apt/lists/*

RUN useradd -m ctf
USER ctf
WORKDIR /home/ctf

COPY vuln.c flag.txt ./

RUN gcc -fno-stack-protector -z execstack -no-pie -o vuln vuln.c && \
    rm vuln.c && \
    chmod 750 vuln

EXPOSE 1337

CMD ["socat", "TCP-LISTEN:1337,reuseaddr,fork", "EXEC:./vuln,stderr"]
