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
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Raw material
                <span class="caret"></span></a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="/stocks">Available material</a>
                </li>
                <li>
                    <a href="/history">History</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="#productmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Product <span
                    class="caret"></span></a>
            <ul class="collapse list-unstyled" id="productmenu">
                <li>
                    <a href="/createproduct">Product Recipe</a>
                </li>
                <li>

                    <a href="/createreadymadeproduct">Ready_Made </a>

                </li>
                <li>
                    {{--                <a href="#">Products</a>--}}
                    <a href="/showproduct">Products</a>

                </li>
            </ul>
        </li>

        <li>
            <a href="#attributemenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Attribute <span class="caret"></span></a>
            <ul class="collapse list-unstyled" id="attributemenu">

                <li>
                    <a href="/attribute/index">Show Attributes</a>
                </li>
                <li>
                    <a href="/createattribute">Create Attribute</a>

                </li>
                <li>
                    <a href="/createcategory">Create Category</a>
                </li>

            </ul>
        </li>
    </ul>

    <a href="/showinventory">Inventory</a>
{{--    <a href="/showproduct">show product test</a>--}}


</div>

