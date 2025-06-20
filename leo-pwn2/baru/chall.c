#include <stdio.h>
#include <stdlib.h>
#include <string.h>

void win() {
    char flag[64];
    FILE *file = fopen("flag.txt", "r");
    if (file == NULL) {
        printf("Flag file not found!\n");
        exit(1);
    }
    fgets(flag, sizeof(flag), file);
    fclose(file);
    printf("Congrats! Here is your flag: %s\n", flag);
}

void vuln() {
    char buffer[64];
    printf("Enter your input: ");
    gets(buffer);
    printf("You entered: %s\n", buffer);
}

int main() {
    setbuf(stdout, NULL);
    vuln();
    return 0;
}
