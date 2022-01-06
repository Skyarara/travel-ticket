-- Jumlah Penumpang
CREATE TRIGGER kursi_penumpang ON tiket AFTER INSERT
AS
BEGIN
	declare @id_tiket int  
	declare @id_transportasi int  
    
    SELECT @id_tiket = id_tiket from inserted  
	SELECT @id_transportasi =  id_transportasi from inserted  

	UPDATE tiket SET sisa_kursi = (SELECT jumlah_kursi FROM transportasi WHERE id_trasportasi = @id_transportasi)
END