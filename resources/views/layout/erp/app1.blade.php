<?php
$sessions = session()->all();
$user_id = session('sess_user_id');
$user_role_id = session('sess_user_role_id');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Mirsaige Construction Management System - Premium project management and inventory control dashboard">
    <meta name="keywords" content="Mirsaige CMS, construction management, project dashboard, inventory system, Bangladesh construction">
    <meta name="author" content="Mirsaige Construction Consultants">
    <meta property="og:title" content="@yield('title') | Mirsaige Construction Management System">
    <meta property="og:description" content="Professional construction project management dashboard">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    
    <title>@yield('title') | Mirsaige Construction Management System</title>
    
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    @yield('style')
    <style>
        /* ===== Base Styles ===== */
        :root {
            /* Mirsaige Color Palette */
            --mirsaige-primary: #000000;
            --mirsaige-secondary: #080835;
            --mirsaige-text: #838D97;
            --mirsaige-accent: #FFB23E;
            --mirsaige-light-accent: #E0E4EA;
            --mirsaige-white: #FFFFFF;
            --mirsaige-gold: #DD9933;
            --mirsaige-dark: #202334;
            --mirsaige-dark-blue: #272A3D;
            --mirsaige-darker-blue: #11131F;
            
            /* Spacing */
            --mirsaige-space-3xs: 0.25rem;
            --mirsaige-space-2xs: 0.5rem;
            --mirsaige-space-xs: 0.75rem;
            --mirsaige-space-sm: 1rem;
            --mirsaige-space-md: 1.5rem;
            --mirsaige-space-lg: 2rem;
            --mirsaige-space-xl: 3rem;
            --mirsaige-space-2xl: 4rem;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body.mirsaige-app {
            font-family: "DM Sans", sans-serif;
            background: var(--mirsaige-dark);
            color: var(--mirsaige-text);
            overflow-x: hidden;
            position: relative;
            min-height: 100vh;
            transition: background 0.3s ease, color 0.3s ease;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: all 0.2s ease;
        }

        li {
            list-style: none;
        }

        /* ===== SIDEBAR ===== */
        .mirsaige-app-sidebar {
            position: fixed;
            width: 260px;
            background: var(--mirsaige-dark-blue);
            top: 0;
            left: 0;
            height: 100vh;
            overflow-y: auto;
            scrollbar-width: none;
            transition: all 0.3s ease;
            z-index: 1000;
            border-right: 1px solid rgba(255, 178, 62, 0.1);
        }

        .mirsaige-app-sidebar.hide {
            transform: translateX(-100%);
        }

        .mirsaige-app-sidebar::-webkit-scrollbar {
            display: none;
        }

        .mirsaige-app-brand {
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            height: 70px;
            font-weight: 700;
            color: var(--mirsaige-gold);
            padding: 0 var(--mirsaige-space-md);
            background: var(--mirsaige-darker-blue);
            border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        }

        .mirsaige-app-brand img {
            width: 40px;
            height: auto;
            margin-right: var(--mirsaige-space-xs);
        }

        /* ===== User Profile Styles ===== */
        .mirsaige-app-user-profile {
            text-align: center;
            padding: var(--mirsaige-space-md);
            border-bottom: 1px solid rgba(255, 178, 62, 0.1);
            transition: all 0.3s ease;
        }

        .mirsaige-app-user-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--mirsaige-accent);
            margin: 0 auto var(--mirsaige-space-xs);
            transition: all 0.3s ease;
        }

        .mirsaige-app-user-name {
            color: var(--mirsaige-white);
            font-weight: 600;
            margin-bottom: 0;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        /* ===== Side Menu Styles ===== */
        .mirsaige-app-side-menu {
            margin: var(--mirsaige-space-md) 0;
            padding: 0 var(--mirsaige-space-sm);
            transition: all 0.3s ease;
        }

        .mirsaige-app-side-menu > li > a {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            color: var(--mirsaige-text);
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            transition: all 0.3s ease;
            border-radius: 6px;
            margin: 2px 0;
            white-space: nowrap;
        }

        .mirsaige-app-side-menu > li > a:hover {
            background: rgba(255, 178, 62, 0.1);
            color: var(--mirsaige-accent);
        }

        .mirsaige-app-side-menu > li > a:hover .mirsaige-app-icon {
            color: var(--mirsaige-accent);
        }

        .mirsaige-app-side-menu > li > a.active .mirsaige-app-icon-right {
            transform: rotateZ(90deg);
            color: var(--mirsaige-accent);
        }

        .mirsaige-app-side-menu > li > a.active,
        .mirsaige-app-side-menu > li > a.active:hover {
            background: var(--mirsaige-accent);
            color: var(--mirsaige-dark);
        }

        .mirsaige-app-side-menu > li > a.active .mirsaige-app-icon,
        .mirsaige-app-side-menu > li > a.active:hover .mirsaige-app-icon {
            color: var(--mirsaige-dark);
        }

        /* ===== Icon Styles ===== */
        .mirsaige-app-icon {
            min-width: 40px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin-right: var(--mirsaige-space-xs);
            color: var(--mirsaige-accent);
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .mirsaige-app-menu-text {
            transition: all 0.3s ease;
            flex-grow: 1;
        }

        .mirsaige-app-icon-right {
            margin-left: auto;
            transition: all 0.3s ease;
            color: var(--mirsaige-text);
            font-size: 1rem;
        }

        .mirsaige-app-divider {
            margin-top: var(--mirsaige-space-md);
            font-size: 0.7rem;
            text-transform: uppercase;
            font-weight: 700;
            color: var(--mirsaige-text);
            transition: all 0.3s ease;
            white-space: nowrap;
            padding: 0 var(--mirsaige-space-sm);
            opacity: 0.7;
            letter-spacing: 0.5px;
        }

        /* ===== Dropdown Styles ===== */
        .mirsaige-app-side-dropdown {
            padding-left: 44px;
            max-height: 0;
            overflow-y: hidden;
            transition: all 0.3s ease;
            background: rgba(17, 19, 31, 0.5);
            border-radius: 0 0 6px 6px;
            margin-top: -4px;
        }

        .mirsaige-app-side-dropdown.show {
            max-height: 1000px;
            padding: var(--mirsaige-space-2xs) 0;
            margin-bottom: var(--mirsaige-space-xs);
        }

        .mirsaige-app-side-dropdown a {
            display: block;
            padding: var(--mirsaige-space-2xs) var(--mirsaige-space-sm);
            font-size: 0.85rem;
            color: var(--mirsaige-text);
            transition: all 0.2s ease;
        }

        .mirsaige-app-side-dropdown a:hover {
            color: var(--mirsaige-accent);
            padding-left: var(--mirsaige-space-md);
            background: rgba(255, 178, 62, 0.05);
        }

        /* ===== CONTENT AREA ===== */
        .mirsaige-app-content {
            position: relative;
            width: 100%;
            min-height: 100vh;
            background: var(--mirsaige-dark);
            transition: all 0.3s ease;
        }

        /* Overlay for mobile */
        .mirsaige-app-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .mirsaige-app-overlay.show {
            opacity: 1;
            pointer-events: auto;
        }

        /* ===== NAVBAR ===== */
        .mirsaige-app-navbar {
            background: var(--mirsaige-dark-blue);
            height: 70px;
            padding: 0 var(--mirsaige-space-md);
            display: flex;
            align-items: center;
            gap: var(--mirsaige-space-sm);
            position: sticky;
            top: 0;
            left: 0;
            z-index: 900;
            border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        }

        /* ===== Toggle Button Styles ===== */
        .mirsaige-app-toggle-sidebar {
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--mirsaige-text);
            transition: all 0.3s ease;
            background: none;
            border: none;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .mirsaige-app-toggle-sidebar:hover {
            color: var(--mirsaige-accent);
            background: rgba(255, 178, 62, 0.1);
        }

        .mirsaige-app-search {
            max-width: 400px;
            width: 100%;
            margin-right: auto;
        }

        .mirsaige-app-search-group {
            position: relative;
        }

        .mirsaige-app-search-input {
            width: 100%;
            background: var(--mirsaige-darker-blue);
            border-radius: 30px;
            border: 1px solid rgba(255, 178, 62, 0.2);
            outline: none;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            color: var(--mirsaige-white);
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .mirsaige-app-search-input:focus {
            border-color: var(--mirsaige-accent);
            box-shadow: 0 0 0 3px rgba(255, 178, 62, 0.2);
        }

        .mirsaige-app-search-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 1rem;
            color: var(--mirsaige-text);
            font-size: 1rem;
        }

        .mirsaige-app-nav-link {
            position: relative;
            color: var(--mirsaige-text);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .mirsaige-app-nav-link:hover {
            color: var(--mirsaige-accent);
            background: rgba(255, 178, 62, 0.1);
        }

        .mirsaige-app-nav-icon {
            font-size: 1.3rem;
        }

        .mirsaige-app-badge {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 2px solid var(--mirsaige-dark-blue);
            background: var(--mirsaige-accent);
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--mirsaige-dark);
            font-size: 0.6rem;
            font-weight: 700;
        }

        .mirsaige-app-divider-line {
            width: 1px;
            background: rgba(255, 178, 62, 0.2);
            height: 30px;
        }

        /* ===== Theme Toggle Styles ===== */
        .mirsaige-app-theme-toggle {
            position: relative;
            display: flex;
            align-items: center;
            margin-right: var(--mirsaige-space-xs);
        }

        .mirsaige-app-toggle-checkbox {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .mirsaige-app-toggle-label {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 50px;
            height: 26px;
            background: var(--mirsaige-darker-blue);
            border-radius: 50px;
            padding: 0 var(--mirsaige-space-2xs);
            cursor: pointer;
            border: 1px solid rgba(255, 178, 62, 0.2);
            transition: all 0.3s ease;
        }

        .mirsaige-app-toggle-label i {
            font-size: 0.9rem;
            color: var(--mirsaige-accent);
            z-index: 1;
        }

        .mirsaige-app-toggle-ball {
            position: absolute;
            top: 2px;
            left: 2px;
            width: 22px;
            height: 22px;
            background: var(--mirsaige-accent);
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        .mirsaige-app-toggle-checkbox:checked + .mirsaige-app-toggle-label .mirsaige-app-toggle-ball {
            transform: translateX(24px);
        }

        /* Profile Dropdown */
        .mirsaige-app-profile {
            position: relative;
        }

        .mirsaige-app-profile-img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid var(--mirsaige-accent);
            transition: all 0.3s ease;
        }

        .mirsaige-app-profile-img:hover {
            transform: scale(1.1);
        }

        .mirsaige-app-profile-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            background: var(--mirsaige-dark-blue);
            padding: var(--mirsaige-space-xs) 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            width: 180px;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 178, 62, 0.2);
            z-index: 1000;
        }

        .mirsaige-app-profile-dropdown.show {
            opacity: 1;
            pointer-events: auto;
            top: 100%;
        }

        .mirsaige-app-profile-dropdown a {
            padding: var(--mirsaige-space-2xs) var(--mirsaige-space-sm);
            display: flex;
            gap: var(--mirsaige-space-xs);
            font-size: 0.85rem;
            color: var(--mirsaige-text);
            align-items: center;
            transition: all 0.3s ease;
        }

        .mirsaige-app-profile-dropdown a:hover {
            background: rgba(255, 178, 62, 0.1);
            color: var(--mirsaige-accent);
        }

        .mirsaige-app-profile-dropdown i {
            width: 20px;
            text-align: center;
            font-size: 1rem;
        }

        /* ===== MAIN CONTENT ===== */
        .mirsaige-app-main {
            width: 100%;
            padding: var(--mirsaige-space-md);
        }

        .mirsaige-app-breadcrumbs {
            display: flex;
            gap: var(--mirsaige-space-2xs);
            margin-bottom: var(--mirsaige-space-md);
            flex-wrap: wrap;
        }

        .mirsaige-app-breadcrumbs li,
        .mirsaige-app-breadcrumbs li a {
            font-size: 0.85rem;
        }

        .mirsaige-app-breadcrumbs li a {
            color: var(--mirsaige-accent);
        }

        .mirsaige-app-breadcrumbs li a:hover {
            text-decoration: underline;
        }

        .mirsaige-app-breadcrumbs li a.active,
        .mirsaige-app-breadcrumbs li.divider {
            color: var(--mirsaige-text);
            pointer-events: none;
        }

        /* ===== MODAL STYLES ===== */
        .mirsaige-app-modal .modal-content {
            background: var(--mirsaige-dark-blue);
            color: var(--mirsaige-text);
            border: 1px solid rgba(255, 178, 62, 0.2);
        }

        .mirsaige-app-modal .modal-header {
            border-bottom: 1px solid rgba(255, 178, 62, 0.2);
        }

        .mirsaige-app-modal .modal-title {
            color: var(--mirsaige-white);
            font-size: 1.25rem;
        }

        .mirsaige-app-modal .btn-close {
            filter: invert(1);
            opacity: 0.8;
        }

        .mirsaige-app-modal .btn-close:hover {
            opacity: 1;
        }

        /* ===== TABLE STYLES ===== */
        .mirsaige-app-table {
            width: 100%;
            border-collapse: collapse;
            color: var(--mirsaige-text);
            font-size: 0.9rem;
        }

        .mirsaige-app-table th,
        .mirsaige-app-table td {
            padding: var(--mirsaige-space-sm);
            text-align: left;
            border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        }

        .mirsaige-app-table th {
            background: var(--mirsaige-darker-blue);
            color: var(--mirsaige-accent);
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .mirsaige-app-table tr:hover td {
            background: rgba(255, 178, 62, 0.05);
        }

        /* ===== LIGHT THEME STYLES ===== */



        body.mirsaige-app.light-theme {
            --mirsaige-primary: #FFFFFF;
            --mirsaige-secondary: #080835;
            --mirsaige-text: #11131f;
            --mirsaige-accent: #FFB23E;
            --mirsaige-light-accent: #E9ECEF;
            --mirsaige-white: #212529;
            --mirsaige-gold: #6C757D;
            --mirsaige-dark: #F8F9FA;
            --mirsaige-dark-blue: #E9ECEF;
            --mirsaige-darker-blue: #DEE2E6;
        }

        .light-theme .mirsaige-app-sidebar {
            border-right: 1px solid rgba(0, 0, 0, 0.1);
        }

        .light-theme .mirsaige-app-navbar {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .light-theme .mirsaige-app-brand {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .light-theme .mirsaige-app-user-profile {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .light-theme .mirsaige-app-modal .modal-content {
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .light-theme .mirsaige-app-main {
            background: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
        }
        .light-theme .mirsaige-app-modal .modal-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .light-theme .mirsaige-app-table th,
        .light-theme .mirsaige-app-table td {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        /* ===== VIDEO STYLES ===== */
        .mirsaige-app-video-container {
            width: 100%;
            display: flex;
            justify-content: center;
            padding: var(--mirsaige-space-xs);
            background: var(--mirsaige-dark-blue);
            margin-top: auto;
        }

        .mirsaige-app-video {
            width: 100%;
            max-width: 150px;
            height: auto;
            object-fit: contain;
            border-radius: 8px;
            overflow: hidden;
        }

        /* ===== RESPONSIVE STYLES ===== */
        
        /* Extra large devices (large desktops, 1200px and up) */
        @media (min-width: 1200px) {
            .mirsaige-app-user-profile {
                padding: var(--mirsaige-space-md) var(--mirsaige-space-sm);
            }
            
            .mirsaige-app-user-img {
                width: 70px;
                height: 70px;
            }
            
            .mirsaige-app-side-menu > li > a {
                padding: var(--mirsaige-space-2xs) var(--mirsaige-space-sm);
            }
            
            .mirsaige-app-icon {
                min-width: 36px;
                font-size: 1rem;
            }
        }

        /* Large devices (desktops, 992px to 1199.98px) */
        @media (min-width: 992px) and (max-width: 1199.98px) {
            .mirsaige-app-user-profile {
                padding: var(--mirsaige-space-sm);
            }
            
            .mirsaige-app-user-img {
                width: 60px;
                height: 60px;
                border-width: 2px;
            }
            
            .mirsaige-app-user-name {
                font-size: 0.85rem;
            }
            
            .mirsaige-app-side-menu > li > a {
                font-size: 0.85rem;
                padding: var(--mirsaige-space-3xs) var(--mirsaige-space-xs);
            }
            
            .mirsaige-app-icon {
                min-width: 34px;
                font-size: 0.95rem;
            }
            
            .mirsaige-app-side-dropdown {
                padding-left: 34px;
            }
            
            .mirsaige-app-toggle-sidebar {
                font-size: 1.3rem;
                width: 36px;
                height: 36px;
            }
        }

        /* Medium devices (tablets, 768px to 991.98px) */
        @media (min-width: 768px) and (max-width: 991.98px) {
            .mirsaige-app-sidebar {
                width: 220px;
            }
            
            .mirsaige-app-user-profile {
                padding: var(--mirsaige-space-xs);
            }
            
            .mirsaige-app-user-img {
                width: 50px;
                height: 50px;
                border-width: 2px;
            }
            
            .mirsaige-app-user-name {
                font-size: 0.8rem;
            }
            
            .mirsaige-app-side-menu > li > a {
                font-size: 0.8rem;
                padding: var(--mirsaige-space-3xs) var(--mirsaige-space-2xs);
            }
            
            .mirsaige-app-icon {
                min-width: 30px;
                font-size: 0.9rem;
                margin-right: var(--mirsaige-space-3xs);
            }
            
            .mirsaige-app-side-dropdown {
                padding-left: 30px;
            }
            
            .mirsaige-app-side-dropdown a {
                font-size: 0.8rem;
                padding: var(--mirsaige-space-3xs) var(--mirsaige-space-xs);
            }
            
            .mirsaige-app-toggle-sidebar {
                font-size: 1.2rem;
                width: 34px;
                height: 34px;
            }
        }

        /* Small devices (large phones, 576px to 767.98px) */
        @media (min-width: 576px) and (max-width: 767.98px) {
            .mirsaige-app-user-profile {
                padding: var(--mirsaige-space-xs) var(--mirsaige-space-2xs);
            }
            
            .mirsaige-app-user-img {
                width: 45px;
                height: 45px;
                border-width: 1px;
            }
            
            .mirsaige-app-user-name {
                font-size: 0.75rem;
            }
            
            .mirsaige-app-side-menu > li > a {
                font-size: 0.75rem;
                padding: var(--mirsaige-space-3xs) var(--mirsaige-space-2xs);
            }
            
            .mirsaige-app-icon {
                min-width: 28px;
                font-size: 0.85rem;
                margin-right: var(--mirsaige-space-3xs);
            }
            
            .mirsaige-app-side-dropdown {
                padding-left: 28px;
            }
            
            .mirsaige-app-side-dropdown a {
                font-size: 0.75rem;
                padding: var(--mirsaige-space-3xs) var(--mirsaige-space-xs);
            }
            
            .mirsaige-app-toggle-sidebar {
                font-size: 1.1rem;
                width: 32px;
                height: 32px;
            }
        }

        /* Extra small devices (phones, less than 576px) */
        @media (max-width: 575.98px) {
            .mirsaige-app-brand {
                height: 60px;
                padding: 0 var(--mirsaige-space-sm);
            }
            
            .mirsaige-app-brand img {
                width: 36px;
            }
            
            .mirsaige-app-navbar {
                height: 60px;
                padding: 0 var(--mirsaige-space-sm);
            }
            
            .mirsaige-app-user-profile {
                padding: var(--mirsaige-space-2xs);
                display: flex;
                align-items: center;
                justify-content: flex-start;
                text-align: left;
                gap: var(--mirsaige-space-xs);
            }
            
            .mirsaige-app-user-img {
                width: 40px;
                height: 40px;
                border-width: 1px;
                margin: 0;
            }
            
            .mirsaige-app-user-name {
                font-size: 0.7rem;
            }
            
            .mirsaige-app-side-menu {
                margin: var(--mirsaige-space-sm) 0;
                padding: 0 var(--mirsaige-space-2xs);
            }
            
            .mirsaige-app-side-menu > li > a {
                font-size: 0.7rem;
                padding: var(--mirsaige-space-3xs) var(--mirsaige-space-2xs);
            }
            
            .mirsaige-app-icon {
                min-width: 24px;
                font-size: 0.8rem;
                margin-right: var(--mirsaige-space-3xs);
            }
            
            .mirsaige-app-side-dropdown {
                padding-left: 24px;
            }
            
            .mirsaige-app-side-dropdown a {
                font-size: 0.7rem;
                padding: var(--mirsaige-space-3xs) var(--mirsaige-space-xs);
            }
            
            .mirsaige-app-toggle-sidebar {
                font-size: 1rem;
                width: 30px;
                height: 30px;
            }
            
            .mirsaige-app-divider {
                padding: 0 var(--mirsaige-space-2xs);
            }
            
            .mirsaige-app-main {
                padding: var(--mirsaige-space-sm);
            }
            
            .mirsaige-app-profile-dropdown {
                width: 160px;
            }
            
            .mirsaige-app-theme-toggle {
                margin-right: 0;
            }
            
            .mirsaige-app-toggle-label {
                width: 42px;
                height: 24px;
            }
            
            .mirsaige-app-toggle-label i {
                font-size: 0.8rem;
            }
            
            .mirsaige-app-toggle-ball {
                width: 20px;
                height: 20px;
            }
            
            .mirsaige-app-toggle-checkbox:checked + .mirsaige-app-toggle-label .mirsaige-app-toggle-ball {
                transform: translateX(18px);
            }
            
            .mirsaige-app-video-container {
                padding: var(--mirsaige-space-sm);
            }
        }

        /* Hide search on smaller screens */
        @media screen and (max-width: 767px) {
            .mirsaige-app-search {
                display: none;
            }

            .mirsaige-app-navbar {
                justify-content: flex-end;
            }
        }

        /* Landscape orientation adjustments */
        @media (max-height: 600px) and (orientation: landscape) {
            .mirsaige-app-sidebar {
                overflow-y: auto;
            }
            
            .mirsaige-app-user-profile {
                padding: var(--mirsaige-space-2xs);
            }
            
            .mirsaige-app-user-img {
                width: 50px;
                height: 50px;
            }
            
            .mirsaige-app-side-menu > li > a {
                padding: var(--mirsaige-space-3xs) var(--mirsaige-space-2xs);
            }
            
            .mirsaige-app-side-dropdown a {
                padding: var(--mirsaige-space-3xs) 0;
            }
            
            .mirsaige-app-video-container {
                padding: var(--mirsaige-space-xs);
            }
        }

        /* Special case for sidebar when collapsed */
        .mirsaige-app-sidebar.hide:not(:hover) {
            .mirsaige-app-user-profile {
                padding: var(--mirsaige-space-xs) 0;
                justify-content: center;
            }
            
            .mirsaige-app-user-img {
                width: 36px;
                height: 36px;
                margin: 0 auto;
            }
            
            .mirsaige-app-user-name,
            .mirsaige-app-menu-text,
            .mirsaige-app-divider {
                display: none;
            }
            
            .mirsaige-app-icon {
                margin-right: 0;
            }
            
            .mirsaige-app-icon-right {
                display: none;
            }
            
            .mirsaige-app-side-menu > li > a {
                justify-content: center;
                padding: var(--mirsaige-space-3xs) 0;
            }
            
            .mirsaige-app-video-container {
                display: none;
            }
        }

        /* Desktop styles (992px and up) */
        @media (min-width: 992px) {
            .mirsaige-app-sidebar {
                transform: translateX(0) !important;
            }
            
            .mirsaige-app-content {
                margin-left: 260px;
                width: calc(100% - 260px);
            }
            
            .mirsaige-app-sidebar.hide {
                width: 70px;
                transform: translateX(0);
            }
            
            .mirsaige-app-sidebar.hide + .mirsaige-app-content {
                margin-left: 70px;
                width: calc(100% - 70px);
            }
            
            .mirsaige-app-sidebar.hide .mirsaige-app-brand-text,
            .mirsaige-app-sidebar.hide .mirsaige-app-menu-text,
            .mirsaige-app-sidebar.hide .mirsaige-app-divider {
                display: none;
            }
            
            .mirsaige-app-sidebar.hide:hover {
                width: 260px;
            }
            
            .mirsaige-app-sidebar.hide:hover .mirsaige-app-brand-text,
            .mirsaige-app-sidebar.hide:hover .mirsaige-app-menu-text,
            .mirsaige-app-sidebar.hide:hover .mirsaige-app-divider {
                display: inline;
            }
            
            .mirsaige-app-overlay {
                display: none;
            }
            
            .mirsaige-app-sidebar.hide:hover .mirsaige-app-video-container {
                display: flex;
            }
        }
    </style>
</head>

<body class="mirsaige-app">
    <!-- SIDEBAR OVERLAY -->
    <div class="mirsaige-app-overlay"></div>
    
    <!-- SIDEBAR -->
    <aside class="mirsaige-app-sidebar">
        <a href="{{ route('admin.dashboard') }}" class="mirsaige-app-brand">
            <img src="{{ asset('img/Logo_Transparent.webp') }}" alt="Mirsaige Construction Management System Logo" class="mirsaige-app-icon">
            <span class="mirsaige-app-brand-text">Mirsaige</span>
        </a>

        @if (session('sess_user_id'))
            <div class="mirsaige-app-user-profile">
                <img src="{{ asset('img/users/' . session('sess_user_photo')) }}" class="mirsaige-app-user-img" alt="User Profile Image">
                <h6 class="mirsaige-app-user-name">{{ session('sess_user_name') }}</h6>
            </div>
        @endif

        <ul class="mirsaige-app-side-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="active">
                    <i class="bx bxs-dashboard mirsaige-app-icon"></i>
                    <span class="mirsaige-app-menu-text">Dashboard</span>
                </a>
            </li>

            <li class="mirsaige-app-divider" data-text="main">Main</li>

            @if (in_array($user_role_id, [1, 2]))
                <li>
                    <a href="#">
                        <i class="bx bxs-user mirsaige-app-icon"></i>
                        <span class="mirsaige-app-menu-text">Users Management</span>
                        <i class="bx bx-chevron-right mirsaige-app-icon-right"></i>
                    </a>
                    <ul class="mirsaige-app-side-dropdown">
                        <li><a href="{{ url('/users') }}">Manage Users</a></li>
                        <li><a href="{{ url('/roles') }}">Manage Roles</a></li>
                        <li><a href="{{ url('/departments') }}">Manage Departments</a></li>
                        <li><a href="{{ url('/designations') }}">Manage Designations</a></li>
                        <li><a href="{{ url('/permissions') }}">Manage Permissions</a></li>
                    </ul>
                </li>
            @endif

            <li>
                <a href="#">
                    <i class="bx bxs-package mirsaige-app-icon"></i>
                    <span class="mirsaige-app-menu-text">Inventory Management</span>
                    <i class="bx bx-chevron-right mirsaige-app-icon-right"></i>
                    </a>
                    <ul class="mirsaige-app-side-dropdown">
                        <li><a href="{{ route('products.create') }}">Create Product</a></li>
                        <li><a href="{{ url('/products') }}">Manage Products</a></li>
                        <li><a href="{{ url('/suppliers') }}">Manage Suppliers</a></li>
                        <li><a href="{{ url('/purchases') }}">Manage Purchase</a></li>
                        <li><a href="{{ url('/stocks') }}">Manage Stocks</a></li>
                        <li><a href="{{ url('/stockadjustments') }}">Stock Adjustment</a></li>
                        <li><a href="{{ url('/stockadjustmenttypes') }}">Stock Adjustment Types</a></li>
                        <li><a href="{{ url('/stockadjustmentdetails') }}">Stock Adjustment Details</a></li>
                        <li><a href="{{ url('/categories') }}">Manage Category</a></li>
                        <li><a href="{{ url('/status') }}">Manage Status</a></li>
                        <li><a href="{{ url('/uoms') }}">Manage UOM</a></li>
                        <li><a href="{{ url('/transaction-types') }}">Transaction Types</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="bx bxs-building mirsaige-app-icon"></i>
                        <span class="mirsaige-app-menu-text">Project Management</span>
                        <i class="bx bx-chevron-right mirsaige-app-icon-right"></i>
                    </a>
                    <ul class="mirsaige-app-side-dropdown">
                        <li><a href="{{ route('projects.create') }}">Create Project</a></li>
                        <li><a href="{{ url('/projects') }}">Manage Projects</a></li>
                        <li><a href="{{ url('/tasks') }}">Manage Tasks</a></li>
                        <li><a href="{{ url('/requisitions') }}">Manage Requisition</a></li>
                        <li><a href="{{ route('use_product') }}">Use Product</a></li>
                    </ul>
                </li>

                <li class="mirsaige-app-divider" data-text="Settings">Settings</li>

                <li>
                    <a href="#">
                        <i class="bx bxs-cog mirsaige-app-icon"></i>
                        <span class="mirsaige-app-menu-text">Settings</span>
                        <i class="bx bx-chevron-right mirsaige-app-icon-right"></i>
                    </a>
                    <ul class="mirsaige-app-side-dropdown">
                        @if (in_array($user_role_id, [1, 2, 3]))
                            <li><a href="{{ route('users.show', session('sess_user_id')) }}">Profile</a></li>
                        @endif
                        @if (in_array($user_role_id, [1, 2]))
                            <li><a href="{{ url('activity-log') }}">Activity Log</a></li>
                        @endif
                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
            
            <!-- Video Container -->
            <div class="mirsaige-app-video-container">
                <video class="mirsaige-app-video" autoplay loop muted playsinline>
                    <source src="{{ asset('video/mirsaige-logo-video.mp4') }}" type="video/mp4">
                   
                </video>
            </div>
        </aside>

        <!-- CONTENT AREA -->
        <main class="mirsaige-app-content">
            <!-- NAVBAR -->
            <nav class="mirsaige-app-navbar">
                <button class="mirsaige-app-toggle-sidebar">
                    <i class="bx bx-menu"></i>
                </button>

                <form class="mirsaige-app-search">
                    @csrf
                    <div class="mirsaige-app-search-group">
                        <i class="bx bx-search mirsaige-app-search-icon"></i>
                        <input type="text" class="mirsaige-app-search-input" placeholder="Search..." aria-label="Search dashboard" />
                    </div>
                </form>

                <a href="#" class="mirsaige-app-nav-link" data-bs-toggle="modal" data-bs-target="#requisitionModal" aria-label="Notifications">
                    <i class="bx bxs-bell mirsaige-app-nav-icon"></i>
                    <span class="mirsaige-app-badge">0</span>
                </a>

                <div class="mirsaige-app-divider-line"></div>

                <!-- Theme Toggle -->
                <div class="mirsaige-app-theme-toggle">
                    <input type="checkbox" id="themeToggle" class="mirsaige-app-toggle-checkbox">
                    <label for="themeToggle" class="mirsaige-app-toggle-label">
                        <i class="bx bxs-sun"></i>
                        <i class="bx bxs-moon"></i>
                        <span class="mirsaige-app-toggle-ball"></span>
                    </label>
                </div>
                <div class="mirsaige-app-divider-line"></div>

                <div class="mirsaige-app-profile">
                    @if (session('sess_user_id'))
                        <img src="{{ asset(session('sess_user_photo')) }}" class="mirsaige-app-profile-img" alt="User Profile Image">
                    @endif
                    <ul class="mirsaige-app-profile-dropdown">
                        @if (in_array($user_role_id, [1, 2, 3]))
                            <li>
                                <a href="{{ route('users.show', session('sess_user_id')) }}">
                                    <i class="bx bxs-user-circle"></i> Profile
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="#">
                                <i class="bx bxs-cog"></i> Settings
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}">
                                <i class="bx bxs-log-out-circle"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- REQUISITION MODAL -->
            <div class="modal fade mirsaige-app-modal" id="requisitionModal" tabindex="-1" aria-hidden="true" aria-labelledby="requisitionModalLabel">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="requisitionModalLabel">New Requisition</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="mirsaige-app-table" id="requisitionsTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Requestor Name</th>
                                        <th>Needed Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3">Loading...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="{{url('/requisitions')}}" class="btn btn-primary">Manage Requisition</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MAIN CONTENT -->
            <div class="mirsaige-app-main">
                @yield('page')
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
         
    <script src="{{ asset('js') }}/cart.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!--===============================================================================================-->
        
        <script>
            // SIDEBAR TOGGLE FUNCTIONALITY
            const sidebar = document.querySelector('.mirsaige-app-sidebar');
            const toggleBtn = document.querySelector('.mirsaige-app-toggle-sidebar');
            const content = document.querySelector('.mirsaige-app-content');
            const overlay = document.querySelector('.mirsaige-app-overlay');
            
            function toggleSidebar() {
                sidebar.classList.toggle('hide');
                overlay.classList.toggle('show');
                
                // On desktop (992px and up), we want different behavior
                if (window.innerWidth >= 992) {
                    overlay.classList.remove('show');
                }
            }
            
            toggleBtn.addEventListener('click', toggleSidebar);
            
            // Close sidebar when clicking on overlay (mobile only)
            overlay.addEventListener('click', function() {
                if (window.innerWidth < 992) {
                    toggleSidebar();
                }
            });
            
            // Close sidebar when clicking outside (for profile dropdown)
            document.addEventListener('click', function(e) {
                const profile = document.querySelector('.mirsaige-app-profile');
                const profileDropdown = document.querySelector('.mirsaige-app-profile-dropdown');
                
                // Close profile dropdown if clicking outside
                if (!profile.contains(e.target)) {
                    profileDropdown.classList.remove('show');
                }
            });

            // DROPDOWN MENU FUNCTIONALITY
            const dropdowns = document.querySelectorAll('.mirsaige-app-side-menu > li > a');
            
            dropdowns.forEach(item => {
                const dropdown = item.nextElementSibling;
                
                item.addEventListener('click', function(e) {
                    if (dropdown) {
                        e.preventDefault();
                        
                        // Close all other dropdowns
                        dropdowns.forEach(otherItem => {
                            if (otherItem !== item && otherItem.nextElementSibling) {
                                otherItem.classList.remove('active');
                                otherItem.nextElementSibling.classList.remove('show');
                            }
                        });
                        
                        // Toggle current dropdown
                        this.classList.toggle('active');
                        if (dropdown) dropdown.classList.toggle('show');
                    }
                });
            });

            // PROFILE DROPDOWN FUNCTIONALITY
            const profile = document.querySelector('.mirsaige-app-profile');
            const profileImg = profile.querySelector('.mirsaige-app-profile-img');
            const profileDropdown = profile.querySelector('.mirsaige-app-profile-dropdown');
            
            profileImg.addEventListener('click', function(e) {
                e.stopPropagation();
                profileDropdown.classList.toggle('show');
            });

            // FETCH REQUISITION COUNT
            function fetchNewRequisitionsCount() {
                fetch('/new-requisitions-count')
                    .then(response => response.json())
                    .then(data => {
                        document.querySelector('.mirsaige-app-badge').textContent = data.count;
                    })
                    .catch(error => console.error('Error:', error));
            }

            // FETCH REQUISITION DATA
            function fetchNewRequisitions() {
                $.ajax({
                    url: '/new-requisitions',
                    method: 'GET',
                    success: function(data) {
                        const tableBody = $('#requisitionsTable tbody');
                        tableBody.empty();
                        
                        if (data.length === 0) {
                            tableBody.append('<tr><td colspan="3">No new requisitions</td></tr>');
                            return;
                        }
                        
                        data.forEach((requisition, index) => {
                            const row = `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${requisition.user?.name || 'N/A'}</td>
                                    <td>${requisition.needed_date || 'N/A'}</td>
                                </tr>
                            `;
                            tableBody.append(row);
                        });
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            }

            // THEME TOGGLE FUNCTIONALITY
            const themeToggle = document.getElementById('themeToggle');
            const body = document.body;

            // Check for saved theme preference or use dark theme as default
            const currentTheme = localStorage.getItem('theme') || 'dark';
            if (currentTheme === 'light') {
                body.classList.add('light-theme');
                themeToggle.checked = true;
            }

            themeToggle.addEventListener('change', function() {
                if (this.checked) {
                    body.classList.add('light-theme');
                    localStorage.setItem('theme', 'light');
                } else {
                    body.classList.remove('light-theme');
                    localStorage.setItem('theme', 'dark');
                }
            });

            // INITIALIZE FUNCTIONS ON LOAD
            document.addEventListener('DOMContentLoaded', function() {
                fetchNewRequisitionsCount();
                fetchNewRequisitions();
                
                // Refresh data every minute
                setInterval(fetchNewRequisitionsCount, 60000);
                setInterval(fetchNewRequisitions, 60000);
                
                // Initialize sidebar state based on screen size
                handleResponsiveSidebar();
            });

            // RESPONSIVE SIDEBAR HANDLING
            function handleResponsiveSidebar() {
                if (window.innerWidth < 992) {
                    // Mobile - sidebar starts hidden
                    sidebar.classList.add('hide');
                    overlay.classList.remove('show');
                } else {
                    // Desktop - sidebar starts visible
                    sidebar.classList.remove('hide');
                    overlay.classList.remove('show');
                }
            }

            window.addEventListener('resize', handleResponsiveSidebar);
        </script>
        
        @yield('script')
    </body>
</html>