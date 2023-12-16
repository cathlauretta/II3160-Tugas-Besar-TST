<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine List</title>
    <style>
        body {
            background: #00bcd4;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
        }

        h2 {
            text-align: center;
            color: #fff;
            margin: 20px 0;
        }

        form {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 10px;
            padding: 10px;
        }

        button {
            background-color: #ff5722;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        div {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        table {
            border-collapse: collapse;
            border: 3px solid #000;
            width: 80%;
            text-align: center;
            margin: 0 auto;
            background: linear-gradient(to right, #4dd7ec, #26a69a);
            border-radius: 10px;
            margin-top: -25px; /* Adjust this value to move the table upwards */
        }   

        th, td {
            padding: 15px;
            line-height: 1.6;
            border: 1px solid #000;
            color: #000;
        }

        th {
            background: linear-gradient(to right, #4cb8c4, #3cd3ad);
            color: #fff;
            font-size: 18px;
            border-bottom: 2px solid #000;
        }

        tr {
            border-bottom: 1px solid #000;
        }

        tr:nth-child(odd) {
            background: linear-gradient(to right, #dff3fa, #b6e1f3);
        }

        .empty-row td {
            height: 10px;
            background: #00bcd4;
            border: none;
            border-left: none;
            border-right: none;
        }

        .logout-button {
            margin-top: -50px; /* Adjust this value to move the table upwards */
            margin-right: 123px; /* Replace with desired default positioning */
            margin-bottom: 15px;
        }

        @media only screen and (min-zoom: 1.2) {
            .logout-button {
                margin-right: 10px; /* Adjust margin for zoomed-in state */
            }
        }

        .welcome-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="welcome-container">
        <h2 style="color: black;">Welcome, <?= session('user_data')['nim'] ?>!</h2>
    </div>

    <div style="display: flex; flex-direction: column; align-items: flex-end; padding: 10px;">
        <form action="/mahasiswa/logout" method="post">
            <button type="submit" class="logout-button" style="color: black;">Logout</button>
        </form>
        
        <table>
            <tr>
                <th style="color: black;">No</th>
                <th style="color: black;">Class Code</th>
                <th style="color: black;">Class Name</th>
                <th style="color: black;">SKS</th>
                <th style="color: black;">Index</th>
            </tr>

            <?php
            function printRows() {
                $totalScore = 0;
                $totalSKS = 0;

                for ($i = 1; $i <= 7; $i++) {
                    $classCode = "CS" . $i . "01";
                    $className = "Computer Science " . $i;
                    $sks = rand(3, 5);
                    $index = calculateIndex(rand(40, 100));

                    $totalScore += convertIndexTo4($index) * $sks;
                    $totalSKS += $sks;
                    
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $classCode . "</td>";
                    echo "<td>" . $className . "</td>";
                    echo "<td>" . $sks . "</td>";
                    echo "<td>" . $index . "</td>";
                    echo "</tr>";
                }

                return ($totalScore / $totalSKS);
            }

            $IP = printRows();


            echo '<tr class="empty-row">';
            echo '<td colspan="5"></td>';
            echo '</tr>';

            echo '<tr class="ip-row">';
            echo '<td colspan="2" style="background: #00bcd4;"></td>';
            echo '<td colspan="1" style="background: linear-gradient(to right, #ffc107, #ff8c00); font-weight: bold;">IP</td>';
            echo '<td colspan="2" style="background: linear-gradient(to right, #ffc107, #ff8c00); font-weight: bold;">' . number_format($IP, 2) . '</td>';
            echo '</tr>';

            echo '<tr class="ipk-row">';
            echo '<td colspan="2" style="background: #00bcd4;"></td>';
            echo '<td colspan="1" style="background: linear-gradient(to right, #ffc107, #ff8c00); font-weight: bold;">IPK</td>';
            echo '<td colspan="2" style="background: linear-gradient(to right, #ffc107, #ff8c00); font-weight: bold;">' . number_format($IP, 2) . '</td>';
            echo '</tr>';
            ?>

        </table>
    </div>
</body>
</html>