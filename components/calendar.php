<div class="card bg-light mb-3 mx-2 w-50 d-flex text-center">
    <div class="card-body d-flex justify-content-center flex-column h-100 text-center">
      <br>
        <table class="table table-style table-responsive tb-small mx-auto text-center">
        <tbody class="mx-auto">
          <tr>
            <th colspan="2"><a href="?ym=<?php echo $prev; ?>"><span class="glyphicon glyphicon-chevron-left"></span></a></th>
            <th colspan="3"> May - 2019<!--?php echo $html_title; ?--></th>
            <th colspan="2"><a href="?ym=<?php echo $next; ?>"><span class="glyphicon glyphicon-chevron-right"></span></a></th>
          </tr>
          
          <tr>
            <th>S</th>
            <th>M</th>
            <th>T</th>
            <th>W</th>
            <th>T</th>
            <th>F</th>
            <th>S</th>
          </tr>
          <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
          </tr>
          <tr>
            <td>8</td>
            <td>9</td>
            <td>10</td>
            <td>11</td>
            <td class="today">12</td>
            <td>13</td>
            <td>14</td>
          </tr>
          <tr>
            <td>15</td>
            <td>16</td>
            <td>17</td>
            <td>18</td>
            <td>19</td>
            <td>20</td>
            <td>21</td>
          </tr>
           <tr>
            <td>22</td>
            <td>23</td>
            <td>24</td>
            <td>25</td>
            <td>26</td>
            <td>27</td>
            <td>28</td>
          </tr>
            <tr>
            <td>29</td>
            <td>30</td>
            <td>31</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          </tbody>
          <!--?php
            foreach ($weeks as $week) {
              echo $week;
            };
          ?-->
        </table>

        </div>
  </div>

  
  
  
  
  
  
  
  
  
  
  
  
  
   <!-- <?php
// Set your timezone!!
date_default_timezone_set('Australia/Melbourne');

// Get prev & next month
if (isset($_GET['ym'])) {
	$ym = $_GET['ym'];
} else {
	// This month
	$ym = date('Y-m');
}

// Check format
$timestamp = strtotime($ym,"-01");
if ($timestamp === false) {
	$timestamp = time();
}

// Today
$today = date('Y-m-j', time());

// For H3 title
$html_title = date('M - Y', $timestamp);

// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

// Number of days in the month
$day_count = date('t', $timestamp);

// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));


// Create Calendar!!
$weeks = array();
$week = '';

// Add empty cell
$week .= str_repeat('<td></td>', $str);

for ( $day = 1; $day <= $day_count; $day++, $str++) {

	$date = $ym.'-'.$day;

	if ($today == $date) {
		$week .= '<td class="today">'.$day;
	} else {
		$week .= '<td>'.$day;
	}
	$week .= '</td>';

	// End of the week OR End of the month
	if ($str % 7 == 6 || $day == $day_count) {

		if($day == $day_count) {
			// Add empty cell
			$week .= str_repeat('<td></td>', 6 - ($str % 7));
		}

		$weeks[] = '<tr>'.$week.'</tr>';

		// Prepare for new week
		$week = '';

	}

}

?>-->