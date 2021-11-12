<table>
    <thead>
        <tr>
            <th>
                name
            </th>
            <th>
                Delete
            </th>
        </tr>
       
    </thead>
    <tbody>
        @foreach ($wish as $wish)
        <tr>
            <td>{{$wish->pro_name}}</td>
            <td><a href="{{route('frontend.wishlist_delete',$wish->pro_id)}}">Delete</a></td>
        </tr>
        @endforeach
        
    </tbody>
</table>