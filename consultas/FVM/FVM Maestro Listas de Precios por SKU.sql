SELECT		f126_id_lista_precio,
			f120_referencia,
			f121_id_ext1_detalle,
			f121_id_ext2_detalle,
			f126_precio
FROM		unoee.dbo.t120_mc_items
INNER JOIN	unoee.dbo.t121_mc_items_extensiones
		ON	f120_rowid = f121_rowid_item AND f120_id_cia = f121_id_cia
INNER JOIN	unoee.dbo.t126_mc_items_precios
		ON	(f126_id_cia = f120_id_cia AND (f120_rowid = f126_rowid_item OR f121_rowid = f126_rowid_item_ext))
WHERE		f120_id_tipo_inv_serv = 'INV08' AND
			f126_id_lista_precio NOT IN ('012','05','07','070','122','137','141','157','161','167','202','203','204','205','206','207','208','209','300','304','305') AND
			f120_id_cia = 7 AND
			f121_ind_estado = 1
ORDER BY	f126_id_lista_precio