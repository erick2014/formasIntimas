SELECT		numID AS idSucursal,
			f201_rowid_tercero as idSucursalUNOEE,
			f201_id_sucursal as CodigoSucursal,
			f201_descripcion_sucursal as NombreAlmacen,
			f201_cupo_credito as Cupo,
			f015_direccion1 as Direccion1,
			f015_direccion2 as Direccion2,
			f015_direccion3 as Direccion3,
			f015_telefono as Telefono,
			f015_email as Email,
			dbFI.dbo.fnGetClienteSucursal(f201_rowid_tercero,7) as idCliente,
			idCiudadDespacho as idCiudad,
			idVendedor,
			ISNULL(dbFI.dbo.fnGetCriterioSucursal(f201_rowid_tercero, f201_id_sucursal,'001',7),0) as idCanal,
			ISNULL(dbFI.dbo.fnGetCriterioSucursal(f201_rowid_tercero, f201_id_sucursal,'002',7),0) as idCategoria,
			ISNULL(dbFI.dbo.fnGetCriterioSucursal(f201_rowid_tercero, f201_id_sucursal,'003',7),0) as idSubCategoria,
			ISNULL(dbFI.dbo.fnGetCriterioSucursal(f201_rowid_tercero, f201_id_sucursal,'ORI',7),0) as idOrigen,
			ISNULL(dbFI.dbo.fnGetCriterioSucursal(f201_rowid_tercero, f201_id_sucursal,'ZON',7),0) as idZona			
FROM		unoee.dbo.t201_mm_clientes
INNER JOIN	unoee.dbo.t200_mm_terceros 
		ON	f201_rowid_tercero = f200_rowid AND f201_id_cia = f200_id_cia
INNER JOIN	dbFI.dbo.Mst_tblClientes
		ON	LTRIM(RTRIM(f200_nit)) = LTRIM(RTRIM(strIdentificacion)) AND LTRIM(RTRIM(f201_id_sucursal)) = (CASE WHEN strsucursal is null THEN '000' ELSE ltrim(rtrim(strsucursal)) END)
INNER JOIN  unoee.dbo.t015_mm_contactos			
	    ON  f201_rowid_contacto = f015_rowid AND f201_id_cia = f015_id_cia
WHERE		f200_id_cia = 7 AND
			f201_ind_estado_activo = 1 AND
			f200_ind_empleado = 0 AND
			f201_id_vendedor IS NOT NULL AND
			f201_id_lista_precio IS NOT NULL AND
			f200_nit NOT IN ('0284860063', 'FIN080207HV1') AND
			f201_id_vendedor NOT IN('9999', 'ABOG', 'ANT', 'INC')
ORDER BY	f200_razon_social,
			f200_nit,
			f201_id_sucursal
GO