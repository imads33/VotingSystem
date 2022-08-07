<form method='post'>
    <div class="field">
        <label class="label">Birth Date</label>
        <div class="control has-icons-left has-icons-right">
            <input name="date" class="input" type="date" required>
            <span class="icon is-small is-left">
                <i class="fa-solid fa-calendar-days"></i>
            </span>
        </div>
        <button type="submit" name='submit'>submit</button>
    </div>
</form>

<?php
if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    echo $date . '</br>';
    
    echo $date;
}
?>