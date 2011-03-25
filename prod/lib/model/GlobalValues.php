<?php 
/**
 * 
 * Constantes de uso frecuente
 * 
 */
class GlobalValues
{
    /* formato de fecha para formularios */
    const formatoFecha = '%day% - %month% - %year%';
    
    /* formate combo fecha filtros */
    const formatoComboFechaFiltro = 'desde %from_date% <br/> hasta %to_date%';

    /* (array) rango para busquedas de personas */
    public static function rangoFechaNacimiento() { return range( date('Y') , date('Y') - 100 ); }

    /* (array) rango para busquedas de scouting */
    public static function rangoFechaScouting()   { return range( date('Y') , 2004 );  }


    public static function widgetFechaNacimiento()
    {
        $rangoAnios = new sfWidgetFormDate();
        $rangoAnios->setOption( 'years' , self::rangoFechaNacimiento() );
        $rangoAnios->setOption( 'format', self::formatoFecha );
        
        return $rangoAnios; 
    }

    public static function widgetFechaScouting()
    {
        $rangoAnios = new sfWidgetFormDate();
        $rangoAnios->setOption( 'years' , self::rangoFechaScouting() );
        $rangoAnios->setOption( 'format', self::formatoFecha );
        
        return $rangoAnios; 
    }

}
?>
