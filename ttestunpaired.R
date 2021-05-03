args <- commandArgs(trailingOnly = TRUE)
d <- readRDS("C:/xampp/htdocs/prot/uploads/normal.rds")
group <- eval(parse(text=args[1]))
s<- nrow(a)
ak <- which(group==0)

aka <- which(group!=0)

matCS <- as.matrix(d)

my.p.value<-function(a,b){
  obj<-try(t.test(x,y,alternative = "two.sided",mu=0, paired = FALSE,conf.level = 0.95),silent=TRUE)
  if(is(obj,"try-error"))
  {
    return("NA")
  }else
  {
    return(obj$p.value)
  }
}
## t- test loop
toVolcano.CS<-c()
n1 <- c()
p1 <- c()
fc1 <- c()
for(i in 1:s){
  x<-c(matCS[i,c(ak)])
  y<-c(matCS[i,c(aka)])
  n<-rownames(matCS)[i]
  p<-my.p.value(x,y)
  m1 <- mean(matCS[i,c(ak)])
  m2 <- mean(matCS[i,c(aka)])
  fc <- m1/m2
  n1 <- c(n1,n)
  p1 <- c(p1,p)
  fc1 <- c(fc1,fc)
}
p1<- as.numeric(p1)
fc1 <- as.numeric(fc1)
toVolcano.CS <- (data.frame(n1,p1,fc1))

library(ggplot2)
library(ggrepel)

png("uploads/volcano_up.png")
toVolcano.CS$col <- "black"
toVolcano.CS[!is.na(toVolcano.CS$p1) & -log10(toVolcano.CS$p1) > 1.0 & log2(toVolcano.CS$fc1) > 1.0, "col"] <- "green"
toVolcano.CS[!is.na(toVolcano.CS$p1) & -log10(toVolcano.CS$p1) > 1.0 & log2(toVolcano.CS$fc1) < -1.0, "col"] <- "red"
ggplot(toVolcano.CS, aes(x = log2(fc1), y = -log10(p1), color = col)) +
  geom_point(size=2)+scale_color_identity()+
  geom_hline(yintercept = 1, linetype="dotted", color="blue", size=0.8)+
  geom_vline(xintercept = c(-1.0,1.0), linetype="dotted", color="blue", size=0.8)+
  geom_text_repel(data=subset(toVolcano.CS,  -log10(toVolcano.CS$p1) > 1.0 & log2(toVolcano.CS$fc1) > 1.0 | -log10(toVolcano.CS$p1) > 1.0 & log2(toVolcano.CS$fc1) < -1.0),aes(label=Gene),hjust=0, vjust=0, size = 3, col="black")
dev.off()

#png("uploads/volcano_un.png")
#with(toVolcano.CS, plot(log2(fc1), -log10(p1), pch=20, col="grey",main="Volcano Plot", ylab="-log10(pValue)",xlab="log2(FoldChange)"))
#with(subset(toVolcano.CS, -log10(p1) > 1.0 & log2(fc1)>1.0), points(log2(fc1), -log10(p1), pch=20, col="blue"))
#with(subset(toVolcano.CS, -log10(p1) > 1.0 & log2(fc1)<(-1.0)), points(log2(fc1), -log10(p1), pch=20, col="maroon"))
#abline(h = 1.0, col = "green", lty = 2, lwd = 1)
#abline(v = c(-1.0,1.0), col = "green", lty = 2, lwd = 1)
#dev.off()