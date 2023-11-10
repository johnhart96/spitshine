<?php
require_once 'inc/functions.php';
?>
<html>
    <head>
        <title>Spit Shine</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php require_once 'inc/title.php'; ?>
        <div id="list">
            <table width="100%" id="list_table">
                <thead id="list_head">
                    <tr>
                        <th>Room</th>
                        <th width="50%">Task</th>
                        <th>Frequency</th>
                        <th>Due</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $getTasks = $db->query( "SELECT * FROM `tasks` ORDER BY `room` ASC" );
                    while( $task = $getTasks->fetch( PDO::FETCH_ASSOC ) ) {
                        echo "<tr>";
                        echo "<td>" . ucfirst( $task['room'] ) . "</td>";
                        echo "<td>" . ucfirst( $task['task'] ) . "</td>";
                        echo "<td>" . ucfirst( $task['frequency'] . " days" ) . "</td>";
                        // due
                        $today = time();
                        $due = strtotime( $task['due'] );
                        $diff = $due - $today;
                        (int)$result = round( $diff / (60 * 60 * 24 ) );
                        if( $result == 1 ) {
                            echo "<td class='red'>Tomorrow</td>";
                        } else if( $result < 8 ) {
                            echo "<td class='amber'>" . $result . " days</td>";
                        } else {
                            echo "<td class='green'>" . $result . " days</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php require_once 'inc/menu.php'; ?>
    </body>
</html>