/**
 * generate.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Generates pseudorandom numbers in [0,LIMIT), one per line.
 *
 * Usage: generate n [s]
 *
 * where n is number of pseudorandom numbers to print
 * and s is an optional seed
 */
 
#define _XOPEN_SOURCE

#include <cs50.h>
#include <stdio.h>
#include <stdlib.h>
#include <time.h>

// constant
#define LIMIT 65536

int main(int argc, string argv[])
{
    // this if blocks check how many command line arguments are past if 0 or more then 2 command line arguments are pass then this if block is executed which give error msg written in printf and exit program by return 1 means error
    if (argc != 2 && argc != 3)
    {
        printf("Usage: generate n [s]\n");
        return 1;
    }

    // this line will convert string argv[1] (which is number of pseudorandom numbers) into integer and store it in n 
    int n = atoi(argv[1]);

    // this if block check weather seed value is provided by user by checking argc==3 if seed is provivded by user then seed is pass as argument to srand48 otherwise else a rand seed is generated using time(null) function 
    if (argc == 3)
    {
        srand48((long int) atoi(argv[2]));
    }
    else
    {
        srand48((long int) time(NULL));
    }

    // this for loop will print n pseudorandom number each on new line. random number are generated using drand48 * with limit which is upper bound of number.
    for (int i = 0; i < n; i++)
    {
        printf("%i\n", (int) (drand48() * LIMIT));
    }

    // success
    return 0;
}