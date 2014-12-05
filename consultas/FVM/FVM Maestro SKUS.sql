SELECT		DISTINCT 
			f121_rowid AS idSKU,
			LTRIM(RTRIM(f120_referencia)) AS Referencia,
			LTRIM(RTRIM(f121_id_ext1_detalle)) AS Color,
			LTRIM(RTRIM(f121_id_ext2_detalle)) AS Talla,
			ISNULL(dbFI.dbo.fnGetCriterioporReferencia(f121_rowid_item,7,3),0) AS idMarca,
			ISNULL(dbFI.dbo.fnGetCriterioporReferencia(f121_rowid_item,7,2),0) AS idTipoPrenda
FROM		dbFI.dbo.Mst_tblSkus A
INNER JOIN	unoee.dbo.t120_mc_items B 
        ON	b.f120_referencia = a.strReferencia
INNER JOIN	unoee.dbo.t121_mc_items_extensiones C
		ON	c.f121_rowid_item = b.f120_rowid AND
			c.f121_id_ext1_detalle = a.strColor AND
			c.f121_id_ext2_detalle = a.strTalla
INNER JOIN	unoee.dbo.t126_mc_items_precios d
		ON	b.f120_rowid = d.f126_rowid_item
WHERE		f120_id_cia = 7 AND
			f121_ind_estado = 1 AND
			f120_id_tipo_inv_serv = 'INV08'
ORDER BY	LTRIM(RTRIM(f120_referencia))
			