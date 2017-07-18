#include <iostream> 
#include <conio.h> 
#include <math.h> 
#include <string.h> 
#include <stdio.h> 
#include <stdlib.h> 

void main() {
char teks[30]; 
char angka_s[10]; 
float angka_f; 
int angka_i;
strcpy(teks, "Hello World"); 
strcpy(angka_s,"78.56"); 

angka_f = atof(angka_s) + 80;
angka_i = atoi(angka_s) + 12;
cout << "angka_f sekarang : " << angka_f; 
cout << "\nangka_i sekarang : " << angka_i; 

cout << "\nhuruf kecil : " << strlwr(teks); 
cout << "\nhuruf kapital : " << strupr(teks);

 getch(); 
