-- CRITERIO DE MAESTRO SUBCATEGORIA
SELECT	f206_id as idSubcategoria,
		f206_descripcion as DescSubcategoria
FROM	unoee.dbo.t206_mm_criterios_mayores
WHERE	f206_id_cia= 7 AND
		f206_id_plan = '003'
GO