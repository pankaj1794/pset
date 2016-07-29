#include <stdio.h>
#include <cs50.h>
int main(void)
{
    printf("minutes: ");
    int a=GetInt();
    int sum=a*192;
    sum=sum/16;
    printf("\n");
    printf("bottles: %i",sum);
    return 0;    
}