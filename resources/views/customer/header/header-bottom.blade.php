<div class="header-bottom"><!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="{{route('homepage')}}" class="active">Home</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="pull-right">
                    <form action="{{route('product.search')}}" method="get" class="form-inline" id="searchForm">
                        <input id="#searchText" class="search_box" name="productSearch" type="search" placeholder="Search"/>
                        <input type="button" class="btn btn-outline-success" value="Search" id="searchProductButton">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-bottom-->
