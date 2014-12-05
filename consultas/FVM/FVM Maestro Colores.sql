--Maestro Colores
SELECT	DISTINCT 
		ltrim(rtrim(f117_id)) AS idColor,
        f117_descripcion AS Color
FROM	unoee.dbo.t117_mc_extensiones1_detalle INNER JOIN unoee.dbo.t116_mc_extensiones1
												  ON (f117_id_cia = f116_id_cia AND f117_id_extension1 = f116_id)
											   INNER JOIN unoee.dbo.t121_mc_items_extensiones
											      ON (f117_id_cia = f121_id_cia AND f117_id_extension1 = f121_id_extension1 AND f117_id = f121_id_ext1_detalle)
											   INNER JOIN unoee.dbo.t120_mc_items
												  ON (f117_id_cia = f120_id_cia AND f121_rowid_item = f120_rowid)
WHERE	f117_id_cia = 7 AND
		f120_id_tipo_inv_serv = 'INV08' AND
		ltrim(rtrim(f117_id)) NOT IN ('000')
GO