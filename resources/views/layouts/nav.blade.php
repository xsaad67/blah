<div class="navarea">

    <nav class="navbar navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="bs4navbar" class="collapse navbar-collapse">
           <ul id="menu-top-menu" class="navbar-nav col-md-12 justify-content-center">
            
            <li id="menu-item-247" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-247 nav-item "><a href="{{env('APP_URL')}}" class="nav-link active">Home</a></li>
            @foreach(\App\Category::has('posts')->limit(8)->get() as $category)
            <li id="menu-item-{{$category->name}}" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-68 nav-item">
                <a href="/category/{{$category->slug}}" class="nav-link">{{$category->name}}</a></li>
            @endforeach
            </ul>
        </div>
        <br>


    </nav>





</div>
            
            
