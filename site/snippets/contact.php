<a class="contact-card" href="<?= $contact->url() ?>">
  <div class="contact-card-avatar">
    <?php if ($image = $contact->downloadscontact()->toFile()): ?>
      <div class="contact-card-photo" style="background-image: url('<?= $image->url() ?>')"></div>
    <?php else: ?>
      <div class="contact-card-photo contact-card-photo--empty">
        <span class="material-symbols-outlined">person</span>
      </div>
    <?php endif ?>
  </div>
  <div class="contact-card-info">
    <h2><?= $contact->prenomcontact()->esc() ?> <?= $contact->nomcontact()->esc() ?></h2>
    <?php if ($contact->titlecontact() != ''): ?>
      <p class="contact-card-title"><?= $contact->titlecontact()->esc() ?></p>
    <?php endif ?>
    <?php if ($contact->orgacontact() != ''): ?>
      <p class="contact-card-org"><?= $contact->orgacontact()->esc() ?></p>
    <?php endif ?>
  </div>
  <span class="contact-card-arrow material-symbols-outlined">arrow_forward</span>
</a>
