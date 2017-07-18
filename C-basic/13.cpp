#include<iostream>
using namespace std;

void printNumber(int x){
	cout << "Prints an integer:" << x << endl;
}
void printNumber(float x){
	cout << "Prints a float : " << x << endl;
}
int main(){
	int a = 16;
	float b = 54.541;
	printNumber(a);
	printNumber(b);
}
