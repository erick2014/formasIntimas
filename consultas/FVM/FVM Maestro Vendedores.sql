SELECT	numID as idVendedor,
		f210_id as Codigo,
        f200_id as Documento,
        f200_razon_social as Nombre,
        NULL as Telefono,
        strEmail,
        NULL as Usuario,
        NULL as Clave
FROM	unoee.dbo.t210_mm_vendedores INNER JOIN unoee.dbo.t200_mm_terceros
											ON (f210_rowid_tercero = f200_rowid)
									 INNER JOIN dbFI.dbo.Mst_tblVendedores
											ON (f210_id = strCodigo)
WHERE	f210_id_cia = 7 AND
		f210_id NOT IN ('9999','ABOG','ANT','INC') AND
		logDispositivoMovil = 1
GO