USE [dbFI]
GO
/****** Object:  UserDefinedFunction [dbo].[fnGetCriterioSucursal]    Script Date: 02/21/2014 14:40:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

-- =============================================================================
-- =============================================================================
CREATE FUNCTION [dbo].[fnGetCriterioSucursal] (@idTercero numeric(20,0),@strSucursal varchar(3),@strPlan varchar(3),@idCia int)

RETURNS numeric(10,0)
AS
BEGIN

	DECLARE		@idCriterio nvarchar(3)

			
	SELECT		@idCriterio = f207_id_criterio_mayor
	FROM		unoee.dbo.t207_mm_criterios_clientes B
	WHERE		B.f207_rowid_tercero = @idTercero AND
				B.f207_id_sucursal = @strSucursal AND
				B.f207_id_plan_criterios = @strPlan AND
				B.f207_id_cia = @idCia
	
	RETURN @idCriterio

END




--USE [dbFI][dbFI]
