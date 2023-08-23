<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">
        <style>
            .stroke-single,
            .stroke-double {
                position: relative;
                background: transparent;
                z-index: 0;
                color: red;
                margin-left: 5px;
                font-family: "Mistral", sans-serif;
                font-weight: 500;
                color: #ff0000;
                font-size: 22px;
                position: relative;
                top: 8px;
            }
            /* add a single stroke */
            .stroke-single:before,
            .stroke-double:before {
                content: attr(title);
                position: absolute;
                -webkit-text-stroke: 0.11em #fff;
                left: 0;
                z-index: -1;
            }
            /* add a double stroke */
            .stroke-double:after {
                content: attr(title);
                position: absolute;
                -webkit-text-stroke: 0.25em #000;
                left: 0;
                z-index: -2;
            }
            .acidsb {
                font-family: "Arial Narrow", sans-serif;
                font-weight: bold;
                color: #00D4FF;
                font-size: 16px;
                font-style: italic;
                font-weight: bold;
                margin-left: 5px;
                position: relative;
                -webkit-text-stroke: 0.6px #080808 !important;
            }
        </style>
        <div class="navbar-brand">
            <table>
                <tr>
                    <td rowspan="2">
                        <a aria-label="home" href="{{ route('home') }}"><img src="/img/logo.webp" alt="" class="img-fluid"></a>
                    </td>
                </tr>
            </table>
        </div>
        <nav id="navbar" class="navbar">
            <ul>
                @can('admin')
                    <li><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                @endcan
                <li><a class="nav-link" href="{{ route('event.create') }}">Buat Event</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <div class="wave" id="wave1" style="--i:1;"></div>
        <div class="wave" id="wave2" style="--i:2;"></div>
        <div class="wave" id="wave3" style="--i:3;"></div>
        <div class="wave" id="wave4" style="--i:4;"></div>
    </div>
</header>