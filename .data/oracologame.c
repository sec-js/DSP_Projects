#include <stdio.h>
#include <stdlib.h>
#include <string.h>


char* frasi[]=  {
"Incontrerai una persona speciale",
"Oggi va male...",
"Tornerai a casa con pippozzo" ,
"Oggi sarai felice" 

};

void oracolo(char *nome)
{
	int i= 0;  
	char buffer[100]; 
	strcpy(buffer,nome); 
	printf("Ciao %s!\n",buffer);
	i = buffer[0]; 
	printf("%s\n",frasi[i%4]);
}

int main(int argc, char *argv[])
{
//	printf("Get env : %p\n",getenv("SHELLCODE"));
	if(argc != 2)
	{
		printf("Uso : %s <nome> \n",argv[0]); 
		exit(-1); 
	}
	oracolo(argv[1]); 

}
