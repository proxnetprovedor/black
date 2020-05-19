<div class="sidebar" data-color="purple" data-background-color="black" data-image="#">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"><a href="#" class="simple-text logo-mini">{{ config('app.name', 'B-R') }}</a>
        <a href="#" class="simple-text logo-normal">{{ config('app.name', 'Bla') }}</a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="../../assets/img/faces/avatar.jpg" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                    Tania Andrew
                    <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span class="sidebar-mini"> MP </span>
                        <span class="sidebar-normal"> My Profile </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span class="sidebar-mini"> EP </span>
                        <span class="sidebar-normal"> Edit Profile </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span class="sidebar-mini"> S </span>
                        <span class="sidebar-normal"> Settings </span>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item active">
                <a class="nav-link" href="/home">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#formsExamples" aria-expanded="true">
                    <i class="material-icons">content_paste</i>
                    <p> Forms
                    <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="formsExamples">
                    <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span class="sidebar-mini"> RF </span>
                        <span class="sidebar-normal"> Regular Forms </span>
                        </a>
                    </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>