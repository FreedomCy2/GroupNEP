# "Edison as contributor" 

# Log Sum 04.10.25

## TODO
- [x] Create "Home" views for Admin 
- [ ] Transfer Figma designs to views
- [x] Create functions in AdminDashboardController
- [ ] Add dynamic data via `.js` to "Home" page
- [ ] Extend layout in `dashboard.blade.php`
- [ ] Create css spreadsheet for `home.blade.php`

## Log / Update
`home.blade.php`
- AKA "Dashboard".
- stored under `resources/views/admin`.
- This first page ppl sees after login.
- Found @ Figma, "Admin" w/ name "Dashboard".

`admin.blade.php`
- Layout file for all pages (excluding login).
- Stored under `resources/views/layouts`.
- Contains sidebar and stuff applied to all pages.
- Comment: Imagine if u had to repeat the sidebar code on every page. Payah kan? So use layouts.

## Summary

**Example** >> *Name of feature* - *Admin/User* - *Explanation*

**Home page - Admin** 
- This is first page admin sees after login.
- Sidebar has links to other pages.
- CSS and layouts are found in `dashboard.blade.php`.
- The HTML is handled by the `admin.home` view.

**CSS: Sidebar - Admin**
- Sidebar is static for now.
- Links are not functional yet.
- CSS is in `app.css` under `public/css/admin`.
- The card design is 'flexbox' because 'grid' too overpowered for this.

**CSS: Container - Admin**
- Container is where the main content goes and is called as a Blade layout to avoid code repetition on all page views.
- Think of it as a dashboard area - example: a grey box containing the "cards" including overviews, stats, etc.
- CSS is in `app.css` under `public/css/admin`.

## Terms
@ - At / Arah
w/ - With