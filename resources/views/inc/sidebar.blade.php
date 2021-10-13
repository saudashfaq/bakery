{{--<div class="wrapper">--}}
{{--    <!-- Sidebar -->--}}
{{--<nav id="sidebar">--}}
{{--    <div class="sidebar-header">--}}
{{--        <h3>Dashboard</h3>--}}
{{--    </div>--}}

{{--    <ul class="list-unstyled components">--}}
{{--        <p>Dummy Heading</p>--}}
{{--        <li class="active">--}}
{{--            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>--}}
{{--            <ul class="collapse list-unstyled" id="homeSubmenu">--}}
{{--                <li>--}}
{{--                    <a href="dashboard">Home 1</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">Home 2</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">Home 3</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="dashboard">Home</a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="/stock">Check stock</a>--}}
{{--        </li>--}}
{{--
        <li> <li>--}}
{{--            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>--}}
{{--            <ul class="collapse list-unstyled" id="pageSubmenu">--}}
{{--                <li>--}}
{{--                    <a href="#">Page 1</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">Page 2</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">Page 3</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--            <a href="#">Portfolio</a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="#">Contact</a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</nav>--}}

{{--</div>--}}
<!-- Side navigation -->
{{--<div class="sidebar-header">--}}
{{--            <h3>Dashboard</h3>--}}
{{--        </div>--}}
<div class="sidenav">
{{--    <h3>Dashboard</h3>--}}
    <!-- Branding Image -->
    <br>
    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', "Baker'sBites") }}
    </a>

    <a href="/dashboard"><h3>Dashboard</h3></a>
    <a href="/stocks">Raw material</a>
    <br>
    <a href="/history">History</a>
    <br>
    <a href="/createproduct">Product Recipe</a>

    <a href="/showproduct">Product</a>
{{--    <br>--}}
    <a href="inventory">Inventory</a>
</div>

<!-- Page content -->
{{--<div class="main">--}}
{{--    ...--}}
{{--</div>--}}
