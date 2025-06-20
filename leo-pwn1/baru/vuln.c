#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>

#define BANNER \
  "Welcome to Leo pwn 1, ganti nilai dari locals.changeme untuk mendapat flag"

char *gets(char *);

int main(int argc, char **argv) {
    struct {
        char buffer[64];
        volatile int changeme;
    } locals;
    FILE *fp;
    char flag[128];

    fp = fopen("flag.txt", "r");
    if (!fp) { perror("fopen"); return 1; }
    if (!fgets(flag, sizeof(flag), fp)) { perror("fgets"); fclose(fp); return 1; }
    flag[strcspn(flag, "\n")] = '\0';
    fclose(fp);

    locals.changeme = 0x42424242;

    printf("%s\n", BANNER);
    fflush(stdout);

    gets(locals.buffer);

    if (locals.changeme != 0x42424242) {
        puts("Well done, 'changeme' berhasil diubah, besto friendto!");
        printf("Flag: %s\n", flag);
    } else {
        puts("Uh oh, 'changeme' gk keubah. dasar cupu again");
    }

    return 0;
}
