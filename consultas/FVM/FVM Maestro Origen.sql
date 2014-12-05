--	CRITERIO DE MAESTRO ORIGEN
--	Determina si el cliente es nacional o del exterior
--  CLIENTE NACIONAL 
--	CLIENTE DEL EXTERIOR
SELECT	f206_id as idOrigen,
		f206_descripcion as DescOrigen
FROM	unoee.dbo.t206_mm_criterios_mayores
WHERE	f206_id_cia= 7 AND
		f206_id_plan = 'ORI'
GO