<!-- Ejercicio 5.1. Riesgo de no escapar la salida (Pag. 73)-->

<!-- 
    ¿Qué tipo de problemas podría originar un ataque XSS (Cross-site Scripting) para los usuarios? 
    ¿Y para el sitio web? 
-->

<!-- 
    - Usuarios: Robo de información personal (Cuentas, cookies, etc), phishing, Robo de identidad (al poder robar las cookies podrían hacerse pasar
                por el usuario), daño financiero (Al poder acceder a sus datos y cuentas podrían usar tarjetas vinculadas, etc).
    - Web: Pérdida de confianza, reputación, propagación de malware aunque sea involuntario e incluso sanciones legales.

    En resumen, escapar siempre las salidas con htmlspecialchars(), el cual, sustituye los caracteres reservados en HTML por sus entidades
    correspondientes, de forma que dichos caracteres no se muestren y no puedan ejecutarse como código funcional.
-->