#include<iostream>
using namespace std;

int number(int x, int y){
	int sum=x*y;
	cout << "Hasil dari " << x << "x" << y << "=" << sum << endl;
	
	if(sum < 600){
		cout << "Get Integer" << endl;
	}else if(sum > 600){
		cout << "Integer Over clock" << endl;
	}else if(sum == 600){
		cout << "Integer number GET on program" << endl;
	}
}

int main(){
	number(200,3);
	
	return 0; 
}
