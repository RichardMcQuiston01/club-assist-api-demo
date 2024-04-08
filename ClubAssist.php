<?php

class ClubAssist
{
  private static $baseUrl = 'https://camfid.clubassist.com/api';
  private static $userId = '1234567891';
  private static $clubId = '14';

//  public static function get( $key )
//  {
//    return ( property_exists( self::$$key ) ) ? self::$$key : -1;
//  }
//
//  public static function set( $key, $value )
//  {
//    if ( property_exists( self::$$key ) ) {
//      self::$$key = $value;
//    }
//  }

  public static function get_request( $url, $params )
  {
    $fullUrl = self::$baseUrl . $url;
    $params = http_build_query( $params );
    $fullUrl .= '?' . $params;

    return json_decode( file_get_contents( $fullUrl ) );
  }

  public static function get_makes()
  {
    return self::get_request( '/Toolbox/GetMakes', [
      'userid'    => self::$userId,
      'versionId' => 0,
    ] );
  }

  public static function get_models( $make = "" )
  {
    return self::get_request( '/Toolbox/GetModels', [
      'userid'    => self::$userId,
      'versionId' => 4,
    ] );
  }

  public static function get_years( $make, $model )
  {
    return self::get_request( '/GetYears', [
      'userid' => self::$userId,
      'make'   => $make,
      'model'  => $model,
    ] );
  }

  public static function get_engines( $make, $model, $year )
  {
    return self::get_request( '/GetEngines', [
      'userid' => self::$userId,
      'make'   => $make,
      'model'  => $model,
      'year'   => $year,
    ] );
  }

  public static function get_batteries( $make, $model, $year, $engine, $zip )
  {
    return self::get_request( '/GetBatteries_Traditional', [
      'iUserId'    => self::$userId,
      'smCarMake'  => $make,
      'smCarModel' => $model,
      'imCarYear'  => $year,
      'sEngine'    => $engine,
      'iZipCode'   => $zip,
      'iClubID'    => self::$clubId,
    ] );
  }
}
