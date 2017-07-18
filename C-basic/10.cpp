#include<iostream>
using namespace std;

int sum(int a, int b=42){
	int result = a + b;
	return(result);
}

int main(){
	int x=24;
	int y=36;
	
	int result=sum(x,y);
	cout << result << endl;
	
	result = sum(x);
	cout << result << endl;
	return 0;
}
