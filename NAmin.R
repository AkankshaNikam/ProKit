args <- commandArgs(trailingOnly = TRUE)
file <- args[1]
d <- read.csv(file,sep="\t",header=TRUE)
collist <- eval(parse(text=args[2]))
a <- subset (d, select=collist)

minii <- min(apply(a, 2, function(x) min(x,na.rm=TRUE)))
a[is.na(a)] = (minii/10)

saveRDS(a, "C:/xampp/htdocs/prot/uploads/boxplot2.rds")
 