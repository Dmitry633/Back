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
                

                <?php for ($i=0; $i <count($date); $i++): ?>
                    <tr>
                        <td> <?=  date('M j,Y',strtotime($date[$i]))?></td>
                        <td> <?=  $check_№[$i]?></td>
                        <td> <?=  $description[$i]?></td>
                            <?php if ($nums[$i] < 0): ?>
                            <td style = 'color: red'> 
                            <?php  else : ?>
                            <td style= 'color: green'> 
                            <?php endif?>
                            <?=  $nums[$i]?>
                        </td>
                    <tr>
                <?php endfor?>
                    
                <!-- <?php foreach ($date as $date_spec): ?>
                    <tr>

                    <td><?=  $date_spec?></td>
                    <tr>

                <?php endforeach ?>


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
                         -->
                    
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                        <td><?= $income ?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><?= $expense ?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><?= $total ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
