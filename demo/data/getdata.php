<?php
    require("GoogleChartsDataModel.php");

    $gmod = new GoogleChartDataModel();
    $gmod->add_column('x-axis', 'Eje X', "", 'string', "");
    $gmod->add_column('column2', 'Columna de muestra 2', "", 'number', "");
    $gmod->add_column('column3', 'Columna de muestra 3', "", 'number', "");
    $gmod->add_column('column4', 'Columna de muestra 4', "", 'number', "");

    $gmod->add_row('Mijo', 1,2,3);
    $gmod->add_row('Sternie', 4,5,6);
    $gmod->add_row('Tinieblas', 7,8,9);

    echo $gmod->render_json();
?>