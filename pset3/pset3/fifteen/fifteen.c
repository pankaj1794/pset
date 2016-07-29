/**
 * fifteen.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Implements Game of Fifteen (generalized to d x d).
 *
 * Usage: fifteen d
 *
 * whereby the board's dimensions are to be d x d,
 * where d must be in [DIM_MIN,DIM_MAX]
 *
 * Note that usleep is obsolete, but it offers more granularity than
 * sleep and is simpler to use than nanosleep; `man usleep` for more.
 */
 
#define _XOPEN_SOURCE 500

#include <cs50.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

// constants
#define DIM_MIN 3
#define DIM_MAX 9

// board
int board[DIM_MAX][DIM_MAX];

//current position of empty tile
int x=0,y=0;

// dimensions
int d;

// prototypes
void clear(void);
void greet(void);
void init(void);
void draw(void);
bool move(int tile);
bool won(void);

int main(int argc, string argv[])
{
    // ensure proper usage
    if (argc != 2)
    {
        printf("Usage: fifteen d\n");
        return 1;
    }

    // ensure valid dimensions
    d = atoi(argv[1]);
    if (d < DIM_MIN || d > DIM_MAX)
    {
        printf("Board must be between %i x %i and %i x %i, inclusive.\n",
            DIM_MIN, DIM_MIN, DIM_MAX, DIM_MAX);
        return 2;
    }

    // open log
    FILE* file = fopen("log.txt", "w");
    if (file == NULL)
    {
        return 3;
    }

    // greet user with instructions
    greet();

    // initialize the board
    init();

    // accept moves until game is won
    while (true)
    {
        // clear the screen
        clear();

        // draw the current state of the board
        draw();

        // log the current state of the board (for testing)
        for (int i = 0; i < d; i++)
        {
            for (int j = 0; j < d; j++)
            {
                fprintf(file, "%i", board[i][j]);
                if (j < d - 1)
                {
                    fprintf(file, "|");
                }
            }
            fprintf(file, "\n");
        }
        fflush(file);

        // check for win
        if (won())
        {
            printf("ftw!\n");
            break;
        }

        // prompt for move
        printf("Tile to move: ");
        int tile = GetInt();
        
        // quit if user inputs 0 (for testing)
        if (tile == 0)
        {
            break;
        }

        // log move (for testing)
        fprintf(file, "%i\n", tile);
        fflush(file);

        // move if possible, else report illegality
        if (!move(tile))
        {
            printf("\nIllegal move.\n");
            usleep(500000);
        }

        // sleep thread for animation's sake
        usleep(500000);
    }
    
    // close log
    fclose(file);

    // success
    return 0;
}

/**
 * Clears screen using ANSI escape sequences.
 */
void clear(void)
{
    printf("\033[2J");
    printf("\033[%d;%dH", 0, 0);
}

/**
 * Greets player.
 */
void greet(void)
{
    clear();
    printf("WELCOME TO GAME OF FIFTEEN\n");
    usleep(2000000);
}

/**
 * Initializes the game's board with tiles numbered 1 through d*d - 1
 * (i.e., fills 2D array with values but does not actually print them).  
 */
void init(void)
{   int n=(d*d)-1;
    if(d%2==0)
    {
    for(int i=0;i<d;i++)
    {
        for(int j=0;j<d;j++)
        {
            if(n==1)
            {    board[i][j]=2;
                n--;
            }
            else if(n==2)
            {
                 board[i][j]=1;
                 n--;
                
            }
            else
            {
                board[i][j]=n;
                n--;

            }
        }
    }
    }
    else
    {
        for(int i=0;i<d;i++)
    {
        for(int j=0;j<d;j++)
        {
            board[i][j]=n;
            n--;
        }
    }
   
    }
    x=d-1;
    y=d-1;
    
}

/**
 * Prints the board in its current state.
 */
void draw(void)
{
    for(int i=0;i<d;i++)
    {
        for(int j=0;j<d;j++)
        {
            if(x==i && y==j)
                printf("   _");
            else
                printf("%4d",board[i][j]);
        }
        printf("\n");
    }
}

/**
 * If tile borders empty space, moves tile and returns true, else
 * returns false. 
 */
bool move(int tile)
{
    
    if(y==0)
    {
        if(x==0)
        {
            if(board[x+1][y]==tile || board[x][y+1]==tile)
            {
                if(board[x+1][y]==tile)
                {
                    int temp=board[x+1][y];
                    board[x+1][y]=board[x][y];
                    board[x][y]=temp;
                    x=x+1;
                }
                else
                {
                    int temp=board[x][y+1];
                    board[x][y+1]=board[x][y];
                    board[x][y]=temp;
                    y=y+1;
                }
            }
            else
            {
                return false;
            }
        }
        else if(x==d-1)
        {
            if(board[x-1][y]==tile || board[x][y+1]==tile)
            {
                if(board[x-1][y]==tile)
                {
                    int temp=board[x-1][y];
                    board[x-1][y]=board[x][y];
                    board[x][y]=temp;
                    x=x-1;
                }
                else
                {
                    int temp=board[x][y+1];
                    board[x][y+1]=board[x][y];
                    board[x][y]=temp;
                    y=y+1;
                }
            }
            else
            {
                return false;
            }

        }
        else
        {
            if(board[x-1][y]==tile || board[x][y+1]==tile || board[x+1][y])
            {
                if(board[x-1][y]==tile)
                {
                    int temp=board[x-1][y];
                    board[x-1][y]=board[x][y];
                    board[x][y]=temp;
                    x=x-1;
                }
                else if(board[x][y+1]==tile)
                {
                    int temp=board[x][y+1];
                    board[x][y+1]=board[x][y];
                    board[x][y]=temp;
                    y=y+1;
                }
                else
                {
                    int temp=board[x+1][y];
                    board[x+1][y]=board[x][y];
                    board[x][y]=temp;
                    x=x+1;
                }
            }
            else
            {
                return false;
            }

        
        }
    }
    else if(y==d-1)
    {
        if(x==0)
        {
            if(board[x+1][y]==tile || board[x][y-1]==tile)
            {
                if(board[x+1][y]==tile)
                {
                    int temp=board[x+1][y];
                    board[x+1][y]=board[x][y];
                    board[x][y]=temp;
                    x=x+1;
                }
                else
                {
                    int temp=board[x][y-1];
                    board[x][y-1]=board[x][y];
                    board[x][y]=temp;
                    y=y-1;
                }
            }
            else
            {
                return false;
            }
        }
        else if(x==d-1)
        {
            if(board[x-1][y]==tile || board[x][y-1]==tile)
            {
                if(board[x-1][y]==tile)
                {
                    int temp=board[x-1][y];
                    board[x-1][y]=board[x][y];
                    board[x][y]=temp;
                    x=x-1;
                }
                else
                {
                    int temp=board[x][y-1];
                    board[x][y-1]=board[x][y];
                    board[x][y]=temp;
                    y=y-1;
                }
            }
            else
            {
                return false;
            }

        }
        else
        {
            if(board[x-1][y]==tile || board[x][y-1]==tile || board[x+1][y])
            {
                if(board[x-1][y]==tile)
                {
                    int temp=board[x-1][y];
                    board[x-1][y]=board[x][y];
                    board[x][y]=temp;
                    x=x-1;
                }
                else if(board[x][y-1]==tile)
                {
                    int temp=board[x][y-1];
                    board[x][y-1]=board[x][y];
                    board[x][y]=temp;
                    y=y-1;
                }
                else
                {
                    int temp=board[x+1][y];
                    board[x+1][y]=board[x][y];
                    board[x][y]=temp;
                    x=x+1;
                }
            }
            else
            {
                return false;
            }

        
        }
    
    }
    else if(x==0)
    {
        if(board[x][y-1]==tile || board[x][y+1]==tile || board[x+1][y]==tile)
        {
            if(board[x][y-1]==tile)
            {
                int temp=board[x][y-1];
                    board[x][y-1]=board[x][y];
                    board[x][y]=temp;
                    y=y-1;
            }
            else if(board[x][y+1]==tile)
            {
                int temp=board[x][y+1];
                    board[x][y+1]=board[x][y];
                    board[x][y]=temp;
                    y=y+1;
            }
            else 
            {
                int temp=board[x+1][y];
                    board[x+1][y]=board[x][y];
                    board[x][y]=temp;
                    x=x+1;
            }
        }
        else
        {
            return false;
        }
    }
        
    else if(x==d-1)
    {
        if(board[x][y-1]==tile || board[x][y+1]==tile || board[x-1][y]==tile)
        {
            if(board[x][y-1]==tile)
            {
                int temp=board[x][y-1];
                    board[x][y-1]=board[x][y];
                    board[x][y]=temp;
                    y=y-1;
            }
            else if(board[x][y+1]==tile)
            {
                int temp=board[x][y+1];
                    board[x][y+1]=board[x][y];
                    board[x][y]=temp;
                    y=y+1;
            }
            else 
            {
                int temp=board[x-1][y];
                    board[x-1][y]=board[x][y];
                    board[x][y]=temp;
                    x=x-1;
            }
        }
        else
        {
            return false;
        }
    }
    else
    {
        if(board[x][y-1]==tile || board[x][y+1]==tile || board[x-1][y]==tile || board[x+1][y] )
        {
            if(board[x][y-1]==tile)
            {
                int temp=board[x][y-1];
                    board[x][y-1]=board[x][y];
                    board[x][y]=temp;
                    y=y-1;
            }
            else if(board[x][y+1]==tile)
            {
                int temp=board[x][y+1];
                    board[x][y+1]=board[x][y];
                    board[x][y]=temp;
                    y=y+1;
            }
            else if(board[x+1][y]==tile)
            {
                int temp=board[x+1][y];
                    board[x+1][y]=board[x][y];
                    board[x][y]=temp;
                    x=x+1;
            }
            else 
            {
                int temp=board[x-1][y];
                    board[x-1][y]=board[x][y];
                    board[x][y]=temp;
                    x=x-1;
            }
        }
        else
        {
            return false;
        }
    }
    return true;
}

/**
 * Returns true if game is won (i.e., board is in winning configuration), 
 * else false.
 */
bool won(void)
{
    int k=1;
    if(x==d-1 && y==d-1)
    {
    for(int i=0;i<d;i++)
    {
        for(int j=0;j<d;j++)
        {
            if(k!=((d*d)-1))
            {
                if(board[i][j]!=k)
                {
                    return false;
                }
                else{
                    k++;}
            }
            
            
        }
    }}
    else
    {
        return false;    
    }
    return true;
    
}