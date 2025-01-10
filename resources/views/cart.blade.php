<x-page_base_template> <!-- the x-page_base_template directive is used to extend the page_base_template component -->
    <x-slot name="title"> <!-- the x-slot directive is used to define a slot in the component and the name attribute is used to specify the name of the slot -->
        Cart
    </x-slot> <!-- the x-slot directive is used to end the slot definition -->

    <div class="container">
        <h1>Cart:</h1>

        @if(session('message')) { <!-- the session helper is used to get the value of the message key in the session and the session helper is used to store data in the session and the message key is used to store a message in the session -->
        <div class="accent-red-400">
            {{session('message')}}
        </div>
        }
        @endif
        @if($items->count()) <!-- the $items variable is used to represent the items in the cart and the count method is used to get the number of items in the cart -->
            <table class="table">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item) <!-- this foreach directive is used to loop through the items in the cart -->
                    <tr> <!-- the tr element is used to define a row in the table -->
                        <td>{{$item->product->name}}</td> <!-- the td element is used to define a cell in the table and the $item->product->name is used to get the name of the product -->
                        <td> <!-- the td element is used to define a cell in the table -->
                            <form action=" {{route('cart.update', $item->id)}}" method="post"> <!-- the form element is used to create a form and the action attribute is used to specify the url that the form should be submitted to and the method attribute is used to specify the http method that should be used to submit the form -->
                                @csrf <!-- the @csrf directive is used to generate a csrf token and a csrf token is used to protect the application from cross-site request forgery attacks -->
                                @method('patch') <!-- the @method directive is used to specify the http method that should be used to submit the form and patch is used to specify that the form should be submitted using the patch method -->
                                <!-- the patch method is used to update an existing resource -->
                                <input type="number" name="quantity" value="{{$item->quantity}}" min="1"> <!-- the input element is used to create an input field and the type attribute is used to specify the type of input field and the name attribute is used to specify the name of the input field and the value attribute is used to specify the value of the input field and the min attribute is used to specify the minimum value that can be entered in the input field -->
                                <!-- in the previous line, the $item-quantity is used to get the quantity of the item in the cart and min="1" is used to specify that the minimum value that can be entered in the input field is 1 -->
                                <button type="submit">Update</button>
                            </form>
                        </td>
                        <td>
                            {{$item->product->price}} euro. <!-- the $item->product->price is used to get the price of the product -->
                        </td>
                        <td>
                            {{$item->product->price * $item->quantity}} euro.
                        </td>
                        <td>
                            <form action="{{route('cart.remove', $item->id)}}" method="post"> <!-- this method post is used to submit the form using the post method -->
                                @csrf <!-- the @csrf directive is used to generate a csrf token and a csrf token is used to protect the application from cross-site request forgery attacks -->
                                @method('delete') <!-- the @method directive is used to specify the http method that should be used to submit the form and delete is used to specify that the form should be submitted using the delete method -->
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach <!-- the endforeach directive is used to end the foreach directive -->
                </tbody>
            </table>
            <form action="{{route('orders.checkout')}}" method="post"> <!-- the orders.checkout route is used to specify the url that the form should be submitted to -->
                @csrf
                <button type="submit">Checkout</button>
            </form>
        @else <!-- the @else directive is used to specify what should be displayed if the cart is empty -->
            <div>
                Your cart is empty.
            </div>
        @endif
    </div>
</x-page_base_template> <!-- the x-page_base_template directive is used to end the page_base_template component -->
