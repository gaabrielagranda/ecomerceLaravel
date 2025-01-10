<x-page_base_template>
    <x-slot name="title">
        {{$category->name}}
    </x-slot>

    <div class="container">
        <h1>Category - {{$category->name}}.</h1>
        @if($category->products->count())
            <div>
                @foreach($category->products as $product)
                    <div class="p-2">
                        <h2>{{$product->name}}</h2>
                        <p>{{$product->price}} euro.</p>
                        <a href="{{route('products.show', $product->id)}}">See more.</a>
                    </div>
                @endforeach
            </div>
        @else
            <p>We don't have items of this category, sorry!</p>
        @endif
    </div>
</x-page_base_template>
