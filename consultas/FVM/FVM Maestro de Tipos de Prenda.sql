--MAESTRO CRITERIOS CLASIFICACI�N ITEMS 
--MAESTRO DE TIPOS DE PRENDA
SELECT	DISTINCT
		f106_id as idTipoPrenda,
		f106_descripcion as DescTipoPrenda
FROM	unoee.dbo.t120_mc_items INNER JOIN unoee.dbo.t125_mc_items_criterios
									ON (f120_rowid = f125_rowid_item AND f120_id_cia = f125_id_cia)
								INNER JOIN dbFI.dbo.Mst_tblSkus
								    ON (f120_referencia = strReferencia)
								INNER JOIN unoee.dbo.t106_mc_criterios_item_mayores
									ON (f125_id_cia = f106_id_cia AND f125_id_plan = f106_id_plan AND f125_id_criterio_mayor = f106_id)
								INNER JOIN unoee.dbo.t105_mc_criterios_item_planes
									ON (f106_id_cia = f105_id_cia AND f106_id_plan = f105_id)
WHERE	f120_id_cia = 7 AND
		f120_id_tipo_inv_serv = 'INV08' AND
		f106_id_plan = 2
ORDER BY f106_id
GO