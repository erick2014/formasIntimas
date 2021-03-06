USE [dbFI]
GO
/****** Object:  UserDefinedFunction [dbo].[fnGetClienteSucursal]    Script Date: 02/21/2014 14:39:34 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

-- =======================================================
-- =======================================================
CREATE FUNCTION [dbo].[fnGetClienteSucursal] 
(
	@idCliente int,			--Referencia a consultar
	@idCompania int			--Compañia que se va a consultar a la cual pertenece la referencia
)
RETURNS INT
AS
BEGIN
	DECLARE @resultado INT

	SELECT		@resultado = numID
	FROM		unoee.dbo.t200_mm_terceros
	INNER JOIN	unoee.dbo.t201_mm_clientes
			ON	f201_rowid_tercero = f200_rowid
	INNER JOIN	dbFI.dbo.Mst_tblClientes
			ON	LTRIM(RTRIM(f200_nit)) = LTRIM(RTRIM(strIdentificacion))
	WHERE		f200_id_cia = @idCompania AND
				f201_ind_estado_activo = 1 AND
				--f201_id_sucursal = '000' AND
				strSucursal IS NULL AND
				f200_rowid = @idCliente
	
	RETURN @resultado

END
