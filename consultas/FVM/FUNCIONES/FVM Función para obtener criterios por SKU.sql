USE [dbFI]
GO
/****** Object:  UserDefinedFunction [dbo].[fnGetCriterioporReferencia]    Script Date: 02/21/2014 14:48:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

--SELECT dbo.fnGetCriterioporReferencia(4110,7,2)

-- =======================================================
-- Author:		<Yohan Restrepo>
-- Create date: <2014-02-19>
-- Description:	<Obtiene el ID de tipo prenda de una referencia dada>
-- =======================================================
ALTER FUNCTION [dbo].[fnGetCriterioporReferencia] 
(
	@referencia int,		 --Referencia a consultar
	@idCompania int,		 --Compañia que se va a consultar a la cual pertenece la referencia
	@idPlan int              --Plan de criterio
	                            --Tipo Prenda = 2
	                            --Marca		  = 3	
)
RETURNS INT
AS
BEGIN
	DECLARE @resultado INT

	SELECT	DISTINCT 
			@resultado = f106_id
	FROM	unoee.dbo.t125_mc_items_criterios 						
									INNER JOIN unoee.dbo.t106_mc_criterios_item_mayores
										ON (f125_id_cia = f106_id_cia AND f125_id_plan = f106_id_plan AND f125_id_criterio_mayor = f106_id)
									INNER JOIN unoee.dbo.t105_mc_criterios_item_planes
										ON (f106_id_cia = f105_id_cia AND f106_id_plan = f105_id)
	WHERE	f125_id_cia = @idCompania AND
			f106_id_plan = @idPlan and
			f125_rowid_item = @referencia
	
	RETURN @resultado

END
