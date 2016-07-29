
<table style="border: 2px solid black;margin: 0px auto;">
<tr style="text-align:center; border: 2px solid black;">
    <th style="text-align:center; border: 2px solid black;">Transcation</th>
        <th style="text-align:center; border: 2px solid black;">Symbol</th>
            <th style="text-align:center; border: 2px solid black;">Price</th>
            <th style="text-align:center; border: 2px solid black;">Shares</th>
            <th style="text-align:center; border: 2px solid black;">Date/Time</th>
                
</tr>
<?php foreach ($positions as $position): ?>

    <tr style="text-align:center; border: 2px solid black;">
        <td style="text-align:center; border: 2px solid black;"><?= $position["transcation"] ?></td>
        <td style="text-align:center; border: 2px solid black;"><?= $position["symbol"] ?></td>
        <td style="text-align:center; border: 2px solid black;">$<?= number_format($position["price"],2,'.','') ?></td>
        <td style="text-align:center; border: 2px solid black;"><?= $position["shares"] ?></td>
        <td style="text-align:center; border: 2px solid black;"><?= $position["datetime"] ?></td>
        
    </tr>
    
    
<?php endforeach ?>

</table>
