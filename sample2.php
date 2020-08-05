<?php

SET DATEFIRST 4     /* or use any other weird value to test it */
DECLARE @d DATETIME

SET @d = GETDATE()

SELECT
  @d ThatDate,
  DATEADD(dd, 0 - (@@DATEFIRST + 5 + DATEPART(dw, @d)) % 7, @d) Monday,
  DATEADD(dd, 6 - (@@DATEFIRST + 5 + DATEPART(dw, @d)) % 7, @d) Sunday

?>