-- CRITERIO DE MAESTRO CATEGORIAS
SELECT	f206_id as idCategoria,
		f206_descripcion as DescCategoria
FROM	unoee.dbo.t206_mm_criterios_mayores
WHERE	f206_id_cia= 7 AND
		f206_id_plan = '002'
GO