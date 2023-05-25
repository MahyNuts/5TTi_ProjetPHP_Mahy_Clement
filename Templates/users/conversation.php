<form action="" method="post" class="flex justify-content-center text-align-center" action="" method="post">
    <!-- <?php foreach ($messages as $message) : ?>
        <li>
                <?= $message->messageText ?>
        </li>
    <?php endforeach ?> -->
    <fieldset class="formulaire">

        <legend>Conversation</legend>
    </fieldset>
    <fieldset class="formulaire">
        <legend>Envoyer un message</legend>
        <div>
            <textarea name="message" id="" cols="30" rows="10" style="width: 100%; height: 60px"></textarea>
        </div>
        <button name="envoieMessage">Envoyer</button>
    </fieldset>
        

    
</form>