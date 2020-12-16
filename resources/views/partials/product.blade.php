<div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{asset($product->feature_image_path)}}" alt=""/>
                    <h2>{{$product->price}} VND</h2>
                    <p>{{$product->name}}</p>
                    <button data-value="{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                        to cart</button>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>${{$product->price}}</h2>
                        <p>{{$product->name}}</p>
                        <button data-value="{{$product->id}}" class="btn btn-default add-to-cart"><i
                                class="fa fa-shopping-cart"></i>Add to cart</button>
                    </div>
                </div>
            </div>
        </div>
</div>