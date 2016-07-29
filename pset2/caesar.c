#include <stdio.h>
#include <ctype.h>
#include <stdlib.h>
#include <cs50.h>
#include <string.h>
int main(int argc,string argv[])
{
    if(argc==2)
    {
        int k=atoi(argv[1]);
        if(k==0)
        {
            printf("error please enter a valid key");
            return 1;
        }
        string p=GetString();
        int i,u=65,l=97,pi=0,r=0,len;
        len=strlen(p);
        char c[len];
        for(i=0;i<len;i++)
        {
            if(isalpha(p[i]))
            {
                if(isupper(p[i]))
                {
                    pi=(int)(p[i]-'A');
                    r=(pi+k)%26;
                    c[i]=(char)(r+u);
                }
                else
                {
                    pi=(int)(p[i]-'a');
                    r=(pi+k)%26;
                    c[i]=(char)(r+l);
                }
            }
            else
            {
                c[i]=p[i];
            }
        }
        for(i=0;i<len;i++)
        {
            printf("%c",c[i]);
        }
        printf("\n");
        return 0;
    }
    else
    {
    printf("incorrect key");
    return 1;
    }
    
}