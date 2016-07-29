#include <stdio.h>
#include <cs50.h>
int main(void)
{
    int n;
    do
    {
        printf("Height: ");
        n=GetInt();
    }while(n<0 || n>23);
    int i=0,j=2;
    
    for(i=0;i<n;i++)
    {
        for(int k=0;k<=n-j;k++)
            printf(" ");
        for(int l=0;l<j;l++)
            printf("#");
        printf("\n");
            
        j++;
    }
    
}