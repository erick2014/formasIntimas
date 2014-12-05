SELECT		numID as idCliente,
			f201_rowid_tercero as idClienteUNOEE,
			f200_id as NIT,
			f200_razon_social as RazonSocial,
			f015_contacto as Nombre,
			f015_telefono as Telefono,
			NULL Celular,
			f015_direccion1 as Direccion,
			NULL idCuenta	
FROM		unoee.dbo.t200_mm_terceros 
INNER JOIN	unoee.dbo.t201_mm_clientes
		ON	f201_rowid_tercero = f200_rowid
INNER JOIN	dbFI.dbo.Mst_tblClientes
		ON	LTRIM(RTRIM(f200_nit)) = LTRIM(RTRIM(strIdentificacion)) AND LTRIM(RTRIM(f201_id_sucursal)) = (CASE WHEN strsucursal is null THEN '000' ELSE ltrim(rtrim(strsucursal)) END)
INNER JOIN  unoee.dbo.t015_mm_contactos			
	    ON  f201_rowid_contacto = f015_rowid AND f201_id_cia = f015_id_cia
WHERE		f200_id_cia IN (7) AND
			f201_id_sucursal IN('000','001') AND
			f201_ind_estado_activo = 1 AND
			f200_ind_cliente = 1 AND
			f200_ind_empleado = 0 AND
			f201_id_vendedor IS NOT NULL AND
			f201_id_lista_precio IS NOT NULL AND
			f200_nit NOT IN ('0284860063', 'FIN080207HV1') AND
			f201_id_vendedor NOT IN('9999', 'ABOG', 'ANT', 'INC')
ORDER BY	f201_rowid_tercero
GO