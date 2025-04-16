<?php // Запуск сеанса 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

include_once __DIR__ . '/php/src/helpers.php';
include_once __DIR__ . '/php/src/config.php';
$user = currentUser();
$user_id = $user['id'] ?? null;
//index setting page
$sign = $sign_default = null;
if (!isset($user['id']) or empty($user['id'])) { //don't have account
  $sign = "
<a href='/regist/log-in.php'
    class='bg-theme-neutral-800 hover:bg-theme-neutral-700 rounded-full p-2  border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all   flex flex-col items-center flex-shrink-0'>
    <div class='px-5 py-1 text-theme-neutral-200 font-medium text-lg w-full text-center'>Войти</div>
</a>
<a href='/regist/sign-up.php'
    class='bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2  border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all   flex flex-col items-center flex-shrink-0'>
    <div class='px-4 py-1 text-theme-neutral-200 font-medium text-lg w-full text-center'>Создать профиль
    </div>
</a>";
  $sign_default = "
    <a class='font-base font-semibold sm:text-base text-theme-neutral-200 hover:text-fuchsia-500 transition-all'
    href='/regist/log-in.php'>Войти</a>
    <a class='font-base font-semibold sm:text-base text-theme-neutral-200 hover:text-fuchsia-500 transition-all'
    href='/regist/sign-up.php'>Зарегистрироваться</a>";
} else { //have account
  $sign = "
    <a href='/regist/account.php'
    class='bg-theme-neutral-800 hover:bg-theme-neutral-700 rounded-full p-2  border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all   flex flex-col items-center flex-shrink-0'>
    <div class='px-5 py-1 text-theme-neutral-200 font-medium text-lg w-full text-center'>Личный кабинет</div>
</a>";
  $sign_default = "
    <a class='font-base font-semibold sm:text-base text-theme-neutral-200 hover:text-fuchsia-500 transition-all'
    href='/regist/account.php'>" . htmlspecialchars($user['nickname']) . "</a>";
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <title>«Московский Политех - Мероприятия</title>
  <meta charSet="utf-8" />
  <meta name="viewport" content="initial-scale=1.0, width=device-width" />
  <meta name="title" content="MosPolytech - Мероприятия" />
  <meta name="description"
    content="Мероприятия от московского политехнического университета! Успей записаться сейчас!" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Event MosPolytech" />
  <meta property="og:description"
    content="Мероприятия от московского политехнического университета! Успей записаться сейчас!" />
  <meta property="og:image" content="https://sun9-54.userapi.com/c836737/v836737758/46cca/pSDEt6PyzDg.jpg" />
  <meta property="og:site_name" content="Event - MosPolytech" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="EnvPolytech -  Мероприятия" />
  <meta name="twitter:description"
    content="Мероприятия от московского политехнического университета! Успей записаться сейчас!" />
  <meta name="twitter:image" content="https://sun9-54.userapi.com/c836737/v836737758/46cca/pSDEt6PyzDg.jpg" />
  <meta name="next-head-count" content="14" />
  <meta name="yandex-verification" content="37776cc0cf909926" />
  <!-- Favicon  -->
  <link rel="icon" type="image/png" href="/favicon/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="/favicon/favicon.svg" />
  <link rel="shortcut icon" href="/favicon/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
  <meta name="apple-mobile-web-app-title" content="Мероприятия" />
  <link rel="manifest" href="/favicon/site.webmanifest" />
  <script>
    !function (f, b, e, v, n, t, s) {
      if (f.fbq) return; n = f.fbq = function () {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
      n.queue = []; t = b.createElement(e); t.async = !0;
      t.src = v; s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1218366289258395');
    fbq('track', 'PageView');
  </script><noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1218366289258395&amp;ev=PageView&amp;noscript=1" /></noscript>
  <!-- Yandex.Metrika counter -->
  <script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
      m[i] = m[i] || function () { (m[i].a = m[i].a || []).push(arguments) };
      m[i].l = 1 * new Date();
      for (var j = 0; j < document.scripts.length; j++) { if (document.scripts[j].src === r) { return; } }
      k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
      (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(99436190, "init", {
      clickmap: true,
      trackLinks: true,
      accurateTrackBounce: true,
      webvisor: true
    });
  </script>
  <noscript>
    <div><img src="https://mc.yandex.ru/watch/99436190" style="position:absolute; left:-9999px;" alt="" /></div>
  </noscript>
  <!-- /Yandex.Metrika counter -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="preload" href="_next/static/css/60ad9f7d26ed8199.css" as="style" />
  <link rel="stylesheet" href="_next/static/css/60ad9f7d26ed8199.css" data-n-g="" /><noscript data-n-css=""></noscript>
  <script defer="" nomodule="" src="_next/static/chunks/polyfills-c67a75d1b6f99dc8.js"></script>
  <script src="_next/static/chunks/webpack-d5bbb0b8d9193a3e.js" defer=""></script>
  <script src="_next/static/chunks/framework-695e56344d65da02.js" defer=""></script>
  <script src="_next/static/chunks/main-71053fefb6096a29.js" defer=""></script>
  <script src="_next/static/chunks/pages/_app-c089f5aa95005528.js" defer=""></script>
  <script src="_next/static/chunks/7122-f2b09b5497c5f08f.js" defer=""></script>
  <script src="_next/static/chunks/pages/index-986434c693426e2c.js" defer=""></script>
  <script src="_next/static/sJ6ilfkKpLQeOkYare81v/_buildManifest.js" defer=""></script>
  <script src="_next/static/sJ6ilfkKpLQeOkYare81v/_ssgManifest.js" defer=""></script>
  <style
    data-href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap">
    .w-until {
      width: 40%;
      color: white;
    }

    .br-5 {
      clip-path: inset(0% round 5px);
    }

    .br-10 {
      clip-path: inset(0% round 10px);
    }

    .br-15 {
      clip-path: inset(0% round 15px);
    }

    .br-25 {
      clip-path: inset(0% round 25px);
    }

    .bx-shadow-wht {
      box-shadow: 5px 5px 5px 2.5px white;
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: italic;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9C4kDNxMZdWfMOD5VvkojN.woff) format('woff')
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9E4kDNxMZdWfMOD5Vfkw.woff) format('woff')
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 500;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnZKvuQg.woff) format('woff')
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 600;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnSKzuQg.woff) format('woff')
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnLK3uQg.woff) format('woff')
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: italic;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9C4kDNxMZdWfMOD5VvkrjEYTLVdlTOr0s.woff2) format('woff2');
      unicode-range: U+0460-052F, U+1C80-1C8A, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: italic;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9C4kDNxMZdWfMOD5VvkrjNYTLVdlTOr0s.woff2) format('woff2');
      unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: italic;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9C4kDNxMZdWfMOD5VvkrjFYTLVdlTOr0s.woff2) format('woff2');
      unicode-range: U+1F00-1FFF
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: italic;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9C4kDNxMZdWfMOD5VvkrjKYTLVdlTOr0s.woff2) format('woff2');
      unicode-range: U+0370-0377, U+037A-037F, U+0384-038A, U+038C, U+038E-03A1, U+03A3-03FF
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: italic;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9C4kDNxMZdWfMOD5VvkrjGYTLVdlTOr0s.woff2) format('woff2');
      unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: italic;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9C4kDNxMZdWfMOD5VvkrjHYTLVdlTOr0s.woff2) format('woff2');
      unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: italic;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9C4kDNxMZdWfMOD5VvkrjJYTLVdlTO.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9E4kDNxMZdWfMOD5VvmojLazX3dGTP.woff2) format('woff2');
      unicode-range: U+0460-052F, U+1C80-1C8A, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9E4kDNxMZdWfMOD5Vvk4jLazX3dGTP.woff2) format('woff2');
      unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9E4kDNxMZdWfMOD5Vvm4jLazX3dGTP.woff2) format('woff2');
      unicode-range: U+1F00-1FFF
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9E4kDNxMZdWfMOD5VvlIjLazX3dGTP.woff2) format('woff2');
      unicode-range: U+0370-0377, U+037A-037F, U+0384-038A, U+038C, U+038E-03A1, U+03A3-03FF
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9E4kDNxMZdWfMOD5VvmIjLazX3dGTP.woff2) format('woff2');
      unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9E4kDNxMZdWfMOD5VvmYjLazX3dGTP.woff2) format('woff2');
      unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9E4kDNxMZdWfMOD5Vvl4jLazX3dA.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 500;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnZKveSxf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+0460-052F, U+1C80-1C8A, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 500;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnZKveQhf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 500;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnZKveShf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+1F00-1FFF
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 500;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnZKveRRf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+0370-0377, U+037A-037F, U+0384-038A, U+038C, U+038E-03A1, U+03A3-03FF
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 500;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnZKveSRf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 500;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnZKveSBf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 500;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnZKveRhf6Xl7Glw.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 600;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnSKzeSxf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+0460-052F, U+1C80-1C8A, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 600;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnSKzeQhf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 600;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnSKzeShf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+1F00-1FFF
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 600;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnSKzeRRf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+0370-0377, U+037A-037F, U+0384-038A, U+038C, U+038E-03A1, U+03A3-03FF
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 600;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnSKzeSRf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 600;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnSKzeSBf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 600;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnSKzeRhf6Xl7Glw.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnLK3eSxf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+0460-052F, U+1C80-1C8A, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnLK3eQhf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnLK3eShf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+1F00-1FFF
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnLK3eRRf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+0370-0377, U+037A-037F, U+0384-038A, U+038C, U+038E-03A1, U+03A3-03FF
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnLK3eSRf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnLK3eSBf6Xl7Gl3LX.woff2) format('woff2');
      unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF
    }

    @font-face {
      font-family: 'Fira Sans';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/firasans/v17/va9B4kDNxMZdWfMOD5VnLK3eRhf6Xl7Glw.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
    }
  </style>
  <style data-href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v22/pxiEyp8kv8JHgFVrFJM.woff) format('woff')
    }

    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLCz7V1g.woff) format('woff')
    }

    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v22/pxiEyp8kv8JHgFVrJJnecnFHGPezSQ.woff2) format('woff2');
      unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF
    }

    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v22/pxiEyp8kv8JHgFVrJJfecnFHGPc.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
    }

    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLCz7Z1JlFd2JQEl8qw.woff2) format('woff2');
      unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF
    }

    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLCz7Z1xlFd2JQEk.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
    }
  </style>
</head>

<body>
  <div id="__next">
    <div class="bg-[#130F18] min-h-screen">
      <div class="overflow-hidden">
        <header class="container max-w-screen-xl px-4 md:px-6 mx-auto flex justify-between py-4">
          <div
            class="fixed left-0 right-0 top-0 bottom-0 h-screen w-screen bg-theme-neutral-800 z-10 pt-28 px-4 -translate-x-full opacity-0 transition-all"
            id="op__cls">
            <div class="flex flex-col space-y-8">
              <?php
              echo $sign_default; ?>
              <a class="font-base font-semibold sm:text-base text-theme-neutral-200 hover:text-fuchsia-500 transition-all"
                href="https://mospolytech.ru/?ysclid=m53jcfb2fy39599443">Политех</a>
              <a class="font-base font-semibold sm:text-base text-theme-neutral-200 hover:text-fuchsia-500 transition-all"
                href="perks.html">События</a>
            </div>
          </div>
          <div class="flex items-center gap-x-10 z-20">
            <a href="#">
              <span
                style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                  style="display:block;max-width:calc(50px + 5px);width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                  alt="" aria-hidden="true" src="/images/logo/project_logo_technologies_of_the_future.png" />
              </span>
            </a>
            <div class="hidden md:flex items-center gap-x-8">
              <div class="flex items-center gap-x-8">
                <a class="font-base font-semibold sm:text-base text-theme-neutral-200 hover:text-fuchsia-500 transition-all"
                  href="https://mospolytech.ru/?ysclid=m53jcfb2fy39599443">Политех</a>
                <a class="font-base font-semibold sm:text-base text-theme-neutral-200 hover:text-fuchsia-500 transition-all"
                  href="perks.html">События</a>
              </div>
              <a href="https://mospolytech.ru/news/" target="_blank" rel="noopener noreferrer"
                class="text-sm font-medium text-white bg-gradient-to-r from-indigo-500 to-pink-500 hover:from-indigo-600 hover:to-pink-600 px-3 py-1.5 rounded-full transition-colors duration-200 flex-shrink-0 hidden lg:inline-flex">Больще
                чем вуз!</a>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="flex flex-row gap-3">
              <?php echo $sign; ?>
            </div>
          </div>
          <div class="md:hidden flex items-center gap-4 z-20"><a href="https://mospolytech.ru/news/" target="_blank"
              rel="noopener noreferrer"
              class="text-sm font-medium text-white bg-gradient-to-r from-indigo-500 to-pink-500 hover:from-indigo-600 hover:to-pink-600 px-3 py-1.5 rounded-full transition-colors duration-200 flex-shrink-0 inline-flex">Больще
              чем вуз!</a>
            <div id="btn_menu" role="button"
              class="w-14 h-14 bg-neutral-800 rounded-full flex items-center p-3 hover:bg-neutral-700">
              <div class="space-y-1.5 w-full">
                <div class="h-px bg-white"></div>
                <div class="h-px bg-white"></div>
                <div class="h-px bg-white"></div>
              </div>
            </div>
          </div>
        </header>
        <div>
          <div class="mt-6 mb-28">
            <div class="container max-w-screen-xl px-4 md:px-4 mx-auto pt-4 pb-8 relative">
              <div class="relative flex flex-col items-center gap-8">
                <div class="flex flex-col items-center">
                  <div class="w-1/2 h-64 absolute top-64 -right-1/4 opacity-50 animate-spin-slow filter blur-[120px]">
                    <div class="relative">
                      <div class="rounded-full h-60 w-full bg-blue-600"></div>
                      <div class="absolute bottom-24 -left-24 rounded-full h-60 w-full bg-blue-700"></div>
                      <div class="absolute top-24 left-24 rounded-full h-60 w-full bg-purple-600"></div>
                    </div>
                  </div>
                  <div class="w-1/2 h-64 absolute top-64 -left-1/4 opacity-50 animate-spin-slow filter blur-[120px]">
                    <div class="relative">
                      <div class="rounded-full h-60 w-full bg-purple-800"></div>
                      <div class="absolute bottom-24 -left-24 rounded-full h-60 w-full bg-red-800"></div>
                      <div class="absolute top-24 left-24 rounded-full h-60 w-full bg-purple-600"></div>
                    </div>
                  </div><a class="mb-8 relative" target="_blank" rel="noreferrer" href="regist/log-in.php">
                    <div
                      class="inset-0 absolute opacity-50 rounded-full bg-gradient-to-r from-red-600 to-purple-700 z-1 filter blur-[12px]">
                    </div>
                    <div
                      class="flex relative items-center text-white text-lg bg-theme-neutral-800 rounded-full px-4 py-3 z-2 border border-theme-neutral-600 hover:border-theme-neutral-500 transition-colors">
                      <div class="bg-theme-neutral-700 font-bold px-2 py-1 rounded-full mr-2 text-sm">START</div>
                      <div class="flex text items-center">Начни с политехом<span class="px-2 flex items-center"><span
                            style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                              style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                                style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                                alt="" aria-hidden="true"
                                src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%2718%27%20height=%2718%27/%3e" /></span><img
                              alt="GO logo"
                              src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                              decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                                alt="GO logo"
                                srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252Fyc.211a9f5e.png&amp;w=32&amp;q=75amp;q_next/image@url=%252F_next%252Fstatic%252Fmedia%252Fyc.211a9f5e.png&amp;w=48&amp;q=75mp;w=48&amp;q=75 2x"
                                src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252Fyc.211a9f5e.png&amp;w=48&amp;q=75"
                                decoding="async" data-nimg="intrinsic"
                                style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                                loading="lazy" /></noscript></span></span><span>GO</span></div>
                      <div class="ml-2">→</div>
                    </div>
                  </a>
                  <div class="font-bold text-center text-theme-neutral-200 text-4xl md:text-5xl mb-4"><span
                      class="text-white">Успейте записаться</span> <span
                      class="bg-clip-text bg-gradient-to-r from-indigo-500 to-pink-500 text-transparent"><br />на
                      новые
                      мероприятия</span></div>
                  <div class="text-base text-center md:text-xl text-theme-neutral-400 opacity-80">Мы предоставляем для
                    всех школ специальные мероприятия, в котором .....
                    <!-- --> <br class="hidden md:block" />Успейте принять участие и не пропустить свободные места!
                  </div>
                  <div class="w-full px-0 md:px-4 py-8 md:py-8 overflow-hidden ">
                    <span
                      style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%">
                      <span
                        style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                        <video
                          style="mix-blend-mode: lighten;clip-path: inset(0% round 25px);block;max-width:100%;width:initial;height:initial;background:transparent;opacity:1;border:0;margin:0;padding:0"
                          autoplay loop muted>
                          <source style="background-image: none;" src="/images/timqwees/world.MOV" type="video/mp4" />
                        </video>
                      </span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- block container  -->

          <div
            class="container max-w-screen-xl px-4 md:px-6 mx-auto pb-16 flex flex-col items-center relative gap-16 md:gap-32">

            <!-- block 1 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Анализ в бизнесе и программной разработке (работа на тренажере, ПО не требуется)</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Где применяется анализ данных? Зачем нужна аналитика при разработке программ и развитии бизнеса?
                    <br><br>
                    Что такое метрики и как они работают? Какие инструменты используют аналитики? <br><br>
                    Разберись: смотри видеолекцию, пройди тренажёр – выбирай, будешь ли ты развивать бизнес
                    вендинговых
                    аппаратов или увеличивать популярность компьютерной игры.
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходим проектор или электронная достка для
                    демонстрации,
                    Желательно наличие ПК для участников,
                    доступ в интернет. Можно использовать смартфон</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div class="rounded-lg flex-shrink-0 w-12 h-12 border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.Н. Красникова</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="1">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/1.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 2 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row-reverse">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Быстрая разработка приложений (работа на тренажере, ПО не требуется)</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Где применяются цифровые приложения? <br><br>
                    Зачем нужна программная платформа? Что такое low-code?
                    И что должны знать разработчики приложений? <br><br> Разберись: смотри видеолекцию, пройди
                    тренажер
                    – выбирай на свой вкус
                    задания от предприятий из разных отраслей. </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходим проектор или электронная достка для
                    демонстрации,
                    Желательно наличие ПК для участников,
                    доступ в интернет. Можно использовать смартфон</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.Н. Красникова</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>

                    <!-- button -->

                  </div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.Н. Красникова</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="2">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/2.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 3 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Генерация изображений с помощью искусственного интеллекта (необходим ПК, доступ в интернет)
                  </div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Искусственный интеллект в настоящее время проникает во все сферы прикладных областей применения.
                    <br><br>
                    В данном мастер-классе вы познакомитесь с практическим применением нейросети от Сбера, <br><br>
                    которая может создавать качественные изображения по текстовому описанию на русском и других
                    языках,
                    а также смешивать, дорисовывать и изменять картинки по запросу пользователя.
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходим проектор или электронная достка для
                    демонстрации,
                    Желательно наличие ПК для участников,
                    доступ в интернет. Можно использовать смартфон</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">В.В. Осьмин</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="3">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/3.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 4 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row-reverse">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>День IT-знаний от вконтакте (с мерчем)</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходим проектор или электронная достка для
                    демонстрации,
                    Можно использовать смартфон</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">Не указано</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="4">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/4.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->
            <!-- block 5 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Знакомство с пакетом моделирования роботов V-REP</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    В рамках данного мастер-класса участники получат уникальную возможность познакомиться с мощным
                    инструментом <br><br>
                    для моделирования и симуляции робототехнических систем — пакетом V-REP (сейчас известным как
                    CoppeliaSim). </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходим проектор или электронная достка для
                    демонстрации,
                    Желательно наличие ПК для участников,
                    доступ в интернет, установка ПО заранее</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.Н. Красникова</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>

                    <!-- button -->

                  </div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.В. Кулибаба</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="5">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/5.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 6 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row-reverse">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Искусственный интеллект в образовании</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Урок поможет узнать, как искусственный интеллект помогает человеку повышать продуктивность и
                    сокращать рутину, <br><br>
                    чтобы оставалось больше времени на интересные задачи. Ты сможешь попробовать себя в роли
                    настоящего
                    исследователя <br><br>
                    данных и создать умного помощника для учителя!
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходим проектор или электронная достка для
                    демонстрации,
                    Желательно наличие ПК для участников,
                    доступ в интернет. Можно использовать смартфон</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.Н. Красникова</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="6">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/6.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 7 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row-reverse">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Искусственный интеллект в стартапах (работа на тренажере, ПО не требуется)</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Урок поможет взглянуть на ИИ-технологии и возможности, которые они открывают с новой точки зрения
                    –
                    предпринимателя. <br><br>
                    Короткий ролик расскажет, кто же такие предприниматели, что представляет из себя стартап и какие
                    шаги предстоит пройти, разрабатывая свой проект, который в будущем может изменить жизнь многих
                    людей.
                    В рамках игрового тренажера можно пройти эти шаги вместе с <br><br>
                    героями и по дороге познакомиться с разными технологиями искусственного интеллекта: компьютерным
                    зрением, обработкой естественного языка и анализом больших данных.
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходим проектор или электронная достка для
                    демонстрации,
                    Желательно наличие ПК для участников,
                    доступ в интернет. Можно использовать смартфон</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.Н. Красникова</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="7">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/7.png" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->
            <!-- block 8 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Использование цифрового аватара в презентациях (необходим ПК, доступ в интернет)</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    В данном мастер-классе тезисно рассматриваются принципы формирования слайдов презентации.
                    С помощью искусственного интеллекта в подготовленные слайды презентации мы добавим цифровой
                    аватар.
                    <br><br>
                    Рассмотрим настройки аватара: от расположения и размера до интонаций произнесения текста.
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходим проектор для демонстрации,
                    ПК для участников,
                    доступ в интернет</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">В.В. Осьмин</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="8">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/8.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 9 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row-reverse">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Как стать разработчиком игр (лекция + тренажер)</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    На этом уроке ты узнаешь про профессии, связанные с разработкой видеоигр, а также чем занимаются
                    специалисты, <br><br>
                    работающие в игровых студиях.
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходим проектор или электронная достка для
                    демонстрации,
                    Можно использовать смартфон</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.Н. Красникова</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>

                    <!-- button -->

                  </div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.В. Кулибаба</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="9">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/9.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->
            <!-- block 10 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Как сделать школьный проект</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Мастер-класс посвящен основным требования к ИТ-проектам на конкурсах. Рассмотрены основные примеры
                    и
                    <br><br>
                    ошибки при выступлении. Даны рекомендации.
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходим проектор или электронная достка для
                    демонстрации,
                  </div>

                  <!-- tech-->
                  <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.Н. Красникова</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>

                    <!-- button -->

                  </div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">В.В. Осьмин</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="10">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/10.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 11 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row-reverse">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Как спрятать текст в картинку</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    В диалоговом режиме разбираются вопросы о стеганографии, которая позволяет скрыть содержимое
                    тайного
                    сообщения. <br><br>
                    В отличии от криптографии стеганография скрывает сам факт существования передачи информации. Как
                    правило, сообщение будет выглядеть <br><br>
                    как что-либо иное, например, как изображение, статья, список покупок, письмо или судоку.
                    Используя свободно распространяемое программное обеспечение в режиме онлайн участники МК смогут
                    спрятать <br><br>
                    свой текст в выбранном ими изображении, а также извлечь спрятанные сообщения из изображений других
                    участников МК.
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходим проектор для демонстрации,
                    доступ в интернет</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">В.В. Осьмин</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="11">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/11.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 12 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Компьютерные сетевые технологии (теория + практикум, материалы предоставляются)</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Учащиеся познакомятся с элементами построения структурированной кабельной системы передачи данных,
                    узнают о принципах построения системы, о назначении ее компонентов, их совместном использовании и
                    получат практические навыки создания и тестирования сегмента сети.
                    Пошагово проходят следующие этапы: <br><br>
                    1) знакомятся с общими принципами работы компьютерной сети;
                    2) знакомятся с необходимыми инструментами;
                    3) создают элемент сети, состоящий из сегмента витой пары, обжатой с одного конца с использованием
                    коннектора RJ-45, <br><br>
                    с другой стороны подключается компьютерная розетка;
                    4) проверяют с посмощью тестера работоспособность созданного сегмента.
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Материалы предоставляются,
                    необходим стол</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">В.В. Осьмин</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="12">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/12.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 13 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row-reverse">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Макросы VBA Excel это просто! (необходим ПК, MS Excel)</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Встроенный язык программирования VBA (анг. Visual Basic for Applications) позволяет
                    автоматизировать
                    множество задач пользователя и доступен любому человеку даже не обладающему навыками
                    программирования!
                    Во время мастер-класса участники в легкой и занимательной форме: <br><br>
                    1) Узнают как настроить ленту и правильно сохранить файл с макросами;
                    2) Запишут свой первый макрос, научаться анализировать его содержание и вносить изменения в код;
                    3) Добавят в проект картинку и объект кнопка, научаться настраивать свойства объектов;
                    4) Разберутся с применяем переменных, циклов, вычислением значений, записью значений переменных в
                    ячейки Excel.
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходим проектор для демонстрации,
                    ПК для участников, MS Excel</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">В.В. Осьмин</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="13">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/13.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->
            <!-- block 14 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Молодежное научное общество (как участвовать в конференциях и делать проекты)</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Мастер-класс "Как создать школьный проект" предназначен для учащихся, желающих научиться
                    эффективно
                    разрабатывать <br><br>
                    и представлять свои идеи в рамках школьных проектов. В ходе занятия участники познакомятся с
                    основными этапами создания проекта: от выбора темы и исследования до оформления и защиты.
                    Мы обсудим, как правильно формулировать цели и задачи, собирать информацию, а <br><br>
                    также использовать различные методы презентации. Участники получат практические советы по
                    организации работы в группе, распределению ролей и созданию визуальных материалов. </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходим проектор или электронная достка для
                    демонстрации,
                  </div>

                  <!-- tech-->
                  <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.Н. Красникова</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>

                    <!-- button -->

                  </div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.В. Кулибаба</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="14">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/14.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 15 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row-reverse">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Найди поврежденный кабель (прозон распределительной коробки, материалы предоставляются)</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Мастер-класс "Найди поврежденный кабель" предназначен для тех, кто хочет освоить основные навыки
                    диагностики и ремонта электрических и сетевых кабелей. <br><br>
                    В условиях современного мира, где надежная связь и электричество являются основой работы
                    большинства
                    технологий, умение быстро находить <br><br>
                    и устранять повреждения становится важным навыком.
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Материалы предоставляются
                  </div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">Не указано</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="15">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/16.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->
            <!-- block 16 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Обзор и выбор треков конкурса Интеллектуальный мегаполис</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6"></div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">М.В. Даньшина</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="16">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/16.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 17 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row-reverse">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Планирование рабочего пространства с помощью таск менеджера (установка ПО не требуется)</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    В современном мире, где эффективность и организация рабочего времени играют ключевую роль, умение
                    правильно планировать задачи становится необходимым навыком для достижения успеха. Мастер-класс
                    "Планирование рабочего пространства с помощью таск-менеджера" предлагает участникам освоить
                    современные инструменты для управления задачами и проектами.
                    На занятии вы познакомитесь <br><br>
                    с основными функциями популярных таск-менеджеров, таких как Trello, Asana и Todoist. Мы
                    рассмотрим,
                    как правильно организовать рабочее <br><br>
                    пространство, установить приоритеты, делегировать задачи и отслеживать прогресс. Участники смогут
                    на
                    практике создать собственные проекты, научиться эффективно распределять время и ресурсы.
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходим проектор или электронная достка для
                    демонстрации,
                    Можно использовать смартфон</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.Н. Красникова</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="17">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/17.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 18 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Пошаговое моделирование бизнес-процессов (установка ПО не требуется)</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Мастер-класс "Моделирование бизнес-процессов" предлагает участникам уникальную возможность
                    погрузиться в основы и<br><br>
                    современные методы моделирования, которые помогут оптимизировать процессы и повысить их
                    эффективность.
                    На занятии вы узнаете о различных подходах к моделированию, включая популярную нотацию BPMN
                    (Business Process Model and Notation). <br><br>
                    Мы рассмотрим этапы создания моделей, начиная от сбора информации и заканчивая анализом и
                    оптимизацией. Участники смогут применить полученные знания на практике, работая над реальными
                    кейсами в группах.</div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходим проектор или электронная достка для
                    демонстрации,
                    Желательно наличие ПК для участников,
                    доступ в интернет. Можно использовать смартфон</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.Н. Красникова</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="18">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/18.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 19 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row-reverse">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Приемы использования Google таблиц (необходим ПК, доступ в интернет)</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Многопользовательская одновременная обработка документов и таблиц в настоящее время широко
                    используются как в учебе, так и в работе крупных проектов и уже сложно представить, как можно было
                    жить раньше без такого удобного интернет-приложения - электронных таблиц Google.
                    На мастер-классе участники познакомятся: <br><br>
                    1) с принципами создания Google таблиц и управления правами доступа;
                    2) с написанием формул, использованием ссылок;
                    3) применением функций и условного форматирования;
                    4) с внедрением API (англ. Application Programming Interface).
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходим проектор для демонстрации,
                    ПК для участников,
                    доступ в интернет</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">В.В. Осьмин</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="19">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/19.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 20 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Разработка цифрового продукта</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6"></div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">М.В. Даньшина</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="20">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/20.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 21 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row-reverse">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Создай патчкорд своими руками (материалы предоставляются)</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Участники знакомятся с технологией обжимки кабеля витой пары для создания работоспособного
                    подключения компьютеров к локальной сети.</div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Материалы предоставляются</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.Н. Красникова</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                  </div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.В. Кулибаба</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                  </div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.Н. Красникова</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                  </div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">В.В. Осьмин</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                  </div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">Е.В. Олейникова</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="21">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/21.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 22 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Создание 2D платформера</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Рассмотрение основных моментов разработки игры на примере.</div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6"></div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">А.А. Колодочкин </div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="22">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/22.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 23 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row-reverse">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Стратегия выбора и поступления в вуз</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Рассматриваются карты дисциплин и учебные планы. Даются рекомендации по работе с сайтами вузов.
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6"> </div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">А.Ю. Гневшев</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="23">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/23.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 24 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Устройство, сборка и обслуживание ПК (материалы предоставляются)</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    На мастер классе учащиеся познакомятся с внутренним строением системного блока, узнают о том,
                    зачем
                    нужен каждый его компонент, <br><br>
                    за что он отвечает, и как устроен внутри.
                    Поскольку мастер класс практический, все участники самостоятельно участвуют в сборке и разборке
                    системного блока под<br><br>
                    руководством преподавателя. Таким образом, все учащиеся получат полное представление об устройстве
                    компьютера и правилах его использования и обслуживания, а также навыки для самостоятельного его
                    ремонта и профилактики.
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Материалы предоставляются</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">Г.Н. Копылов</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="24">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/24.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 25 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row-reverse">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Цифровое искусство: музыка и ИТ</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Способен ли искусственный интеллект сочинять музыку? Как работают современные музыкальные сервисы?
                    Как алгоритмы рекомендуют? <br><br>
                    Может ли компьютер понимать музыку? Ответы на эти и другие вопросы узнай в этом уроке!
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходим проектор или электронная достка для
                    демонстрации,
                    Можно использовать смартфон</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.Н. Красникова</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="25">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/25.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 26 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Секреты скрытых сообщений</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Мастер-класс предлагает погрузиться в мир стеганографии, изучая методы скрытия информации внутри
                    других данных. <br><br>
                    Участники смогут узнать, как использовать эту технику для защиты конфиденциальной информации и
                    многое другое.
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходима электронная доска с возможностью
                    подключения компьютера.
                    Для лучшего погружения желательно проведение в компьютерном классе</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">А.Ю. Гневшев</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="26">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/26.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 27 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row-reverse">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Введение в Data Science: анализ данных с помощью Python и Pandas</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Участники познакомятся с основами анализа данных, используя библиотеку Pandas в Python. Задача:
                    Проанализировать небольшой набор <br><br>
                    данных (например, информацию о продажах) и найти среднее значение, максимальное и минимальное
                    значения, определить тренд, построить диаграммы зависимости.
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходима электронная доска с возможностью
                    подключения компьютера.
                    Для лучшего погружения желательно проведение в компьютерном классе</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">А.Ю. Гневшев</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="27">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/27.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 28 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Основы работы с Git</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Участники познакомятся с системой контроля версий Git, научатся создавать репозитории, коммитить
                    изменения и работать с удалёнными репозиториями.
                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходима электронная доска с возможностью
                    подключения компьютера.
                    Для лучшего погружения желательно проведение в компьютерном классе</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">А.Ю. Гневшев</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="28">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/28.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 29 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row-reverse">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Разработка ботов для Telegram на Python</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходима электронная доска с возможностью
                    подключения компьютера.
                    Для лучшего погружения желательно проведение в компьютерном классе</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">А.Ю. Гневшев</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="29">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/29.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 30 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Перспективные технологии кибербезопасности — веб и облачная безопасность</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Необходима электронная доска с возможностью
                    подключения компьютера.
                    Для лучшего погружения желательно проведение в компьютерном классе</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">А.Ю. Гневшев</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="30">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/30.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 31 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row-reverse">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Собираем сетевые розетки</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                  </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Материалы предоставляются</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">В.В. Осьмин</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="31">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>

                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/31.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

            <!-- block 32 -->

            <div class="flex flex-col gap-x-16 gap-y-8 items-center md:flex-row">
              <div class="max-w-lg">
                <div class="text-theme-neutral-100 text-3xl md:text-4xl font-bold mb-6">
                  <div>Кодирование информации</div>
                </div>
                <div class="text-theme-neutral-400 mb-6 text-sm sm:text-base">
                  <div>

                    Рассматриваются разные коды и шифры. Участники на практике в формате игры кодируют и декодируют
                    данные. </div>
                </div>
                <div class="mb-10 mt-8"></div>
                <div
                  class="px-6 py-6 bg-theme-neutral-800 bg-opacity-70 rounded-lg border border-theme-neutral-700 hover:border-theme-neutral-700 transition-all">
                  <div class="text-theme-neutral-300 font-semibold mb-6">Необходимые ресуры</div>
                  <div class="text-theme-neutral-400 opacity-80 mb-6">Материалы предоставляются</div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.В. Кулибаба</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                  </div>

                  <!-- tech-->
                  <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                      <div
                        class="rounded-lg flex-shrink-0 w-12 h-12 bg-black border border-theme-neutral-700 overflow-hidden">
                        <span
                          style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                            style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                            <img
                              style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                              alt="" aria-hidden="true" src="/images/teachers/nikishina.png" /></span>
                          <img alt="author avatar" src="/images/teachers/nikishina.png" decoding="async"
                            data-nimg="intrinsic"
                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                              alt="author avatar" srcSet="/images/teachers/nikishina.png"
                              src="/images/teachers/nikishina.png" decoding="async" data-nimg="intrinsic"
                              style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                              loading="lazy" /></noscript></span>
                      </div>
                      <div>
                        <div class="text-theme-neutral-300 font-semibold">И.Н. Красникова</div>
                        <div class="text-theme-neutral-400 opacity-80 text-sm">Спикер</div>
                      </div>
                    </div>
                    <form method="POST" action="/_next/reg_env.php">
                      <input type="hidden" name="event_id" value="32">
                      <input type="submit" style="width: 100%;padding: .5rem 2rem"
                        class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 hover:from-indigo-500 hover:to-fuchsia-600 rounded-full p-2 border border-theme-neutral-700 hover:border-theme-neutral-500 transition-all flex flex-col items-center w-until"
                        value="Записаться" />
                    </form>
                  </div>
                </div>
              </div>

              <!-- background  -->

              <div class="overflow-hidden max-w-1/2 flex-1"><span
                  style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                      style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                      alt="" aria-hidden="true" class="br-15" src="/images/services/32.jpg" /></span><img alt="feature"
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    decoding="async" data-nimg="intrinsic"
                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                      alt="feature"
                      srcSet="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75amp;q=75 1x"
                      src="_next/image@url=%252F_next%252Fstatic%252Fmedia%252FSQLchallenge.18dcf9dc.png&amp;w=3840&amp;q=75"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                      loading="lazy" /></noscript></span></div>
            </div> <!-- end -->

          </div>

          <!-- footer  -->

          <footer>
            <!-- <div class="bg-theme-neutral-700 h-px"></div> -->
            <div class="container max-w-screen-xl px-4 md:px-6 mx-auto">
              <div class="flex flex-col lg:flex-row items-start py-16 gap-x-10 gap-y-16 w-full">
                <div
                  class="flex-grow grid grid-cols-[1fr] sm:grid-cols-[1fr_1fr] md:grid-cols-[1fr_1fr_1fr_1fr] gap-4 lg:gap-10 w-full">
                  <div class="w-full">
                    <h3
                      class="lg:text-lg text-white uppercase tracking-wider mb-2 lg:mb-4 border-b border-gray-800 pb-3 lg:border-b-0">
                      Об университете</h3>
                    <div class="max-h-0 md:max-h-full overflow-hidden md:overflow-auto transition-all"><a
                        href="https://mospolytech.ru/ob-universitete/universitet-segodnya/#bx_1373509569_6916"
                        class="pl-2 lg:pl-0 lg:text-lg text-theme-neutral-400 block py-2 sm:py-1 whitespace-nowrap"
                        target="_blank" rel="noreferrer">Научная деятельность</a><a
                        href="https://mospolytech.ru/ob-universitete/universitet-segodnya/#bx_3777608605_2735"
                        class="pl-2 lg:pl-0 lg:text-lg text-theme-neutral-400 block py-2 sm:py-1 whitespace-nowrap"
                        target="_blank" rel="noreferrer">Направления специальностей</a><a
                        href="https://mospolytech.ru/ob-universitete/universitet-segodnya/#bx_1373509569_2630"
                        class="pl-2 lg:pl-0 lg:text-lg text-theme-neutral-400 block py-2 sm:py-1 whitespace-nowrap"
                        target="_blank" rel="noreferrer">Всё для обучения и практики</a><a
                        href="https://mospolytech.ru/ob-universitete/universitet-segodnya/#bx_1373509569_6917"
                        class="pl-2 lg:pl-0 lg:text-lg text-theme-neutral-400 block py-2 sm:py-1 whitespace-nowrap"
                        target="_blank" rel="noreferrer">Внеучебная деятельность</a><a
                        href="https://mospolytech.ru/ob-universitete/universitet-segodnya/#bx_1373509569_8868"
                        class="pl-2 lg:pl-0 lg:text-lg text-theme-neutral-400 block py-2 sm:py-1 whitespace-nowrap"
                        target="_blank" rel="noreferrer">Международная деятельность</a><a
                        href="https://mospolytech.ru/ob-universitete/istoriya/"
                        class="pl-2 lg:pl-0 lg:text-lg text-theme-neutral-400 block py-2 sm:py-1 whitespace-nowrap"
                        target="_blank" rel="noreferrer">История</a></div>
                  </div>
                  <div class="w-full">
                    <h3
                      class="lg:text-lg text-white uppercase tracking-wider mb-2 lg:mb-4 border-b border-gray-800 pb-3 lg:border-b-0">
                      Многофункциональный центр</h3>
                    <div class="max-h-0 md:max-h-full overflow-hidden md:overflow-auto transition-all"><a
                        href="https://twitter.com/codecraftersio"
                        class="pl-2 lg:pl-0 lg:text-lg text-theme-neutral-400 block py-2 sm:py-1 whitespace-nowrap"
                        target="_blank" rel="noreferrer" data-animate>+7 (495) 223-05-23</a><a
                        href="https://mospolytech.ru/obuchauschimsya/mnogofunkcionalnyy-centr/otdelenie-na-bolshoy-semenovskoy/"
                        class="pl-2 lg:pl-0 lg:text-lg text-theme-neutral-400 block py-2 sm:py-1 whitespace-nowrap"
                        target="_blank" rel="noreferrer">Отделение «На Большой Семёновской»</a><a
                        href="https://mospolytech.ru/obuchauschimsya/mnogofunkcionalnyy-centr/otdelenie-na-avtozavodskoy/"
                        class="pl-2 lg:pl-0 lg:text-lg text-theme-neutral-400 block py-2 sm:py-1 whitespace-nowrap"
                        target="_blank" rel="noreferrer">Отделение «На Автозаводской»</a><a
                        href="https://mospolytech.ru/obuchauschimsya/mnogofunkcionalnyy-centr/otdelenie-na-pavla-korchagina/"
                        class="pl-2 lg:pl-0 lg:text-lg text-theme-neutral-400 block py-2 sm:py-1 whitespace-nowrap"
                        target="_blank" rel="noreferrer">Отделение «На Павла Корчагина»</a><a
                        href="https://mospolytech.ru/obuchauschimsya/mnogofunkcionalnyy-centr/otdelenie-na-pryanishnikova/"
                        class="pl-2 lg:pl-0 lg:text-lg text-theme-neutral-400 block py-2 sm:py-1 whitespace-nowrap"
                        target="_blank" rel="noreferrer">Отделение «На Прянишникова»</a><a
                        href="https://mospolytech.ru/obuchauschimsya/uslugi-mnogofunkcionalnogo-centra/"
                        class="pl-2 lg:pl-0 lg:text-lg text-theme-neutral-400 block py-2 sm:py-1 whitespace-nowrap"
                        target="_blank" rel="noreferrer">Услуги обучающимся, работникам и ранее обучавшимся</a></div>
                  </div>
                  <div class="w-full">
                    <h3
                      class="lg:text-lg text-white uppercase tracking-wider mb-2 lg:mb-4 border-b border-gray-800 pb-3 lg:border-b-0">
                      Контакт-центр:</h3>
                    <div class="max-h-0 md:max-h-full overflow-hidden md:overflow-auto transition-all"><a
                        href="jobs.html"
                        class="pl-2 lg:pl-0 lg:text-lg text-theme-neutral-400 block py-2 sm:py-1 whitespace-nowrap"
                        target="_blank" rel="noreferrer">+7 (495) 223-05-23</a><a href="pricing.html"
                        class="pl-2 lg:pl-0 lg:text-lg text-theme-neutral-400 block py-2 sm:py-1 whitespace-nowrap"
                        target="_blank" rel="noreferrer">+7 (495) 276-37-36</a></div>
                  </div>
                  <div class="w-full">
                    <h3
                      class="lg:text-lg text-white uppercase tracking-wider mb-2 lg:mb-4 border-b border-gray-800 pb-3 lg:border-b-0">
                      Часы работы:</h3>
                    <div class="max-h-0 md:max-h-full overflow-hidden md:overflow-auto transition-all"><a
                        href="terms.html"
                        class="pl-2 lg:pl-0 lg:text-lg text-theme-neutral-400 block py-2 sm:py-1 whitespace-nowrap"
                        target="_blank" rel="noreferrer">Пн. — Чт.: 9:00 - 21:00</a><a href="privacy.html"
                        class="pl-2 lg:pl-0 lg:text-lg text-theme-neutral-400 block py-2 sm:py-1 whitespace-nowrap"
                        target="_blank" rel="noreferrer">Пт: 9:00 - 20:00</a><a href="privacy.html"
                        class="pl-2 lg:pl-0 lg:text-lg text-theme-neutral-400 block py-2 sm:py-1 whitespace-nowrap"
                        target="_blank" rel="noreferrer">Сб. — Вс.: 9:30 - 17:15</a></div>
                  </div>
                </div>
              </div>
              <div class="bg-theme-neutral-700 h-px"></div>
              <div class="flex flex-col md:flex-row items-center py-10 space-y-2" style="gap: 1rem;">
                <a href="index.html">
                  <span
                    style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%">
                    <span
                      style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                        style="display:block;width:calc(100px - 10px);height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                        alt="" aria-hidden="true" src="/images/logo/project_logo_technologies_of_the_future.png" />
                    </span>
                  </span>
                </a>
                <div class="text-theme-neutral-500 text-xs md:text-xl">©
                  <script>
                    document.write(new Date().getFullYear())
                  </script>
                  федеральное государственное автономное образовательное учреждение
                  высшего образования «Московский политехнический университет»
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <script async src="/_next/static/chunks/pages/trans__lock_123222.js"></script>

</body>

</html>