<?php

/**
 * TODO: move require_once for the database class here, with a relative path and remove
 * it from prenotazione.php
 *
 */
class HtmlGenerator {

  /**
   *
   */
  public static function reservationsTable($mail){
    global $days;
    //init db connection
    $instance = ConnectDb::getInstance();
    $pdo = $instance->getConnection();

    //get registered days
    $stmt = $pdo->prepare('SELECT * FROM iscrizione WHERE mail = :mail ');
    $stmt->execute(['mail' => $mail]);

    $tableHtml = "";
    $tableLength = 0;
    while ($row = $stmt->fetch()) {
      $tableLength++;
      $tableHtml .=
      "<tr>
        <td>" . $row['giorno'] . "</td>
        <td>" . $row['orario'] . "</td>
        <td> <button>cancella</button></td>
      <tr>";
    }

    if($tableLength === 0)
    {
      $output = "<p>non hai ancora prenotato un giorno</p>";
    }else
    {
      $output =
      "<table id=\"js-registered-table\">
      <tr>
        <th> giorno </th>
        <th> orario </th>
        <th> opzioni </th>
      </tr>". $tableHtml . "</table>";
    }
    return $output;
  }

  /**
   * this method generates a radio button list containing all the primary(non-nested) keys in the
   * days-config.php associative array
   * @return string - the html radio button elements
   * @template
   * <code>
   *  <label class="control control--radio">$KEY[]
   *    <input type="radio" name="radio" value="$KEY[]" checked="checked" />
   *    <div class="control__indicator"></div>
   *  </label>
   * </code>
   */
  public static function daysRadioList(){
    global $days;

    $output = "";
    $isFirstKey = true;
    foreach($days as $day => $hours){
      $checked = '';
      if($isFirstKey){
        $checked = 'checked="checked"';
        $isFirstKey = false;
      }
      $output .= '
      <label class="control control--radio">' . $day . '
        <input type="radio" name="radio" value="' . $day . '" ' . $checked . '/>
        <div class="control__indicator"></div>
      </label>';
    }
    return $output;
  }

  /**
   * this method returns a list of tables, one for each primary key, containing
   * all the aviable days.
   * @return string - the html tables containing the aviable days
   * @template
   * <code>
   *  <table value="$DAY[]" class="hidden hours-container half right-big">
   *    <tr>
   *    <td>$HOUR[]</td>
   *    <td> <button>prenota</button></td> 
   *    </tr>
   *    <tr>
   *    <td>$HOUR[]</td>
   *    <td> <button>prenota</button></td>
   *    </tr>
   *  </table>
   *
   * </code>
   */
  public static function hoursTables(){
    global $days;
    //create db connection
    $instance = ConnectDb::getInstance();
    $pdo = $instance->getConnection();

    $daysInfo = $days;
    //set to false the hours that are already registered in the database
    $stmt = $pdo->query('SELECT giorno, orario FROM iscrizione limit 200');
    while ($row = $stmt->fetch())
    {
      $daysInfo[$row['giorno']][$row['orario']] = false;
    }

    //create the html to display the days
    $output = "";
    $isFirstKey = true;
    foreach($daysInfo as $day => $hours)
    {
      $hidden = "hidden";
      if($isFirstKey){
        $isFirstKey = false;
        $hidden = "";
      }
      $output .= "<table value=\"$day\" class=\" $hidden hours-container half right-big\">";
      foreach($hours as $hour => $free)
      {
        $class = $free ? "free" : "taken";
        $button = $free ? "<button>prenota</button>" : "";
        $output .= "
        <tr class=\"$class\">
        <td>$hour</td>
        <td>$button</td> 
        </tr>";

      }
      $output .= '</table>';
    }
    return $output;
  }


}


