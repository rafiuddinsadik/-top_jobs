<section class="section-popular-categories">
    <div class="container text-center">

        <!-- Section Heading -->
        <h1>Popular Categories</h1>

        <br>

        @if( !empty($popular_categories) && count($popular_categories) )
            <!-- Popular categories list -->
            <div class="container">
                @foreach($popular_categories->chunk(4) as $popular_category_rows)
                    <div class="row mb-4">
                        @foreach($popular_category_rows as $num => $category)
                        <div class="col-sm">
                            <div class="card">
                                <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $category->name }}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        @else
            <!-- Popular categories not found template -->
            @component('layouts.components.alert', [ 'type' => 'danger', 'message' => 'Sorry! no popular categories found.' ])
            @endcomponent
        @endif

    </div>
</section>