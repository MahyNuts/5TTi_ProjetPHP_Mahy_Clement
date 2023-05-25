<form action="" method="post">
    <h1>Avec qui voulez-vous discuter ?</h1>
    <?php foreach ($users as $user) : ?>
        <div class="nomDiscussion">
            <li>
                <a href="conversation?userId=<?= $user->userId ?>" style="width: 100%; height: 100%">
                    <?= $user->userPseudo ?>
                </a>
            </li>
        </div>
        
    <?php endforeach ?>
    
    
</form>