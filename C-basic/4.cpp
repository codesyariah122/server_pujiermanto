#include<stdio.h>
int main(){
	int mark;
	char pass;
	scanf("%d",&mark);
	if(mark > 40){
		pass = 'y';
		printf("You Passed");
	}
	else {
		pass = 'n';
		printf("you failed");
	}
	return 0;
}
