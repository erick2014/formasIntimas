SELECT		DISTINCT
			f112_id AS idListaPrecio,
			f112_descripcion as DescListaPrecio
FROM		unoee.dbo.t112_mc_listas_precios
INNER JOIN	unoee.dbo.t201_mm_clientes
		ON	f112_id_cia = f201_id_cia AND f112_id = f201_id_lista_precio
INNER JOIN	unoee.dbo.t200_mm_terceros
		ON	f201_id_cia = f200_id_cia AND f201_rowid_tercero = f200_rowid
INNER JOIN	dbFI.dbo.Mst_tblClientes
		ON	LTRIM(RTRIM(f200_nit)) = LTRIM(RTRIM(strIdentificacion)) AND LTRIM(RTRIM(f201_id_sucursal)) = (CASE WHEN strsucursal is null THEN '000' ELSE ltrim(rtrim(strsucursal)) END)
WHERE		f200_id_cia = 7 AND
			f201_ind_estado_activo = 1 AND
			f200_ind_empleado = 0 AND
			f201_id_vendedor IS NOT NULL AND
			f201_id_lista_precio IS NOT NULL AND
			f112_id NOT IN('012','05','07','070','122','137','141','157','161','167','202','203','204','205','206','207','208','209','300','304','305') AND
			f200_nit NOT IN ('0284860063', 'FIN080207HV1') AND
			f201_id_vendedor NOT IN('9999', 'ABOG', 'ANT', 'INC')
ORDER BY	f112_id
GO