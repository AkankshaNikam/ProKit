args <- commandArgs(trailingOnly = TRUE)
file <- args[1]
d2 <- read.table(file,header = T, sep=",", row.names=1)
colnames(d2)<- c("ColumnName", "batch")

d <- readRDS("C:/xampp/htdocs/prot/uploads/normal.rds")

library(sva)
modcombat <- model.matrix(~1, data=d2)
combat_edata <- ComBat(dat=d, batch = d2$batch, mod=modcombat, par.prior=TRUE, prior.plots=FALSE)

#combi <- cbind(d[match(row.names(combat_edata), rownames(d)), ], combat_edata)

quan <- c()
for (i in 1:dim(combat_edata)[2])
{
	tmp.q <- quantile(a[,i],0.75)
	quan <- c(quan,tmp.q)
}
library(RColorBrewer)
cols <- brewer.pal(maxi,"PiYG")
png("uploads/boxplotcbc.png")
boxplot(combat_edata, ylim=c(0,max(quan)), las=2, col=rep(c(cols),each = repe))
dev.off()

library(WriteXLS)
WriteXLS(combat_edata, ExcelFileName = "C:/xampp/htdocs/prot/uploads/data_batch.xlsx",AdjWidth = T, )
saveRDS(combat_edata, "C:/xampp/htdocs/prot/uploads/normal_batch.rds")