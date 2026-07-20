# WMSC Theme Customizations

Running log of all customizations made to the OnAir2 parent theme for wmscradio.com.
Last updated: 2026-07-20.

> **Warning:** these are edits to the *parent* theme. A theme update from QantumThemes
> will overwrite every file change listed here. Re-apply from this doc (or from git
> history) after any update. Customizer CSS survives theme updates.

---

## 1. Co-Authors Plus support

Multi-author bylines via the [Co-Authors Plus](https://github.com/Automattic/Co-Authors-Plus/wiki/Template-tags) plugin.
Every change is wrapped in `function_exists()` so the theme still works if the plugin is deactivated.

| File | Change |
|------|--------|
| `phpincludes/part-header-caption-post.php` | "Written by" byline uses `coauthors_posts_links()` |
| `phpincludes/part-header-caption.php` | Same |
| `phpincludes/part-item-metas.php` | Archive/card byline uses `coauthors_posts_links()` |
| `phpincludes/part-archive-item-post-hero.php` | Hero byline lists all co-authors (see §2) |
| `phpincludes/part-post-author.php` | Rewritten: one author bio card per co-author (name, link, Yoast pronouns, bio, avatar). Guest-author avatars work via `user_email`. |

## 2. Hero slider (`phpincludes/part-archive-item-post-hero.php`)

- **Byline**: single line, `By Author1, Author2`, red underline per name (`<u>` inside each `<a>`).
  Class `qt-byline-fit` + footer script (§3) shrinks font to fit width (floor 10px).
- **Title**: `max-width: 70%`, centered — keeps text out of the edge shadow.
  `qt-ellipsis-2` class removed so long titles wrap to as many lines as needed (no `…` truncation).
- **Categories**:
  - "Featured" category (slug `featured`) skipped.
  - Primary category (Yoast "Make primary" setting; falls back to first category) bold red;
    other categories white at 0.8 opacity.
  - Links have `position: relative; z-index: 5` — without it the title's box overlaps
    the tag row and swallows clicks.
- **Removed**: red format-icon button (`qt-btn qt-btn-primary`) below the excerpt.

## 3. `functions.php` additions (end of file)

- `onair2_hide_featured_category()` — filter on `get_the_categories`; removes the
  `featured` category from all frontend listings. Admin, queries, and the
  `/category/featured/` archive URL still work.
- `onair2_byline_fit_script()` — prints a footer script that shrinks any
  `.qt-byline-fit` element's font-size until its one-line content fits its container.
  Runs on load and (debounced) on resize; covers slick slider clones.

## 4. Customizer CSS (Appearance → Customize → Additional CSS)

**Not stored in theme files** — lives in the WordPress database. Reference copy:

```css
/* Slider arrows: true vertical centering (icon glyph otherwise sits ~10px high) */
.qt-slickslider-container .slick-arrow::after {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 0;
}
.qt-slickslider-container .slick-arrow.slick-next::after {
    right: auto;
    left: 0;
}

/* Red marquee banner (WPBakery raw-HTML block on the homepage) */
.content {
    font-family: "Abril Fatface";
    font-size: 2.25rem;
    font-weight: 700;
    color: #111111;
    padding-left: 0.5em;
    line-height: 1.3; /* without this, 36px glyphs clip against the 24px line box */
}
@media only screen and (max-width: 767px) {
    .content {
        font-size: 2rem !important;
        padding-left: 0.25em;
    }
    .loop {
        animation: loop-anim 20s linear infinite; /* was 3.5s — way too fast */
    }
}
```

The banner markup itself is a WPBakery Raw HTML element on the homepage
(`.outer > .loop > .content`, JS-duplicated for seamless scroll); desktop speed is the
`.loop { animation: loop-anim 25s ... }` rule that ships with that block.

## 5. Site conventions

- **Primary category** = Yoast SEO "Make primary" star on the post edit screen.
  Controls which category is highlighted in the hero.
- **Featured** category (slug `featured`): backend-only flag for hero/featured queries;
  hidden everywhere on the frontend by §3's filter.
- Earlier pre-existing customizations (not made in this session): author box pronouns
  via `yoast_pronouns` user meta, featured-image caption under the author credit
  (`display_featured_image_caption()`).
