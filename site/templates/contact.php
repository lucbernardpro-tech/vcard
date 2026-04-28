<?php snippet('header') ?>

<aside>
  <div class="profile-card">

    <div class="avatar-container">
      <?php if ($image = $page->downloadscontact()->toFile()): ?>
        <div class="avatar" style="background-image: url('<?= $image->url() ?>');" loading="lazy"></div>
      <?php else: ?>
        <div class="avatar avatar--empty">
          <span class="material-symbols-outlined">person</span>
        </div>
      <?php endif ?>
      <div class="status-indicator"></div>
    </div>

    <div class="profile-info">
      <h1><?= $page->prenomcontact()->esc() ?> <?= $page->nomcontact()->esc() ?></h1>
      <?php if ($page->titlecontact() != ''): ?>
        <p class="job-title"><?= $page->titlecontact()->esc() ?></p>
      <?php endif ?>
      <?php if ($page->orgacontact() != ''): ?>
        <p class="org"><?= $page->orgacontact()->esc() ?></p>
      <?php endif ?>
    </div>

    <div class="action-buttons">

      <fieldset>
        <button class="btn btn-primary" id="downloadEl">
          <span class="material-symbols-outlined">person_add</span>
          Enregistrer le contact
        </button>

        <!-- Hidden inputs used by vCard JS -->
        <input type="text" id="cardInfoEl" value="<?= esc(preg_replace('/[^a-zA-Z0-9\s]/', '', $page->prenomcontact())) ?> <?= $page->nomcontact()->esc() ?>" hidden disabled />
        <input type="text" id="emailEl"   value="<?= $page->emailcontact()->esc() ?>"   hidden disabled />
        <input type="text" id="nameEl"    value="<?= $page->prenomcontact()->esc() ?> <?= $page->nomcontact()->esc() ?>" hidden disabled />
        <input type="text" id="orgEl"     value="<?= $page->orgacontact()->esc() ?>"    hidden disabled />
        <input type="text" id="titleEl"   value="<?= $page->titlecontact()->esc() ?>"   hidden disabled />
        <input type="text" id="telEl"     value="<?= $page->mobilecontact()->esc() ?>"  hidden disabled />
        <input type="text" id="addressEl" value="<?= $page->adrprocontact()->esc() ?>"  hidden disabled />
        <input type="file" id="fileEl" hidden disabled />
        <?php if ($image = $page->downloadscontact()->toFile()): ?>
          <img id="previewEl" src="<?= $image->url() ?>" width="100" hidden alt="" />
        <?php else: ?>
          <img id="previewEl" src="" width="100" hidden alt="" />
        <?php endif ?>
      </fieldset>

      <?php if ($page->emailcontact() != ''): ?>
        <a class="btn btn-outline" href="mailto:<?= $page->emailcontact()->esc() ?>">
          <span class="material-symbols-outlined">mail</span>
          Mail
        </a>
      <?php endif ?>

      <?php if ($page->rdvcontact() != ''): ?>
        <a class="btn btn-primary" href="<?= $page->rdvcontact()->esc() ?>">
          <span class="material-symbols-outlined">calendar_today</span>
          Prendre rendez-vous
        </a>
      <?php endif ?>

    </div>

    <?php if ($page->sectioncontact() != ''): ?>
      <div class="profile-section">
        <p><?= $page->sectioncontact()->esc() ?></p>
      </div>
    <?php endif ?>

  </div>
</aside>


<div class="content-area">

  <section>
    <h2>
      <span class="material-symbols-outlined section-icon">bolt</span>
      Actions rapides
    </h2>
    <div class="actions-grid">

      <?php if ($page->mobilecontact() != ''): ?>
        <a class="action-item" href="tel:<?= $page->mobilecontact()->esc() ?>">
          <div class="action-content">
            <div class="icon-box"><span class="material-symbols-outlined">call</span></div>
            <div class="action-text">
              <p>Mobile</p>
              <p><?= $page->mobilecontact()->esc() ?></p>
            </div>
          </div>
          <span class="material-symbols-outlined" style="color: rgba(255,255,255,0.2)">chevron_right</span>
        </a>
      <?php endif ?>

      <?php if ($page->fixecontact() != ''): ?>
        <a class="action-item" href="tel:<?= $page->fixecontact()->esc() ?>">
          <div class="action-content">
            <div class="icon-box"><span class="material-symbols-outlined">phone</span></div>
            <div class="action-text">
              <p>Fixe</p>
              <p><?= $page->fixecontact()->esc() ?></p>
            </div>
          </div>
          <span class="material-symbols-outlined" style="color: rgba(255,255,255,0.2)">chevron_right</span>
        </a>
      <?php endif ?>

      <?php if ($page->siteinternetcontact() != ''): ?>
        <a class="action-item" style="grid-column: 1 / -1;" href="<?= $page->siteinternetcontact()->esc() ?>">
          <div class="action-content">
            <div class="icon-box"><span class="material-symbols-outlined">language</span></div>
            <div class="action-text">
              <p>Site Internet</p>
              <p><?= $page->siteinternetcontact()->esc() ?></p>
            </div>
          </div>
          <span class="material-symbols-outlined" style="color: rgba(255,255,255,0.2)">open_in_new</span>
        </a>
      <?php endif ?>

      <?php if ($page->linkedincontact() != ''): ?>
        <a class="action-item" style="grid-column: 1 / -1;" href="<?= $page->linkedincontact()->esc() ?>">
          <div class="action-content">
            <div class="icon-box">
              <svg fill="currentColor" height="24" viewBox="0 0 24 24" width="24" aria-hidden="true">
                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
              </svg>
            </div>
            <div class="action-text">
              <p>LinkedIn</p>
              <p><?= $page->linkedincontact()->esc() ?></p>
            </div>
          </div>
          <span class="material-symbols-outlined" style="color: rgba(255,255,255,0.2)">open_in_new</span>
        </a>
      <?php endif ?>

      <?php if ($page->instagramcontact() != ''): ?>
        <a class="action-item" style="grid-column: 1 / -1;" href="<?= $page->instagramcontact()->esc() ?>">
          <div class="action-content">
            <div class="icon-box"><span class="material-symbols-outlined">photo_camera</span></div>
            <div class="action-text">
              <p>Instagram</p>
              <p><?= $page->instagramcontact()->esc() ?></p>
            </div>
          </div>
          <span class="material-symbols-outlined" style="color: rgba(255,255,255,0.2)">open_in_new</span>
        </a>
      <?php endif ?>

      <?php if ($page->facebookcontact() != ''): ?>
        <a class="action-item" style="grid-column: 1 / -1;" href="<?= $page->facebookcontact()->esc() ?>">
          <div class="action-content">
            <div class="icon-box"><span class="material-symbols-outlined">groups</span></div>
            <div class="action-text">
              <p>Facebook</p>
              <p><?= $page->facebookcontact()->esc() ?></p>
            </div>
          </div>
          <span class="material-symbols-outlined" style="color: rgba(255,255,255,0.2)">open_in_new</span>
        </a>
      <?php endif ?>

      <?php if ($page->youtubecontact() != ''): ?>
        <a class="action-item" style="grid-column: 1 / -1;" href="<?= $page->youtubecontact()->esc() ?>">
          <div class="action-content">
            <div class="icon-box"><span class="material-symbols-outlined">play_circle</span></div>
            <div class="action-text">
              <p>YouTube</p>
              <p><?= $page->youtubecontact()->esc() ?></p>
            </div>
          </div>
          <span class="material-symbols-outlined" style="color: rgba(255,255,255,0.2)">open_in_new</span>
        </a>
      <?php endif ?>

    </div>
  </section>


  <section>
    <h2>
      <span class="material-symbols-outlined section-icon">qr_code_2</span>
      QR Code
    </h2>
    <div class="qr-grid">

      <div class="qr-card">
        <div class="qr-wrapper">
          <div class="qr-placeholder">
            <?php
            $photoUrl = ($page->downloadscontact()->toFile()) ? $page->downloadscontact()->toFile()->url() : '';
            $vcardQr = new \Kirby\Image\QrCode(
              "BEGIN:VCARD\r\n" .
              "VERSION:4.0\r\n" .
              "N:" . $page->nomcontact() . ";" . $page->prenomcontact() . ";;" . $page->genrecontact() . ";\r\n" .
              "FN:" . $page->prenomcontact() . " " . $page->nomcontact() . "\r\n" .
              "ORG:" . $page->orgacontact() . "\r\n" .
              "TITLE:" . $page->titlecontact() . "\r\n" .
              ($photoUrl ? "PHOTO;MEDIATYPE=image/JPEG:" . $photoUrl . "\r\n" : '') .
              "TEL;TYPE=work,voice;VALUE=uri:tel:" . $page->mobilecontact() . "\r\n" .
              "TEL;TYPE=home,voice;VALUE=uri:tel:" . $page->fixecontact() . "\r\n" .
              "ADR;TYPE=WORK;PREF=1;LABEL=\"" . $page->adrprocontact() . "\n" . $page->villeprocontact() . "\n" . $page->cpprocontact() . "\n" . $page->payscontact() . "\"\r\n" .
              "EMAIL:" . $page->emailcontact() . "\r\n" .
              "REV:" . date("Ymd") . "\r\n" .
              "END:VCARD"
            );
            print_r($vcardQr->toSvg());
            ?>
          </div>
        </div>
        <div class="qr-info">
          <h3>Enregistrement hors ligne</h3>
          <p>Scan to download vCard directly.</p>
        </div>
        <div class="qr-buttons">
          <button class="btn btn-primary btn-small open-qr">Agrandir</button>
        </div>
      </div>

      <div class="qr-card">
        <div class="qr-wrapper">
          <div class="qr-placeholder">
            <?php
            $shareQr = new \Kirby\Image\QrCode($page->url());
            print_r($shareQr->toSvg());
            ?>
          </div>
        </div>
        <div class="qr-info">
          <h3>Partager la page</h3>
          <p>Scan to share</p>
        </div>
        <div class="qr-buttons">
          <button class="btn btn-primary btn-small open-qr">Agrandir</button>
        </div>
      </div>

    </div>
  </section>

</div>


<!-- Lightbox QR Code -->
<div id="qr-lightbox" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.92); z-index:9999; align-items:center; justify-content:center; padding:2rem;">
  <div style="background:var(--card-dark); border:1px solid var(--border-dark); border-radius:1.5rem; padding:2rem; max-width:90vw; text-align:center; position:relative;">
    <button id="qr-lightbox-close" type="button" style="position:absolute; top:1rem; right:1rem; background:none; border:none; color:var(--text-muted); cursor:pointer; font-size:1.5rem; line-height:1; width:auto; height:auto; padding:0.25rem;">✕</button>
    <div id="qr-lightbox-svg" style="background:white; display:inline-block; padding:1.25rem; border-radius:0.75rem; margin-top:1rem;"></div>
  </div>
</div>

<script>
'use strict';

function downloadToFile(content, filename, contentType) {
  const a = document.createElement('a');
  const file = new Blob([content], { type: contentType });
  a.href = URL.createObjectURL(file);
  a.download = filename;
  a.click();
  URL.revokeObjectURL(a.href);
}

function previewFile(event) {
  const reader = new FileReader();
  reader.readAsDataURL(event.target.files[0]);
  reader.onloadend = () => (previewEl.src = reader.result);
}

const makeVCardVersion  = () => `VERSION:4.0`;
const makeVCardInfo     = (v) => `N:${v}`;
const makeVCardName     = (v) => `FN:${v}`;
const makeVCardOrg      = (v) => `ORG:${v}`;
const makeVCardTitle    = (v) => `TITLE:${v}`;
const makeVCardPhoto    = (v) => `PHOTO;TYPE=JPEG;ENCODING=b:[${v}]`;
const makeVCardTel      = (v) => `TEL;TYPE=WORK,VOICE:${v}`;
const makeVCardAdr      = (v) => `ADR;TYPE=WORK,PREF:;;${v}`;
const makeVCardEmail    = (v) => `EMAIL:${v}`;
const makeVCardTimeStamp = () => `REV:${new Date().toISOString()}`;

function makeVCard() {
  const vcard = [
    'BEGIN:VCARD',
    makeVCardVersion(),
    makeVCardInfo(cardInfoEl.value),
    makeVCardName(nameEl.value),
    makeVCardOrg(orgEl.value),
    makeVCardTitle(titleEl.value),
    makeVCardPhoto(previewEl.src),
    makeVCardTel(telEl.value),
    makeVCardAdr(addressEl.value),
    makeVCardEmail(emailEl.value),
    makeVCardTimeStamp(),
    'END:VCARD',
  ].join('\r\n');
  downloadToFile(vcard, 'vcard.vcf', 'text/x-vcard');
}

downloadEl.addEventListener('click', makeVCard);
fileEl.addEventListener('change', previewFile);

// Lightbox QR Code
const overlay     = document.getElementById('qr-lightbox');
const lightboxSvg = document.getElementById('qr-lightbox-svg');

document.querySelectorAll('.open-qr').forEach(function (btn) {
  btn.addEventListener('click', function () {
    lightboxSvg.innerHTML = btn.closest('.qr-card').querySelector('.qr-placeholder').innerHTML;
    const svg = lightboxSvg.querySelector('svg');
    if (svg) {
      svg.setAttribute('width', '280');
      svg.setAttribute('height', '280');
    }
    overlay.style.display = 'flex';
    document.body.style.overflow = 'hidden';
  });
});

function closeLightbox() {
  overlay.style.display = 'none';
  document.body.style.overflow = '';
}

document.getElementById('qr-lightbox-close').addEventListener('click', closeLightbox);
overlay.addEventListener('click', (e) => { if (e.target === overlay) closeLightbox(); });
document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeLightbox(); });
</script>

<?php snippet('footer') ?>
