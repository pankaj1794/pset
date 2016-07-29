/**
 * copy.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Copies a BMP piece by piece, just because.
 */
       
#include <stdio.h>
#include <stdlib.h>

#include "bmp.h"

int main(int argc, char* argv[])
{
    // ensure proper usage
    if (argc != 4)
    {
        printf("Usage: ./copy infile outfile\n");
        return 1;
    }

    // remember filenames
    //int n=atoi(argv[1]);
    int n=atoi(argv[1]);
    if(n<1 || n>100)
    {
        printf("enter number between 1 & 100\n");
        return 1;
        
    }
    char* infile = argv[2];
    char* outfile = argv[3];
    
    // open input file 
    FILE* inptr = fopen(infile, "r");
    if (inptr == NULL)
    {
        printf("Could not open %s.\n", infile);
        return 2;
    }

    // open output file
    FILE* outptr = fopen(outfile, "w");
    if (outptr == NULL)
    {
        fclose(inptr);
        fprintf(stderr, "Could not create %s.\n", outfile);
        return 3;
    }

    // read infile's BITMAPFILEHEADER
    BITMAPFILEHEADER bf;
    fread(&bf, sizeof(BITMAPFILEHEADER), 1, inptr);

    // read infile's BITMAPINFOHEADER
    BITMAPINFOHEADER bi;
    fread(&bi, sizeof(BITMAPINFOHEADER), 1, inptr);

    // ensure infile is (likely) a 24-bit uncompressed BMP 4.0
    if (bf.bfType != 0x4d42 || bf.bfOffBits != 54 || bi.biSize != 40 || 
        bi.biBitCount != 24 || bi.biCompression != 0)
    {
        fclose(outptr);
        fclose(inptr);
        fprintf(stderr, "Unsupported file format.\n");
        return 4;
    }
    
    
    int npadding =  (4 - (n*bi.biWidth * sizeof(RGBTRIPLE)) % 4) % 4;
    bf.bfSize=(sizeof(RGBTRIPLE)*(n*bi.biWidth)*(n*abs(bi.biHeight))+54+(n*npadding*abs(bi.biHeight)));
    bi.biSizeImage=(sizeof(RGBTRIPLE)*(n*bi.biWidth)*(n*abs(bi.biHeight))+(n*npadding*abs(bi.biHeight)));

    int padding =  (4 - (bi.biWidth * sizeof(RGBTRIPLE)) % 4) % 4;

    long height=bi.biHeight;
    long width=bi.biWidth;
    bi.biWidth=bi.biWidth*n;
    bi.biHeight=bi.biHeight*n;
    
    

    // write outfile's BITMAPFILEHEADER
    fwrite(&bf, sizeof(BITMAPFILEHEADER), 1, outptr);

    // write outfile's BITMAPINFOHEADER
    fwrite(&bi, sizeof(BITMAPINFOHEADER), 1, outptr);

    // determine padding for scanlines
    
    RGBTRIPLE triple1[width*n];
    RGBTRIPLE triple;
    
    
    int k1=0;
    // iterate over infile's scanlines
    for (int i = 0; i <abs((int)height); i++)
    {
        
        // iterate over pixels in scanline
        for (int j = 0; j < width; j++)
        {
            // temporary storage
            
            
            // read RGB triple from infile
            fread(&triple, sizeof(RGBTRIPLE), 1, inptr);
            
            // write RGB triple to outfile
            for(int i1=0;i1<n;i1++)
             {
                
                fwrite(&triple, sizeof(RGBTRIPLE), 1, outptr);
                triple1[k1].rgbtBlue=triple.rgbtBlue;
                triple1[k1].rgbtGreen=triple.rgbtGreen;
                triple1[k1].rgbtRed=triple.rgbtRed;
                k1++;
             }
            
        }
        fseek(inptr, padding, SEEK_CUR);
        for (int k = 0; k < npadding; k++)
        {
            fputc(0x00, outptr);
        }
            
            
        for(int l=1;l<n;l++)
        {
            for (int j1= 0; j1 <n*width; j1++)
            {
                
                fwrite(&triple1[j1], sizeof(RGBTRIPLE), 1, outptr);
                
            }
            
            for (int k = 0; k < npadding; k++)
            {
                fputc(0x00, outptr);
            }
            

        }  
        k1=0;
        
        

        
            }

    // close infile
    fclose(inptr);

    // close outfile
    fclose(outptr);

    // that's all folks
    return 0;
}
