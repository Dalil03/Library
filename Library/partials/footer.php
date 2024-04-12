<footer>
    <div class="status">
    <p class="connected"> Vous êtes : <?php echo (isset($_COOKIE['connected']) && $_COOKIE['connected'] == 1) ? 'connecté' : 'déconnecté'; ?>
    <img src="<?php echo (isset($_COOKIE['connected']) && $_COOKIE['connected'] == 1) ? 'assets/status-connected.svg' : 'assets/status-disconnected.svg'; ?>" class="status-image" alt="">
    </p>
    </div>
</footer>