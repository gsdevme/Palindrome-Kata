<html>
<body>
<h1>Palindrome Solver</h1>

<?php if (isset($resultSet)): ?>
    <h2>Results</h2>
    <table id="results">

        <?php foreach ($resultSet as $result): ?>
            <tr>
                <td><?= $result['line'] ?></td>
                <td id="value"><?= ($result['result']) ? 'Y' : 'N' ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <hr/>
<?php endif; ?>

<form method="post" action="index.php">
    <textarea name="palindrome-text-area" cols="10" rows="10">
        5
        aa
        a
        hannah
        haha
        steve
    </textarea>
    <input type="submit" name="submit"/>
</form>
</body>
</html>
