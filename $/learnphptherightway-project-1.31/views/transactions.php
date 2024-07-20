<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                

                    
                    <tr>
                <?php foreach ($date as $date_spec): ?>

                    <td><?=  $date_spec?></td>
                <?php endforeach ?>

                    <tr>

                    <tr>
                <?php foreach ($check_№ as $check_№_spec): ?>

                    <td><?=  $check_№_spec?></td>
                <?php endforeach ?>

                    <tr>

                    <tr>
                <?php foreach ($description as $description_spec): ?>

                    <td><?=  $description_spec?></td>
                <?php endforeach ?>

                    <tr>

                    <tr>
                <?php foreach ($nums as $nums_spec): ?>

                    <td><?=  $nums_spec?></td>
                <?php endforeach ?>

                    <tr>
                        
                    
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td><?php $total ?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><!-- YOUR CODE --></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><!-- YOUR CODE --></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
