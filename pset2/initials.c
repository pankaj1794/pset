#include <stdio.h>
#include <string.h>
#include <cs50.h>
bool isLower(char c);
char uppercase(char c);
int main(void)
{
    string s=GetString();
    
    int i,len=strlen(s),count=1;
    
    for(i=0;i<len;i++)
    {
        if(s[i]==' ')
            count++;
    }
    char ini[count];
    ini[0]=s[0];
    int k=0;
    for(i=0;i<len;i++)
    {
        if(s[i]==' ')
        {
            ini[++k]=s[i+1];
        }
            
    }
    for(i=0;i<count;i++)
    {
        if(isLower(ini[i]))
        {
            ini[i]=uppercase(ini[i]);        
        }
    
            
        
    }
    for(i=0;i<count;i++)
    {
        printf("%c",ini[i]);
    }
    printf("\n");
    
    return 0;
}
bool isLower(char c)
{
    if(c>='a' && c<='z')
        return true;
    return false;
}
char uppercase(char c)
{
    int a=c -('a'-'A');
    return (char)a;
}