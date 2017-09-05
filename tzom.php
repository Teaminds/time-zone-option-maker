<?php 
function timezonelist() {
    $time = time();
    $timezonelist = array();
    $timezoneidlist = timezone_identifiers_list();
    foreach ($timezoneidlist as $timezoneidlistkey => $timezoneidlistvalue) {
        date_default_timezone_set($timezoneidlistvalue);
        $timezonelist[$timezoneidlistkey]['gGMT'] = 'UTC/GMT ' . date('P', $time);
        $timezonelist[$timezoneidlistkey]['zone'] = $timezoneidlistvalue;
    }
    asort($timezonelist);
    foreach ($timezonelist as $timezonelistvalue) {
        $zone = $timezonelistvalue['zone'];
        $gGMT = $timezonelistvalue['gGMT'];
        echo "<option value='$zone'>$gGMT - $zone</option>";
    }
}

// Usage:
//
// <select name="timezone" id="timezone">
//    <option value="none">Choose your timezone</option>
//    <?php timezonelist() ?>
// </select>
?>
