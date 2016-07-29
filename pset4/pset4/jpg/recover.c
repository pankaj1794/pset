/**
 * recover.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Recovers JPEGs from a forensic image.
 */
#include <stdlib.h>
#include <stdio.h>
#include <stdint.h>
typedef uint8_t  BYTE;
int main(int argc, char* argv[])
{
    
    FILE* Fcard =fopen("card.raw","r");
    BYTE buff[512];
    long i=0;
    char t[]={ };
    FILE* fp;
    int count=0;
    int flag=0;
    while(fread(&buff,sizeof(buff),1,Fcard)==1)
    {
        if(buff[0]==0xff && buff[1]==0xd8 && buff[2]==0xff && buff[3]>>4==0x0e)
        {
            
            if(count==0)
            {
                 
                sprintf(t,"%03d.jpg",count++);
                
                fp=fopen(t,"w");
                flag=1;
            }
            else
            {
                fclose(fp);
               
                sprintf(t,"%03d.jpg",count++);
                 fp=fopen(t,"a");
                
            }
            
        }
        if(flag==1)
            fwrite(&buff,sizeof(buff),1,fp);
        i++;
    }
    fclose(fp);
    fclose(Fcard);
}
