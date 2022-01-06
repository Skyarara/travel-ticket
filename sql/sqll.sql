CREATE TABLE [user] (
	id_user INT IDENTITY(1,1) NOT NULL,
	email varchar(30) NOT NULL UNIQUE,
	password varchar(100) NOT NULL,
  CONSTRAINT [PK_USER] PRIMARY KEY CLUSTERED
  (
  [id_user] ASC
  ) WITH (IGNORE_DUP_KEY = OFF)

)
GO
CREATE TABLE [penumpang] (
	id_penumpang INT IDENTITY(1,1) NOT NULL,
	id_user INT NOT NULL,
	nama_lengkap varchar(100) NOT NULL,
	no_telp varchar(15) NOT NULL,
	email varchar(100) NOT NULL,
	jk varchar(1) NOT NULL,
	tgl_lahir date NOT NULL,
	asal_kota varchar(30) NOT NULL,
  CONSTRAINT [PK_PENUMPANG] PRIMARY KEY CLUSTERED
  (
  [id_penumpang] ASC
  ) WITH (IGNORE_DUP_KEY = OFF)

)
GO
CREATE TABLE [pemesanan] (
	id_pemesanan INT IDENTITY(1,1) NOT NULL,
	id_penumpang integer NOT NULL,
	id_petugas integer NOT NULL,
	id_tiket integer NOT NULL,
	tanggal_pemesanan date NOT NULL,
	total_bayar decimal(20) NOT NULL,
	jumlah_penumpang integer NOT NULL,
	status bit NOT NULL,
  CONSTRAINT [PK_PEMESANAN] PRIMARY KEY CLUSTERED
  (
  [id_pemesanan] ASC
  ) WITH (IGNORE_DUP_KEY = OFF)

)
GO
CREATE TABLE [tiket] (
	id_tiket INT IDENTITY(1,1) NOT NULL,
	id_transportasi integer NOT NULL,
	rute_awal INT NOT NULL,
	rute_akhir INT NOT NULL,
	harga decimal(20) NOT NULL,
	waktu_berangkat datetime NOT NULL,
	waktu_sampai datetime NOT NULL,
	sisa_kursi INT NULL,
  CONSTRAINT [PK_RUTE] PRIMARY KEY CLUSTERED
  (
  [id_tiket] ASC
  ) WITH (IGNORE_DUP_KEY = OFF)

)
GO
CREATE TABLE [detail_pemesanan] (
	id_detail_pemesanan INT IDENTITY(1,1) NOT NULL,
	id_pemesanan integer NOT NULL,
	nama_penumpang varchar(100) NOT NULL,
	nik integer NOT NULL,
	kode_kursi varchar(30) NOT NULL,
	jk varchar(1) NOT NULL,
  CONSTRAINT [PK_DETAIL_PEMESANAN] PRIMARY KEY CLUSTERED
  (
  [id_detail_pemesanan] ASC
  ) WITH (IGNORE_DUP_KEY = OFF)

)
GO
CREATE TABLE [transportasi] (
	id_trasportasi INT IDENTITY(1,1) NOT NULL,
	id_type_transportasi integer NOT NULL,
	nama_pesawat varchar(255) NOT NULL,
	kode varchar(5) NOT NULL,
	jumlah_kursi integer NOT NULL,
  CONSTRAINT [PK_TRANSPORTASI] PRIMARY KEY CLUSTERED
  (
  [id_trasportasi] ASC
  ) WITH (IGNORE_DUP_KEY = OFF)

)
GO
CREATE TABLE [type_transportasi] (
	id_type_transportasi INT IDENTITY(1,1) NOT NULL,
	nama_type varchar(30) NOT NULL,
	keterangan text NOT NULL,
  CONSTRAINT [PK_TYPE_TRANSPORTASI] PRIMARY KEY CLUSTERED
  (
  [id_type_transportasi] ASC
  ) WITH (IGNORE_DUP_KEY = OFF)

)
GO
CREATE TABLE [petugas] (
	id_petugas INT IDENTITY(1,1) NOT NULL,
	id_user integer NOT NULL,
	nama_petugas varchar(100) NOT NULL,
  CONSTRAINT [PK_PETUGAS] PRIMARY KEY CLUSTERED
  (
  [id_petugas] ASC
  ) WITH (IGNORE_DUP_KEY = OFF)

)
GO

ALTER TABLE [penumpang] WITH CHECK ADD CONSTRAINT [penumpang_fk0] FOREIGN KEY ([id_user]) REFERENCES [user]([id_user])
ON UPDATE CASCADE
GO
ALTER TABLE [penumpang] CHECK CONSTRAINT [penumpang_fk0]
GO

ALTER TABLE [pemesanan] WITH CHECK ADD CONSTRAINT [pemesanan_fk0] FOREIGN KEY ([id_penumpang]) REFERENCES [penumpang]([id_penumpang])
ON UPDATE CASCADE
GO
ALTER TABLE [pemesanan] CHECK CONSTRAINT [pemesanan_fk0]
GO
ALTER TABLE [pemesanan] WITH CHECK ADD CONSTRAINT [pemesanan_fk1] FOREIGN KEY ([id_petugas]) REFERENCES [petugas]([id_petugas])
ON UPDATE CASCADE
GO
ALTER TABLE [pemesanan] CHECK CONSTRAINT [pemesanan_fk1]
GO
ALTER TABLE [pemesanan] WITH CHECK ADD CONSTRAINT [pemesanan_fk2] FOREIGN KEY ([id_tiket]) REFERENCES [tiket]([id_tiket])
ON UPDATE CASCADE
GO
ALTER TABLE [pemesanan] CHECK CONSTRAINT [pemesanan_fk2]
GO

ALTER TABLE [tiket] WITH CHECK ADD CONSTRAINT [tiket_fk0] FOREIGN KEY ([id_transportasi]) REFERENCES [transportasi]([id_trasportasi])
ON UPDATE CASCADE
GO
ALTER TABLE [tiket] CHECK CONSTRAINT [tiket_fk0]
GO

ALTER TABLE [detail_pemesanan] WITH CHECK ADD CONSTRAINT [detail_pemesanan_fk0] FOREIGN KEY ([id_pemesanan]) REFERENCES [pemesanan]([id_pemesanan])
ON UPDATE CASCADE
GO
ALTER TABLE [detail_pemesanan] CHECK CONSTRAINT [detail_pemesanan_fk0]

GO
ALTER TABLE [transportasi] WITH CHECK ADD CONSTRAINT [transportasi_fk0] FOREIGN KEY ([id_type_transportasi]) REFERENCES [type_transportasi]([id_type_transportasi])
ON UPDATE CASCADE
GO
ALTER TABLE [transportasi] CHECK CONSTRAINT [transportasi_fk0]
GO


ALTER TABLE [petugas] WITH CHECK ADD CONSTRAINT [petugas_fk0] FOREIGN KEY ([id_user]) REFERENCES [user]([id_user])
ON UPDATE NO ACTION ON DELETE NO ACTION
GO
ALTER TABLE [petugas] CHECK CONSTRAINT [petugas_fk0]
GO