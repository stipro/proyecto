SELECT
    T.*
FROM
    (
        SELECT
            ek.*,
            (
                SELECT
                    @total: = 0
            ),
            @entrada: = IF(
                ek.kardex_tipo = 'entrada',(ek.kardex_cantidad),(0)
            ) AS Entrada,
            @salida: = IF(
                ek.kardex_tipo = 'salida',(ek.kardex_cantidad),(0)
            ) AS Salida,
            CASE
                WHEN (
                    @explosivo = ''
                    OR @explosivo = ek.explosivo_id
                )
                AND ek.kardex_tipo = 'entrada' THEN @saldo: = @saldo + ek.kardex_cantidad
                WHEN (
                    @explosivo = ''
                    OR @explosivo = ek.explosivo_id
                )
                AND ek.kardex_tipo = 'salida' THEN @saldo: = @saldo - ek.kardex_cantidad
                WHEN @explosivo != ek.explosivo_id
                AND ek.kardex_tipo = 'entrada' THEN @saldo: = 0 + ek.kardex_cantidad
                WHEN @explosivo != ek.explosivo_id
                AND ek.kardex_tipo = 'salida' THEN @saldo: = 0 - ek.kardex_cantidad
            END AS Saldo,
            @explosivo: = ek.explosivo_id
        FROM
            (
                SELECT
                    (
                        SELECT
                            @saldo: = 0
                    ),
                    (
                        SELECT
                            @explosivo: = 0
                    ),
                    tk.*
                FROM
                    movimientos AS tk
            ) AS ek
            LEFT JOIN ingresos AS vlES ON ek.id_movimiento = vlES.movimiento_id
        ORDER BY
            ek.explosivo_id,
            ek.kardex_fechaRegistro,
            ek.kardex_nvale
    ) T