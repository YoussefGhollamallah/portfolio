<?php 

require_once "db/_database.php";

?>

<section class="contact-section">
    <h2>Contactez-moi</h2>
    <form class="contact-form" method="POST">
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="subject">Sujet</label>
            <input type="text" id="subject" name="subject" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" required></textarea>
        </div>

        <!-- Champ Honeypot caché -->
        <div style="display:none;">
            <label for="website">Website</label>
        </div>

<!-- Champ caché pour l'heure de début -->
<input type="hidden" name="start_time" value="<?php echo time(); ?>">

<button type="submit">Envoyer</button>
</form>
</section>