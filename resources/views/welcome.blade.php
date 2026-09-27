<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Horizon Academy | Where Young Minds Grow</title>

    <meta name="description"
          content="Horizon Academy — inspiring young minds through knowledge, creativity, character and curiosity.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Nunito:wght@400;600;700;800;900&display=swap"
        rel="stylesheet"
    >

    <style>
        :root {
            --navy: #102a43;
            --blue: #2563eb;
            --sky: #60a5fa;
            --cyan: #22d3ee;
            --yellow: #fbbf24;
            --orange: #f97316;
            --green: #22c55e;
            --cream: #fffdf7;
            --text: #243b53;
            --muted: #627d98;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "DM Sans", sans-serif;
            background: var(--cream);
            color: var(--text);
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font-family: inherit;
        }

        /* =========================================
           NAVIGATION
        ========================================= */

        .navbar {
            position: fixed;
            top: 18px;
            left: 50%;
            transform: translateX(-50%);
            width: min(1180px, calc(100% - 32px));
            padding: 12px 16px 12px 22px;
            background: rgba(255, 255, 255, 0.78);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255,255,255,.75);
            box-shadow: 0 15px 45px rgba(16, 42, 67, .10);
            border-radius: 22px;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: linear-gradient(135deg, #2563eb, #22d3ee);
            display: grid;
            place-items: center;
            color: white;
            font-size: 21px;
            box-shadow: 0 8px 20px rgba(37, 99, 235, .25);
        }

        .brand-text strong {
            display: block;
            font-family: "Nunito", sans-serif;
            font-size: 17px;
            font-weight: 900;
            color: var(--navy);
        }

        .brand-text span {
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--muted);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .nav-links a {
            padding: 10px 15px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            color: var(--text);
            transition: .25s ease;
        }

        .nav-links a:hover {
            background: #eff6ff;
            color: var(--blue);
        }

        .nav-login {
            background: var(--navy) !important;
            color: white !important;
            padding: 11px 19px !important;
        }

        .nav-login:hover {
            background: var(--blue) !important;
            transform: translateY(-2px);
        }

        .mobile-menu {
            display: none;
            border: 0;
            background: #eff6ff;
            width: 43px;
            height: 43px;
            border-radius: 13px;
            cursor: pointer;
            font-size: 20px;
        }

        /* =========================================
           HERO
        ========================================= */

        .hero {
            min-height: 780px;
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(
                    180deg,
                    #dff4ff 0%,
                    #edf9ff 48%,
                    #f9fce8 100%
                );
            display: flex;
            align-items: center;
            padding: 150px 7% 100px;
        }

        .hero-content {
            width: 100%;
            max-width: 1200px;
            margin: auto;
            position: relative;
            z-index: 10;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .hero-copy {
            animation: fadeUp .9s ease both;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,.72);
            border: 1px solid rgba(255,255,255,.9);
            padding: 9px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            color: var(--blue);
            letter-spacing: .5px;
            box-shadow: 0 8px 25px rgba(37,99,235,.08);
            margin-bottom: 22px;
        }

        .pulse-dot {
            width: 8px;
            height: 8px;
            background: var(--green);
            border-radius: 50%;
            animation: pulse 1.8s infinite;
        }

        .hero h1 {
            font-family: "Nunito", sans-serif;
            font-size: clamp(48px, 6vw, 82px);
            line-height: .98;
            font-weight: 900;
            color: var(--navy);
            letter-spacing: -3px;
            margin-bottom: 24px;
        }

        .hero h1 span {
            display: block;
            background: linear-gradient(90deg, #2563eb, #06b6d4, #22c55e);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-description {
            max-width: 560px;
            color: #526b84;
            font-size: 17px;
            line-height: 1.8;
            margin-bottom: 32px;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 13px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 15px 22px;
            border-radius: 15px;
            font-weight: 800;
            font-size: 14px;
            transition: .3s ease;
            cursor: pointer;
        }

        .btn-primary {
            color: white;
            background: var(--navy);
            box-shadow: 0 12px 25px rgba(16,42,67,.20);
        }

        .btn-primary:hover {
            transform: translateY(-4px);
            background: var(--blue);
            box-shadow: 0 18px 32px rgba(37,99,235,.25);
        }

        .btn-secondary {
            color: var(--navy);
            background: rgba(255,255,255,.7);
            border: 1px solid rgba(16,42,67,.08);
        }

        .btn-secondary:hover {
            transform: translateY(-4px);
            background: white;
        }

        /* =========================================
           HERO ILLUSTRATION
        ========================================= */

        .hero-scene {
            height: 470px;
            position: relative;
            animation: fadeUp 1s .2s ease both;
        }

        .sun {
            position: absolute;
            top: 25px;
            right: 70px;
            width: 105px;
            height: 105px;
            border-radius: 50%;
            background: #ffd166;
            box-shadow:
                0 0 0 18px rgba(255,209,102,.13),
                0 0 0 38px rgba(255,209,102,.07),
                0 0 65px rgba(255,209,102,.40);
            animation: sunGlow 3s ease-in-out infinite;
        }

        .cloud {
            position: absolute;
            width: 105px;
            height: 34px;
            background: rgba(255,255,255,.82);
            border-radius: 999px;
            filter: blur(.2px);
        }

        .cloud::before,
        .cloud::after {
            content: "";
            position: absolute;
            background: inherit;
            border-radius: 50%;
        }

        .cloud::before {
            width: 47px;
            height: 47px;
            left: 16px;
            bottom: 8px;
        }

        .cloud::after {
            width: 62px;
            height: 62px;
            right: 13px;
            bottom: 6px;
        }

        .cloud-1 {
            top: 70px;
            left: 5px;
            animation: cloudMove 18s linear infinite;
        }

        .cloud-2 {
            top: 150px;
            right: 5px;
            transform: scale(.72);
            opacity: .7;
            animation: cloudMoveReverse 22s linear infinite;
        }

        .mountain {
            position: absolute;
            bottom: 115px;
            width: 0;
            height: 0;
            border-left: 130px solid transparent;
            border-right: 130px solid transparent;
            border-bottom: 210px solid #b9e2ca;
            opacity: .8;
        }

        .mountain-1 {
            left: -20px;
        }

        .mountain-2 {
            left: 170px;
            border-left-width: 160px;
            border-right-width: 160px;
            border-bottom-width: 250px;
            border-bottom-color: #a9d8c0;
        }

        .mountain-3 {
            right: -60px;
            border-left-width: 190px;
            border-right-width: 190px;
            border-bottom-width: 270px;
            border-bottom-color: #c9e8ce;
        }

        .school {
            position: absolute;
            left: 50%;
            bottom: 110px;
            transform: translateX(-50%);
            width: 330px;
            height: 210px;
            background: #fffdf6;
            border-radius: 8px 8px 15px 15px;
            box-shadow: 0 22px 45px rgba(16,42,67,.12);
            border: 5px solid #f3c77a;
        }

        .school-roof {
            position: absolute;
            top: -67px;
            left: -25px;
            width: 370px;
            height: 82px;
            background: #ef8354;
            clip-path: polygon(50% 0, 100% 100%, 0 100%);
        }

        .school-sign {
            position: absolute;
            top: 24px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--navy);
            color: white;
            padding: 7px 18px;
            border-radius: 7px;
            font-family: "Nunito", sans-serif;
            font-weight: 900;
            font-size: 13px;
            white-space: nowrap;
        }

        .school-door {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 105px;
            background: #2563eb;
            border-radius: 8px 8px 0 0;
        }

        .school-door::after {
            content: "";
            position: absolute;
            right: 8px;
            top: 53px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #ffd166;
        }

        .window {
            position: absolute;
            width: 48px;
            height: 53px;
            top: 76px;
            background: #9ddcf2;
            border: 5px solid #f3c77a;
            border-radius: 5px;
        }

        .window::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 4px;
            background: #f3c77a;
        }

        .window::before {
            content: "";
            position: absolute;
            left: 50%;
            top: 0;
            height: 100%;
            width: 4px;
            background: #f3c77a;
        }

        .window-1 {
            left: 35px;
        }

        .window-2 {
            right: 35px;
        }

        .school-flag {
            position: absolute;
            top: -80px;
            right: 45px;
            width: 4px;
            height: 68px;
            background: var(--navy);
        }

        .school-flag::after {
            content: "H";
            position: absolute;
            top: 0;
            left: 3px;
            width: 42px;
            height: 28px;
            display: grid;
            place-items: center;
            color: white;
            background: var(--blue);
            font-weight: 900;
            border-radius: 0 5px 5px 0;
        }

        .ground {
            position: absolute;
            bottom: 75px;
            left: -10%;
            width: 120%;
            height: 95px;
            background: #9bd18b;
            border-radius: 50% 50% 0 0;
        }

        .road {
            position: absolute;
            bottom: 45px;
            left: -10%;
            width: 120%;
            height: 52px;
            background: #8796a5;
            transform: rotate(-2deg);
        }

        .road::after {
            content: "";
            position: absolute;
            left: 0;
            top: 23px;
            width: 100%;
            height: 5px;
            background: repeating-linear-gradient(
                90deg,
                #f8f9fa 0 50px,
                transparent 50px 90px
            );
        }

        /* =========================================
           CHILDREN
        ========================================= */

        .child {
            position: absolute;
            bottom: 79px;
            z-index: 15;
            animation: walking 1s ease-in-out infinite;
        }

        .child-head {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #d89568;
            position: relative;
            margin: auto;
        }

        .child-head::before {
            content: "";
            position: absolute;
            width: 30px;
            height: 15px;
            left: -1px;
            top: -2px;
            border-radius: 50% 50% 30% 30%;
            background: #3b2a24;
        }

        .child-body {
            width: 32px;
            height: 45px;
            border-radius: 10px 10px 4px 4px;
            margin: -1px auto 0;
            background: #2563eb;
        }

        .child-legs {
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        .leg {
            width: 7px;
            height: 27px;
            background: #243b53;
            border-radius: 5px;
        }

        .child-1 {
            left: 11%;
            animation-delay: .1s;
        }

        .child-2 {
            left: 21%;
            transform: scale(.85);
            animation-delay: .35s;
        }

        .child-2 .child-body {
            background: #f97316;
        }

        .child-3 {
            right: 12%;
            transform: scale(.75);
            animation-delay: .55s;
        }

        .child-3 .child-body {
            background: #22c55e;
        }

        /* =========================================
           BUS
        ========================================= */

        .bus {
            position: absolute;
            bottom: 102px;
            left: -180px;
            width: 135px;
            height: 65px;
            background: #fbbf24;
            border-radius: 14px 19px 9px 9px;
            border-bottom: 7px solid #d97706;
            z-index: 17;
            animation: busDrive 15s linear infinite;
        }

        .bus::before {
            content: "";
            position: absolute;
            right: -15px;
            top: 25px;
            width: 20px;
            height: 30px;
            background: #fbbf24;
            border-radius: 0 10px 8px 0;
        }

        .bus-window {
            position: absolute;
            top: 10px;
            width: 27px;
            height: 22px;
            background: #8ed5ed;
            border: 3px solid #fff8dc;
            border-radius: 4px;
        }

        .bus-window:nth-child(1) {
            left: 12px;
        }

        .bus-window:nth-child(2) {
            left: 45px;
        }

        .bus-window:nth-child(3) {
            left: 78px;
        }

        .bus-wheel {
            position: absolute;
            bottom: -13px;
            width: 25px;
            height: 25px;
            background: #243b53;
            border: 5px solid #f8fafc;
            border-radius: 50%;
        }

        .bus-wheel-1 {
            left: 18px;
        }

        .bus-wheel-2 {
            right: 18px;
        }

        /* =========================================
           FLOATING ELEMENTS
        ========================================= */

        .float-element {
            position: absolute;
            z-index: 20;
            animation: float 4s ease-in-out infinite;
        }

        .book-float {
            right: 4%;
            top: 230px;
            width: 58px;
            height: 45px;
            background: #f97316;
            border-radius: 7px;
            transform: rotate(12deg);
            box-shadow: 0 10px 20px rgba(249,115,22,.2);
        }

        .book-float::after {
            content: "";
            position: absolute;
            left: 50%;
            top: 0;
            width: 3px;
            height: 100%;
            background: rgba(255,255,255,.55);
        }

        .pencil-float {
            left: 2%;
            bottom: 250px;
            width: 85px;
            height: 13px;
            background: #fbbf24;
            transform: rotate(-25deg);
            border-radius: 10px;
        }

        .pencil-float::after {
            content: "";
            position: absolute;
            right: -12px;
            top: 0;
            border-left: 15px solid #e5c19b;
            border-top: 6px solid transparent;
            border-bottom: 6px solid transparent;
        }

        /* =========================================
           SECTIONS
        ========================================= */

        .section {
            padding: 105px 7%;
        }

        .section-inner {
            max-width: 1180px;
            margin: auto;
        }

        .section-heading {
            max-width: 680px;
            margin-bottom: 55px;
        }

        .section-label {
            color: var(--blue);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 11px;
            font-weight: 900;
            margin-bottom: 13px;
        }

        .section-heading h2 {
            font-family: "Nunito", sans-serif;
            color: var(--navy);
            font-size: clamp(34px, 4vw, 52px);
            line-height: 1.08;
            font-weight: 900;
            letter-spacing: -1.5px;
            margin-bottom: 16px;
        }

        .section-heading p {
            color: var(--muted);
            line-height: 1.8;
            font-size: 16px;
        }

        /* =========================================
           STATS
        ========================================= */

        .stats {
            background: var(--navy);
            color: white;
            padding: 55px 7%;
        }

        .stats-grid {
            max-width: 1050px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        .stat {
            text-align: center;
            padding: 15px;
        }

        .stat-number {
            font-family: "Nunito", sans-serif;
            font-size: 42px;
            font-weight: 900;
            color: white;
        }

        .stat-number span {
            color: #60a5fa;
        }

        .stat p {
            color: #bcccdc;
            font-size: 13px;
            margin-top: 5px;
        }

        /* =========================================
           ABOUT
        ========================================= */

        .about {
            background: white;
        }

        .about-grid {
            display: grid;
            grid-template-columns: .9fr 1.1fr;
            gap: 80px;
            align-items: center;
        }

        .about-visual {
            min-height: 430px;
            border-radius: 35px;
            background:
                radial-gradient(circle at 20% 20%, #bfdbfe 0 8%, transparent 9%),
                linear-gradient(145deg, #e0f2fe, #ecfdf5);
            position: relative;
            overflow: hidden;
            box-shadow: 0 30px 70px rgba(16,42,67,.12);
        }

        .about-card {
            position: absolute;
            background: rgba(255,255,255,.88);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 22px;
            box-shadow: 0 15px 35px rgba(16,42,67,.1);
        }

        .about-card.main {
            width: 210px;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .about-icon {
            width: 75px;
            height: 75px;
            margin: auto auto 15px;
            border-radius: 23px;
            background: linear-gradient(135deg, #2563eb, #22d3ee);
            display: grid;
            place-items: center;
            font-size: 35px;
        }

        .about-card.main h3 {
            font-family: "Nunito";
            font-size: 20px;
            color: var(--navy);
        }

        .about-card.main p {
            font-size: 12px;
            color: var(--muted);
            margin-top: 6px;
        }

        .mini-card {
            font-weight: 800;
            font-size: 13px;
        }

        .mini-1 {
            top: 45px;
            left: 35px;
        }

        .mini-2 {
            bottom: 50px;
            right: 30px;
        }

        .about-copy h3 {
            font-family: "Nunito";
            color: var(--navy);
            font-size: 25px;
            margin-bottom: 15px;
        }

        .about-copy > p {
            color: var(--muted);
            line-height: 1.9;
            margin-bottom: 25px;
        }

        .check-list {
            display: grid;
            gap: 14px;
        }

        .check-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--text);
            font-size: 14px;
            font-weight: 700;
        }

        .check {
            width: 25px;
            height: 25px;
            flex: 0 0 25px;
            border-radius: 50%;
            background: #dcfce7;
            color: #16a34a;
            display: grid;
            place-items: center;
            font-size: 12px;
        }

        /* =========================================
           FEATURES
        ========================================= */

        .features {
            background: #f7fbff;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .feature-card {
            background: white;
            border: 1px solid #e7eef5;
            border-radius: 24px;
            padding: 28px;
            transition: .35s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            right: -45px;
            bottom: -45px;
            border-radius: 50%;
            background: #eff6ff;
            transition: .35s ease;
        }

        .feature-card:hover {
            transform: translateY(-9px);
            border-color: #bfdbfe;
            box-shadow: 0 25px 50px rgba(37,99,235,.11);
        }

        .feature-card:hover::after {
            transform: scale(1.5);
        }

        .feature-icon {
            width: 54px;
            height: 54px;
            border-radius: 17px;
            display: grid;
            place-items: center;
            font-size: 25px;
            margin-bottom: 23px;
        }

        .icon-blue {
            background: #dbeafe;
        }

        .icon-yellow {
            background: #fef3c7;
        }

        .icon-green {
            background: #dcfce7;
        }

        .icon-purple {
            background: #ede9fe;
        }

        .feature-card h3 {
            font-family: "Nunito";
            font-size: 18px;
            color: var(--navy);
            margin-bottom: 9px;
        }

        .feature-card p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
            position: relative;
            z-index: 2;
        }

        /* =========================================
           JOURNEY
        ========================================= */

        .journey {
            background: white;
        }

        .journey-line {
            position: relative;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 60px;
        }

        .journey-line::before {
            content: "";
            position: absolute;
            top: 40px;
            left: 12%;
            right: 12%;
            height: 3px;
            background: repeating-linear-gradient(
                90deg,
                #bfdbfe 0 10px,
                transparent 10px 18px
            );
        }

        .journey-step {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .journey-number {
            width: 80px;
            height: 80px;
            margin: auto;
            border-radius: 50%;
            background: white;
            border: 5px solid #dbeafe;
            display: grid;
            place-items: center;
            font-size: 29px;
            box-shadow: 0 12px 30px rgba(16,42,67,.08);
            transition: .3s ease;
        }

        .journey-step:hover .journey-number {
            transform: translateY(-8px) rotate(5deg);
            border-color: #60a5fa;
        }

        .journey-step h3 {
            font-family: "Nunito";
            margin-top: 20px;
            color: var(--navy);
            font-size: 18px;
        }

        .journey-step p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
            max-width: 190px;
            margin: 8px auto 0;
        }

        /* =========================================
           PORTALS
        ========================================= */

        .portals {
            background: linear-gradient(145deg, #102a43, #163e61);
            color: white;
        }

        .portals .section-label {
            color: #67e8f9;
        }

        .portals .section-heading h2 {
            color: white;
        }

        .portals .section-heading p {
            color: #bcccdc;
        }

        .portal-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .portal-card {
            position: relative;
            padding: 32px;
            border-radius: 26px;
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.12);
            overflow: hidden;
            transition: .35s ease;
        }

        .portal-card:hover {
            transform: translateY(-8px);
            background: rgba(255,255,255,.12);
        }

        .portal-icon {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            display: grid;
            place-items: center;
            background: rgba(255,255,255,.12);
            font-size: 27px;
            margin-bottom: 25px;
        }

        .portal-card h3 {
            font-family: "Nunito";
            font-size: 21px;
            margin-bottom: 9px;
        }

        .portal-card p {
            color: #bcccdc;
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 22px;
        }

        .portal-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-size: 13px;
            font-weight: 800;
        }

        .portal-link span {
            transition: .2s;
        }

        .portal-card:hover .portal-link span {
            transform: translateX(5px);
        }

        /* =========================================
           CTA
        ========================================= */

        .cta {
            padding: 100px 7%;
            background: #f8fafc;
        }

        .cta-box {
            max-width: 1050px;
            margin: auto;
            padding: 65px;
            border-radius: 35px;
            background:
                radial-gradient(circle at 90% 20%, rgba(34,211,238,.3), transparent 25%),
                radial-gradient(circle at 10% 80%, rgba(96,165,250,.3), transparent 30%),
                linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 30px 70px rgba(37,99,235,.25);
        }

        .cta-box::before,
        .cta-box::after {
            content: "";
            position: absolute;
            border: 1px solid rgba(255,255,255,.16);
            border-radius: 50%;
        }

        .cta-box::before {
            width: 300px;
            height: 300px;
            top: -180px;
            left: -100px;
        }

        .cta-box::after {
            width: 250px;
            height: 250px;
            right: -80px;
            bottom: -150px;
        }

        .cta-box h2 {
            position: relative;
            z-index: 2;
            font-family: "Nunito";
            font-size: clamp(34px, 4vw, 52px);
            font-weight: 900;
            margin-bottom: 14px;
        }

        .cta-box p {
            position: relative;
            z-index: 2;
            max-width: 600px;
            margin: auto auto 28px;
            color: #dbeafe;
            line-height: 1.8;
        }

        .cta .btn {
            position: relative;
            z-index: 2;
            background: white;
            color: var(--blue);
        }

        /* =========================================
           FOOTER
        ========================================= */

        footer {
            background: #081c2d;
            color: white;
            padding: 65px 7% 25px;
        }

        .footer-grid {
            max-width: 1180px;
            margin: auto;
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 50px;
            padding-bottom: 45px;
        }

        .footer-brand p {
            color: #829ab1;
            font-size: 13px;
            line-height: 1.8;
            max-width: 320px;
            margin-top: 17px;
        }

        footer h4 {
            font-family: "Nunito";
            font-size: 15px;
            margin-bottom: 17px;
        }

        .footer-links {
            display: grid;
            gap: 11px;
        }

        .footer-links a {
            color: #829ab1;
            font-size: 13px;
            transition: .2s;
        }

        .footer-links a:hover {
            color: white;
            transform: translateX(3px);
        }

        .footer-bottom {
            max-width: 1180px;
            margin: auto;
            border-top: 1px solid rgba(255,255,255,.08);
            padding-top: 22px;
            display: flex;
            justify-content: space-between;
            gap: 15px;
            color: #627d98;
            font-size: 11px;
        }

        /* =========================================
           ANIMATIONS
        ========================================= */

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(34,197,94,.5);
            }
            50% {
                box-shadow: 0 0 0 8px rgba(34,197,94,0);
            }
        }

        @keyframes sunGlow {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.06);
            }
        }

        @keyframes cloudMove {
            0% {
                transform: translateX(-20px);
            }
            50% {
                transform: translateX(35px);
            }
            100% {
                transform: translateX(-20px);
            }
        }

        @keyframes cloudMoveReverse {
            0% {
                transform: translateX(20px) scale(.72);
            }
            50% {
                transform: translateX(-35px) scale(.72);
            }
            100% {
                transform: translateX(20px) scale(.72);
            }
        }

        @keyframes walking {
            0%, 100% {
                margin-bottom: 0;
            }
            50% {
                margin-bottom: 4px;
            }
        }

        @keyframes busDrive {
            0% {
                left: -180px;
            }
            45% {
                left: 110%;
            }
            100% {
                left: 110%;
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(8deg);
            }
            50% {
                transform: translateY(-13px) rotate(-2deg);
            }
        }

        /* =========================================
           SCROLL REVEAL
        ========================================= */

        .reveal {
            opacity: 0;
            transform: translateY(35px);
            transition: opacity .8s ease, transform .8s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 1000px) {

            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-scene {
                max-width: 650px;
                width: 100%;
                margin: auto;
            }

            .feature-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .about-grid {
                grid-template-columns: 1fr;
            }

            .about-visual {
                max-width: 650px;
                width: 100%;
                margin: auto;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 760px) {

            .navbar {
                top: 10px;
                width: calc(100% - 20px);
            }

            .nav-links {
                display: none;
                position: absolute;
                top: 68px;
                left: 0;
                right: 0;
                padding: 12px;
                border-radius: 18px;
                background: rgba(255,255,255,.96);
                box-shadow: 0 20px 45px rgba(16,42,67,.15);
                flex-direction: column;
                align-items: stretch;
            }

            .nav-links.open {
                display: flex;
            }

            .nav-links a {
                text-align: center;
            }

            .mobile-menu {
                display: block;
            }

            .hero {
                min-height: auto;
                padding: 130px 5% 50px;
            }

            .hero h1 {
                font-size: clamp(45px, 13vw, 65px);
                letter-spacing: -2px;
            }

            .hero-scene {
                height: 380px;
                transform: scale(.82);
                transform-origin: center top;
                margin-bottom: -65px;
            }

            .school {
                width: 275px;
            }

            .school-roof {
                width: 315px;
            }

            .section {
                padding: 75px 5%;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .journey-line {
                grid-template-columns: 1fr 1fr;
                row-gap: 45px;
            }

            .journey-line::before {
                display: none;
            }

            .portal-grid {
                grid-template-columns: 1fr;
            }

            .cta {
                padding: 65px 5%;
            }

            .cta-box {
                padding: 45px 25px;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 35px 20px;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 480px) {

            .brand-text span {
                display: none;
            }

            .brand-logo {
                width: 40px;
                height: 40px;
            }

            .hero-description {
                font-size: 15px;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .hero-scene {
                transform: scale(.67);
                margin-left: -16%;
                width: 132%;
                margin-bottom: -120px;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .stat-number {
                font-size: 31px;
            }

            .journey-line {
                grid-template-columns: 1fr;
            }

            .about-visual {
                min-height: 350px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
                scroll-behavior: auto !important;
            }
        }


    </style>
</head>

<body>

    <!-- =========================================
         NAVIGATION
    ========================================= -->

    <nav class="navbar">

        <a href="{{ url('/') }}" class="brand">
            <div class="brand-logo">✦</div>

            <div class="brand-text">
                <strong>Horizon Academy</strong>
                <span>Learn · Grow · Inspire</span>
            </div>
        </a>

        <button class="mobile-menu" id="mobileMenu" aria-label="Open navigation">
            ☰
        </button>

        <div class="nav-links" id="navLinks">
            <a href="#about">About</a>
            <a href="#learning">Learning</a>
            <a href="#journey">Journey</a>
            <a href="#portals">Portals</a>

            @auth
                <a href="{{ route('dashboard') }}" class="nav-login">
                    Dashboard →
                </a>
            @else
                <a href="{{ route('login') }}" class="nav-login">
                    Login →
                </a>
            @endauth
        </div>

    </nav>


    <!-- =========================================
         HERO
    ========================================= -->

    <section class="hero" id="home">

        <div class="hero-content">

            <div class="hero-copy">

                <div class="eyebrow">
                    <span class="pulse-dot"></span>
                    A place where possibilities begin
                </div>

                <h1>
                    Growing
                    <span>Tomorrow's Minds.</span>
                </h1>

                <p class="hero-description">
                    Welcome to Horizon Academy — a place where curiosity
                    becomes knowledge, creativity becomes confidence,
                    and every young mind gets the opportunity to shine.
                </p>

                <div class="hero-buttons">

                    <a href="#about" class="btn btn-primary">
                        Discover Our School
                        <span>→</span>
                    </a>

                    <a href="#portals" class="btn btn-secondary">
                        Explore Portals
                    </a>

                </div>

            </div>


            <!-- Animated school scene -->

            <div class="hero-scene">

                <div class="sun"></div>

                <div class="cloud cloud-1"></div>
                <div class="cloud cloud-2"></div>

                <div class="mountain mountain-1"></div>
                <div class="mountain mountain-2"></div>
                <div class="mountain mountain-3"></div>

                <div class="ground"></div>
                <div class="road"></div>

                <!-- School -->

                <div class="school">

                    <div class="school-roof"></div>

                    <div class="school-flag"></div>

                    <div class="school-sign">
                        HORIZON ACADEMY
                    </div>

                    <div class="window window-1"></div>
                    <div class="window window-2"></div>

                    <div class="school-door"></div>

                </div>


                <!-- Children -->

                <div class="child child-1">

                    <div class="child-head"></div>

                    <div class="child-body"></div>

                    <div class="child-legs">
                        <div class="leg"></div>
                        <div class="leg"></div>
                    </div>

                </div>

                <div class="child child-2">

                    <div class="child-head"></div>

                    <div class="child-body"></div>

                    <div class="child-legs">
                        <div class="leg"></div>
                        <div class="leg"></div>
                    </div>

                </div>

                <div class="child child-3">

                    <div class="child-head"></div>

                    <div class="child-body"></div>

                    <div class="child-legs">
                        <div class="leg"></div>
                        <div class="leg"></div>
                    </div>

                </div>


                <!-- Moving bus -->

                <div class="bus">

                    <div class="bus-window"></div>
                    <div class="bus-window"></div>
                    <div class="bus-window"></div>

                    <div class="bus-wheel bus-wheel-1"></div>
                    <div class="bus-wheel bus-wheel-2"></div>

                </div>


                <div class="float-element book-float"></div>
                <div class="float-element pencil-float"></div>

            </div>

        </div>

    </section>


    <!-- =========================================
         STATS
    ========================================= -->

    <section class="stats">

        <div class="stats-grid">

            <div class="stat">
                <div class="stat-number">15<span>+</span></div>
                <p>Years of Learning</p>
            </div>

            <div class="stat">
                <div class="stat-number">500<span>+</span></div>
                <p>Students</p>
            </div>

            <div class="stat">
                <div class="stat-number">40<span>+</span></div>
                <p>Dedicated Teachers</p>
            </div>

            <div class="stat">
                <div class="stat-number">98<span>%</span></div>
                <p>Student Satisfaction</p>
            </div>

        </div>

    </section>


    <!-- =========================================
         ABOUT
    ========================================= -->

    <section class="section about" id="about">

        <div class="section-inner about-grid">

            <div class="about-visual reveal">

                <div class="about-card mini-card mini-1">
                    🌱 Growing Every Day
                </div>

                <div class="about-card main">

                    <div class="about-icon">
                        🎓
                    </div>

                    <h3>Learn With Purpose</h3>

                    <p>
                        Education that prepares students
                        for tomorrow.
                    </p>

                </div>

                <div class="about-card mini-card mini-2">
                    ⭐ Every Student Matters
                </div>

            </div>


            <div class="about-copy reveal">

                <div class="section-label">
                    About Horizon
                </div>

                <h2>
                    Education is more than a classroom.
                </h2>

                <p>
                    At Horizon Academy, we believe education should
                    encourage students to ask questions, explore ideas,
                    discover their strengths and become confident
                    individuals.
                </p>

                <h3>
                    We help students discover what they can become.
                </h3>

                <div class="check-list">

                    <div class="check-item">
                        <span class="check">✓</span>
                        Student-centered learning
                    </div>

                    <div class="check-item">
                        <span class="check">✓</span>
                        Supportive and inspiring teachers
                    </div>

                    <div class="check-item">
                        <span class="check">✓</span>
                        Creativity beyond textbooks
                    </div>

                    <div class="check-item">
                        <span class="check">✓</span>
                        Character, confidence and curiosity
                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================================
         LEARNING FEATURES
    ========================================= -->

    <section class="section features" id="learning">

        <div class="section-inner">

            <div class="section-heading reveal">

                <div class="section-label">
                    The Horizon Experience
                </div>

                <h2>
                    A learning environment built for curiosity.
                </h2>

                <p>
                    Every part of school life is an opportunity
                    to discover something new.
                </p>

            </div>


            <div class="feature-grid">

                <div class="feature-card reveal">

                    <div class="feature-icon icon-blue">
                        📚
                    </div>

                    <h3>Quality Education</h3>

                    <p>
                        Strong academic foundations combined
                        with practical understanding.
                    </p>

                </div>


                <div class="feature-card reveal">

                    <div class="feature-icon icon-yellow">
                        💡
                    </div>

                    <h3>Creative Thinking</h3>

                    <p>
                        Students are encouraged to question,
                        experiment and create.
                    </p>

                </div>


                <div class="feature-card reveal">

                    <div class="feature-icon icon-green">
                        🌱
                    </div>

                    <h3>Personal Growth</h3>

                    <p>
                        Building confidence, responsibility
                        and character alongside academics.
                    </p>

                </div>


                <div class="feature-card reveal">

                    <div class="feature-icon icon-purple">
                        🔬
                    </div>

                    <h3>Explore & Discover</h3>

                    <p>
                        Learning extends beyond textbooks
                        through activities and exploration.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================================
         STUDENT JOURNEY
    ========================================= -->

    <section class="section journey" id="journey">

        <div class="section-inner">

            <div class="section-heading reveal">

                <div class="section-label">
                    A Student's Journey
                </div>

                <h2>
                    From the first step to a brighter horizon.
                </h2>

                <p>
                    Every day brings a new opportunity to learn,
                    explore and grow.
                </p>

            </div>


            <div class="journey-line">

                <div class="journey-step reveal">

                    <div class="journey-number">
                        🚶
                    </div>

                    <h3>Arrive</h3>

                    <p>
                        Start the day with energy,
                        friendships and excitement.
                    </p>

                </div>


                <div class="journey-step reveal">

                    <div class="journey-number">
                        📖
                    </div>

                    <h3>Learn</h3>

                    <p>
                        Discover ideas and build
                        strong foundations.
                    </p>

                </div>


                <div class="journey-step reveal">

                    <div class="journey-number">
                        🎨
                    </div>

                    <h3>Create</h3>

                    <p>
                        Turn imagination into
                        creativity and action.
                    </p>

                </div>


                <div class="journey-step reveal">

                    <div class="journey-number">
                        🌟
                    </div>

                    <h3>Grow</h3>

                    <p>
                        Become confident and ready
                        for tomorrow.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================================
         PORTALS
    ========================================= -->

    <section class="section portals" id="portals">

        <div class="section-inner">

            <div class="section-heading reveal">

                <div class="section-label">
                    School Management
                </div>

                <h2>
                    Everything connected in one place.
                </h2>

                <p>
                    Horizon Academy brings students, teachers
                    and administration together through a
                    modern digital experience.
                </p>

            </div>


            <div class="portal-grid">

                <div class="portal-card reveal">

                    <div class="portal-icon">
                        🎓
                    </div>

                    <h3>Student Portal</h3>

                    <p>
                        Access your dashboard, profile,
                        academic information and school resources.
                    </p>

                    <a href="{{ route('login') }}" class="portal-link">
                        Student Login
                        <span>→</span>
                    </a>

                </div>


                <div class="portal-card reveal">

                    <div class="portal-icon">
                        👩‍🏫
                    </div>

                    <h3>Teacher Portal</h3>

                    <p>
                        Manage teaching activities, student
                        information and classroom resources.
                    </p>

                    <a href="{{ route('login') }}" class="portal-link">
                        Teacher Login
                        <span>→</span>
                    </a>

                </div>


                <div class="portal-card reveal">

                    <div class="portal-icon">
                        🏫
                    </div>

                    <h3>Administration</h3>

                    <p>
                        A centralized management environment
                        for the academy administration.
                    </p>

                    <a href="{{ route('login') }}" class="portal-link">
                        Admin Login
                        <span>→</span>
                    </a>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================================
         CTA
    ========================================= -->

    <section class="cta">

        <div class="cta-box reveal">

            <h2>
                Every great future starts somewhere.
            </h2>

            <p>
                At Horizon Academy, we believe that every student
                has something extraordinary waiting to be discovered.
            </p>

            <a href="{{ route('register') }}" class="btn">
                Begin the Journey →
            </a>

        </div>

    </section>


    <!-- =========================================
         FOOTER
    ========================================= -->

    <footer>

        <div class="footer-grid">

            <div class="footer-brand">

                <div class="brand">

                    <div class="brand-logo">
                        ✦
                    </div>

                    <div class="brand-text">
                        <strong style="color:white;">
                            Horizon Academy
                        </strong>

                        <span style="color:#627d98;">
                            Learn · Grow · Inspire
                        </span>
                    </div>

                </div>

                <p>
                    Inspiring young minds through education,
                    creativity, curiosity and character.
                </p>

            </div>


            <div>

                <h4>Explore</h4>

                <div class="footer-links">
                    <a href="#about">About Us</a>
                    <a href="#learning">Learning</a>
                    <a href="#journey">Student Journey</a>
                    <a href="#portals">Portals</a>
                </div>

            </div>


            <div>

                <h4>Portals</h4>

                <div class="footer-links">
                    <a href="{{ route('login') }}">Student Login</a>
                    <a href="{{ route('login') }}">Teacher Login</a>
                    <a href="{{ route('login') }}">Admin Login</a>
                </div>

            </div>


            <div>

                <h4>Academy</h4>

                <div class="footer-links">
                    <a href="#about">Our Story</a>
                    <a href="#learning">Programs</a>
                    <a href="#journey">School Life</a>
                    <a href="{{ route('register') }}">Registration</a>
                </div>

            </div>

        </div>


        <div class="footer-bottom">

            <span>
                © {{ date('Y') }} Horizon Academy. All rights reserved.
            </span>

            <span>
                Built with purpose · Designed for learning
            </span>

        </div>

    </footer>




    <!-- =========================================
         JAVASCRIPT
    ========================================= -->

    <script>

        /*
        |--------------------------------------------------------------------------
        | Mobile Navigation
        |--------------------------------------------------------------------------
        */

        const mobileMenu = document.getElementById('mobileMenu');
        const navLinks = document.getElementById('navLinks');

        mobileMenu.addEventListener('click', function () {
            navLinks.classList.toggle('open');

            mobileMenu.textContent =
                navLinks.classList.contains('open')
                    ? '✕'
                    : '☰';
        });


        /*
        |--------------------------------------------------------------------------
        | Close mobile navigation after clicking a link
        |--------------------------------------------------------------------------
        */

        document.querySelectorAll('.nav-links a').forEach(function (link) {

            link.addEventListener('click', function () {

                navLinks.classList.remove('open');
                mobileMenu.textContent = '☰';

            });

        });


        /*
        |--------------------------------------------------------------------------
        | Scroll Reveal Animation
        |--------------------------------------------------------------------------
        */

        const revealElements =
            document.querySelectorAll('.reveal');

        const observer =
            new IntersectionObserver(
                function (entries) {

                    entries.forEach(function (entry) {

                        if (entry.isIntersecting) {

                            entry.target.classList.add('visible');

                            observer.unobserve(entry.target);

                        }

                    });

                },
                {
                    threshold: 0.12
                }
            );


        revealElements.forEach(function (element) {

            observer.observe(element);

        });


        /*
        |--------------------------------------------------------------------------
        | Small parallax effect for the hero scene
        |--------------------------------------------------------------------------
        */

        const heroScene =
            document.querySelector('.hero-scene');

        window.addEventListener('mousemove', function (event) {

            if (!heroScene) return;

            const x =
                (event.clientX / window.innerWidth - 0.5) * 8;

            const y =
                (event.clientY / window.innerHeight - 0.5) * 5;

            heroScene.style.transform =
                `translate(${x}px, ${y}px)`;

        });

    </script>
</body>
</html>