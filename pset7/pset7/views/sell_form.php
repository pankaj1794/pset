<table style="border: 2px solid black;margin: 0px auto;">
<tr style="text-align:center; border: 2px solid black;">
    <th style="text-align:center; border: 2px solid black;">Symbol</th>
        <th style="text-align:center; border: 2px solid black;">Shares</th>
            <th style="text-align:center; border: 2px solid black;">Prices per Share</th>
            <th style="text-align:center; border: 2px solid black;">Total Price</th>
                
</tr>
<?php foreach ($info as $inf): ?>

    <tr style="text-align:center; border: 2px solid black;">
        <td style="text-align:center; border: 2px solid black;"><?= $inf["symbol"] ?></td>
        <td style="text-align:center; border: 2px solid black;"><?= $inf["shares"] ?></td>
        <td style="text-align:center; border: 2px solid black;">$<?= number_format($inf["price"],2,'.','') ?></td>
        <td style="text-align:center; border: 2px solid black;">$<?= $inf["shares"] * number_format($inf["price"],2,'.','') ?></td>
    </tr>
    
    
<?php endforeach ?>

</table>
<br>



<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="symbol" placeholder="Symbol of Stock to sell" type="text"/>
        </div>
        
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Sell 
            </button>
        </div>
    </fieldset>
</form>

