# Contact feature — Kirby package

Drop-in package for a contact directory in any Kirby 4 site.
Provides a **contacts listing page** and individual **contact detail pages** with:

- Profile card (photo, name, title, organisation)
- Quick-action links (phone, email, website, LinkedIn, Instagram, Facebook, YouTube)
- vCard download (client-side)
- QR codes: vCard (offline save) + page URL (share)
- QR lightbox

---

## Requirements

| Dependency | Version |
|---|---|
| Kirby CMS | ≥ 4.5 (uses `\Kirby\Image\QrCode::toSvg()`, added in 4.5.0) — compatible with Kirby 5 |
| Google Fonts — Inter | loaded via `<link>` in your header |
| Google Fonts — Material Symbols Outlined | loaded via `<link>` in your header |

Add these two `<link>` tags to your `<head>`:

```html
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
```

---

## Installation

Copy each folder into the matching location in your Kirby project:

```
contact/                          → copy contents to your Kirby root
  site/
    templates/
      contact.php                 → site/templates/contact.php
      contacts.php                → site/templates/contacts.php
    blueprints/
      pages/
        contact.yml               → site/blueprints/pages/contact.yml
        contacts.yml              → site/blueprints/pages/contacts.yml
      sections/
        contacts.yml              → site/blueprints/sections/contacts.yml
    snippets/
      contact.php                 → site/snippets/contact.php
  assets/
    css/
      contact.css                 → assets/css/contact.css (or merge into your main CSS)
```

---

## CSS setup

### Option A — load the file separately

In your header snippet, add:

```php
<?= css('assets/css/contact.css') ?>
```

### Option B — merge into your main stylesheet

Copy the contents of `assets/css/contact.css` into your existing CSS file.

### CSS custom properties

`contact.css` declares its own CSS variables for colour and dark/light mode.
If your site already defines these variables, **remove the variable block** at the top of
`contact.css` (everything between the `Optional: CSS variable definitions` comments) to avoid conflicts.

Variables used:

```css
--primary         /* accent colour — default #FF7A30 */
--transition      /* e.g. all 0.3s ease */
--bg              /* page background */
--card            /* card surface */
--border          /* card border */
--text-main       /* body text */
--text-muted      /* secondary text */
--text-strong     /* headings */
--toggle-bg       /* subtle fill */
--toggle-bg-hover /* hover fill */
```

---

## Content structure

Create a `contacts` page in Kirby's content folder, then add child pages of template `contact`:

```
content/
  contacts/
    contacts.txt
    john-doe/
      contact.txt
      photo.jpg
    jane-smith/
      contact.txt
```

---

## Fields reference

All fields live on the `contact` blueprint:

| Field | Type | Description |
|---|---|---|
| `prenomcontact` | text | First name |
| `nomcontact` | text | Last name |
| `genrecontact` | text | Honorific / gender prefix (used in vCard N field) |
| `emailcontact` | email | Email address |
| `orgacontact` | text | Organisation |
| `titlecontact` | text | Job title |
| `sectioncontact` | text | Department / service |
| `mobilecontact` | tel | Mobile phone |
| `fixecontact` | tel | Landline |
| `adrprocontact` | text | Professional address |
| `villeprocontact` | text | City |
| `cpprocontact` | text | Postal code |
| `payscontact` | text | Country |
| `siteinternetcontact` | link | Website |
| `linkedincontact` | link | LinkedIn URL |
| `instagramcontact` | link | Instagram URL |
| `facebookcontact` | link | Facebook URL |
| `youtubecontact` | link | YouTube URL |
| `downloadscontact` | files | Profile photo (single file) |
| `rdvcontact` | text | Appointment booking URL |

---

## Dark mode

The CSS ships with dark-mode support via the `html.dark` class.
Add this script before `</head>` to persist the user's preference:

```html
<script>
  (function () {
    if (localStorage.getItem('theme') === 'light')
      document.documentElement.classList.remove('dark');
  })();
</script>
```

To toggle dark/light at runtime, add/remove the `dark` class on `<html>` and write
the preference to `localStorage`.
