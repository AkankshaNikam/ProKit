args <- commandArgs(trailingOnly = TRUE)
file <- args[1]
d <- read.csv(file,sep="\t",header=TRUE)
collist <- eval(parse(text=args[2]))
a <- subset (d, select=collist)

a[is.na(a)] = 0
saveRDS(a, "C:/xampp/htdocs/prot/uploads/boxplot1.rds")
