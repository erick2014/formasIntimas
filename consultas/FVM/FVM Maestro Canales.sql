-- CRITERIO DE MAESTRO CANALES
-- Para el dispositivo m�vil debe ser s�lo:
-- Tradicional
-- Moderno
-- Exterior   			
SELECT	f206_id as idCanal,
		f206_descripcion as DescCanal
FROM	unoee.dbo.t206_mm_criterios_mayores
WHERE	f206_id_cia= 7 AND
		f206_id_plan = '001' AND
		f206_id IN ('001','002','003')