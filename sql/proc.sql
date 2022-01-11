GO
CREATE PROC DeleteAllPemesanan
AS
DELETE FROM detail_pemesanan
DELETE FROM pemesanan

GO
CREATE PROC ChangeAllPovinceStatus  @status int
AS
UPDATE provinces SET status= @status

GO
CREATE PROC ChangeTiketKursi  @num int
AS
UPDATE tiket SET sisa_kursi= @num