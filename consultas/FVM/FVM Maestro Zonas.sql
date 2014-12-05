-- CRITERIO DE MAESTRO ZONAS
SELECT	f206_id as idZona,
		f206_descripcion as DescZona
FROM	unoee.dbo.t206_mm_criterios_mayores
WHERE	f206_id_cia= 7 AND
		f206_id_plan = 'ZON'
GO