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
- Comment: Imagine if u had to repeat the sidebar code on every page. Payah kan? So use template.

## Summary

**Example** >> *Name of feature* - *Admin/User* - *Explanation*

**admin.blade.php - resources/layouts**
- Layout for all admin pages (excluding login).
- Figma design can be found under "Dashboard + Sidebar".
- Apply this to all views (pages) by using `@extends('layouts.admin')` in respective `blade.php` files.

**Dashboard page - Admin** 
- This is first page admin sees after login.
- Layout is found under `resources/layouts/admin.blade.php`.
- Figma design can be found under "Dashboard".

**CSS: Sidebar - Admin (DISCONTINUED)**
- Sidebar is static for now.
- Links are not functional yet.
- CSS is in `app.css` under `public/css/admin`.
- The card design is 'flexbox' because 'grid' too overpowered for this.

**CSS: Container - Admin (DISCONTINUED)**
- Container is where the main content goes and is called as a Blade layout to avoid code repetition on all page views.
- Think of it as a dashboard area - example: a grey box containing the "cards" including overviews, stats, etc.
- CSS is in `app.css` under `public/css/admin`.

**Naming files for resources/view**
resources/layouts
L_____ admin.blade.php - for admin page layout
L_____ user.blade.php - for user page layout

resources/views/admin
L_____ auth.blade.php
L_____ dashboard.blade.php
L_____ booking.blade.php

## Terms
@ - At / Arah
w/ - With