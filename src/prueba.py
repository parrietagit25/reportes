for index, row in df.iterrows():

    nis_actual = int(row[0])
    
    # Obtener los valores de cada columna para el registro actual

    # obtener la ultima fecha, el primer sec_cargo

    cur.execute("SELECT min(sec_cargo) as minimo_sec FROM cargvar WHERE programa like '%@%' and co_Cargo='VA621' and nis_rad = :nis_rad ", {'nis_rad': nis_actual})
    primer_sec_cargo = cur.fetchall()

    for sec_cargo in primer_sec_cargo:
        sc = sec_cargo[0]
        ult = sc-1
    for i in range(ult, 0, -1):
        cur.execute("SELECT max(f_prod_inic) FROM  cargvar WHERE nis_rad = :nis_rad and sec_cargo = :sc and est_act in('EV001', 'EV006')", {'nis_rad': nis_actual, 'sc':i})
        fecha_ult = cur.fetchall()
        for fecha_ul in fecha_ult:
            con_f = fecha_ul[0]
            
            if con_f is None:
                continue
            else:
                fecha_ultima = con_f
                break
        
    #print("mes del f_pro_ini desde el excel -> ", fecha_ultima.month, fecha_ultima)
    #print("fecha ", fecha_ultima)

    cur.execute("SELECT MAX(COUNT(f_prod_inic)) FROM cargvar WHERE programa like '%@%' and nis_rad = :nis_rad AND co_cargo = 'VA621' GROUP BY f_prod_inic", {'nis_rad': nis_actual})
    contar_max = cur.fetchall()

    for contar in contar_max:
        las_cuotas_total = contar[0]

    f_prod_inic = fecha_ultima.replace(day=1)

    cur.execute("SELECT sec_cargo, f_prod_inic FROM (SELECT sec_cargo, f_prod_inic FROM cargvar WHERE nis_rad = :nis_rad and est_act = 'EV002' and co_cargo = 'VA621' ORDER BY sec_cargo) WHERE ROWNUM <= :numero_cuotas_reparar", {'nis_rad': nis_actual, 'numero_cuotas_reparar': las_cuotas_total})
    registros = cur.fetchall()
    for registro in registros:
        sec_cargo = registro[0]

        if f_prod_inic.month == 12:
            f_prod_inic = f_prod_inic.replace(month=1, year=f_prod_inic.year+1)
        else:
            f_prod_inic = f_prod_inic.replace(month=f_prod_inic.month+1)
        
        cur.execute("UPDATE cargvar SET f_prod_inic = :f_prod_inic, programa = 'INC000014396758', usuario = user, f_actual= '24/04/2023' WHERE sec_cargo = :sec_cargo AND nis_rad = :nis_rad", {'f_prod_inic': f_prod_inic, 'sec_cargo': sec_cargo, 'nis_rad': nis_actual})
        print("Registros fproini->  %s  sec_cargo -> %s nis_rad -> %s", f_prod_inic, sec_cargo, nis_actual)
    n=n+1
    #print