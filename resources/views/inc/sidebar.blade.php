
<div class="sidenav">
{{--    <h3>Dashboard</h3>--}}
    <!-- Branding Image -->
{{--    <br>--}}
    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', "Baker'sBites") }}
    </a>

    <a href="/dashboard"><h3>Dashboard</h3></a>

    <ul class="list-unstyled components mb-5">
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Raw material <span class="caret"></span></a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="/stocks">Available material</a>
                </li>
                <li>
                    <a href="/history">History</a>
                </li>

            </ul>
        </li>
<!--    -->
    <li>
        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Product <span class="caret"></span></a>
        <ul class="collapse list-unstyled" id="pageSubmenu">
            <li>
                <a href="/createproduct">Product Recipe</a>
            </li>
            <li>
{{--                <a href="#">Products</a>--}}
                <a href="/showproduct">Products</a>

            </li>
        </ul>
    </li></ul>

    <a href="/showinventory">Inventory</a>



</div>

