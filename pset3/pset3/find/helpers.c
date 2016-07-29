/**
 * helpers.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Helper functions for Problem Set 3.
 */
       
#include <cs50.h>

#include "helpers.h"

/**
 * Returns true if value is in array of n values, else false.
 */
bool search(int value, int values[], int n)
{
    int lower=0,upper=n-1,mid=0;
    
    while(lower<=upper)
    {   mid=(lower+upper)/2;
        if(values[mid]==value)
            return true;
        else if(values[mid]<value)
            lower=mid+1;
        else
            upper=mid-1;
            
    }
    return false;
}

/**
 * Sorts array of n values.
 */
void sort(int values[], int n)
{
    for(int i=0;i<n-1;i++)
    {
        for(int j=i+1;j<n;j++)
        {
            if(values[i]>=values[j])
            {
                int temp=values[i];
                values[i]=values[j];
                values[j]=temp;
            }
        }
    }
    return;
}