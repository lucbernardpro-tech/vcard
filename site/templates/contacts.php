<?php snippet('header') ?>
<?php snippet('layouts', ['field' => $page->layout()]) ?>
<section class="contacts-section">
  <h2 class="contacts-section-title">
    <span class="material-symbols-outlined section-icon">contacts</span>
    Contacts
  </h2>
  <div class="contacts-grid">
    <?php foreach ($page->children()->listed() as $contact): ?>
      <?php snippet('contact', ['contact' => $contact]) ?>
    <?php endforeach ?>
  </div>
</section>

<?php snippet('footer') ?>
