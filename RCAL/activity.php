<?php
include_once 'topbar.php';
include_once 'getActivity.php';
?>
<html>
    <head>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 3px solid #44CC1E;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #B3ECA4;
            }
        </style>
    </head>
    <body>
        <h2 align="center"> Activities List</h2>
        <table>
            <tr>
                <th>Activity Name</th>
                <th>Category</th>
                <th>Activity Type</th>
                <th>Difficulty</th>
                <th>Discription</th>
                <th>Feedback</th>
            </tr>
            <?php
            while ($row = mysql_fetch_array($result)) {
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>