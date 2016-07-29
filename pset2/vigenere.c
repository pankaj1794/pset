#include <stdio.h>
#include <ctype.h>
#include <stdlib.h>
#include <cs50.h>
#include <string.h>
int getshift(char c);
int main(int argc,string argv[])
{
    if(argc==2)
    {   
        int flag=0,i1=0,len2=strlen(argv[1]);
        int k[strlen(argv[1])];
        for(i1=0;i1<len2;i1++)
        {
        if(!isalpha(argv[1][i1]))
        {
            flag=1;
            break;
        }
        }
        if(flag==1)
        {
            printf("incorrect key");
            return 1;
        }
        string p=GetString();
        int i,u=65,l=97,pi=0,r=0,len=0,len1=0,j=0;
        for(i=0,len1=strlen(argv[1]);i<len1;i++)
        {
            k[i]=getshift(argv[1][i]);
        }
        len=strlen(p);
        len1=strlen(argv[1]);
        char c[len];
        for(i=0;i<len;i++)
        {
            if(isalpha(p[i]))
            {
                if(isupper(p[i]))
                {
                    pi=(int)(p[i]-'A');
                    r=(pi+k[j%len1])%26;
                    c[i]=(char)(r+u);
                    j++;
                }
                else
                {
                    pi=(int)(p[i]-'a');
                    r=(pi+k[j%len1])%26;
                    c[i]=(char)(r+l);
                    j++;
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
int getshift(char c)
{
    if(isupper(c))
    {
        return ((int)(c-'A'))%26;
    }
    else
    {
        return ((int)(c-'a'))%26;
    }
}
