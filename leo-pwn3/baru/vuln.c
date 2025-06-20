#include <stdio.h>
#include <unistd.h>

int vuln() {
    char buf[80];
    int r;
    r = read(0, buf, 400);
    printf("\nRead %d bytes. buf is %s\n", r, buf);
    puts("Exploit Me :(");
    return 0;
}

int main(int argc, char *argv[]) {
    // Kirim banner selamat datang
    // Pastikan flush agar langsung ke client
    printf("Selamat datang di exploit ROP metode ret2libc\n");
    fflush(stdout);

    vuln();
    return 0;
}
