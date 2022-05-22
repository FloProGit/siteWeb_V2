<div id="container">

    <form action="<?php echo HOST ?>login" method="POST">
        <h1>Login Admin</h1>
        <?php 
        if($data !== '')
        {
        ?>
        <p style="color: red;"><?= $data ?></p>
        <?php }?>
        <label><b>mail</b></label>
        <input type="text" placeholder="Enter Votre userName" name="username" >
        <label><b>Mot de passe </b></label>
        <input type="password" placeholder="Enter Votre mot de passe" name="password" require>
        <input type="submit" id='submit' value='LOGIN'>
    </form>
</div>