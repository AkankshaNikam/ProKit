args <- commandArgs(trailingOnly = TRUE)
file <- args[1]
d <- read.csv(file,sep="\t",header=TRUE)
collist <- eval(parse(text=args[2]))
collist= collist+1
a <- subset (d, select=collist)
ro <- nrow(a)
#print(ro)
coll <-ncol(a)
mini <- min(apply(a, 2, function(x) min(x,na.rm=TRUE)))
maxi <- max(apply(a, 2, function(x) max(x,na.rm=TRUE)))
#f1 <- (collist[1])
#fn <- (collist[length(collist)])
#which(is.na(a$f1:fn))
if(indx <- apply(a, 2, function(x) any(is.na(x))))
{
print (paste("yes",",",ro,",",coll,",",mini,",",maxi))
}
else
{
print(paste ("no",",",ro,",",coll,",",mini,",",maxi))
}
#print(colnames(a[indx]))