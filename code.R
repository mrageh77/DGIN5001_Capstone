setwd("E:/school/intenship/nsha/")
library(openxlsx)

NZ <- createWorkbook("NZ")
addWorksheet(NZ, "BVM EFR forms")
addWorksheet(NZ, "CRC EFR forms")
addWorksheet(NZ, "NCH EFR forms")
addWorksheet(NZ, "LFM EFR forms")
addWorksheet(NZ, "SHM EFR forms")
addWorksheet(NZ, "ARH EFR forms")
addWorksheet(NZ, "CRH EFR forms")
addWorksheet(NZ, "SCC EFR forms")
addWorksheet(NZ, "ASH EFR forms")


EZ <- createWorkbook("EZ")
addWorksheet(EZ, "SMR EFR forms")
addWorksheet(EZ, "ICH EFR forms")
addWorksheet(EZ, "VCH EFR forms")
addWorksheet(EZ, "SHH EFR forms")
addWorksheet(EZ, "BMH EFR forms")
addWorksheet(EZ, "CBR EFR forms")
addWorksheet(EZ, "SRH EFR forms")
addWorksheet(EZ, "GMH EFR forms")
addWorksheet(EZ, "EMH EFR forms")
addWorksheet(EZ, "SMM EFR forms")


WZ <- createWorkbook("WZ")
addWorksheet(WZ, "YRH EFR forms")
addWorksheet(WZ, "DBH EFR forms")
addWorksheet(WZ, "ACH EFR forms")
addWorksheet(WZ, "SMH EFR forms")
addWorksheet(WZ, "WKM EFR forms")
addWorksheet(WZ, "VRH EFR forms")
addWorksheet(WZ, "EKM EFR forms")
addWorksheet(WZ, "SSR EFR forms")
addWorksheet(WZ, "FMH EFR forms")
addWorksheet(WZ, "QGH EFR forms")
addWorksheet(WZ, "RWH EFR forms")


Provincial <- read.xlsx(xlsxFile = "NSHA and Provincial Forms Inventory Listing.xlsx",
                        fillMergedCells = TRUE, colNames = TRUE,sheet = 1)

Central <- read.xlsx(xlsxFile = "NSHA and Provincial Forms Inventory Listing.xlsx", 
                     fillMergedCells = TRUE, colNames = TRUE,sheet = 2)

dha1 <- read.xlsx(xlsxFile = "NSHA and Provincial Forms Inventory Listing.xlsx", 
                     fillMergedCells = TRUE, colNames = TRUE,sheet = 3)

ssr <- dha1[c(2,3,8)]
colnames(ssr)[3] <- "In.Use"
ssr<-ssr[!is.na(ssr$In.Use),]
writeData(WZ, sheet = 8, ssr,colNames = T)


fmh<-dha1[c(2,3,9)]
colnames(fmh)[3] <- "In.Use"
fmh<-fmh[!is.na(fmh$In.Use),]
writeData(WZ, sheet = 9, fmh,colNames = T)


qgh<-dha2[c(2,3,10)]
colnames(qgh)[3] <- "In.Use"
qgh<-qgh[!is.na(qgh$In.Use),]
writeData(WZ, sheet = 10, qgh,colNames = T)



dha2 <- read.xlsx(xlsxFile = "NSHA and Provincial Forms Inventory Listing.xlsx", 
                     fillMergedCells = TRUE, colNames = TRUE,sheet = 4)

yrh <- dha2[c(2,3,8)]
colnames(yrh)[3] <- "In.Use"
yrh<-yrh[!is.na(yrh$In.Use),]
writeData(WZ, sheet = 1, yrh,colNames = T)

yrhForms<-read.csv("OPOR Form Tracker.csv", sep=",",h=T)


yrh$check<-yrh$EFR.Form.ID %in% yrhForms$Form.ID

dbh<-dha2[c(2,3,9)]
colnames(dbh)[3] <- "In.Use"
dbh<-dbh[!is.na(dbh$In.Use),]
writeData(WZ, sheet = 2, dbh,colNames = T)


rwh<-dha2[c(2,3,9)]
colnames(rwh)[3] <- "In.Use"
rwh<-rwh[!is.na(rwh$In.Use),] 
writeData(WZ, sheet = 11, rwh,colNames = T)

  

dha3 <- read.xlsx(xlsxFile = "E:/school/intenship/nsha/NSHA and Provincial Forms Inventory Listing.xlsx", 
                     fillMergedCells = TRUE, colNames = TRUE,sheet = 5)


vrh<-dha3[c(2,3,8)]
colnames(vrh)[3] <- "In.Use"
vrh<-vrh[!is.na(vrh$In.Use),]
writeData(WZ, sheet = 6, vrh,colNames = T)


ach<-dha3[c(2,3,9)]
colnames(ach)[3] <- "In.Use"
ach<-ach[!is.na(ach$In.Use),]
writeData(WZ, sheet = 3, ach,colNames = T)


ekm<-dha3[c(2,3,10)]
colnames(ekm)[3] <- "In.Use"
ekm<-ekm[!is.na(ekm$In.Use),]
writeData(WZ, sheet = 7, ekm,colNames = T)


smh<-dha3[c(2,3,11)]
colnames(smh)[3] <- "In.Use"
smh<-smh[!is.na(smh$In.Use),]
writeData(WZ, sheet = 4, smh,colNames = T)


wkm<-dha3[c(2,3,12)]
colnames(wkm)[3] <- "In.Use"
wkm<-wkm[!is.na(wkm$In.Use),]
writeData(WZ, sheet = 5, wkm,colNames = T)


dha4 <- read.xlsx(xlsxFile = "E:/school/intenship/nsha/NSHA and Provincial Forms Inventory Listing.xlsx", 
                     fillMergedCells = TRUE, colNames = TRUE,sheet = 6)

crh<-dha4[c(2,3,8)]
colnames(crh)[3] <- "In.Use"
crh<-crh[!is.na(crh$In.Use),]
writeData(NZ, sheet = 7, bvm,colNames = T)


lfm<-dha4[c(2,3,9)]
colnames(lfm)[3] <- "In.Use"
lfm<-lfm[!is.na(lfm$In.Use),]
writeData(NZ, sheet = 4, bvm,colNames = T)


dha5 <- read.xlsx(xlsxFile = "E:/school/intenship/nsha/NSHA and Provincial Forms Inventory Listing.xlsx", 
                     fillMergedCells = TRUE, colNames = TRUE,sheet = 7)

crc<-dha5[c(2,3,8)]
colnames(crc)[3] <- "In.Use"
crc<-crc[!is.na(crc$In.Use),]
writeData(NZ, sheet = 2, bvm,colNames = T)


ash<-dha5[c(2,3,9)]
colnames(ash)[3] <- "In.Use"
ash<-ash[!is.na(ash$In.Use),]
writeData(NZ, sheet = 9, bvm,colNames = T)


bvm<-dha5[c(2,3,10)]
colnames(bvm)[3] <- "In.Use"
bvm<-bvm[!is.na(bvm$In.Use),]

writeData(NZ, sheet = 1, bvm,colNames = T)


nch<-dha5[c(2,3,11)]
colnames(nch)[3] <- "In.Use"
nch<-nch[!is.na(nch$In.Use),]
writeData(NZ, sheet = 3, bvm,colNames = T)


scc<-dha5[c(2,3,12)]
colnames(scc)[3] <- "In.Use"
scc<-scc[!is.na(scc$In.Use),]
writeData(NZ, sheet = 8, bvm,colNames = T)


dha6 <- read.xlsx(xlsxFile = "E:/school/intenship/nsha/NSHA and Provincial Forms Inventory Listing.xlsx", 
                     fillMergedCells = TRUE, colNames = TRUE,sheet = 8)

arh<-dha6[c(2,3,8)]
colnames(arh)[3] <- "In.Use"
arh<-arh[!is.na(arh$In.Use),]
writeData(NZ, sheet = 6, bvm,colNames = T)



dha7 <- read.xlsx(xlsxFile = "E:/school/intenship/nsha/NSHA and Provincial Forms Inventory Listing.xlsx", 
                     fillMergedCells = TRUE, colNames = TRUE,sheet = 9)
dha7 <- dha7[-c(1,2), ]
colnames(dha7) <- dha7[1,]
dha7 <- dha7[-1, ] 

smm<-dha7[c(2,3,8)]
colnames(smm)[3] <- "In.Use"
smm<-smm[!is.na(smm$In.Use),]

emh<-dha7[c(2,3,9)]
colnames(emh)[3] <- "In.Use"
emh<-emh[!is.na(emh$In.Use),]

gmh<-dha7[c(2,3,10)]
colnames(gmh)[3] <- "In.Use"
gmh<-gmh[!is.na(gmh$In.Use),]

smr<-dha7[c(2,3,11)]
colnames(smr)[3] <- "In.Use"
smr<-smr[!is.na(smr$In.Use),]

srh<-dha7[c(2,3,12)]
colnames(srh)[3] <- "In.Use"
srh<-srh[!is.na(srh$In.Use),]

dha8 <- read.xlsx(xlsxFile = "E:/school/intenship/nsha/NSHA and Provincial Forms Inventory Listing.xlsx", 
                     fillMergedCells = TRUE, colNames = TRUE,sheet = 10)
dha8 <- dha8[-c(1,2), ]
colnames(dha8) <- dha8[1,]
dha8 <- dha8[-1, ] 

cbr<-dha8[c(2,3,8)]
colnames(cbr)[3] <- "In.Use"
cbr<-cbr[!is.na(cbr$In.Use),]

bmh<-dha8[c(2,3,8)]
colnames(bmh)[3] <- "In.Use"
bmh<-bmh[!is.na(bmh$In.Use),]

ich<-dha8[c(2,3,8)]
colnames(ich)[3] <- "In.Use"
ich<-ich[!is.na(ich$In.Use),]

shh<-dha8[c(2,3,8)]
colnames(shh)[3] <- "In.Use"
shh<-shh[!is.na(shh$In.Use),]

vch<-dha8[c(2,3,8)]
colnames(vch)[3] <- "In.Use"
vch<-vch[!is.na(vch$In.Use),]


saveWorkbook(NZ, "NZ.xlsx", overwrite = TRUE)
saveWorkbook(WZ, "WZ.xlsx", overwrite = TRUE)
saveWorkbook(EZ, "EZ.xlsx", overwrite = TRUE)



#https://rdrr.io/cran/openxlsx/man/mergeCells.html