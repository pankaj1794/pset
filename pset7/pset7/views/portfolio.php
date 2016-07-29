
<table style="border: 2px solid black;margin: 0px auto;">
<tr style="text-align:center; border: 2px solid black;">
    <th style="text-align:center; border: 2px solid black;">Symbol</th>
        <th style="text-align:center; border: 2px solid black;">Shares</th>
            <th style="text-align:center; border: 2px solid black;">Prices per Share</th>
            <th style="text-align:center; border: 2px solid black;">Total Price</th>
                
</tr>
<?php foreach ($positions as $position): ?>

    <tr style="text-align:center; border: 2px solid black;">
        <td style="text-align:center; border: 2px solid black;"><?= $position["symbol"] ?></td>
        <td style="text-align:center; border: 2px solid black;"><?= $position["shares"] ?></td>
        <td style="text-align:center; border: 2px solid black;">$<?= number_format($position["price"],2,'.','') ?></td>
        <td style="text-align:center; border: 2px solid black;">$<?= number_format($position["shares"]*number_format($position["price"],2,'.',''),2,'.','') ?></td>
        
    </tr>
    
    
<?php endforeach ?>

</table>
<h3>you have $<?= number_format($cash,2,'.','') ?> in your wallet!</h3>
<img src="img/stock.jpg" width="600" height="300" alt="stock prices go like this!"/>