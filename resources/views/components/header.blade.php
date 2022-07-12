<div>
    <style>
        .active {
            background-color: #08b7da !important;
        }

        .active a {
            text-align: center;
            color: rgb(255, 255, 255) !important;
        }

        .sr-only {
            display: none !important;
        }

        .navbar-toggler {
            margin-right: 5px !important;
        }

    </style>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark"
            style="margin-bottom:0px; border-radius: 0px; ">
            <a class="navbar-brand" href="PaginationDataFatch"><img src="https://softwareflame.com/img/logo.png"
                    style=" height: 40px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="width: 100%;">
                @if ($title == 'mainPage')
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="PaginationDataFatch">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="PaginationMrow">Multiplat Row</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="viewPhotoPage">Multiplat Photo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="apiget">API(POST,GET,DELETE)</a>
                        </li>
                    </ul>
                @elseif($title == 'Mrow')
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="PaginationDataFatch">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="PaginationMrow">Multiplat Row</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="viewPhotoPage">Multiplat Photo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="apiget">API(POST,GET,DELETE)</a>
                        </li>
                    </ul>
                @elseif($title == 'Mprow')
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="PaginationDataFatch">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="PaginationMrow">Multiplat Row</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="viewPhotoPage">Multiplat Photo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="apiget">API(POST,GET,DELETE)</a>
                        </li>
                    </ul>
                @elseif($title == 'api')
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="PaginationDataFatch">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="PaginationMrow">Multiplat Row</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="viewPhotoPage">Multiplat Photo</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="apiget">API(POST,GET,DELETE)</a>
                        </li>
                    </ul>
                @endif
            </div>
            <table width="100%" align="center">
                <tr>
                    <td align="right">
                        <a class="btn btn-outline-info" href="javascript:void(0)" style="margin-right: 5px;">Hii..
                            {{ session()->get('user_name') }}</a>
                        <a class="btn btn-outline-info" href="Paginatlogout" style="margin-right: 5px;">LOGPUT</a>
</div>
</td>
</tr>
</table>




</nav>
</header>
</div>
