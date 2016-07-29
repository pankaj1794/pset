/**
 * dictionary.c
 *
 * Computer Science 50
 * Problem Set 5
 *
 * Implements a dictionary's functionality.
 */
#include <ctype.h>
#include <stdbool.h>
#include <stdio.h>
#include <stdlib.h>
#include "dictionary.h"
#include <string.h>

node* root=NULL;

unsigned int track=0;

/**
 * Returns true if word is in dictionary else false.
 */
bool check(const char* word)
{   node* temp=root;
    int c=0;
    int len=strlen(word);
    for(int i=0;i<len;i++)
    {
        c=chartoascii(word[i]);
        if(c==-1)
        {
            return false;
            
        }
        if(temp->children[c]==NULL)
        {
            
            return false;
        }
        temp=temp->children[c];
    }
    if(temp->is_word)
    {
        return true;
    }

    return false;
}

/**
 * Loads dictionary into memory.  Returns true if successful else false.
 */
bool load(const char* dictionary)
{   int count=0,index=0;
    FILE* fp = fopen(dictionary, "r");
    if (fp == NULL)
    {
        return false;
    }
    char dis[45]={ };
    node* temp=root;
    int c=fgetc(fp);
     root=createnode();
        

    while(c!=EOF)
    {   temp=root;
        while(c!='\n')
        {
            dis[count++]=c;
            c=fgetc(fp);
        }
        for(int i=0;i<count;i++)
        {   
            if((index=chartoascii(dis[i]))!=-1)
            {
               
                
                    if(temp->children[index]==NULL)
                    {
                        temp->children[index]=createnode();
                        temp=temp->children[index];
                        
                    }
                    else
                    {
                        temp=temp->children[index];
                    }
                
                
            }
            
            
            
        }
        temp->is_word=true;
        track++;
    
        c=fgetc(fp);
        count=0;
    }
    
    fclose(fp);
    return true;
}

/**
 * Returns number of words in dictionary if loaded else 0 if not yet loaded.
 */
unsigned int size(void)
{
    
    return track;
}

/**
 * Unloads dictionary from memory.  Returns true if successful else false.
 */
bool unload(void)
{
    
    del(root);

    return true;
}
int chartoascii(char c)
{
    if(c=='\'')
    {
        return 26;
    }
    else if(!isalpha(c))
    {
        return -1;
    }
    else if(isupper(c))
    {
        return c-'A';
        
    }
    else
    {
        return c-'a';
    }
    
}
node* createnode()
{   int a=0;
    node* n=malloc(sizeof(node));
    n->is_word=false;
    while(a<27)
    {
        n->children[a]=NULL;
        a++;
    }
    return n;
}
void del(node* temp)
{
    for(int i=0;i<27;i++)
    {
        if(temp->children[i]!=NULL)
        {
            del(temp->children[i]);
            
        }

    }
    free(temp);
}
