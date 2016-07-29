#include <stdio.h>
#include <cs50.h>
#include <math.h>
int main(void)
{
    printf("O hai! ");
    float ow;
    do
    {
        printf("How much change is owed?\n");
        ow=GetFloat();
    }while(ow<0.0);
    
    ow=ow*100.0;
    int n=(int) round(ow);
    int qua=0,dim=0,nic=0,peny=0;
    int sum=0;
    if(n==0)
    {
        printf("0");
    }
    else
    {
        if(n>=25)
        {
            qua=n/25;
            n=n%25;
        }
        if(n>=10)
        {
            dim=n/10;
            n=n%10;
        }
        if(n>=5)
        {
            nic=n/5;
            n=n%5;
        }
        if(n>=1)
        {
            peny=n/1;
            
        }
        sum=qua+peny+nic+dim;
        printf("%i\n",sum);
    }
    
    
    return 0;
}