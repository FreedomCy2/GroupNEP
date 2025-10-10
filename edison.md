# "Edison as contributor" 

## TODO 04.10.25
- [x] Create "Home" views for Admin 
- [X] Transfer Figma designs to views
- [x] Create functions in AdminDashboardController
- [ ] Add dynamic data via `.js` to "Home" page
- [X] Extend layout in `dashboard.blade.php`
- [X] Create css spreadsheet for `home.blade.php`

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

**CSS: Sidebar - Admin [DISCONTINUED]**
- Sidebar is static for now.
- Links are not functional yet.
- CSS is in `app.css` under `public/css/admin`.
- The card design is 'flexbox' because 'grid' too overpowered for this.

**CSS: Container - Admin [DISCONTINUED]**
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

**CSS: DashboardCard "children" - Dashboard View**
- The parent is `DashboardCard-ItemsGroup`.

- INside same flexbox to ensure proper spacing between each "card" and universal CSS styling.

- [OLD] **Note:** For each "children" under the `DashboardCard` class, as their own div class:
    `Item_Bookings`
    `Item_Total_Bookings`

- [OLD] **Note:** there is the problem of redundant replicate CSS classes. So I say simplify by
... putting all CSS styling class for each "children" under singular CSS classes. Hence:
    `DashboardCard-ItemValue`
    `ItemValue`
    `ItemChange_Positive`

## Blog
-> Now using BEM naming for CSS classes to avoid long naming (e.g. `Dashboard-Card_Item-Group`),
-- Keeps names short and simple BUT not too short.

-> Discontinued using previous naming convention of underscores `_` and hyphens `-` psl panjang and payah,
-- BEM follows format `Block__Element--Modifier` e.g. (Dashboard-Card--Bookings).

-> Occassionally using nested BEM for better reading and maintainability for larger code,
-- Warning: Do **NOT** use it casually. Keep it simple and only in long nested HTML elements!

## Terms
@ - At / Arah
w/ - With
"Inline" - example is `<main class="flex-1 main-content-area">`. Try to avoid this psl payahkan maintain and reading.

## Notes in Coding

`min-height: 100vh;` content takes up full height of viewport

`display: flex;` flexbox layout for arranging items in a row or column  
-> combined with `flex-direction: column;` for vertical stacking OR  
-> `flex-direction: row;` for horizontal alignment

`<div class="flex"></div>` - this "parent" contains "children"  
`<aside>...</aside>` - child flexbox; left side  
`<main>...</main>` - child flexbox; right side

`width: 16rem;` - fixed width for sidebar

`justify-content: space-between;` - put space in between items INside this flexbox like justify for text

`<img class="Undefined_UserAvatar" src="{{ asset('images/unnamed_user_pfp.png') }}" alt="Unnamed User Avatar" />`
-> you can use the `@yield()` function to call images different for each certain pagees. 

`@hasSection('header')` - check if the header EXISTS if it's being "called"  
-> `@yield('header')` - display content of section (part of `/layouts`) called 'header'
-> `<section class="DashboardCard">` - this "container" for something called "dashboard card"